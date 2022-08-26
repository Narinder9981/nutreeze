<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;

use AdminBundle\Entity\Generalnotification;
use AdminBundle\Entity\Apnsuser;
use AdminBundle\Entity\Gcmuser;

class CustomerserviceController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();

        $session = new Session();
        if (1 || in_array($session->get('role_id'), [1, 6 , 8])) {
            // allow - Superadmin, Customer Service
        } else {

            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: " . $referer);
            exit;
        }
    }

    public function getNotSubscribedUserCount() {
        $userSql = "SELECT order_master.*,
		CONCAT(customer.user_firstname, ' ', customer.user_lastname) as customer_name, customer.user_mobile as mobile_no, email, customer.unique_user_id, package_master.package_name, package_master.package_grams,pk_for.name as pk_for_name, package_master.main_package_master_id, pk_for.main_package_for_master_id 
		from order_master 
		JOIN user_master customer ON customer.user_master_id = order_master.order_by 
		JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
		JOIN package_master ON package_master.main_package_master_id = order_master.package_id
		WHERE order_master.is_deleted = 0 and order_status = 'pending'
		group by customer.user_master_id order by order_master.order_master_id desc";
        $userArr = $this->firequery($userSql);

        $userList = [];
        $_today = date('Y-m-d');
        if (!empty($userArr)) {
            foreach ($userArr as $_user) {
                // check if user subscribed same package successfully or not
                $_userSql = "SELECT order_master.*
				from order_master 
				JOIN user_master customer ON customer.user_master_id = order_master.order_by 
				JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
				JOIN package_master ON package_master.main_package_master_id = order_master.package_id
				WHERE order_master.is_deleted = 0 and order_status != 'pending' 
				AND customer.user_master_id = {$_user['order_by']} 
				AND package_master.main_package_master_id = {$_user['main_package_master_id']} 
				AND pk_for.main_package_for_master_id = {$_user['main_package_for_master_id']} 
				group by customer.user_master_id order by order_master.order_master_id desc";
                $checkSubscription = $this->firequery($_userSql);

                $_user['customer_name'] = urldecode($_user['customer_name']);
                if (empty($checkSubscription)) {
                    // user have not purchased
                    $userList[] = $_user;
                } else {
                    // check if any other package is active for the same user
                    $_userOrdersSql = "SELECT order_master.*
					FROM order_master 
					JOIN user_master customer ON customer.user_master_id = order_master.order_by 
					JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
					JOIN package_master ON package_master.main_package_master_id = order_master.package_id
					WHERE end_date >= '{$_today}' and order_master.is_deleted = 0 and order_status != 'pending' and customer.user_master_id = {$_user['order_by']} 
					group by customer.user_master_id order by order_master.order_master_id desc";

                    $_userOrders = $this->firequery($_userOrdersSql);
                    if (empty($_userOrders)) {
                        $userList[] = $_user;
                    }
                }
            }
        }

        return $userList;
    }
     /**
     * @Route("/customer-service/sendnotificationcustomerserviceusers")
     * @Template()
     */
    public function sendnotificationcustomerserviceusersAction(Request $req) {   
        $notification_sent_to_user_type = $_REQUEST['notification_type_to_send'] ;
        $return_URL = ''; 
        if($notification_sent_to_user_type == 'notsubscribedusers'){
            $userSql = "SELECT customer.user_master_id from order_master 
                    JOIN user_master customer ON customer.user_master_id = order_master.order_by 
                    WHERE order_master.is_deleted = 0 and order_status = 'pending'
                    group by customer.user_master_id order by order_master.order_master_id desc";
            $return_URL = 'admin_customerservice_notpaid'; 
        }
        else if($notification_sent_to_user_type == 'activeusers'){
            $userSql = "SELECT customer.user_master_id from order_master 
                    JOIN user_master customer ON customer.user_master_id = order_master.order_by 
                    WHERE end_date >= CURDATE() and order_master.is_deleted = 0 and order_status != 'pending'
                     group by customer.user_master_id order by order_master.order_master_id desc";
            $return_URL = 'admin_customerservice_activeusers'; 
        }
        else if($notification_sent_to_user_type == 'expiredusers'){
            $userSql = "SELECT customer.user_master_id from order_master 
                    JOIN user_master customer ON customer.user_master_id = order_master.order_by 
                    WHERE end_date < CURDATE() and order_master.is_deleted = 0 and order_status != 'pending' 
                    group by customer.user_master_id order by order_master.order_master_id desc";
            $return_URL = 'admin_customerservice_expiredusers'; 
        }
        else if($notification_sent_to_user_type == 'triedtopurchaseusers'){
            $userSql = "SELECT customer.user_master_id from order_master 
                JOIN user_master customer ON customer.user_master_id = order_master.order_by 
                WHERE order_master.is_deleted = 0 and order_status = 'cancel' 
                group by customer.user_master_id order by order_master.order_master_id desc";
            $return_URL = 'admin_customerservice_triedtopurchaseusers'; 
        }
        else{
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went Wrong');
            return $this->redirectToRoute('admin_dashboard_index');
        }
        $userArr = $this->firequery($userSql);
        $user_array = array();
        if($userArr){
            foreach($userArr as $uval){
                $user_array[] = $uval['user_master_id'];
            }
        }
         $code = '16';    
        $send_to = 'customer'; //$_POST['send_to'];
        $media_id = 'FALSE';      
        $title = $_REQUEST['notification_title'];
        $title_ar =  $_REQUEST['notification_title'];
        $detail =  $_REQUEST['notification_message'];
        $detail_ar = $_REQUEST['notification_message'];       
      
       
        $general_notification = new Generalnotification();
        $general_notification->setNotification_type('general');
        $general_notification->setTitle($title);
        $general_notification->setMessage($detail);       
        $general_notification->setUser_master_id(0);
        $general_notification->setSend_to($send_to);
        if (!empty($this->get('session')->get('domain_id'))) {
            $general_notification->setDomain_id($this->get('session')->get('domain_id'));
        }
        $general_notification->setCreate_date(date("Y-m-d H:i:s"));
        $general_notification->setIs_deleted(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($general_notification);
        $em->flush();
        $notification_id_send = $general_notification->getGeneral_notification_id();
        $domain_id = 1;
        $app_id = 'CUST';        
        $user_apns_id = array();             
        $user_gcm_id = array();      
        $message = json_encode(array("detail" =>$detail, "code" => $code, "response" => $title));
        if (!empty($user_array)) {
            $gcm_regids = $this->find_gcm_regid($user_array);
            if (!empty($gcm_regids)) {
                if (count($gcm_regids) > 0) {
                    $this->send_notification($gcm_regids,$title, $message, 2, $app_id, $domain_id, "general_notification", $notification_id_send);
                }
            }
            $apns_regids = $this->find_apns_regid($user_array);
            if (!empty($apns_regids)) {
                if (count($apns_regids[0]) > 0) {
                    $this->send_notification($apns_regids, $title, $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
                }
            }  
            $this->get('session')->getFlashBag()->set('success_msg', 'Notification sent Successfully');
            return $this->redirectToRoute($return_URL);
        }
        $this->get('session')->getFlashBag()->set('error_msg', 'Something went Wrong');
        return $this->redirectToRoute($return_URL);
    }

    public function getActiveUserCount() {
        $_today = date('Y-m-d');
        $userOrdersSql = "SELECT *
		from order_master 
		JOIN user_master customer ON customer.user_master_id = order_master.order_by 
		JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
		JOIN package_master ON package_master.main_package_master_id = order_master.package_id
		WHERE end_date >= '{$_today}' and order_master.is_deleted = 0 and order_status != 'pending'
		group by customer.user_master_id order by order_master.order_master_id desc";
        $userOrders = $this->firequery($userOrdersSql);

        return count($userOrders);
    }

    /**
     * @Route("/customer-service/not-paid")
     * @Template()
     */
    public function notpaidAction() {
        return array(
            'userList' => $this->getNotSubscribedUserCount()
        );
    }

    /**
     * @Route("/customer-service/active-users")
     * @Template()
     */
    public function activeusersAction() {
        $_today = date('Y-m-d');
        $today = date('Y-m-d 00:00:00');
        // $days_back = date('Y-m-d', strtotime('-15 days'.$_today));

        $start_day_filter = isset($_REQUEST['start_day_filter']) ? $_REQUEST['start_day_filter'] : 0;
        $end_day_filter = isset($_REQUEST['end_day_filter']) ? $_REQUEST['end_day_filter'] : 0;
        if (array_key_exists('clear_filter', $_REQUEST)) {
            $start_day_filter = $end_day_filter = 0;
        }

        $userOrdersSql = "SELECT order_master.*,
		CONCAT ( customer.user_firstname,customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, customer.email ,package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name 
		from order_master 
		JOIN user_master customer ON customer.user_master_id = order_master.order_by 
		JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
		JOIN package_master ON package_master.main_package_master_id = order_master.package_id
		WHERE end_date >= '{$_today}' and order_master.is_deleted = 0 and order_status != 'pending'
		group by customer.user_master_id order by order_master.order_master_id desc ";
        $userOrders = $this->firequery($userOrdersSql);

        // echo '<pre>';
        // print_r($userOrders);
        // exit;

        $orderList = [];
        if (!empty($userOrders)) {
            foreach ($userOrders as $_order) {

                $order_start_date = strtotime($_order['start_date']);
                $order_end_date = strtotime($_order['end_date']);
                $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                $total_off_days = 0;
                $suspesion_days = 0;
                $diff_from_start_to_today = (strtotime($today) - $order_start_date) / 60 / 60 / 24;
                if ($diff_from_start_to_today < 0) {
                    $diff_from_start_to_today = 0;
                }
                

                $ordermealDriver = "SELECT * FROM `order_meal_relation` where order_master_id = " . $_order['order_master_id'] . " and is_deleted = 0 and assign_driver_id != 0";
                $odermealDriverList = $this->fireQuery($ordermealDriver);
                if ($odermealDriverList) {
                    $driver_id = $odermealDriverList[0]['assign_driver_id'];
                }

                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
                    JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
                    where order_off_days_relation.is_deleted = 0 and order_id = " . $_order['order_master_id'] . " group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysArray = [];
                $freezeDays = [];

                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $_order['order_master_id'],
                            "is_deleted" => 0
                        )
                );
                if ($checkFreeze) {
                    $freezeOnce = true;
                    foreach ($checkFreeze as $_checkFreeze) {
                        $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getStart_date())));
                        $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getEnd_date())));

                        while ($supend_start_date <= $supend_end_date) {

                            $freezeDays[] = $supend_start_date;
                            $suspesion_days += 1;
                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
                    }
                }

                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray[] = $_offDays['main_days_master_id'];
                    }
                }

