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
use AdminBundle\Entity\Countrymaster;
use AdminBundle\Entity\Productcategorymaster;
use AdminBundle\Entity\Mealproductrelation;
use AdminBundle\Entity\Ordermealrelation;
use AdminBundle\Entity\Orderingredientrelation;
use AdminBundle\Entity\Orderallergyrelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Freezesubpackage;
use AdminBundle\Entity\Generalnotification;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Remainingdaysorderwise;
use AdminBundle\Entity\Addedextradaysorder;

class OrdersController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();
    }

    /**
     * @Route("/freezeFromAdmin")
     * @Template()
     */
    public function freezeFromAdminAction(Request $req) {
        $start_date = date('Y-m-d', strtotime($req->request->get('start_date')));
        $end_date = date('Y-m-d', strtotime($req->request->get('end_date')));
        $order_id = $req->request->get('order_id');

        $em = $this->getDoctrine()->getManager();

        $orderMaster = $em->getRepository("AdminBundle:Ordermaster")->findOneBy([
            "order_master_id" => $order_id
        ]);

        if ($orderMaster) {

            $user_id = $orderMaster->getOrder_by();
            $order_start_date = $orderMaster->getStart_date();
            $order_end_date = $orderMaster->getEnd_date();
            $sql_all_order = "select start_date,end_date from order_master
                            where order_status = 'success' and order_by = '$user_id' and is_deleted = 0 and order_master_id != '$order_id' and
                            ((start_date BETWEEN '$start_date' AND '$end_date' OR end_date BETWEEN '$start_date' AND '$end_date')
                            OR (start_date <= '$start_date' AND end_date >= '$end_date'))";
            $orders_of_users = $this->firequery($sql_all_order);

            if (!empty($orders_of_users)) {

                $this->get('session')->getFlashBag()->set("error_msg", "Order for this date of user Allready Existed.");
                return $this->redirect($req->headers->get('referer'));
            }

            $sql_date_validation = "select start_date from order_master where start_date <= '$start_date' and end_date >= '$start_date' and order_master_id = '$order_id'";

            $dateValidationData = $this->firequery($sql_date_validation);


            if (empty($dateValidationData)) {

                $this->get('session')->getFlashBag()->set("error_msg", "Please Enter Valide date to suspend Order.");
                return $this->redirect($req->headers->get('referer'));
            }


            $sql_suspension_days = "select start_date,end_date from freeze_subpackage
                                    where order_id = '$order_id' and is_deleted = 0 and (
                                (start_date BETWEEN '$start_date' AND '$end_date'
                                OR end_date BETWEEN '$start_date' AND '$end_date')
                                OR (start_date <= '$start_date' AND end_date >= '$end_date'))
                                ";
            $suspnesion_days = $this->firequery($sql_suspension_days);

            if (!empty($suspnesion_days)) {
                $this->get('session')->getFlashBag()->set("error_msg", "Order Has Been Allready Freeze in given Dates.");
                return $this->redirect($req->headers->get('referer'));
            }

            $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                    JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                    where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

            $offDays = $this->fireQuery($sql);

            $offDaysArray = null;
            if ($offDays) {
                foreach ($offDays as $_offDays) {
                    $offDaysArray [] = $_offDays['main_days_master_id'];
                }
            }

            $start_date = strtotime($start_date);
            $end_date = strtotime($end_date);

            $given_start_date = $start_date;
            $given_end_date = $end_date;

            $totalWorkingDays = 0;

           $checkPause = $this->firequery("SELECT *  FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE pause_package.`order_id` = " . $order_master_id . "  and pause_package.is_deleted = 0 ");
                
            if ($checkPause) {
                $pauseOnce = true;
                foreach ($checkPause as $_checkPause) {
                    if ($_checkPause['resume_choice'] == 'admin'){
                         if($_checkPause['pause_end_date'] == NULL){
                             $this->get('session')->getFlashBag()->set("error_msg", "Order already in Pause mode.");
                            return $this->redirect($req->headers->get('referer'));
                         }   
                    }
                    elseif($_checkPause['resume_choice'] == 'customer'){
                        if($_checkPause['pause_end_date_by_update'] == NULL){
                             $this->get('session')->getFlashBag()->set("error_msg", "Order already in Pause mode.");
                            return $this->redirect($req->headers->get('referer'));
                         }       
                    }
                    
                }
            }
            $PauseDays =  [] ;
            $pause_days = 0;
            $day_passed = 0;
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
            if (!empty($offDaysArray) || !empty($PauseDays)) {
                while ($given_start_date <= $given_end_date) { //                   $dates [] = date('Y-m-d',$given_start_date);
                    //if (!in_array(date('N', $given_start_date), $offDaysArray) && date('N', $given_start_date) != 5) {
                    if (!in_array(date('N', $given_start_date), $offDaysArray) &&  !in_array(date('Y-m-d', $given_start_date), $PauseDays) ) {
                        $totalWorkingDays += 1;
                    }
                    $given_start_date = strtotime("+1 days", $given_start_date);
                }
            }

            $freeze_subpackage = new Freezesubpackage();
            $freeze_subpackage->setSub_package_id($orderMaster->getSub_package_id());
            $freeze_subpackage->setUser_id($orderMaster->getOrder_by());
            $freeze_subpackage->setOrder_id($order_id);
            $freeze_subpackage->setStart_date(date('Y-m-d H:i:s', $start_date));
            $freeze_subpackage->setEnd_date(date('Y-m-d H:i:s', $end_date));
            $freeze_subpackage->setCreated_datetime(date('Y-m-d H:i:s'));
            $freeze_subpackage->setIs_deleted(0);

            $em->persist($freeze_subpackage);
            $em->flush();

            if ($freeze_subpackage) {
                $start_date_read = date('Y-m-d H:i:s', $start_date);
                $end_date_read = date('Y-m-d H:i:s', $end_date);
                #delete Old Entry Entered Before Suspension.
                $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                requested_datetime BETWEEN '$start_date_read' AND '$end_date_read' and order_master_id ={$order_id} ";
                $connection = $em->getConnection();
                $stmt = $connection->prepare($sql_update_order_meal_relation);
                $stmt->execute();
            }

            $order_end_date = strtotime($orderMaster->getEnd_date());

            if (!empty($totalWorkingDays)) {

                while ($totalWorkingDays > 0) {
                    $order_end_date = strtotime("+1 days", $order_end_date);

                    //if (!in_array(date('N', $order_end_date), $offDaysArray) && date('N', $order_end_date) != 5) 
                    if (!in_array(date('N', $order_end_date), $offDaysArray) ) 
                    {

                        $totalWorkingDays = $totalWorkingDays - 1;
                    }
                }
            }

            $orderMaster->setEnd_date(date('Y-m-d', $order_end_date));
            $em->flush();

            $this->get('session')->getFlashBag()->set("success_msg", "Order Has Been Freezed in given Dates.");
            return $this->redirect($req->headers->get('referer'));
        }
    }

    /**
     * @Route("/orders/list/{status}",defaults={"status"="Active"})
     * @Template()
     */
    public function indexAction($status) {

        $products_all = null;
       // $status = !empty($req->request->get('status')) ? $req->request->get('status') : 'Active';

        $sql = "select * from product_category_master where is_deleted = 0 group by main_product_category_master_id";
        $meal_cat_all = null; // $this->fireQuery($sql);

        $languages = $this->getLanguages();
        $sql = "SELECT main_product_category_id,main_product_master_id,max_meal_value,product_image,product_status, product_category_name from product_master, product_category_master cat where cat.main_product_category_master_id = main_product_category_id and cat.is_deleted = 0 and product_master.is_deleted = '0' group by main_product_master_id";
        $main_product = NULL ; // $this->fireQuery($sql);
        $products = null;

        if (!empty($main_product)) {
            foreach ($main_product as $product_) {
                $lang_wise = null;
                $lang_name = '';
                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select product_name,language_id from product_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and main_product_master_id = '" . $product_['main_product_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_name = $lang_goal[0]['product_name'] . " /";
                            $lang_wise[] = array('product_name' => $lang_goal[0]['product_name'], 'lang_id' => $lang->getLanguage_master_id());
                        } else {
                            $lang_wise[] = array('product_name' => '-', 'lang_id' => $lang->getLanguage_master_id());
                        }
                    }
                }

                $products_all[] = array(
                    'main_product_master_id' => $product_['main_product_master_id'],
                    'product_max_meal_value' => $product_['max_meal_value'],
                    'product_status' => $product_['product_status'],
                    'lang_wise' => $lang_wise,
                    'lang_name' => trim($lang_name, '/'),
                    'meal_type_id' => $product_['main_product_category_id'],
                    'product_category_name' => $product_['product_category_name'],
                );
            }
        }

        $order_data = null;
        $today = strtotime(date('Y-m-d 00:00:00'));
        $_today = date('Y-m-d');

        if (in_array($status, array('Active', 'Expired'))) {
            $where_clause = "AND end_date < '{$_today}'";
            if ($status == 'Active') {
                $where_clause = "AND (  ( end_date >= '{$_today}' and pause_status='no' ) or (pause_status = 'yes')  ) ";
            }
            else{
                $where_clause = "AND (  end_date < '{$_today}'  and pause_status='no'  ) "; 
            }

            $order_list_sql = "SELECT
            order_master.order_master_id,order_master.transaction_id,order_master.order_status,order_master.start_date,order_master.end_date,order_master.unique_no, RIGHT(CONCAT('000', unique_user_id),4) as unique_user_id_with_zero ,  user_master.user_firstname,user_master.user_lastname,user_master.unique_user_id,package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name,transcation_master.transaction_code
            from order_master
            JOIN user_master ON user_master.user_master_id = order_master.order_by
            JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
            JOIN package_master ON package_master.main_package_master_id = order_master.package_id
            LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
            where order_master.is_deleted = 0 and order_status != 'pending'
            {$where_clause}
            group by order_master.order_master_id order by order_master.created_date DESC";
        } else {
            $order_list_sql = "SELECT
            order_master.order_master_id,order_master.transaction_id,order_master.order_status,order_master.start_date,order_master.end_date,order_master.unique_no, RIGHT(CONCAT('000', unique_user_id),4) as unique_user_id_with_zero ,
            user_master.user_firstname,user_master.user_lastname,user_master.unique_user_id,package_master.package_name,package_master.package_grams,pk_for.name as pk_for_name,transcation_master.transaction_code
            from order_master
            JOIN user_master ON user_master.user_master_id = order_master.order_by
            JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
            JOIN package_master ON package_master.main_package_master_id = order_master.package_id
            LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
            where order_master.is_deleted = 0 and order_status != 'pending' group by order_master.order_master_id order by order_master.created_date DESC";
        }
       // echo $order_list_sql ; exit;

        $orders =  NULL ;// $this->fireQuery($order_list_sql);

        if (!empty($orders)) {
            $loopCount = 0;
            foreach ($orders as $key => $value) {
                $offDaysArray = array();
                #changes

                $sub_package_details_grams = 0;
                $main_sub_package_id = 0;
                $sql_get_package_details = "SELECT sub_package_master.grams,main_sub_package_id from order_master
                     JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id where order_master_id = '" . $value['order_master_id'] . "'  group by order_master_id ";
                $sub_package_details = $this->fireQuery($sql_get_package_details);
                $grams = '';
                if (!empty($sub_package_details)) {
                    $grams = $sub_package_details_grams = $sub_package_details[0]['grams'];
                    $main_sub_package_id = $sub_package_details[0]['main_sub_package_id'];
                }

                $value['grams'] = $grams;
                $value['unique_user_id'] =  $value['unique_user_id_with_zero'] ;
                $value['main_sub_package_id'] = $main_sub_package_id;
                $value['sub_package_details_grams'] = $sub_package_details_grams;

                #changes

                if ($value['transaction_id'] != 0) {
                    $payment_status = 'success';
                } else {
                    $payment_status = 'pending';
                }

                $value['payment_status'] = $payment_status;
                $order_start_date = strtotime($value['start_date']);
                $order_end_date = strtotime($value['end_date']);

                $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;
                $sql = "SELECT days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                        JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                        where order_off_days_relation.is_deleted = 0 and order_id = " . $value['order_master_id'] . " group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysArray = array();
                $total_off_days = 0;
                $day_passed = 0;
                $today = strtotime(date('Y-m-d'));

                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray [] = $_offDays['main_days_master_id'];
                    }
                }

                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $value['order_master_id'],
                            "is_deleted" => 0
                        )
                );
                $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $value['order_master_id'],
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
                $freezeDays = $PauseDays =  [];

                $suspesion_days = $pause_days = 0;
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
                $PauseDays =  [] ;
                $pause_days = 0;
                $updateRemaining_daysFlag = false ; 
                $remaining_days_of_pause = NULL ;
                $currentDate = date("Y-m-d");
                $resume_choice = NULL ;
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
                        $pause_package_history =  $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->findOneBy(array("pause_package_history_id"=>$_checkPause->getPause_package_history_id() ));
                        $resume_choice = NULL ;
                        $remaining_days_of_pause = $_checkPause->getRemaining_working_days_after_pause() ;
                        if($pause_package_history){
                          $resume_choice = $pause_package_history->getResume_choice();
                        }
                        if($resume_choice == 'admin'){
                          if($pppval->getPause_end_date()  != NULL  ){
                            
                          }
                          else if($pppval->getPause_end_date()  == NULL  ){
                            
                            $updateRemaining_daysFlag = true ; 
                          }
                        }
                        else if($resume_choice == 'customer'){

                          if($_checkPause->getPause_end_date()  != NULL && $_checkPause->getPause_end_date_by_update() == NULL ){
                            
                            $updateRemaining_daysFlag = true ; 
                          }
                          else if($_checkPause->getPause_end_date()  != NULL && $_checkPause->getPause_end_date_by_update() != NULL ){
                            
                          }
                          else if($_checkPause->getPause_end_date()  == NULL && $_checkPause->getPause_end_date_by_update() == NULL ){
                            
                            $updateRemaining_daysFlag = true ; 
                          }
                        }
                    }
                }
                $offDaysDates = [];
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
                if($updateRemaining_daysFlag == true){
                      $remaining_days =  $remaining_days_of_pause ;
                }                
                $value['remaining_days'] = $remaining_days; 
                $order_data [] = $value;
                $loopCount++;
            }
        }

        return array('orders' => $order_data,
            'meal_cat_all' => $meal_cat_all,
        // 'products_all' => $products_all,
          'status' => $status);
    }

    /**
     * @Route("/orders/ajaxlist/{status}",defaults={"status"="Active"})
     * @Template()
     */
    public function ajaxlistAction($status) {


        $search_value = '';
        if (array_key_exists('search', $_REQUEST)) {
            $search_value = $_REQUEST['search']['value'];
        }


        $_orderBy = '';
        if (array_key_exists('user', $_REQUEST)) {
            $column = $_REQUEST['user'][0]['column'];
            $dir = $_REQUEST['user'][0]['dir'];
            if ($column == 1) {
                $_orderBy = " ORDER BY order_master.unique_no {$dir}";
            } else if ($column == 2) {
                $_orderBy = " ORDER BY CONCAT ( user_master.user_firstname,user_master.user_lastname) {$dir}";
            } else if ($column == 3) {
                $_orderBy = " ORDER BY package_master.package_name {$dir}";
            } else if ($column == 4) {
                $_orderBy = " ORDER BY user_master.user_mobile {$dir}";
            } else if ($column == 8) {
                $_orderBy = " ORDER BY transcation_master.transaction_code {$dir}";
            } 
        }
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
        $limit_sql = "LIMIT " . $_REQUEST['start'] . "," . $_REQUEST['length'];
        $products_all = null;
        //$status = 'Active';//!empty($req->request->get('status')) ? $req->request->get('status') : 'Active';

        $sql = "select * from product_category_master where is_deleted = 0 group by main_product_category_master_id";
        $meal_cat_all = $this->fireQuery($sql);

        $languages = $this->getLanguages();
        

        $order_data = null;
        $today = strtotime(date('Y-m-d 00:00:00'));
        $_today = date('Y-m-d');


        
       // $where_clause = "AND end_date < '{$_today}'";
        //if ($status == 'Active') {
            $where_clause = "" ; // AND end_date >= '{$_today}'";


             //$where_clause = "AND end_date < '{$_today}'";
            if ($status == 'Active') {
                $where_clause = " and order_status != 'cancel'  AND (  ( end_date >= '{$_today}' and pause_status='no' )   ) "; // or (pause_status = 'yes')
            }
            else if($status == 'Expire') {
                $where_clause = "and order_status != 'cancel'  AND (  end_date < '{$_today}'  and pause_status='no'  ) "; 
            }
            else if($status == 'Pause') {
                $where_clause = " and order_status != 'cancel' and order_master_id  IN (SELECT pause_package.order_id FROM `pause_package` JOIN pause_package_history ON pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE ( ( pause_package_history.resume_choice = 'admin' AND pause_package.pause_start_date <= '{$_today}' AND( pause_package.pause_end_date >= '{$_today}' OR pause_package.pause_end_date IS NULL ) ) OR ( pause_package_history.resume_choice = 'customer' AND pause_package.pause_start_date <= '{$_today}' AND( pause_package.pause_end_date_by_update >= '{$_today}' OR pause_package.pause_end_date_by_update IS NULL ) ) ) AND pause_package.is_deleted = 0) "; 
            }
            else if($status == 'cancel') {
                $where_clause = " and order_status = 'cancel'"; 
            }
        //}
        if ($search_value != '') {
            $date_search_value = date("Y-m-d",strtotime($search_value));
            if( $date_search_value  == '1970-01-01'){
                $date_search_value   = $search_value;
            }
            $order_list_sql = "SELECT
            order_master.order_master_id,order_master.transaction_id,order_master.order_status,order_master.start_date,order_master.end_date,order_master.unique_no,  RIGHT(CONCAT('000', unique_user_id),4) as unique_user_id_with_zero  ,user_master.user_mobile,
            user_master.user_firstname,user_master.user_lastname,package_master.package_name,package_master.package_grams,sub.grams,pk_for.name as pk_for_name,transcation_master.transaction_code
            from order_master
            JOIN user_master ON user_master.user_master_id = order_master.order_by
            JOIN sub_package_master sub ON sub.main_sub_package_id = order_master.sub_package_id
            JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
            JOIN package_master ON package_master.main_package_master_id = order_master.package_id
            LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
            where order_master.is_deleted = 0 and package_master.language_id=1 and order_status != 'pending'
            {$where_clause}
             " ;
             $order_list_sql .= " AND "
                    . "(order_master.unique_no like '%{$search_value}%' or "
                    . "package_master.package_name like '%{$search_value}%' or "
                    . "package_master.package_grams like '%{$search_value}%' or "
                    . "sub.grams like '%{$search_value}%' or "
                    . "user_master.user_firstname like '%{$search_value}%' or "
                    . "user_master.user_lastname like '%{$search_value}%' or "
                    . "user_master.user_mobile like '%{$search_value}%' or "
                    . "transcation_master.transaction_code like '%{$search_value}%' or "
                    . "order_master.order_status like '%{$search_value}%' or "
                    . "order_master.start_date like '%{$date_search_value}%' or "
                    . "order_master.end_date like '%{$date_search_value}%'  "                    
                    . "or CONCAT ( user_master.user_firstname,' ' ,user_master.user_lastname ) like '%{$search_value}%'  ) group by order_master.order_master_id order by order_master.created_date DESC {$limit_sql}";
//echo $order_list_sql ;exit;
            $order_total_cnt_sql =  "SELECT
              order_master.order_master_id 
            from order_master
            JOIN user_master ON user_master.user_master_id = order_master.order_by
            JOIN sub_package_master sub ON sub.main_sub_package_id = order_master.sub_package_id
            JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
            JOIN package_master ON package_master.main_package_master_id = order_master.package_id
            LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
            where order_master.is_deleted = 0 and order_status != 'pending'
            {$where_clause}
             ";

              $order_total_cnt_sql .= " AND "
                    . "(order_master.unique_no like '%{$search_value}%' or "
                    . "package_master.package_name like '%{$search_value}%' or "
                    . "package_master.package_grams like '%{$search_value}%' or "
                    . "sub.grams like '%{$search_value}%' or "
                    . "user_master.user_firstname like '%{$search_value}%' or "
                    . "user_master.user_mobile like '%{$search_value}%' or "
                    . "user_master.user_lastname like '%{$search_value}%' or "
                    . "transcation_master.transaction_code like '%{$search_value}%' or "
                    . "order_master.order_status like '%{$search_value}%' or "
                    . "order_master.start_date like '%{$date_search_value}%' or "
                    . "order_master.end_date like '%{$date_search_value}%'  "                    
                    . "or CONCAT ( user_master.user_firstname,' ' ,user_master.user_lastname ) like '%{$search_value}%'  ) group by order_master.order_master_id order by order_master.created_date DESC ";
        }
        else{
            $order_list_sql = "SELECT
            order_master.order_master_id,order_master.transaction_id,order_master.order_status,order_master.start_date,order_master.end_date,order_master.unique_no,  RIGHT(CONCAT('000', unique_user_id),4) as unique_user_id_with_zero ,user_master.user_mobile,
            user_master.user_firstname,user_master.user_lastname,package_master.package_name,package_master.package_grams,sub.grams,pk_for.name as pk_for_name,transcation_master.transaction_code
            from order_master
            JOIN user_master ON user_master.user_master_id = order_master.order_by
            JOIN sub_package_master sub ON sub.main_sub_package_id = order_master.sub_package_id
            JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
            JOIN package_master ON package_master.main_package_master_id = order_master.package_id
            LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
            where order_master.is_deleted = 0 and package_master.language_id = 1 and  order_status != 'pending' and pk_for.language_id=1 
            {$where_clause}
            group by order_master.order_master_id order by order_master.created_date DESC " . $limit_sql;

//echo $order_list_sql;exit;
            $order_total_cnt_sql =  "SELECT
              order_master.order_master_id 
            from order_master
            JOIN user_master ON user_master.user_master_id = order_master.order_by
            JOIN sub_package_master sub ON sub.main_sub_package_id = order_master.sub_package_id
            JOIN package_for_master pk_for ON order_master.package_for = pk_for.main_package_for_master_id
            JOIN package_master ON package_master.main_package_master_id = order_master.package_id
            LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
            where order_master.is_deleted = 0 and package_master.language_id = 1 and order_status != 'pending'
            {$where_clause}
            group by order_master.order_master_id order by order_master.created_date DESC ";
        }
       //echo $order_list_sql ;exit;
        $orders = $this->fireQuery($order_list_sql);
        $TotOrders = $this->fireQuery($order_total_cnt_sql);
       
        $orderList = array();
        $iNo = 1;
        if (!empty($orders)) {
            $loopCount = 0;
            
            foreach ($orders as $key => $value) {
                $orderArr = [];

                $offDaysArray = array();
                #changes
                $sub_package_details_grams = 0;
                $main_sub_package_id = 0;
                $sql_get_package_details = "select sub_package_master.grams,main_sub_package_id from order_master
                     JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id where order_master_id = '" . $value['order_master_id'] . "'  group by order_master_id ";
                $sub_package_details = $this->fireQuery($sql_get_package_details);

                if (!empty($sub_package_details)) {
                    $sub_package_details_grams = $sub_package_details[0]['grams'];
                    $main_sub_package_id = $sub_package_details[0]['main_sub_package_id'];
                }

                $value['main_sub_package_id'] = $main_sub_package_id;
                $value['sub_package_details_grams'] = $sub_package_details_grams;

                #changes

                if ($value['transaction_id'] != 0) {
                    $payment_status = 'success';
                } else {
                    $payment_status = 'pending';
                }

                $value['payment_status'] = $payment_status;
                $order_start_date = strtotime($value['start_date']);
                $order_end_date = strtotime($value['end_date']);
                $offDaysArray = array();
                $total_off_days = 0;
                $day_passed = $remaining_days = 0;
                $today = strtotime(date('Y-m-d'));


                $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;

                $freezeOnce = false;

                $supend_start_date = null;
                $supend_end_date = null;
                $supend_end_date_response = null;
                $supend_start_date_response = null;

                $suspendedFridays = [];
                $suspendedOffDays = [];
                $freezeDays = [];
                $PauseDays =  [] ;
                $pause_days = 0;
                $suspesion_days = 0;
/*
                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                        JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                        where order_off_days_relation.is_deleted = 0 and order_id = " . $value['order_master_id'] . " group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                


                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray [] = $_offDays['main_days_master_id'];
                    }
                }

                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $value['order_master_id'],
                            "is_deleted" => 0
                        )
                );
                

               
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
                            "order_id" => $value['order_master_id'],
                            "is_deleted" => 0
                        )
                );
                
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

                $offDaysDates = [];
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
*/
                $value['remaining_days'] = $remaining_days;
                //$value['unique_user_id'] = $value['unique_user_id_with_zero'];
                $order_data [] = $value;


                if ( $value['payment_status'] == 'success' ){
                    $label_class1 = 'label-success' ;
                    $payment_status = 'success'  ;
                }
                if ( $value['payment_status'] == 'pending' ){
                    $label_class1 = 'label-warning' ;
                    $payment_status = 'pending' ;
                }
                if ( $value['order_status'] == 'cancel' ){
                    $label_class1 = 'label-danger' ;
                    $payment_status = 'Transaction Cancel' ;
                    $added_css  = 'display: block;width: 66px;white-space: normal;' ; 
                    
                }

                $orderArr[] = $start + $iNo++;
                $orderArr[] = $value['unique_no'];
                $orderArr[] = trim($value['user_firstname'] . ' ' . $value['user_lastname']) . "[ ".$value['user_mobile']." ]";
                $orderArr[] = ucfirst($value['package_name']);
                $orderArr[] = $value['package_grams'] . '-' . ucfirst($value['pk_for_name']);
                $orderArr[] = date('d-m-Y', strtotime($value['start_date']));
                $orderArr[] = date('d-m-Y', strtotime($value['end_date']));
                //$orderArr[] = $value['remaining_days'];
                $orderArr[] = $value['transaction_code'];
                

                $label_class1 = '';
                $payment_status = '' ;
                $added_css = '' ;
                if ( $value['payment_status'] == 'success' ){
                    $label_class1 = 'label-success' ;
                    $payment_status = 'success'  ;
                }
                if ( $value['payment_status'] == 'pending' ){
                    $label_class1 = 'label-warning' ;
                    $payment_status = 'pending' ;
                }
                if ( $value['order_status'] == 'cancel' ){
                    $label_class1 = 'label-danger' ;
                    $payment_status = 'Transaction Cancel' ;
                    $added_css  = 'display: block;width: 66px;white-space: normal;' ; 
                    
                }

                $orderArr[] = '<label class="label '.$label_class1.'" style="'.$added_css.'">'.$payment_status.'</label>  ';

                $label_class = '';
                $added_css = '' ;
                 if ( $value['order_status'] == 'success' ){
                    $label_class=  'label-success' ;
                }
                if ( $value['order_status']  == 'pending' ||  $value['order_status']  == 'cancel' ){
                   $label_class  = 'label-warning' ;
                }
                    
                                   

                $orderArr[] = '<label class="label '.$label_class.'" '.$added_css.' >'.$value['order_status'].'</label>';
                $rtxt = '' ;
                 if ( $value['order_status'] != 'cancel' ){
                     $getmeal_url = $this->generateUrl('admin_orders_getmealsdatewisefilter', array(
                       'order_id' => $value["order_master_id"],
                       'quick_access'=>'all'
                     )); 
                    $rtxt .= "<a href=\"".$getmeal_url."\" class=\"btn btn-xs btn-success\" data-toggle=\"tooltip\" data-title=\"View Order Date wise\" ><i class=\"fa fa-th\"></i></a>";
                }
                $view_url = $this->generateUrl('admin_orders_vieworder', array(
                    'order_master_id' => $value["order_master_id"]
                )); 
                 $rtxt .= "<a href=\"".$view_url."\" class=\"btn btn-xs btn-primary\" data-toggle=\"tooltip\" data-title=\"View Order\" ><i class=\"fa fa-eye\"></i></a>";
                    $daysoper_url = $this->generateUrl('admin_orders_vieworderwiseoffdays', array(
                    'order_master_id' => $value["order_master_id"]
                ));  
                  if ( $value['order_status'] != 'cancel' ){
                    
                     if ( $value['remaining_days']  != 0 ){
                    // $rtxt .= "<button type=\"button\" class=\"btn btn-warning btn-xs no-print\" data-toggle=\"modal\" data-target=\"#myModal_".$value["order_master_id"]."\">Add Meal</button>";   

                //$rtxt .="<button type=\"button\" class=\"btn btn-info btn-xs no-print\" data-toggle=\"modal\" data-target=\"#myModalSuspend_".$value["order_master_id"]."\">Add Suspension</button>";       
               
                $rtxt .= "<a href=\"".$daysoper_url."\"  data-toggle=\"tooltip\"  data-title=\"View Days Operation\" ><button type=\"button\" class=\"btn bg-navy btn-xs no-print\" ><i class=\"fa fa-fw fa-calendar-plus-o\"></i></button></a>";

                    }
                    $rtxt .= "<a href=\"".$daysoper_url."\"  data-toggle=\"tooltip\"  data-title=\"View Days Operation\" ><button type=\"button\" class=\"btn bg-navy btn-xs no-print\" ><i class=\"fa fa-fw fa-calendar-plus-o\"></i></button></a>";

                 }

                


                                    
                $orderArr[] = $rtxt;

                $loopCount++;

                $orderList[] = $orderArr;
            }
        }


        $response = array(
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => count($TotOrders),
            'recordsFiltered' => count($TotOrders),
            'data' => $orderList
        );

        echo json_encode($response);
        exit;
    }

    /**
     * @Route("/orders/view/{order_master_id}",defaults={"order_master_id"="0"})
     * @Template()
     */
    public function vieworderAction($order_master_id) {

		$delivery_time_list = NULL ; 
        $order_suspend_history_sql = "select * from freeze_subpackage where order_id = '$order_master_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";

        $suspendHistory = $this->fireQuery($order_suspend_history_sql);
      
      

        $order_pause_history_sql = "select pause_package.* , pause_package_history.resume_choice from pause_package join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where order_id =  '$order_master_id' and is_deleted = 0 order by pause_package_id DESC";

        $pauseHistory = $this->fireQuery($order_pause_history_sql);

    
        $order_upgrade_history_sql = "select * from order_package_upgrade_history where order_id = '$order_master_id'  and is_deleted = 0 and status = 'paid' and added_flag= 'upgrade' order by start_from_date DESC";

        $upgrade_history = $this->fireQuery($order_upgrade_history_sql);

     
        $upgradeDetails = null;
        if ($upgrade_history) {
            foreach ($upgrade_history as $_upgrade_history) {

                $start_from_date = $_upgrade_history['start_from_date'];

                $sql_ = "select meal_type,sum(total_meal_type) as total_count,total_meal_type,price,days,product_category_master.product_category_name from
                    order_meal_types_include_relation JOIN product_category_master ON product_category_master.main_product_category_master_id = order_meal_types_include_relation.meal_type
                    where order_meal_types_include_relation.is_deleted = 0 and order_meal_types_include_relation.is_archive = 0 and order_meal_types_include_relation.order_id = '$order_master_id' and order_meal_types_include_relation.start_from_date = '$start_from_date' and order_meal_types_include_relation.added_flag = 'upgrade' group by meal_type";
                $totalMealsCountInOrder = $this->fireQuery($sql_);

                $upgradePrice = 0;
                if (!empty($totalMealsCountInOrder)) {
                    foreach ($totalMealsCountInOrder as $_totalMealsCountInOrder) {
                        $upgradePrice += ($_totalMealsCountInOrder['price'] * $_totalMealsCountInOrder['days'] * $_totalMealsCountInOrder['total_meal_type'] );
                    }
                }
                $upgradeDetails [] = array(
                    "start_date_from" => $_upgrade_history['start_from_date'],
                    "status" => $_upgrade_history['status'],
                    "created_on" => $_upgrade_history['created_datetime'],
                    'meal_types_added' => $totalMealsCountInOrder,
                    'upgradePrice' => $upgradePrice
                );
            }
        }

        //  echo"<pre>";print_r($upgradeDetails);exit;
        #getOffDaysEntered

        $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
        JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
        where order_off_days_relation.is_deleted = 0 and order_id = '$order_master_id' group by days_master.main_days_master_id";

        $offDays = $this->fireQuery($sql);

        $order_list_sql = "select
                        time_slot_master.title as time_title,time_slot_master.start_time as delivery_start,time_slot_master.end_time as delivery_end,
                        delivery_method_master.name as delivery_method_name,order_master.delivery_time_id,
                        order_master.order_master_id,order_master.sub_package_id,order_master.delivery_address_id,order_master.unique_no,order_master.created_date,order_master.package_amount,order_master.promo_code_discount,order_master.payment_amount,order_master.payment_type,order_master.order_status,order_master.start_date,order_master.end_date,order_master.package_id,order_master.package_for,order_master.consulatant_fee,order_master.transaction_id,
                        user_master.user_firstname,user_master.user_master_id,user_master.user_mobile,user_master.unique_user_id,user_master.user_lastname,user_master.user_image,package_master.package_name,package_master.package_grams,sub_package_master.grams,transcation_master.transaction_code,order_master.order_note_id
                        from order_master
                        LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id
                        LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id
                        JOIN user_master ON user_master.user_master_id = order_master.order_by
                        JOIN package_master ON package_master.main_package_master_id = order_master.package_id
                        JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id
                        LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
                        where order_master.is_deleted = 0 and order_master.order_master_id = '$order_master_id' and package_master.language_id = 1  group by order_master.order_master_id";
        $order = $this->fireQuery($order_list_sql);

        $order_id = 0;
        $drivers = null;

        //echo"<pre>";print_r($order);exit;
        if (!empty($order)) {

            $order_id = $order[0]['order_master_id'];

            $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findOneBy(['order_master_id' => $order_id, 'is_deleted' => 0]);
            $sub_package_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagemaster")->findOneBy(['sub_package_master_id'=>  $order[0]['sub_package_id'] ]);
            if($sub_package_master_info){
                $sub_package_calories = $sub_package_master_info->getMin_limit() . " - " . $sub_package_master_info->getMax_limit() ;
            }
            $driver_id = 0;
            if ($orders_meal) {
                $driver_id = $orders_meal->getAssign_driver_id();
            }

            $order[0]['driver_id'] = $driver_id;

            $order[0]['user_image'] = $this->getMediaAction($order[0]['user_image']);
            $order[0]['order_include'] = null;
            
            $order_note_text = ''; 
            if($order[0]['order_note_id'] != 0 ){
                $order_note_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordernotemaster")->findOneBy(array("main_order_note_id"=>$order[0]['order_note_id']));
                if($order_note_info){
                    $order_note_text = $order_note_info->getOrder_note_text() ; 
                    $order_note_id = $order_note_info->getMain_order_note_id() ;
                    

                }
            }
            $order_note = "select * from order_note_master where  is_deleted = 0 and language_id=1 ";

			$order_notes = $this->fireQuery($order_note);

            $sql_ingredients = "select * from ingredients_master i_m where i_m.is_deleted = '0' and i_m.status=1";
            $ingredients = $this->fireQuery($sql_ingredients);

            $sql_allergies = "select * from allergies_master a_m where a_m.is_deleted = '0' and a_m.status=1";
            $allergies = $this->fireQuery($sql_allergies);

            $order_alldislikes = "select ingredients_master.ingredient_master_id,ingredients_master.name from order_ingredient_relation JOIN ingredients_master ON ingredients_master.ingredient_master_id = order_ingredient_relation.ingredient_master_id where ingredients_master.is_deleted = 0 and order_ingredient_relation.order_id=".$order_id;
            // echo'<pre>';print_r($order_alldislikes);die('test');
            $order_dislike = $this->fireQuery($order_alldislikes);
            $order_dislikes = [];
            foreach($order_dislike as $odislikes){
                $order_dislikes[] = $odislikes['ingredient_master_id'];
            }
            //echo'<pre>';print_r($order_dislikes);die('test');
            $order_allergies = "select allergies_master.allergy_master_id from order_allergy_relation JOIN allergies_master ON allergies_master.allergy_master_id = order_allergy_relation.allergy_master_id where allergies_master.is_deleted = 0 and order_allergy_relation.order_id=".$order_id;

            $order_allergy = $this->fireQuery($order_allergies);
			
            $order_allergies = [];
            foreach($order_allergy as $allergy){
                //echo'<pre>';print_r($allergy);die('test');
                $order_allergies[] = $allergy['allergy_master_id'];
            }
			$delivery_time = "select * from time_slot_master where  is_deleted = 0 and language_id = 1 ";

			$delivery_time_list = $this->fireQuery($delivery_time);

            $order[0]['order_note_text'] = $order_note_text;
            $delivery_address_id = $order[0]['delivery_address_id'];
            $order_address = "select address_name,contact_no,area_id,area_name,street,flate_house_number,society_building_name,address_master.* from address_master LEFT join area_master ON address_master.area_id = area_master.main_area_id where address_master.main_address_id = '$delivery_address_id'  order by area_master.language_id ASC limit 0,1 ";// group by main_address_id ";
			//echo $order_address;exit;
            $order_address_details = $this->fireQuery($order_address);

            $area_id = 0;

            if (!empty($order_address_details)) {
                $order[0]['order_address_details'] = $order_address_details[0];
                $area_id = $order_address_details[0]['area_id'];
            }

            $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 and user_master_id IN ( select driver_user_id from driver_area_relation where area_id = '$area_id' and is_deleted = 0)";
            $drivers = $this->fireQuery($sql_get_drivers);

            if ($order[0]['transaction_id'] != 0) {
                $order[0]['payment_status'] = 'success';
            } else {
                $order[0]['payment_status'] = 'pending';
            }
            //get sub package details 
            $subPackageQuery = "SELECT sub_package_combination_master.meal_value , product_category_master.product_category_name FROM `sub_package_combination_master` join product_category_master on sub_package_combination_master.meal_type_id = product_category_master.main_product_category_master_id WHERE sub_package_combination_master.`sub_package_id` = " . $order[0]['sub_package_id'] . " AND sub_package_combination_master.`is_deleted` = 0 and sub_package_combination_master.meal_value != 0 and product_category_master.language_id = 1  group by sub_package_combination_master.sub_package_combination_master_id";
            $subPackageList = $this->fireQuery($subPackageQuery);
            $sub_package_str = '';
            if ($subPackageList) {
                foreach ($subPackageList as $subkey => $subval) {
                    if ($subkey == (count($subPackageList) - 1 )) {
                        $sub_package_str .= '' . $subval['meal_value'] . " " . ucwords($subval['product_category_name']) . " ";
                    } else {
                        $sub_package_str .= '' . $subval['meal_value'] . " " . ucwords($subval['product_category_name']) . " + ";
                    }
                }
            }

            $order[0]['package_for_data'] = $this->getPackageAddonsAction($order[0]['package_id'], $order[0]['package_for'], 'package_for');
            $order[0]['consultant_data'] = $this->getPackageAddonsAction($order[0]['package_id'], $order[0]['consulatant_fee'], 'consultant_fee');
            $order[0]['sub_package_name'] = $sub_package_str;
            $order[0]['sub_package_calories'] = $sub_package_calories ;
            
  
            //----remaining days ---------------------------
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
          

            $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                    array(
                        "order_id" => $order_id,
                        "is_deleted" => 0
                    )
            );
          
         
                
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
          
           
            $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                    array(
                        "order_id" => $order_id,
                        "is_deleted" => 0
                    )
            );
                
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
          
            $order_start_date = strtotime($order[0]['start_date']) ;
             $order_end_date =  strtotime($order[0]['end_date']);
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
            $order[0]['remaining_days'] = $remaining_days ;
            $order[0]['remaining_days_from_function'] = 0 ;
            // fetch remaining days from New table - call daily function 
            $remaining_days_order_wise = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Remainingdaysorderwise")->findOneBy(array("order_master_id"=>$order_id));
            if($remaining_days_order_wise ){
                $order[0]['remaining_days_from_function'] = $remaining_days_order_wise->getRemaining_days() . " " . " Counter updated on ".  $remaining_days_order_wise->getlast_updated_datetime() ;  ;
            }

            $order = $order[0];
        }
      
     
        // upgrade Gram Values 
        $upgradeArray = NULL;
        $upgradeGramOfOrder = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackagegramrelation")->findBy(array("order_id" => $order_id, "gram_added_flag" => "upgrade"));
        if ($upgradeGramOfOrder) {
            foreach ($upgradeGramOfOrder as $ugkey => $ugval) {
                $upgradeArray[] = array(
                    "package_gram" => $ugval->getPackage_gram(),
                    "package_gram_price" => $ugval->getPackage_gram_price(),
                    "start_from_date" => $ugval->getStart_from_date(),
                    "created_datetime" => $ugval->getCreated_datetime()
                );
            }
        }
        return array('main_order' => $order,
            'drivers' => $drivers,
            'offDays' => $offDays,
            'upgradeDetails' => $upgradeDetails,
            'suspendHistory' => $suspendHistory,
            'pauseHistory' => $pauseHistory,
            'upgradeGramArray' => $upgradeArray,
            'order_notes'=>$order_notes,
			'delivery_time_list'=>$delivery_time_list,
            'order_dislikes' => $order_dislikes,
            'order_allergies' => $order_allergies,
            'ingredients' => $ingredients,
            'allergies' => $allergies

        );
    }

    /**
     * @Route("/orders/vieworderwiseoffdays/{order_master_id}",defaults={"order_master_id"="0"})
     * @Template()
     */
    public function vieworderwiseoffdaysAction($order_master_id) {

        $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_master_id);
        $date_array = $order = [];
        $order_list_sql = "select
                        time_slot_master.title as time_title,time_slot_master.start_time as delivery_start,time_slot_master.end_time as delivery_end,
                        delivery_method_master.name as delivery_method_name,
                        order_master.order_master_id,order_master.delivery_address_id,order_master.unique_no,order_master.created_date,order_master.package_amount,order_master.promo_code_discount,order_master.payment_amount,order_master.payment_type,order_master.order_status,order_master.start_date,order_master.end_date,order_master.package_id,order_master.package_for,order_master.consulatant_fee,order_master.transaction_id,
                        user_master.user_firstname,user_master.unique_user_id,user_master.user_lastname,user_master.user_image,package_master.package_name,sub_package_master.grams,transcation_master.transaction_code
                        from order_master
                        LEFT JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id
                        LEFT JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id
                        JOIN user_master ON user_master.user_master_id = order_master.order_by
                        JOIN package_master ON package_master.main_package_master_id = order_master.package_id
                        JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id
                        LEFT JOIN transcation_master ON transcation_master.transcation_master_id = order_master.transaction_id
                        where order_master.is_deleted = 0 and package_master.language_id =1 and order_master.order_master_id = '$order_master_id' group by order_master.order_master_id";
        $order = $this->fireQuery($order_list_sql);
        $add_days_list = NULL;
        $todayDate = date("Y-m-d");
         $action_perform_flag = true  ;
        if ($orderInfo) {

            $order_id = $order[0]['order_master_id'];

            $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findOneBy(['order_master_id' => $order_id, 'is_deleted' => 0]);
            $driver_id = 0;
            if ($orders_meal) {
                $driver_id = $orders_meal->getAssign_driver_id();
            }
            $order[0]['driver_id'] = $driver_id;
            $passeddate = '';
            if(strtotime($todayDate) > strtotime($order[0]['start_date'])){
                $passeddate = date('Y-m-d', strtotime($todayDate. ' +1 days') ) ;
            }
            else{
                 //$passeddate = $order[0]['start_date'] ; 
                $passeddate = date('Y-m-d', strtotime($todayDate. ' +1 days') ) ;
            }
            $order[0]['passeddate'] = $passeddate ; 
            $order[0]['user_image'] = $this->getMediaAction($order[0]['user_image']);
            $order[0]['order_include'] = null;
            $delivery_address_id = $order[0]['delivery_address_id'];
            $order_address = "select address_name,contact_no,area_id,area_name,street,flate_house_number,society_building_name,address_master.* from address_master JOIN area_master ON address_master.area_id = area_master.main_area_id where address_master.main_address_id = '$delivery_address_id' order by area_master.language_id ASC limit 0,1 ";//group by main_address_id ";
            $order_address_details = $this->fireQuery($order_address);
			
            $area_id = 0;

            if (!empty($order_address_details)) {
                $order[0]['order_address_details'] = $order_address_details[0];
                $area_id = $order_address_details[0]['area_id'];
            }

            $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 and user_master_id IN ( select driver_user_id from driver_area_relation where area_id = '$area_id' and is_deleted = 0)";
            $drivers = $this->fireQuery($sql_get_drivers);

            if ($order[0]['transaction_id'] != 0) {
                $order[0]['payment_status'] = 'success';
            } else {
                $order[0]['payment_status'] = 'pending';
            }

            $order[0]['package_for_data'] = $this->getPackageAddonsAction($order[0]['package_id'], $order[0]['package_for'], 'package_for');
            $order[0]['consultant_data'] = $this->getPackageAddonsAction($order[0]['package_id'], $order[0]['consulatant_fee'], 'consultant_fee');
            $order = $order[0];
            $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                    JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                    where order_off_days_relation.is_deleted = 0 and order_id = '$order_master_id' group by days_master.main_days_master_id";

            $offDays = $this->fireQuery($sql);
            $off_dayName = [];

            foreach ($offDays as $okey => $oval) {
                $off_dayName[] = $oval['days_name'];
            }
            $order_suspend_history_sql = "select * from freeze_subpackage where order_id = '$order_master_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";
            $suspendHistory = $this->fireQuery($order_suspend_history_sql);
            $order_pause_history_sql = "select * from pause_package where order_id = '$order_master_id'  and is_deleted = 0 order by pause_package_id DESC";
            $pauseHistory = $this->fireQuery($order_pause_history_sql);
            // get all days
            $days_idArr = [];
            $All_days = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Daysmaster")->findBy(array("is_deleted" => 0, "language_id" => 1));
            if ($All_days) {
                foreach ($All_days as $aval) {
                    $days_idArr[$aval->getDays_name()] = $aval->getMain_days_master_id();
                }
            }
            $loop_start_date = $order_start_date = $orderInfo->getStart_date();
            $loop_end_date = $order_end_date = $orderInfo->getEnd_date();
            $today_date = date("Y-m-d");

            while ($loop_start_date <= $loop_end_date) {
                $day = date('l', strtotime($loop_start_date));
                $off_dayFlag = false;
                $day_id = 0;
                if (in_array($day, $off_dayName)) {
                    $off_dayFlag = true;
                }
                $suspend_flag = false;

                if ($suspendHistory) {
                    foreach ($suspendHistory as $sval) {

                        if ($loop_start_date >= date("Y-m-d", strtotime($sval['start_date'])) && $loop_start_date <= date("Y-m-d", strtotime($sval['end_date']))) {
                            $suspend_flag = true;
                            break;
                        }
                    }
                }
                $suspend_flagdisable = false;
//                if ($loop_start_date <= date("Y-m-d")) {
                $Date = date("Y-m-d") ;
                if ($loop_start_date <= date('Y-m-d', strtotime($Date. ' + '.$this->SELECT_MEAL_AFTER_DAYS.'  days') )) {
                    $suspend_flagdisable = true;
                }

                $pasue_flag = false ;
                if ($pauseHistory) {
                    foreach ($pauseHistory as $sval) {

                        if (
                            strtotime($loop_start_date) >=  strtotime($sval['pause_start_date']) && 
                            strtotime($loop_start_date) <= strtotime($sval['pause_end_date'])
                        ) {
                            $pasue_flag = true;
                            break;
                        }
                    }
                }
                $pasue_flagdisable = false;
//                if ($loop_start_date <= date("Y-m-d")) {
                $Date = date("Y-m-d") ;
                if ($loop_start_date <= date('Y-m-d', strtotime($Date. ' + '.$this->SELECT_MEAL_AFTER_DAYS.'  days') )) {
                   // $pasue_flagdisable = true;
                }
                
                $date_array[] = array(
                    "date" => $loop_start_date,
                    "day" => $day,
                    "loop_start_date" => $loop_start_date,
                    "day_id" => $days_idArr[$day],
                    "off_day_flag" => $off_dayFlag,
                    "suspend_flag" => $suspend_flag,
                    "suspend_flagdisable" => $suspend_flagdisable,
                    "pasue_flag" => $pasue_flag,
                    "pasue_flagdisable" => $pasue_flagdisable
                );


                $loop_start_date = date('Y-m-d', strtotime($loop_start_date . ' + 1 days'));
            }
            
            // Added Days History
            $added_extra_days = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Addedextradaysorder")->findBy(array("order_id" => $order_id));
            if ($added_extra_days) {
                foreach ($added_extra_days as $addkey => $addval) {
                    $add_days_list[] = array(
                        "added_days" => $addval->getAdded_days(),
                        "old_order_end_date" => $addval->getOld_order_end_date(),
                        "new_order_end_date" => $addval->getNew_order_end_date(),
                        "added_datetime" => $addval->getAdded_datetime()
                    );
                }
            }

            $action_perform_flag = true  ;
            $checkPause = $this->firequery("SELECT *  FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE pause_package.`order_id` = " . $order_id . "  and pause_package.is_deleted = 0 ");
                
            if ($checkPause) {
                $pauseOnce = true;
                foreach ($checkPause as $_checkPause) {
                    if ($_checkPause['resume_choice'] == 'admin'){
                         if($_checkPause['pause_end_date'] == NULL){
                            $action_perform_flag = false  ;  
                         }   
                    }
                    elseif($_checkPause['resume_choice'] == 'customer'){
                        if($_checkPause['pause_end_date_by_update'] == NULL){
                             $action_perform_flag = false  ;
                         }       
                    }
                    
                }
            }
            if(strtotime(date("Y-m-d")) >= strtotime($order['end_date']) ){
                $action_perform_flag = false  ;
            }


        }

        return array('order_master_id' => $order_master_id, "main_order" => $order, "date_array" => $date_array, "add_days_list" => $add_days_list,"action_perform_flag"=>$action_perform_flag );
    }

    /**
     * @Route("/orders/AssignDriverToAllOrder")
     * @Template()
     */
    public function AssignDriverToAllOrderAction(Request $req) {
        $order_master_id = $req->request->get('order_master_id');
        $driver_id = $req->request->get('driver_id');
        $em = $this->getDoctrine()->getManager();

        

        $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(['order_master_id' => $order_master_id, 'is_deleted' => 0]);
        if ($orders_meal) {
            foreach ($orders_meal as $meal) {
                $meal->setAssign_driver_id($driver_id);
                $meal->setStatus('driver_assigned');
                $meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                $em->flush();
            }
            return new Response('done');
        }else{
             return new Response('Meals not found');
        }

        // For temporary  testing code 
        /*
        $q = "SELECT * FROM order_meal_relation where assign_driver_id = 0 and requested_datetime >= '2021-11-08' and is_deleted = 0 group by order_master_id";
        $l = $this->firequery($q);
        foreach($l as $key=>$val){
            $order_master_id = $val['order_master_id'];
            $assign_driver_id  = 0 ;
            $checkDriverMeal = $this->firequery("SELECT * FROM order_meal_relation where is_deleted = 0 and order_master_id = " . $order_master_id . " and assign_driver_id != 0 ");
            if($checkDriverMeal){
                $assign_driver_id = $checkDriverMeal[0]['assign_driver_id'];
            }
            if( $assign_driver_id != 0 ){
                 $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(['order_master_id' => $order_master_id, 'is_deleted' => 0]);
                if ($orders_meal) {
                    foreach ($orders_meal as $meal) {
                        $meal->setAssign_driver_id($assign_driver_id);
                        $meal->setStatus('driver_assigned');
                        $meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                        $em->flush();
                    }
                }
            }

        }


         return new Response('done');

        */
        
    }
    /**
     * @Route("/orders/AssignNote")
     * @Template()
     */
    public function AssignNoteAction(Request $req) {
        $order_master_id = $req->request->get('order_master_id');
        $note_id = $req->request->get('note_id');
        $em = $this->getDoctrine()->getManager();

        $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findBy(['order_master_id' => $order_master_id, 'is_deleted' => 0]);
        if ($orders_meal) {
            foreach ($orders_meal as $meal) {
                $meal->setOrder_note_id($note_id);
                $meal->setLast_modified(date('Y-m-d H:i:s'));
                $em->flush();
            }
        }

        return new Response('done');
    }
	
	/**
     * @Route("/orders/changedeliverytime")
     * @Template()
     */
    public function changedeliverytimeAction(Request $req) {
        $order_master_id = $req->request->get('order_master_id');
        $time_id = $req->request->get('time_id');
        $em = $this->getDoctrine()->getManager();

        $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(['order_master_id' => $order_master_id, 'is_deleted' => 0]);
        if ($orders_meal) {            
			$orders_meal->setDelivery_time_id($time_id);
			$orders_meal->setLast_modified(date('Y-m-d H:i:s'));
			$em->flush();
			
			$user_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($orders_meal->getOrder_by());
			if($user_master_info){
				$user_master_info->setDelivery_time_id($time_id);
				$em->flush();
				
			}
        }

        return new Response('done');
    }

    /**
     * @Route("/orders/AssignIngredents")
     * @Template()
     */
    public function AssignIngredentsAction(Request $req) {
        $order_master_id = $req->request->get('order_master_id');
        $ingredents_ids = $req->request->get('ingredents_ids');
        $user_id = $req->request->get('user_id');
        $em = $this->getDoctrine()->getManager();
        
        $orders_ingredents = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderingredientrelation")->findBy(['order_id' => $order_master_id, 'is_deleted' => 0]);
        if ($orders_ingredents) {
            foreach ($orders_ingredents as $ingredent) {
                $em->remove($ingredent);
                $em->flush();
            }
        }
        if ($ingredents_ids) {
            foreach($ingredents_ids as $ingredents_id){
                $updated_ingredent = new Orderingredientrelation();
                $updated_ingredent->setUser_id($user_id);
                $updated_ingredent->setOrder_id($order_master_id);
                $updated_ingredent->setIngredient_master_id($ingredents_id);
                $updated_ingredent->setIs_deleted(0);
                $em->persist($updated_ingredent);
                $em->flush();
            }
        }
        

        return new Response('done');
    }
    /**
     * @Route("/orders/AssignAllergies")
     * @Template()
     */
    public function AssignAllergiesAction(Request $req) {
        $order_master_id = $req->request->get('order_master_id');
        $allergies_ids = $req->request->get('allergies_ids');
        $user_id = $req->request->get('user_id');

        $em = $this->getDoctrine()->getManager();

        $orders_allergies = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderallergyrelation")->findBy(['order_id' => $order_master_id, 'is_deleted' => 0]);
        if ($orders_allergies) {
            foreach ($orders_allergies as $allergy) {
                $em->remove($allergy);
                $em->flush();
            }
        }
        if ($allergies_ids) {
            foreach($allergies_ids as $allergies_id){
                $updated_allergy = new Orderallergyrelation();
                $updated_allergy->setUser_id($user_id);
                $updated_allergy->setOrder_id($order_master_id);
                $updated_allergy->setAllergy_master_id($allergies_id);
                $updated_allergy->setIs_deleted(0);
                $em->persist($updated_allergy);
                $em->flush();
            }
        }

        return new Response('done');
    }
    /**
     * @Route("/orders/meals/{order_master_id}",defaults={"order_master_id"="0"})
     * @Template()
     */
    public function orderMealsAction($order_master_id) {
        $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 ";
        $drivers = $this->fireQuery($sql_get_drivers);

        $days = array('mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday');
        return array('days' => $days, 'order_master_id' => $order_master_id, 'drivers' => $drivers);
    }

    /**
     * @Route("/delivery-note/{order_master_id}",defaults={"order_master_id"="0"})
     * @Template()
     */
    public function deliverynoteAction($order_master_id, Request $req) {
        $_today = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : date('Y-m-d');
        $today = !empty($req->request->get('order_date')) ? date('d/m/Y', strtotime($req->request->get('order_date'))) : date('d/m/Y');

        $_sql = "SELECT unique_no, package_name, start_date, end_date, user_firstname, user_lastname, address_master_id,user_mobile from order_master om, user_master u, package_master p where om.created_by = u.user_master_id and p.main_package_master_id = om.package_id and om.order_master_id = {$order_master_id} and om.is_deleted =0 and u.is_deleted = 0 group by package_id";
        $data = $this->fireQuery($_sql);

        $deliveryNote['today'] = $today;
        $deliveryNote['_today'] = $_today;
        $deliveryNote['day'] = date('D', strtotime($today));
        $tempArr = null;
        $breakfast = null;
        $meal = null;
        $snacks = null;
        $endDate = null;

        if (!empty($data)) {
            foreach ($data as $_data) {
//              $_today = date('Y-m-d');
                // get today order
                $_sql = "SELECT * from order_meal_relation o, meal_product_relation m, product_master p where o.order_meal_relation_id = m.meal_id and m.main_product_id = p.main_product_master_id and p.main_product_category_id = m.meal_type and o.is_deleted = 0 and m. is_deleted = 0 and o.requested_datetime = '{$_today}' and o.order_master_id = {$order_master_id}";
                $today_meal = $this->fireQuery($_sql);

                //      print_r($today_meal);exit;
                if (!empty($today_meal)) {
                    $type = '';
                    $loopIndex = 0;
                    $loopIndex1 = 0;
                    $loopIndex2 = 0;

                    foreach ($today_meal as $_meal) {

                        if ($_meal['meal_type'] == 1) {
                            $type = 'Breakfast';
                            $_mealArr = null;
                            $_mealArr['type'] = $loopIndex == 0 ? $type : '';
                            $_mealArr['product_name'] = "1-" . $_meal['product_name'];
                            $_mealArr['proteins_amount'] = $_meal['proteins_amount'];
                            $_mealArr['carbs_amount'] = $_meal['carbs_amount'];
                            $_mealArr['raw_eggs'] = $_meal['raw_eggs'];
                            $_mealArr['white_eggs'] = $_meal['white_eggs'];
                            $breakfast[] = $_mealArr;
                            $loopIndex++;
                        } else if ($_meal['meal_type'] == 2) {
                            $type = 'Main Meal';

                            $_mealArr = null;
                            $_mealArr['type'] = $loopIndex1 == 0 ? $type : '';
                            $_mealArr['product_name'] = $_meal['product_name'];
                            $_mealArr['proteins_amount'] = $_meal['proteins_amount'];
                            $_mealArr['carbs_amount'] = $_meal['carbs_amount'];
                            $_mealArr['raw_eggs'] = $_meal['raw_eggs'];
                            $_mealArr['white_eggs'] = $_meal['white_eggs'];
                            $meal[] = $_mealArr;
                            $loopIndex1++;
                        } else if ($_meal['meal_type'] == 3) {
                            $type = 'Snacks';

                            $_mealArr = null;
                            $_mealArr['type'] = $loopIndex2 == 0 ? $type : '';
                            $_mealArr['product_name'] = $_meal['product_name'];
                            $_mealArr['proteins_amount'] = $_meal['proteins_amount'];
                            $_mealArr['carbs_amount'] = $_meal['carbs_amount'];
                            $_mealArr['raw_eggs'] = $_meal['raw_eggs'];
                            $_mealArr['white_eggs'] = $_meal['white_eggs'];
                            $snacks[] = $_mealArr;
                            $loopIndex2++;
                        }
                    }
                }

                // address
                $_address = $this->getDoctrine()->getRepository('AdminBundle:Addressmaster')->findOneBy([
                    'main_address_id' => $_data['address_master_id'],
                    'is_deleted' => 0,
                ]);

                $mobile = '';
                $address = '';
                if (!empty($_address)) {
                    $mobile = $_address->getContact_no() != '0' ? $_address->getContact_no() : '';
                    $address = $_address->getAddress_name();
                }

                $tempArr['unique_no'] = $_data['unique_no'];
                $tempArr['name'] = trim($_data['user_firstname'] . ' ' . $_data['user_lastname']);
                $tempArr['package_name'] = $_data['package_name'];
                $tempArr['start_date'] = date('d/m/Y', strtotime($_data['start_date']));
                $tempArr['end_date'] = date('d/m/Y', strtotime($_data['end_date']));

                $endDate = $_data['end_date'];

                $date1 = date_create($_data['start_date']);
                $date2 = date_create($_data['end_date']);
                $diff = date_diff($date2, $date1);
                $days = $diff->format("%a days");
                $plan = 'Weekly';
                if ($days > 7) {
                    $plan = 'Monthly';
                }
                $tempArr['plan'] = $plan;
                $tempArr['diff'] = $days;
                $tempArr['mobile'] = $_data['user_mobile'];
                $tempArr['address'] = $address;
            }
        }
        $deliveryNote['order_info'] = $tempArr;
        $deliveryNote['breakfast'] = $breakfast;
        $deliveryNote['meal'] = $meal;
        $deliveryNote['snacks'] = $snacks;

        return array(
            'delivery_note' => $deliveryNote, 'endDate' => $endDate
        );
    }

    /**
     * @Route("/orders/assignDriver")
     * @Template()
     */
    public function assignDriverAction(Request $req) {
        $order_id = $req->request->get('order_id');
        $day = !empty($req->request->get('day')) ? $req->request->get('day') : '';
        $driver_id = $req->request->get('driver_id');
        $meal_id = $req->request->get('meal_id');
        $table_html = '';
        $em = $this->getDoctrine()->getManager();

        $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findOneBy(array('order_master_id' => $order_id, 'order_meal_relation_id' => $meal_id));
        $response = 'Driver Not assign';
        if ($order_meal) {
            if ($driver_id != 0) {
                $order_meal->setAssign_driver_id($driver_id);
                $order_meal->setStatus('driver_assigned');
                $order_meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                $response = 'Driver Assign';
            } else {
                $order_meal->setAssign_driver_id(0);
                $order_meal->setStatus('ordered');
                $order_meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
            }
            $em->flush();
        } else {
            //  $response = "Driver is busy";
        }
        return new Response($response);
    }

    /**
     * @Route("/orders/getMealsDayWise")
     * @Template()
     */
    public function getMealsDayWiseAction(Request $req) {

        $data_found = false;
        $data = null;
        $order_id = $req->request->get('order_id');
        $day = $req->request->get('day');
        $table_html = '';
        $over_all_html = '';
        $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                array('order_master_id' => $order_id, 'meal_day' => $day));

        if (!empty($order_meal)) {
            foreach ($order_meal as $meal_) {

                $table_html = '';
                $meal_id = $meal_->getOrder_meal_relation_id();
                $sql_product_name = "select
                           product_master.product_name,meal_product_relation.proteins_amount,meal_product_relation.carbs_amount from meal_product_relation JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                           where meal_product_relation.is_deleted = 0 and meal_id = '$meal_id' group by meal_id";
                $products = $this->fireQuery($sql_product_name);
                if (!empty($products)) {
                    $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 ";
                    $drivers = $this->fireQuery($sql_get_drivers);
                    if (!empty($meal_)) {
                        $driver_id = $meal_->getAssign_driver_id();
                        $status_name = $meal_->getStatus();
                        $status = '';

                        if ($status_name == 'ordered') {
                            $status = "<button class='btn btn-warning'>" . $status_name . "</button>";
                        }
                        if ($status_name == 'not_delivered') {
                            $status = "<button class='btn btn-danger'>" . $status_name . "</button>";
                        }
                        if ($status_name == 'delivered') {
                            $status = "<button class='btn btn-success'>" . $status_name . "</button>";
                        }
                        if ($status_name == 'driver_assigned') {
                            $status = "<button class='btn btn-info'>" . $status_name . "</button>";
                        }
                        if ($status_name == 'cancel') {
                            $status = "<button class='btn btn-danger'>" . $status_name . "</button>";
                        }
                        $date_time = $meal_->getRequested_datetime();
                        $not_delivered_reason = $meal_->getNot_delivered_reason();

                        if ($not_delivered_reason != 0) {
                            $sql_reason = "select reason from reasons_master where main_reason_id = '$not_delivered_reason' group by main_reason_id";
                            $reason = $this->fireQuery($sql_reason);

                            if (!empty($reason)) {
                                $not_delivered_reason = $reason[0]['reason'];
                            }
                        }
                    } else {
                        $driver_id = 0;
                        $not_delivered_reason = '';
                        $status = '';
                        $date_time = '';
                    }

                    foreach ($products as $product) {
                        $table_html .= "<tr>";
                        $table_html .= "<td>";
                        $table_html .= $product['product_name'];
                        $table_html .= "</td>";
                        $table_html .= "<td>";
                        $table_html .= $product['proteins_amount'];
                        $table_html .= "</td>";
                        $table_html .= "<td>";
                        $table_html .= $product['carbs_amount'];
                        $table_html .= "</td>";
                        $table_html .= "</tr>";
                    }

                    $over_all_html .= '<br></br><div class="row col-md-12" id="row_panel">';
                    $over_all_html .= '<div class="col-md-2">';
                    $over_all_html .= '<b>Delivery Date : </b></br>' . $date_time;
                    $over_all_html .= '</div>';
                    $over_all_html .= '<div class="col-md-2">';
                    $over_all_html .= '<label>Assign Driver</label>';
                    $over_all_html .= '</div>';
                    $over_all_html .= '<div class="col-md-2">';
                    $over_all_html .= '<select id="driver" class="form-control" onchange="assign_driver($(this),' . $meal_id . ');">';
                    $over_all_html .= '<option value="0">Select Driver</option>';
                    if (!empty($drivers)) {
                        foreach ($drivers as $driver) {
                            if ($driver["user_master_id"] == $driver_id) {
                                $over_all_html .= '<option value="' . $driver["user_master_id"] . '" selected="selected">' . $driver["user_firstname"] . ' ' . $driver["user_lastname"] . '</option>';
                            } else {
                                $over_all_html .= '<option value="' . $driver["user_master_id"] . '">' . $driver["user_firstname"] . ' ' . $driver["user_lastname"] . '</option>';
                            }
                        }
                    }
                    $over_all_html .= '</select>';
                    $over_all_html .= '</div>';
                    $over_all_html .= '<div class="col-md-1">';
                    $over_all_html .= '<label>Status</label>';
                    $over_all_html .= '</div>';
                    $over_all_html .= '<div class="col-md-2" id="status_tag">';
                    $over_all_html .= $status;
                    $over_all_html .= '</div>';

                    if ($status_name == 'not_delivered') {

                        $over_all_html .= '<div class="col-md-2">';
                        $over_all_html .= '<b>Reason :: </b>' . $not_delivered_reason;
                        $over_all_html .= '</div>';
                    }

                    $over_all_html .= '</div>';
                    $over_all_html .= '<table class="table table-stripped" id="example" class="display" style="width:100%">';
                    $over_all_html .= '<thead>';
                    $over_all_html .= '<tr>';
                    $over_all_html .= '<th>Product Name</th>';
                    $over_all_html .= '<th>Proteins</th>';
                    $over_all_html .= '<th>Carbs</th>';
                    $over_all_html .= '</tr>';
                    $over_all_html .= '</thead>';
                    $over_all_html .= '<tbody id="table_body">';
                    $over_all_html .= $table_html;
                    $over_all_html .= '</tbody>';
                    $over_all_html .= '</table></hr>';
                    $data_found = true;
                } else {
                    $table_html .= "<tr>";
                    $table_html .= "<td colspan='3'>";
                    $table_html .= "No data Found";
                    $table_html .= "<td>";
                    $table_html .= "</tr>";
                }
                $data = array('table_html' => $over_all_html, 'driver_id' => $driver_id, 'status' => $status, 'date_time' => $date_time, 'not_delivered_reason' => $not_delivered_reason, 'data_found' => $data_found);
            }
        }
        if ($data != null) {
            $data = json_encode($data);
        } else {
            $data = json_encode(array('error' => "NRF"));
        }
        return new Response($data);
    }

    /**
     * @Route("/orders/getMealsDateWiseFilter/{quick_access}/{order_id}",defaults={"quick_access"="all_by_order","order_id"="0"})
     * @Template()
     */
    public function getMealsDateWiseFilterAction(Request $req, $quick_access, $order_id) {
        
        $order_id_given = $order_id;
        $orderMaster = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(
                array('order_master_id' => $order_id, 'is_deleted' => 0));

        $sub_package_details_grams = 0;
        $main_sub_package_id = 0;
        $sql_get_package_details = "select sub_package_master.grams,main_sub_package_id from order_master
             JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id where order_master_id = '$order_id'  group by order_master_id ";
        $sub_package_details = $this->fireQuery($sql_get_package_details);

        if (!empty($sub_package_details)) {
            $sub_package_details_grams = $sub_package_details[0]['grams'];
            $main_sub_package_id = $sub_package_details[0]['main_sub_package_id'];
        }

        $products_all = null;

        $sql = "select * from product_category_master where is_deleted = 0 group by main_product_category_master_id";        
        if($main_sub_package_id != 0 ){
            $sql = " SELECT * FROM `product_category_master` WHERE `is_deleted` = 0 and main_product_category_master_id IN (SELECT meal_type_id FROM `sub_package_combination_master` WHERE `sub_package_id` = ".$main_sub_package_id." AND `is_deleted` = 0 and meal_value != 0 ) group by main_product_category_master_id" ;           
        }
        $meal_cat_all = $this->fireQuery($sql);
        if($meal_cat_all){
            foreach ($meal_cat_all as $key => $value) {
               if($value['main_product_category_master_id'] == 2 ){
                    $sql = " SELECT * FROM `product_category_master` WHERE `is_deleted` = 0 and (main_product_category_master_id IN (SELECT meal_type_id FROM `sub_package_combination_master` WHERE `sub_package_id` = ".$main_sub_package_id." AND `is_deleted` = 0 and meal_value != 0 )  OR main_product_category_master_id = 1 ) group by main_product_category_master_id" ; 
                     $meal_cat_all = $this->fireQuery($sql);
                     break ;          
               }
            }
        }
        $languages = $this->getLanguages();
        $sql = "select main_product_category_id,main_product_master_id,product_image,product_status,max_meal_value, product_category_name from product_master, product_category_master cat where cat.main_product_category_master_id = main_product_category_id and cat.is_deleted = 0 and product_master.is_deleted = '0' group by main_product_master_id";
        $main_product = $this->fireQuery($sql);
        $products = null;
        //  print($sql);exit;
        if (!empty($main_product)) {
            foreach ($main_product as $product_) {


                $lang_wise = null;
                $lang_name = '';
                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select product_name,language_id from product_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and main_product_master_id = '" . $product_['main_product_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_name .= $lang_goal[0]['product_name'] . " /";
                            $lang_wise[] = array('product_name' => $lang_goal[0]['product_name'], 'lang_id' => $lang->getLanguage_master_id());
                        } else {
                            $lang_wise[] = array('product_name' => '-', 'lang_id' => $lang->getLanguage_master_id());
                        }
                    }
                }
                // product subpackage 
                $product_packageArray = [];
                $product_package_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productpackagerelation")->findBy(array("main_product_id" => $product_['main_product_master_id'], "is_deleted" => 0));
                if ($product_package_relation) {
                    foreach ($product_package_relation as $prval) {
                        $product_packageArray[] = $prval->getMain_package_id();
                    }
                }
                // product Days
                $product_daysArray = [];
                $product_availability = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productavailability")->findBy(array("main_product_id" => $product_['main_product_master_id'], "is_deleted" => 0));
                if ($product_availability) {
                    foreach ($product_availability as $praval) {
                        $product_daysArray[] = $praval->getMain_days_id();
                    }
                }
                $products_all[] = array(
                    'main_product_master_id' => $product_['main_product_master_id'],
                    'product_max_meal_value' => $product_['max_meal_value'],
                    'product_status' => $product_['product_status'],
                    'lang_wise' => $lang_wise,
                    'lang_name' => trim($lang_name, '/'),
                    'meal_type_id' => $product_['main_product_category_id'],
                    'product_category_name' => $product_['product_category_name'],
                    'product_packageArray' => $product_packageArray,
                    'product_daysArray' => $product_daysArray
                );
            }
        }


        $data_found = false;
        $date = '';
        $data = null;
        $all_true = false;

        if ($quick_access == 'tommorow') {
            $date = date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d'))));
        } else if ($quick_access == 'day_after_tommorow') {
            $date = date('Y-m-d', strtotime('+2 days', strtotime(date('Y-m-d'))));
        } else if ($quick_access == 'all') {
            $all_true = true;
           // $date = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : false;
        } else if ($quick_access == '') {
            $date = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : date('Y-m-d');
        } else {
            $date = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : $quick_access;
        }

        $table_html = '';
        $over_all_html = '';
        

        if ($all_true) {
            if ($order_id != 0) {
                if ($date) {
                    $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                            array('requested_datetime' => $date, 'order_master_id' => $order_id, 'is_deleted' => 0), array('requested_datetime' => 'DESC'));
                } else {
                    $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                            array('order_master_id' => $order_id, 'is_deleted' => 0), array('requested_datetime' => 'DESC'));
                }
            } else {
                $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                        array('is_deleted' => 0), array('requested_datetime' => 'DESC'));
            }
        } else {
             if($date == false){
                $date = date('Y-m-d');
            }
            if ($order_id != 0) {
                $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                        array('requested_datetime' => $date, 'order_master_id' => $order_id, 'is_deleted' => 0));
            } else {
                $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                        array('requested_datetime' => $date, 'is_deleted' => 0));
            }
        }
