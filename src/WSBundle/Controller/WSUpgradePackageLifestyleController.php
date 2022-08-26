<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;
use AdminBundle\Entity\Ordermealtypesincluderelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Orderpackageupgradehistory;

class WSUpgradePackageLifestyleController extends WSBaseController {

    /**
     * @Route("/ws/upgradePackageLifestyle/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function upgradePackageLifestyleAction($param) {
     //   try {
            $this->title = "Upgrade Package Lifesyle";
            $this->status = 200;
        	$this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('mealtype', 'user_id', 'order_id',
                     'payment_type', 'total_amount','new_subpackage_id',
                     'new_sub_package_full_price','new_sub_package_per_day_price'),
                ),
            );
            if ($this->validateData($param)) {

                $mealtype = $param->mealtype;
                $user_id = $param->user_id;
                $payment_type = $param->payment_type;
                $total_amount = $param->total_amount;
                $order_id = $param->order_id;
                $new_subpackage_id = $param->new_subpackage_id;
                $new_sub_package_full_price = $param->new_sub_package_full_price;
                $new_sub_package_per_day_price = $param->new_sub_package_per_day_price ;

                $app_mode = !empty($param->app_mode) ? $param->app_mode : 'prod';
                $actual_upgrade_payment_amount = 0 ;
                $meal_type_array_is_wrong = false;

                if (!empty($mealtype)) {
                    $mealtype = json_decode($mealtype);

                    foreach ($mealtype as $_mealtype) {
                        if (array_key_exists('meal_type_id', $_mealtype) && array_key_exists('meal_type_count', $_mealtype) ) { // && array_key_exists('meal_type_unit_price', $_mealtype)
                            if($_mealtype->meal_type_count > 3){
                                $this->error = "UQE";
                                $this->error_msg = "Meal type count exceeds than Upgrade Limit";
                                // $this->data = false;
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Countrymaster();
                                $this->status = $emptyObj;
                                return $this->responseAction();
                            }
                        } else {
                            $meal_type_array_is_wrong = true;
                        }
                    }
                }

                if ($meal_type_array_is_wrong) {
                    $this->error = "PIW";
                    $this->error_msg = "Meal type array is wrong";
                    // $this->data = false;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Countrymaster();
                    $this->status = $emptyObj;
                    return $this->responseAction();
                }
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                #check current package remaining days from order_master
                $orderMaster = $em->getRepository("AdminBundle:Ordermaster")
                        ->findOneBy(
                        ["is_deleted" => 0,
                            "order_master_id" => $order_id,
                            "order_by" => $user_id
                ]);


                if ($orderMaster) {
                    $old_package_price = $orderMaster->getPayment_amount(); // here we need to take payment amout instead of package amount , becuase sometime users have discounts
                    $package_for_id = $orderMaster->getPackage_for();
                    
                    $order_package_days = 0 ; 
                    $package_for_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageformaster")->find($package_for_id);
                    if($package_for_info){
                        $order_package_days = $package_for_info->getDays() ; 
                    }
                    $old_package_price_per_day = $old_package_price / $order_package_days ; 
                    if($orderMaster->getOrder_status() == 'cancel'){
                        $this->error = "PIC";
                        $this->error_msg = "Package Cancelled";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->status = $emptyObj;
                        return $this->responseAction();
                    }
                    $package_id = $orderMaster->getPackage_id();

                    $checkMonthlyPackage = $this->getDoctrine()->getRepository("AdminBundle:Subpackagepricemaster")->findOneBy(
                            array(
                                "duration_type" => 'monthly',
                                "sub_package_id" => $orderMaster->getSub_package_id(),
                                "is_deleted" => 0
                            )
                    );

                    if (empty($checkMonthlyPackage)) {
                        $this->error = "PIW";
                        $this->error_msg = "Sub package is not Monthly package";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->status = $emptyObj;
                        return $this->responseAction();
                    }

                    //----------Check Pause or not ---------------------
                    $checkPause = $this->firequery("SELECT *  FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE pause_package.`order_id` = " . $order_id . "  and pause_package.is_deleted = 0 ");
                
                    if ($checkPause) {
                        $pauseOnce = true;
                        foreach ($checkPause as $_checkPause) {
                            if ($_checkPause['resume_choice'] == 'admin'){
                                 if($_checkPause['pause_end_date'] == NULL){
                                    $this->error = "PIW";
                                    $this->error_msg = " package is in Pause mode";
                                    // $this->data = false;
                                    $this->status = 201;
                                    $this->message = false;
                                    $emptyObj = new Countrymaster();
                                    $this->status = $emptyObj;
                                    return $this->responseAction();
                                 }   
                            }
                            elseif($_checkPause['resume_choice'] == 'customer'){
                                if($_checkPause['pause_end_date_by_update'] == NULL){
                                     $this->error = "PIW";
                                    $this->error_msg = " package is in Pause mode";
                                    // $this->data = false;
                                    $this->status = 201;
                                    $this->message = false;
                                    $emptyObj = new Countrymaster();
                                    $this->status = $emptyObj;
                                    return $this->responseAction();
                                 }       
                            }
                            
                        }
                    }
                    $today = strtotime('now');

                    $order_end_date = strtotime($orderMaster->getEnd_date());
                    $order_start_date = strtotime($orderMaster->getStart_date());

//					$day_remains = floor(($order_end_date - $order_start_date)/(60*60*24));

                    $day_remains_overall = floor(($order_end_date - $today) / (60 * 60 * 24));

                    $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                    );
                    $total_off_days  = 0 ;
                    $totalDaysDateArray = $PauseDays = [];
                    $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                                JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                                where order_off_days_relation.is_deleted = 0 and order_id = " .$order_id . " group by days_master.main_days_master_id";
        
                    $offDays = $this->fireQuery($sql);
                    
                    $pause_days = 0;
        
                    if (!empty($offDays)) {
                        foreach ($offDays as $_offDays) {
                            $offDaysArray [] = $_offDays['main_days_master_id'];
                        }
                    }
                    $suspesion_days = 0 ; 
                    $freezeDays = [];   
                    if ($checkFreeze) {
                        $freezeOnce = true;
                        foreach ($checkFreeze as $_checkFreeze) {
                            $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getStart_date())));
                            $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getEnd_date())));
        
                            $supend_start_date_response = date('Y-m-d', $supend_start_date);
                            $supend_end_date_response = date('Y-m-d', $supend_end_date);
                            while ($supend_start_date <= $supend_end_date) {
                                $freezeDays [] = date('Y-m-d', $supend_start_date);
                                $suspesion_days += 1;
                                $supend_start_date = strtotime("+1 day", $supend_start_date);
                            }
                        }
                    }

                    $order_start_date = strtotime($orderMaster->getStart_date()) ;
                    $order_end_date =  strtotime($orderMaster->getEnd_date());
                    $today =  strtotime(date("Y-m-d"));
                    $offDaysDates = [];
                    $day_passed = 0 ;
                    $totalDaysDateArray = [];
                    $passed_days_dateArray = [];
                 
                    while ($order_start_date <= $order_end_date) {
                        $totalDaysDateArray[] = date('Y-m-d', $order_start_date);
                        if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                            if ($order_start_date >= $today) {
                                $total_off_days += 1;
                            }
                            $offDaysDates [] = date('Y-m-d', $order_start_date);
                        }
        
                        if ($order_start_date <= $today) {
                            $passed_days_dateArray[] = date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }
        
                        $order_start_date = strtotime("+1 day", $order_start_date);
                    }
         
                    foreach ($totalDaysDateArray as $tdkey => $tdval) {
                        if (in_array($tdval, $passed_days_dateArray)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if (in_array($tdval, $offDaysDates)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if (in_array($tdval, $freezeDays)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if (in_array($tdval, $PauseDays)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                    }
                 
                    $remaining_days = count($totalDaysDateArray);
                    $remaining_days_for_upgrade = $remaining_days - $this->SELECT_MEAL_AFTER_DAYS ;
                    $old_package_remaining_price_amount =  $old_package_price_per_day * $remaining_days_for_upgrade ; 
                    
                    $new_sub_package_price_for_remaining_days = $new_sub_package_per_day_price * $remaining_days_for_upgrade ; 
                    $actual_upgrade_payment_amount = $new_sub_package_price_for_remaining_days - $old_package_remaining_price_amount ;


                    $start_from_date = $order_start_date;

                    //$date_after_two_days = strtotime('+2 days', $today);
                    // Client Feedback : change 2 days to 3 days so 
                    $date_after_two_days = strtotime('+3 days', $today);
                    $day_remain = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) - $suspesion_days;

                    
                    

                    if ($order_start_date > $today) {
                        //exit('order yet not started');
                        #order yet not started
                        $day_remain = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) - $suspesion_days;

                        $days_remain_to_start_order = floor(($order_start_date - $today) / (60 * 60 * 24));

                        //if ($days_remain_to_start_order >= 2) {
                        if ($days_remain_to_start_order >= 3) {
                            $start_from_date = $order_start_date;
                        } else {
                            $start_from_date = $date_after_two_days;
                        }
                    } else {
                        #order started
                        $day_remain = floor(($order_end_date - $date_after_two_days) / (60 * 60 * 24)) - $suspesion_days;

                        $start_from_date = $date_after_two_days;
                    }


                    $day_remain = $remaining_days_for_upgrade ; // above logic [day_remain ] is wrong , so updated this 
                    $start_from_date = date('Y-m-d 00:00:00', $start_from_date);

                    //if ($day_remains_overall > 2) {
                     // Client Feedback : change 2 days to 3 days so 
                    if ($day_remains_overall > 3) {
                        #make entry in Orderpackageupgradehistory
                        $today_date = date('Y-m-d H:i:s');

                        $con = $em->getConnection();

                        if (!empty($mealtype)) {

                            $newOrderpackageupgradehistory = new Orderpackageupgradehistory();
                            $newOrderpackageupgradehistory->setOrder_id($order_id);
                            $newOrderpackageupgradehistory->setPackage_id($package_id);
                            $newOrderpackageupgradehistory->setStart_from_date($start_from_date);
                            $newOrderpackageupgradehistory->setCreated_datetime($today_date);
                            $newOrderpackageupgradehistory->setAdded_flag('upgrade');
                            $newOrderpackageupgradehistory->setIs_archive(0);
                            $newOrderpackageupgradehistory->setIs_deleted(0);
                            $newOrderpackageupgradehistory->setTotal_amount($actual_upgrade_payment_amount);//($total_amount);
                            $newOrderpackageupgradehistory->setPayment_method($payment_type);

                            if ($app_mode == 'prod') {
                                $newOrderpackageupgradehistory->setPayment_status('pending');
                                $newOrderpackageupgradehistory->setStatus('pending');
                            }

                            if ($app_mode == 'dev') {
                                $newOrderpackageupgradehistory->setPayment_status('success');
                                $newOrderpackageupgradehistory->setStatus('paid');
                            }

                            $em->persist($newOrderpackageupgradehistory);
                            $em->flush();

                            $order_package_upgrade_history_id = $newOrderpackageupgradehistory->getOrder_package_upgrade_history_id();

                            foreach ($mealtype as $_mealtype_data) {
                                $newTotalCombination = new Ordermealtypesincluderelation();

                                $newTotalCombination->setOrder_package_upgrade_history_id($order_package_upgrade_history_id);
                                $newTotalCombination->setOrder_id($order_id);
                                $newTotalCombination->setDays($day_remain);
                                $newTotalCombination->setAdded_flag('upgrade');
                                $newTotalCombination->setMeal_type($_mealtype_data->meal_type_id);
                                //$newTotalCombination->setPrice($_mealtype_data->meal_type_unit_price);
                                $newTotalCombination->setPrice( $actual_upgrade_payment_amount / count($mealtype) );
                                $actual_upgrade_payment_amount / count($mealtype) ;
                                $newTotalCombination->setTotal_meal_type($_mealtype_data->meal_type_count);
                                $newTotalCombination->setCreated_datetime(date('Y-m-d H:i:s'));
                                $newTotalCombination->setLast_updated_on(date('Y-m-d H:i:s'));
                                $newTotalCombination->setIs_archive(0);
                                $newTotalCombination->setStart_from_date($start_from_date);
                                $newTotalCombination->setIs_deleted(0);

                                $em->persist($newTotalCombination);
                                $em->flush();
                            }
                        }
                        $this->error = "SFD";
                        $response = array(
                            "actual_upgrade_payment_amount"=>$actual_upgrade_payment_amount,
                            "order_package_upgrade_history_id"=>$order_package_upgrade_history_id


                        );
                    } else {
                        $this->error = "PIW";
                        $this->error_msg = "Only Three days Left , Cant Upgrade the package";
                    }
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
				$emptyObj = new Countrymaster();
				$response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
       /* } catch (\Exception $e) {
            $this->error = "SFND";
            $this->error_msg = $e->getMessage();
            $this->data = false;
            return $this->responseAction();
        }*/
    }

}

?>