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
use AdminBundle\Entity\Usergoalmaster;

class DriverOrdersController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();
    }

    /**
     * @Route("/driverOrders/{driver_id}/{date_given}",defaults={"driver_id"="0","date_given"="0"})
     * @Template()
     */
    public function indexAction($driver_id, $date_given) {
        //echo"<pre>";print_r($_REQUEST);exit;
        // ini_set('display_errors', 'On');
        // error_reporting(E_ALL);
        ini_set('memory_limit', '-1');
        ini_set('memory_execution_time', '-1');

        if (isset($_REQUEST['print_delivery_sticker']) && $_REQUEST['print_delivery_sticker'] == 'print_delivery_sticker') {
            #redirect to the delivery print page

            return $this->redirect($this->generateUrl(
                                    'admin_driverorders_printdeliverysticker', array(
                                'order_id' => 0,
                                'driver_id' => !empty($_REQUEST['driver_given']) ? $_REQUEST['driver_given'] : 0,
                                'date_given' => strtotime($_REQUEST['date_given']),
                                'time_id_given' => !empty($_REQUEST['time_id_given']) ? $_REQUEST['time_id_given'] : 0,
                                'area_id_given' => !empty($_REQUEST['area_id_given']) ? $_REQUEST['area_id_given'] : 0,
                                    )
            ));
        }

        if (isset($_REQUEST['print_driver_sticker']) && $_REQUEST['print_driver_sticker'] == 'print_driver_sticker') {
            #redirect to the delivery print page

            return $this->redirect($this->generateUrl(
                                    'admin_driverorders_printdriversticker', array(
                                'order_id' => 0,
                                'driver_id' => !empty($_REQUEST['driver_given']) ? $_REQUEST['driver_given'] : 0,
                                'date_given' => strtotime($_REQUEST['date_given']),
                                'time_id_given' => !empty($_REQUEST['time_id_given']) ? $_REQUEST['time_id_given'] : 0,
                                'area_id_given' => !empty($_REQUEST['area_id_given']) ? $_REQUEST['area_id_given'] : 0,
                                    )
            ));
        }

        $area_id_given = 0;
        $time_id_given = 0;

        $req = Request::createFromGlobals();

        if (empty($date_given)) {
            if (!empty($req->request->get('date_given'))) {
                $date_given = date('Y-m-d', strtotime($req->request->get('date_given')));
            } else {
                $date_given = date('Y-m-d');
            }
        } else {
            //        $date_given = date('Y-m-d',$date_given);
            $date_given = date('Y-m-d');
        }

        $search_value = '';
        if (array_key_exists('search', $_REQUEST)) {
            $search_value = $_REQUEST['search']['value'];
        }

        $driver_given_id = 0;
        if (!empty($req->request->get('driver_given'))) {
            $driver_given_id = $driver_id = $req->request->get('driver_given');
        }

        if ($this->get('session')->get('role_id') == 2) {
            #driver
            $driver_given_id = $driver_id = $this->get('session')->get('user_id');
        }

        $time_id_where = '';
        if (!empty($req->request->get('time_id_given'))) {
            $time_id_given = $req->request->get('time_id_given');
            $time_id_where = " AND order_master.delivery_time_id = '$time_id_given' ";
        }

        $area_id_where = '';

        if (!empty($req->request->get('area_id_given'))) {
            $area_id_given = $req->request->get('area_id_given');
            $area_id_where = " AND address_master.area_id = '$area_id_given' ";
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $today = date('Y-m-d 00:00:00');

        $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
            "user_master_id" => $driver_id
        ]);


        if (!empty($driver_id)) {
            if (!empty($date_given)) {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id' and requested_datetime = '$date_given'  ";
            } else {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id' ";
            }
        } else {
            if (!empty($date_given)) {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and requested_datetime = '$date_given'  ";
            } else {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 ";
            }
        }


        //      echo $driverOrders;exit;

        $driverOrdersData = [];
        $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,order_master.order_by,
        time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
        CONCAT ( customer.user_firstname,' ',customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id 
        from order_master 
        JOIN user_master customer ON customer.user_master_id = order_master.order_by 
        LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
        LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
        JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
        LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
        where order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and order_status != 'pending' $area_id_where $time_id_where
        group by order_master.order_master_id order by area_master.main_area_id DESC limit 1"; //order_master.order_master_id DESC";
        
        // $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,order_master.order_by,
        // time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
        // CONCAT ( customer.user_firstname,' ',customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id 
        // from order_master 
        // JOIN user_master customer ON customer.user_master_id = order_master.order_by 
        // LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
        // LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
        // JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
        // LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
        // where order_master.is_deleted = 0 and order_status != 'pending' $area_id_where $time_id_where
        // group by order_master.order_master_id order by area_master.main_area_id DESC limit 1"; //order_master.order_master_id DESC";

	    
        
        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $driverOrdersData = $stmt->fetchAll();

        /* $orderMeals = "select order_meal_relation_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id' ";

          $driver_sql_clause = '';
          if (!empty($driver_id)) {
          $driver_sql_clause = " and order_meal_relation.assign_driver_id = '$driver_id' ";
          }


          if (!empty($driverOrdersData)) {
          foreach ($driverOrdersData as &$_driverOrder) {
          $order_start_date = strtotime($_driverOrder['start_date']);
          $order_end_date = strtotime($_driverOrder['end_date']);
          $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
          $total_off_days = 0;
          $suspesion_days = 0;
          $diff_from_start_to_today = (strtotime($today) - $order_start_date) / 60 / 60 / 24;
          if ($diff_from_start_to_today < 0) {
          $diff_from_start_to_today = 0;
          }
          $driver_id = 0;

          $ordermealDriver = "SELECT * FROM `order_meal_relation` where order_master_id = " . $_driverOrder['order_master_id'] . " and is_deleted = 0 and assign_driver_id != 0";
          $odermealDriverList = $this->fireQuery($ordermealDriver);

          $status = '';
          $meal_day = '';
          $requested_datetime = '';
          $order_meal_relation_id = 0;
          if ($odermealDriverList) {
          $driver_id = $odermealDriverList[0]['assign_driver_id'];
          }

          $ordermealDriverSql = "SELECT * FROM `order_meal_relation` where order_master_id = " . $_driverOrder['order_master_id'] . " and is_deleted = 0 and requested_datetime = '$date_given' {$driver_sql_clause}";
          $order_meal_relation_data = $this->fireQuery($ordermealDriverSql);
          if($order_meal_relation_data){
          $order_meal_relation_id = $order_meal_relation_data[0]['order_meal_relation_id'];
          $meal_day = $order_meal_relation_data[0]['meal_day'];
          $status = $order_meal_relation_data[0]['status'];
          $requested_datetime = $order_meal_relation_data[0]['requested_datetime'];
          }


          $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
          JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
          where order_off_days_relation.is_deleted = 0 and order_id = " . $_driverOrder['order_master_id'] . " group by days_master.main_days_master_id";

          $offDays = $this->fireQuery($sql);
          $offDaysArray = [];
          $freezeDays = [];

          $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
          array(
          "order_id" =>  $_driverOrder['order_master_id'],
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

          while ($order_start_date <= $order_end_date) {

          if ((in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5) && !in_array($order_start_date, $freezeDays)) {
          if ($order_start_date >= strtotime($today)) {
          $total_off_days += 1;
          }
          }

          $order_start_date = strtotime("+1 day", $order_start_date);
          }

          $remaining_days = $totalDays - $total_off_days - $suspesion_days - $diff_from_start_to_today;

          if ($order_end_date < strtotime($today)) {
          $remaining_days = 0;
          }

          $_driverOrder['remaining_days_to_end_order'] = $remaining_days;

          $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
          "user_master_id" => $driver_id
          ]);
          $driver_name = '';

          if (!empty($driverDetails)) {
          $driver_name = $driverDetails->getUser_firstname() . " " . $driverDetails->getUser_lastname();
          }
          $_driverOrder['driver_name'] = $driver_name;

          // order meals
          $meal_of_orders = null;
          if($order_meal_relation_id != 0){
          $order_id = $_driverOrder['order_master_id'];
          if (!empty($date_given)) {
          $meal_product_sql = "SELECT product_category_master_id, product_category_name, count_in, product_name, raw_eggs, white_eggs, carbs_amount, proteins_amount from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          where meal_product_relation.meal_id = {$order_meal_relation_id} and meal_product_relation.is_deleted = 0
          group by meal_product_relation_id DESC";
          } else {
          $meal_product_sql = "SELECT product_category_master_id, product_category_name, count_in, product_name, raw_eggs, white_eggs, carbs_amount, proteins_amount from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          where meal_product_relation.meal_id = {$order_meal_relation_id} and meal_product_relation.is_deleted = 0
          group by meal_product_relation_id DESC ";
          }

          $mealProducts = null;
          $mealProducts = $this->firequery($meal_product_sql);

          if (!empty($mealProducts)) {
          foreach ($mealProducts as $_mealProducts) {
          $meal_of_orders[] = array(
          'product_category_master_id' => $_mealProducts['product_category_master_id'],
          'product_category_name' => $_mealProducts['product_category_name'],
          'count_in' => $_mealProducts['count_in'],
          'meal_day' => $meal_day,
          'requested_datetime' => $requested_datetime,
          'status' => $status,
          'product_name' => $_mealProducts['product_name'],
          'raw_eggs' => $_mealProducts['raw_eggs'],
          'white_eggs' => $_mealProducts['white_eggs'],
          'carbs_amount' => $_mealProducts['carbs_amount'],
          'proteins_amount' => $_mealProducts['proteins_amount'],
          );
          }
          }
          }

          $packageDetails = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(
          [
          "main_package_master_id" => $_driverOrder['package_id']
          ]
          );

          $user_unique_number = $_driverOrder['order_by'];
          $user_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($user_unique_number);
          if ($user_info) {

          if ($user_info->getUnique_user_id() != "" && $user_info->getUnique_user_id() != 0) {
          $user_unique_number = $user_info->getUnique_user_id();
          }
          }

          $_driverOrder['meal_of_orders'] = $meal_of_orders;
          $_driverOrder['assign_driver_id'] = $driver_id;
          $_driverOrder['package_details'] = $packageDetails;
          $_driverOrder['user_unique_no'] = $user_unique_number;

          }
          } */

        $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 ";
        $drivers = $this->fireQuery($sql_get_drivers);

        $sql_get_time_slots = "select * from time_slot_master where is_deleted = 0 group by main_time_slot_master_id";
        $timeSlots = $this->fireQuery($sql_get_time_slots);

        $sql_get_delivery_method = "select * from delivery_method_master where is_deleted = 0 group by main_delivery_method_master_id";
        $delivery_methods = $this->fireQuery($sql_get_delivery_method);

        $sql = "select * from area_master where is_deleted = 0 group by main_area_id";
        $area_list = $this->firequery($sql);

        $sql_product_category = "select * from product_category_master where is_deleted = 0 group by main_product_category_master_id";

        $productCategory = $this->fireQuery($sql_product_category);


        return array('driver_orders_data' => $driverOrdersData, 'driverDetails' => $driverDetails, 'date_given' => $date_given, 'drivers' => $drivers, 'delivery_methods' => $delivery_methods, 'timeSlots' => $timeSlots, 'area_list' => $area_list, 'area_id_given' => $area_id_given, 'driver_id' => $driver_given_id, 'time_id_given' => $time_id_given, 'productCategory' => $productCategory);
    }

    /**
     * @Route("/getOrderMealData/{order_id}/{date_given}", defaults={"order_id"="0", "date_given":""})
     * @Template()
     */
    public function getOrderMealDataAction($order_id, $date_given) {
        $html = '';
        if ($order_id != 0) {
            $driver_sql_clause = '';
            $order_meal_relation_id = 0;
            $ordermealDriverSql = "SELECT * FROM `order_meal_relation` where order_master_id = {$order_id} and is_deleted = 0 and requested_datetime = '$date_given' {$driver_sql_clause}";
            $requested_datetime = '';
            $order_meal_relation_data = $this->fireQuery($ordermealDriverSql);
            if ($order_meal_relation_data) {
                $order_meal_relation_id = $order_meal_relation_data[0]['order_meal_relation_id'];
                $requested_datetime = $order_meal_relation_data[0]['requested_datetime'];
            }

            $meal_product_sql = "SELECT product_category_master_id, product_category_name, count_in, product_name, raw_eggs, white_eggs, carbs_amount, proteins_amount from meal_product_relation JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id JOIN product_category_master ON product_category_master.main_product_category_master_id = meal_product_relation.meal_type  where meal_product_relation.meal_id = {$order_meal_relation_id} and meal_product_relation.is_deleted = 0 group by meal_product_relation_id DESC ";
            $mealProducts = null;
            $mealProducts = $this->firequery($meal_product_sql);

            if (!empty($mealProducts)) {
                foreach ($mealProducts as $_mealProducts) {

                    $html .= "<li class='list-group-item'>{$_mealProducts['product_name']}";
                    $html .= "<label class='label label-primary'>" . date('d-m-Y', strtotime($requested_datetime)) . "</label></br>";
                    $html .= "{$_mealProducts['raw_eggs']} Raw Eggs, {$_mealProducts['white_eggs']} White Eggs, {$_mealProducts['carbs_amount']} Carbs, {$_mealProducts['proteins_amount']} Protiens";
                    $html .= "<span class='badge'>" . ucfirst($_mealProducts['count_in']) . "</span>";
                    $html .= "</li>";
                }
            }
        }

        if ($html == '') {
            $html = 'No Record Found';
        }

        echo $html;
        exit;
    }

    /**
     * @Route("/getDriverOrders/{driver_id}/{date_given}/{time_slot_id}/{area_id}",defaults={"driver_id"="0","date_given"="","time_slot_id"="","area_id"=""})
     * @Template()
     */
    public function getDriverOrdersAction($driver_id, $date_given , $time_slot_id , $area_id ) {
		
        $session = $this->get('session');
        ini_set('memory_limit', '-1');
        ini_set('memory_execution_time', '-1');
		$driver_given_id = $driver_id; 
	//getDriverOrders/0/2021-10-16/0/0
        // if (isset($_REQUEST['print_delivery_sticker']) && $_REQUEST['print_delivery_sticker'] == 'print_delivery_sticker') {
        //     #redirect to the delivery print page

        //     return $this->redirect($this->generateUrl(
        //                             'admin_driverorders_printdeliverysticker1', array(
        //                         'order_id' => 0,
        //                         'driver_id' => !empty($_REQUEST['driver_given']) ? $_REQUEST['driver_given'] : 0,
        //                         'date_given' => strtotime($_REQUEST['date_given']),
        //                         'time_id_given' => !empty($_REQUEST['time_id_given']) ? $_REQUEST['time_id_given'] : 0,
        //                         'area_id_given' => !empty($_REQUEST['area_id_given']) ? $_REQUEST['area_id_given'] : 0,
        //                             )
        //     ));
        // }

        if (isset($_REQUEST['print_driver_sticker']) && $_REQUEST['print_driver_sticker'] == 'print_driver_sticker') {
            #redirect to the delivery print page


            return $this->redirect($this->generateUrl(
                                    'admin_driverorders_printDriverSticker', array(
                                'order_id' => 0,
                                'driver_id' => !empty($_REQUEST['driver_given']) ? $_REQUEST['driver_given'] : 0,
                                'date_given' => strtotime($_REQUEST['date_given']),
                                'time_id_given' => !empty($_REQUEST['time_id_given']) ? $_REQUEST['time_id_given'] : 0,
                                'area_id_given' => !empty($_REQUEST['area_id_given']) ? $_REQUEST['area_id_given'] : 0,
                                    )
            ));
        }

        $search_value = '';
        if (array_key_exists('search', $_REQUEST)) {
            $search_value = $_REQUEST['search']['value'];
        }

        $_orderBy = 'ORDER BY area_master.main_area_id ';
        if (array_key_exists('order', $_REQUEST)) {
            $column = $_REQUEST['order'][0]['column'];
            $dir = $_REQUEST['order'][0]['dir'];
            if ($column == 1) {
                $_orderBy = " ORDER BY order_master.unique_no {$dir}";
            } else if ($column == 2) {
                $_orderBy = " ORDER BY customer.user_firstname {$dir}";
            } else if ($column == 3) {
                $_orderBy = " ORDER BY customer.unique_user_id {$dir}";
            } else if ($column == 4) {
                $_orderBy = " ORDER BY p.package_name {$dir}";
            } else if ($column == 5) {
                $_orderBy = " ORDER BY order_master.start_date {$dir}";
            } else if ($column == 6) {
                $_orderBy = " ORDER BY delivery_method_name {$dir}";
            } else if ($column == 8) {
                $_orderBy = " ORDER BY area_name {$dir}";
            }
        }
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
        $limit_sql = "LIMIT " . $_REQUEST['start'] . "," . $_REQUEST['length'];

        $area_id_given = 0;
        $time_id_given = 0;

        $req = Request::createFromGlobals();

        if (empty($date_given)) {
            // if (!empty($req->request->get('date_given'))) {
            //     $date_given = date('Y-m-d', strtotime($req->request->get('date_given')));
            // } else {
            //     $date_given = date('Y-m-d');
            // }
            $date_given = date('Y-m-d');
        }

        //$driver_given_id = 0;
        if (!empty($req->request->get('driver_given'))) {
            $driver_given_id = $driver_id = $req->request->get('driver_given');
        }

        if ($this->get('session')->get('role_id') == 2) {
            #driver
            $driver_given_id = $driver_id = $this->get('session')->get('user_id');
        }

        $time_id_where = '';
        if (!empty($_REQUEST['time_id_given']) || $time_slot_id != '' ) {
           
			$time_id_given = (isset($_REQUEST['time_id_given'] )) ? $_REQUEST['time_id_given'] : 0 ;
			if($time_id_given == ''){
				$time_id_given = $time_slot_id ;
			}
			if($time_id_given != '' && $time_id_given != 0){
				$time_id_where = " AND order_master.delivery_time_id = '$time_id_given' ";
			}
        }

        $area_id_where = '';
        if (( !empty($req->request->get('area_id_given')) ) || $area_id != '' )  {

            $area_id_given = $req->request->get('area_id_given');
			if($area_id_given == ''){
				$area_id_given = $area_id ; 
			}
			if($area_id_given != '' && $area_id_given != 0){
				$area_id_where = " AND address_master.area_id = '$area_id_given' ";
			}
        }
		
		
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $today = date('Y-m-d 00:00:00');

        $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
            "user_master_id" => $driver_id
        ]);

		
        if (!empty($driver_id)) {
            if (!empty($date_given)) {
                /*$driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id' and requested_datetime = '$date_given' and order_master_id NOT IN (SELECT order_id FROM `pause_package` where is_deleted = 0 and pause_start_date<= '{$date_given}' and pause_end_date_by_update >= '{$date_given}')  ";*/
          $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id'   and requested_datetime = '$date_given' and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' )))  ";
            } else {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id'  and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
            }
        } else {
            if (!empty($date_given)) {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and requested_datetime = '{$date_given}'  and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
            } else {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0  and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
            }
        }

        if ($search_value != '') {
            $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,order_master.order_by,p.package_name,
      time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
      CONCAT(customer.user_firstname,' ',customer.user_lastname) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, order_master.delivery_address_id 
      from order_master 
      JOIN user_master customer ON customer.user_master_id = order_master.order_by 
      LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
      LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
      JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
      LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
            LEFT JOIN package_master p on p.main_package_master_id = order_master.package_id
      where 
      order_master.pause_status = 'no' and 
      order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and order_status != 'pending' and (order_master.unique_no like '%{$search_value}%' or customer.unique_user_id like '%{$search_value}%' or customer.user_firstname like '%{$search_value}%' or customer.user_lastname like '%{$search_value}%' or customer.user_mobile like '%{$search_value}%' or CONCAT ( customer.user_firstname,customer.user_lastname ) like '{$search_value}' or area_master.area_name like '{$search_value}' or p.package_name like '%{$search_value}%') and ( time_slot_master.language_id = 1 or time_slot_master.language_id IS NULL )  $area_id_where $time_id_where
            group by order_master.order_master_id order by area_master.main_area_id DESC"; //order_master.order_master_id DESC";
        } else {
            $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,order_master.order_by,p.package_name,
      time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
      CONCAT(customer.user_firstname, ' ',customer.user_lastname) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, order_master.delivery_address_id 
      from order_master 
      JOIN user_master customer ON customer.user_master_id = order_master.order_by 
      LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
      LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
      JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
      LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
            LEFT JOIN package_master p on p.main_package_master_id = order_master.package_id
      where  order_master.pause_status = 'no' and  order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and order_status != 'pending' and ( time_slot_master.language_id = 1 or time_slot_master.language_id IS NULL )  $area_id_where $time_id_where
            group by order_master.order_master_id order by area_master.main_area_id DESC"; //order_master.order_master_id DESC";
        }

        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $totalDriverOrdersData = $stmt->fetchAll();

        if ($search_value != '') {
                $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,order_master.order_by,p.package_name, time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
          CONCAT(customer.user_firstname, ' ',customer.user_lastname) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, order_master.delivery_address_id 
          from order_master 
          JOIN user_master customer ON customer.user_master_id = order_master.order_by 
          LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
          LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
          JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
          LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
                LEFT JOIN package_master p on p.main_package_master_id = order_master.package_id
          where order_master.pause_status = 'no' and  order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and order_status != 'pending' and (order_master.unique_no like '%{$search_value}%' or customer.unique_user_id like '%{$search_value}%' or customer.user_firstname like '%{$search_value}%' or customer.user_lastname like '%{$search_value}%' or customer.user_mobile like '%{$search_value}%' or CONCAT ( customer.user_firstname,customer.user_lastname ) like '{$search_value}' or area_master.area_name like '{$search_value}' or p.package_name like '%{$search_value}%') and ( time_slot_master.language_id = 1 or time_slot_master.language_id IS NULL )   and (delivery_method_master.language_id = 1 or delivery_method_master.language_id is NULL)  $area_id_where $time_id_where
                group by order_master.order_master_id {$_orderBy} DESC {$limit_sql}"; //order_master.order_master_id DESC";
        }
         else {
            $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,order_master.order_by,p.package_name,delivery_address_id,
            time_slot_master.title, area_master.area_name, time_slot_master.start_time,time_slot_master.end_time, delivery_method_master.name as delivery_method_name ,
            CONCAT(customer.user_firstname,'  ',customer.user_lastname) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id, order_master.delivery_address_id 
            from order_master 
            JOIN user_master customer ON customer.user_master_id = order_master.order_by 
            LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
            LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
            JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
            LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
            LEFT JOIN package_master p on p.main_package_master_id = order_master.package_id
            where order_master.pause_status = 'no' and  order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and order_status != 'pending' and ( time_slot_master.language_id = 1 or time_slot_master.language_id IS NULL ) and (delivery_method_master.language_id = 1 or delivery_method_master.language_id is NULL)  $area_id_where $time_id_where
            group by order_master.order_master_id {$_orderBy} {$limit_sql}"; //order_master.order_master_id DESC";
        }

		
		//echo $getDriverOrders ; exit;
        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $driverOrdersData = $stmt->fetchAll();

        $driverOrderList = [];
        $i = 1;
        if (!empty($driverOrdersData)) {
            foreach ($driverOrdersData as $_driverOrder) {

                $order_start_date = strtotime($_driverOrder['start_date']);
                $order_end_date = strtotime($_driverOrder['end_date']);
                $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                $total_off_days = 0;
                $suspesion_days = 0;
                $diff_from_start_to_today = (strtotime($today) - $order_start_date) / 60 / 60 / 24;
                if ($diff_from_start_to_today < 0) {
                    $diff_from_start_to_today = 0;
                }

                $all_ok_flag = true ;
                // $checkPauseQuery = "SELECT * FROM `pause_package` where order_id = ". $_driverOrder['order_master_id'] ." and is_deleted = 0 and pause_start_date<= '{$date_given}' and pause_end_date_by_update >= '{$date_given}'";
                // $checkPauseList = $this->firequery($checkPauseQuery);
                // if($checkPauseList){
                //   $all_ok_flag = false ;
                // }


                if($all_ok_flag == true ){
                  $driver_id = 0;

                  $ordermealDriver = "SELECT * FROM `order_meal_relation` where order_master_id = " . $_driverOrder['order_master_id'] . " and is_deleted = 0 and assign_driver_id != 0";
                  $odermealDriverList = $this->fireQuery($ordermealDriver);
                  if ($odermealDriverList) {
                      $driver_id = $odermealDriverList[0]['assign_driver_id'];
                  }

                  $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
                      JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
                      where order_off_days_relation.is_deleted = 0 and order_id = " . $_driverOrder['order_master_id'] . " group by days_master.main_days_master_id";

                  $offDays = $this->fireQuery($sql);
                  $offDaysArray = [];
                  $freezeDays = [];

                  $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                          array(
                              "order_id" => $_driverOrder['order_master_id'],
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

                  while ($order_start_date <= $order_end_date) {

                      if ((in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5) && !in_array($order_start_date, $freezeDays)) {
                          if ($order_start_date >= strtotime($today)) {
                              $total_off_days += 1;
                          }
                      }

                      $order_start_date = strtotime("+1 day", $order_start_date);
                  }

                  $remaining_days = $totalDays - $total_off_days - $suspesion_days - $diff_from_start_to_today;
                  if ($order_end_date < strtotime($today)) {
                      $remaining_days = 0;
                  }

                  $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
                      "user_master_id" => $driver_id
                  ]);

                  $driver_name = '';
                  if (!empty($driverDetails)) {
                      $driver_name =  $driverDetails->getUser_firstname() . " " . $driverDetails->getUser_lastname();
                  }

                  $package_name = $_driverOrder['package_name'];
                 

                  $_driverOrderArr = [];
                  // address
                  //$_sql = "SELECT a.*, area.area_name from address_master a, area_master area where a.area_id = area.main_area_id and main_address_id = {$_driverOrder['delivery_address_id']}";
				   $_sql = "SELECT a.*, area.area_name , city.city_name from address_master a, area_master area , city_master city where a.area_id = area.main_area_id and area.city_id = city.main_city_master_id  and main_address_id = {$_driverOrder['delivery_address_id']} and area.language_id = 1  group by address_master_id";
                  $address_data = $this->firequery($_sql);

                  $_addressText = '';
				  $_Governorate = $_Area = $_Block = '';
                  if (!empty($address_data)) {
                      $address_data = $address_data[0];
					  $_Area = $address_data['area_name'] ; 
					  $_Governorate  = $address_data['city_name'] ;
					  $_Block  = $address_data['address_name'] ;
                      $_addressText = $address_data['area_name'] . "<br><b> B:</b>{$address_data['address_name']}<br><b> S:</b>{$address_data['street']} " . ucfirst($address_data['address_type']);
                      $address_name2 = trim($address_data['address_name2']);
                      if ($address_name2 != '') {
                          // $_addressText .= $address_data['address_name2'];
                          $_addressText .= "<br><b> A:</b>{$address_name2}";
                      }
                      $_addressText .= "<br><b> H:</b>{$address_data['flate_house_number']}";
                      if ($address_data['society_building_name'] != '') {
                          $_addressText .= "<br><b> D:</b>{$address_data['society_building_name']}";
                      }
                      $_addressText .= "<br><b> C:</b>{$_driverOrder['mobile_no']}";
                  }

                  $write_str = "getmealdata({$_driverOrder['order_master_id']}, '{$date_given}')";
                  $button_html = '<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModal"   onclick="' . $write_str . '">Meals</button>&nbsp;';

                  $_url = $this->generateUrl('admin_orders_getmealsdatewisefilter', array(
                      'quick_access' => 'all',
                      'order_id' => $_driverOrder['order_master_id']
                  ));
                  $button_html .= '<a class="btn btn-xs btn-warning" href="' . $_url . '" ><i class="fa fa-edit"></i></a>&nbsp;';

                  if ( $session->get('role_id') == 1 && $remaining_days != 0) {
                      $delivery_sticker_date_given = $_driverOrder['start_date'];
                      $meal_sticker_date_given = 0;
                      if ($date_given != '') {
                          $delivery_sticker_date_given = $date_given;
                          $meal_sticker_date_given = $_driverOrder['start_date'];
                      }

                      $printdeliverysticker_url = $this->generateUrl('admin_driverorders_printdeliverysticker', array(
                          'order_id' => $_driverOrder['order_master_id'],
                          'driver_id' => $driver_given_id,
                          'date_given' => date('U', strtotime($delivery_sticker_date_given)),
                          'time_id_given' => $time_id_given,
                          'area_id_given' => $area_id_given,
                      ));

                       
                     

                      if ($remaining_days > 0) {
                          $button_html .= "<a href='{$printdeliverysticker_url}' class='btn btn-success btn-xs' data-toggle='tooltip' data-placement='top' data-original-title='Print Delivery Stickers' target='_blank' >Delivery Sticker for<b> {$date_given}</b></a>&nbsp;";
                         
                      }
                      $mealsticker_url = $this->generateUrl('admin_driverorders_printmealsticker', array(
                          'order_id' => $_driverOrder['order_master_id'],
                          'driver_id' => $driver_given_id,
                          'date_given' => strtotime($date_given),
                          //'date_given' => strtotime($meal_sticker_date_given),
                          'date_given_date' => $date_given,
                          'time_id_given' => $time_id_given,
                          'area_id_given' => $area_id_given,
                      ));
                      if ($remaining_days > 0) {
                          $button_html .= '<a target="_blank" class="btn btn-danger btn-xs" href="' . $mealsticker_url . '"> Meal Sticker for <b> ' . $date_given . '</b></a>';

                          /*$printDriverSticker_url = $this->generateUrl('admin_driverorders_printdriversticker', array(
                            'order_id' => $_driverOrder['order_master_id'],
                            'driver_id' => $driver_id , // $driver_given_id,
                            'date_given' => date('U', strtotime($delivery_sticker_date_given)),
                            'time_id_given' => $time_id_given,
                            'area_id_given' => $area_id_given,
                        ));
                       $button_html .= "<a href='{$printDriverSticker_url}' target='_blank' class='btn bg-maroon btn-xs' data-toggle='tooltip' data-placement='top' data-original-title='Print Delivery Stickers' >Driver Sticker for<b> {$date_given}</b></a>&nbsp;";*/

                      }
                  }

                  $_driverOrderArr[] = $start + $i++;
                  $_driverOrderArr[] = $_driverOrder['unique_no'];
                  $_driverOrderArr[] = urldecode($_driverOrder['customer_name']);
                  $_driverOrderArr[] = sprintf('%04d', $_driverOrder['unique_user_id']); //$_driverOrder['unique_user_id'];
                  $_driverOrderArr[] = $package_name . ' - ' . $remaining_days . ' days remains';
                  $_driverOrderArr[] = date('d-m-Y', strtotime($_driverOrder['start_date'])) . ' to ' . date('d-m-Y', strtotime($_driverOrder['end_date']));
                  $_driverOrderArr[] = $_driverOrder['delivery_method_name'];
                  $_driverOrderArr[] = $_driverOrder['title'];
                  $_driverOrderArr[] = $driver_name;
                  $_driverOrderArr[] = $_addressText;
				  $_driverOrderArr[] = $_Governorate;
				  $_driverOrderArr[] = $_Area;				  
				  $_driverOrderArr[] = $_Block;
                  $_driverOrderArr[] = $button_html;


                  $driverOrderList[] = $_driverOrderArr;
                }
            }
        }

        $response = array(
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => count($totalDriverOrdersData),
            'recordsFiltered' => count($totalDriverOrdersData),
            'data' => $driverOrderList
        );

        echo json_encode($response);
        exit;

        // return array('driver_orders_data' => $driverOrdersData, 'driverDetails' => $driverDetails, 'date_given' => $date_given, 'drivers' => $drivers, 'delivery_methods' => $delivery_methods, 'timeSlots' => $timeSlots, 'area_list' => $area_list, 'area_id_given' => $area_id_given, 'driver_id' => $driver_given_id, 'time_id_given' => $time_id_given, 'productCategory' => $productCategory); 
    }

    // NOT IN USE
    public function indexActionOLD_AND_NOT_IN_USE($driver_id, $date_given) {
        //echo"<pre>";print_r($_REQUEST);exit;
        // ini_set('display_errors', 'On');
        // error_reporting(E_ALL);
        ini_set('memory_limit', '-1');
        ini_set('memory_execution_time', '-1');

        if (isset($_REQUEST['print_delivery_sticker']) && $_REQUEST['print_delivery_sticker'] == 'print_delivery_sticker') {
            #redirect to the delivery print page

            return $this->redirect($this->generateUrl(
                                    'admin_driverorders_printdeliverysticker', array(
                                'order_id' => 0,
                                'driver_id' => !empty($_REQUEST['driver_given']) ? $_REQUEST['driver_given'] : 0,
                                'date_given' => strtotime($_REQUEST['date_given']),
                                'time_id_given' => !empty($_REQUEST['time_id_given']) ? $_REQUEST['time_id_given'] : 0,
                                'area_id_given' => !empty($_REQUEST['area_id_given']) ? $_REQUEST['area_id_given'] : 0,
                                    )
            ));
        }

        $area_id_given = 0;
        $time_id_given = 0;

        $req = Request::createFromGlobals();

        if (empty($date_given)) {
            if (!empty($req->request->get('date_given'))) {
                $date_given = date('Y-m-d', strtotime($req->request->get('date_given')));
            } else {
                $date_given = false;
            }
        } else {
            //        $date_given = date('Y-m-d',$date_given);
            $date_given = false;
        }
        $driver_given_id = 0;
        if (!empty($req->request->get('driver_given'))) {
            $driver_given_id = $driver_id = $req->request->get('driver_given');
        }

        if ($this->get('session')->get('role_id') == 2) {
            #driver
            $driver_given_id = $driver_id = $this->get('session')->get('user_id');
        }

        $time_id_where = '';
        if (!empty($req->request->get('time_id_given'))) {
            $time_id_given = $req->request->get('time_id_given');
            $time_id_where = " AND order_master.delivery_time_id = '$time_id_given' ";
        }

        $area_id_where = '';

        if (!empty($req->request->get('area_id_given'))) {
            $area_id_given = $req->request->get('area_id_given');
            $area_id_where = " AND address_master.area_id = '$area_id_given' ";
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $today = date('Y-m-d 00:00:00');

        $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
            "user_master_id" => $driver_id
        ]);


        if (!empty($driver_id)) {
            if (!empty($date_given)) {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id' and requested_datetime = '$date_given'  ";
            } else {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and assign_driver_id = '$driver_id' ";
            }
        } else {
            if (!empty($date_given)) {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
          and requested_datetime = '$date_given'  ";
            } else {
                $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 ";
            }
        }


        //      echo $driverOrders;exit;

        $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,
      time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
      CONCAT ( customer.user_firstname,'  ',customer.user_lastname ) as customer_name, customer.user_mobile as mobile_no ,customer.unique_user_id 
      from order_master 
      JOIN user_master customer ON customer.user_master_id = order_master.order_by 
      LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
      LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
      JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
      LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
      where order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and order_status != 'pending' $area_id_where $time_id_where
      group by order_master.order_master_id order by order_master.order_master_id DESC";

        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $driverOrdersData = $stmt->fetchAll();

        $orderMeals = "select order_meal_relation_id from order_meal_relation where is_deleted = 0 and assign_driver_id = '$driver_id' ";
        $driver_sql_clause = '';
        if (!empty($driver_id)) {
            $driver_sql_clause = " and order_meal_relation.assign_driver_id = '$driver_id' ";
        }

        if (!empty($driverOrdersData)) {
            if (!empty($date_given)) {
                $meal_product_sql = "SELECT * from meal_product_relation
                    JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                    JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type 
                    JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id 
                    JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id 
                    where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $driver_sql_clause and order_master.is_deleted = 0 and order_meal_relation.requested_datetime = '$date_given' 
                    group by meal_product_relation_id order by order_meal_relation.requested_datetime DESC";
            } else {
                $meal_product_sql = "SELECT * from meal_product_relation
                    JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                    JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type 
                    JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id 
                    JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id 
                    where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $driver_sql_clause and order_master.is_deleted = 0 
                    group by meal_product_relation_id  order by order_meal_relation.requested_datetime DESC ";
            }

            $stmt = $connection->prepare($meal_product_sql);
            $stmt->execute();
            $mealProducts = $stmt->fetchAll();

            // echo '<pre>';
            // print_r($mealProducts);
            // exit;

            if ($mealProducts) {
                foreach ($mealProducts as $key => $value) {

                    if (!isset($driverOrdersData[$key]['order_master_id'])) {
                        continue;
                    }

                    $packageDetails = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(
                            [
                                "main_package_master_id" => $value['package_id']
                            ]
                    );

                    $meal_of_orders = null;

                    if (!empty($mealProducts)) {
                        foreach ($mealProducts as $_mealProducts) {
                            if ($_mealProducts['order_master_id'] == $value['order_master_id']) {
                                $meal_of_orders[] = array(
                                    'product_category_master_id' => $_mealProducts['product_category_master_id'],
                                    'product_category_name' => $_mealProducts['product_category_name'],
                                    'count_in' => $_mealProducts['count_in'],
                                    'meal_day' => $_mealProducts['meal_day'],
                                    'requested_datetime' => $_mealProducts['requested_datetime'],
                                    'status' => $_mealProducts['status'],
                                    'product_name' => $_mealProducts['product_name'],
                                    'raw_eggs' => $_mealProducts['raw_eggs'],
                                    'white_eggs' => $_mealProducts['white_eggs'],
                                    'carbs_amount' => $_mealProducts['carbs_amount'],
                                    'proteins_amount' => $_mealProducts['proteins_amount'],
                                );
                            }
                        }
                    }

                    $user_unique_number = $value['order_by'];
                    //$mobile_no = $value['user_mobile'];
                    $user_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($user_unique_number);
                    if ($user_info) {

                        if ($user_info->getUnique_user_id() != "" && $user_info->getUnique_user_id() != 0) {
                            $user_unique_number = $user_info->getUnique_user_id();
                        }
                    }

                    $driverOrdersData[$key]['assign_driver_id'] = $value['assign_driver_id'];
                    $driverOrdersData[$key]['meal_of_orders'] = $meal_of_orders;
                    // $driverOrdersData[$key]['meal_of_orders'] = null;
                    $driverOrdersData[$key]['package_details'] = $packageDetails;
                    $driverOrdersData[$key]['user_unique_no'] = $user_unique_number;
                    //$driverOrdersData[$key]['mobile_no'] = $mobile_no;
                    //echo $value['start_date'].' - '.$value['end_date'];exit;
                }
            }
        }

        if (!empty($driverOrdersData)) {
            foreach ($driverOrdersData as &$_driverOrder) {
                $order_start_date = strtotime($_driverOrder['start_date']);
                $order_end_date = strtotime($_driverOrder['end_date']);
                $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                $total_off_days = 0;
                $suspesion_days = 0;
                $diff_from_start_to_today = (strtotime($today) - $order_start_date) / 60 / 60 / 24;
                if ($diff_from_start_to_today < 0) {
                    $diff_from_start_to_today = 0;
                }
                $driver_id = 0;
                $ordermealDriver = "SELECT * FROM `order_meal_relation` where order_master_id = " . $_driverOrder['order_master_id'] . " and is_deleted = 0 and assign_driver_id != 0";
                $odermealDriverList = $this->fireQuery($ordermealDriver);
                if ($odermealDriverList) {
                    $driver_id = $odermealDriverList[0]['assign_driver_id'];
                }
                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
                    JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
                    where order_off_days_relation.is_deleted = 0 and order_id = " . $_driverOrder['order_master_id'] . " group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysArray = [];
                $freezeDays = [];

                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $_driverOrder['order_master_id'],
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

                while ($order_start_date <= $order_end_date) {

                    if ((in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5) && !in_array($order_start_date, $freezeDays)) {
                        if ($order_start_date >= strtotime($today)) {
                            $total_off_days += 1;
                        }
                    }

                    $order_start_date = strtotime("+1 day", $order_start_date);
                }

                $remaining_days = $totalDays - $total_off_days - $suspesion_days - $diff_from_start_to_today;

                if ($order_end_date < strtotime($today)) {
                    $remaining_days = 0;
                }

                // if($_driverOrder['order_master_id'] == '350'){
                //     $arr = array(
                //         $totalDays,
                //         $total_off_days,
                //         $suspesion_days,
                //         $diff_from_start_to_today
                //     );
                //     echo '<pre>';
                //     print_r($arr);
                //     exit;
                // }

                $_driverOrder['remaining_days_to_end_order'] = $remaining_days;

                $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
                    "user_master_id" => $driver_id
                ]);
                $driver_name = '';

                if (!empty($driverDetails)) {
                    $driver_name = $driverDetails->getUser_firstname() . " " . $driverDetails->getUser_lastname();
                }
                $_driverOrder['driver_name'] = $driver_name;
                // var_dump($_driverOrder['assign_driver_id']);exit;
            }
        }

        ini_set('memory_limit', '-1');

        //echo "<pre>";print_r($driverOrdersData);exit;

        $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 ";
        $drivers = $this->fireQuery($sql_get_drivers);

        $sql_get_time_slots = "select * from time_slot_master where is_deleted = 0 group by main_time_slot_master_id";
        $timeSlots = $this->fireQuery($sql_get_time_slots);

        $sql_get_delivery_method = "select * from delivery_method_master where is_deleted = 0 group by main_delivery_method_master_id";
        $delivery_methods = $this->fireQuery($sql_get_delivery_method);

        $sql = "select * from area_master where is_deleted = 0 group by main_area_id";
        $area_list = $this->firequery($sql);

        $sql_product_category = "select * from product_category_master where is_deleted = 0 group by main_product_category_master_id";

        $productCategory = $this->fireQuery($sql_product_category);

        return array('driverOrdersData' => $driverOrdersData, 'driverDetails' => $driverDetails, 'date_given' => $date_given, 'drivers' => $drivers, 'delivery_methods' => $delivery_methods, 'timeSlots' => $timeSlots, 'area_list' => $area_list, 'area_id_given' => $area_id_given, 'driver_id' => $driver_given_id, 'time_id_given' => $time_id_given, 'productCategory' => $productCategory);
    }

    /**
     * @Route("/printDeliveryStickerold/{order_id}/{driver_id}/{date_given}/{time_id_given}/{area_id_given}",defaults={"driver_id"="0","date_given"="0","time_id_given"="0","area_id_given"="0"})
     * @Template()
     */
    public function printdeliverystickeroldAction($order_id, $driver_id, $date_given, $time_id_given, $area_id_given) {
        $suspendHistory = null;
        $offDays = null;
        $total_off_days = $suspesion_days = $totalDays = $day_passed = 0;
        $offDaysArray = array();
        //var_dump($order_id);
;
  if (!empty($order_id)) {

            $order_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_id);
            if ($order_info && false) {
                //if ($order_info ) {  // 14 nov 2019

                $today = strtotime('now');
                $totalDays = 0;
                $order_start_date = strtotime($order_info->getStart_date());
                $order_end_date = strtotime($order_info->getEnd_date());

                if ($today > $order_start_date) {
                    $totalDays = floor(($order_end_date - $today) / (60 * 60 * 24)) + 1;
                } else {
                    $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                }

                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );

                $freezeOnce = false;

                $supend_start_date = null;
                $supend_end_date = null;
                $supend_end_date_response = null;
                $supend_start_date_response = null;

                $suspendedFridays = [];
                $suspendedOffDays = [];
                $freezeDays = [];

                $suspesion_days = 0;
                if ($checkFreeze) {
                    $freezeOnce = true;
                    foreach ($checkFreeze as $_checkFreeze) {
                        $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getStart_date())));
                        $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getEnd_date())));

                        $supend_start_date_response = date('Y-m-d', $supend_start_date);
                        $supend_end_date_response = date('Y-m-d', $supend_end_date);

                        while ($supend_start_date <= $supend_end_date) {

                            $freezeDays[] = $supend_start_date;
                            $suspesion_days += 1;

                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
                    }
                }
            }
            $today = strtotime(date('Y-m-d'));
        }




        if (!empty($_REQUEST['date_given'])) {
            $date_given = strtotime($_REQUEST['date_given']);
        }

        $meal_of_orders = null;

        $req = Request::createFromGlobals();

        if (empty($date_given)) {
            if (!empty($req->request->get('date_given'))) {
                $date_given = date('Y-m-d', strtotime($req->request->get('date_given')));
            } else {
                $date_given = false;
            }
        } else {
            $date_given = date('Y-m-d', $date_given);
        }
        $time_id_where = '';
        if (!empty($time_id_given)) {
            $time_id_where = " AND order_master.delivery_time_id = '$time_id_given' ";
        }

        $area_id_where = '';

        if (!empty($area_id_given)) {
            $area_id_where = " AND address_master.area_id = '$area_id_given' ";
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

//        $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
//            "user_master_id" => $driver_id
//        ]);

        $sql_order1 = '';
        $sql_order2 = '';
        $orderMaster = NULL;
        if (!empty($order_id)) {
            $sql_order1 = " AND order_master_id = '$order_id' ";
            $sql_order2 = " AND order_master.order_master_id = '$order_id' ";

            $order_query = "SELECT start_date,end_date,order_master_id from order_master where order_master_id = " . $order_id;
            $orderList = $this->fireQuery($order_query);
            if ($orderList) {
                $oval = $orderList[0];
                $orderMaster = array(
                    "order_master_id" => $oval['order_master_id'],
                    "start_date" => $oval['start_date'],
                    "end_date" => $oval['end_date']
                );
            }
        }

        $sql_driver_where = "";
        if (!empty($driver_id)) {
            $sql_driver_where = " and assign_driver_id = '$driver_id' ";
        }
        if (!empty($date_given)) {
            $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
        $sql_driver_where and requested_datetime = '$date_given' $sql_order1 and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
        } else {
            $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
        $sql_driver_where $sql_order1 and order_master_id";
        }

        $getDriverOrders = "SELECT order_master.order_master_id,order_master.order_by,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no as order_unique_no, time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,
      CONCAT ( customer.user_firstname,'  ',customer.user_lastname ) as customer_name ,customer.user_mobile
      from order_master 
      JOIN user_master customer ON customer.user_master_id = order_master.order_by 
      LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
      LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
      JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
      LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
      where order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 $area_id_where $time_id_where $sql_order2
            group by order_master.order_master_id";



        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $driverOrdersData = $stmt->fetchAll();

        /* if (!empty($date_given)) {
          //            $meal_product_sql = "select * , order_meal_relation.unique_no as mpr_unique_no ,order_master.unique_no as o_unique_no  from meal_product_relation
          //        JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          //        JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          //        JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          //        JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id
          //        where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $sql_driver_where and order_master.is_deleted = 0 and order_meal_relation.requested_datetime = '$date_given' $sql_order2
          //        group by meal_product_relation_id ";
          $meal_product_sql = "SELECT  meal_product_relation.raw_eggs ,
          meal_product_relation.white_eggs ,
          meal_product_relation.carbs_amount ,
          meal_product_relation.proteins_amount ,
          product_master.product_name,
          product_category_master.count_in ,
          order_meal_relation.order_master_id ,
          order_meal_relation.meal_day
          from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          WHERE meal_product_relation.is_deleted = 0 and order_meal_relation.order_master_id = {$value['order_master_id']} and order_meal_relation.is_deleted = 0 $sql_driver_where and order_meal_relation.requested_datetime = '$date_given' $sql_order2
          group by meal_product_relation_id ";
          }
          else {
          //            $meal_product_sql = "select * , order_meal_relation.unique_no as mpr_unique_no ,order_master.unique_no as o_unique_no  from meal_product_relation
          //        JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          //        JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          //        JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          //        JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id
          //        where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $sql_driver_where and order_master.is_deleted = 0 $sql_order2
          //        group by meal_product_relation_id ";
          $meal_product_sql = "SELECT
          meal_product_relation.raw_eggs ,
          meal_product_relation.white_eggs ,
          meal_product_relation.carbs_amount ,
          meal_product_relation.proteins_amount ,
          product_master.product_name,
          product_category_master.count_in ,
          order_meal_relation.order_master_id ,
          order_meal_relation.meal_day
          FROM meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          WHERE meal_product_relation.is_deleted = 0 and order_meal_relation.order_master_id = {$value['order_master_id']} and order_meal_relation.is_deleted = 0 $sql_driver_where $sql_order2
          GROUP BY meal_product_relation_id ";
          } */

        $orderMeals = "select order_meal_relation_id from order_meal_relation where is_deleted = 0 
      and assign_driver_id = '$driver_id' ";

        if ($driverOrdersData) {
            foreach ($driverOrdersData as $key => $value) {
                $total_off_days = 0;
                $order_id = $value['order_master_id'];
                $packageDetails = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(
                        [
                            "main_package_master_id" => $value['package_id']
                        ]
                );
                $firstCharacter = '';
                if ($packageDetails) {
                    $package_name = $packageDetails->getPackage_name();
                    $firstCharacter = $package_name[0];
                    $firstCharacter = " - " . $firstCharacter;
                }
                $meal_of_orders = null;

                if (!empty($date_given)) {
                    $_sql = "SELECT order_meal_relation_id,meal_day,order_master_id   from order_meal_relation where order_master_id = {$value['order_master_id']} and order_meal_relation.requested_datetime = '{$date_given}' and order_meal_relation.is_deleted = 0";
                } else {
                    $_sql = "SELECT order_meal_relation_id,meal_day,order_master_id  from order_meal_relation where order_master_id = {$value['order_master_id']}  and order_meal_relation.is_deleted = 0";
                }

                $order_meal_data = $this->firequery($_sql);

                if (!empty($order_meal_data)) {
                    foreach ($order_meal_data as $_orderMealData) {
                        $_mealProductQuery = "SELECT meal_product_relation.*, '' as count_in, '' as product_name 
                        FROM meal_product_relation 
                        WHERE meal_id = {$_orderMealData['order_meal_relation_id']} and meal_product_relation.is_deleted = 0
                        GROUP BY meal_product_relation_id";

                        // $_mealProductQuery = "SELECT meal_product_relation.*, product_category_master.count_in, product_master.product_name 
                        // FROM meal_product_relation 
                        // JOIN product_category_master ON product_category_master.main_product_category_master_id = meal_product_relation.meal_type 
                        // JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id 
                        // WHERE meal_id = {$_orderMealData['order_meal_relation_id']} and meal_product_relation.is_deleted = 0 and product_master.is_deleted = 0 and product_category_master.is_deleted = 0 GROUP BY meal_product_relation_id";

                        $meal_product_data = $this->firequery($_mealProductQuery);

                        if (!empty($meal_product_data)) {
                            foreach ($meal_product_data as $_mealProductData) {

                                $count_in = '';
                                $product_name = '';

                                $_sql = "SELECT product_name from product_master where main_product_master_id = {$_mealProductData['main_product_id']} and is_deleted = 0 and language_id=1 group by main_product_master_id";
                                $productData = $this->firequery($_sql);

                                if (!empty($productData)) {
                                    $product_name = $productData[0]['product_name'];
                                }

                                $_sql = "SELECT count_in from product_category_master where main_product_category_master_id = {$_mealProductData['meal_type']} and is_deleted = 0 group by main_product_category_master_id";
                                $productCategoryData = $this->firequery($_sql);

                                if (!empty($productCategoryData)) {
                                    $count_in = $productCategoryData[0]['count_in'];
                                }

                                // echo '<pre>';
                                // print_r($productData);
                                // exit;

                                $meal_of_orders[] = array(
                                    'count_in' => $count_in,
                                    'meal_day' => $_orderMealData['meal_day'],
                                    'product_name' => $product_name,
                                    'raw_eggs' => $_mealProductData['raw_eggs'],
                                    'white_eggs' => $_mealProductData['white_eggs'],
                                    'carbs_amount' => $_mealProductData['carbs_amount'],
                                    'proteins_amount' => $_mealProductData['proteins_amount'],
                                );
                            }
                        }
                    }
                }

                $today = strtotime('now');
                $totalDays = 0;
                $order_start_date = strtotime($value['start_date']);
                $order_end_date = strtotime($value['end_date']);

                if ($today > $order_start_date) {
                    $totalDays = floor(($order_end_date - $today) / (60 * 60 * 24)) + 1;
                } else {
                    $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                }
                $checkFreezeQuery = "SELECT `start_date`,`end_date`,`order_id` FROM `freeze_subpackage` WHERE `order_id` = " . $order_id . " and is_deleted = 0 ";
                $checkFreeze = $this->fireQuery($checkFreezeQuery);

                $freezeOnce = false;

                $supend_start_date = null;
                $supend_end_date = null;
                $supend_end_date_response = null;
                $supend_start_date_response = null;

                $suspendedFridays = [];
                $suspendedOffDays = [];
                $freezeDays = [];

                $suspesion_days = 0;
                if ($checkFreeze) {
                    $freezeOnce = true;
                    foreach ($checkFreeze as $_checkFreeze) {
                        $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze['start_date'])));
                        $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze['end_date'])));

                        $supend_start_date_response = date('Y-m-d', $supend_start_date);
                        $supend_end_date_response = date('Y-m-d', $supend_end_date);

                        while ($supend_start_date <= $supend_end_date) {

                            $freezeDays [] = date('Y-m-d', $supend_start_date);
                            $suspesion_days += 1;

                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
                    }
                }
                $order_suspend_history_sql = "select start_date,end_date from freeze_subpackage where order_id = '$order_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";

                $suspendHistory = $this->fireQuery($order_suspend_history_sql);

                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
                                    JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
                                    where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysName = [];
                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray[] = $_offDays['main_days_master_id'];
                        $offDaysName[] = array('days_name' => $_offDays['days_name']);
                    }
                }
                $today = strtotime(date('Y-m-d'));
                //  var_dump($offDaysArray);exit;
                $day_passed = 0;
                $totalDaysDateArray = [];
                $passed_days_dateArray = [];
                $offDaysDates = [] ;
                while ($order_start_date <= $order_end_date) {
                    $totalDaysDateArray[] = date('Y-m-d', $order_start_date);
                    if ((in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5) && !in_array($order_start_date, $freezeDays)) {
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
                }
                $remaining_days = count($totalDaysDateArray);
                //              var_dump($totalDays); // 26
                //              var_dump($total_off_days); // 13
                //              var_dump($suspesion_days); // 5
                // $remaining_days = $totalDays - $total_off_days - $suspesion_days - $day_passed;

                $user_unique_number = $value['order_by'];
                $user_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($user_unique_number);
                if ($user_info) {
                    if ($user_info->getUnique_user_id() != "" && $user_info->getUnique_user_id() != 0) {
                        $user_unique_number =  sprintf('%04d', $user_info->getUnique_user_id()); ;
                    }
                }

                $driverOrdersData[$key]['meal_of_orders'] = $meal_of_orders;
                $driverOrdersData[$key]['package_details'] = $packageDetails;
                $driverOrdersData[$key]['user_unique_no'] = $user_unique_number;
                $driverOrdersData[$key]['firstCharacter'] = $firstCharacter;
                $driverOrdersData[$key]['remaining_days_to_end_order'] = $remaining_days; //(floor(( strtotime($value['end_date']) - strtotime(date("Y-m-d"))) / (24 * 60 * 60)) <= 0) ? 0 : floor(( strtotime($value['end_date']) - strtotime(date("Y-m-d"))) / (24 * 60 * 60)) <= 0;
                $order_master_id = $value['order_master_id'];
                // $offDaysSql = "select days_name from days_master where main_days_master_id IN ( select off_day from  order_off_days_relation where order_id = '$order_master_id' and is_deleted = 0 ) group by main_days_master_id";
                // $offDays = $this->fireQuery($offDaysSql);
                $driverOrdersData[$key]['offDays'] = $offDaysName; // $offDays;
            }
            $price = array();

            foreach ($driverOrdersData as $key => $row) {
                $price[$key] = $row['user_unique_no'];
            }
            array_multisort($price, SORT_ASC, $driverOrdersData);
        }

        // echo "<pre>";print_r($driverOrdersData);exit;
