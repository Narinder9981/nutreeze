<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\Productcategorymaster;
use AdminBundle\Entity\Mealproductrelation;
use AdminBundle\Entity\Ordermealrelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Generalnotification;
use AdminBundle\Entity\Freezesubpackage;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Subpackagedefaultvalues;

class DashboardController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();
    }

    /**
     * @Route("/dashboard")
     * @Template()
     */
    public function indexAction() {
        $order_count = 0;
        $statstics = array('users' => 0, 'drivers' => 0, 'companies' => 0, 'packages' => 0, 'orders' => 0);
        // $backupfile = "http://admin-pc/MuscleFuel/backup/backupdatafile.php";
        $backupfile = $this->getParameter('live_path') . "/backup/backupdatafile.php";
        $con = $this->getDoctrine()->getManager()->getConnection();


        $sql_users = "select count(*) as user_cnt from user_master where user_master.is_deleted = 0 and user_master.user_role_id = 3 order by user_master.user_master_id DESC";
        $stmt = $con->prepare($sql_users);
        $stmt->execute();
        $users_count = $stmt->fetchAll();

        $statstics['users'] = $users_count[0]['user_cnt'];


        /*
        $sql_users = "select count(*) as driver_cnt from user_master where user_master.is_deleted = 0 and user_master.user_role_id = 2 order by user_master.user_master_id DESC";
        $stmt = $con->prepare($sql_users);
        $stmt->execute();
        $driver_count = $stmt->fetchAll();

        $statstics['drivers'] = $driver_count[0]['driver_cnt'];

       

        $sql_users = "select count(*) as company_cnt from user_master where user_master.is_deleted = 0 and user_master.user_role_id = 4 order by user_master.user_master_id DESC";
        $stmt = $con->prepare($sql_users);
        $stmt->execute();
        $company_count = $stmt->fetchAll();

        $statstics['companies'] = $company_count[0]['company_cnt'];

        

        $sql_packages = "select count(package_master_id) as package from package_master where is_deleted = 0 group by main_package_master_id";
        $stmt1 = $con->prepare($sql_packages);
        $stmt1->execute();
        $package_count = $stmt1->fetchAll();

        if (!empty($package_count)) {
            $statstics['packages'] = count($package_count);
        }
         */


        //-----------------update for orders ---------------------
         $_today = date('Y-m-d');
         $where_clause = "AND end_date < '{$_today}'";
          $where_clause = "AND end_date >= '{$_today}'";
            

           /* $order_list_sql = "select count(*) as order_cnt FROM order_master WHERE order_master.is_deleted = 0 AND order_status != 'pending'  and order_status = 'success'   {$where_clause} order by order_master.created_date DESC";
        $stmt2 = $con->prepare($order_list_sql);
        $stmt2->execute();
        $order_count = $stmt2->fetchAll();

        $statstics['orders'] = $order_count[0]['order_cnt'];

        $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,email,status from user_master 
                
                where user_master.is_deleted = 0 and user_master.user_role_id = '3' order by created_datetime DESC LIMIT 0,5";
        $users = NULL ; //  $this->fireQuery($sql);
        $live_path = $this->container->getParameter('live_path');


        $order_list_sql = "select order_master.order_master_id,order_master.order_status,order_master.start_date,order_master.end_date,user_master.user_firstname,user_master.user_lastname,package_master.package_name from order_master JOIN user_master ON user_master.user_master_id = order_master.order_by JOIN package_master ON package_master.main_package_master_id = order_master.package_id where order_master.is_deleted = 0 group by order_master.order_master_id order by order_master.created_date DESC LIMIT 0,5 ";
        $orders = NULL ; // $this->fireQuery($order_list_sql);
    */
        $todayDatePass = date("Y-m-d");
        $nextDatePass = date('Y-m-d', strtotime($todayDatePass . ' + 1 days'));
        $tomorowDatePass = date('Y-m-d', strtotime($todayDatePass . ' + 2 days'));
        $dayaftertomorowDatePass = date('Y-m-d', strtotime($todayDatePass . ' + 3 days'));
        $dayaftertomorowDatePass_plus1day = date('Y-m-d', strtotime($todayDatePass . ' + 4 days'));
        $dayaftertomorowDatePass_plus2day = date('Y-m-d', strtotime($todayDatePass . ' + 5 days'));
        //  echo"<pre>";print_r($users);exit;
		$_ac_schedule_week_id = date('W');
        $schedule_week_id = ( $_ac_schedule_week_id % 2 == 0 ) ? "2" : "1" ; 
        return array(
			'schedule_week_id' => $schedule_week_id,
            'backupfile' => $backupfile,
            'todayDatePass' => $todayDatePass,
            'nextDatePass' => $nextDatePass,
            'tomorowDatePass' => $tomorowDatePass,
            'dayaftertomorowDatePass' => $dayaftertomorowDatePass,
            'dayaftertomorowDatePass_plus1day' => $dayaftertomorowDatePass_plus1day,
            'dayaftertomorowDatePass_plus2day' => $dayaftertomorowDatePass_plus2day,
            'statstics' => $statstics,
             'users' => NULL, 
             'user_role_id' => 3, 
            'orders' => NULL);
    }

    /**
     * @Route("/assignautomaticmeal")
     * @Template()
     */
    public function assignautomaticmealAction(Request $req) {
        // get Orders 
        $date = $req->request->get('datepass');
        $day_name = date('l', strtotime($date));
        $meal_day = date('D', strtotime($date));
       
        //$week_id = $this->weekOfMonth(strtotime($date)) ;		
        $_ac_schedule_week_id = date('W', strtotime($date));
        $week_id = ( $_ac_schedule_week_id % 2 == 0 ) ? "2" : "1" ; 
		
        $week_pass_id = 'week2,week4' ; 
        if($week_id == '1' || $week_id == '3' || $week_id == '5'){
            $week_pass_id = 'week1,week3,week5' ; 
        }
        if($week_id == '2' || $week_id == '4'){
            $week_pass_id = 'week2,week4' ; 
        }
        $day_id = $assigncnt = 0;
        $dayInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Daysmaster")->findOneBy(array("days_name" => $day_name, "is_deleted" => 0));
        if ($dayInfo) {
            $day_id = $dayInfo->getDays_master_id();
        }
        $em = $this->getDoctrine()->getManager();
       // $orderQuery = "SELECT order_master_id,package_id,order_by,sub_package_id FROM `order_master` WHERE `order_status` = 'success' AND `start_date` <= '" . $date . "' AND `end_date` >= '" . $date . "' AND `is_deleted` = 0 and order_master_id NOT IN (SELECT order_id FROM `order_off_days_relation` WHERE `off_day` = " . $day_id . " AND `is_deleted` = 0) and order_master_id NOT IN (SELECT order_master_id FROM `order_meal_relation` where requested_datetime = '" . $date . "' and is_deleted = 0) aND order_master_id NOT IN (SELECT order_id FROM `freeze_subpackage` where start_date<= '" . $date . "' and end_date >='" . $date . "' and is_deleted = 0 )  and order_master_id NOT IN (SELECT order_master_id FROM `order_meal_relation` WHERE `requested_datetime` = '" . $date . "' AND `is_deleted` = 0 ) ORDER BY `order_master_id` ASC";
         $orderQuery = "SELECT order_master_id,package_id,order_by,sub_package_id FROM `order_master` WHERE `order_status` = 'success' AND `start_date` <= '" . $date . "' AND `end_date` >= '" . $date . "' AND `is_deleted` = 0 and order_master_id NOT IN ( SELECT order_id FROM `order_off_days_relation` WHERE `off_day` = " . $day_id . " AND `is_deleted` = 0) and order_master_id NOT IN (SELECT order_master_id FROM `order_meal_relation` where requested_datetime = '" . $date . "' and is_deleted = 0) aND order_master_id NOT IN (SELECT order_id FROM `freeze_subpackage` where start_date<= '" . $date . "' and end_date >='" . $date . "' and is_deleted = 0 )  and order_master_id NOT IN (SELECT order_master_id FROM `order_meal_relation` WHERE `requested_datetime` = '" . $date . "' AND `is_deleted` = 0 ) and order_master_id NOT IN ( SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date_by_update >= '{$date}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date >= '{$date}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' )) )   ORDER BY `order_master_id` ASC";

        $orderList = $this->fireQuery($orderQuery);
        if ($orderList) {

            foreach ($orderList as $orderkey => $orderval) {
                $package_id = $orderval['package_id'];
                $user_id = $orderval['order_by'];
                $order_id = $orderval['order_master_id'];
                $sub_package_id = $orderval['sub_package_id'];
                $package_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->find($package_id);
                $package_grms = 0;
                if ($package_info) {
                    $package_grms = $package_info->getPackage_grams();
                }
                $order_meal_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findOneBy(array("order_master_id" => $order_id, "requested_datetime" => $date, "is_deleted" => 0));
                if ($order_meal_relation) {
                    
                } else {
                    $assign_driver = 0;
                    $st = 'ordered';
                    $unique_no = $this->getUniqueCode();
                    // get meal driver assigne d or not
                    $check_ordermeal_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(array("is_deleted" => 0, "order_master_id" => $order_id));
                    if ($check_ordermeal_relation) {
                        foreach ($check_ordermeal_relation as $chkey => $chkval) {
                            if ($chkval->getAssign_driver_id() != 0) {
                                $assign_driver = $chkval->getAssign_driver_id();
                                $st = 'driver_assigned';
                                break;
                            }
                        }
                    }
                    if ($check_ordermeal_relation) {
                        foreach ($check_ordermeal_relation as $chkey => $chkval) {
                            if ($chkval->getAssign_driver_id() == 0) {
                                $chkval->setAssign_driver_id($assign_driver);
                                $chkval->setStatus($st);
                                $em->flush();
                            }
                        }
                    }
                    $new_meal = new Ordermealrelation();
                    $new_meal->setOrder_master_id($order_id);
                    $new_meal->setUnique_no($unique_no);
                    $new_meal->setUser_id($user_id);
                    $new_meal->setMeal_day(strtolower($meal_day));
                    $new_meal->setCreated_datetime(date('Y-m-d H:i:s'));
                    $new_meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                    $new_meal->setRequested_datetime($date);
                    $new_meal->setAssign_driver_id($assign_driver);
                    $new_meal->setStatus($st);
                    $new_meal->setNot_delivered_reason(0);
                    $new_meal->setLat(0);
                    $new_meal->setLang(0);
                    $new_meal->setIs_deleted(0);
                    $em->persist($new_meal);
                    $em->flush();
                    $order_meal_relation_id = $new_meal->getOrder_meal_relation_id();

                    $assigncnt++;
                    // get Default meal Values of that Sub Package id 
                    $sub_packagedefault_values = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagedefaultvalues")->findBy(array("is_deleted" => 0, "sub_package_id" => $sub_package_id, "day_id" => $day_id, "default_value_flag" => "default","week_id"=>$week_pass_id));
                    // Check User have upgraded PAckahe Grams Or not 
                    $getUpgradeGramVlauesQuery = "SELECT  sum(package_gram) as package_gram FROM `order_package_gram_relation` where order_id = '".$order_id."' and gram_added_flag = 'upgrade' and order_packagegram_upgrade_history_id IN (SELECT order_packagegram_upgrade_history_id  FROM `order_packagegram_upgrade_history` WHERE `order_id` = ".$order_id." AND `is_deleted` = 0 and status = 'paid' and payment_status = 'success' and added_flag = 'upgrade') and start_from_date <= '".$date."'";
                    $getUpgradeGramValues = $this->fireQuery($getUpgradeGramVlauesQuery);
                    $getUpgradeGramValues = $getUpgradeGramValues[0]['package_gram'];
                    if($getUpgradeGramValues == NULL || $getUpgradeGramValues == 0 || $getUpgradeGramValues == "" || empty($getUpgradeGramValues)){
                        
                    }
                    else{
                      $package_grms = $package_grms + $getUpgradeGramValues ;
                    }
                    
                    if ($sub_packagedefault_values) {
                        foreach ($sub_packagedefault_values as $subdval) {
                            // check product have Protien and Carb or not 
                            $pro_carb_flag = 'false';
                            $sql_combo_display = "select * from product_combo_display_relation where is_deleted = '0' and combo_type='prot_carb' and product_id = '" . $subdval->getMeal_value() . "'  ";
                            $combo_display = $this->fireQuery($sql_combo_display);
                            if ($combo_display) {
                                $pro_carb_flag = 'true';
                            }
                            $calory = 0 ;
                            $newMeal = new Mealproductrelation();
                            $newMeal->setMain_product_id($subdval->getMeal_value());
                            if ($pro_carb_flag == 'false') {
                                $newMeal->setProteins_amount(0);
                                $newMeal->setCarbs_amount(0);
                            } else {
                                $newMeal->setProteins_amount($package_grms);
                                $newMeal->setCarbs_amount($package_grms);
                                // get calory of that product with subpackage Package
                               
                                $product_combination_master_calory = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findOneBy(array("is_deleted"=>0,"sub_pakage_id"=>$sub_package_id,"prot_type"=>"calory","product_master_id"=>$subdval->getMeal_value()));
                                if($product_combination_master_calory){
                                    $calory = $product_combination_master_calory->getProt_crab() ; 
                                }
                                
                            }
                            $newMeal->setCalory($calory);
                            $newMeal->setRaw_eggs(0);
                            $newMeal->setWhite_eggs(0);
                            $newMeal->setMeal_type($subdval->getMeal_type_id());
                            $newMeal->setIs_deleted(0);
                            $newMeal->setMeal_id($order_meal_relation_id);

                            $em->persist($newMeal);
                            $em->flush();
                        }
                    }


                    // Check Order Upgrade or not for this date
                    $check_orderUpgradeInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackageupgradehistory")->findby(array("order_id" => $order_id, "status" => "paid", "payment_status" => "success", "added_flag" => "upgrade", "is_deleted" => 0));
                    if ($check_orderUpgradeInfo) {

                        foreach ($check_orderUpgradeInfo as $ckupg_key => $ckupg_val) {
                           
                            // var_dump($ckupg_val);

                            if ($ckupg_val->getStart_from_date() <= $date) {

                                $Upgradeorder_meal_types_include_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealtypesincluderelation")->findBy(array("order_package_upgrade_history_id" => $ckupg_val->getOrder_package_upgrade_history_id()));

                                if ($Upgradeorder_meal_types_include_relation) {
                                    foreach ($Upgradeorder_meal_types_include_relation as $upgMealKey => $upgMealValue) {
                                        $upgradeMealType = $upgMealValue->getMeal_type();
                                        $upgradeMealTypeCnt = $upgMealValue->getTotal_meal_type();
                                        $upgradeMealAdded = 0;
                                        // get Default meal Values of that Sub Package id 
                                        $upgradesub_packagedefault_values = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagedefaultvalues")->findBy(array("is_deleted" => 0, "sub_package_id" => $sub_package_id, "day_id" => $day_id, "default_value_flag" => "upgrade", "meal_type_id" => $upgradeMealType,"week_id"=>$week_pass_id));
                                        if ($upgradesub_packagedefault_values) {
                                            foreach ($upgradesub_packagedefault_values as $subdval) {
                                                // check product have Protien and Carb or not 
                                                $pro_carb_flag = 'false';
                                                $sql_combo_display = "select * from product_combo_display_relation where is_deleted = '0' and combo_type='prot_carb' and product_id = '" . $subdval->getMeal_value() . "'  ";
                                                $combo_display = $this->fireQuery($sql_combo_display);
                                                if ($combo_display) {
                                                    $pro_carb_flag = 'true';
                                                }
                                                $calory = 0 ;
                                                $newMeal = new Mealproductrelation();
                                                $newMeal->setMain_product_id($subdval->getMeal_value());
                                                if ($pro_carb_flag == 'false') {
                                                    $newMeal->setProteins_amount(0);
                                                    $newMeal->setCarbs_amount(0);
                                                } else {
                                                    $newMeal->setProteins_amount($package_grms);
                                                    $newMeal->setCarbs_amount($package_grms);
                                                    // get calory of that product with subpackage Package
                                                    
                                                    $product_combination_master_calory = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findOneBy(array("is_deleted"=>0,"sub_pakage_id"=>$sub_package_id,"prot_type"=>"calory","product_master_id"=>$subdval->getMeal_value()));
                                                    if($product_combination_master_calory){
                                                        $calory = $product_combination_master_calory->getProt_crab() ; 
                                                    }
                                                   
                                                }
                                                $newMeal->setCalory($calory);
                                                $newMeal->setRaw_eggs(0);
                                                $newMeal->setWhite_eggs(0);
                                                $newMeal->setMeal_type($subdval->getMeal_type_id());
                                                $newMeal->setIs_deleted(0);
                                                $newMeal->setMeal_id($order_meal_relation_id);

                                                $em->persist($newMeal);
                                                $em->flush();

                                                $upgradeMealAdded++;
                                                if ($upgradeMealAdded == $upgradeMealTypeCnt) {
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return new Response(json_encode(array("status" => "done", "count" => $assigncnt)));
        } else {
            return new Response(json_encode(array("status" => "nomeal", "count" => $assigncnt)));
        }
        return new Response(json_encode(array("status" => "notdone", "count" => $assigncnt)));
    }

    public function getUniqueCode() {
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

    /**
     * @Route("/sendnotificationbeforedays")
     * @Template()
     */
    public function sendnotificationbeforedaysAction(Request $req) {
        $day = $req->request->get('day');
        $today_date = date("Y-m-d");
        $param_before_date = date('Y-m-d', strtotime($today_date . ' + ' . $day . ' days'));
        $day_name = date('l', strtotime($param_before_date));
        $day_id = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Daysmaster")->findOneBy(array("days_name" => $day_name, "is_deleted" => 0));
        if ($day_id) {
            $day_id = $day_id->getMain_days_master_id();
        }
        $em = $this->getDoctrine()->getManager();
        $orderQuery = "SELECT order_master_id,package_id,order_by,sub_package_id FROM `order_master` WHERE `order_status` = 'success' AND `start_date` <= '" . $param_before_date . "' AND `end_date` >= '" . $param_before_date . "' AND `is_deleted` = 0 and order_master_id NOT IN (SELECT order_id FROM `order_off_days_relation` WHERE `off_day` = " . $day_id . " AND `is_deleted` = 0) and order_master_id NOT IN (SELECT order_master_id FROM `order_meal_relation` where requested_datetime = '" . $param_before_date . "' and is_deleted = 0) aND order_master_id NOT IN (SELECT order_id FROM `freeze_subpackage` where start_date<= '" . $param_before_date . "' and end_date >='" . $param_before_date . "' and is_deleted = 0 )  and order_master_id NOT IN (SELECT order_master_id FROM `order_meal_relation` WHERE `requested_datetime` = '" . $param_before_date . "' AND `is_deleted` = 0 ) ORDER BY `order_master_id` ASC";
        $orderList = $this->fireQuery($orderQuery);
        $user_array = [];
        if ($orderList) {
            foreach ($orderList as $oval) {
                $user_array[] = $oval['order_by'];
            }
        }
        if (!empty($user_array)) {
            $code = '16';
            $send_to = 'customer'; //$_POST['send_to'];
            $media_id = 'FALSE';
            $detail = "Please fill out your Menu for Date : " . $param_before_date;
            $title_ar = "تذكير: املأ وجباتك";
            $title = "Reminder:Fill Your Meal";
            $detail_ar = "يرجى ملء القائمة الخاصة بك للتاريخ : ".$param_before_date;

            $language_id = 1;

            $general_notification = new Generalnotification();
            $general_notification->setNotification_type('app_alert');
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

            $message = json_encode(array("detail" => $detail, "code" => $code, "response" => $title));
            if (!empty($user_array)) {
                $gcm_regids = $this->find_gcm_regid($user_array);
                if (!empty($gcm_regids)) {
                    if (count($gcm_regids) > 0) {
                        $this->send_notification($gcm_regids, $title, $message, 2, $app_id, $domain_id, "general_notification", $notification_id_send);
                    }
                }
                $apns_regids = $this->find_apns_regid($user_array);
                if (!empty($apns_regids)) {
                    if (count($apns_regids[0]) > 0) {
                        $this->send_notification($apns_regids, $title, $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
                    }
                }
            }

            return new Response(json_encode(array("status" => "done", "count" => count($user_array), "date" => $param_before_date)));
        } else {
            return new Response(json_encode(array("status" => "nomeal", "count" => count($user_array), "date" => $param_before_date)));
        }
    }


    /**
     * @Route("/freezedatewithallusers")
     * @Template()
     */
    public function freezedatewithallusersAction() {
        
        //$frezzedateArray[] = '2020-07-31';
        $frezzedateArray[] = '2020-08-01';
        $frezzedateArray[] = '2020-08-02';
        $frezzedateArray[] = '2020-08-03';
        $frezzedateArray[] = '2020-08-04';
       
       
        $em = $this->getDoctrine()->getManager();
        
        foreach($frezzedateArray as $fkey=>$fval){
            echo "<br><br>====================================================</br><br><br><h2> Date is : " . $fval  . "</h2><br><br>";
            $Freezedate  = $fval ;   //'2020-03-24' ;
            // get day id date('w', strtotime($date));
            $day_name = date('l', strtotime($Freezedate));
            $dayinfo = $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Daysmaster")->findOneBy(array("days_name" => $day_name));
            $day_id = 0 ;
            if($dayinfo){
                $day_id = $dayinfo->getMain_days_master_id(); 
            } 

            if($day_id != 0 ){

                 echo " in IF Day ids : " . $day_id ; 
                 $domain_id = $this->get('session')->get('domain_id');// $queryWithDate = "SELECT * FROM `order_meal_relation` WHERE `requested_datetime` = '".$Freezedate."' AND `is_deleted` = 0" ;
                $queryWithDate = "SELECT * FROM `order_master` WHERE (  end_date >= '2020-07-31' and pause_status = 'no' and start_date <= '2020-07-31')  and order_status = 'success' and is_deleted = 0 and transaction_id != 1  ORDER BY `order_master`.`start_date` ASC";//SELECT * FROM `order_master` WHERE end_date >= '2020-07-31' and order_status = 'success' and is_deleted = 0 and start_date <= '2020-07-31'  and transaction_id != 1  ORDER BY `order_master`.`start_date` DESC" ;
                $listOrderWithdate = $this->fireQuery($queryWithDate);
                if($listOrderWithdate){
                    foreach($listOrderWithdate as $lkey=>$lval){
                         $order_master_id = $lval['order_master_id'];
                        if( strtotime($Freezedate ) >= strtotime($lval['start_date']) )  {
                            $req_date = $Freezedate ;
                           
                            $status = "true";
                             echo " Order ID : " . $order_master_id . "  and Start date : " . $lval['start_date'] . " and end date : ". $lval['end_date'] . '<br>' ;
                            $st = $this->freezeordersubscription($domain_id,$day_id,$req_date,$order_master_id,$status);
                            $order_infoCheck = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Ordermaster')->find($order_master_id);
                              echo " ====> after update , and Start date : " . $order_infoCheck->getStart_date() . " and end date : ". $order_infoCheck->getEnd_date() . "  and Staus is " . $st . '<br>' ;
                        }else{
                            echo " Order ID : " . $order_master_id . " and No need to freeze order start date is " . $lval['start_date'] . '<br>' ;
                        }
                    }
                }
                else{
                    echo "==> order not found" ; 
                }
            }
           
        }
        exit;       
    }

    public function freezeordersubscription($domain_id,$day_id,$req_date,$order_master_id,$status) {
       
       
        $domain_id = $domain_id ;
        $day_id = $day_id;
        $req_date = $req_date;
        $order_master_id = $order_master_id;
        $status = "true"; // if true then add , if false then remove

        $em = $this->getDoctrine()->getManager();
        $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(array("order_master_id" => $order_master_id));

        $package_for = $orderInfo->getPackage_for();
        $sql_pk_days = "select days from package_for_master where is_deleted = 0 and main_package_for_master_id = '$package_for' group by main_package_for_master_id";
        $days = $this->fireQuery($sql_pk_days);
        $dates = null;
        $order_start_date = strtotime($orderInfo->getStart_date());
        $order_end_date = strtotime($orderInfo->getEnd_date());
        // ----------------------------------
        $sql = "SELECT * FROM `order_off_days_relation` WHERE `order_id` = " . $order_master_id . " AND `is_deleted` = 0 ";
        $offDaysList = $this->fireQuery($sql);
        $offDayArray = NULL;
        if ($offDaysList) {
            foreach ($offDaysList as $oval) {
                $offDayArray[] = $oval['off_day'];
            }
        }

        //------pause Dates --------------------------
        
        $PauseDays = [] ;
        $checkPause = $this->firequery("SELECT *  FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE pause_package.`order_id` = " . $order_master_id . "  and pause_package.is_deleted = 0 ");
                
        if ($checkPause) {
            $pauseOnce = true;
            foreach ($checkPause as $_checkPause) {
                if ($_checkPause['resume_choice'] == 'admin'){
                     if($_checkPause['pause_end_date'] == NULL){
                         return new Response('inpausemode');
                     }   
                }
                elseif($_checkPause['resume_choice'] == 'customer'){
                    if($_checkPause['pause_end_date_by_update'] == NULL){
                         return new Response('inpausemode');
                     }       
                }
                
            }
        }
        $pause_days = 0 ;
        if ($checkPause) {
            $pauseOnce = true;
            foreach ($checkPause as $_checkPause) {  
                $pasue_end_date = NULL ; 
                $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause['pause_start_date'] )));
                if ($_checkPause['resume_choice'] == 'admin'){
                     $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause['pause_end_date'] ))); 
                }
                elseif($_checkPause['resume_choice'] == 'customer'){
                    $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause['pause_end_date_by_update'] )));   
                }
                
                $pause_start_date_response = date('Y-m-d', $pause_start_date);
                $pasue_end_date_response = date('Y-m-d', $pasue_end_date);
                while ($pause_start_date <= $pasue_end_date) {
                    $PauseDays [] = date('Y-m-d', $pause_start_date);
                    $pause_days += 1;
                    $pause_start_date = strtotime("+1 day", $pause_start_date);
                }
            }
        }

       
        // get freeze package dates
        $order_suspend_history_sql = "select * from freeze_subpackage where order_id = '$order_master_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";
        $suspendHistory = $this->fireQuery($order_suspend_history_sql);
        $suspend_dates = [];
        $sus_req_date_matchFlag = false;
        if ($suspendHistory) {
            // Fill Suspend_date array
            if ($suspendHistory) {
                foreach ($suspendHistory as $skey => $sval) {
                    $sus_start_date = $loop_sus_date = $sval['start_date'];
                    $loop_sus_date = date("Y-m-d", strtotime($loop_sus_date));
                    $sus_end_date = $sval['end_date'];
                    while ($loop_sus_date <= $sus_end_date) {
                        $suspend_dates[] = $loop_sus_date;
                        $loop_sus_date = date('Y-m-d', strtotime($loop_sus_date . ' + 1 days'));
                    }
                }
            }
            if ($status == "true") {
                if (!in_array($req_date, $suspend_dates)) {
                    $suspend_dates[] = $req_date;
                    $freeze_subpackage = new Freezesubpackage();
                    $freeze_subpackage->setOrder_id($order_master_id);
                    $freeze_subpackage->setSub_package_id($orderInfo->getSub_package_id());
                    $freeze_subpackage->setUser_id($orderInfo->getOrder_by());
                    $freeze_subpackage->setStart_date($req_date);
                    $freeze_subpackage->setEnd_date($req_date);
                    $freeze_subpackage->setCreated_datetime(date("Y-m-d H:i:s"));
                    $freeze_subpackage->setIs_deleted(0);
                    $em->persist($freeze_subpackage);
                    $em->flush();

                    #delete Old Entry Entered Before Suspension.
                    $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                    requested_datetime='" . $req_date . "' and order_master_id ={$order_master_id} ";
                    $connection = $em->getConnection();
                    $stmt = $connection->prepare($sql_update_order_meal_relation);
                    $stmt->execute();
                }
            } else {
                /* for check that re date is start of freeze date range or end of freeze date range ,
                  if found then direct update that freeze_sub_package Record */
                foreach ($suspendHistory as $skey => $sval) {
                    $sus_start_date = date("Y-m-d", strtotime($sval['start_date']));
                    $sus_end_date = date("Y-m-d", strtotime($sval['end_date']));
                    if ($req_date == $sus_start_date && $req_date == $sus_end_date) {
                        $sus_req_date_matchFlag = true;
                        $singleRecordFreezepackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->find($sval['freeze_subpackage_id']);
                        if ($singleRecordFreezepackage) {
                            $singleRecordFreezepackage->setIs_deleted(1);
                            $em->flush();
                            if (($key = array_search($req_date, $suspend_dates)) !== false) {
                                unset($suspend_dates[$key]);
                            }
                            break;
                        }
                    } elseif ($req_date == $sus_start_date) {
                        $sus_req_date_matchFlag = true;
                        $singleRecordFreezepackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->find($sval['freeze_subpackage_id']);
                        if ($singleRecordFreezepackage) {
                            $new_start_date = date('Y-m-d', strtotime($sus_start_date . '+1 days'));
                            $singleRecordFreezepackage->setStart_date($new_start_date);
                            $em->flush();
                            // also remove form array 
                            if (($key = array_search($req_date, $suspend_dates)) !== false) {
                                unset($suspend_dates[$key]);
                            }
                        }
                        break;
                    } elseif ($req_date == $sus_end_date) {
                        $sus_req_date_matchFlag = true;
                        $singleRecordFreezepackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->find($sval['freeze_subpackage_id']);
                        if ($singleRecordFreezepackage) {
                            $new_end_date = date('Y-m-d', strtotime($sus_end_date . '-1 days'));
                            $singleRecordFreezepackage->setEnd_date($new_end_date);
                            $em->flush();
                            // also remove form array 
                            if (($key = array_search($req_date, $suspend_dates)) !== false) {
                                unset($suspend_dates[$key]);
                            }
                        }
                        break;
                    }
                }
                /* If not found that date as strat or end , then check in between range of freeze package record  */
                if ($sus_req_date_matchFlag == false) {
                    foreach ($suspendHistory as $skey => $sval) {
                        $sus_start_date = $sus_start_date1 = date("Y-m-d", strtotime($sval['start_date']));
                        $sus_end_date = $sus_end_date2 = date("Y-m-d", strtotime($sval['end_date']));
                        if ($req_date > $sus_start_date && $req_date < $sus_end_date) {
                            $singleRecordFreezepackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->find($sval['freeze_subpackage_id']);
                            if ($singleRecordFreezepackage) {
                                $singleRecordFreezepackage->setIs_deleted(1);
                                $em->flush();
                            }
                            $sus_end_date1 = date('Y-m-d', strtotime($req_date . '-1 days'));
                            $sus_start_date2 = date('Y-m-d', strtotime($req_date . '+1 days'));
                            $freeze_subpackage = new Freezesubpackage();
                            $freeze_subpackage->setOrder_id($order_master_id);
                            $freeze_subpackage->setSub_package_id($orderInfo->getSub_package_id());
                            $freeze_subpackage->setUser_id($orderInfo->getOrder_by());
                            $freeze_subpackage->setStart_date($sus_start_date1);
                            $freeze_subpackage->setEnd_date($sus_end_date1);
                            $freeze_subpackage->setCreated_datetime(date("Y-m-d H:i:s"));
                            $freeze_subpackage->setIs_deleted(0);
                            $em->persist($freeze_subpackage);
                            $em->flush();
                            $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                requested_datetime BETWEEN '$sus_start_date1' AND '$sus_end_date1' and order_master_id ={$order_master_id} ";
                            $connection = $em->getConnection();
                            $stmt = $connection->prepare($sql_update_order_meal_relation);
                            $stmt->execute();
                            $freeze_subpackage = new Freezesubpackage();
                            $freeze_subpackage->setOrder_id($order_master_id);
                            $freeze_subpackage->setSub_package_id($orderInfo->getSub_package_id());
                            $freeze_subpackage->setUser_id($orderInfo->getOrder_by());
                            $freeze_subpackage->setStart_date($sus_start_date2);
                            $freeze_subpackage->setEnd_date($sus_end_date2);
                            $freeze_subpackage->setCreated_datetime(date("Y-m-d H:i:s"));
                            $freeze_subpackage->setIs_deleted(0);
                            $em->persist($freeze_subpackage);
                            $em->flush();
                            $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                requested_datetime BETWEEN '$sus_start_date2' AND '$sus_end_date2' and order_master_id ={$order_master_id} ";
                            $connection = $em->getConnection();
                            $stmt = $connection->prepare($sql_update_order_meal_relation);
                            $stmt->execute();
                            if (($key = array_search($req_date, $suspend_dates)) !== false) {
                                unset($suspend_dates[$key]);
                            }
                            $sus_req_date_matchFlag = true;
                            break;
                        }
                    }
                }
            }
        } else {
            if ($status == "true") {
                $suspend_dates[] = $req_date;
                $freeze_subpackage = new Freezesubpackage();
                $freeze_subpackage->setOrder_id($order_master_id);
                $freeze_subpackage->setSub_package_id($orderInfo->getSub_package_id());
                $freeze_subpackage->setUser_id($orderInfo->getOrder_by());
                $freeze_subpackage->setStart_date($req_date);
                $freeze_subpackage->setEnd_date($req_date);
                $freeze_subpackage->setCreated_datetime(date("Y-m-d H:i:s"));
                $freeze_subpackage->setIs_deleted(0);
                $em->persist($freeze_subpackage);
                $em->flush();
                #delete Old Entry Entered Before Suspension.
                $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                requested_datetime='" . $req_date . "' and order_master_id ={$order_master_id} ";
                $connection = $em->getConnection();
                $stmt = $connection->prepare($sql_update_order_meal_relation);
                $stmt->execute();
            }
        }

       
        $end_date = date('Y-m-d', $order_end_date);
        if ($days) {

            $pk_days = $days[0]['days'];
          //  $order_end_date = strtotime("+$pk_days days", $order_start_date);
            $todayCheckDate = strtotime(date("Y-m-d"));
            $passedWorkingdays = 0 ; 
            $updated_end_datewill_be = $order_end_date;
          
            for($i = 0 ; $i < 1 ; ){                    
                $newUpdated_order_end_date = strtotime("+1 days", $updated_end_datewill_be);              
                if (!in_array(date('N', $newUpdated_order_end_date), $offDayArray)  && !in_array(date("Y-m-d", $newUpdated_order_end_date), $suspend_dates ) && !in_array(date("Y-m-d", $newUpdated_order_end_date), $PauseDays )   ){
                   $i++ ; 
                }
                else{                       
                    if($i == 0 ){
                    }
                    else{
                    }
                }              
                $updated_end_datewill_be = $newUpdated_order_end_date ; 
                //echo "<br> new date will be : " . $newUpdated_order_end_date ;
            }
            $end_date = date("Y-m-d",$updated_end_datewill_be) ;           
        }
       
        $orderInfo->setEnd_date($end_date);
        $em->flush();
        $em->flush();
        return new Response('done');
    }

    /**
     * @Route("/expirepackageofalluser")
     * @Template()
     */
    public function expirepackageofalluserAction() {
        $em = $this->getDoctrine()->getManager();
        $expire_after_this_date  = '2020-03-27' ;
        $day_id = 2;
        $domain_id = $this->get('session')->get('domain_id');
        $query ="SELECT * FROM `order_master` where package_id IN (SELECT main_package_master_id FROM `package_master` WHERE `festival_affect` = 'yes' AND `package_type` = 'normal' AND `is_deleted` = 0 GROUP by main_package_master_id ) and end_date >= '".$expire_after_this_date."' and order_status = 'success' and order_master_id = 6979 ";
        $order_list = $this->fireQuery($query);
        if($order_list){
            foreach($order_list as $okey=>$oval){
               
                $order_master_id = $oval['order_master_id'];
                $offDaysDates = [];
                $totalDaysDateArray = [];
                $passed_days_dateArray = [];
                $order_start_date = strtotime($oval['start_date']);
                $order_end_date = strtotime($oval['end_date']) ;

                $sql = "SELECT days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                        JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                        where order_off_days_relation.is_deleted = 0 and order_id = " . $oval['order_master_id'] . " group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysArray = array();
                $total_off_days = 0;
                $day_passed = 0;
                $today = strtotime($expire_after_this_date);

                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray [] = $_offDays['main_days_master_id'];
                    }
                }
                 $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $oval['order_master_id'],
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

                            $freezeDays [] = date('Y-m-d', $supend_start_date);
                            $suspesion_days += 1;

                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
                    }
                }
                $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $oval['order_master_id'],
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

                        $pause_start_date_response = date('Y-m-d', $pause_start_date);
                        $pasue_end_date_response = date('Y-m-d', $pasue_end_date);

                        while ($pause_start_date <= $pasue_end_date) {

                            $PauseDays [] = date('Y-m-d', $pause_start_date);
                            $pause_days += 1;

                            $pause_start_date = strtotime("+1 day", $pause_start_date);
                        }
                    }
                }
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
                   
                    if (in_array($tdval, $offDaysDates)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if (in_array($tdval, $freezeDays)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if (in_array($tdval, $PauseDays)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                     if (in_array($tdval, $passed_days_dateArray)) {
                      //  unset($totalDaysDateArray[$tdkey]);
                    }
                }
                $packageTotalDaysCount = count($totalDaysDateArray);

                foreach ($totalDaysDateArray as $tdkey => $tdval) {                   
                    
                     if (in_array($tdval, $passed_days_dateArray)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                }
                $Samplepassed_days_dateArray = $passed_days_dateArray ;
                foreach ($Samplepassed_days_dateArray as $tdkey => $tdval) {                   
                    
                    if (in_array($tdval, $offDaysDates)) {
                        unset($Samplepassed_days_dateArray[$tdkey]);
                    }
                    if (in_array($tdval, $freezeDays)) {
                        unset($Samplepassed_days_dateArray[$tdkey]);
                    }
                    
                }
                
                
                $passed_days_cnt = count($Samplepassed_days_dateArray);
                $remaining_days = count($totalDaysDateArray);
                var_dump($oval);
                var_dump($remaining_days);
                var_dump($Samplepassed_days_dateArray);
              
           
                var_dump($totalDaysDateArray);
              
                $actual_paid_amount = $oval['payment_amount'];
                var_dump($actual_paid_amount);
                $amount_onExpiry_withThis_date = ($actual_paid_amount / $packageTotalDaysCount ) * ( $packageTotalDaysCount - $passed_days_cnt ) ;
                var_dump($amount_onExpiry_withThis_date);

               // $order_end_date_after_expire =  date('Y-m-d', strtotime($expire_after_this_date. ' + 1 days'));
                $order_end_date_after_expire =  $expire_after_this_date;


                $order_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_master_id);
                if($order_info){
                    $order_info->setEnd_date(date('Y-m-d', strtotime($expire_after_this_date. '-1 days')));
                    $em->flush();

                    $wallet_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("is_deleted"=>0,"user_master_id"=>$order_info->getCreated_by()));
                    if($wallet_info){
                        $previous_wallet_amount = $wallet_info->getWallet_amount() ; 
                        $wallet_info->setWallet_amount($previous_wallet_amount + $amount_onExpiry_withThis_date);
                        $wallet_info->setWallet_last_updated(date("Y-m-d H:i:s"));
                        $em->flush();

                        $wallet_transaction_history = new Wallettransactionhistory();
                        $wallet_transaction_history->setWallet_master_id($wallet_info->getWallet_master_id());
                        $wallet_transaction_history->setUser_master_id($wallet_info->getUser_master_id());
                        $wallet_transaction_history->setWallet_action('plus');
                        $wallet_transaction_history->setPrevious_amount($previous_wallet_amount);
                        $wallet_transaction_history->setAfter_action_amount($previous_wallet_amount + $amount_onExpiry_withThis_date);
                        $wallet_transaction_history->setTransaction_amount($amount_onExpiry_withThis_date);
                        $wallet_transaction_history->setAction_created_datetime(date("Y-m-d H:i:s"));
                        $wallet_transaction_history->setIs_deleted(0);
                        $em->persist($wallet_transaction_history);
                        $em->flush();

                        // Delete Order meal Relation 

                        $order_meal_relation_deleteQuery = "SELECT * FROM `order_meal_relation` WHERE `order_master_id` = ".$order_master_id." and requested_datetime >= '".$order_end_date_after_expire."' and is_deleted = 0 ";
                        $order_meal_relation_deleteList = $this->firequery($order_meal_relation_deleteQuery);
                        if($order_meal_relation_deleteList){
                            foreach($order_meal_relation_deleteList as $odkey=>$odval){
                                $ordermeal_relationInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->find($odval['order_meal_relation_id']);
                                if($ordermeal_relationInfo){
                                    $ordermeal_relationInfo->setIs_deleted(1);
                                    $em->flush();
                                }
                            }
                        }

                    }
                }

                exit;
            }
        }
       
        exit;       
    }


}
