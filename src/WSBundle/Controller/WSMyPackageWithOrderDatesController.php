<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Packagemaster;

class WSMyPackageWithOrderDatesController extends WSBaseController {

    /**
     * @Route("/ws/mypackagewithorderdates/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function mypackagewithorderdatesAction($param) {
        

    //   try {
            $this->title = "My Package with order dates";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('lang_id', 'user_id'),
                ),
            );
            $sub_packages_data = NULL ; 
            if ($this->validateData($param)) {
                date_default_timezone_set("Asia/Kuwait");
                $lang_id = $param->lang_id;
                $user_id = $param->user_id;
                 $display_passed_dates =  !empty($param->display_passed_dates) ? $param->display_passed_dates : "yes" ;
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $query = "SELECT * FROM order_master 
				JOIN package_master ON order_master.package_id=package_master.main_package_master_id 
				JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id 
                                WHERE  order_master.order_status != 'cancel' AND  order_master.order_by='$user_id' AND  order_master.transaction_id != 0 AND order_master.order_status != 'pending' AND order_master.is_deleted=0
                                 AND ( (order_master.end_date >='" . date('Y-m-d') . "' and pause_status = 'no' )  or (   pause_status = 'yes'  ) )  and package_master.is_deleted = 0 and package_master.language_id = ". $lang_id ." group by order_master_id 
                                order by order_master.start_date";
                                
                $statement = $connection->prepare($query);
                $statement->execute();
                $order_info = $statement->fetchAll();
		


                if (!empty($order_info)) {
                    foreach ($order_info as $key => $val) {
                        $order_status = $val['order_status'];
                        $totalComboCount = array(
                            'breakfast' => 0,
                            'meals' => 0,
                            'snacks' => 0,
                            'soup' => 0,
                        );

                        $sub_p_id = $val['sub_package_id'];
                        $package_for_id = $val['package_for'];
                        $main_package_id = $val['package_id'];
                      

                        $img_arr = $this->getMediaDetailAction($val['img_id']);
                        $img_url = null;
                        if (!empty($img_arr)) {
                            $img_url = $img_arr['url'];
                        }

                        if ($key == 0) {
                            $status = 'active';
                        } else {
                            $status = 'upcoming';
                        }

                        #new SubPackage Details
                        #getSubPackages

                        $sql_pk_for = "select main_package_for_master_id,days,description,name,name_db from package_for_master where is_deleted = 0 and type='package_for' and main_package_for_master_id = '$package_for_id' group by main_package_for_master_id";
                        $pk_for = $this->fireQuery($sql_pk_for);

                        $package_duration = '';
                        $pk_for_data = null;

                        $availabel_for_off_days = false;
                        $availabel_for_suspend_days = false;
                        $available_for_upgrade = false;

                        $is_monthly_package = false;
                        $is_daily_package = false;

                        if (!empty($pk_for)) {
                            if ($pk_for[0]['main_package_for_master_id'] == 1) {
                                $is_monthly_package = true;
                                $availabel_for_off_days = true;
                                $available_for_upgrade = true;
                            }

                            if ($pk_for[0]['main_package_for_master_id'] == 11) {
                                $is_daily_package = true;
                            }

                            $pk_for_data = array(
                                "main_package_for_master_id" => $pk_for[0]['main_package_for_master_id'],
                                "days" => $pk_for[0]['days'],
                                "name" => $pk_for[0]['name'],
                            );

                            $package_duration = $pk_for[0]['name_db'];
                        }
                        $sql_get_sub_packages = "select * from sub_package_master 
                        JOIN sub_package_price_master ON sub_package_master.main_sub_package_id = sub_package_price_master.sub_package_id 
                        where sub_package_master.is_deleted = 0 and sub_package_price_master.is_deleted = 0 
                        and sub_package_price_master.sub_package_id = '$sub_p_id' and sub_package_master.main_package_id = '$main_package_id' and sub_package_price_master.duration_type = '$package_duration' ";

                        $sub_packages = $this->fireQuery($sql_get_sub_packages);

                        if (!empty($sub_packages)) {
                            foreach ($sub_packages as $_sub_packages) {

                                $sub_pk_id = $_sub_packages['main_sub_package_id'];
                                $price = $_sub_packages['price'];
                                $min_limit = $_sub_packages['min_limit'];
                                $max_limit = $_sub_packages['max_limit'];

                                $sub_package_combo = null;
                                $sql_get_sub_package_combo = "select sub_package_combination_master.meal_value,
                                product_category_master.product_category_name,product_category_master.main_product_category_master_id,
                                product_category_master.count_in,sub_package_combination_master.sub_package_id 
                                from sub_package_combination_master 
                                JOIN product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                                where sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and sub_package_combination_master.sub_package_id = '$sub_p_id' and product_category_master.language_id = ". $lang_id ." group by sub_package_combination_master.sub_package_combination_master_id";

                                $sub_packages_combo = $this->fireQuery($sql_get_sub_package_combo);

                                $totalMeals = 0;
                                $totalSnacks = 0;
                                $totalSoup = 0;
                                $totalBreakfast = 0;

                                if (empty($sub_packages_combo)) {
                                    $sub_packages_combo = null;
                                } else {
                                    foreach ($sub_packages_combo as $_sub_packages_combo) {
                                        if ($_sub_packages_combo['count_in'] == 'meal') {
                                            $totalMeals += $_sub_packages_combo['meal_value'];
                                        }
                                        if ($_sub_packages_combo['count_in'] == 'snacks') {
                                            $totalSnacks += $_sub_packages_combo['meal_value'];
                                        }
                                        if ($_sub_packages_combo['count_in'] == 'soup') {
                                            $totalSoup += $_sub_packages_combo['meal_value'];
                                        }
                                        if ($_sub_packages_combo['count_in'] == 'breakfast') {
                                            $totalBreakfast += $_sub_packages_combo['meal_value'];
                                        }
                                    }
                                }

                                $totalComboCount = array(
                                    'meals' => $totalMeals,
                                    'snacks' => $totalSnacks,
                                    'soup' => $totalSoup,
                                    'breakfast' => $totalBreakfast,
                                );

                                $sub_packages_data = array(
                                    "sub_package_id" => $_sub_packages['main_sub_package_id'],
                                    "price" => $price,
                                    "max_limit"=>$max_limit,
                                    "min_limit"=>$min_limit,
                                    "total_combo_count" => $totalComboCount,
                                    "sub_package_combo" => $sub_packages_combo,
                                );
                            }
                        }

                   
#check package contains any video or not
                        $sql_check_video = "select video_package_relation_id from video_package_relation where is_deleted = 0
                                            and package_id = '$main_package_id'";
                        $videos = $this->fireQuery($sql_check_video);
                        $available_for_video = ( count($videos) > 0 ) ? true : false;

#check package contains any video or not done
                        #remaining Days exclude off_days , suspended days and added meal days
                        $order_id = $val['order_master_id'];
                        $order_start_date = strtotime($val['start_date']);
                        $order_end_date = strtotime($val['end_date']);

                        #this not include date itself from start...
                        $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;

                        $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
						JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
						where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

                        $offDays = $this->fireQuery($sql);
                        $offDaysArray = array();

                        $total_off_days = 0;

                        $date_passed = 0;
                        $today = strtotime(date('Y-m-d'));

                        if (!empty($offDays)) {
                            foreach ($offDays as $_offDays) {
                                $offDaysArray [] = $_offDays['main_days_master_id'];
                            }
                        }

                        $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                                array(
                                    "order_id" => $order_id,
                                    "is_deleted" => 0
                                )
                        );

                        $freezedOnce = false;

                        $supend_start_date = null;
                        $supend_end_date = null;
                        $supend_start_date_response = null;
                        $supend_end_date_response = null;

                        $suspendedFridays = array();
                        $suspendedOffDays = array();

                        $freezeDays = array();

                        $suspesion_days = 0;
                        if ($checkFreeze) {
                            $freezedOnce = true;

                            foreach ($checkFreeze as $_checkFreeze) {
                                $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getStart_date())));
                                $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getEnd_date())));

                                $supend_start_date_response = date('Y-m-d', $supend_start_date);
                                $supend_end_date_response = date('Y-m-d', $supend_end_date);

                                while ($supend_start_date <= $supend_end_date) {

                                    $freezeDays [] =  date('Y-m-d', $supend_start_date);
                                    $suspesion_days += 1;

                                    $supend_start_date = strtotime("+1 day", $supend_start_date);
                                }
                            }
                        }
                        $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                                array(
                                    "order_id" => $order_id,
                                    "is_deleted" => 0
                                )
                        );
                        $PauseDays =  [] ;
                        $pause_start_date = $pasue_end_date = NULL ;
                        $pause_days = 0 ;
                        if ($checkPause) {
                            $pauseOnce = true;
                            foreach ($checkPause as $_checkPause) {
                                $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_start_date())));
                                $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date())));

                                $pause_start_date_response = date('Y-m-d', $pause_start_date);
                                $pasue_end_date_response = date('Y-m-d', $pasue_end_date);

                                while ($pause_start_date <= $pasue_end_date) {

                                  // added = with <= due to resume with customer issue

                                    $PauseDays [] = date('Y-m-d', $pause_start_date);
                                    $pause_days += 1;

                                    $pause_start_date = strtotime("+1 day", $pause_start_date);
                                }
                                //-----reset it -----------for next loop----------------
                                 $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_start_date())));
                            }
                        }

                        $order_start_date = strtotime($val['start_date']);
                        $offDaysDate = [];
                        $totalDaysDateArray = []; 
                        $passed_days_dateArray = [] ;
                        $day_passed = 0 ;
                        $i=0;
                        $booking_display_date=NULL;
                        while ($order_start_date <= $order_end_date) {
                            $totalDaysDateArray[] =  date('Y-m-d', $order_start_date);
                            //if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                            if (( in_array(date('N', $order_start_date), $offDaysArray)  ) && !in_array($order_start_date, $freezeDays)) {
                                $total_off_days += 1;
                                $offDaysDate [] = date('Y-m-d', $order_start_date);
                            }

                           if ($order_start_date <= $today) {
                                $passed_days_dateArray[] =  date('Y-m-d', $order_start_date);
                                $day_passed += 1;
                            }
                            $date1 = strtotime(date('Y-m-d 12:00'));
                            $date2 = strtotime(date('Y-m-d H:i'));
                            if($date1>$date2){
                                 if($order_start_date >= strtotime("+2 day")&&$i==0){
                               
                                $i++;
                                $booking_start_date = $order_start_date;
                                $booking_display_date = date('Y-m-d',$order_start_date);
                            }
                        }else{
                             if($order_start_date >= strtotime("+3 day")&&$i==0){
                               
                                $i++;
                            $booking_start_date = $order_start_date;
                            $booking_display_date = date('Y-m-d',$order_start_date);
                            }
                        }

                            $order_start_date = strtotime("+1 day", $order_start_date);
                        }

                    //    var_dump($totalDaysDateArray);
                      //  var_dump($offDaysDate);
                      //  var_dump($freezeDays);
                     //   var_dump($PauseDays);
                        foreach($totalDaysDateArray as $tdkey => $tdval){
                            if(in_array($tdval,$passed_days_dateArray)){
                                unset($totalDaysDateArray[$tdkey]);
                            }
                            if(in_array($tdval,$offDaysDate)){
                                unset($totalDaysDateArray[$tdkey]);
                            }
                             if(in_array($tdval,$freezeDays)){
                                unset($totalDaysDateArray[$tdkey]);
                            }
                            if(in_array($tdval,$PauseDays)){
                                unset($totalDaysDateArray[$tdkey]);
                            }
                        }
                        $total_days = count($totalDaysDateArray);
                        // print_r(count($totalDaysDateArray));
                        $Remaining_days_bf_pause_date = 0 ; 
                        $order_start_date = strtotime($val['start_date']);
                       
                        while ($order_start_date < $pause_start_date) {
                          if(in_array(date('Y-m-d', $order_start_date),$passed_days_dateArray)){
                                
                          }
                          elseif(in_array(date('Y-m-d', $order_start_date),$offDaysDate)){
                               
                          }
                          elseif(in_array(date('Y-m-d', $order_start_date),$freezeDays)){
                                
                          }
                          elseif(in_array(date('Y-m-d', $order_start_date),$PauseDays)){
                               
                          }
                          else{
                            $Remaining_days_bf_pause_date++ ;
                          }
                          $order_start_date = strtotime("+1 day", $order_start_date);
                        }
                        $remaining_days = count($totalDaysDateArray) ;
                        // print_r($remaining_days);
                        $meal_added_days = 0;

                        $sql_meal_added = "select count(order_meal_relation_id) as added_meal_day
											from order_meal_relation
											where order_master_id = '$order_id' and is_deleted = 0";
                        $mealAddedDays = $this->fireQuery($sql_meal_added);
                        if (!empty($mealAddedDays)) {
                            $meal_added_days = $mealAddedDays[0]['added_meal_day'];
                        }

                       
                        if ($remaining_days > 3 && $is_monthly_package) {
                            $availabel_for_suspend_days = true;
                        }

                        if ($freezedOnce) {
                            $availabel_for_suspend_days = false;
                        }
                        $days_array = array(
                            "offDaysDate" => $offDaysDate,
                            "suspendedFridays" => $suspendedFridays,
                            'totalDays' => $totalDays,
                            'date_passed' => $date_passed,
                            'suspesion_days' => $suspesion_days,
                            'meal_added_days' => $meal_added_days,
                            'total_off_days' => $total_off_days,
                        );
                        $currentDate = date("Y-m-d");

                        $pause_package = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackage")->findBy(array("order_id"=>$val['order_master_id'],"is_deleted"=>0));
                        $pause_package_arr = NULL ;
                        $single_pause_details  = NULL ;
                        $updateRemaining_daysFlag = false ; 
                        $remaining_days_of_pause = NULL ; 
                        if($pause_package ){
                         
                          

                          $current_pause_stauts = 'no';
                          $admin_resumed = 'NA';
                          $admin_resumed_bt_resume_by_customer = 'NA';
                          $break_flag = false ; 
                          foreach($pause_package  as $pppkey=>$pppval){

                             $pause_start_dateA = date("Y-m-d",strtotime($pppval->getPause_start_date())) ;
                            $pause_end_dateA = date("Y-m-d",strtotime($pppval->getPause_end_date())) ;
                            if($break_flag == false ){
                            $break_flag = false ; 
                            $pause_package_history =  $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->findOneBy(array("pause_package_history_id"=>$pppval->getPause_package_history_id() ));
                            $resume_choice = NULL ;
                            if($pause_package_history){
                              $resume_choice = $pause_package_history->getResume_choice();
                            }
                            if($resume_choice == 'admin'){
                              if($pppval->getPause_end_date()  != NULL  ){
                                $admin_resumed = 'yes';
                              }
                              else if($pppval->getPause_end_date()  == NULL  ){
                                $admin_resumed = 'no';
                                $updateRemaining_daysFlag = true ; 
                              }

                              if(strtotime($currentDate) >= strtotime($pause_start_dateA) && strtotime($currentDate) <= strtotime($pause_end_dateA) && $pppval->getPause_end_date() != NULL ){
                                $current_pause_stauts = 'yes';
                                 $break_flag = true ; 
                              }
                              elseif(strtotime($currentDate) >= strtotime($pause_start_dateA) && $pppval->getPause_end_date() == NULL ){
                                $current_pause_stauts = 'yes';
                                 $break_flag = true ; 
                              }


                            }
                            else if($resume_choice == 'customer'){

                              if($pppval->getPause_end_date()  != NULL && $pppval->getPause_end_date_by_update() == NULL ){
                                 $admin_resumed = 'yes';
                                $admin_resumed_bt_resume_by_customer = 'no';
                                $updateRemaining_daysFlag = true ; 
                              }
                              else if($pppval->getPause_end_date()  != NULL && $pppval->getPause_end_date_by_update() != NULL ){
                                $admin_resumed_bt_resume_by_customer = 'yes';
                                 $admin_resumed = 'yes';
                              }
                              else if($pppval->getPause_end_date()  == NULL && $pppval->getPause_end_date_by_update() == NULL ){
                                 $admin_resumed = 'no';
                                $admin_resumed_bt_resume_by_customer = 'no';
                                $updateRemaining_daysFlag = true ; 
                              }
                             
                             $check_date = date("Y-m-d",strtotime($pppval->getPause_start_date())) ;
                             $check_date1 = date("Y-m-d",strtotime($pppval->getPause_end_date_by_update())) ;
                              if($pppval->getPause_end_date_by_update() != NULL && 
                                strtotime($currentDate) >= strtotime( $check_date) 
                                && strtotime($currentDate) <= strtotime( $check_date1 ) && 
                                  $pppval->getPause_end_date_by_update() != NULL ) {
                                $current_pause_stauts = 'yes';
                                $break_flag = true ; 
                              }
                              else if($pppval->getPause_end_date_by_update() == NULL &&  strtotime($currentDate) >= strtotime($pppval->getPause_start_date() )  ){
                                $current_pause_stauts = 'yes';
                               $break_flag = true ; 
                              }

                              
                            }
                            //==================This staic update Done As per requirement by App develpoer==================
                            if($resume_choice == 'admin' && $pppval->getPause_end_date() != NULL ){
                              $current_pause_stauts ='no';
                            }
                            elseif($resume_choice == 'customer' && $pppval->getPause_end_date() != NULL && $pppval->getPause_end_date_by_update() != NULL ){
                              $current_pause_stauts ='no';
                            }
                           
                              $remaining_days_of_pause = $pppval->getRemaining_working_days_after_pause() ;
                            
                            //======================================================
                            $pause_end_date_timestamp =  strtotime($pppval->getPause_end_date()) ;//*1000 ;
                            // get setting of 72 hopurs
                            $time_after_setting_days = date('Y-m-d 00:00:00', strtotime("+".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime(date('Y-m-d 00:00:00'))));
                            if(strtotime($time_after_setting_days) < strtotime($pppval->getPause_end_date())){
                               
                            }
                            else{
                              $pause_end_date_timestamp =strtotime( $time_after_setting_days ); 
                            }
                            //echo " Pause end date : " . $pppval->getPause_end_date() . " and time_after_setting_days : " . $time_after_setting_days  ;;exit;

                            $single_pause_details = $pause_package_arr[] = array(
                              "pause_package_id"=>$pppval->getPause_package_id() ,
                              "pause_start_date"=>$pppval->getPause_start_date() ,
                              "pause_end_date"=>$pppval->getPause_end_date() ,
                              "pause_end_date_timestamp"=> $pause_end_date_timestamp*1000,
                              "pause_end_date_timestamp_disp"=> date("Y-m-d H:i:s",$pause_end_date_timestamp)  ,
                              "pause_end_date_by_update"=>$pppval->getPause_end_date_by_update() ,
                              "pause_end_date_update_by"=>$pppval->getPause_end_date_update_by() ,
                              "pause_package_history_id"=>$pppval->getPause_package_history_id() ,
                              "resume_choice"=>$resume_choice ,
                              "remaining_working_days_after_pause"=>$pppval->getRemaining_working_days_after_pause() ,
                              "comment_log"=>$pppval->getComment_log() ,
                              "admin_resumed"=>$admin_resumed ,
                              "admin_resumed_bt_resume_by_customer"=>$admin_resumed_bt_resume_by_customer ,
                              "for_me_Remaining_days_bf_pause_date"=>$Remaining_days_bf_pause_date ,
                              "current_pause_status_as_per_current_date"=>$current_pause_stauts ,
                            );

                            if($break_flag == true  ){
                             // break;
                            }
                            }
                          }
                        }
                        $TodayDate = date_create(date("Y-m-d")) ;
                        $DiffEndate = date_create($val['end_date']);
                        $diff= date_diff($TodayDate,$DiffEndate);
                        $EndDayDiff = $diff->format("%a")  ;

                        if($updateRemaining_daysFlag == true ){
                            
                          $remaining_days = $Remaining_days_bf_pause_date + $remaining_days_of_pause ;
                        }
                        $order_dates_array_ws = NULL ; 
                        //-------------Start--- Get Order dates WS Code ---------------------
                         $sql_get_suspension_dates = "select start_date,end_date from freeze_subpackage where order_id = '$order_id' and is_deleted = 0  ";
                        $stmt = $connection->prepare($sql_get_suspension_dates);
                        $stmt->execute();
                        $suspension_dates = $stmt->fetchAll();
                        $suspensionDates = null;
                        $suspensionDatesReadMode = null;

                        $sql_get_pause_dates = "select pause_start_date,pause_end_date from pause_package where order_id = '$order_id' ";
                        $sql_get_pause_dates = "SELECT pause_package.* , pause_package_history.resume_choice FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where order_id = ".$order_id;
                        $stmt = $connection->prepare($sql_get_pause_dates);
                        $stmt->execute();
                        $pausedata_dates = $stmt->fetchAll();
                        $pauseDates = null;


                        $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_id);
                        if($orderInfo){
                            if($orderInfo->getOrder_status() == 'cancel'){
                                $this->error = "PIC";
                                $this->error_msg = "Package Cancelled";
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Packagemaster();
                                // $response = $emptyObj;
                                $this->data = $emptyObj;
                                // $this->data = false;
                                return $this->responseAction();
                            }
                        }
                        $package_id = $orderInfo->getPackage_id();
                        if (!empty($suspension_dates)) {
                            foreach ($suspension_dates as $_suspension_dates) {
                                $susupension_start_date = strtotime(date('Y-m-d', strtotime($_suspension_dates['start_date'])));
                                $susupension_end_date = strtotime(date('Y-m-d', strtotime($_suspension_dates['end_date'])));
                                while ($susupension_start_date <= $susupension_end_date) {
                                    $suspensionDates [] = $susupension_start_date;
                                   // $suspensionDatesReadMode [] = date('Y-m-d',$susupension_start_date);
                                    $susupension_start_date = strtotime("+1 day", $susupension_start_date);
                                }
                            }
                        }
                        $display_pause_from_date = NULL ; // date("Y-m-d") ; 
                         $pause_package_up_to_uncertain_date_flag = false ;
                         if (!empty($pausedata_dates)) {
                            foreach ($pausedata_dates as $_pausedata_dates) {

                                
                                $pause_start_date = strtotime(date('Y-m-d', strtotime($_pausedata_dates['pause_start_date'])));
                                $pause_end_date_by_update = strtotime(date('Y-m-d', strtotime($_pausedata_dates['pause_end_date_by_update'])));
                                $pause_end_date = strtotime(date('Y-m-d', strtotime($_pausedata_dates['pause_end_date'])));
                                $resume_choice = $_pausedata_dates['resume_choice'] ;  

                               
                                if( $resume_choice == 'admin' ){
                                    if($_pausedata_dates['pause_end_date'] != NULL){
                                        while ($pause_start_date <= $pause_end_date) {
                                            $pauseDates [] = $pause_start_date;
                                            $pause_start_date = strtotime("+1 day", $pause_start_date);
                                        }
                                    }
                                    else{
                                        $pause_package_up_to_uncertain_date_flag = true ;
                                        $display_pause_from_date = $pause_start_date ;
                                    }
                                }
                                else{
                                     
                                    if($_pausedata_dates['pause_end_date_by_update'] != NULL){
                                        while ($pause_start_date <= $pause_end_date) {
                                            $pauseDates [] = $pause_start_date;
                                            $pause_start_date = strtotime("+1 day", $pause_start_date);
                                        }
                                    }else{
                                        $pause_package_up_to_uncertain_date_flag = true ;
                                        $display_pause_from_date = $pause_start_date ;
                                    }
                                }                       
                            }
                        }

                        $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
                JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
                where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";
                        $offDays = $this->fireQuery($sql);
                        $offDaysArray = null;
                        if ($offDays) {
                            foreach ($offDays as $_offDays) {
                                $offDaysArray [] = $_offDays['days_name'];
                            }
                        }
                        $sql_get_order_meal_dates = "select status, requested_datetime from order_meal_relation where order_master_id = '$order_id' ";
                        $stmt = $connection->prepare($sql_get_order_meal_dates);
                        $stmt->execute();
                        $meal_added_dates = $stmt->fetchAll();
                        // echo'<pre>';print_r($meal_added_dates);
                        $mealAddedDates = null;
                        $mealAddedDatesStatus = null;
                        if ($meal_added_dates) {
                            foreach ($meal_added_dates as $_meal_added_dates) {
                                $dateTime = strtotime($_meal_added_dates['requested_datetime']);
                                $mealAddedDates[] = $dateTime;
                                $mealAddedDatesStatus[$dateTime] = $_meal_added_dates['status'];
                            }
                        }
                        $today = date('Y-m-d 00:00:00');
                        $order_upgrade_history_sql = "select * from order_package_upgrade_history where order_id = '$order_id'  and is_deleted = 0 and status = 'paid' group by start_from_date order by start_from_date DESC";
                        $upgrade_history = $this->fireQuery($order_upgrade_history_sql);
                        $meal_count_array = null;
                        if ($upgrade_history) {
                            foreach ($upgrade_history as $_upgrade_history) {
                                $start_from_date = $_upgrade_history['start_from_date'];
                                
                                $sql_ = "select meal_type,sum(total_meal_type) as total_count from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date >= '$start_from_date' group by meal_type";
                                $totalMealsCountInOrder = $this->fireQuery($sql_);
                                $totalMealsInOrder = 0;
                                $totalSnacksInOrder = 0;
                                $totalSoupsInOrder = 0;
                                $totalBrekfastInOrder = 0;
                                if ($totalMealsCountInOrder) {
                                    foreach ($totalMealsCountInOrder as $_totalMealsCountInOrder) {
                                       // if ($_totalMealsCountInOrder['meal_type'] == 1 || $_totalMealsCountInOrder['meal_type'] == 2) {
                                        if ($_totalMealsCountInOrder['meal_type'] == 2) {
                                            $totalMealsInOrder =  $_totalMealsCountInOrder['total_count'];
                                        }
                                        if ($_totalMealsCountInOrder['meal_type'] == 1) {
                                            $totalBrekfastInOrder =  $_totalMealsCountInOrder['total_count'];
                                        }
                                        if ($_totalMealsCountInOrder['meal_type'] == 3) {
                                            $totalSnacksInOrder = (int) $_totalMealsCountInOrder['total_count'];
                                        }
                                        if ($_totalMealsCountInOrder['meal_type'] == 11) {
                                            #soup
                                            $totalSoupsInOrder = (int) $_totalMealsCountInOrder['total_count'];
                                        }
                                    }
                                }
                                $meal_count_array [] = array(
                                    "start_from_date_read" => $_upgrade_history['start_from_date'],
                                    "start_from_date" => strtotime($_upgrade_history['start_from_date']),
                                    "totalMealsInOrder" => $totalMealsInOrder,
                                    "totalSnacksInOrder" => $totalSnacksInOrder,
                                    "totalBrekfastInOrder" => $totalBrekfastInOrder,
                                    "totalSoupsInOrder" => $totalSoupsInOrder,
                                );
                            }
                        }
                       
                        $start_date = strtotime($val['start_date']);
                        $end_date = strtotime($val['end_date']);
                        if(!empty($given_date) && (( strtotime( date("Y-m-d" ) )) == $start_date )) {
                          
                            $start_date = $given_date;
                            $start_date = strtotime("+1 day", $start_date);
                        }
                        elseif (!empty($given_date) && ( strtotime( date("Y-m-d" ) )) > $start_date ) {
                            $start_date = $given_date;
                        }
                        $upgraded_gram = $package_gram = 0 ;
                        $gram_label = 'Gram';
                        $package_id = $val['package_id'];
                        $package_Info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->find($package_id);
                        if($package_Info){
                            $package_gram = $package_Info->getPackage_grams();
                            $gram_label = $package_Info->getGram_label();
                        }
                    
                        $upgrade_gram_start_from_date = '' ;
                        $upgradeGram_array[] = NULL ;
                        // Get Upgrade Gram Values
                       
                        $order_package_gram_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackagegramrelation")->findBy(array("order_id"=>$order_id,"is_deleted"=>0,"gram_added_flag"=>"upgrade"),array("start_from_date"=>"ASC"));
                        while ($start_date <= $end_date) {                           
                          $mealBlockToConsider = null;
                          $updatemealcntflag = true; 
                         
                          if (!empty($meal_count_array)) {
                              foreach ($meal_count_array as $key => $_meal_count_array) {
                                  if ($start_date >= $_meal_count_array['start_from_date']) {                                    

                                  }
                              }
                              
                          }
                          else{
                            $s_date = date('Y-m-d',$start_date);
                              $sql_ = "select meal_type,sum(total_meal_type) as total_count from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date >= '$s_date' group by meal_type";
                             
                              $totalMealsCountInOrder = $this->fireQuery($sql_);
                              $totalMealsInOrder = 0;
                              $totalSnacksInOrder = 0;
                              $totalSoupsInOrder = 0;
                              $totalBrekfastInOrder = 0;
                              if ($totalMealsCountInOrder) {
                                  foreach ($totalMealsCountInOrder as $_totalMealsCountInOrder) {
                                      //if ($_totalMealsCountInOrder['meal_type'] == 1 || $_totalMealsCountInOrder['meal_type'] == 2) {
                                      if ($_totalMealsCountInOrder['meal_type'] == 2) {
                                          $totalMealsInOrder =  $_totalMealsCountInOrder['total_count'];
                                      }
                                      if ($_totalMealsCountInOrder['meal_type'] == 1) {
                                          $totalBrekfastInOrder =  $_totalMealsCountInOrder['total_count'];
                                      }
                                      if ($_totalMealsCountInOrder['meal_type'] == 3) {
                                          $totalSnacksInOrder = (int) $_totalMealsCountInOrder['total_count'];
                                          
                                      }
                                      //if ($_totalMealsCountInOrder['meal_type'] == 10) {
                                      if ($_totalMealsCountInOrder['meal_type'] == 11) {
                                          #soup
                                          $totalSoupsInOrder = (int) $_totalMealsCountInOrder['total_count'];
                                      }
                                  }
                              }
                              $meal_count_array [] = array(
                                  "start_from_date_read" => $start_date,
                                  "start_from_date" => strtotime($start_date),
                                  "totalMealsInOrder" => $totalMealsInOrder,
                                  "totalSnacksInOrder" => $totalSnacksInOrder,
                                  "totalSoupsInOrder" => $totalSoupsInOrder,
                                  "totalBrekfastInOrder" => $totalBrekfastInOrder,
                              );
                              
                          }
                       
                          if (!empty($meal_count_array)) {
                              foreach ($meal_count_array as $_meal_count_array) {
                                  if ($start_date >= $_meal_count_array['start_from_date']) {
                                 // if (1) {
                                      $mealBlockToConsider = array(
                                          "totalMealsInOrder" => $_meal_count_array['totalMealsInOrder'],
                                          "totalSnacksInOrder" => $_meal_count_array['totalSnacksInOrder'],
                                          "totalSoupsInOrder" => $_meal_count_array['totalSoupsInOrder'],
                                          "totalBrekfastInOrder" => $_meal_count_array['totalBrekfastInOrder'],
                                      );
                                  }
                              }
                          }
                          $is_pause = false;
                          $is_suspend = false;
                          $is_off_day = false;
                          $is_meal_added = false;
                          $is_meal_delivered = false;
                        //   $total_days = 0;
                          if (!empty($suspensionDates)) {
                              if (in_array($start_date, $suspensionDates)) {
                                  $is_suspend = true;
                              }
                          }
                       
                          if (!empty($pauseDates)) {
                              if (in_array($start_date, $pauseDates)) {
                                  $is_pause = true;
                              }
                              
                          }
                          if($pause_package_up_to_uncertain_date_flag == true){
                                  if($start_date >= $display_pause_from_date ){
                                      $is_pause = true ;
                                  }
                              }
                          if (!empty($offDaysArray)) {
                              if (in_array(date('l', $start_date), $offDaysArray)) {
                                  $is_off_day = true;
                              }
                          }
                          if (!empty($mealAddedDates)) {
                              if (in_array($start_date, $mealAddedDates)) {
                                  $is_meal_added = true;
                                  if($mealAddedDatesStatus[$start_date] == 'delivered'){
                                    $is_meal_delivered = true;
                                  }
                              }
                          }
                          $schdeule_date = date('Y-m-d', $start_date) ;
                          $mealBlockToConsider = NULL;
                          if($mealBlockToConsider == NULL ){
                              $query =  "select meal_type,sum(total_meal_type) as total_count from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date <= '".date("Y-m-d",$start_date)."' and order_package_upgrade_history_id IN (SELECT order_package_upgrade_history_id FROM `order_package_upgrade_history` WHERE `order_id` = '$order_id' and is_archive = 0 and is_deleted = 0 and ( (added_flag = 'default' ) OR (added_flag = 'upgrade' AND status = 'paid' and payment_status = 'success') ) ) group by meal_type";
                              $dataArr = $this->fireQuery($query);
                              $totalMealsInOrder = 0;
                              $totalSnacksInOrder = 0;
                              $totalSoupsInOrder = 0;
                              $totalBrekfastInOrder = 0;
                              if ($dataArr) {
                                 foreach ($dataArr as $_dataArr) {
                                     if ($_dataArr['meal_type'] == 1 ) {
                                         $totalBrekfastInOrder = $_dataArr['total_count'];
                                     }
                                     if ($_dataArr['meal_type'] == 2) {
                                         $totalMealsInOrder = $_dataArr['total_count'];
                                     }
                                     if ($_dataArr['meal_type'] == 3) {
                                         $totalSnacksInOrder = (int) $_dataArr['total_count'];
                                     }
                                     //if ($_totalMealsCountInOrder['meal_type'] == 10) {
                                     if ($_dataArr['meal_type'] == 11) {
                                         #soup
                                         $totalSoupsInOrder = (int) $_dataArr['total_count'];
                                     }
                                 }
                                  $mealBlockToConsider = array(
                                          "totalMealsInOrder" =>$totalMealsInOrder,
                                          "totalSnacksInOrder" =>$totalSnacksInOrder,
                                          "totalSoupsInOrder" => $totalSoupsInOrder,
                                          "totalBrekfastInOrder" => $totalBrekfastInOrder,
                                      );
                                 
                             }
                          }
                          $upgraded_gram_value = 0 ;
                          $g = 0 ;
                          if($order_package_gram_relation){
                              foreach($order_package_gram_relation as $opgrkey=>$opgrval){
                                  if($start_date >= strtotime($opgrval->getStart_from_date() )){
                                     
                                       $g = $g + $opgrval->getPackage_gram() ; 
                                  }
                              }
                          }
                          $upgraded_gram_value = $g ;

                          // update for old App , if pause is yes , then set Suspend flag = yes === Develpoer Request
                          if($is_pause == true){
                              $is_suspend = true ;
                          }
                          //$schedule_week_id = $this->weekOfMonth($start_date) ;
						  $_ac_schedule_week_id = date('W', $start_date);
						  $schedule_week_id = ( $_ac_schedule_week_id % 2 == 0 ) ? "2" : "1" ; 
                          if($display_passed_dates == "yes" || ( $display_passed_dates == "no" && $start_date >= strtotime(date("Y-m-d")))){
                            $sql_get_order_meal_dates = "select status from order_meal_relation where order_master_id = '$order_id' ";
                            $stmt = $connection->prepare($sql_get_order_meal_dates);
                            $stmt->execute();
                            $meal_added_dates = $stmt->fetchAll();
                            
                            $order_dates_array_ws [] = array(
                               // "order_id" => $order_id,
                                "is_suspend" => $is_suspend,
                                "is_pause" => $is_pause,
                                "is_off_day" => $is_off_day,
                                "is_meal_added" => $is_meal_added,
                                "scheduled_time" => $start_date,
                                "is_meal_delivered" => $is_meal_delivered,
                                "scheduled_time_read" => date("Y-m-d",$start_date),
                                "mealBlockToConsider" => $mealBlockToConsider,
                                "meal_count_array" => $meal_count_array,
                                "schedule_date" =>  date('d-m-Y', $start_date) ,
                                "schedule_week_id"=> $schedule_week_id ,
								"_ac_schedule_week_id"=>$_ac_schedule_week_id,
                                "schedule_week_name"=> "week".$schedule_week_id ,
                                "schdeule_day"=>  date('d', $start_date),
                                "schdeule_day_name"=>date('D', $start_date),
                                "schdeule_day_number"=>date('N', $start_date),
                                "upgraded_gram_value"=>$upgraded_gram_value,
                                "package_gram"=>$package_gram,
                                "gram_label"=>$gram_label,
                                //"updated_package_gram"=>($upgraded_gram_value!=0)?($upgraded_gram_value+$package_gram):0
                                "updated_package_gram"=>$upgraded_gram_value+$package_gram
                            );
                          }
                          $start_date = strtotime("+1 day", $start_date);
                        }
                        //-------------End ---Get Order dates WS Code ---------------------
                        // $datediff = strtotime($val['end_date']) - strtotime($val['start_date']);
                        // $total_days = round($datediff / (60 * 60 * 24)) - in_array(date('l', $start_date), $offDaysArray);
                        
                        // $total_days = round($datediff / (60 * 60 * 24));
                  
                        $response[] = array(
                           
                            'package_master_id' => $val['main_package_master_id'],
                            'order_id' => $val['order_master_id'],
                            'package_for' => $val['package_for'],
                            'unique_no' => $val['unique_no'],
                            'order_flag_pause_status' => $val['pause_status'],
                            'as_per_current_date_affected_pause_details'=>$single_pause_details  ,
                            'order_status' => $order_status,
                            'sub_package_id' => $val['sub_package_id'],
                            'package_grams' => $val['package_grams'],
                            'gram_label' => $val['gram_label'],
                            'sub_packages_data' => $sub_packages_data,
                            'package_name' => $val['package_name'],
                            'package_meals' => $totalComboCount['meals'],
                            'package_snakes' => $totalComboCount['snacks'],
                            'package_soup' => $totalComboCount['soup'],
                            'package_breakfast' => $totalComboCount['breakfast'],
                             'booing_date_display'=>$booking_display_date,
                            'start_date' => strtotime($val['start_date']) * 1000,
                            'start_date_display' => $val['start_date'],
                            'end_date' => strtotime($val['end_date']) * 1000,
                            'end_date_display' => $val['end_date'],
                            'total_days' => $total_days,
                            'status' => $status,
                            'img_url' => $img_url,
                            'remaining_days' => $remaining_days,
                            'remaining_days_1' => $EndDayDiff,                            
                            'available_for_suspend_days' => $availabel_for_suspend_days,
                            'available_for_upgrade' => $available_for_upgrade,
                            'available_for_video' => $available_for_video,
                            'supend_start_date' => !empty($supend_start_date_response) ? strtotime($supend_start_date_response) : null,
                            'supend_start_date_read' => !empty($supend_start_date_response) ? $supend_start_date_response : null,
                            'supend_end_date' => !empty($supend_end_date_response) ? strtotime($supend_end_date_response) : null,
                            'supend_end_date_read' => !empty($supend_end_date_response) ? $supend_end_date_response : null,
                            'is_daily_package' => $is_daily_package,
                            'order_dates_array_ws' => $order_dates_array_ws,
                        );
                    }
                    $this->error = "SFD";
                } else {
                    $this->error = "NRF";
                }
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Packagemaster();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        // } catch (\Exception $e) {
        //     $this->error = "SFND " . $e->getMessage();
        //     $this->data = false;
        //     return $this->responseAction();
        // }
    }

}

?>
