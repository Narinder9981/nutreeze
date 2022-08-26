<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;
class WSGetOrderDatesDetailsController extends WSBaseController {
    /**
     * @Route("/ws/getOrderDates/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function getOrderDatesAction($param) {
        try {
            $this->title = "Order Dates List";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('order_id'),
                ),
            );
            if ($this->validateData($param)) {
                $order_id = $param->order_id;
                $given_date = !empty($param->given_date) ? strtotime(date('Y-m-d', strtotime($param->given_date))) : 0;
                $display_passed_dates =  !empty($param->display_passed_dates) ? $param->display_passed_dates : "yes" ;
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $sql_get_orders = "select order_master_id,start_date,end_date from order_master where order_master_id = '$order_id' ";
                $stmt = $connection->prepare($sql_get_orders);
                $stmt->execute();
                $order = $stmt->fetchAll();
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
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->data = $emptyObj;
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
                $sql_get_order_meal_dates = "select requested_datetime from order_meal_relation where order_master_id = '$order_id' ";
                $stmt = $connection->prepare($sql_get_order_meal_dates);
                $stmt->execute();
                $meal_added_dates = $stmt->fetchAll();
                $mealAddedDates = null;
                if ($meal_added_dates) {
                    foreach ($meal_added_dates as $_meal_added_dates) {
                        $mealAddedDates [] = strtotime($_meal_added_dates['requested_datetime']);
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
                        $totalBreakfastInOrder = 0;
                        if ($totalMealsCountInOrder) {
                            foreach ($totalMealsCountInOrder as $_totalMealsCountInOrder) {
                               // if ($_totalMealsCountInOrder['meal_type'] == 1 || $_totalMealsCountInOrder['meal_type'] == 2) {
                                if ($_totalMealsCountInOrder['meal_type'] ==  2) {
                                    $totalMealsInOrder =  $_totalMealsCountInOrder['total_count'];
                                }
                                if ($_totalMealsCountInOrder['meal_type'] ==  1) {
                                    $totalBreakfastInOrder =  $_totalMealsCountInOrder['total_count'];
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
                            "totalBreakfastInOrder" => $totalBreakfastInOrder,
                            "totalSoupsInOrder" => $totalSoupsInOrder,
                        );
                    }
                }
               
                if (!empty($order)) {
                    $start_date = strtotime($order[0]['start_date']);
                    $end_date = strtotime($order[0]['end_date']);
                    if(!empty($given_date) && (( strtotime( date("Y-m-d" ) )) == $start_date )) {
                      
                        $start_date = $given_date;
                        $start_date = strtotime("+1 day", $start_date);
                    }
                    elseif (!empty($given_date) && ( strtotime( date("Y-m-d" ) )) > $start_date ) {
                        $start_date = $given_date;
                    }
                    $upgraded_gram = $package_gram = 0 ;
                    $gram_label = 'Gram';
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
                        else{  $start_date1=date('Y-m-d',$start_date);
                            $sql_ = "select meal_type,sum(total_meal_type) as total_count from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date >= '$start_date1' group by meal_type";
                           
                            $totalMealsCountInOrder = $this->fireQuery($sql_);
                            $totalMealsInOrder = 0;
                            $totalSnacksInOrder = 0;
                            $totalSoupsInOrder = 0;
                            $totalBreakfastInOrder = 0;
                            if ($totalMealsCountInOrder) {
                                foreach ($totalMealsCountInOrder as $_totalMealsCountInOrder) {
                                    //if ($_totalMealsCountInOrder['meal_type'] == 1 || $_totalMealsCountInOrder['meal_type'] == 2) {
                                    if ( $_totalMealsCountInOrder['meal_type'] == 2) {
                                        $totalMealsInOrder =  $_totalMealsCountInOrder['total_count'];
                                    }
                                    if ( $_totalMealsCountInOrder['meal_type'] == 1) {
                                        $totalBreakfastInOrder =  $_totalMealsCountInOrder['total_count'];
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
                                "totalBreakfastInOrder" => $totalBreakfastInOrder,
                            );
                            
                        }
                       
                        if (!empty($meal_count_array)) {
                            foreach ($meal_count_array as $_meal_count_array) {
                                if ($start_date >= $_meal_count_array['start_from_date']) {
                               // if (1) {
                                    $mealBlockToConsider = array(
                                        "totalMealsInOrder" => $_meal_count_array['totalMealsInOrder'],
                                        "totalSnacksInOrder" => $_meal_count_array['totalSnacksInOrder'],
                                        "totalBreakfastInOrder" => $_meal_count_array['totalBreakfastInOrder'],
                                        "totalSoupsInOrder" => $_meal_count_array['totalSoupsInOrder'],
                                    );
                                }
                            }
                        }
                        $is_pause = false;
                        $is_suspend = false;
                        $is_off_day = false;
                        $is_meal_added = false;
                       
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
                            $totalBreakfastInOrder = 0;
                            if ($dataArr) {
                               foreach ($dataArr as $_dataArr) {
                                 //  if ($_dataArr['meal_type'] == 1 || $_dataArr['meal_type'] == 2) {
                                   if ( $_dataArr['meal_type'] == 2) {
                                       $totalMealsInOrder = $_dataArr['total_count'];
                                   }
                                    if ( $_dataArr['meal_type'] == 1) {
                                       $totalBreakfastInOrder = $_dataArr['total_count'];
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
                                        "totalBreakfastInOrder" => $totalBreakfastInOrder,
                                        "totalSoupsInOrder" => $totalSoupsInOrder,
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


                            $response [] = array(
                                "order_id" => $order_id,
                                "is_suspend" => $is_suspend,
                                "is_pause" => $is_pause,
                                "is_off_day" => $is_off_day,
                                "is_meal_added" => $is_meal_added,
                                "scheduled_time" => $start_date,
                                "scheduled_time_read" => date("Y-m-d",$start_date),
                                "mealBlockToConsider" => $mealBlockToConsider,
                                "meal_count_array" => $meal_count_array,
                                "schedule_date" =>  date('d-m-Y', $start_date) ,
    							"schedule_week_id"=> $schedule_week_id ,
    							"schedule_week_name"=> "week".$schedule_week_id ,
								"_ac_schedule_week_id"=>$_ac_schedule_week_id,
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
                $emptyObj = new Countrymaster();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND";
            $this->error_msg = $e->getMessage();
            $this->data = false;
            return $this->responseAction();
        }
    }
}
?>