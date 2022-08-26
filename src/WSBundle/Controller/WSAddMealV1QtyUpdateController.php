<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Productratingmaster;
use AdminBundle\Entity\Ordermealrelation;
use AdminBundle\Entity\Mealproductrelation;

class WSAddMealV1QtyUpdateController extends WSBaseController
{

    /**
     * @Route("/ws/addMealV1QtyUpdate/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function addMealV1QtyUpdateAction($param)
    {

        //try{
        $this->title = "Update Meal";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('order_id', 'package_id', 'meal', 'meal_date', 'user_id'),
            ),
        );

        if ($this->validateData($param)) {

            $today = date('Y-m-d');

            $current_date_time = date('Y-m-d 00:00:00');

            //$meal_date = date('Y-m-d H:i:s',($param->meal_date/1000));
            $meal_date = date('Y-m-d H:i:s', strtotime($param->meal_date));
            $meal_date_format = date('Y-m-d', strtotime($param->meal_date));
            //$unique_no = $param->unique_no;

            $full_day_name = date('l', strtotime($meal_date));

            #getOffDaysEntered
            $order_id = $param->order_id;

            $sql = "SELECT days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
				JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
				where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

            $offDays = $this->fireQuery($sql);

            $day_entered_as_off = false;

            if (!empty($offDays)) {
                foreach ($offDays as $_offDays) {
                    if ($_offDays['days_name'] == $full_day_name) {
                        $day_entered_as_off = true;
                        break;
                    }
                }
            }

            if ($day_entered_as_off) {
                $this->error = "PIW";
                $this->error_msg = "Day entered is a Off day.";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Usergoalmaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }
            $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                                array(
                                    "order_id" => $order_id,
                                    "is_deleted" => 0
                                )
                        );
            $PauseDays =  [] ;
                  
            $pause_days = 0;
            if ($checkPause) {
                $pauseOnce = true;
                foreach ($checkPause as $_checkPause) {


                    
                    $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_start_date())));
                    $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date())));
                    $pause_end_date_by_update = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date_by_update())));

                    $pause_pacgae_historyInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->find($_checkPause->getPause_package_history_id());
                    $resume_choice = 'admin';
                    if($pause_pacgae_historyInfo){
                        $resume_choice = $pause_pacgae_historyInfo->getResume_choice() ;
                    }
                    
                    $pause_start_date_response = date('Y-m-d', $pause_start_date);
                    $pasue_end_date_response = date('Y-m-d', $pasue_end_date);
                    if($resume_choice == 'admin'){
                        if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                            if(strtotime($meal_date_format) >= $pause_start_date){
                                $this->error = "PIP";
                                $this->error_msg = "Your Package is in Pause mode";
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Usergoalmaster();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                        }
                    }
                    else if ($resume_choice == 'customer'){
                        if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                            if(strtotime($meal_date_format) >= $pause_start_date){
                                $this->error = "PIP";
                                $this->error_msg = "Your Package is in Pause mode";
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Usergoalmaster();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                        }
                        elseif($_checkPause->getPause_end_date_by_update() == NULL || $_checkPause->getPause_end_date_by_update() == ''){
                            if(strtotime($meal_date_format) >= $pause_start_date){
                                $this->error = "PIP";
                                $this->error_msg = "Your Package is in Pause mode";
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Usergoalmaster();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                        }
                        else{
                            $pasue_end_date = $pause_end_date_by_update ;
                        }
                    }
                    while ($pause_start_date <= $pasue_end_date) {

                        $PauseDays [] = date('Y-m-d', $pause_start_date);
                        $pause_days += 1;

                        $pause_start_date = strtotime("+1 day", $pause_start_date);
                         //echo "<br> ===> updated start date : " . $pause_start_date ;
                    }
                }
                
                
                if($PauseDays != NULL){
                    if(in_array($meal_date_format, $PauseDays)){
                        $this->error = "PIP";
                        $this->error_msg = "Can't add meal on this date , as this date is in pause Date range.";
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Usergoalmaster();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }
                }
            }


            $time_after_two_days = date('Y-m-d 00:00:00', strtotime("+".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime($current_date_time)));

            $date_diff = date_diff(date_create($meal_date), date_create($time_after_two_days));

            $array_date = array('date' => $current_date_time, 'after_two_days' => $time_after_two_days, 'hours' => $date_diff->h, 'days' => $date_diff->d, 'meal_date' => $meal_date);

            // if (strtotime($meal_date) <= strtotime($time_after_two_days)) { due to whatapp audio on 7 sept 2019
            if (strtotime($meal_date) < strtotime($time_after_two_days)) {

                $this->error = "PIW";
                $this->error_msg = "Cant Order before ".$this->SELECT_MEAL_AFTER_DAYS ."days of delivery.";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Usergoalmaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }

            $order_id = $param->order_id;
            $user_id = $param->user_id;
            $package_id = $param->package_id;
            $lat = !empty($param->lat) ? $param->lat : 0;
            $lang = !empty($param->lang) ? $param->lang : 0;
            $meal = json_decode($param->meal);
            //$meal_day = date('D',($param->meal_date/1000));
            $meal_day = date('D', strtotime($param->meal_date));
            //$meal_date = date('Y-m-d',($param->meal_date/1000));
            $meal_date = date('Y-m-d', strtotime($param->meal_date));
            $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_id);
            if($orderInfo){
                if($orderInfo->getOrder_status() == 'cancel'){
                    $this->error = "PIC";
                    $this->error_msg = "Package Cancelled";
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Usergoalmaster();
                    $this->data = $emptyObj;
                    return $this->responseAction();
                }
            }
            

            $em = $this->getDoctrine()->getManager();
            $array_meal_ok = true;
            $meal_count = 0;
            $soup_count = 0;
            $snakes_count = 0;
            if (!empty($meal)) {
                foreach ($meal as $meal_data) {
                    if (
                        array_key_exists("main_meal_id", $meal_data) &&
                        array_key_exists("meal_qty", $meal_data) &&
                        array_key_exists("proteins_amount", $meal_data) &&
                        array_key_exists("carbs_amount", $meal_data) &&
                        array_key_exists("meal_type", $meal_data)
                    ) {
                        #meal_count
                        if ($meal_data->meal_type == 1 || $meal_data->meal_type == 2) {
                            //$meal_count = $meal_count + 1;
                            $meal_count = $meal_count + $meal_data->meal_qty;
                        }
                        #snakes count
                        if ($meal_data->meal_type == 3) {
                            //$snakes_count = $snakes_count + 1;
                            $snakes_count = $snakes_count + $meal_data->meal_qty;
                        }

                        #soup count
                        if ($meal_data->meal_type == 10) {
                            //$soup_count = $soup_count + 1;
                            $soup_count = $soup_count + $meal_data->meal_qty;
                        }
                        
                    } else {
                        $array_meal_ok = false;
                    }
                }
            }

            if (!$array_meal_ok || $meal == '') {
                $this->error = "Meal Array is Wrong";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Usergoalmaster();
                $this->data = $emptyObj;
                return $this->responseAction();
            }

            $user = $em->getRepository("AdminBundle:Usermaster")->findBy(array('user_master_id' => $user_id, 'is_deleted' => 0));
            if ($user) {
                #check order for given package and order id and user_id
                $order = $em->getRepository("AdminBundle:Ordermaster")->findOneBy(array('order_master_id' => $order_id, 'is_deleted' => 0, 'order_by' => $user_id, 'package_id' => $package_id));

                if ($order) {
                    $order_end_date = $order->getEnd_date();
                    $order_start_date = $order->getStart_date();
                    if (strtotime($meal_date) <= strtotime($order_end_date) && strtotime($meal_date) >= strtotime($order_start_date) && strtotime($meal_date) >= strtotime($today)) {

                        #getPackageDetails no of meals and snakes
                        $package = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(array('main_package_master_id' => $package_id, 'is_deleted' => 0));
                        if ($package) {

                            #get Meal type Counts from in V2 table : order_meal_types_include_relation
                            $order_start_date = $order_start_date;

                            $sql_ = "select sum(total_meal_type) as total_count,meal_type from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date <= '$meal_date' group by meal_type order by start_from_date DESC";
                            $totalMealCount = $this->fireQuery($sql_);


                            $meals_allowed = 0;
                            $snakes_allowed = 0;
                            $soup_allowed = 0;
                            $max_meal_count_flag = true ;
                            if (!empty($totalMealCount)) {
                                foreach ($totalMealCount as $_totalMealCount) {
                                    if ($_totalMealCount['meal_type'] == 1 || $_totalMealCount['meal_type'] == 2) {
                                        $meals_allowed = $meals_allowed + $_totalMealCount['total_count'];
                                    }

                                    if ($_totalMealCount['meal_type'] == 3) {
                                        $snakes_allowed = $_totalMealCount['total_count'];
                                    }

                                    if ($_totalMealCount['meal_type'] == 10) {
                                        $soup_allowed = $_totalMealCount['total_count'];
                                    }
                                }
                            }
                            $order_meal_exist = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                array(
                                    'order_master_id' => $order_id,
                                    'is_deleted' => 0,
                                    'requested_datetime' => $meal_date
                                )
                            );
                            foreach ($meal as $meal_data) {
                                $product_id  = $meal_data->main_meal_id ;
                                $P_meal_qty = $meal_data->meal_qty ;
                                $product_meal_added = 0 ;
//                                if($order_meal_exist && false){
//                                    $order_meal_relation_id = $order_meal_exist->getOrder_meal_relation_id() ;
//                                    $qur = "SELECT  sum(meal_product_qty) as product_added FROM `meal_product_relation` WHERE `meal_id` = ".$order_meal_relation_id." and main_product_id = ".$product_id." and is_deleted = 0" ; 
//                                    $res = $this->fireQuery($qur);                                    
//                                    if($res){
//                                        $product_meal_added = (int)$res[0]['product_added'] ; 
//                                    }
//                                }
                                
                                $meal_added_going_to_be = $product_meal_added + $P_meal_qty ;
                                $product_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->find($product_id);
                                $product_max_qty = $product_info->getMax_meal_value();

                              
                                if($meal_added_going_to_be <= $product_max_qty ){
                                    
                                }
                                else{
                                  
                                    $max_meal_count_flag = false ;
                                    $this->error = "PIW";
                                    $this->error_msg = "Product meal Max value : exceeds Limit";
                                    $this->status = 201;
                                    $this->message = false;
                                    $emptyObj = new Usergoalmaster();
                                    $this->data = $emptyObj;
                                    return $this->responseAction();
                                }
                            }
                      //      exit;
                            if ($snakes_count <= $snakes_allowed && $meal_count <= $meals_allowed && $soup_count <= $soup_allowed && $max_meal_count_flag == true) {

                                
                                $current_day_meal_id = $meal_id = 0;
                                $meal_id_list = null;

                                $isEditCopyMeal = false;

                                if ($order_meal_exist) {

                                    #date validation of delivery date
                                    //$date_before_two_days = date('Y-m-d H:i:s', strtotime("-2 days", strtotime($order_meal_exist->getRequested_datetime())));
                                    $date_before_two_days = date('Y-m-d H:i:s', strtotime("-".$this->SELECT_MEAL_AFTER_DAYS . " days", strtotime($order_meal_exist->getRequested_datetime())));

                                    if (strtotime($today) < strtotime($date_before_two_days)) {

                                        $assign_driver_id  = 0 ;
                                        $st = 'ordered' ; 
                                        $checkDriverMeal = $this->firequery("SELECT * FROM order_meal_relation where is_deleted = 0 and order_master_id = " . $order_id . " and assign_driver_id != 0 ");
                                        if($checkDriverMeal){
                                            $assign_driver_id = $checkDriverMeal[0]['assign_driver_id'];
                                            $st = 'driver_assigned' ; 
                                        }

                                        $order_meal_exist->setOrder_master_id($order_id);
                                        //$order_meal_exist->setUnique_no($unique_no);
                                        $order_meal_exist->setUser_id($user_id);
                                        $order_meal_exist->setMeal_day(strtolower($meal_day));
                                        $order_meal_exist->setLast_modified_datetime(date('Y-m-d H:i:s'));
                                        $order_meal_exist->setRequested_datetime($meal_date);
                                        $order_meal_exist->setAssign_driver_id($assign_driver_id);
                                        $order_meal_exist->setStatus($st);
                                        $order_meal_exist->setNot_delivered_reason(0);
                                        $order_meal_exist->setLat($lat);
                                        $order_meal_exist->setLang($lang);
                                        $order_meal_exist->setIs_deleted(0);

                                        $em->flush();
                                        $current_day_meal_id = $meal_id = $order_meal_exist->getOrder_meal_relation_id();

                                        $meal_id_list[] = $meal_id;

                                        $meal_day_ = strtolower($meal_day);
                                        #copyToSameDay
                                        if (!empty($param->isCopyToAllDays) && $param->isCopyToAllDays == 'yes') {
                                            /*$sql_get_upcoming_days = "select order_meal_relation_id from order_meal_relation
																							 where order_master_id = '$order_id' and requested_datetime > '$meal_date' 
																							 and meal_day = '$meal_day_' and is_deleted = 0 ";
                                            $upcoming_meals = $this->fireQuery($sql_get_upcoming_days);

                                            if (!empty($upcoming_meals)) {
                                                foreach ($upcoming_meals as $_upcoming_meals) {
                                                    $meal_id_list[] = $_upcoming_meals['order_meal_relation_id'];
                                                }
                                            }*/