//print_r($order_meal);die;
        if($date == false){
            $date = date('Y-m-d');
        }
        //$checkPauseQuery = "SELECT order_id FROM `pause_package` where is_deleted = 0 and ( (pause_start_date<= '{$date}' and pause_end_date_by_update >= '{$date}'  ) or( pause_end_date_by_update is NULL))";
        $checkPauseQuery = "SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date_by_update >= '{$date}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date >= '{$date}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))" ;
       
        $checkPauseList = $this->firequery($checkPauseQuery);
       // var_dump($order_meal);
      
        $pasueOrderArray = NULL ;
        if($checkPauseList){
           foreach($checkPauseList as $chkpkey=>$chkpval){
                $pasueOrderArray[] = $chkpval['order_id'];
           }
           foreach ($order_meal as $mealkey => $meal_) {
                if(in_array($meal_->getOrder_master_id(), $pasueOrderArray)){
                    unset($order_meal[$mealkey]);
                }
           }
        }
      //  var_dump($order_meal);
       // exit;


        $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 ";
        $drivers = $this->fireQuery($sql_get_drivers);

        $driverFetched = array();

        // check freeze date range not in between pause dates
         $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );
       

        if (!empty($order_meal)) {
            foreach ($order_meal as $meal_) {

                $grams_of_package = $sub_package_id = $package_id = 0;
                $order_unique_no = '';
                $order_id = $meal_->getOrder_master_id();


                $orderMasterForMeal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(
                        array('order_master_id' => $order_id, 'is_deleted' => 0));
                //var_dump($order_id);exit;
                if ($orderMasterForMeal) {
                    $order_unique_no = $orderMasterForMeal->getUnique_no();
                    $sub_package_id = $orderMasterForMeal->getSub_package_id();
                    $package_id = $orderMasterForMeal->getPackage_id();
                    $packageSelected = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(
                            array('main_package_master_id' => $orderMasterForMeal->getPackage_id(), 'is_deleted' => 0));

                    if ($packageSelected) {
                        $grams_of_package = $packageSelected->getPackage_grams();
                    }
                }
                // check upgraded gram value or not
                $order_package_gram_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackagegramrelation")->findBy(array("order_id" => $order_id, "is_deleted" => 0, "gram_added_flag" => "upgrade"), array("start_from_date" => "ASC"));

                $upgraded_gram_value = $grams_of_package;
                if ($order_package_gram_relation) {
                    foreach ($order_package_gram_relation as $opgrkey => $opgrval) {
                        if ($date >= strtotime($opgrval->getStart_from_date())) {

                            $upgraded_gram_value = $upgraded_gram_value + $opgrval->getPackage_gram();
                        }
                    }
                }
                #get driver Area Wise Here
                if (!in_array($order_id, $driverFetched)) {
                    $sql_get_drivers = "select user_firstname,user_lastname,user_master_id from user_master where user_role_id = '2' and is_deleted = 0 and user_master_id IN (
                        select driver_user_id from driver_area_relation where is_deleted = 0 and area_id IN (
                            select area_id from address_master where main_address_id IN (
                                select delivery_address_id from order_master where order_master_id = '$order_id'
                            )
                        )
                    )";

                    $driverFetched [] = $order_id;

                    //              echo $sql_get_drivers;exit;
                    $drivers = $this->fireQuery($sql_get_drivers);
                }


                #get driver Area Wise Here done
                $sql_get_customer = "select user_firstname,user_lastname from user_master
                                    JOIN order_master ON user_master.user_master_id  = order_master.order_by
                                    where order_master.order_master_id = '$order_id' and order_master.is_deleted = '0' and user_master.is_deleted = '0' ";
                $customer_details = $this->fireQuery($sql_get_customer);

                $customer_name = '';

                if (!empty($customer_details)) {
                    $customer_name = $customer_details[0]['user_firstname'] . " " . $customer_details[0]['user_lastname'];
                }
                $meal_id = $meal_->getOrder_meal_relation_id();
                $date_time = $meal_->getRequested_datetime();
                $not_delivered_reason = $meal_->getNot_delivered_reason();
                $driver_id = $meal_->getAssign_driver_id();
                $last_modified_datetime = date('Y-m-d h:i A', strtotime($meal_->getLast_modified_datetime()));
                $status_name = ucfirst(str_replace("_", ' ', $meal_->getStatus()));

                if ($not_delivered_reason != 0) {
                    $sql_reason = "select reason from reasons_master where main_reason_id = '$not_delivered_reason' group by main_reason_id";
                    $reason = $this->fireQuery($sql_reason);

                    if (!empty($reason)) {
                        $not_delivered_reason = $reason[0]['reason'];
                    }
                }

                $sql_product_name = "select
                meal_product_relation.meal_product_relation_id,meal_product_relation.meal_product_qty,product_category_master.product_category_name,product_master.product_name,product_master.max_meal_value,meal_product_relation.proteins_amount,meal_product_relation.carbs_amount,meal_product_relation.raw_eggs,meal_product_relation.white_eggs,meal_product_relation.meal_type
                           from meal_product_relation JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                           LEFT JOIN product_category_master ON      meal_product_relation.meal_type =  product_category_master.main_product_category_master_id
                           where meal_product_relation.is_deleted = 0 and meal_id = '$meal_id' group by meal_product_relation.meal_product_relation_id";
                $products = $this->fireQuery($sql_product_name);
                $products_array = null;
                if (!empty($products)) {

                    foreach ($products as $product) {

                        $products_array [] = array(
                            'meal_product_relation_id' => $product['meal_product_relation_id'],
                            'product_name' => $product['product_name'],
                            'product_max_meal_value' => $product['max_meal_value'],
                            'proteins_amount' => $product['proteins_amount'],
                            'carbs_amount' => $product['carbs_amount'],
                            'raw_eggs' => $product['raw_eggs'],
                            'white_eggs' => $product['white_eggs'],
                            'meal_qty' => $product['meal_product_qty'],
                            'meal_type' => $product['meal_type'],
                            'order_meal_type_name' => $product['product_category_name']
                        );
                    }
                }
                $day_name = date('l', strtotime($date_time));
                $day_id = 0;
                $day_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Daysmaster")->findOneBy(array("days_name" => $day_name, "is_deleted" => 0));
                if ($day_info) {
                    $day_id = $day_info->getMain_days_master_id();
                }

                //-------------------------------------------------------------
                $date_pause_flag = false ; 
                 $PauseDays = [] ;
                 if ($checkPause) {
                    
                    foreach ($checkPause as $_checkPause) {
                        $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_start_date())));
                        $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date())));

                        $pause_end_date_by_update = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date_by_update())));

                        $pause_pacgae_historyInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->find($_checkPause->getPause_package_history_id());
                        $resume_choice = 'admin';
                        if($pause_pacgae_historyInfo){
                            $resume_choice = $pause_pacgae_historyInfo->getResume_choice() ;
                        }

                        if($resume_choice == 'admin'){
                            if($pasue_end_date == NULL || $pasue_end_date == ''){
                                if(strtotime($date_time) >= $pause_start_date){
                                   $date_pause_flag = true ; 
                                }
                            }
                        }
                        else if ($resume_choice == 'customer'){
                            if($pasue_end_date == NULL || $pasue_end_date == ''){
                                if(strtotime( $date_time) >= $pause_start_date){
                                    $date_pause_flag = true ; 
                                }
                            }
                            elseif($pause_end_date_by_update == NULL || $pause_end_date_by_update == ''){
                                if(strtotime( $date_time) >= $pause_start_date){
                                    $date_pause_flag = true ; 
                                }
                            }
                            $pasue_end_date = $pause_end_date_by_update ;
                        }
                        while ($pause_start_date <= $pasue_end_date) {

                            $PauseDays [] = date('Y-m-d', $pause_start_date);
                            //$pause_days += 1;

                            $pause_start_date = strtotime("+1 day", $pause_start_date);
                        }
                        
                    }
                }
                $req_date_pause = false ; 
                if($date_pause_flag == true){
                     $req_date_pause = true ; 
                }
                else{
                    if($PauseDays != NULL){
                        if(in_array($date_time,  $PauseDays))  {
                            $req_date_pause = true ; 
                        }
                    }
                }
                //-------------------------------------------------------------

                $data[] = array(
                    'meal_id' => $meal_id,
                    'date_time' => $date_time,
                    'req_date_pause' => ($req_date_pause == true) ? 'true' : 'false',
                    'day_id' => $day_id,
                    'not_delivered_reason' => $not_delivered_reason,
                    'driver_id' => $driver_id,
                    'status_name' => $status_name,
                    'last_modified_datetime' => $last_modified_datetime,
                    'products_array' => $products_array,
                    'sub_package_id' => $sub_package_id,
                    'package_id' => $package_id,
                    'order_id' => $order_id,
                    'customer_name' => $customer_name,
                    'drivers' => $drivers,
                    'grams_of_package' => $upgraded_gram_value, //$grams_of_package,
                    'order_unique_no' => $order_unique_no);
            }
        }
          // var_dump($data);exit;
        if ($date == '') {
            return array('main_sub_package_id' => $main_sub_package_id,
                'sub_package_details_grams' => $sub_package_details_grams,
                'meal_cat_all' => $meal_cat_all,
                'order_data' => $data,
                'date' => '',
                'drivers' => $drivers,
                'products_all' => $products_all,
                'order_id' => $order_id,
                'orderMaster' => $orderMaster);
        } else {

            return array(
                'main_sub_package_id' => $main_sub_package_id,
                'sub_package_details_grams' => $sub_package_details_grams,
                'meal_cat_all' => $meal_cat_all,
                'order_data' => $data,
                'date' => date('m/d/Y', strtotime($date)),
                'drivers' => $drivers,
                'products_all' => $products_all,
                'order_id' => $order_id,
                'orderMaster' => $orderMaster);
        }