//        $orderMaster = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(
//            [
//                "order_master_id" => $order_id
//            ]
//        );


        return array(
            'driverOrdersData' => $driverOrdersData,
            //'driverDetails' => $driverDetails,
            'date_given' => $date_given,
            "order_id" => $order_id,
            "orderMaster" => $orderMaster,
            'offDays' => $offDays,
            'suspendHistory' => $suspendHistory
        );
    }

    /**
     * @Route("/printDeliverySticker/{order_id}/{driver_id}/{date_given}/{time_id_given}/{area_id_given}",defaults={"order_id"="0","driver_id"="0","date_given"="0","time_id_given"="0","area_id_given"="0"})
     * @Template()
     */
    public function printdeliverystickerAction($order_id, $driver_id, $date_given, $time_id_given, $area_id_given) {
        $includeProductCategory = isset($_REQUEST['include_string']) ? $_REQUEST['include_string'] : null;

        $include_product_category = '';

        if (!empty($includeProductCategory)) {
            $includeProductCategory = json_decode($includeProductCategory);
            if (!empty($includeProductCategory)) {
                foreach ($includeProductCategory as $_includeProductCategory) {
                    $include_product_category .= $_includeProductCategory->productCategory . ",";
                }
                $include_product_category = trim($include_product_category, ",");
            }
        }
        
        $meal_of_orders = NULL;
        $req = Request::createFromGlobals();

        if (empty($date_given)) {
            if (!empty($req->request->get('date_given'))) {
                $date_given = date('Y-m-d', strtotime($req->request->get('date_given')));
              

            } else {
                $date_given = false;
            }
        } else {
            $date_given = date('Y-m-d', $date_given);
        }


        $time_id_where = '';
        if (!empty($time_id_given)) {
            $time_id_where = " AND order_master.delivery_time_id = '$time_id_given' ";
        }

        $area_id_where = '';

        if (!empty($area_id_given)) {
            $area_id_where = " AND address_master.area_id = '$area_id_given' ";
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
            "user_master_id" => $driver_id
        ]);

        $sql_order1 = '';
        $sql_order2 = '';

        if (!empty($order_id)) {
            $sql_order1 = " AND order_master_id = '$order_id' ";
            $sql_order2 = " AND order_master.order_master_id = '$order_id' ";
        }

        $driver_sql_clause = "";
        if (!empty($driver_id)) {
            $driver_sql_clause = " and assign_driver_id = '$driver_id' ";
        }
        if (!empty($date_given)) {
            $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
        $driver_sql_clause and requested_datetime = '$date_given'  $sql_order1 and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
        } else {
            $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
        $driver_sql_clause $sql_order1";
        }

        $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,sub_package_id,name,
      time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,city_name,
      CONCAT ( customer.user_firstname,' ',customer.user_lastname ) as customer_name,calorie_count,customer.user_mobile as mobile_no , customer.unique_user_id , RIGHT(CONCAT('000', customer.unique_user_id),5) as unique_user_id_with_zero,order_note_text
      from order_master 
      JOIN user_master customer ON customer.user_master_id = order_master.order_by 
      LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
      LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
      JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
      LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
      LEFT JOIN city_master ON city_master.main_city_master_id=area_master.city_id
      LEFT JOIN order_note_master ON order_note_master.main_order_note_id = order_master.order_note_id 
      where order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and city_master.language_id=1 and (delivery_method_master.language_id=1 or delivery_method_master.language_id is null) and (time_slot_master.language_id = 1 or time_slot_master.language_id is NULL )  and (order_note_master.language_id = 1 or order_note_master.language_id is null) and ( area_master.language_id = 1 OR area_master.language_id is nULL )  $area_id_where $time_id_where $sql_order2 
      group by order_master.order_master_id";

        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $driverOrdersData = $stmt->fetchAll();