                                            $index = 0;
                                            $dayInd = 7;
                                            $updateDayList = [];
                                            $dayList = [];
                                            while (strtotime("+{$dayInd} days {$meal_date}") <= strtotime($order_end_date)) {
                                                $next_same_day = date("Y-m-d", strtotime("+{$dayInd} days {$meal_date}")) . '<br>';
    
                                                if (date('D', strtotime($next_same_day) == $meal_day)) {
                                                    // check if already ordered or not
                                                    
                                                    $dayList[] = $next_same_day;
                                                }
    
                                                $index++;
                                                $dayInd = $dayInd + 7;
                                            }

                                            $isEditCopyMeal = true;
                                            if (!empty($dayList)) {
                                                foreach ($dayList as $next_same_day) {

                                                    $checkMeal = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                                        array(
                                                            'order_master_id' => $order_id,
                                                            'is_deleted' => 0,
                                                            'requested_datetime' => $next_same_day
                                                        )
                                                    );
        
                                                    $unique_no = $this->getUniqueCode();
                                                    if(!empty($checkMeal)){
                                                        $meal_id = $checkMeal->getOrder_meal_relation_id();
                                                    } else {
														
														$assign_driver_id  = 0 ;
                                                         $st = 'ordered' ; 
														$checkDriverMeal = $this->firequery("SELECT * FROM order_meal_relation where is_deleted = 0 and order_master_id = " . $order_id . " and assign_driver_id != 0 ");
                                                        if($checkDriverMeal){
                                                            $assign_driver_id = $checkDriverMeal[0]['assign_driver_id'];
                                                             $st = 'driver_assigned' ; 
                                                        }
														
														
                                                        $new_meal = new Ordermealrelation();
                                                        $new_meal->setOrder_master_id($order_id);
                                                        $new_meal->setUnique_no($unique_no);
                                                        $new_meal->setUser_id($user_id);
                                                        $new_meal->setMeal_day(strtolower($meal_day));
                                                        $new_meal->setCreated_datetime(date('Y-m-d H:i:s'));
                                                        $new_meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                                                        $new_meal->setRequested_datetime($next_same_day);
                                                        $new_meal->setAssign_driver_id($assign_driver_id );
                                                        $new_meal->setStatus($st);
                                                        $new_meal->setNot_delivered_reason(0);
                                                        $new_meal->setLat($lat);
                                                        $new_meal->setLang($lang);
                                                        $new_meal->setIs_deleted(0);
                                                        $em->persist($new_meal);
                                                        $em->flush();
            
                                                        $meal_id = $new_meal->getOrder_meal_relation_id();
            
                                                        if ($meal_date == $next_same_day) {
                                                            $current_day_meal_id = $meal_id;
                                                        }
                                                    }
                                                    $meal_id_list[] = $meal_id;
                                                }
                                            }

                                            if (!empty($meal) && !empty($meal_id_list) != 0) {
                                                #delete Existed Meal
                                                
                                                    foreach ($meal_id_list as $meal_id) {
                                                        $meal_product_exist = $em->getRepository("AdminBundle:Mealproductrelation")->findBy(array('meal_id' => $meal_id, 'is_deleted' => 0));
                                                        if ($meal_product_exist) {
                                                            foreach ($meal_product_exist as $exist_product) {
                                                                $exist_product->setIs_deleted(1);
                                                                $em->flush();
                                                            }
                                                        }
                                                    }
            
                                                foreach ($meal as $meal_data) {
            
                                                    if (isset($meal_data->raw_eggs)) {
                                                        $raw_eggs = $meal_data->raw_eggs;
                                                    } else {
                                                        $raw_eggs = 0;
                                                    }
            
                                                    if (isset($meal_data->white_eggs)) {
                                                        $white_eggs = $meal_data->white_eggs;
                                                    } else {
                                                        $white_eggs = 0;
                                                    }

                                                    if (isset($meal_data->calory)) {
                                                        $calory = $meal_data->calory;
                                                    } else {
                                                        $calory = 0;
                                                    }
            
                                                    foreach ($meal_id_list as $meal_id) {
                                                        $new_meal_product = new Mealproductrelation();
                                                        $new_meal_product->setMeal_id($meal_id);
                                                        $new_meal_product->setMain_product_id($meal_data->main_meal_id);
                                                        $new_meal_product->setMeal_product_qty($meal_data->meal_qty);
                                                        $new_meal_product->setProteins_amount($meal_data->proteins_amount);
                                                        $new_meal_product->setCarbs_amount($meal_data->carbs_amount);
                                                        $new_meal_product->setSelected_proteins($meal_data->selected_proteins);
                                                        $new_meal_product->setSelected_carbs($meal_data->selected_carbs);
                                                        $new_meal_product->setRaw_eggs($raw_eggs);
                                                        $new_meal_product->setWhite_eggs($white_eggs);
                                                        $new_meal_product->setCalory($calory);
            
                                                        $new_meal_product->setMeal_type($meal_data->meal_type);
                                                        $new_meal_product->setIs_deleted(0);
                                                        $em->persist($new_meal_product);
                                                        $em->flush();
                                                    }
                                                }
                                            }
                                        }
                                        #copyToSameDay done
                                    } else {
                                        $this->error = "ETG";
                                        $this->error_msg = "Edit Time Gone";
                                    }
                                } 
                                else {

                                    // find number of times same day comes
                                    $index = 0;
                                    $current_day_meal_id = 0;
                                    $dayInd = 7;
                                    $dayList = null;
                                    $dayList[] = $meal_date;

                                    if (!empty($param->isCopyToAllDays) && $param->isCopyToAllDays == 'yes') {
                                        while (strtotime("-{$dayInd} days {$meal_date}") >= strtotime($order_start_date)) {
                                            $next_same_day = date("Y-m-d", strtotime("+{$dayInd} days {$meal_date}")) . '<br>';

                                            if (date('D', strtotime($next_same_day) == $meal_day)) {
                                                // check if already ordered or not
                                                $checkMeal = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                                    array(
                                                        'order_master_id' => $order_id, 'is_deleted' => 0, 'requested_datetime' => $next_same_day
                                                    )
                                                );

                                                if (empty($checkMeal)) {
                                                    $dayList[] = $next_same_day;
                                                }
                                            }

                                            $index++;
                                            $dayInd = $dayInd + 7;
                                        }

                                        while (strtotime("+{$dayInd} days {$meal_date}") <= strtotime($order_end_date)) {
                                            $next_same_day = date("Y-m-d", strtotime("+{$dayInd} days {$meal_date}")) . '<br>';

                                            if (date('D', strtotime($next_same_day) == $meal_day)) {
                                                // check if already ordered or not
                                                $checkMeal = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                                    array(
                                                        'order_master_id' => $order_id, 'is_deleted' => 0, 'requested_datetime' => $next_same_day
                                                    )
                                                );

                                                if (empty($checkMeal)) {
                                                    $dayList[] = $next_same_day;
                                                }
                                            }

                                            $index++;
                                            $dayInd = $dayInd + 7;
                                        }
                                    }

                                    if ((!$isEditCopyMeal) && !empty($dayList)) {
                                        foreach ($dayList as $next_same_day) {

                                            $unique_no = $this->getUniqueCode();
											$assign_driver_id = 0 ;
                                            $st = 'ordered' ; 
                                            $checkDriverMeal = $this->firequery("SELECT * FROM order_meal_relation where is_deleted = 0 and order_master_id = " . $order_id . " and assign_driver_id != 0 ");
                                            if($checkDriverMeal){
                                                $assign_driver_id = $checkDriverMeal[0]['assign_driver_id'];
                                                $st = 'driver_assigned' ; 
                                            }
                                            $new_meal = new Ordermealrelation();
                                            $new_meal->setOrder_master_id($order_id);
                                            $new_meal->setUnique_no($unique_no);
                                            $new_meal->setUser_id($user_id);
                                            $new_meal->setMeal_day(strtolower($meal_day));
                                            $new_meal->setCreated_datetime(date('Y-m-d H:i:s'));
                                            $new_meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                                            $new_meal->setRequested_datetime($next_same_day);
                                            $new_meal->setAssign_driver_id($assign_driver_id);
                                            $new_meal->setStatus($st);
                                            $new_meal->setNot_delivered_reason(0);
                                            $new_meal->setLat($lat);
                                            $new_meal->setLang($lang);
                                            $new_meal->setIs_deleted(0);
                                            $em->persist($new_meal);
                                            $em->flush();

                                            $meal_id = $new_meal->getOrder_meal_relation_id();

                                            if ($meal_date == $next_same_day) {
                                                $current_day_meal_id = $meal_id;
                                            }

                                            $meal_id_list[] = $meal_id;
                                        }
                                    }
                                }
                                
                                if ((!$isEditCopyMeal) && !empty($meal) && !empty($meal_id_list) != 0) {
                                    #delete Existed Meal
                                    if ($order_meal_exist) {
                                        foreach ($meal_id_list as $meal_id) {
                                            $meal_product_exist = $em->getRepository("AdminBundle:Mealproductrelation")->findBy(array('meal_id' => $meal_id, 'is_deleted' => 0));
                                            if ($meal_product_exist) {
                                                foreach ($meal_product_exist as $exist_product) {
                                                    $exist_product->setIs_deleted(1);
                                                    $em->flush();
                                                }
                                            }
                                        }
                                    }

                                    foreach ($meal as $meal_data) {

                                        if (isset($meal_data->raw_eggs)) {
                                            $raw_eggs = $meal_data->raw_eggs;
                                        } else {
                                            $raw_eggs = 0;
                                        }

                                        if (isset($meal_data->white_eggs)) {
                                            $white_eggs = $meal_data->white_eggs;
                                        } else {
                                            $white_eggs = 0;
                                        }
                                        if (isset($meal_data->calory)) {
                                            $calory = $meal_data->calory;
                                        } else {
                                            $calory = 0;
                                        }

                                        foreach ($meal_id_list as $meal_id) {
                                            $new_meal_product = new Mealproductrelation();
                                            $new_meal_product->setMeal_id($meal_id);
                                            $new_meal_product->setMain_product_id($meal_data->main_meal_id);
                                            $new_meal_product->setMeal_product_qty($meal_data->meal_qty);
                                            $new_meal_product->setProteins_amount($meal_data->proteins_amount);
                                            $new_meal_product->setCarbs_amount($meal_data->carbs_amount);
                                            $new_meal_product->setSelected_proteins($meal_data->selected_proteins);
                                            $new_meal_product->setSelected_carbs($meal_data->selected_carbs);
                                            $new_meal_product->setRaw_eggs($raw_eggs);
                                            $new_meal_product->setWhite_eggs($white_eggs);
                                            $new_meal_product->setCalory($calory);
                                            $new_meal_product->setMeal_type($meal_data->meal_type);
                                            $new_meal_product->setIs_deleted(0);
                                            $em->persist($new_meal_product);
                                            $em->flush();
                                        }
                                    }
                                }

                                $this->error = "SFD";
                                $response = array('meal_id' => $current_day_meal_id);
                            } else {
                                $this->error = "PIW";
                                $this->error_msg = "Meal or Snakes count exceeds limit.";
                            }
                        } else {
                            $this->error = "PNE";
                        }
                    } else {
                        $this->error = "ODW";
                        $this->error_msg = "Date is not between Order Period";
                    }
                } else {
                    $this->error = "ONE";
                    $this->error_msg = "Oorder not found";
                }
            } 
            else {
                $this->error = "UNE";
            }
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Usergoalmaster();
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

    public function getUniqueCode()
    {
        $_sql = "SELECT * from order_meal_relation order by unique_no desc";
        $data = $this->firequery($_sql);

        if (!empty($data)) {
            $unique_no = (int) $data[0]['unique_no'];
            $unique_no = $unique_no + 1;
        } else {
            $unique_no = 10001;
        }

        return $unique_no;
    }
}
