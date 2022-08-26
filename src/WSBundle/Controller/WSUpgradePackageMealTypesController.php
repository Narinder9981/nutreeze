<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;

class WSUpgradePackageMealTypesController extends WSBaseController {

    /**
     * @Route("/ws/mealTypeListForUpgradePackage/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function mealTypeListForUpgradePackageAction($param) {
        // try {
        $this->title = "Meal type List for upgrade package";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('language_id', 'user_id', 'order_id'),
            ),
        );
        if ($this->validateData($param)) {

            //--------------for temporary update -------------------
            /* $this->error = "PIW";
            $this->error_msg = "Service stopped temporary";
            $this->data = false;
            return $this->responseAction(); */
            //---------------------------------
            $language_id = $param->language_id;
            $user_id = $param->user_id;
            $order_id = $param->order_id;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            #check current package remaining days from order_master
            $orderMaster = $em->getRepository("AdminBundle:Ordermaster")
                    ->findOneBy(
                    ["is_deleted" => 0,
                        "order_master_id" => $order_id,
                        "order_by" => $user_id
            ]);
            $offDaysArray = $offDaysDates = $freezeDays = array();

            if ($orderMaster) {
                if($orderMaster->getOrder_status() == 'cancel'){
                    $this->error = "PIC";
                    $this->error_msg = "Package Cancelled";
                    // $this->data = false;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Countrymaster();
                    $this->data = $emptyObj;
                    return $this->responseAction();
                }
                $package_id = $orderMaster->getPackage_id();
                $sub_package_id = $orderMaster->getSub_package_id();
                if ($orderMaster->getPackage_for() != 1) {
                    $this->error = "PIW";
                    $this->error_msg = "Sub package is not Monthly package";
                    // $this->data = false;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Countrymaster();
                    $this->data = $emptyObj;
                    return $this->responseAction();
                }
                $today = strtotime('now');

                $order_end_date = strtotime($orderMaster->getEnd_date());
                $order_start_date = strtotime($orderMaster->getStart_date());
                if ($order_end_date >= $today) {

                    $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;

                    $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findOneBy(
                            array(
                                "order_id" => $order_id,
                                "is_deleted" => 0
                            )
                    );

                    $suspesion_days = 0;
                    if ($checkFreeze) {
                        $supend_start_date = strtotime($checkFreeze->getStart_date());
                        $supend_end_date = strtotime($checkFreeze->getEnd_date());

                        //  $suspesion_days = floor(($supend_end_date - $supend_start_date) / (60 * 60 * 24));
                        while ($supend_start_date <= $supend_end_date) {

                            $freezeDays [] =  date('Y-m-d', $supend_start_date);
                            $suspesion_days += 1;

                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
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
                                    if(strtotime(date("Y-m-d")) >= $pause_start_date){
                                        $this->error = "PIW";
                                        $this->error_msg = "Your Package is in Pause mode";
                                        // $this->data = false;
                                        $this->status = 201;
                                        $this->message = false;
                                        $emptyObj = new Countrymaster();
                                        $this->data = $emptyObj;
                                        return $this->responseAction();
                                    }
                                }
                            }
                            else if ($resume_choice == 'customer'){
                                if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                                    if(strtotime(date("Y-m-d")) >= $pause_start_date){
                                        $this->error = "PIW";
                                        $this->error_msg = "Your Package is in Pause mode";
                                        // $this->data = false;
                                        $this->status = 201;
                                        $this->message = false;
                                        $emptyObj = new Countrymaster();
                                        $this->data = $emptyObj;
                                        return $this->responseAction();
                                    }
                                }
                                elseif($_checkPause->getPause_end_date_by_update() == NULL || $_checkPause->getPause_end_date_by_update() == ''){
                                    if(strtotime(date("Y-m-d")) >= $pause_start_date){
                                        $this->error = "PIW";
                                        $this->error_msg = "Your Package is in Pause mode";
                                        // $this->data = false;
                                        $this->status = 201;
                                        $this->message = false;
                                        $emptyObj = new Countrymaster();
                                        $this->data = $emptyObj;
                                        return $this->responseAction();
                                    }
                                }
                                $pasue_end_date = $pause_end_date_by_update ;
                            }
                            while ($pause_start_date <= $pasue_end_date) {

                                $PauseDays [] = date('Y-m-d', $pause_start_date);
                                $pause_days += 1;

                                $pause_start_date = strtotime("+1 day", $pause_start_date);
                            }
                        }
                    }
                    $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
						JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
						where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

                    $offDays = $this->fireQuery($sql);
                    $total_off_days = 0;

                    if (!empty($offDays)) {
                        foreach ($offDays as $_offDays) {
                            $offDaysArray [] = $_offDays['main_days_master_id'];
                        }
                    }
                    $date_passed = 0;
                    $today = strtotime(date('Y-m-d'));
                    $offDaysDate = [];
                    $totalDaysDateArray = []; 
                    $passed_days_dateArray = [] ;
                    $day_passed = 0 ;
                    while ($order_start_date <= $order_end_date) {
                         $totalDaysDateArray[] =  date('Y-m-d', $order_start_date);
                        //echo "<br> " .date("Y-m-d",$order_start_date) . " and num of day ". date('N', $order_start_date);

                        //if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                        if (( in_array(date('N', $order_start_date), $offDaysArray)  ) && !in_array($order_start_date, $freezeDays)) {
                            $total_off_days += 1;
                            $offDaysDates [] = date('Y-m-d', $order_start_date);
                        }
                        if ($order_start_date <= $today) {
                            $passed_days_dateArray[] =  date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }
                        $order_start_date = strtotime("+1 day", $order_start_date);
                    }
                 
                  
                    foreach($totalDaysDateArray as $tdkey => $tdval){
                        if(in_array($tdval,$passed_days_dateArray)){
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if(in_array($tdval,$offDaysDates)){
                            unset($totalDaysDateArray[$tdkey]);
                        }
                         if(in_array($tdval,$freezeDays)){
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if(in_array($tdval,$PauseDays)){
                            unset($totalDaysDateArray[$tdkey]);
                        }
                    }
                    $remaining_days = count($totalDaysDateArray) ;
               


                    $meal_added_days = 0;

                    $sql_meal_added = "select count(order_meal_relation_id) as added_meal_day
											from order_meal_relation
											where order_master_id = '$order_id' and is_deleted = 0";
                    $mealAddedDays = $this->fireQuery($sql_meal_added);
                    if (!empty($mealAddedDays)) {
                        $meal_added_days = $mealAddedDays[0]['added_meal_day'];
                    }
                    $logic_dayCnt = 0;
                    $next_day = $todayDate = strtotime(date("Y-m-d"));
                    $logic_cnt = 1;
                    //  var_dump($offDaysDates);
                    //  echo "<br>logic_cnt " .$logic_cnt ;
                  //  while ($logic_cnt < 2) {
                    while ($logic_cnt < 2) {
                        $next_day = strtotime("+1 day", $todayDate);
                        // echo "<br><br>=========>check with date : ". $next_day;
                        if (in_array($next_day, $offDaysDates)) {
                            
                        } else {
                            $logic_dayCnt++;
                        }
                        //   echo "<br>logic_cnt " .$logic_cnt ." and cnt : " . $logic_dayCnt ;
                        $logic_cnt++;
                    }

                    //  $remaining_days = $totalDays - ( $suspesion_days + $meal_added_days + $total_off_days );
                   // $remaining_days = $totalDays - $total_off_days - $suspesion_days - $logic_dayCnt - $date_passed;
                    $availabel_for_suspend_days = false;

                   // if ($remaining_days > 2) {
                    if ($remaining_days > $this->SELECT_MEAL_AFTER_DAYS) {
                        $availabel_for_suspend_days = true;
                    }
                    $days_array = array(
                        'totalDays' => $totalDays,
                        'suspesion_days' => $suspesion_days,
                        'meal_added_days' => $meal_added_days,
                        'total_off_days' => $total_off_days,
                        'upgrade_logic_days_minus' => $logic_dayCnt
                    );


                    //echo $day_remains_overall;exit;
                   // if ($remaining_days > 2) {
                    if ($remaining_days > $this->SELECT_MEAL_AFTER_DAYS) {

                        #getPerMealTypePrice
                        $sql_get_meal_type = "select * from package_per_category_master 
							JOIN product_category_master ON product_category_master.main_product_category_master_id = package_per_category_master.meal_type_id 
							where package_per_category_master.is_deleted = 0 and product_category_master.is_deleted = 0 and product_category_master.language_id = '$language_id'
							and package_per_category_master.package_id = '$package_id'";

                        $mealTypeList = $this->fireQuery($sql_get_meal_type);

                        if (!empty($mealTypeList)) {
                            foreach ($mealTypeList as $_mealTypeList) {
                                if ($_mealTypeList['meal_type_id'] != 1) {
                                    $sub_package_meal_qty = 0;
                                    $sub_package_meal_value_list = $this->fireQuery("SELECT *  FROM `sub_package_combination_master` WHERE `sub_package_id` = " . $sub_package_id . " and is_deleted = 0 and meal_type_id = " . $_mealTypeList['meal_type_id']);
                                    if (!empty($sub_package_meal_value_list)) {
                                        $sub_package_meal_qty = $sub_package_meal_value_list[0]['meal_value'];
                                    }
                                    //--------upgraded meal type qty
                                    $upgrade_pacakge_meal_value_list = $this->fireQuery("SELECT   sum(total_meal_type) as total_meal_type  FROM `order_meal_types_include_relation` WHERE `order_id` = " . $order_id . " and is_deleted = 0 and is_archive = 0 and added_flag = 'upgrade' and meal_type = " . $_mealTypeList['meal_type_id'] . " and order_package_upgrade_history_id IN (SELECT order_package_upgrade_history_id FROM `order_package_upgrade_history` WHERE `order_id` = ". $order_id . " and status = 'paid' and is_deleted = 0 and added_flag = 'upgrade')");
                                    $meal_type_upgrade_value = 0;
                                    if (!empty($upgrade_pacakge_meal_value_list)) {
                                        $meal_type_upgrade_value = $upgrade_pacakge_meal_value_list[0]['total_meal_type'];
                                    }
                                    $response [] = array(
                                        "sub_package_id" => $sub_package_id,
                                        "package_id" => $package_id,
                                        "days_array" => $days_array,
                                        "days_remain" => $remaining_days,
                                        "meal_type_id" => $_mealTypeList['meal_type_id'],
                                        "meal_type_name" => $_mealTypeList['product_category_name'],
                                        "unit_price" => $_mealTypeList['unit_price'],
                                        //"sub_package_meal_type_qty" =>$sub_package_meal_qty,
                                        //"upgrade_meal_type_qty" =>$meal_type_upgrade_value,
                                        "max_upgrade_limit" => $this->SELECT_MEAL_AFTER_DAYS + $sub_package_meal_qty,
                                        "remaining" => $this->SELECT_MEAL_AFTER_DAYS - $meal_type_upgrade_value,
                                        //"price" => ( $_mealTypeList['unit_price'] * $remaining_days - ( 2 * $_mealTypeList['unit_price'] ) )
                                        "price" => ( $_mealTypeList['unit_price'] * $remaining_days - ( $this->SELECT_MEAL_AFTER_DAYS * $_mealTypeList['unit_price'] ) )
                                    );
                                }
                            }
                            $this->error = "SFD";
                        } else {
                            $this->error = "NRF";
                        }
                    } else {
                        $this->error = "PIW";
                        $this->error_msg = "Only Three days Left , Cant Upgrade the package";
                    }
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
//        } catch (\Exception $e) {
//            $this->error = "SFND";
//            $this->error_msg = $e->getMessage();
//            $this->data = false;
//            return $this->responseAction();
//        }
    }

}

?>