//echo $getDriverOrders ;exit;
        $product_category_where = '';
        $product_category_orderBy = '';
        $sql_order2_order_by = '';
        if ($include_product_category != '') {
            $product_category_where = " AND product_category_master.main_product_category_master_id IN ($include_product_category) ";
            $sql_order2_order_by = ' ORDER BY `meal_product_relation`.`main_product_id` ASC  ';
        }

        /* if (!empty($date_given)) {
          $meal_product_sql = "select * from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id
          where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $driver_sql_clause and order_master.is_deleted = 0 and order_meal_relation.requested_datetime = '$date_given' $product_category_where
          group by meal_product_relation_id $sql_order2";
          } else {
          $meal_product_sql = "select * from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id
          where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $driver_sql_clause and order_master.is_deleted = 0 $product_category_where
          group by meal_product_relation_id $sql_order2";
          }

          $stmt = $connection->prepare($meal_product_sql);
          $stmt->execute();
          $mealProducts = $stmt->fetchAll(); */


        if ($driverOrdersData) {
            foreach ($driverOrdersData as $key => $value) {

                $packageDetails = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(
                        [
                            "main_package_master_id" => $value['package_id']
                        ]
                );
                $subpackage = $em->getRepository("AdminBundle:Subpackagemaster")->findOneBy(
                        [
                            "main_sub_package_id" => $value['sub_package_id'],"language_id"=>1
                        ]
                );
                $firstCharacter = '';
                if ($packageDetails) {
                    $package_name = $packageDetails->getPackage_name();
                    $firstCharacter = $package_name[0];
                    $firstCharacter = " - " . $firstCharacter;
                }
                if (!empty($date_given)) {
                    $ordermealDriverSql = "SELECT * FROM `order_meal_relation` where order_master_id = {$value['order_master_id']} and requested_datetime = '$date_given' and is_deleted = 0 {$driver_sql_clause} and order_master_id NOT IN ( SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
                } else {
                    $ordermealDriverSql = "SELECT * FROM `order_meal_relation` where order_master_id = {$value['order_master_id']} and is_deleted = 0 {$driver_sql_clause}";
                }
                $order_meal_relation_data = $this->fireQuery($ordermealDriverSql);
$total_calorie=0;
                $status = '';
                $meal_day = '';
                $requested_datetime = '';
                $order_meal_relation_id = 0;
                if ($order_meal_relation_data) {
                    $order_meal_relation_id = $order_meal_relation_data[0]['order_meal_relation_id'];
                    $meal_day = $order_meal_relation_data[0]['meal_day'];
                    $status = $order_meal_relation_data[0]['status'];
                    $requested_datetime = $order_meal_relation_data[0]['requested_datetime'];
                }

                if ($order_meal_relation_id != 0) {
                    $meal_product_sql = "SELECT product_category_master_id, product_category_name, count_in, product_name, raw_eggs, white_eggs, carbs_amount, proteins_amount, product_master.calory as calory,prot,carb,fat,main_product_id from meal_product_relation
                            JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                            JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type 
                            where meal_product_relation.meal_id = {$order_meal_relation_id} and meal_product_relation.is_deleted = 0 {$product_category_where} and product_category_master.language_id=1 and product_master.language_id=1
                            group by meal_product_relation_id {$sql_order2_order_by}";

                    $mealProducts = null;
                    $mealProducts = $this->firequery($meal_product_sql);
 $meal_of_orders = [];

                    if (!empty($mealProducts)) {
                      $total_calorie =0;
                        foreach ($mealProducts as $_mealProducts) {
                            $meal_of_orders[] = array(
                                'firstCharacter' => $firstCharacter,
                                'product_category_master_id' => $_mealProducts['product_category_master_id'],
                                'product_category_name' => $_mealProducts['product_category_name'],
                                'order_master_id' => $value['order_master_id'],
                                'unique_no' => $value['unique_user_id_with_zero'],
                                'order_unique_no'=>$value['unique_no'],
                                'count_in' => $_mealProducts['count_in'],
                                'meal_day' => $meal_day,
                                'requested_datetime' => $requested_datetime,
                                'status' => $status,
                                'main_product_id' => $_mealProducts['main_product_id'],
                                'product_name' => $_mealProducts['product_name'],
                                'prot' => $_mealProducts['prot'],
                                'carb' => $_mealProducts['carb'],
                                'fat' => $_mealProducts['fat'],
                                'proteins_amount' => $_mealProducts['proteins_amount'],
                                'calory'=>$_mealProducts['calory']
                            );
                            $total_calorie +=(float)$_mealProducts['calory'];
                        }
                    }
                     $driverOrdersData[$key]['meal_of_orders'] = $meal_of_orders;
                $driverOrdersData[$key]['package_details'] = $packageDetails;
                $driverOrdersData[$key]['subpackage']=$subpackage;
                $driverOrdersData[$key]['total_calorie']=$total_calorie;
                $driverOrdersData[$key]['date_given'] = $date_given;
                $driverOrdersData[$key]['remaining_days_to_end_order'] = floor((strtotime($value['end_date']) - strtotime($date_given)) / (24 * 60 * 60));
                }

               
            }
        }
