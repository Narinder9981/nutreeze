<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Ordermaster;
use AdminBundle\Entity\Productmaster;
use AdminBundle\Entity\Couponmaster;
use AdminBundle\Entity\Couponusagehistory;
use AdminBundle\Entity\Ordermealtypesincluderelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Orderallergyrelation;
use AdminBundle\Entity\Orderingredientrelation;
use AdminBundle\Entity\Orderpackageupgradehistory;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Walletmaster;
use AdminBundle\Entity\Transcationmaster;
use AdminBundle\Entity\Productavailability;
use AdminBundle\Entity\Productcombinationmaster;
use AdminBundle\Entity\Productpackagerelation;
use AdminBundle\Entity\Productcombodisplayrelation;

class WSPurchasePackageController extends WSBaseController {

    /**
     * @Route("/ws/purchasepackage/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function purchasepackageAction($param) {   
        //     $url = 'http://anonadiet.com/admin/payment/index.php?custname='.$user_master->getUser_firstname().'&custemail='.$user_master->getEmail().'&phone='.$user_master->getUser_mobile().'&totAmount='.$total_amount.'&productnames='.str_replace(' ', '',$package_master->getPackage_name()).'&order_id_app='.$order_id.'&user_id='.$user_id;


        //try{
        $this->title = "Purhcase Package";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('unique_code', 'package_id', 'start_date', 'package_for', 'consultant_fees', 'delivery_address_id','delivery_time_id', 'payment_type', 'user_id', 'package_amount', 'total_amount', 'sub_package_id','delivery_method_id', 'days', 'transaction_code', 'payment_id', 'ref_no', 'transaction_date'),
            ),
        );

        if ($this->validateData($param)) {
            $unique_code = $param->unique_code;
            $package_id = $param->package_id;
            $sub_package_id = $param->sub_package_id;
            $start_date = date('Y-m-d', strtotime($param->start_date));
            $package_for = $param->package_for; //package_for can be both workout as well scheduled so changes here so get comma separated ids ...
            $consultant_fees = $param->consultant_fees;
            $delivery_address_id = $param->delivery_address_id;
            $payment_type = $param->payment_type;
            $total_amount = $param->total_amount;  //after applying code
            $package_amount = $param->package_amount;  // main price
            $user_id = $param->user_id;
            $transaction_code = $param->transaction_code;
            $payment_id = $param->payment_id;
            $ref_no = $param->ref_no;
            $transaction_date = $param->transaction_date;
            
            $coupon_code = !empty($param->coupon_code) ? $param->coupon_code : '0';
            $wallet_amount = !empty($param->wallet_amount) ? $param->wallet_amount : '0';

            $delivery_time_id = !empty($param->delivery_time_id) ? $param->delivery_time_id : '0';
            $order_note_id = !empty($param->order_note_id) ? $param->order_note_id : '0';
            $delivery_method_id = !empty($param->delivery_method_id) ? $param->delivery_method_id : '0';
            $off_days = !empty($param->off_days) ? $param->off_days : null;

            $app_mode = !empty($param->app_mode) ? $param->app_mode : 'prod';

            $delivery_time_notes = !empty($param->delivery_time_notes) ? $param->delivery_time_notes : '';
            $delivery_method_notes = !empty($param->delivery_method_notes) ? $param->delivery_method_notes : '';

            $days = $param->days;

            $end_date = date('Y-m-d', strtotime($param->start_date.' +'.$days.' days'));
            $em = $this->getDoctrine()->getManager();
            $lang_id = 1 ;
            $days_array_is_wrong = false;

            $total_off_days = 0;
            $all_dislikes = !empty($param->all_dislikes) ? $param->all_dislikes : '';
            $all_allergy = !empty($param->all_allergy) ? $param->all_allergy : '';
            
            if(strtotime($start_date) <= strtotime(date("Y-m-d")) ){
                $this->error = "PIW";
                $this->error_msg = "Start date Passed";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }
            $order_start_date = strtotime($start_date);
            $order_end_date = strtotime($end_date);
            if($wallet_amount > 0 ){
                $wallet_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("user_master_id"=>$user_id,'is_deleted'=>0,'wallet_status'=>'active'));
                if($wallet_master_info){
                    if($wallet_master_info->getWallet_amount() >= $wallet_amount){
                        
                    }
                    else{
                        $this->error = "WAE";
                        $this->error_msg = "Wallet have not suufiect amount";
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Ordermaster();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }                    
                }
                else{
                    $this->error = "WNF";
                    $this->error_msg = "Wallet not Found or problem in status of wallet";
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Ordermaster();
                    $this->data = $emptyObj;
                    return $this->responseAction();
                }
            }
            $sub_packagecheck = $this->fireQuery("Select * from sub_package_master where main_sub_package_id = " . $sub_package_id . " and is_archive = 1 ");
            if ($sub_packagecheck) {
                $this->error = "PIW";
                $this->error_msg = "Please Select your Package , package archived";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }

            $packageMaster = $em->getRepository("AdminBundle:Packagemaster")->findOneBy([
                "language_id" => $lang_id,
                "main_package_master_id" => $package_id,
                "is_deleted" => 0
            ]);
            $current_festival = NULL ;
            $date = date("Y-m-d");
            $date_after_three_days = date('Y-m-d', strtotime("+".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime($date)));
           
            $current_festival = $this->getUpcomingFestival($date_after_three_days);
          // var_dump($current_festival);exit;
            $main_package_id  = $packageMaster->getMain_package_master_id();
            $festival_effect_apply = $packageMaster->getFestival_affect();
            $package_type = $packageMaster->getPackage_type(); 
            $need_tocheck_subpackageFlag = false  ;
            $remaining_days_in_festival = 0 ; 
            $festival_start_date = NULL ; 
            if($current_festival != NULL ){
                $festival_start_date = $current_festival['start_date'];
                $remaining_days_in_festival = $current_festival['diff_days'];               
                if($package_type == 'normal'){
                    $need_tocheck_subpackageFlag = true ;                        
                }
                else{
                    if($festival_effect_apply == 'yes'){
                       $need_tocheck_subpackageFlag = true ;  
                    }
                }
            }   
            $minuns_from_package_daysPackageDays = 0; 
            if($need_tocheck_subpackageFlag == true ){
                // find wihc days should be display 
                // 30 26 7 1 days ==> if remaining festival days = 3 then 7 days pacjage should be display as 3 and 1 days
                $minuns_from_package_daysQuery = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for' and main_package_for_master_id IN (SELECT package_for_id FROM `package_for_with_package_relation` WHERE `main_package_id` = $main_package_id AND `is_deleted` = 0) and days >= ".$remaining_days_in_festival." ORDER BY `package_for_master`.`days` ASC limit 0,1";
                $minuns_from_package_daysPackageList = $this->fireQuery($minuns_from_package_daysQuery);
                if($minuns_from_package_daysPackageList){
                    $minuns_from_package_daysPackageDays = $minuns_from_package_daysPackageList[0]['days'];
                }
            }
          
			$user_master = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Usermaster")
                        ->findOneBy(array("user_master_id" => $user_id, 'is_deleted' => 0));
            //$sql_pk_for = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for' ";
            $sql_pk_for = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for'  and main_package_for_master_id IN ('$package_for') order by days desc ";
            
            $pk_for = $this->fireQuery($sql_pk_for);

            $packageFor = null;
            if(!empty($pk_for)){
                foreach($pk_for as $_pk_for){
                    
                    
                    $removed  = false ;
                    $display_package_as_it_is = false ;
                    if($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays == $_pk_for['days']){
                        // display package with minuns days 
                        $display_package_as_it_is = false ;
                    }
                    else if ($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays != $_pk_for['days'] && $remaining_days_in_festival >= $_pk_for['days']){
                        // display package as it is 
                         $display_package_as_it_is = true ;
                         
                    }
                    else if ($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays != $_pk_for['days'] && $remaining_days_in_festival < $_pk_for['days']){
                        // display package as it is 
                         $display_package_as_it_is = false ;
                         $removed  = true ;
                         
                    }
                    else if ($need_tocheck_subpackageFlag == false ){
                        // display package as it is 
                         $display_package_as_it_is = true ;
                    }
                }
            }
            $pk_days = NULL; 
            if($removed == false){
                 $pk_days = $remaining_days_in_festival ;
            }
            else{
                $pk_days = NULL;
            }    

            #package days
            $sql_pk_days = "select days , friday_offday from package_for_master where is_deleted = 0 and main_package_for_master_id = '$package_for' group by main_package_for_master_id";
            $days = $this->fireQuery($sql_pk_days);
            $dates = null;
            $offDayArray = [];
            $off_days = str_replace("\\", "", $off_days);
            $off_days = (array) json_decode($off_days);

            $friday_off_day = "yes";
            if ($days) {
                $friday_off_day = $days[0]['friday_offday'];
            }
            if ($friday_off_day == "yes") {
                $offDayArray = array("main_days_master_id" => "5"); //array();
                $off_days[] = (object) array("main_days_master_id" => "5"); //array();  
            }
            // check sub package is with off day or with out off day 
            if (!empty($off_days)) {
                foreach ($off_days as $_off_days) {
                    //  if ($_off_days->main_days_master_id != 5) {
                    $offDayArray [] = $_off_days->main_days_master_id;
                    // }
                    if (!array_key_exists('main_days_master_id', $_off_days)) {
                        $days_array_is_wrong = true;
                        break;
                    }
                }
            }


            if ($days) {
                if($current_festival == NULL ){
                    $pk_days = $days[0]['days'];
                }
               
                $order_end_date = strtotime("+$pk_days days", $order_start_date);
                while ($pk_days > 0) {
                    if ($order_start_date <= $order_end_date) {
                        if (!in_array(date('N', $order_start_date), $offDayArray)) {
                            $dates [] = date('Y-m-d', $order_start_date);
                            $pk_days = $pk_days - 1;
                        }
                    } else {
                        #for extending day no need to include friday as off_day not regular off day
                        if (!in_array(date('N', $order_start_date), $offDayArray) && date('N', $order_start_date) != 5) {
                            $dates [] = date('Y-m-d', $order_start_date);
                            $pk_days = $pk_days - 1;
                        }
                    }
                    if ($pk_days > 0) {
                        $order_start_date = strtotime("+1 days", $order_start_date);
                    }
                }
            }
           

            $end_date = date('Y-m-d', $order_start_date);

          
            // if ($days_array_is_wrong) {
            //     $this->error = "PIW";
            //     $this->error_msg = "Day Array is Wrong";
            //     return $this->responseAction();
            // }

            // if (strtotime($start_date) <= strtotime(date('Y-m-d'))) {
            //     $this->error = "PIW";
            //     $this->error_msg = "Day Array is Wrong";
            //     return $this->responseAction();
            // }
            // if (strtotime($end_date) <= strtotime(date('Y-m-d'))) {
            //     $this->error = "PIW";
            //     $this->error_msg = "Day Array is Wrong";
            //     return $this->responseAction();
            // }


            $promo_code_discount = !empty($param->promo_code_discount) ? $param->promo_code_discount : '0';  //discount price
            #purchase same package after completion of current package date validation
            $sql_all_order = "select start_date,end_date from order_master 
                                    where order_status = 'success' and order_by = '$user_id' and is_deleted = 0 and 
                                    ( (start_date BETWEEN '$start_date' AND '$end_date' 
                                    OR end_date BETWEEN '$start_date' AND '$end_date'))
                                    ";
         //  echo $sql_all_order ;die;
//            exit;
            $orders_of_users = $this->firequery($sql_all_order);
            $orders_of_users = [];
            $given_start_date = strtotime($start_date);
            $given_end_date = strtotime($end_date);

            $date_not_available = false;
//            echo $sql_all_order ;
//echo "<pre>";
//var_dump($orders_of_users);
//exit;
            if (!empty($orders_of_users)) {
                
                $date_not_available = true;
            }

            if ($date_not_available) {
                $this->error = "DNA";
                $this->error_msg = "You already have a active package on this date";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }
			
			# check order note is given or not , if not given then fetch it from previous order 
			if($order_note_id == 0 || $order_note_id == '' || $order_note_id == NULL ){
				$orderNoteFetchQuery = "SELECT order_note_id FROM `order_master` WHERE `order_by` = 132 and order_note_id !=0 and order_status = 'success' ORDER BY `order_master_id` desc limit 0, 1";
				$orderNoteFetchList = $this->fireQuery($orderNoteFetchQuery);
				if($orderNoteFetchList != NULL ){
					if(isset($orderNoteFetchList[0])){
						$order_note_id = $orderNoteFetchList[0]['order_note_id'];
					}
				}
				
			}

            #purchase same package after completion of current package date done validation

            $coupon_master = $this->getDoctrine()->getManager()
                    ->getRepository("AdminBundle:Couponmaster")
                    ->findOneBy(array("coupon_code" => $coupon_code, 'is_deleted' => 0, 'status' => 'active'));
            if (empty($coupon_master) && !empty($coupon_code)) {
               
                $this->error = "IVCC"; // Invalid Coupon Code
                // $this->data = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }

            $order_master = $this->getDoctrine()->getManager()
                    ->getRepository("AdminBundle:Ordermaster")
                    ->findBy(array("unique_no" => $unique_code));

            $sql = "select unique_no from order_master order by order_master_id DESC LIMIT 0,1";
            $con = $this->getDoctrine()->getManager()->getConnection();
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $lastOrder = $stmt->fetchAll();

            if (!empty($lastOrder)) {
                $unique_code = $lastOrder[0]['unique_no'] + 1;
            } else {
                $unique_code = 1000;
            }

            $totalDays = floor((strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24));

            if (empty($order_master)) {
                $em = $this->getDoctrine()->getManager();
                $ordermaster = new Ordermaster();
                $ordermaster->setOrder_by($user_id);
                $ordermaster->setUnique_no($unique_code);
                $ordermaster->setPackage_id($package_id);
                $ordermaster->setSub_package_id($sub_package_id);
                $ordermaster->setDelivery_address_id($delivery_address_id);

                if ($app_mode == 'prod') {
                    $ordermaster->setOrder_status('pending');
                }

                if ($app_mode == 'dev') {
                    $ordermaster->setOrder_status('success');
                    $ordermaster->setTransaction_id(1);
                }
                if($total_amount==0){
                    $ordermaster->setOrder_status('success');
                    $ordermaster->setTransaction_id(1);
                }
                $ordermaster->setDomain_id(1);
                $ordermaster->setDelivery_datetime(date('Y-m-d H:i:s'));
                $ordermaster->setPackage_amount($package_amount);
                $ordermaster->setPackage_for($package_for);
                $ordermaster->setConsulatant_fee($consultant_fees);
                $ordermaster->setPromo_code_discount($promo_code_discount);
                $ordermaster->setPayment_amount($total_amount);
                $ordermaster->setPayment_type($payment_type);
                $ordermaster->setCreated_date(date('Y-m-d H:i:s'));
                $ordermaster->setLast_modified(date('Y-m-d H:i:s'));
                $ordermaster->setStart_date($start_date);

                $ordermaster->setDelivery_time_id($delivery_time_id);
                $ordermaster->setDelivery_method_id($delivery_method_id);

                //$ordermaster->setStart_date_timestamp($start_date_timestamp);
                $ordermaster->setEnd_date($end_date);
                $ordermaster->setCreated_by($user_id);
                $ordermaster->setIs_deleted(0);
                $ordermaster->setOrder_note_id($order_note_id);
                $ordermaster->setDelivery_method_notes($delivery_method_notes);
                $ordermaster->setDelivery_time_notes($delivery_time_notes);
                $em->persist($ordermaster);
                $em->flush();
                $invoice_id = $ordermaster->getOrder_master_id();
				
				
                $user_master->setOrder_note_id($order_note_id);
                $em->flush();
               
                if ($app_mode == 'dev' && $total_amount > $wallet_amount) {
                    $con = $em->getConnection();
                    $invoice_id = $ordermaster->getOrder_master_id();
                    $insert = "INSERT INTO `transaction_master`( `transaction_code`, `user_id`, `payment_id`, `result_code`, `ref_no`, `payment_type`, `payment_date`, `amount`, `payment_status`, `is_deleted`)"
                            . " VALUES ('" . $transaction_code . "', $user_id, '" . $payment_id . "', 0, '" . $ref_no . "','" . $payment_type . "','" . $transaction_date . "', $total_amount ,'success',0)";
                    $stmt = $con->prepare($insert);
                    $stmt->execute();
                }
                if ( $total_amount ==0) {
                    $con = $em->getConnection();
                    $invoice_id = $ordermaster->getOrder_master_id();
                    $insert = "INSERT INTO `transaction_master`( `transaction_code`,reference_no, `payment_mode`, `transaction_date`, `is_deleted`, `transaction_status`,`invoice_id`)"
                            . " VALUES ('0000','0000','','" . date('Y-m-d h:i:s') . "',0,'success','" . $invoice_id . "')";

                    $stmt = $con->prepare($insert);
                    $stmt->execute();
                }
                $order_id = $ordermaster->getOrder_master_id();
                if (!empty($coupon_master)) {
                    $couponusgaemaster = new Couponusagehistory();
                    $couponusgaemaster->setCoupon_id($coupon_master->getCoupon_master_id());
                    $couponusgaemaster->setOrder_id($order_id);
                    $couponusgaemaster->setUser_master_id($user_id);
                    $couponusgaemaster->setUsage_count(1);
                    $couponusgaemaster->setCreate_date(date('Y-m-d H:i:s'));
                    $couponusgaemaster->setDomain_id(1);
                    $couponusgaemaster->setIs_deleted(0);
                    $em->persist($couponusgaemaster);
                    $em->flush();
                }



                if($wallet_amount > 0 ){
                    $previos_amt = $wallet_master_info->getWallet_amount();
                    $after_transcation_amount = $previos_amt - $wallet_amount ;
                    $wallet_master_info->setWallet_amount($after_transcation_amount);
                    $em->flush();
                    
                    $wallet_transaction_history = new Wallettransactionhistory();
                    $wallet_transaction_history->setWallet_master_id($wallet_master_info->getWallet_master_id());
                    $wallet_transaction_history->setUser_master_id($user_id);
                    $wallet_transaction_history->setWallet_action('minus');
                    $wallet_transaction_history->setPrevious_amount($previos_amt);
                    $wallet_transaction_history->setAfter_action_amount($after_transcation_amount);
                    $wallet_transaction_history->setTransaction_for('package_purchase');
                    $wallet_transaction_history->setTransaction_for_id( $invoice_id);
                    $wallet_transaction_history->setTransaction_amount($wallet_amount);
                    $wallet_transaction_history->setAction_created_datetime(date("Y-m-d H:i:s"));
                    $wallet_transaction_history->setIs_deleted(0);
                    $em->persist($wallet_transaction_history);
                    $em->flush();
                    $wallet_transaction_history_id = $wallet_transaction_history->getWallet_transaction_history_id();

                    if($wallet_amount > 0  && $total_amount <= 0  ){
                        $transcation_master = new Transcationmaster();
                        $transcation_master->setTransaction_code(time());
                        $transcation_master->setReference_no($wallet_transaction_history_id);
                        $transcation_master->setInvoice_id($ordermaster->getOrder_master_id());
                        $transcation_master->setPayment_mode('wallet');
                        $transcation_master->setTransaction_date(date("Y-m-d H:i:s"));
                        $transcation_master->setTransaction_status('success');
                        $transcation_master->setIs_deleted(0);
                        $em->persist($transcation_master);
                        $em->flush();

                        $transcation_master_id = $transcation_master->getTranscation_master_id();
                        $ordermaster->setTransaction_id($transcation_master_id);
                         $ordermaster->setOrder_status('success');
                        $em->flush();
                    }
                }
                
               

                #save total meal_types in order
                if (!empty($ordermaster->getOrder_master_id())) {

                    $today_date = date('Y-m-d H:i:s');

                    $con = $em->getConnection();

                    $newOrderpackageupgradehistory = new Orderpackageupgradehistory();
                    $newOrderpackageupgradehistory->setOrder_id($order_id);
                    $newOrderpackageupgradehistory->setPackage_id($package_id);
                    $newOrderpackageupgradehistory->setStart_from_date($start_date);
                    $newOrderpackageupgradehistory->setCreated_datetime($today_date);
                    $newOrderpackageupgradehistory->setAdded_flag('default');
                    $newOrderpackageupgradehistory->setIs_archive(0);
                    $newOrderpackageupgradehistory->setIs_deleted(0);
                    $newOrderpackageupgradehistory->setTotal_amount($total_amount);
                    $newOrderpackageupgradehistory->setPayment_method($payment_type);

                    if ($app_mode == 'prod') {
                        $newOrderpackageupgradehistory->setPayment_status('pending');
                        $newOrderpackageupgradehistory->setStatus('pending');
                    }

                    if ($app_mode == 'dev'||$total_amount==0) {
                        $newOrderpackageupgradehistory->setPayment_status('success');
                        $newOrderpackageupgradehistory->setStatus('paid');
                    }

                    $em->persist($newOrderpackageupgradehistory);
                    $em->flush();

                    $order_package_upgrade_history_id = $newOrderpackageupgradehistory->getOrder_package_upgrade_history_id();

                    $sqlGetCombinations = "select * from sub_package_combination_master
                                        JOIN product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                                        JOIN package_per_category_master ON package_per_category_master.meal_type_id = sub_package_combination_master.meal_type_id 
                                        where sub_package_combination_master.sub_package_id = '$sub_package_id' and sub_package_combination_master.is_deleted = 0 group by sub_package_combination_master.sub_package_combination_master_id ";

                    $combinations = $this->fireQuery($sqlGetCombinations);
                    /*                      
                      $totalMealtypes = array(
                      "meal" => 0 ,
                      "snacks" => 0,
                      "soup" => 0
                      );

                      if(!empty($combinations)){
                      foreach($combinations as $_combinations){
                      if($_combinations['count_in'] == 'meal'){
                      $totalMealtypes['meal'] = $totalMealtypes['meal'] + $_combinations['meal_value'];
                      }

                      if($_combinations['count_in'] == 'snacks'){
                      $totalMealtypes['snacks'] = $totalMealtypes['snacks'] + $_combinations['meal_value'];
                      }

                      if($_combinations['count_in'] == 'soup'){
                      $totalMealtypes['soup'] = $totalMealtypes['soup'] + $_combinations['meal_value'];
                      }
                      }
                      }
                     */
                    if (!empty($combinations)) {
                        foreach ($combinations as $_combinations) {
                            $newTotalCombination = new Ordermealtypesincluderelation();

                            $newTotalCombination->setOrder_package_upgrade_history_id($order_package_upgrade_history_id);
                            $newTotalCombination->setOrder_id($order_id);
                            $newTotalCombination->setAdded_flag('default');
                            $newTotalCombination->setMeal_type($_combinations['meal_type_id']);
                            $newTotalCombination->setPrice($_combinations['unit_price']);
                            $newTotalCombination->setDays($totalDays);
                            $newTotalCombination->setTotal_meal_type($_combinations['meal_value']);
                            $newTotalCombination->setCreated_datetime(date('Y-m-d H:i:s'));
                            $newTotalCombination->setLast_updated_on(date('Y-m-d H:i:s'));
                            $newTotalCombination->setIs_archive(0);
                            $newTotalCombination->setStart_from_date($start_date);
                            $newTotalCombination->setIs_deleted(0);

                            $em->persist($newTotalCombination);
                            $em->flush();
                        }
                    }