//                while ($order_start_date <= $order_end_date) {
//
//                    if ((in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5) && !in_array($order_start_date, $freezeDays)) {
//                        if ($order_start_date >= strtotime($today)) {
//                            $total_off_days += 1;
//                        }
//                    }
//
//                    $order_start_date = strtotime("+1 day", $order_start_date);
//                }
                $offDaysDates = [];
                $day_passed = 0;
                $totalDaysDateArray = [];
                $passed_days_dateArray = [];
                $today2 = strtotime(date('Y-m-d'));
                while ($order_start_date <= $order_end_date) {
                    $totalDaysDateArray[] = date('Y-m-d', $order_start_date);
                    if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                        if ($order_start_date >= $today2) {
                            $total_off_days += 1;
                        }
                        $offDaysDates [] = date('Y-m-d', $order_start_date);
                    }

                    if ($order_start_date <= $today2) {
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
                }
               
                //$remaining_days = floor($totalDays - $total_off_days - $suspesion_days - $diff_from_start_to_today);
                 $remaining_days = count($totalDaysDateArray);
                if ($order_end_date < strtotime($today)) {
                    $remaining_days = 0;
                }

                $_order['customer_name'] = urldecode($_order['customer_name']);
                $_order['remaining_days'] = $remaining_days;
                $_order['passed_days'] = count($passed_days_dateArray);

                $isInsert = true;
                if ($start_day_filter != 0) {
                    //if ($start_day_filter >= $diff_from_start_to_today) {
                    if ($start_day_filter == count($passed_days_dateArray)) {
                        $isInsert = true;
                    }else{
                        $isInsert = false;
                    }
                }
                if ($end_day_filter != 0) {
                    if ($end_day_filter != $remaining_days) {
                        $isInsert = false;
                    }
                }

                if ($isInsert) {
                    $orderList[] = $_order;
                }
            }
        }

        return array(
            'orderList' => $orderList,
            'start_day_filter' => $start_day_filter,
            'end_day_filter' => $end_day_filter
        );
    }

    /**
     * @Route("/customer-service/expired-users")
     * @Template()
     */
    public function expiredusersAction() {
        $userList = $this->getExpiredUsers();

        return array(
            'userList' => $userList,
            'active_user_count' => $this->getActiveUserCount(),
            'expired_user_count' => count($userList)
        );
    }

    public function getExpiredUsers() {
        $_today = date('Y-m-d');

        $userOrdersSql = "SELECT order_master.*,
		CONCAT ( customer.user_firstname,' ',customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no, customer.unique_user_id, customer.email, package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name 
		from order_master 
		JOIN user_master customer ON customer.user_master_id = order_master.order_by 
		JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
		JOIN package_master ON package_master.main_package_master_id = order_master.package_id
		WHERE end_date < '{$_today}' and order_master.is_deleted = 0 and order_status != 'pending'
		group by customer.user_master_id order by order_master.order_master_id desc";
        $userOrders = $this->firequery($userOrdersSql);

        $userList = [];
        if (!empty($userOrders)) {
            foreach ($userOrders as $_order) {
                // check is user have subscribed any other package

                $_userOrdersSql = "SELECT order_master.*,
				CONCAT ( customer.user_firstname,customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name 
				from order_master 
				JOIN user_master customer ON customer.user_master_id = order_master.order_by 
				JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
				JOIN package_master ON package_master.main_package_master_id = order_master.package_id
				WHERE end_date >= '{$_today}' and order_master.is_deleted = 0 and order_status != 'pending' and customer.user_master_id = {$_order['order_by']} 
				group by customer.user_master_id order by order_master.order_master_id desc";
                $_userOrders = $this->firequery($_userOrdersSql);

                if (empty($_userOrders)) {
                    $userList[] = $_order;
                }
            }
        }

        return $userList;
    }
    /**
     * @Route("/customer-service/triedtopurchase-users")
     * @Template()
     */
    public function triedtopurchaseusersAction() {
        $userList = $this->gettriedtopurchaseUsers();
        
        return array(
            'userList' => $userList,
            'active_user_count' => $this->getActiveUserCount(),
            'expired_user_count' => $this->expiredusercountAction(),
            'triedtopurchase_user_count' => count($userList)
        );
    }

    public function gettriedtopurchaseUsers() {
        $_today = date('Y-m-d');

        $userOrdersSql = "SELECT order_master.*,
		CONCAT ( customer.user_firstname,' ',customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no, customer.unique_user_id, customer.email, package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name 
		from order_master 
		JOIN user_master customer ON customer.user_master_id = order_master.order_by 
		JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
		JOIN package_master ON package_master.main_package_master_id = order_master.package_id
		WHERE order_master.is_deleted = 0 and (order_status = 'cancel' or order_status = 'pending' )
		group by customer.user_master_id order by order_master.order_master_id desc";
        $userOrders = $this->firequery($userOrdersSql);

        $userList = [];
        if (!empty($userOrders)) {
            foreach ($userOrders as $_order) {
                // check is user have subscribed any other package

                $_userOrdersSql = "SELECT order_master.*,
				CONCAT ( customer.user_firstname,customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name 
				from order_master 
				JOIN user_master customer ON customer.user_master_id = order_master.order_by 
				JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
				JOIN package_master ON package_master.main_package_master_id = order_master.package_id
				WHERE  order_master.is_deleted = 0 and order_status != 'cancel' and order_status != 'pending' and customer.user_master_id = {$_order['order_by']} 
				group by customer.user_master_id order by order_master.order_master_id desc";
                $_userOrders = $this->firequery($_userOrdersSql);

               
                if (empty($_userOrders)) {
                    $userList[] = $_order;
                }
            }
            
        }
 
      
        return $userList;
    }

    /**
     * @Route("/active-user-count")
     * @Template()
     */
    public function activeusercountAction() {
        $_today = date('Y-m-d');

        $userOrdersSql = "SELECT *
		from order_master 
		JOIN user_master customer ON customer.user_master_id = order_master.order_by 
		JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
		JOIN package_master ON package_master.main_package_master_id = order_master.package_id
		WHERE end_date >= '{$_today}' and order_master.is_deleted = 0 and order_status != 'pending'
		group by customer.user_master_id order by order_master.order_master_id desc";
        $userOrders = $this->firequery($userOrdersSql);

        return new Response(count($userOrders));
    }

    /**
     * @Route("/expired-user-count")
     * @Template()
     */
    public function expiredusercountAction() {
        return new Response(count($this->getExpiredUsers()));
    }
    /**
     * @Route("/triedtopurchasecount")
     * @Template()
     */
    public function triedtopurchasecountAction() {
        return new Response(count($this->gettriedtopurchaseUsers()));
    }

    /**
     * @Route("/notsubscribed-user-count")
     * @Template()
     */
    public function notsubscribedusercountAction() {
        return new Response(count($this->getNotSubscribedUserCount()));
    }

}