/*foreach ($driverOrdersData as $key => $value) {
 print_r($value['unique_no']);
  echo '<pre>';print_r($value['meal_of_orders']);echo '</pre>';
}die;*/

        $price = array();
        $price1 = array();
      
        if (!empty($meal_of_orders)) {
            foreach ($meal_of_orders as $key => $row) {
                $price[$key] = $row['main_product_id'];
      //          $price1[$key] = $row['unique_no'];
            }
       array_multisort($price, SORT_DESC, $meal_of_orders);
      //array_multisort($price, SORT_DESC, $price1, SORT_ASC, $meal_of_orders);
        }
     // echo '<pre>';print_r($driverOrdersData);echo '</pre>';exit;
      
        return array('driverOrdersData1' => $driverOrdersData, 'driverDetails' => $driverDetails, 'date_given' => $date_given, 'meal_of_orders' => $meal_of_orders);
    }
/**
     * @Route("/printMealSticker/{order_id}/{driver_id}/{date_given}/{time_id_given}/{area_id_given}",defaults={"order_id"="0","driver_id"="0","date_given"="0","time_id_given"="0","area_id_given"="0"})
     * @Template()
     */
    public function printmealstickerAction($order_id, $driver_id, $date_given, $time_id_given, $area_id_given) {
        $includeProductCategory = isset($_REQUEST['include_string']) ? $_REQUEST['include_string'] : null;

        $include_product_category = '';

        if (!empty($includeProductCategory)) {
            $includeProductCategory = json_decode($includeProductCategory);
            if (!empty($includeProductCategory)) {
                foreach ($includeProductCategory as $_includeProductCategory) {
                    $include_product_category .= $_includeProductCategory->productCategory . ",";
                }
                $include_product_category = trim($include_product_category, ",");
            }
        }
        
        $meal_of_orders = NULL;
        $req = Request::createFromGlobals();

        if (empty($date_given)) {
            if (!empty($req->request->get('date_given'))) {
                $date_given = date('Y-m-d', strtotime($req->request->get('date_given')));
              

            } else {
                $date_given = false;
            }
        } else {
            $date_given = date('Y-m-d', $date_given);
        }


        $time_id_where = '';
        if (!empty($time_id_given)) {
            $time_id_where = " AND order_master.delivery_time_id = '$time_id_given' ";
        }

        $area_id_where = '';

        if (!empty($area_id_given)) {
            $area_id_where = " AND address_master.area_id = '$area_id_given' ";
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $driverDetails = $em->getRepository("AdminBundle:Usermaster")->findOneBy([
            "user_master_id" => $driver_id
        ]);

        $sql_order1 = '';
        $sql_order2 = '';

        if (!empty($order_id)) {
            $sql_order1 = " AND order_master_id = '$order_id' ";
            $sql_order2 = " AND order_master.order_master_id = '$order_id' ";
        }

        $driver_sql_clause = "";
        if (!empty($driver_id)) {
            $driver_sql_clause = " and assign_driver_id = '$driver_id' ";
        }
        if (!empty($date_given)) {
            $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
        $driver_sql_clause and requested_datetime = '$date_given'  $sql_order1 and order_master_id NOT IN (SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
        } else {
            $driverOrders = "select order_master_id from order_meal_relation where is_deleted = 0 
        $driver_sql_clause $sql_order1";
        }

        $getDriverOrders = "SELECT order_master.order_master_id,order_master.delivery_time_id,order_master.start_date,order_master.end_date,order_master.delivery_method_id ,order_master.package_id , order_master.unique_no ,sub_package_id,name,
      time_slot_master.title,time_slot_master.start_time,time_slot_master.end_time,address_master.area_id , area_master.area_name ,address_master.*, delivery_method_master.name as delivery_method_name ,city_name,
      CONCAT ( customer.user_firstname,customer.user_lastname ) as customer_name,customer.user_mobile as mobile_no , customer.unique_user_id , RIGHT(CONCAT('000', customer.unique_user_id),5) as unique_user_id_with_zero,order_note_text
      from order_master 
      JOIN user_master customer ON customer.user_master_id = order_master.order_by 
      LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id 
      LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
      JOIN address_master ON address_master.main_address_id = order_master.delivery_address_id      
      LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id 
      LEFT JOIN city_master ON city_master.main_city_master_id=area_master.city_id
      LEFT JOIN order_note_master ON order_note_master.main_order_note_id = order_master.order_note_id 
      where order_master.order_master_id IN ($driverOrders) and order_master.is_deleted = 0 and city_master.language_id=1 and (delivery_method_master.language_id=1 or delivery_method_master.language_id is null) and (order_note_master.language_id=1 or order_note_master.language_id is null) $area_id_where $time_id_where $sql_order2
      group by order_master.order_master_id";

        $stmt = $connection->prepare($getDriverOrders);
        $stmt->execute();
        $driverOrdersData = $stmt->fetchAll();

//echo $getDriverOrders ;exit;
        $product_category_where = '';
        $product_category_orderBy = '';
        $sql_order2_order_by = '';
        if ($include_product_category != '') {
            $product_category_where = " AND product_category_master.main_product_category_master_id IN ($include_product_category) ";
            $sql_order2_order_by = ' ORDER BY `meal_product_relation`.`main_product_id` ASC  ';
        }

        /* if (!empty($date_given)) {
          $meal_product_sql = "select * from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id
          where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $driver_sql_clause and order_master.is_deleted = 0 and order_meal_relation.requested_datetime = '$date_given' $product_category_where
          group by meal_product_relation_id $sql_order2";
          } else {
          $meal_product_sql = "select * from meal_product_relation
          JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
          JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type
          JOIN order_meal_relation ON order_meal_relation.order_meal_relation_id = meal_product_relation.meal_id
          JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id
          where meal_product_relation.is_deleted = 0 and  order_meal_relation.is_deleted = 0 $driver_sql_clause and order_master.is_deleted = 0 $product_category_where
          group by meal_product_relation_id $sql_order2";
          }

          $stmt = $connection->prepare($meal_product_sql);
          $stmt->execute();
          $mealProducts = $stmt->fetchAll(); */
         

 $meal_of_orders = [];
        if ($driverOrdersData) {
            foreach ($driverOrdersData as $key => $value) {
              
                $packageDetails = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(
                        [
                            "main_package_master_id" => $value['package_id']
                        ]
                );
                $subpackage = $em->getRepository("AdminBundle:Subpackagemaster")->findOneBy(
                        [
                            "main_sub_package_id" => $value['sub_package_id'],"language_id"=>1
                        ]
                );
                $firstCharacter = '';
                if ($packageDetails) {
                    $package_name = $packageDetails->getPackage_name();
                    $firstCharacter = $package_name[0];
                    $firstCharacter = " - " . $firstCharacter;
                }
                if (!empty($date_given)) {
                    $ordermealDriverSql = "SELECT * FROM `order_meal_relation` where order_master_id = {$value['order_master_id']} and requested_datetime = '$date_given' and is_deleted = 0 {$driver_sql_clause} and order_master_id NOT IN ( SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date_by_update >= '{$date_given}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date_given}' and pause_package.pause_end_date >= '{$date_given}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))) ";
                } else {
                    $ordermealDriverSql = "SELECT * FROM `order_meal_relation` where order_master_id = {$value['order_master_id']} and is_deleted = 0 {$driver_sql_clause}";
                }
                $order_meal_relation_data = $this->fireQuery($ordermealDriverSql);
$total_calorie=0;
                $status = '';
                $meal_day = '';
                $requested_datetime = '';
                $order_meal_relation_id = 0;
                if ($order_meal_relation_data) {
                    $order_meal_relation_id = $order_meal_relation_data[0]['order_meal_relation_id'];
                    $meal_day = $order_meal_relation_data[0]['meal_day'];
                    $status = $order_meal_relation_data[0]['status'];
                    $requested_datetime = $order_meal_relation_data[0]['requested_datetime'];
                }

                if ($order_meal_relation_id != 0) {
                    $meal_product_sql = "SELECT product_category_master_id, product_category_name, count_in, product_name, raw_eggs, white_eggs, carbs_amount, proteins_amount, product_master.calory as calory,prot,carb,fat,main_product_id from meal_product_relation
                            JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                            JOIN product_category_master ON  product_category_master.main_product_category_master_id = meal_product_relation.meal_type 
                            where meal_product_relation.meal_id = {$order_meal_relation_id} and meal_product_relation.is_deleted = 0 {$product_category_where} and product_category_master.language_id=1 and product_master.language_id=1
                            group by meal_product_relation_id {$sql_order2_order_by}";

                    $mealProducts = null;
                    $mealProducts = $this->firequery($meal_product_sql);
                   
                    if (!empty($mealProducts)) {
                      $total_calorie =0;
                        foreach ($mealProducts as $_mealProducts) {
                            $meal_of_orders[] = array(
                                'firstCharacter' => $firstCharacter,
                                'product_category_master_id' => $_mealProducts['product_category_master_id'],
                                'product_category_name' => $_mealProducts['product_category_name'],
                                'order_master_id' => $value['order_master_id'],
                                'unique_no' => $value['unique_user_id_with_zero'],
                                'order_unique_no'=>$value['unique_no'],
                                'date_given'=>$date_given,                                
                                'count_in' => $_mealProducts['count_in'],
                                'meal_day' => $meal_day,
                                'requested_datetime' => $requested_datetime,
                                'status' => $status,
                                'main_product_id' => $_mealProducts['main_product_id'],
                                'product_name' => $_mealProducts['product_name'],
                                'prot' => $_mealProducts['prot'],
                                'carb' => $_mealProducts['carb'],
                                'fat' => $_mealProducts['fat'],
                                'order_note_text'=>$value['order_note_text'],
                                'raw_eggs' => $_mealProducts['raw_eggs'],
                                'white_eggs' => $_mealProducts['white_eggs'],
                                'carbs_amount' => $_mealProducts['carbs_amount'],
								'proteins_amount' => $_mealProducts['proteins_amount'],
                                'calory'=>$_mealProducts['calory']
                            );
                            $total_calorie +=(float)$_mealProducts['calory'];
                        }
                    }
                }
                
                $driverOrdersData[$key]['meal_of_orders'] = $meal_of_orders;
                $driverOrdersData[$key]['package_details'] = $packageDetails;
                $driverOrdersData[$key]['subpackage']=$subpackage;
                $driverOrdersData[$key]['total_calorie']=$total_calorie;
                $driverOrdersData[$key]['date_given'] = $date_given;
                $driverOrdersData[$key]['remaining_days_to_end_order'] = floor((strtotime($value['end_date']) - strtotime($date_given)) / (24 * 60 * 60));
            }
        }
        $price = array();
        $price1 = array();
        
        /*if (!empty($meal_of_orders)) {
            foreach ($meal_of_orders as $key => $row) {
                $price[$key] = $row['main_product_id'];
                $price1[$key] = $row['unique_no'];
            }
            array_multisort($price, SORT_DESC, $price1, SORT_ASC, $meal_of_orders);
        }*/
      //  print_r($meal_of_orders);die;
        usort($meal_of_orders, function($a, $b) {
    return $a['product_name'] <=> $b['product_name'];
});
     
      
        return array('driverOrdersData' => $driverOrdersData, 'driverDetails' => $driverDetails, 'date_given' => $date_given, 'meal_of_orders' => $meal_of_orders);
    }



     /**
     * @Route("/printDriverSticker/{order_id}/{driver_id}/{date_given}/{time_id_given}/{area_id_given}",defaults={"order_id"="0","driver_id"="0","date_given"="0","time_id_given"="0","area_id_given"="0"})
     * @Template()
     */
    public function printDriverstickerAction($order_id, $driver_id, $date_given, $time_id_given, $area_id_given) {

     $order_code = $area_name = '';
      if($order_id != 0 ){
       $area_query = "SELECT area_master.area_name FROM `address_master` join area_master on address_master.area_id = area_master.main_area_id where address_master.main_address_id = ".$order_id." group by area_master.main_area_id";
        $area_value = $this->firequery($area_query);
        if($area_value){
          $area_name = $area_value[0]['area_name'] ; 
        }
      }
     
     // $query = "select order_meal_relation.order_meal_relation_id,order_master_id FROM `order_meal_relation` WHERE `requested_datetime` = '". date("Y-m-d",$date_given) ."' AND `is_deleted` = 0" ; 
      $query = "select order_meal_relation.order_meal_relation_id,order_meal_relation.order_master_id ,order_master.unique_no ,order_meal_relation.assign_driver_id ,user_master.unique_user_id FROM `order_meal_relation` join order_master on order_meal_relation.order_master_id = order_master.order_master_id join user_master on order_meal_relation.assign_driver_id = user_master.user_master_id WHERE order_meal_relation.`requested_datetime` =  '". date("Y-m-d",$date_given) ."' and order_meal_relation.assign_driver_id = ".$driver_id." AND order_meal_relation.`is_deleted` = 0
" ; 
    
      $list = $this->firequery($query);
      $dateOrders = [] ;
      $this_order_id = 0 ; 
      $pass_driverStickerArray = [] ; 
      if($list){
        foreach($list as $lkey=>$lval){
          $dateOrders[$lval['order_master_id']] = $lkey ; 
           $this_order_id = $lkey + 1 ; ;

          if($order_id == 0 ){
            $area_query = "SELECT area_master.area_name FROM `address_master` join area_master on address_master.area_id = area_master.main_area_id where address_master.main_address_id = ".$lval['order_master_id']." group by area_master.main_area_id";
            $area_value = $this->firequery($area_query);
            if($area_value){
              $area_name = $area_value[0]['area_name'] ; 
            }
          }
          $order_code = $lval['unique_no'] ;
          $driver_code = $lval['unique_user_id'];
          

          $driver_sticker_code1 = $driver_code ."-" . $this_order_id ;
          $driver_sticker_code2 = $order_code ;
          $driver_sticker_code3 = $area_name ;
          if($order_id != 0 ){
             if($lval['order_master_id'] == $order_id ){
              $driver_sticker_code1 = $driver_code ."-" . $this_order_id ;
              $driver_sticker_code2 = $order_code ;
              $driver_sticker_code3 = $area_name ;
             
              $pass_driverStickerArray[] = array(
                "driver_sticker_code1"=>$driver_sticker_code1,
                "driver_sticker_code2"=>$driver_sticker_code2,
                "driver_sticker_code3"=>$driver_sticker_code3,
              );
             
            }
          }
          else{
              $driver_sticker_code1 = $driver_code ."-" . $this_order_id ;
              $driver_sticker_code2 = $order_code ;
              $driver_sticker_code3 = $area_name ;
             
              $pass_driverStickerArray[] = array(
                "driver_sticker_code1"=>$driver_sticker_code1,
                "driver_sticker_code2"=>$driver_sticker_code2,
                "driver_sticker_code3"=>$driver_sticker_code3,
              );
          }
         
        }
      }
  
        return array('driver_sticker_code1' => $driver_sticker_code1, 'driver_sticker_code2' => $driver_sticker_code2, 'driver_sticker_code3' => $driver_sticker_code3, 'order_id' => $order_id, 'driver_id'=>$driver_id ,'date_given'=>$date_given,"pass_driverStickerArray"=>$pass_driverStickerArray );
     
    }
}