//
    }

    /**
     * @Route("/orders/getMealsEgssByProduct")
     * @Template()
     */
    public function getMealsEgssByProductAction(Request $req) {
        $main_sub_package_id = $req->request->get('main_sub_package_id');
        $main_product_id = $req->request->get('main_product_id');
        $product_max_value = 0;
        $product_max_value_arr = NULL;
        $product_max_value_html = '';
        $product_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->find($main_product_id);
        if ($product_info) {
            $product_max_value = $product_info->getMax_meal_value();
            $product_max_value_arr = range(0, $product_max_value);


            for ($i = 0; $i < count($product_max_value_arr); $i++) {
                $product_max_value_html .= "<option value='" . $product_max_value_arr[$i] . "'>" . $product_max_value_arr[$i] . "</option>";
            }
        }

        #getEggDetails  if meal is breakfast
        $sql = "select *,MAX(prot_crab) as eggs from product_combination_master where product_master_id = '$main_product_id' and sub_pakage_id = '$main_sub_package_id' group by prot_type";
        $product_combo = $this->fireQuery($sql);

        $raw_eggs_html = '';
        $white_eggs_html = '';
        $pro_carb_flag = 'false';
        $sql_combo_display = "select * from product_combo_display_relation where is_deleted = '0' and combo_type='prot_carb' and product_id = '$main_product_id'  ";
        $combo_display = $this->fireQuery($sql_combo_display);
        if ($combo_display) {
            $pro_carb_flag = 'true';
        }
        if (!empty($product_combo)) {
            foreach ($product_combo as $_product_combo) {
                if ($_product_combo['prot_type'] == 'raw_eggs') {
                    for ($i = 0; $i <= $_product_combo['eggs']; $i++) {
                        $raw_eggs_html .= "<option value='" . $i . "'>" . $i . "</option>";
                    }
                }
                if ($_product_combo['prot_type'] == 'white_eggs') {
                    for ($i = 0; $i <= $_product_combo['eggs']; $i++) {
                        $white_eggs_html .= "<option value='" . $i . "'>" . $i . "</option>";
                    }
                }
            }
        }

        $data = array(
            'white_eggs_html' => $white_eggs_html,
            'raw_eggs_html' => $raw_eggs_html,
            'pro_carb_flag' => $pro_carb_flag,
            'product_max_value' => $product_max_value,
            'product_max_value_html' => $product_max_value_html,
        );

        return new Response(json_encode($data));
    }

    /**
     * @Route("/orders/getupgradegramvaluebydate")
     * @Template()
     */
    public function getupgradegramvaluebydateAction(Request $req) {
        $selected_date = $req->request->get('selected_date');
        $order_id = $req->request->get('order_id');
        $order_package_gram_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackagegramrelation")->findBy(array("order_id" => $order_id, "is_deleted" => 0, "gram_added_flag" => "upgrade"), array("start_from_date" => "ASC"));
        $order_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(array("order_master_id" => $order_id, "is_deleted" => 0));
        $start_date = strtotime($order_info->getStart_date());
        $end_date = strtotime($order_info->getEnd_date());
        $selected_date = strtotime($selected_date);
        $package_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->find($order_info->getPackage_id());
        $package_grams = $package_info->getPackage_grams();
        $upgraded_gram_value = $package_grams;
        while ($start_date <= $selected_date) {
            $upgraded_gram_value = $package_grams;
            if ($order_package_gram_relation) {
                foreach ($order_package_gram_relation as $opgrkey => $opgrval) {
                    if ($start_date >= strtotime($opgrval->getStart_from_date())) {
                        $upgraded_gram_value = $upgraded_gram_value + $opgrval->getPackage_gram();
                    }
                }
            }
            $start_date = strtotime("+1 day", $start_date);
        }
//        $data = array(
//            'upgraded_gram_value' => $upgraded_gram_value,
//        );
        $html = '<option value="0">--Select --</option>';
        $pro_carb = range(0, $upgraded_gram_value, 50);
        ;

        if (!empty($pro_carb)) {
            for ($i = 0; $i < count($pro_carb); $i++) {
                $html .= "<option value='" . $pro_carb[$i] . "'>" . $pro_carb[$i] . "</option>";
            }
        }

        return new Response($html);
    }

    /**
     * @Route("/orders/deletemealproduct")
     * @Template()
     */
    public function deletemealproductAction(Request $req) {
        $meal_product_relation_id = $req->request->get('meal_product_relation_id');
        $meal_product_relation_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Mealproductrelation")->find($meal_product_relation_id);
        $em = $this->getDoctrine()->getManager();
        $data = false;
        if ($meal_product_relation_info) {
            $meal_product_relation_info->setIs_deleted(1);
            $em->flush();
            $data = true;
        }

        return new Response(json_encode($data));
    }

    public function getUniqueCode() {
        $_sql = "SELECT unique_no from order_meal_relation order by unique_no desc limit 0,1";
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
     * @Route("/orders/addMealByAdmin")
     * @Template()
     */
    public function addMealByAdminAction(Request $req) {
        $em = $this->getDoctrine()->getManager();

        #meal_date
        $meal_date = !empty($req->request->get('meal_date')) ? date('Y-m-d', strtotime($req->request->get('meal_date'))) : null;





        $order_id = $req->request->get('order_id');


        $orderMaster = $em->getRepository("AdminBundle:Ordermaster")->findOneBy(["order_master_id" => $order_id]);
        if (strtotime($meal_date) > strtotime($orderMaster->getEnd_date())) {
            $this->get('session')->getFlashBag()->set('error_msg', 'Given date is not in between Package Date.');
            $this->redirect($req->headers->get('referer'));
            return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
        }
        #getOffDaysEntered

        $full_day_name = '';
        if ($meal_date) {
            $full_day_name = date('l', strtotime($meal_date));
        }

        $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
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
            $this->get('session')->getFlashBag()->set('error_msg', 'Given day is Off day for user.');
            $this->redirect($req->headers->get('referer'));
            return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
        }

        $freezeDays = [];
        $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                array(
                    "order_id" => $order_id,
                    "is_deleted" => 0
                )
        );
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
        $day_entered_as_pause = false;
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
                    if($pasue_end_date == NULL || $pasue_end_date == ''){
                        if(strtotime(date("Y-m-d")) >= $pause_start_date){
                            $day_entered_as_pause = true;
                        }
                    }
                }
                else if ($resume_choice == 'customer'){
                    if($pasue_end_date == NULL || $pasue_end_date == ''){
                        if(strtotime(date("Y-m-d")) >= $pause_start_date){
                            $day_entered_as_pause = true;
                        }
                    }
                    elseif($pause_end_date_by_update == NULL || $pause_end_date_by_update == ''){
                        if(strtotime(date("Y-m-d")) >= $pause_start_date){
                            $day_entered_as_pause = true;
                        }
                    }
                    $pasue_end_date = $pause_end_date_by_update ;
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
        $day_entered_as_freeze = false;
        if (!empty($freezeDays)) {
            if (in_array($meal_date, $freezeDays)) {
                $day_entered_as_freeze = true;
            }
        }
        if (!empty($PauseDays)) {
            if (in_array($meal_date, $PauseDays)) {
                $day_entered_as_pause = true;
            }
        }
        if ($day_entered_as_freeze) {
            $this->get('session')->getFlashBag()->set('error_msg', 'Given day is Freeze day for user.');
            $this->redirect($req->headers->get('referer'));
            return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
        }
        if ($day_entered_as_pause) {
            $this->get('session')->getFlashBag()->set('error_msg', 'Given day is Paused for user.');
            $this->redirect($req->headers->get('referer'));
            return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
        }

        $meal_id = $req->request->get('meal_id');
        $meal_type = $req->request->get('meal_type');
        $meal_qty = $req->request->get('meal_qty');
        $meal = $req->request->get('meal');
        $prot = $req->request->get('prot');
        $carb = $req->request->get('carb');
        $meal_qty = !empty($req->request->get('meal_qty')) ? $req->request->get('meal_qty') : 1;
        $raw_eggs = !empty($req->request->get('raw_eggs')) ? $req->request->get('raw_eggs') : 0;
        $white_eggs = !empty($req->request->get('white_eggs')) ? $req->request->get('white_eggs') : 0;

        //  $order_date_id =
        if ($meal == 0 || $meal == '' || $meal == NULL) {
            $this->get('session')->getFlashBag()->set('error_msg', 'Please Select  Meal');
            $this->redirect($req->headers->get('referer'));
            return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
        }


        #getMealIdOfDateGiven

        if (!empty($meal_date)) {

            if ($orderMaster) {
                $user_id = $orderMaster->getOrder_by();
                $meal_day = date('D', strtotime($req->request->get('meal_date')));

                $userMaster = $em->getRepository("AdminBundle:Usermaster")->findOneBy(["user_master_id" => $user_id]);

                $lat = 0;
                $lang = 0;
                if ($userMaster) {
                    $lat = $userMaster->getLat();
                    $lang = $userMaster->getLang();
                }
                $sql_meal = "select requested_datetime,order_meal_relation_id from order_meal_relation where requested_datetime = '$meal_date' and order_master_id = '$order_id' and is_deleted = 0  ";
                $stmt = $em->getConnection()->prepare($sql_meal);
                $stmt->execute();
                $mealOfGivenDay = $stmt->fetchAll();

                if (!empty($mealOfGivenDay)) {
                    $meal_id = $mealOfGivenDay[0]['order_meal_relation_id'];
                   
                } else {

                    $assign_driver = 0;
                    $st = 'ordered';

                    $unique_no = $this->getUniqueCode();
                    // get meal driver assigne d or not
                    $check_ordermeal_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(array("is_deleted" => 0, "user_id" => $user_id, "order_master_id" => $order_id));
                    if ($check_ordermeal_relation) {
                        foreach ($check_ordermeal_relation as $chkey => $chkval) {
                            if ($chkval->getAssign_driver_id() != 0) {
                                $assign_driver = $chkval->getAssign_driver_id();
                                $st = 'driver_assigned';
                                break;
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
                    $new_meal->setRequested_datetime($meal_date);
                    $new_meal->setAssign_driver_id($assign_driver);
                    $new_meal->setStatus($st);
                    $new_meal->setNot_delivered_reason(0);
                    $new_meal->setLat($lat);
                    $new_meal->setLang($lang);
                    $new_meal->setIs_deleted(0);
                    $em->persist($new_meal);
                    $em->flush();

                    $meal_id = $new_meal->getOrder_meal_relation_id();


                }
            }
        }

        #getPackageDetails
        $sql_pk_details = "select * from package_master JOIN order_master ON order_master.package_id = package_master.main_package_master_id where order_master.order_master_id = '$order_id' group by order_master_id";
        $pk_details = $this->fireQuery($sql_pk_details);

        if (!empty($pk_details)) {

            $sql_meal = "select requested_datetime,order_meal_relation_id from order_meal_relation where order_meal_relation_id = '$meal_id' and order_master_id = '$order_id' and is_deleted = 0 ";
            $stmt = $em->getConnection()->prepare($sql_meal);
            $stmt->execute();
            $mealOfGivenDay = $stmt->fetchAll();

            if (!empty($mealOfGivenDay)) {
                $meal_date = $mealOfGivenDay[0]['requested_datetime'];
            }

            #get Meal type Counts from in V2 table : order_meal_types_include_relation
            $order_start_date = $orderMaster->getStart_date();
            $sub_package_id = $orderMaster->getSub_package_id();

            $today = date('Y-m-d 00:00:00');

            $sql_ = "select sum(total_meal_type) as total_count,meal_type from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date <= '$meal_date' group by meal_type order by start_from_date DESC";
           // echo $sql_ ;
            $totalMealCount = $this->fireQuery($sql_);
            //var_dump($totalMealCount );
            $meals_allowed = 0;
            $package_snakes_allowed = 0;
            $soup_allowed = 0;
            if (!empty($totalMealCount)) {
                foreach ($totalMealCount as $_totalMealCount) {
                    if ($_totalMealCount['meal_type'] == 1 || $_totalMealCount['meal_type'] == 2) {
                        $meals_allowed = $meals_allowed + $_totalMealCount['total_count'];
                    }

                    if ($_totalMealCount['meal_type'] == 3) {
                        $package_snakes_allowed = $_totalMealCount['total_count'];
                    }

                    if ($_totalMealCount['meal_type'] == 11) {
                        $soup_allowed = $_totalMealCount['total_count'];
                    }
                }
            }
            #countCurrentMeals
            //$meal_added = "select count(meal_product_relation_id) as meal_added,meal_type from meal_product_relation where meal_product_relation.meal_id = '$meal_id' and meal_product_relation.is_deleted = 0  group by meal_type";
            $meal_added = "select  sum(meal_product_qty)  as meal_added,meal_type from meal_product_relation where meal_product_relation.meal_id = '$meal_id' and meal_product_relation.is_deleted = 0  group by meal_type";
           // echo $meal_added ;
            $addedMealDetails = $this->fireQuery($meal_added);
            $snakes_added = 0;
            $breakfast_added = 0;
            $soup_added = 0;
            $meal_added = 0;


            if (!empty($addedMealDetails)) {
                foreach ($addedMealDetails as $_addedMealDetails) {
                    if ($_addedMealDetails['meal_type'] == 1) {
                        //breakfast
                        $breakfast_added = $_addedMealDetails['meal_added'];
                    }
                    if ($_addedMealDetails['meal_type'] == 2) {
                        //meal
                        $meal_added = $_addedMealDetails['meal_added'];
                    }
                    if ($_addedMealDetails['meal_type'] == 3) {
                        //meal
                        $snakes_added = $_addedMealDetails['meal_added'];
                    }
                    if ($_addedMealDetails['meal_type'] == 11) {
                        //meal
                        $soup_added = $_addedMealDetails['meal_added'];
                    }
                }
            }
         
	   /* var_dump($meal_type );
           var_dump($package_snakes_allowed );
           var_dump($soup_allowed );
	   exit; */
            $addedFlag = false;
            if ($meal_type == 1 || $meal_type == 2) {
                if ($meals_allowed > ($meal_added + $breakfast_added )) {
                    #add
                    $addedFlag = true;
                }
            } else {
                if ($package_snakes_allowed > ($snakes_added)) {
                    #add
                    $addedFlag = true;
                }
                if ($soup_allowed > $soup_added) {
                    $addedFlag = true;
                }
            }
//var_dump($addedFlag ); 
//exit;
            if ($addedFlag) {
                // check Meal Product Relation with meal id and product id and meal type 
                $checkMealProductrelation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Mealproductrelation")
                        ->findOneBy(array("is_deleted" => 0, "meal_id" => $meal_id, "meal_type" => $meal_type, "main_product_id" => $meal));
                if ($checkMealProductrelation) {
                    $newMeal = $checkMealProductrelation;
                    $newMeal->setMeal_product_qty($meal_qty);
                    $em->flush();
                    $this->get('session')->getFlashBag()->set('success_msg', 'Meal has been Updated with Qty');
                } else {
                    // check QTY update allowed or not 
                    $addedFlag = false;
                    if ($meal_type == 1 || $meal_type == 2) {
                        if ($meals_allowed >= ($meal_added + $breakfast_added + $meal_qty )) {
                            #add
                            $addedFlag = true;
                        }
                    } else {
                        if ($package_snakes_allowed >= ($snakes_added + $meal_qty)) {
                            #add
                            $addedFlag = true;
                        }
                        if ($soup_allowed >= ($soup_added + $meal_qty)) {
                            $addedFlag = true;
                        }
                    }

                    $qur = "SELECT  sum(meal_product_qty) as product_added FROM `meal_product_relation` WHERE `meal_id` = " . $meal_id . " and main_product_id = " . $meal . " and is_deleted = 0";
                    $res = $this->fireQuery($qur);
                    $product_meal_added = 0;
                    if ($res) {
                        $product_meal_added = (int) $res[0]['product_added'];
                    }
                    $meal_added_going_to_be = $product_meal_added + $meal_qty;
                    $product_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->find($meal);
                    $product_max_qty = $product_info->getMax_meal_value();

                    if ($meal_added_going_to_be <= $product_max_qty) {
                        
                    } else {

                        $addedFlag = false;
                        $this->get('session')->getFlashBag()->set('error_msg', 'Product Max Meal Count Exceeds');
                        return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
                    }
                    if ($addedFlag) {
                        $calory = 0 ;
                        $product_combination_master_calory = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findOneBy(array("is_deleted"=>0,"sub_pakage_id"=>$sub_package_id,"prot_type"=>"calory","product_master_id"=>$meal));
                        if($product_combination_master_calory){
                            $calory = $product_combination_master_calory->getProt_crab() ; 
                        }
                        $newMeal = new Mealproductrelation();
                        $newMeal->setMain_product_id($meal);
                        $newMeal->setMeal_product_qty($meal_qty);
                        $newMeal->setProteins_amount($prot);
                        $newMeal->setCarbs_amount($carb);
                        $newMeal->setRaw_eggs($raw_eggs);
                        $newMeal->setWhite_eggs($white_eggs);
                        $newMeal->setCalory($calory);
                        $newMeal->setMeal_type($meal_type);
                        $newMeal->setIs_deleted(0);
                        $newMeal->setMeal_id($meal_id);

                        $em->persist($newMeal);
                        $em->flush();
                        $this->get('session')->getFlashBag()->set('success_msg', 'Meal has been Added');
                    } else {
                        $this->get('session')->getFlashBag()->set('error_msg', 'Meal Limit Exceeds Due to Added Qty ');
                    }
                }
            } else {
                $this->get('session')->getFlashBag()->set('error_msg', 'Meal Count Exceeds');
            }
        }

        return $this->redirectToRoute("admin_orders_getmealsdatewisefilter", array("order_id" => $order_id, "quick_access" => "all"));
    }

    /**
     * @Route("/orders/getMealsByType")
     * @Template()
     */
    public function getMealsByTypeAction(Request $req) {
        $meal_type_id = $req->request->get('meal_type_id');
        $main_sub_package_id = $req->request->get('main_sub_package_id');
        $subpackageInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagemaster")->findOneBy(array("main_sub_package_id" => $main_sub_package_id, "is_deleted" => 0));
        $main_package_id = 0;
        if ($subpackageInfo) {
            $main_package_id = $subpackageInfo->getMain_package_id();
        }
        $req_date = $req->request->get('req_date');
        $req_day_name = date('l', strtotime($req_date));
        $day_query = "SELECT main_days_master_id FROM `days_master` where days_name = '" . $req_day_name . "' and language_id =1 and is_deleted = 0 ";
        $day_list = $this->fireQuery($day_query);
        $day_id = 0;
        if ($day_list) {
            $day_id = $day_list[0]['main_days_master_id'];
        }
		$_ac_schedule_week_id = date('W', strtotime($req_date) );
        $schedule_week_id = ( $_ac_schedule_week_id % 2 == 0 ) ? "2" : "1" ; 
        if($schedule_week_id == "1"){
            $schedule_week_id = "week1,week3,week5";
        }
        else{
            $schedule_week_id = "week2,week4";
        }
        if ($main_package_id == 0) {
            $sql = "select * from product_master where product_master.is_deleted = '0' and product_master.main_product_category_id = '$meal_type_id' group by main_product_master_id";
        } else {
            $sql = "select * from product_master where product_master.is_deleted = '0' and product_master.main_product_category_id = '$meal_type_id'  and main_product_master_id IN (SELECT main_product_id  FROM `product_package_relation` WHERE `main_package_id` = " . $main_package_id . " AND `is_deleted` = 0 and main_product_id IN (SELECT main_product_id FROM `product_availability` WHERE `main_days_id` = " . $day_id . " AND `is_deleted` = 0 AND week_id = '".$schedule_week_id."' ))  group by main_product_master_id";
        }
        $main_product = $this->fireQuery($sql);

        $html = '<option value="0">--Select Meal --</option>';

        if (!empty($main_product)) {
            foreach ($main_product as $_main_product) {
                $html .= "<option value='" . $_main_product['main_product_master_id'] . "'>" . $_main_product['product_name'] . "</option>";
            }
        }

        return new Response($html);
    }

    /**
     * @Route("/orders/editMeal")
     * @Template()
     */
    public function editMealAction(Request $req) {
        $product = $req->request->get('product');
        $pro = $req->request->get('pro');
        $carbs = $req->request->get('carbs');
        $eggs = $req->request->get('eggs');
        $white_eggs = $req->request->get('white_eggs');
        $meal_rel = $req->request->get('meal_rel');
        $meal_qty = $req->request->get('meal_qty');
        $em = $this->getDoctrine()->getManager();
        $meal_product = $em->getRepository("AdminBundle:Mealproductrelation")->findOneBy(['meal_product_relation_id' => $meal_rel]);
        $data = null;

        if ($meal_product) {
            $meal_date = $order_id = NULL;
            $meal_id = $meal_product->getMeal_id();
            $meal_type = $meal_product->getMeal_type();
          
            // need to check limit then Update Due to new Update of Qty 
            $order_meal_relation = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->find($meal_product->getMeal_id());
            if ($order_meal_relation) {
                $meal_date = $order_meal_relation->getRequested_datetime();
                $order_id = $order_meal_relation->getOrder_master_id();
            }
            $sql_ = "select sum(total_meal_type) as total_count,meal_type from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date <= '$meal_date' group by meal_type order by start_from_date DESC";
            $totalMealCount = $this->fireQuery($sql_);
            $meals_allowed = 0;
            $package_snakes_allowed = 0;
            $soup_allowed = 0;
            if (!empty($totalMealCount)) {
                foreach ($totalMealCount as $_totalMealCount) {
                    if ($_totalMealCount['meal_type'] == 1 || $_totalMealCount['meal_type'] == 2) {
                        $meals_allowed = $meals_allowed + $_totalMealCount['total_count'];
                    }

                    if ($_totalMealCount['meal_type'] == 3) {
                        $package_snakes_allowed = $_totalMealCount['total_count'];
                    }

                    if ($_totalMealCount['meal_type'] == 11) {
                        $soup_allowed = $_totalMealCount['total_count'];
                    }
                }
            }
            #countCurrentMeals
            //$meal_added = "select count(meal_product_relation_id) as meal_added,meal_type from meal_product_relation where meal_product_relation.meal_id = '$meal_id' and meal_product_relation.is_deleted = 0  group by meal_type";
            $meal_added = "select  sum(meal_product_qty)  as meal_added,meal_type from meal_product_relation where meal_product_relation.meal_id = '$meal_id' and meal_product_relation.is_deleted = 0  group by meal_type";
            $addedMealDetails = $this->fireQuery($meal_added);
            $snakes_added = 0;
            $breakfast_added = 0;
            $soup_added = 0;
            $meal_added = 0;
            if (!empty($addedMealDetails)) {
                foreach ($addedMealDetails as $_addedMealDetails) {
                    if ($_addedMealDetails['meal_type'] == 1) {
                        //breakfast
                        $breakfast_added = $_addedMealDetails['meal_added'];
                        if($meal_type == 1){
                            $breakfast_added = $breakfast_added - $meal_product->getMeal_product_qty() ;
                        }
                    }
                    if ($_addedMealDetails['meal_type'] == 2) {
                        //meal
                        $meal_added = $_addedMealDetails['meal_added'];
                        if($meal_type == 2){
                            $meal_added = $meal_added - $meal_product->getMeal_product_qty() ;
                        }
                    }
                    if ($_addedMealDetails['meal_type'] == 3) {
                        //meal
                        $snakes_added = $_addedMealDetails['meal_added'];
                        if($meal_type == 3){
                            $snakes_added = $snakes_added - $meal_product->getMeal_product_qty() ;
                        }
                    }
                    if ($_addedMealDetails['meal_type'] == 11) {
                        //meal
                        $soup_added = $_addedMealDetails['meal_added'];
                        if($meal_type == 3){
                            $soup_added = $soup_added - $meal_product->getMeal_product_qty() ;
                        }
                    }
                }
            }
//            var_dump($meals_allowed); //3 
//            var_dump($meal_added);//2
//            var_dump($breakfast_added);//1
//            
//            var_dump( $meal_product->getMeal_product_qty() );// 2
//            var_dump($meals_allowed > ($meal_added + $breakfast_added + $meal_qty ) );
//            exit;
            $addedFlag = false;
            if ($meal_type == 1 || $meal_type == 2) {
                if ($meals_allowed > ($meal_added + $breakfast_added - $meal_product->getMeal_product_qty() + $meal_qty )) {
                    #add
                    $addedFlag = true;
                }
            } else {
                if ($package_snakes_allowed > ($snakes_added - $meal_product->getMeal_product_qty() )) {
                    #add
                    $addedFlag = true;
                }
                if ($soup_allowed > $soup_added - $meal_product->getMeal_product_qty()) {
                    $addedFlag = true;
                }
            }
            if ($addedFlag && $meal_qty != 0 ) {
                $meal_product->setMain_product_id($product);
                $meal_product->setProteins_amount($pro);
                $meal_product->setCarbs_amount($carbs);
                $meal_product->setRaw_eggs($eggs);
                $meal_product->setWhite_eggs($white_eggs);
                $meal_product->setMeal_product_qty($meal_qty);

                $em->flush();

                $main_product = $em->getRepository("AdminBundle:Productmaster")->findOneBy(['main_product_master_id' => $product]);
                if ($main_product) {
                    $product_name = $main_product->getProduct_name();
                } else {
                    $product_name = '';
                }

                $data = array('product_name' => $product_name, 'pro' => $pro, 'carbs' => $carbs, 'eggs' => $eggs, 'white_eggs' => $white_eggs);
            } else {
                $data = false;
            }
        }

        if ($data) {
            return new Response(json_encode($data));
        } else {
            return new Response('not_done');
        }
    }

    /**
     * @Route("/orders/deletemeal")
     * @Template()
     */
    public function deletemealAction(Request $req) {
        $meal_id = $req->request->get('meal_id');
        $order_id = $req->request->get('order_id');
        $em = $this->getDoctrine()->getManager();
        $meal_product = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(['order_meal_relation_id' => $meal_id]);
        $data = false;

        if ($meal_product) {
            $meal_product->setIs_deleted(1);
            $em->flush();
            $data = true;
        }
        return new Response(json_encode($data));
    }

    /**
     * @Route("/orders/setSubscriptionIds")
     * @Template()
     */
    public function setSubsAction(Request $req) {
        $em = $this->getDoctrine()->getManager();
        $orderMaster = $em->getRepository("AdminBundle:Ordermaster")->findAll();
        $counter = 1000;

        foreach ($orderMaster as $_orderMaster) {
            $_orderMaster->setUnique_no($counter);
            $em->flush();
            $counter = $counter + 1;
        }

        exit('DoneHere');
    }

    /**
     * @Route("/orders/getTotalOrders/{quick_access}/{order_id}",defaults={"quick_access"="all_by_order","order_id"="0"})
     * @Template()
     */
    public function gettotalordersAction(Request $req, $quick_access, $order_id) {
        
        $sub_package_details_grams = 0;
        $main_sub_package_id = 0;
        $sql_get_package_details = "select sub_package_master.grams,main_sub_package_id from order_master
             JOIN sub_package_master ON sub_package_master.main_sub_package_id = order_master.sub_package_id where order_master_id = '$order_id' and order_master.is_deleted = 0 and sub_package_master.is_deleted = 0 group by order_master_id ";
        $sub_package_details = $this->fireQuery($sql_get_package_details);


        if (!empty($sub_package_details)) {
            $sub_package_details_grams = $sub_package_details[0]['grams'];
            $main_sub_package_id = $sub_package_details[0]['main_sub_package_id'];
        }
        $products_all = null;

        $sql = "select * from product_category_master where is_deleted = 0 group by main_product_category_master_id";
        $meal_cat_all = $this->fireQuery($sql);

        $languages = $this->getLanguages();

        $main_product = null;
        $products = null;

        $data_found = false;
        $date = '';
        $data = null;
        $all_true = false;
        $total_orders_of_day = 0;
        if ($quick_access == 'tommorow') {
            //$date = date('Y-m-d',strtotime('+1 days',strtotime(date('Y-m-d'))));
            $date = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d'))));
// need to chage date
            //$date = '2018-12-27';
        } else if ($quick_access == 'day_after_tommorow') {
            $date = date('Y-m-d', strtotime('+2 days', strtotime(date('Y-m-d'))));
        } else if ($quick_access == 'all') {
            $all_true = true;
            //echo'<pre>';print_r($req->request->get('order_date'));die('test');
            $date = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : date('Y-m-d');
        } else {
            $date = !empty($req->request->get('order_date')) ? date('Y-m-d', strtotime($req->request->get('order_date'))) : date('Y-m-d');
        }
        $table_html = '';
        $over_all_html = '';

        if ($all_true) {echo $all_true;
            if ($order_id != 0) {
                if ($date) {
                    $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                            array('requested_datetime' => $date, 'order_master_id' => $order_id, 'is_deleted' => 0), array('requested_datetime' => 'DESC'));
                } else {
                    $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                            array('order_master_id' => $order_id, 'is_deleted' => 0), array('requested_datetime' => 'DESC'));
                }
            } else {
                $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(
                        array('is_deleted' => 0), array('requested_datetime' => 'DESC'));
            }
        } 
        else {
            $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")
                    ->findBy(array('requested_datetime' => $date,'is_deleted'=>0));
                    //->findBy(array('requested_datetime' => $date));

        }

        $checkPauseQuery = "SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date_by_update >= '{$date}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date >= '{$date}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))";
        $checkPauseList = $this->firequery($checkPauseQuery);
       // echo $checkPauseQuery ;
        $pasueOrderArray = NULL ;
      $order_meal_id_arr = [] ; 
        if($checkPauseList){
           foreach($checkPauseList as $chkpkey=>$chkpval){
                $pasueOrderArray[] = $chkpval['order_id'];
                
           }
           foreach ($order_meal as $mealkey => $meal_) {

                if(in_array($meal_->getOrder_master_id(), $pasueOrderArray)){
                    
                    unset($order_meal[$mealkey]);
                }
                else{

                    $order_meal_id_arr[] =  $meal_->getOrder_meal_relation_id() ;

                }
           }
        }
       $order_meal_id_str = ''; 
        if($order_meal_id_arr != NULL && !empty($order_meal_id_arr )){
            $order_meal_id_str = implode(",", $order_meal_id_arr);
        }
        $drivers = null;
        $products_array_all = null;
        $notes = null;
        $total_orders_of_day = count($order_meal);


       if (!empty($order_meal) && $order_meal_id_str != '' ) {
            //foreach ($order_meal as $meal_) {

               // $order_id = $meal_->getOrder_master_id();

                //$customer_name = '';
                $meal_id = $meal_->getOrder_meal_relation_id();
               // $date_time = $meal_->getRequested_datetime();
                //$not_delivered_reason = $meal_->getNot_delivered_reason();
                //$driver_id = $meal_->getAssign_driver_id();
                //$last_modified_datetime = date('Y-m-d h:i A', strtotime($meal_->getLast_modified_datetime()));
               // $status_name = ucfirst(str_replace("_", ' ', $meal_->getStatus()));

                $sql_product_name = "select
                meal_product_relation.meal_product_relation_id,product_category_master.product_category_name,product_master.product_name,product_master.main_product_master_id,meal_product_relation.proteins_amount,meal_product_relation.carbs_amount,meal_product_relation.raw_eggs,meal_product_relation.white_eggs,meal_product_relation.meal_type,group_concat(distinct meal_id) as meal_id
                           from meal_product_relation JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                           LEFT JOIN product_category_master ON      meal_product_relation.meal_type =  product_category_master.main_product_category_master_id
                           where meal_product_relation.is_deleted = 0 and product_master.is_deleted = 0 and product_category_master.is_deleted = 0 and meal_id IN (".$order_meal_id_str.") group by meal_product_relation.main_product_id";
                // echo "OrderId : ". $order_id . " ";
                //  echo $sql_product_name ;
                $products = $this->fireQuery($sql_product_name);
                
                if (!empty($products)) {
     $sql = "select * from order_note_master where is_deleted=0 group by main_order_note_id";
              
                $notes = $this->fireQuery($sql);
                $i=0;
                    foreach ($products  as $product) {
                  



                        $products_array_all [$i] = array(
                            'meal_product_relation_id' => $product['meal_product_relation_id'],
                            'main_product_master_id' => $product['main_product_master_id'],
                            'product_name' => $product['product_name'],
                            'proteins_amount' => $product['proteins_amount'],
                            'carbs_amount' => $product['carbs_amount'],
                            'raw_eggs' => $product['raw_eggs'],
                            'white_eggs' => $product['white_eggs'],
                            'meal_type' => $product['meal_type'],
                            'order_meal_type_name' => $product['product_category_name'],
                            'cnt' => 0
                        );
                         foreach($notes as $note){
                    $note_count = "select count(order_note_id) as total_count from order_master 
join order_meal_relation on order_meal_relation.order_master_id=order_master.order_master_id where order_note_id='".$note['main_order_note_id']."' and  order_meal_relation_id in (".$product['meal_id'].")" ;
$notes_count = $this->fireQuery($note_count);

if(!empty($notes_count)){
    $products_array_all[$i]['note_'.$note['main_order_note_id']]=$notes_count[0]['total_count'];
}else{
     $products_array_all[$i]['note_'.$note['main_order_note_id']]=0;
}
}
//to get count of normal users without any note
        $normal_note =  "select count(order_note_id) as total_count from order_master 
        join order_meal_relation on order_meal_relation.order_master_id=order_master.order_master_id where order_note_id=0 and  order_meal_relation_id in (".$product['meal_id'].")" ;
        $normal_count = $this->fireQuery($normal_note);
        $products_array_all[$i]['normal']=$normal_count[0]['total_count'];
                                $i++;
                    }
                }
                
           // }
        }

        $productWiseData = array();
       /* if (!empty($products_array_all)) {
            foreach ($products_array_all as $_products_array_all) {

                if (!array_key_exists($_products_array_all['main_product_master_id'], $productWiseData)) {
                    $productId = $_products_array_all['main_product_master_id'];
                    $productWiseData[$productId] = array(
                        'name' => $_products_array_all['product_name'],
                        'proteins_amount' => $_products_array_all['proteins_amount'],
                        'carbs_amount' => $_products_array_all['carbs_amount'],
                        'raw_eggs' => $_products_array_all['raw_eggs'],
                        'white_eggs' => $_products_array_all['white_eggs'],
                        'order_meal_type_name' => $_products_array_all['order_meal_type_name'],
                        'cnt' => $_products_array_all['cnt'] + 1
                    );
                } else {
                    $productId = $_products_array_all['main_product_master_id'];

                    $productWiseData[$productId] = array(
                        'name' => $_products_array_all['product_name'],
                        'proteins_amount' => (int) $productWiseData[$productId]['proteins_amount'] + (int) $_products_array_all['proteins_amount'],
                        'carbs_amount' => $productWiseData[$productId]['carbs_amount'] + $_products_array_all['carbs_amount'],
                        'raw_eggs' => $productWiseData[$productId]['raw_eggs'] + $_products_array_all['raw_eggs'],
                        'white_eggs' => $productWiseData[$productId]['white_eggs'] + $_products_array_all['white_eggs'],
                        'order_meal_type_name' => $_products_array_all['order_meal_type_name'],
                        'cnt' => $productWiseData[$productId]['cnt'] + 1
                    );
                }
            }
        }*/

        //echo "<pre>";print_r($productWiseData);exit;

        if ($date == '') {
            return array('order_data' => $products_array_all, 'date' => '','notes'=>$notes);
        } else {
            return array('order_data' => $products_array_all, 'date' => date('m/d/Y', strtotime($date)), 'total_order_of_day' => $total_orders_of_day,'notes'=>$notes);
        }

//
    }

    /**
     * @Route("/changedayoffstatus")
     * @Template()
     */
    public function changedayoffstatusAction(Request $req) {

        $daySmallNames = array(
            '',
            'mon', 
            'tue', 
            'wed', 
            'thu', 
            'fri', 
            'sat', 
            'sun',
         );
        $domain_id = $this->get('session')->get('domain_id');
        $day_id = $req->request->get('day_master_id');
        $order_master_id = $req->request->get('order_master_id');
        $status = true; // $req->request->get('status');

        $em = $this->getDoctrine()->getManager();
        $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(array("order_master_id" => $order_master_id));
        $sql = "SELECT * FROM `order_off_days_relation` WHERE `order_id` = " . $order_master_id . " AND `is_deleted` = 0 and off_day = " . $day_id;

        $package_for = $orderInfo->getPackage_for();
        $offDays = $this->fireQuery($sql);
        if (!empty($offDays) && $status == 'false') {
            $sql = "UPDATE order_off_days_relation set is_deleted = 1 where order_id = " . $order_master_id . " and off_day = " . $day_id;
            $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
            $stmt->execute();
        } elseif ($status == "true" && empty($offDays)) {
            $order_off_days_relation = new Orderoffdaysrelation();
            $order_off_days_relation->setOrder_id($order_master_id);
            $order_off_days_relation->setOff_day($day_id);
            $order_off_days_relation->setCreated_datetime(date("Y-m-d H:i:s"));
            $order_off_days_relation->setIs_deleted(0);
            $em->persist($order_off_days_relation);
            $em->flush();

            $deleteDayname = $daySmallNames[$day_id] ;
            $deleteQuery = "UPDATE `order_meal_relation` SET  is_deleted = 1 WHERE `order_master_id` = ".$order_master_id." and meal_day = '".$deleteDayname."' and is_deleted = 0 and requested_datetime >='".date('Y-m-d')."' " ;

           // echo $deleteQuery ;exit;
            $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($deleteQuery);
            $stmt->execute();
        }
        // ----------------------------------
        $sql = "SELECT * FROM `order_off_days_relation` WHERE `order_id` = " . $order_master_id . " AND `is_deleted` = 0 ";
        $offDaysList = $this->fireQuery($sql);
        $offDayArray = NULL;
        if ($offDaysList) {
            foreach ($offDaysList as $oval) {
                //$offDayArray[] = array('main_days_master_id'=>$oval['off_day'] );
                $offDayArray[] = $oval['off_day'];
            }
        }
        $sql_pk_days = "select days from package_for_master where is_deleted = 0 and main_package_for_master_id = '$package_for' group by main_package_for_master_id";
        $days = $this->fireQuery($sql_pk_days);
        $dates = null;
        $order_start_date = strtotime($orderInfo->getStart_date());
        $order_end_date = strtotime($orderInfo->getEnd_date());

        // get freeze package dates
        $order_suspend_history_sql = "select * from freeze_subpackage where order_id = '$order_master_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";
        $suspendHistory = $this->fireQuery($order_suspend_history_sql);
        $suspend_dates = [];
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
        // get pause Dates
        $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $order_master_id,
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

        if ($days) {
            $today = date("Y-m-d");
            $pk_days = $days[0]['days'];
            $order_end_date = strtotime("+$pk_days days", $order_start_date);
            while ($pk_days > 0) {
                if (!in_array(date("Y-m-d", $order_start_date), $suspend_dates) &&  !in_array(date("Y-m-d", $order_start_date), $PauseDays) ) {


                    if ($order_start_date > strtotime($today)) {

                        if ($order_start_date <= $order_end_date) {
                            if (!in_array(date('N', $order_start_date), $offDayArray)) {
                                $dates [] = date('Y-m-d', $order_start_date);
                                $pk_days = $pk_days - 1;
                            }
                        } else {
                            #for extending day no need to include friday as off_day not regular off day
                            if (!in_array(date('N', $order_start_date), $offDayArray) && date('N', $order_start_date) != 5) {
                                $dates [] = date('Y-m-d', $order_start_date);
                                $pk_days = $pk_days - 1;
                            }
                        }
                    } 
                    elseif ($order_start_date <= strtotime($today)) {


                        if (date('N', $order_start_date) != $day_id) {
                            if ($order_start_date <= $order_end_date) {
                                if (!in_array(date('N', $order_start_date), $offDayArray)) {
                                    $dates [] = date('Y-m-d', $order_start_date);
                                    $pk_days = $pk_days - 1;
                                }
                            } else {
                                #for extending day no need to include friday as off_day not regular off day
                                if (!in_array(date('N', $order_start_date), $offDayArray) && date('N', $order_start_date) != 5) {
                                    $dates [] = date('Y-m-d', $order_start_date);
                                    $pk_days = $pk_days - 1;
                                }
                            }
                        } else {
                            $dates [] = date('Y-m-d', $order_start_date);
                            $pk_days = $pk_days - 1;
                        }
                    }
                }
                else{
                  //  echo "<br> Days in Araay : " . date("Y-m-d", $order_start_date) ;
                }
                if ($pk_days > 0) {
                    $order_start_date = strtotime("+1 days", $order_start_date);
                }
            }
        }


        $end_date = date('Y-m-d', $order_start_date);

        $orderInfo->setEnd_date($end_date);
        $em->flush();
        return new Response('done');
    }

    /**
     * @Route("/changeordersubscription")
     * @Template()
     */
    public function changeordersubscriptionAction(Request $req) {
        $domain_id = $this->get('session')->get('domain_id');
        $day_id = $req->request->get('day_master_id');
        $req_date = $req->request->get('req_date');
        $order_master_id = $req->request->get('order_master_id');
        $status = $req->request->get('status'); // if true then add , if false then remove

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

                    // check freeze dates entries
                    $freeze_subpackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->findOneBy(array("is_deleted"=>0,"start_date"=>$req_date,"order_id"=>$order_master_id));
                    if(empty($freeze_subpackage)){
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
                            $single_start_date = $singleRecordFreezepackage->getStart_date();
                            $single_end_date = $singleRecordFreezepackage->getEnd_date();
                            $AllOtherRecordFreezepackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->findBy(array("start_date"=>$single_start_date,"end_date"=>$single_end_date,"order_id"=>$singleRecordFreezepackage->getOrder_id(),"is_deleted"=>0) );
                            if($AllOtherRecordFreezepackage){
                                foreach($AllOtherRecordFreezepackage as $allkey=>$allval){
                                    $allval->setIs_deleted(1);
                                    $em->flush();
                                }
                            }
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

                 // check freeze dates entries
                $freeze_subpackage = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Freezesubpackage")->findOneBy(array("is_deleted"=>0,"start_date"=>$req_date,"order_id"=>$order_master_id));
                if(empty($freeze_subpackage)){
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
        }

       
        $end_date = date('Y-m-d', $order_end_date);
        if ($days) {

            $pk_days = $days[0]['days'];
          //  $order_end_date = strtotime("+$pk_days days", $order_start_date);
            $todayCheckDate = strtotime(date("Y-m-d"));
            $passedWorkingdays = 0 ; 
            $updated_end_datewill_be = $order_end_date;
          
            if($status == "true"){ // Add days 
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
            else{
                for($i = 0 ; $i < 1 ; ){                    
                    $newUpdated_order_end_date = strtotime("-1 days", $updated_end_datewill_be);              
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
        }
       
        $orderInfo->setEnd_date($end_date);
        $em->flush();
        return new Response('done');
    }

    /**
     * @Route("/adddaystoorder")
     * @Template()
     */
    public function adddaystoorderAction(Request $req) {
        $domain_id = $this->get('session')->get('domain_id');
        $user_id = $this->get('session')->get('user_id');
        $no_of_days_add = $req->request->get('no_of_days_add');
        $order_master_id = $req->request->get('order_master_id');
        $em = $this->getDoctrine()->getManager();
        $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(array("order_master_id" => $order_master_id,"pause_status"=>"no"));

        if ($orderInfo) {
            $customer_id = $orderInfo->getOrder_by();
            $new_date = $order_end_date = $orderInfo->getEnd_date();
            // check order off days
            $sql = "SELECT * FROM `order_off_days_relation` WHERE `order_id` = " . $order_master_id . " AND `is_deleted` = 0 ";
            $offDaysList = $this->fireQuery($sql);
            $offDayArray = NULL;
            if ($offDaysList) {
                foreach ($offDaysList as $oval) {
                    $offDayArray[] = $oval['off_day'];
                }
            }


            for ($i = 1; $i <= $no_of_days_add; $i++) {
                $new_date = date('Y-m-d', strtotime($new_date . ' + 1 days'));
                $new_date_week_no = date('w', strtotime($new_date));
                while (in_array($new_date_week_no, $offDayArray)) {
                    $new_date = date('Y-m-d', strtotime($new_date . ' + 1 days'));
                    $new_date_week_no = date('w', strtotime($new_date));
                }
            }
            $orderInfo->setEnd_date($new_date);
            $em->flush();
            $added_extra_days_order = new Addedextradaysorder();
            $added_extra_days_order->setOrder_id($order_master_id);
            $added_extra_days_order->setAdded_days($no_of_days_add);
            $added_extra_days_order->setOld_order_end_date($order_end_date);
            $added_extra_days_order->setNew_order_end_date($new_date);
            $added_extra_days_order->setAdded_datetime(date("Y-m-d H:i:s"));
            $added_extra_days_order->setAdded_by($user_id);
            $em->persist($added_extra_days_order);
            $em->flush();

            // send notification from here 
            $userIDArray[] = $customer_id;
            $send_to = 'customer';
            $app_id = 'CUST';
            $title = 'Topped up';
            $message = 'Your account has been topped up with ' . $no_of_days_add . ' days';
            $domain_id = $this->get('session')->get('domain_id');
            if ($userIDArray != NULL) {
                $general_notification = new Generalnotification();
                $general_notification->setNotification_type('general');
                $general_notification->setTitle($title);
                $general_notification->setMessage($message);
                $general_notification->setImage_id(0);
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
                $gcm_regids = $this->find_gcm_regid($userIDArray);
                if (!empty($gcm_regids)) {
                    if (count($gcm_regids) > 0) {
                        $this->send_notification($gcm_regids, $title, $message, 2, $app_id, $domain_id, "general_notification", $notification_id_send);
                    }
                }
                $apns_regids = $this->find_apns_regid($userIDArray);
                if (!empty($apns_regids)) {
                    if (count($apns_regids[0]) > 0) {
                        $this->send_notification($apns_regids, $title, $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
                    }
                }
            }
            return new Response('done');
        }
        return new Response('notdone');
    }/**
     * @Route("/expireorderbeforedate")
     * @Template()
     */
    public function expireorderbeforedateAction(Request $req) {
        $domain_id = $this->get('session')->get('domain_id');        
        $expire_after_this_date = $req->request->get('expire_on_date');
        $order_master_id = $req->request->get('order_master_id');
        $em = $this->getDoctrine()->getManager();
        
        $orderInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(array("order_master_id" => $order_master_id));

        if ($orderInfo) {
           $em = $this->getDoctrine()->getManager();
            //$expire_after_this_date  = '2020-03-27' ;
            $day_id = 0;
            $domain_id = $this->get('session')->get('domain_id');
            $query ="SELECT * FROM `order_master` where package_id IN (SELECT main_package_master_id FROM `package_master` WHERE `festival_affect` = 'yes' AND `package_type` = 'normal' AND `is_deleted` = 0 GROUP by main_package_master_id ) and end_date >= '".$expire_after_this_date."' and order_status = 'success' and order_master_id =  " . $order_master_id;
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
                   
                  
                    $actual_paid_amount = $oval['package_amount'] - $oval['promo_code_discount'];
               
                    $amount_onExpiry_withThis_date = (float)($actual_paid_amount / $packageTotalDaysCount ) * ( $packageTotalDaysCount - $passed_days_cnt ) ;
                 
                    $order_end_date_after_expire =  $expire_after_this_date;


                    $order_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_master_id);
                    if($order_info){
                        $updated_endDate = date('Y-m-d', strtotime($expire_after_this_date. '-1 days')) ; 
                       
                       

                        if(strtotime($order_info->getStart_date()) > strtotime($updated_endDate) ){
                            $order_info->setOrder_status('cancel');
                          //  var_dump($order_info);
                            $amount_onExpiry_withThis_date = (float)$order_info->getPackage_amount() - $order_info->getPromo_code_discount() ;
                          //  var_dump($amount_onExpiry_withThis_date);exit ; 
                        }
                        else{
                             $order_info->setEnd_date($updated_endDate);
                        }
                           $em->flush();
                        $wallet_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("is_deleted"=>0,"user_master_id"=>$order_info->getCreated_by()));
                        if($wallet_info){
                             $previous_wallet_amount = (float)$wallet_info->getWallet_amount() ; 
                            $tt_amount  = (float)($previous_wallet_amount + $amount_onExpiry_withThis_date);
                           
                            $wallet_info->setWallet_amount($tt_amount);
                            $wallet_info->setWallet_last_updated(date("Y-m-d H:i:s"));
                            $em->flush();

                            $wallet_transaction_history = new Wallettransactionhistory();
                            $wallet_transaction_history->setWallet_master_id($wallet_info->getWallet_master_id());
                            $wallet_transaction_history->setUser_master_id($wallet_info->getUser_master_id());
                            $wallet_transaction_history->setWallet_action('plus');
                            $wallet_transaction_history->setTransaction_for('package_expire');
                            $wallet_transaction_history->setTransaction_for_id( $order_master_id);
                            $wallet_transaction_history->setPrevious_amount($previous_wallet_amount);
                            $wallet_transaction_history->setAfter_action_amount($tt_amount);
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

                            // send notification from here 
                            $userIDArray[] = $order_info->getCreated_by();
                            $send_to = 'customer';
                            $app_id = 'CUST';
                            $title = 'order cancelled';
                            $message = 'Your Order has been Cancelled and amount refunded ' ;
                            $domain_id = $this->get('session')->get('domain_id');
                            if ($userIDArray != NULL) {
                                $general_notification = new Generalnotification();
                                $general_notification->setNotification_type('general');
                                $general_notification->setTitle($title);
                                $general_notification->setMessage($message);
                                $general_notification->setImage_id(0);
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
                                $gcm_regids = $this->find_gcm_regid($userIDArray);
                                if (!empty($gcm_regids)) {
                                    if (count($gcm_regids) > 0) {
                                        $this->send_notification($gcm_regids, $title, $message, 2, $app_id, $domain_id, "general_notification", $notification_id_send);
                                    }
                                }
                                $apns_regids = $this->find_apns_regid($userIDArray);
                                if (!empty($apns_regids)) {
                                    if (count($apns_regids[0]) > 0) {
                                        $this->send_notification($apns_regids, $title, $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
                                    }
                                }
                            }

                        }
                    }
                     return new Response('done');

                   // exit;
                }
            }
        }
        return new Response('notdone');
    }

    /**
     * @Route("/orders/cancelorderupdate")
     * @Template()
     */
    public function cancelorderupdateAction(Request $req) {
        $order_master_id = $req->request->get('order_master_id');

        $em = $this->getDoctrine()->getManager();

        $orders = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(['order_master_id' => $order_master_id, 'is_deleted' => 0]);
        if ($orders) {
            $orders->setOrder_status('cancel');
            $orders->setLast_modified(date("Y-m-d H:i:s"));
            $em->flush();
            $orders_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(['order_master_id' => $order_master_id, 'is_deleted' => 0]);
            foreach ($orders_meal as $meal) {
                $meal->setIs_deleted(1);
                $meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                $em->flush();
            }
            return new Response('true');
        }
        return new Response('false');
    }

}
