<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;

class SendnotificationController extends BaseController
{	
    /**
     * @Route("/send-reminder")
     * @Template()
     */
    public function indexAction()
    {
		$today = date('Y-m-d');
		$todayPlus2 = date('Y-m-d', strtotime("+2 days {$today}"));
		$todayPlus2Timestamp = strtotime($todayPlus2);
		$todayPlus3 = date('Y-m-d', strtotime("+3 days {$today}"));
		$todayPlus3Timestamp = strtotime($todayPlus3);

		/* $_sql = "SELECT * from order_master o, order_meal_relation omr where o.order_master_id = omr.order_master_id and o.is_deleted = 0 and omr.is_deleted = 0"; */
		$_sql = "SELECT * from order_master o,user_master u where o.created_by = u.user_master_id and o.is_deleted = 0 and u.is_deleted = 0 and end_date >= '{$today}' order by order_master_id desc";
		$orders = $this->firequery($_sql);

		$userList = array();
		$tempArr = null;
		$missedday = '';
		if(!empty($orders)){
			foreach($orders as $_order){
				$start_date = $_order['start_date'];
				$end_date = $_order['end_date'];

				$date1 = date_create($start_date);
				$date2 = date_create($end_date);
				$diff = date_diff($date2, $date1);
				$day_diff = $diff->format('%a');

				for($i=1;$i<=$day_diff;$i++){
					$inc_date = date('Y-m-d', strtotime("+{$i} days {$start_date}"));
					$inc_date_timestamp = strtotime($inc_date);
					if($inc_date_timestamp > $todayPlus2Timestamp && $inc_date_timestamp <= $todayPlus3Timestamp){
						$sql = "SELECT * from order_meal_relation where order_master_id = {$_order['order_master_id']} and is_deleted = 0 and requested_datetime = '{$inc_date}'";
						$current_meal = $this->firequery($sql);
						if(empty($current_meal)){
							$userList[] = $_order['created_by'];
							/* $tempArr[] = array(
								'order_master_id' => $_order['order_master_id'],
								'start_date' => $_order['start_date'],
								'end_date' => $_order['end_date'],
								'inc_date' => $inc_date
							); */
							$missedday = $inc_date;
						}
					}
				}
			}
		}

		if(!empty($userList)){
			$userList = implode(',', $userList);
			$gcm_regids = $this->find_gcm_regid($userList);

			/* $day = date('d', strtotime($missedday)).'th '.date('M', strtotime($missedday)); */
			$title = "Add your meal for {$missedday}";

			$code = 5;
			$_message = array(
				"detail" => $title,
				"code" => $code,
				"response" => $title
			);
			$app_id = 'CUST';
			$domain_id = 1;
			$notification_id_send = 5;
			$message = json_encode($_message);

			if (!empty($gcm_regids)) {
				if (count($gcm_regids) > 0) {
					$this->send_notification($gcm_regids, $title, $message, 2, $app_id, $domain_id, "general_notification", $notification_id_send);
				}
			}

			$apns_regids = $this->find_apns_regid($userList);
			if (!empty($apns_regids)) {
				if (count($apns_regids[0]) > 0) {
					$this->send_notification($apns_regids, $title, $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
				}
			}
		}

		echo json_encode($userList);exit;
    }	
}