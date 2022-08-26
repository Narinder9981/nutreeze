<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;
use AdminBundle\Entity\Aboutus;

class ReportsController extends BaseController {

    private $upload_doc_dir = "/bundles/design/uploads/about_us/";

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();

        $session = new Session();
        if(in_array($session->get('role_id'), [1])){
            // allow - Superadmin
        } else {
            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }

    /**
     * @Route("/summary/{flag_type}/{filter_date_selected}",defaults={"flag_type"="0","filter_date_selected"="0"})
     * @Template()
     */
    public function summaryAction($flag_type, $filter_date_selected) {

        $domain_id = 1;
        $languages = $this->getLanguages();
        $live_path = $this->container->getParameter('live_path');
        if (isset($_POST['date_filter'])) {
            $filter_date = $_POST['date_filter'];
        } else {
            $filter_date = $filter_date_selected;
            if ($filter_date_selected == '0') {
                $filter_date = date("Y-m-d");
            }
        }
        $timestamp = strtotime($filter_date);
        $filter_day = date('D', $timestamp);
        $filter_day_number = date('N', strtotime($filter_day));

        $_toDay = date('Y-m-d');

       

       
        $dateWiseQuery = " SELECT *, user_master_id as user_id from order_master o, user_master u where o.order_by = u.user_master_id and start_date <= '{$filter_date}' and end_date >= '{$filter_date}' and o.is_deleted = 0 and u.is_deleted = 0 and order_status = 'success' and order_master_id NOT IN (SELECT pause_package.order_id FROM `pause_package` JOIN pause_package_history ON pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE ( ( pause_package_history.resume_choice = 'admin' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date >= '{$filter_date}' OR pause_package.pause_end_date IS NULL ) ) OR ( pause_package_history.resume_choice = 'customer' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date_by_update >= '{$filter_date}' OR pause_package.pause_end_date_by_update IS NULL ) ) ) AND pause_package.is_deleted = 0) group by o.order_master_id";
      

       $dateWiseQuery = " SELECT    order_master.*,    user_master_id AS user_id , order_meal_relation.order_meal_relation_id,order_meal_relation.order_meal_relation_id, order_meal_relation.meal_day , order_meal_relation.status, order_meal_relation.requested_datetime , order_meal_relation.assign_driver_id   FROM   order_master  join  user_master  on order_master.order_by = user_master.user_master_id      LEFT JOIN order_meal_relation ON order_master.order_master_id = order_meal_relation.order_master_id AND order_meal_relation.requested_datetime = '{$filter_date}'    WHERE order_master.start_date <= '{$filter_date}' AND order_master.end_date >= '{$filter_date}' AND order_master.is_deleted = 0 AND user_master.is_deleted = 0 AND order_master.order_status = 'success' AND order_master.order_master_id NOT IN(    SELECT pause_package.order_id FROM `pause_package` JOIN pause_package_history ON pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE ( ( pause_package_history.resume_choice = 'admin' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date >= '{$filter_date}' OR pause_package.pause_end_date IS NULL ) ) OR( pause_package_history.resume_choice = 'customer' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date_by_update >= '{$filter_date}' OR pause_package.pause_end_date_by_update IS NULL ) ) ) AND pause_package.is_deleted = 0) GROUP BY    order_master.order_master_id  ORDER BY `order_master`.`order_by` ASC";

    // echo $dateWiseQuery ;  exit;
        $dateWiseData = $this->fireQuery($dateWiseQuery);

        $alloted_to_add_meal_count = count($dateWiseData);

        //-------pause start---------------------
         $pausedateWiseQuery = " SELECT pause_package.order_id FROM `pause_package` JOIN pause_package_history ON pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE ( ( pause_package_history.resume_choice = 'admin' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date >= '{$filter_date}' OR pause_package.pause_end_date IS NULL ) ) OR ( pause_package_history.resume_choice = 'customer' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date_by_update >= '{$filter_date}' OR pause_package.pause_end_date_by_update IS NULL ) ) )";
        if($flag_type == 'pause_day'){
             $pausedateWiseQuery = " SELECT * , order_master_id  as order_no , CONCAT (user_master.user_firstname ,' ' , user_master.user_lastname) as user_name , user_master.user_mobile AS user_contact_no , order_master.end_date AS plan_end_on , order_master_id AS days_left , order_master_id AS  driver_name FROM `pause_package` JOIN pause_package_history ON pause_package.pause_package_history_id = pause_package_history.pause_package_history_id join order_master ON pause_package.order_id = order_master.order_master_id join user_master ON pause_package.user_id = user_master.user_master_id WHERE ( ( pause_package_history.resume_choice = 'admin' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date >= '{$filter_date}' OR pause_package.pause_end_date IS NULL ) ) OR ( pause_package_history.resume_choice = 'customer' AND pause_package.pause_start_date <= '{$filter_date}' AND( pause_package.pause_end_date_by_update >= '{$filter_date}' OR pause_package.pause_end_date_by_update IS NULL ) ) )";
        }
       
        $pausedateWiseData = $this->fireQuery($pausedateWiseQuery);
    //   echo "<br>" .  $pausedateWiseQuery ;
        $pauseorder_count = count($pausedateWiseData);
        //-------pause end---------------------

        $orderIds = [];
        $orderIdsStr = '';
        $offDayCount = '0';
        $meal_added_count = $meal_not_added_count = $days_left = $totalDays = 0;
        $off_day_count = $suspend_count = 0;
        $order_data = $offDayList = [];
        if ($dateWiseData) {
            $filter_date_day_no = date('N', strtotime($filter_date));

            if($filter_date_day_no == 0){
                $filter_date_day_no = 7;
            }

            foreach ($dateWiseData as $datekey => $dateval) {
                $remaining_days = 0 ; 
                //$sql = "SELECT * from order_meal_relation where order_master_id = {$dateval['order_master_id']} and requested_datetime = '{$filter_date}' and is_deleted = 0";

               /* $sql = "SELECT  order_meal_relation_id , assign_driver_id from order_meal_relation where order_master_id = {$dateval['order_master_id']} and requested_datetime = '{$filter_date}' and is_deleted = 0";
              
                $order_meal_relation = $this->firequery($sql);

                if(!empty($order_meal_relation)){
                    $meal_added_count++;
                } else {
                    $meal_not_added_count++;
                }
                */
                if($dateval['order_meal_relation_id'] == NULL || empty($dateval['order_meal_relation_id']) || $dateval['order_meal_relation_id'] == ''){
                    $meal_not_added_count++;
                }
                else if($dateval['order_meal_relation_id'] != NULL && $dateval['order_meal_relation_id'] != 0 ){
                     $meal_added_count++;
                }

                $order_end_date = $order_start_date = $end_date = $start_date = '';
                if (!in_array($dateval['order_master_id'], $orderIds)) {
                    $orderIds[] = $dateval['order_master_id'];
                }
                $days_left = $totalDays = 0;
                $plan_end_on = '';
                $order_no = $dateval['order_master_id'];
                // $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($dateval['order_master_id']);
                // if ($orderInfo) {
                //     $end_date = $orderInfo->getEnd_date();
                //     $start_date = $orderInfo->getStart_date();

                //     $order_end_date = strtotime($end_date);
                //     $order_start_date = strtotime($start_date);
                //     $today_date = date("Y-m-d");
                //     $day = strtotime($end_date) - strtotime($today_date);
                //     $days_left = round($day / (60 * 60 * 24));
                //     $plan_end_on = $end_date;
                //     $order_no = $orderInfo->getUnique_no();
                //     $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                // }
                if($order_no != ''){
                    $end_date = $dateval['end_date'];
                    $start_date = $dateval['start_date'];

                    $order_end_date = strtotime($end_date);
                    $order_start_date = strtotime($start_date);
                    $today_date = date("Y-m-d");
                    $day = strtotime($end_date) - strtotime($today_date);
                    $days_left = round($day / (60 * 60 * 24));
                    $plan_end_on = $end_date;
                    $order_no = $dateval['unique_no'];
                    $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                }

                $sql = "SELECT days_master.days_name,days_master.main_days_master_id, off_day from order_off_days_relation 
                        JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
                        where order_off_days_relation.is_deleted = 0 and order_id = '" . $dateval['order_master_id'] . "' group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysArray = array();

                $total_off_days = 0;

                $date_passed = 0;
                $today = strtotime(date('Y-m-d'));

                $is_off_day = false;
              /*
                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        if($_offDays['off_day'] == $filter_date_day_no){
                            $is_off_day = true;
                            $meal_not_added_count--;
                            if($alloted_to_add_meal_count > 0){
                                $alloted_to_add_meal_count--;
                            }
                        }
                        $offDaysArray [] = $_offDays['main_days_master_id'];
                    }
                }
                $offDaysDate = [];
                //----------- Freeze days -------------------------
                //---freeze days ----------
                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $dateval['order_master_id'],
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
                $suspend_flag = false ;
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
                            if(strtotime($filter_date) == $supend_start_date){
                                $suspend_flag = true ;
                                $suspend_count = $suspend_count + 1 ;
                            }
                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
                    }
                }
                $offDaysDate = [];
                $totalDaysDateArray = []; 
                $passed_days_dateArray = [] ;
                $day_passed = 0 ;
                while ($order_start_date <= $order_end_date) {
                     $totalDaysDateArray[] =  date('Y-m-d', $order_start_date);
                    if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                        $total_off_days += 1;
                         $offDaysDate [] = date('Y-m-d', $order_start_date);
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
                    if(in_array($tdval,$offDaysDate)){
                        unset($totalDaysDateArray[$tdkey]);
                    }
                     if(in_array($tdval,$freezeDays)){
                        unset($totalDaysDateArray[$tdkey]);
                    }
                }
                $remaining_days = count($totalDaysDateArray) ;
                */
               
                //$remaining_days = $totalDays - $total_off_days - $suspesion_days - $date_passed;
                
                $user_name = $user_contact_no = '';
                $user_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($dateval['user_id']);
                if ($user_master_info) {
                    $user_name = $user_master_info->getUser_firstname() . " " . $user_master_info->getUser_lastname();
                    $user_contact_no = $user_master_info->getUser_mobile();
                }

                $driver_name = '';
                $meal_added_flag = false;
                $order_meal_relation_id = 0;
                $assign_driver_id = 0;
               if($dateval['order_meal_relation_id'] != NULL){//  if(!empty($order_meal_relation)){
                    //$order_meal_relation_id = $order_meal_relation[0]['order_meal_relation_id'];
                    //$assign_driver_id = $order_meal_relation[0]['assign_driver_id'];

                    $order_meal_relation_id = $dateval['order_meal_relation_id'];
                    $assign_driver_id = $dateval['assign_driver_id'];

                    // get meal added or not 
                    if ($flag_type == 'meal_added') {
                        $meal_added_query = " SELECT * FROM `meal_product_relation` where meal_id = {$order_meal_relation_id} and is_deleted = 0 ";
                        $meal_added_list = $this->firequery($meal_added_query);
                        if ($meal_added_list) {
                            //$meal_added_count++;
                            $meal_added_flag = true;
                        }
                    }

                    // get Driver Details 
                    $driver_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($assign_driver_id);
                    if ($driver_info) {
                        $driver_name = $driver_info->getUser_firstname() . " " . $driver_info->getUser_lastname();
                    }
                }

                $_sql = "SELECT order_id FROM `order_off_days_relation` WHERE `order_id` IN ({$dateval['order_master_id']}) and off_day = {$filter_day_number} and is_deleted = 0";
                $off_day_rec = $this->firequery($_sql);

                if(!empty($off_day_rec)){
                    $off_day_count++;
                }

                $isValid = false;
                if ($flag_type == 'meal_added') {
                    if ($meal_added_flag == true && $is_off_day == false) {
                        $isValid = true;
                    }
                } else if ($flag_type == 'meal_not_added') {
                    if ($meal_added_flag == false && $is_off_day == false) {
                        $isValid = true;
                    }
                } else if ($flag_type == 'off_day') {
                    if(!empty($off_day_rec)){
                        $isValid = true;    
                    }
                } else if ($flag_type == 'suspend_day') {
                    if(!empty($suspend_flag) && $suspend_flag == true){
                        $isValid = true;    
                    }
                } else if ($flag_type == '0') {
                    if($is_off_day == false){
                        $isValid = true;
                    }
                }

              if(($isValid) ){ //&& ($remaining_days > 0 ) ){
                    $order_data[] = array(
                        "order_meal_realtion_id" => $order_meal_relation_id,
                        "order_master_id" => $dateval['order_master_id'],
                        "order_no" => $order_no,
                        "user_id" => $dateval['user_id'],
                        "user_name" => $user_name,
                        "user_contact_no" => $user_contact_no,
                        "assign_driver_id" => $assign_driver_id,
                        "driver_name" => $driver_name,
                        "assign_status" => $dateval['status'],
                        "days_left" => $remaining_days,
                        "plan_end_on" => $plan_end_on,
                        "meal_added" => $meal_added_flag
                    );
                }
            }

            if (!empty($orderIds)) {
                $orderIdsStr = implode(",", $orderIds);
            }

            $offDayQuery = "SELECT * FROM `order_off_days_relation` WHERE `order_id` IN (" . $orderIdsStr . ") and off_day = " . $filter_day_number . " and is_deleted = 0";
            $offDayList = $this->fireQuery($offDayQuery);
            if ($offDayList) {
                $offDayCount = count($offDayList);
            }
        }

         if($flag_type == 'pause_day'){
             $order_data = $pausedateWiseData ;
         }

        return array(
            'flag_type' => $flag_type, 
            'filter_date' => $filter_date, 
            'meal_added_count' => $meal_added_count, 
            'meal_not_added_count' => $meal_not_added_count, 
            'pauseorder_count' => $pauseorder_count, 
            'alloted_to_add_meal_count' => $alloted_to_add_meal_count, 
            'language_list' => $languages, 
            'off_day_count' => $off_day_count, 
            'suspend_count' => $suspend_count, 
            "order_data" => $order_data
        );
    }
}