                    if(!empty($all_dislikes)){
                        $all_dislikes = explode(",", $all_dislikes);
                        foreach($all_dislikes as $dislike){
                            $orderingredient = new Orderingredientrelation();

                            $orderingredient->setUser_id($user_id);
                            $orderingredient->setOrder_id($order_id);
                            $orderingredient->setIngredient_master_id($dislike);
                            $orderingredient->setIs_deleted(0);

                            $em->persist($orderingredient);
                            $em->flush();
                        }
                    }

                    if(!empty($all_allergy)){
                        $all_allergy = explode(",", $all_allergy);
                        foreach($all_allergy as $allergy){
                            $orderallergy = new Orderallergyrelation();

                            $orderallergy->setUser_id($user_id);
                            $orderallergy->setOrder_id($order_id);
                            $orderallergy->setAllergy_master_id($allergy);
                            $orderallergy->setIs_deleted(0);

                            $em->persist($orderallergy);
                            $em->flush();
                        }
                    }
                    
                }
                #save total meal_types in order done
                #save Off days
                if (!empty($off_days)) {
                    foreach ($off_days as $_off_days) {
                        $newOffDay = new Orderoffdaysrelation();
                        $newOffDay->setOrder_id($order_id);
                        $newOffDay->setOff_day($_off_days->main_days_master_id);
                        $newOffDay->setCreated_datetime(date('Y-m-d H:i:s'));
                        $newOffDay->setIs_deleted(0);

                        $em->persist($newOffDay);
                        $em->flush();
                    }
                }
                #save Off days done
                #update Loyalty Points
                $user_master = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Usermaster")
                        ->findOneBy(array("user_master_id" => $user_id, 'is_deleted' => 0));
                        $url = null;
                if ($user_master) {

               
                    $package_master = $this->getDoctrine()->getManager()
                            ->getRepository("AdminBundle:Packagemaster")
                            ->findOneBy(array("main_package_master_id" => $package_id, 'is_deleted' => 0));
                    if ($package_master) {
                        $pk_points = $package_master->getLoyality_point();
                        if (!empty($pk_points)) {
                            $loyalty_points = $user_master->getLoyalty_points();

                            $loyalty_points = $loyalty_points + $pk_points;

                            $user_master->setLoyalty_points($loyalty_points);

                            $em->flush();
                        }
                    }
                    //    $url = 'http://anonadiet.com/admin/payment/index.php?custname='.$user_master->getUser_firstname().'&custemail='.$user_master->getEmail().'&phone='.$user_master->getUser_mobile().'&totAmount='.$total_amount.'&productnames='.str_replace(' ', '',$package_master->getPackage_name()).'&order_id_app='.$order_id.'&user_id='.$user_id;
                }
                $payment = true;
                if($total_amount==0){
                    $payment=false;
                }

                $order_id = $ordermaster->getOrder_master_id();
                 $response = array('purchase_id' => $order_id,
                    'payment_url'=>$url,
                    'payment'=>$payment);
                $this->error = "SFD";
            } else {
                $this->error = "DPO"; // Unique code must different
            }
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Ordermaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }
    /**
     * @Route("/ws/payNow/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function payNowAction($param){

        $this->title = "Pay Now";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('username', 'email', 'mobile', 'total_amount', 'productName', 'package_for', 'start_date', 'user_id'),
            ),
        );
        if ($this->validateData($param)) {
            $customerName = $param->username;
            $email = $param->email;
            $mobile = $param->mobile;
            $total_amount = $param->total_amount;  
            $productName = $param->productName;
            $package_for = $param->package_for;
            $start_date = $param->start_date;
            $user_id = $param->user_id;
            if (! function_exists( 'curl_version' )) {
                exit ( "Enable cURL in PHP" );
            }
            if(strtotime($start_date) <= strtotime(date("Y-m-d")) ){
                $this->error = "PIW";
                $this->error_msg = "Start date Passed";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }

            $order_start_date = strtotime($start_date);
            $end_date = date('Y-m-d', $order_start_date);
            $sql_all_order = "select start_date,end_date from order_master 
                                    where order_status = 'success' and order_by = '$user_id' and is_deleted = 0 and 
                                    ( (start_date BETWEEN '$start_date' AND '$end_date' 
                                    OR end_date BETWEEN '$start_date' AND '$end_date'))";
            $orders_of_users = $this->firequery($sql_all_order);
            if (!empty($orders_of_users)) {
                $this->error = "DNA";
                $this->error_msg = "You already have a active package on this date";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }

            // Only for production //

            // $merchanr_id = 7708;
            // $username = 'Nutreeze';
            // $password = 'prEzeg6j5]aM';
            // $apiKey = '138f952ee80b175b0b6d4650a3fa504ad8535110';
            // $encAPIkey = '$2y$10$xOVlg9nZ800vUBorj4d0AOGwM3PU3M8KyuPAxtYEDIFms5njzuOKi';
            // $testMode = 0;
           
            $fields = array(
                'merchant_id'=>'1201',
                'username' => 'test',
                'password'=>stripslashes('test'), 
                'api_key'=>'jtest123', // in sandbox request
                //'api_key' =>password_hash('API_KEY',PASSWORD_BCRYPT), //In production mode, please pass API_KEY with BCRYPT function
                'order_id'=>time(), // MIN 30 characters with strong unique function (like hashing function with time)
                'total_price'=>$total_amount,
                'CurrencyCode'=>'KWD',//only works in production mode
                'CstFName'=>$customerName,
                'CstEmail'=>$email,
                'CstMobile'=>$mobile,
                'success_url'=>'https://example.com/success.html', 
                'error_url'=>'https://example.com/error.html', 
                'test_mode'=>1, // test mode enabled
                'whitelabled'=>true, // only accept in live credentials (it will not work in test)
                'payment_gateway'=>'knet',// only works in production mode
                'ProductName'=>json_encode([$productName])
                // 'ProductQty'=>json_encode([2,1]),
                // 'ProductPrice'=>json_encode([150,1500]),
                // 'reference'=>'Ref00001'
            );

            // Sandbox: https://api.upayments.com/test-payment 
            // Production: https://api.upayments.com/payment-request


            $fields_string = http_build_query($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/test-payment");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            $server_output = json_decode($server_output,true);

            $response = $server_output;
            $this->error = "SFD";
        }
        else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Ordermaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
    }
    /**
     * @Route("/ws/checkCouponRedemption_notinuse/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function checkCouponRedemption_notinuseAction($param) {

        //try{
        $this->title = "Coupon Redemption";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'coupon_code', 'total_amount'),
            ),
        );

        if ($this->validateData($param)) {
            $user_id = $param->user_id;
            $coupon_code = $param->coupon_code;
            $total_amount = $param->total_amount;

            $em = $this->getDoctrine()->getManager();

            $coupon_details = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponmaster')->findOneBy(array('coupon_code' => $coupon_code, 'is_deleted' => 0));


            if ($coupon_details) {
                $today = strtotime(date('Y-m-d'));
                $start_date = strtotime($coupon_details->getStart_date());
                $end_date = strtotime($coupon_details->getEnd_date());

                $main_coupon_id = $coupon_details->getCoupon_master_id();


                if ($today >= $start_date && $today <= $end_date) {



                    $min_loyalty_points = $coupon_details->getLoyalty_points();

                    $discount_value = $coupon_details->getDiscount_value();
                    $discount_type = $coupon_details->getDiscount_type();
                    $coupon_name = $coupon_details->getCoupon_name();
                    $coupon_code = $coupon_details->getCoupon_code();

                    if ($discount_type == 'amount') {
                        $total_amount = $total_amount - $discount_value;
                    }

                    if ($discount_type == 'percentage') {
                        $total_amount = $total_amount - ( ( $total_amount * $discount_type ) / 100 );
                    }
                    $no_of_times_use = $coupon_details->getNo_of_times_use();

                    $user_master = $this->getDoctrine()->getManager()
                            ->getRepository("AdminBundle:Usermaster")
                            ->findOneBy(array("user_master_id" => $user_id, 'is_deleted' => 0));

                    if ($user_master) {
                        #checkUsage in Couponusagehistory
                        $coupon_use_details = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponusagehistory')->findOneBy(array('user_master_id' => $user_id, 'coupon_id' => $main_coupon_id, 'is_deleted' => 0));

                        if ($coupon_use_details) {
                            if ($coupon_use_details->getUsage_count() < $no_of_times_use) {
                                $use_count = $coupon_use_details->getUsage_count() + 1;
                                $coupon_use_details->setUsage_count($use_count);
                                $em->flush();

                                $loyalty_points = $user_master->getLoyalty_points();
                                $loyalty_points = $loyalty_points - $min_loyalty_points;

                                $user_master->setLoyalty_points($loyalty_points);

                                $em->flush();

                                $response = array('total_amount' => $total_amount);
                                $this->error = "SFD";
                                $this->data = $response;
                                return $this->responseAction();
                            } else {
                                $this->error = "CUE"; //Coupon Usage Exhausted
                                return $this->responseAction();
                            }
                        }
                        else {
                            $couponusgaemaster = new Couponusagehistory();
                            $couponusgaemaster->setCoupon_id($main_coupon_id);
                            $couponusgaemaster->setUser_master_id($user_id);
                            $couponusgaemaster->setUsage_count(1);
                            $couponusgaemaster->setCreate_date(date('Y-m-d H:i:s'));
                            $couponusgaemaster->setDomain_id(1);
                            $couponusgaemaster->setIs_deleted(0);
                            $em->persist($couponusgaemaster);
                            $em->flush();

                            $loyalty_points = $user_master->getLoyalty_points();
                            $loyalty_points = $loyalty_points - $min_loyalty_points;

                            $user_master->setLoyalty_points($loyalty_points);

                            $em->flush();

                            $response = array('total_amount' => $total_amount);
                            $this->error = "SFD";
                            $this->data = $response;
                            return $this->responseAction();
                        }
                    } else {
                        $this->error = "UNE";
                        return $this->responseAction();
                    }
                } else {

                    $this->error = "TNV"; //Time not valid
                    return $this->responseAction();
                }
            } else {
                $this->error = "CNE";
                return $this->responseAction();
            }
        } else {
            $this->error = "PIM";
            return $this->responseAction();
        }
        if (empty($response)) {
            $this->error = "NRF";
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Ordermaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }
     /**
     * @Route("/ws/duplicate/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
public function duplicate(){
   /* $sql_avail = "UPDATE product_master SET product_name = CONCAT(product_name,'_Extra' ) where main_product_category_id=2";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();
                die;*/
            $sql_avail = "SELECT *  FROM `product_master` WHERE `product_name` LIKE '%_Small%' and main_product_category_id=2 and created_datetime>='2021-07-12 22:19:00' ";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();
                die;
                   

     $em = $this->getDoctrine()->getManager();
         $combinations = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->findBy(array('is_deleted' => 0, 'language_id' =>1,'main_product_category_id'=>2));
                foreach ($combinations as $key => $comb) {
                 $name = str_replace("_Extra","",$comb->getProduct_name());
                $new_product = new Productmaster();
                $new_product->setProduct_name($name);
                $new_product->setProduct_description($comb->getProduct_description());
                $new_product->setProduct_nutrition($comb->getProduct_nutrition());
                $new_product->setCalory($comb->getCalory());
                $new_product->setProt($comb->getProt());
                $new_product->setCarb($comb->getCarb());
                $new_product->setFat($comb->getFat());
                $new_product->setFiber($comb->getFiber());
                $new_product->setPackage_id(0);
                $new_product->setLanguage_id($comb->getLanguage_id());
                $new_product->setMain_product_master_id(0);
                $new_product->setProduct_status($comb->getProduct_status());
                $new_product->setMax_meal_value($comb->getMax_meal_value());
                $new_product->setMain_product_category_id($comb->getMain_product_category_id());
                $new_product->setProduct_image($comb->getProduct_image());
                $new_product->setIs_deleted(0);
                $new_product->setCreated_datetime(date('Y-m-d H:i:s'));

                $em->persist($new_product);
                $em->flush();


                
                    $main_product_master_id = $new_product->getProduct_master_id();
                    $new_product->setMain_product_master_id($main_product_master_id);
                    $em->flush();
                

                #multiple package entry changes product_package_relation
                $existed_package_entry = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productpackagerelation")->findBy(array('is_deleted' => 0, 'main_product_id' => $main_product_master_id));

                if ($existed_package_entry) {
                    foreach ($existed_package_entry as $existed_pack) {
                        $existed_pack->setIs_deleted(1);
                        $em->flush();
                    }
                }
             $product_package = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productpackagerelation")->findBy(array('is_deleted' => 0, 'main_product_id' => $comb->getMain_product_master_id()));
                #newPackageEntry
                if (!empty($product_package)) {
                    foreach ($product_package as $pro_pack) {
                        $new_pack = new Productpackagerelation();
                        $new_pack->setMain_product_id($main_product_master_id);
                        $new_pack->setMain_package_id($pro_pack->getMain_package_id());
                        $new_pack->setIs_deleted(0);
                        $em->persist($new_pack);
                        $em->flush();
                    }
                }

              
               
                #both language changes

                $product_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->findBy(array('main_product_master_id' => $main_product_master_id, 'is_deleted' => 0));

                if ($product_all_lang) {
                    foreach ($product_all_lang as $lang_product) {
                        $lang_product->setProduct_status($comb->getProduct_status());
                        $lang_product->setMain_product_category_id($comb->getMain_product_category_id());
                        $lang_product->setMax_meal_value($comb->getMax_meal_value());
                        $lang_product->setCalory($comb->getCalory());
                $lang_product->setProt($comb->getProt());
                $lang_product->setCarb($comb->getCarb());
                $lang_product->setFat($comb->getFat());
                $lang_product->setFiber($comb->getFiber());
                       
                        $em->flush();
                    }
                }

                $comboDeleted = false;
                $raw_egg = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' =>$comb->getMain_product_master_id(), 'is_deleted' => 0, "prot_type" => 'raw_eggs'));
                if (!empty($raw_egg)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'raw_eggs'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }
                     
                    if(!empty($raw_egg)){
                        foreach ($raw_egg as  $raw_egg_value) {
                            $main_combination_id = 0;

                            if (!empty($raw_egg_value)) {
                                $new_combo = new Productcombinationmaster();
                                $new_combo->setProduct_master_id($main_product_master_id);
                                $new_combo->setProt_crab($raw_egg_value->getProt_crab());
                                $new_combo->setProt_type('raw_eggs');
                                $new_combo->setSub_pakage_id($raw_egg_value->getSub_pakage_id());
                                $new_combo->setMain_combination_id($main_combination_id);
                                $new_combo->setLanguage_id(1);
                                $new_combo->setIs_deleted(0);

                                $em->persist($new_combo);
                                $em->flush();

                                if ($main_combination_id == 0) {
                                    $main_combination_id = $new_combo->getProduct_combination_master_id();
                                }
                                $new_combo->setMain_combination_id($main_combination_id);
                                $em->flush();
                            }
                        }
                    }
                }

                $sql_avail = "UPDATE product_availability SET is_deleted = '1' WHERE main_product_id = '$main_product_master_id' ";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();

                $sql_avail = "select * from product_availability   WHERE main_product_id = '".$comb->getMain_product_master_id()."' and week_id='week1,week3,week5' ";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();
        if (!empty($stmt)) {
                    foreach ($stmt as $smt) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($smt['main_days_id']);
                        $new_combo->setWeek_id('week1,week3,week5');
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }
 $sql_avail = "select * from product_availability  WHERE main_product_id = '".$comb->getMain_product_master_id()."' and week_id='week2,week4' ";
                $stmt2 = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt2->execute();
                if (!empty($stmt2)) {
                    foreach ($stmt2 as $smtt) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($smtt['main_days_id']);
                        $new_combo->setWeek_id('week2,week4');
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }
             
               
                #combo display changes
                $existEntry = $em->getRepository("AdminBundle:Productcombodisplayrelation")->findBy(["product_id"=>$main_product_master_id,'is_deleted'=>0]);
                if($existEntry){
                    foreach($existEntry as $_existEntry){
                        $_existEntry->setIs_deleted(1);
                        $em->flush();
                    }
                }
                $combin = $em->getRepository("AdminBundle:Productcombodisplayrelation")->findBy(["product_id"=>$comb->getMain_product_master_id(),'is_deleted'=>0]);
                if(!empty($combin)){
                    if($combin->getCombo_type() != 'none'){
                        $newProductcombodisplayrelation = new Productcombodisplayrelation();
                        $newProductcombodisplayrelation->setProduct_id($main_product_master_id); 
                        $newProductcombodisplayrelation->setCombo_type($combin->getCombo_type()); 
                        $newProductcombodisplayrelation->setCreated_datetime(date('Y-m-d H:i:s'));
                        $newProductcombodisplayrelation->setIs_deleted(0);
                        
                        $em->persist($newProductcombodisplayrelation);
                        $em->flush();

                    }
                }
                  }
}
}

?>
