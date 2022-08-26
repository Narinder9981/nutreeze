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
use AdminBundle\Entity\Commongallerymaster;
use AdminBundle\Entity\Usermaster;
use AdminBundle\Entity\Walletmaster;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Driverarearelation;

class UsersController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();

        $session = new Session();
        if(in_array($session->get('role_id'), [1, 4, 6, 7])){
            // allow - Superadmin, Company, Customer Service, Supervisor
        } else {

            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }

    /**
     * @Route("/serversideuserlist")
     * @Template()
     */
    public function serversideuserlistAction() {
        $session = $this->get('session');

        ini_set('memory_limit', '-1');
        ini_set('memory_execution_time', '-1');

       
        $search_value = '';
        if (array_key_exists('search', $_REQUEST)) {
            $search_value = $_REQUEST['search']['value'];
        }

        $_orderBy = '';
        if (array_key_exists('user', $_REQUEST)) {
            $column = $_REQUEST['user'][0]['column'];
            $dir = $_REQUEST['user'][0]['dir'];
            if ($column == 1) {
                $_orderBy = " ORDER BY user_master.unique_user_id {$dir}";
            } else if ($column == 2) {
                $_orderBy = " ORDER BY user_master.username {$dir}";
            } else if ($column == 3) {
                $_orderBy = " ORDER BY user_master.email {$dir}";
            } else if ($column == 4) {
                $_orderBy = " ORDER BY user_master.user_mobile {$dir}";
            } else if ($column == 5) {
                $_orderBy = " ORDER BY user_master.date_of_birth {$dir}";
            } 
        }
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
        $limit_sql = "LIMIT " . $_REQUEST['start'] . "," . $_REQUEST['length'];

        $area_id_given = 0;
        $time_id_given = 0;

        $req = Request::createFromGlobals();

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        $today = date('Y-m-d 00:00:00');

      
          
        $user_role_id =3 ;
        $sql = '';
        
        if ($search_value != '') {
            $date_search_value = date("Y-m-d",strtotime($search_value));
            if( $date_search_value  == '1970-01-01'){
                $date_search_value   = $search_value;
            }
            $sql = "select user_master.user_firstname,user_master.lang,user_master.lat,user_master.parent_user_id,user_master.user_lastname,user_master.username,user_master.user_master_id,user_master.unique_user_id,user_master.email,user_master.status,user_master.user_mobile,user_master.date_of_birth from user_master  where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' ";
            $sql .= " AND "
                    . "(user_master.unique_user_id like '%{$search_value}%' or "
                    . "user_master.email like '%{$search_value}%' or "
                    . "user_master.user_firstname like '%{$search_value}%' or "
                    . "user_master.user_lastname like '%{$search_value}%' or "
                    . "user_master.username like '%{$search_value}%' or "
                    . "user_master.user_mobile like '%{$search_value}%' or "
                    . "user_master.date_of_birth like '%{$date_search_value}%' "
                    . "or CONCAT ( user_master.user_firstname,' ',user_master.user_lastname ) like '%{$search_value}%'  )  group by user_master.user_master_id order by user_master.user_master_id DESC {$limit_sql}";

            $totalsql = "select user_master.user_master_id from user_master  where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' ";
            $totalsql .= " AND "
                    . "(user_master.unique_user_id like '%{$search_value}%' or "
                    . "user_master.email like '%{$search_value}%' or "
                    . "user_master.user_firstname like '%{$search_value}%' or "
                    . "user_master.user_lastname like '%{$search_value}%' or "
                    . "user_master.username like '%{$search_value}%' or "
                    . "user_master.user_mobile like '%{$search_value}%' or "
                    . "user_master.date_of_birth like '%{$search_value}%' "
                    . "or CONCAT ( user_master.user_firstname,' ',user_master.user_lastname ) like '%{$search_value}%'  )  group by user_master.user_master_id order by user_master.user_master_id DESC ";
 
            
        } else {
            $sql = "select user_master.user_firstname,user_master.lang,user_master.lat,user_master.parent_user_id,user_master.user_lastname,user_master.username,user_master.user_master_id,user_master.unique_user_id,user_master.email,user_master.status,user_master.user_mobile,user_master.date_of_birth  from user_master   where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id'  group by user_master.user_master_id order by user_master.user_master_id DESC {$limit_sql} ";            
            $totalsql = "select user_master.user_master_id from user_master   where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id'  group by user_master.user_master_id order by user_master.user_master_id DESC ";            
        }
        

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $UsersData = $stmt->fetchAll();


        $stmt = $connection->prepare($totalsql);
        $stmt->execute();
        $TotalUsersData = $stmt->fetchAll();


      
       
       

        $driverOrderList = [];
        $i = 1;
        if (!empty($UsersData)) {
            foreach ($UsersData as $_driverOrder) {
                $_driverOrderArr = [] ;
                $button_html = $active_inactive_html = '';
                $_url = $this->generateUrl('admin_users_viewuser', array(
                    'user_role_id' => $user_role_id,
                    'user_id' => $_driverOrder['user_master_id']
                ));
                $button_html .= '<a class="btn btn-xs btn-default" href="' . $_url . '" ><i class="fa fa-eye"></i></a>&nbsp;';
                $_url = $this->generateUrl('admin_users_adduser', array(
                    'user_role_id' => $user_role_id,
                    'user_id' => $_driverOrder['user_master_id']
                ));
                $button_html .= '<a class="btn btn-xs btn-primary " href="' . $_url . '" ><i class="fa fa-edit"></i></a>&nbsp;';
                $_url = $this->generateUrl('admin_users_deleteuser', array(
                    'user_id' => $_driverOrder['user_master_id']
                ));
             //   $button_html .= '<a class="btn btn-xs btn-danger" href="' . $_url . '" ><i class="fa fa-remove"></i></a>&nbsp;';
                
                $_driverOrderArr[] = $start + $i++;
                $_driverOrderArr[] = $_driverOrder['unique_user_id'];
			   $_driverOrderArr[] = $_driverOrder['user_firstname'] ." ".$_driverOrder['user_lastname'] ;
                $_driverOrderArr[] =  $_driverOrder['email']; //$_driverOrder['unique_user_id'];
                $_driverOrderArr[] = $_driverOrder['user_mobile'];;
                $_driverOrderArr[] =  date('d-m-Y', strtotime($_driverOrder['date_of_birth'])) ;
                //$_driverOrderArr[] = $_driverOrder['wallet_amount'];;
                $_driverOrderArr[] =  $active_inactive_html;
                $_driverOrderArr[] =  $button_html;


                $driverOrderList[] = $_driverOrderArr;
               
            }
             
        }

        $response = array(
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => count($TotalUsersData),
            'recordsFiltered' => count($TotalUsersData),
            'data' => $driverOrderList
        );

        echo json_encode($response);
        exit;

        // return array('driver_orders_data' => $driverOrdersData, 'driverDetails' => $driverDetails, 'date_given' => $date_given, 'drivers' => $drivers, 'delivery_methods' => $delivery_methods, 'timeSlots' => $timeSlots, 'area_list' => $area_list, 'area_id_given' => $area_id_given, 'driver_id' => $driver_given_id, 'time_id_given' => $time_id_given, 'productCategory' => $productCategory); 
    }

    /**
     * @Route("/users/list/{user_role_id}",defaults={"user_role_id"="0"})
     * @Template()
     */
    public function indexAction($user_role_id)
    {
        
        /* $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,email,status,media_name,media_location from user_master 
				LEFT JOIN media_library_master ON user_master.user_image = media_library_master.media_library_master_id 
				where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' order by user_master.user_master_id DESC";*/
        if($user_role_id == 'admin'){
            $user_role_id = '5,6,7';
            $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,unique_user_id,email,status,user_mobile,date_of_birth from user_master 
				
				where user_master.is_deleted = 0 and user_master.user_role_id IN( $user_role_id ) order by user_master.user_master_id DESC ";
            $user_role_id = 'admin';
        }
        else{
        $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,unique_user_id,email,status,user_mobile,date_of_birth from user_master 
				
				where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' order by user_master.user_master_id DESC limit 0,20 ";
        }
        //echo $sql ; exit;
        $users = NULL ;//$this->fireQuery($sql);
        $live_path = $this->container->getParameter('live_path');



        return array('users' => $users, 'user_role_id' => $user_role_id);
    }
    /**
     * @Route("/users/drivers/{user_role_id}",defaults={"user_role_id"="0"})
     * @Template()
     */
    public function driversAction($user_role_id)
    {
       
        
        /* $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,email,status,media_name,media_location from user_master 
				LEFT JOIN media_library_master ON user_master.user_image = media_library_master.media_library_master_id 
				where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' order by user_master.user_master_id DESC";*/
        if($user_role_id == 'admin'){
            $user_role_id = '1';
            $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,unique_user_id,email,status,user_mobile,date_of_birth from user_master 
				
				where user_master.is_deleted = 0 and user_master.user_role_id IN( $user_role_id ) order by user_master.user_master_id DESC ";
            $user_role_id = 'admin';
        }
        else{
            
        $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,unique_user_id,email,status,user_mobile,date_of_birth from user_master 
				
				where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' order by user_master.user_master_id DESC limit 0,20 ";
        }
        //echo $sql ; exit;
        $users = $this->fireQuery($sql);
        $live_path = $this->container->getParameter('live_path');



        return array('users' => $users, 'user_role_id' => $user_role_id);
    }

     /**
     * @Route("/users/dietitians/{user_role_id}",defaults={"user_role_id"="0"})
     * @Template()
     */
    public function dietitiansAction($user_role_id)
    {             
        if($user_role_id == 'admin'){
            $user_role_id = '1';
            $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,unique_user_id,email,status,user_mobile,date_of_birth from user_master 
                
                where user_master.is_deleted = 0 and user_master.user_role_id IN( $user_role_id ) order by user_master.user_master_id DESC ";
            $user_role_id = 'admin';
        }
        else{
            
        $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,unique_user_id,email,status,user_mobile,date_of_birth from user_master 
                
                where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' order by user_master.user_master_id DESC limit 0,20 ";
        }
        //echo $sql ; exit;
        $users = $this->fireQuery($sql);
        $live_path = $this->container->getParameter('live_path');



        return array('users' => $users, 'user_role_id' => $user_role_id);
    }


    /**
     * @Route("/users/addUser/{user_role_id}/{user_id}",defaults={"user_id"="0","user_role_id":"0"})
     * @Template()
     */
    public function addUserAction($user_id, $user_role_id)
    {
        if($user_role_id == 'admin'){
            $user_role_id = 1; 
        }
        $sql = "select user_firstname,area_id,lat,parent_user_id,lang,user_lastname,user_mobile,username,user_master_id,email,status,media_name,media_location,unique_user_id from user_master 
				LEFT JOIN media_library_master ON user_master.user_image = media_library_master.media_library_master_id 
				where user_master.is_deleted = 0 and user_master.user_master_id = '$user_id' and user_role_id = '$user_role_id' ";
        $users = $this->fireQuery($sql);

        $live_path = $this->container->getParameter('live_path');

        if (!empty($users)) {
            foreach ($users as $key => $value) {
                $users[$key]['media_url'] = "$live_path" . $value['media_location'] . "/" . $value['media_name'];
            }
        }

        $companies = null;

        if ($user_role_id == 2) {

            $sql_get_companies = "select user_firstname,user_lastname,user_master_id,unique_user_id from user_master where user_role_id = '4' and is_deleted = 0 ";
            $companies = $this->fireQuery($sql_get_companies);
        }

        $domain_id = $this->get('session')->get('domain_id');

        //		echo"<pre>";print_r($users);exit;
        if (!empty($users)) {
            $users = $users[0];
        }
        //			echo"<pre>";print_r($users);exit;
        $sql = "select * from area_master where is_deleted = 0 group by main_area_id";
        $area_list = $this->firequery($sql);

        $response = array();
        if (!empty($area_list)) {

            foreach ($area_list as $_area) {
                // get language wise data
                $area_name = '';
                $_sql = "select area_name, language_id from area_master where main_area_id = {$_area['main_area_id']} order by language_id";
                $lang_area = $this->firequery($_sql);

                $lang_array = array();
                if (!empty($lang_area)) {
                    foreach ($lang_area as $_lang) {
                        $area_name .= $_lang['area_name'];
                        $area_name .= ' /';
                    }
                }

                $_area['lang_name'] = trim($area_name, '/');

                $response[] = $_area;
            }
        }

        $area_selected = null;

        $existEntry = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Driverarearelation")->findBy(
            ['driver_user_id' => $user_id, 'is_deleted' => 0]
        );

        if ($existEntry) {
            foreach ($existEntry as $_existEntry) {
                $area_selected[] = $_existEntry->getArea_id();
            }
        }
        // user address
        $user_address = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Addressmaster")->findBy(array("owner_id" => $user_id, "is_deleted" => 0));


        //		echo"<pre>";print_r($area_selected);exit;
        return array('user_address' => $user_address, 'users' => $users, 'area' => $response, 'user_role_id' => $user_role_id, 'companies' => $companies, 'area_selected' => $area_selected);
    }

    /**
     * @Route("/users/viewUser/{user_role_id}/{user_id}",defaults={"user_id"="0","user_role_id":"0"})
     * @Template()
     */
    public function viewUserAction($user_id, $user_role_id)
    {
        $sql = "select user_master.*,user_details_master.*,area_master.area_name,media_name,media_location from user_master 
				LEFT JOIN media_library_master ON user_master.user_image = media_library_master.media_library_master_id 
				LEFT JOIN area_master ON area_master.main_area_id = user_master.area_id and area_master.is_deleted = 0 
				LEFT JOIN user_details_master ON user_details_master.user_master_id = user_master.user_master_id 
				where user_master.is_deleted = 0 and user_master.user_master_id = '$user_id' and user_role_id = '$user_role_id' group by user_master.user_master_id";
        $users = $this->fireQuery($sql);

        $live_path = $this->container->getParameter('live_path');

        if (!empty($users)) {
            foreach ($users as $key => $value) {
                $sql_addr = "select * from address_master LEFT JOIN area_master ON area_master.main_area_id = address_master.area_id  where main_address_id = '" . $value['address_master_id'] . "' group by main_address_id";
                $addr = $this->fireQuery($sql_addr);
                if (!empty($addr)) {
                    $addr = $addr[0];
                }

                $users[$key]['address_details'] = $addr;

                if (!empty($addr)) {
                    $users[$key]['area_name'] = $addr['area_name'];
                }

                /*
                $sql_goal = "select * from user_goal_master where main_goal_master_id = '" . $value['user_goal_id'] . "' group by main_goal_master_id";
                $goal_master = $this->fireQuery($sql_goal);

                if (!empty($goal_master)) {
                    $users[$key]['name'] = $goal_master[0]['name'];
                    $users[$key]['description'] = $goal_master[0]['description'];
                } else {
                    $users[$key]['name'] = '-';
                    $users[$key]['description'] = '-';
                }
                */
                $users[$key]['body_report_img'] = $this->getmediaAction($value['body_report']);

                $users[$key]['media_url'] = "$live_path" . $value['media_location'] . "/" . $value['media_name'];
            }
        }

        $domain_id = $this->get('session')->get('domain_id');

        //	echo"<pre>";print_r($users);exit;
        if (!empty($users)) {
            $users = $users[0];
        }

        $walletInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("is_deleted"=>0,"user_master_id"=>$user_id));
        $wallet_amount = 0 ; 
        if($walletInfo){
            $wallet_amount = $walletInfo->getWallet_amount();
        }
        $walletTransactionInfo =  $this->getDoctrine()->getManager()->getRepository("AdminBundle:Wallettransactionhistory")->findBy(array("is_deleted"=>0,"user_master_id"=>$user_id));
        $walletTransactionDetails = NULL ;
        if($walletTransactionInfo){
            foreach($walletTransactionInfo as $wkey=>$wval){

                // get Order and Package name 
                $list = NULL ; $orderNo = $package_name = '' ;
                if($wval->getTransaction_for_id() != NULL && $wval->getTransaction_for_id() != 0 ){
                 $query = "SELECT order_master.unique_no,package_master.package_name FROM `order_master` join package_master on order_master.package_id = package_master.main_package_master_id WHERE `order_master_id` = ".$wval->getTransaction_for_id(). " GROUP by order_master_id "; 
                 $list = $this->firequery($query);
                 if($list){
                    $orderNo = $list[0]['unique_no'];
                    $package_name = $list[0]['package_name'];
                 }
                }
                $walletTransactionDetails[] = array(
                    "wallet_action"=>$wval->getWallet_action(),
                    "previous_amount"=>$wval->getPrevious_amount(),
                    "after_action_amount"=>$wval->getAfter_action_amount(),
                    "transaction_amount"=>$wval->getTransaction_amount(),
                    "transaction_for"=>$wval->getTransaction_for(),
                    "transaction_for_id"=>$wval->getTransaction_for_id(),
                    "action_created_datetime"=>$wval->getAction_created_datetime(),
                    "orderNo"=>$orderNo ,
                    "package_name"=>$package_name ,

                );
            }
        }

        return array('users' => $users, 'user_master_id' => $user_id, 'user_role_id' => $user_role_id,"wallet_amount"=>$wallet_amount ,"walletTransactionInfo"=>$walletTransactionDetails );
    }
    /**
     * @Route("/users/viewDriverRoute/{user_id}",defaults={"user_id"="0"})
     * @Template()
     */
    public function viewDriverRouteAction($user_id)
    {
        $sql = "select user_master.* from user_master where user_master.is_deleted = 0 and user_master.user_master_id = '$user_id' and user_role_id = 2 group by user_master.user_master_id";
        $users = $this->fireQuery($sql);
        $live_path = $this->container->getParameter('live_path');
        $today = date("Y-m-d");//'2020-01-03';//
        // get Driver 
        //$route_list_query = "SELECT * FROM `order_meal_relation` WHERE `user_id` = ".$user_id." and DATE(created_datetime) = '".$today."' and (status='delivered' or status = 'not_delivered')";
        $route_list_query = "SELECT order_meal_relation.* , order_master.unique_no as order_unique_no FROM `order_meal_relation` join order_master ON order_meal_relation.order_master_id = order_master.order_master_id WHERE `assign_driver_id` = ".$user_id." and DATE(created_datetime) = '".$today."' and (status='delivered' or status = 'not_delivered')"; 

        $route_list = $this->fireQuery($route_list_query);
        $lat_lng = [] ;
        $lat_lng_order = [] ;
        if($route_list){
            foreach($route_list as $lkey=>$lval){
                $lat_lng[] = array($lval['lat'],$lval['lang']);
                $lat_lng_order[] = array("order_no"=>$lval['order_unique_no'], "date_time"=>$lval['last_modified_datetime']);
            }
        }
        $domain_id = $this->get('session')->get('domain_id');

        //	echo"<pre>";print_r($users);exit;
        if (!empty($users)) {
            $users = $users[0];
        }



        return array('users' => $users, 'user_master_id' => $user_id, 'user_role_id' => 2 ,'date'=>$today,'lat_lng'=>json_encode($lat_lng),'lat_lng_order'=>json_encode($lat_lng_order));
    }

    /**
     * @Route("/users/updatepassword")
     * @Template()
     */
    public function updatepasswordAction(Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $user_master_id = $_POST['user_master_id'];
        $password = $_POST['update_password'];
        $role_id = 0;
        $user_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($user_master_id);
        if ($user_info) {
            $user_info->setPassword(md5($password));
            $user_info->setShow_password($password);
            $em->persist($user_info);
            $em->flush();
            $role_id = $user_info->getUser_role_id();
            $this->get('session')->getFlashBag()->set('success_msg', 'Password Updated Successfully');
        }
        return $this->redirectToRoute('admin_users_viewuser', array('user_id' => $user_master_id, 'user_role_id' => $role_id));
    }

    /**
     * @Route("/users/withdrawwalletamount")
     * @Template()
     */
    public function withdrawwalletamountAction(Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $role_id = $_POST['role_id_p'];
        $user_master_id = $_POST['user_master_id'];
        $withdraw_amount = $_POST['withdraw_amount'];
       
        $wallet_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("user_master_id"=>$user_master_id));
        if ($wallet_info) {
            $previous_wallet_amount = (float)$wallet_info->getWallet_amount() ; 
            $tt_amount  = (float)($previous_wallet_amount - $withdraw_amount);
           
            $wallet_info->setWallet_amount($tt_amount);
            $wallet_info->setWallet_last_updated(date("Y-m-d H:i:s"));
            $em->flush();

            $wallet_transaction_history = new Wallettransactionhistory();
            $wallet_transaction_history->setWallet_master_id($wallet_info->getWallet_master_id());
            $wallet_transaction_history->setUser_master_id($wallet_info->getUser_master_id());
            $wallet_transaction_history->setWallet_action('minus');
            $wallet_transaction_history->setTransaction_for('withdraw_by_admin');
            $wallet_transaction_history->setTransaction_for_id(0);
            $wallet_transaction_history->setPrevious_amount($previous_wallet_amount);
            $wallet_transaction_history->setAfter_action_amount($tt_amount);
            $wallet_transaction_history->setTransaction_amount($withdraw_amount);
            $wallet_transaction_history->setAction_created_datetime(date("Y-m-d H:i:s"));
            $wallet_transaction_history->setIs_deleted(0);
            $em->persist($wallet_transaction_history);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success_msg', 'Withdraw Successfully');
        }
        return $this->redirectToRoute('admin_users_viewuser', array('user_id' => $user_master_id, 'user_role_id' => $role_id));
    }

   /**
     * @Route("/users/addwwalletamount")
     * @Template()
     */
    public function addwwalletamountAction(Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $role_id = $_POST['role_id_p'];
        $user_master_id = $_POST['user_master_id'];
        $add_amount = $_POST['add_amount'];
       
        $wallet_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("user_master_id"=>$user_master_id));
        if ($wallet_info) {
            $previous_wallet_amount = (float)$wallet_info->getWallet_amount() ; 
            $tt_amount  = (float)($previous_wallet_amount + $add_amount);
           
            $wallet_info->setWallet_amount($tt_amount);
            $wallet_info->setWallet_last_updated(date("Y-m-d H:i:s"));
            $em->flush();

            $wallet_transaction_history = new Wallettransactionhistory();
            $wallet_transaction_history->setWallet_master_id($wallet_info->getWallet_master_id());
            $wallet_transaction_history->setUser_master_id($wallet_info->getUser_master_id());
            $wallet_transaction_history->setWallet_action('plus');
            $wallet_transaction_history->setTransaction_for('add_by_admin');
            $wallet_transaction_history->setTransaction_for_id(0);
            $wallet_transaction_history->setPrevious_amount($previous_wallet_amount);
            $wallet_transaction_history->setAfter_action_amount($tt_amount);
            $wallet_transaction_history->setTransaction_amount($add_amount);
            $wallet_transaction_history->setAction_created_datetime(date("Y-m-d H:i:s"));
            $wallet_transaction_history->setIs_deleted(0);
            $em->persist($wallet_transaction_history);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success_msg', 'Wallet amount added Successfully');
        }
        return $this->redirectToRoute('admin_users_viewuser', array('user_id' => $user_master_id, 'user_role_id' => $role_id));
    }

    /**
     * @Route("/users/save")
     * @Template()
     */
    public function saveUserAction(Request $req)
    {

        $em = $this->getDoctrine()->getManager();
        $user_master_id = $req->request->get('user_master_id');
        $password = $req->request->get('password');
        $user_firstname = $req->request->get('user_firstname');
        $user_lastname = $req->request->get('user_lastname');
        $unique_user_id = $req->request->get('unique_user_id');
        $user_mobile = $req->request->get('user_mobile');
        $email = $req->request->get('email');

        $area_id_driver = $req->request->get('area_id_driver');
        $user_role_id = $req->request->get('user_role_id');
        $lat = $req->request->get('lat');
        $lang = $req->request->get('lang');
        $society_building_name = $req->request->get('avenue');
        $area_id = $req->request->get('area_id');
        $address_type = $req->request->get('address_type');
        $flate_house_number = $req->request->get('flate_house_number');
        $address_name = $req->request->get('block');
		$flat_no = $req->request->get('flat_no');
        $landmark = $req->request->get('landmark');
        $street = $req->request->get('street');
        $address_masterList = $req->request->get('adress_master_id');
        $company = !empty($req->request->get('company')) ? $req->request->get('company') : 0;

        $media_id = 0;
        $address_info = NULL;
        if($address_masterList){
            foreach($address_masterList as $addkey=>$addval){
                $address_master_id =(int)trim($addval) ; 
               
                if ($address_master_id != 0) {
                    $address_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Addressmaster")->findOneBy(array("is_deleted" => 0, "address_master_id" => $address_master_id));
                    if ($address_info) {
                        $address_info->setAddress_type($address_type[$addkey]);
						$address_info->setFlat_no($flat_no[$addkey]);
                        $address_info->setLandmark($landmark[$addkey]);
                        $address_info->setFlate_house_number($flate_house_number[$addkey]);
                        $address_info->setAddress_name($address_name[$addkey]);
                        $address_info->setStreet($street[$addkey]);
                        $address_info->setLat($lat[$addkey]);
                        $address_info->setLng($lang[$addkey]);
                        $address_info->setArea_id($area_id[$addkey]);
                        $address_info->setSociety_building_name($society_building_name[$addkey]);
                        $em->flush();
                    }
                }
            }
        }
        if (isset($_FILES['gallery']) && !empty($_FILES['gallery']) && isset($_FILES['gallery']['size']) && $_FILES['gallery']['size'] > 0) {

            #get_media_type Mediatype

            $media_type = $this->getDoctrine()->getRepository("AdminBundle:Mediatype")->findBy(
                array(
                    'is_deleted' => 0,
                )
            );

            $img_ext = null;
            $video_ext = null;

            if ($media_type) {
                foreach ($media_type as $type_list) {
                    if ($type_list->getMedia_type_name() == 'Image') {
                        $img_ext = explode(',', $type_list->getMedia_type_allowed());
                    }

                    if ($type_list->getMedia_type_name() == 'Video') {
                        $video_ext = explode(',', $type_list->getMedia_type_allowed());
                    }
                }
            }

            $file_name = $_FILES['gallery']['name'];
            $tmp_name = $_FILES['gallery']['tmp_name'];
            $media_type_id = 1;
            $media_type = 'img';

            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            if (in_array($ext, $video_ext)) {
                $media_type_id = 2;
                $media_type = 'video';
            }

            $upload_dir = $this->container->getParameter('absolute_path') . "/bundles/uploads/user_profile/";

            $media_id = $this->mediauploadAction($file_name, $tmp_name, "/bundles/uploads/user_profile/", $upload_dir, $media_type_id);
        }

        $gender = 'male';
        $date_of_birth = date('Y-m-d');

        $user_master = $this->getDoctrine()->getRepository("AdminBundle:Usermaster")->findOneBy(
            array(
                'is_deleted' => 0,
                'user_master_id' => $user_master_id
            )
        );
        if ($user_master) {
            $sql = "select user_master_id from user_master where email = '$email' and user_master_id != '$user_master_id' and is_deleted = '0'";
            $user_email = $this->firequery($sql);
            if (empty($user_email)) {

                $user_master->setUsername($email); // default for customer
                if ($password != '') {

                    $user_master->setPassword(md5($password));
                    $user_master->setShow_password($password);
                }

                $user_master->setUser_firstname($user_firstname);
                $user_master->setUser_lastname($user_lastname);
                $user_master->setUser_mobile($user_mobile);
                if($user_role_id == 2 ){
                    $user_master->setUnique_user_id($unique_user_id);
                }
                if( $lat[0] == NULL ){
                    $lat = 0 ;
                }
                if( $lang[0] == NULL ){
                    $lang = 0 ;
                }
              //  $user_master->setLat($lat);
               // $user_master->setLang($lang);
                $user_master->setEmail($email);
                $user_master->setParent_user_id($company);
                if ($media_id != 0) {
                    $user_master->setUser_image($media_id);
                }

                $user_master->setArea_id($area_id[0]);

                $em->flush();

                if ($user_role_id == 2) {
                    #delete Old Entries
                    $existEntry = $em->getRepository("AdminBundle:Driverarearelation")->findBy(
                        ['driver_user_id' => $user_master_id, 'is_deleted' => 0]
                    );

                    if ($existEntry) {
                        foreach ($existEntry as $_existEntry) {
                            $_existEntry->setIs_deleted(1);
                            $em->flush();
                        }
                    }
                    #delete Old Entries done
                    #driver
                    $user_master_id = $user_master->getUser_master_id();
                    if (!empty($area_id_driver)) {
                        foreach ($area_id_driver as $_area_id_driver) {
                            $newDriverArea = new Driverarearelation();
                            $newDriverArea->setDriver_user_id($user_master_id);
                            $newDriverArea->setArea_id($_area_id_driver);
                            $newDriverArea->setCreated_datetime(date('Y-m-d H:i:s'));
                            $newDriverArea->setIs_deleted(0);

                            $em->persist($newDriverArea);
                            $em->flush();
                        }
                    }
                }


                $this->get('session')->getFlashBag()->set('success_msg', 'User Updated Successfully');
            } else {
                $this->get('session')->getFlashBag()->set('error_msg', 'Email is allready register try another');
            }
        } else {

            $user_master_email = $this->getDoctrine()->getRepository("AdminBundle:Usermaster")->findBy(
                array(
                    'is_deleted' => 0,
                    'email' => $email
                )
            );

            if (empty($user_master_email)) {
                if( $lat == NULL ){
                    $lat = 0 ;
                }
                if( $lang == NULL ){
                    $lang = 0 ;
                }
                $unique_no = $this->getUniqueCode();
                $userMaster = new Usermaster();
                $userMaster->setUser_role_id($user_role_id); //Driver
                $userMaster->setUnique_user_id($unique_no);
                $userMaster->setUsername($email); // default for customer
                $userMaster->setPassword(md5($password));
                $userMaster->setShow_password($password);
                $userMaster->setUser_firstname($user_firstname);
                $userMaster->setUser_lastname($user_lastname);
                $userMaster->setUser_mobile($user_mobile);
                $userMaster->setEmail($email);
                $userMaster->setUser_image($media_id);
                $userMaster->setAddress_master_id(0);
                $userMaster->setParent_user_id(0);
                $userMaster->setUser_gender($gender);
                $userMaster->setDate_of_birth($date_of_birth);
                $userMaster->setHeight(0);
                $userMaster->setWeight(0);
                $userMaster->setArea_id($area_id);
                $userMaster->setCreated_by($this->get('session')->get('user_id'));
                $userMaster->setStatus("active");
                $userMaster->setUser_type("user");
                $userMaster->setCurrent_lang_id(1);
                $userMaster->setDomain_id(1);
                $userMaster->setCreated_datetime(date('Y-m-d H:i:s'));
                $userMaster->setLast_modified(date('Y-m-d H:i:s'));
                $userMaster->setLast_login(date('Y-m-d H:i:s'));
                $userMaster->setRegistration_from("normal");
                $userMaster->setIs_verified(0);
                $userMaster->setVerification_code(0);
                $userMaster->setIs_deleted(0);
                $userMaster->setLat($lat);
                $userMaster->setLang($lang);

                $userMaster->setParent_user_id($company);

                $em = $this->getDoctrine()->getManager();
                $em->persist($userMaster);
                $em->flush();

                if ($user_role_id == 2) {
                    //					print_r($area_id_driver);exit;
                    #driver
                    $user_master_id = $userMaster->getUser_master_id();
                    if (!empty($area_id_driver)) {
                        foreach ($area_id_driver as $_area_id_driver) {
                            $newDriverArea = new Driverarearelation();
                            $newDriverArea->setDriver_user_id($user_master_id);
                            $newDriverArea->setArea_id($_area_id_driver);
                            $newDriverArea->setCreated_datetime(date('Y-m-d H:i:s'));
                            $newDriverArea->setIs_deleted(0);

                            $em->persist($newDriverArea);
                            $em->flush();
                        }
                    }
                }
                $this->get('session')->getFlashBag()->set('success_msg', 'User Inserted Successfully');
            } else {
                $this->get('session')->getFlashBag()->set('error_msg', 'Email is allready register try another');
            }
        }
         if ($user_role_id == 2) {
              return $this->redirectToRoute('admin_users_drivers', array('user_role_id' => $user_role_id));
         }
		  if ($user_role_id == 8) {
              return $this->redirectToRoute('admin_users_dietitians', array('user_role_id' => $user_role_id));
         }
        return $this->redirectToRoute('admin_users_index', array('user_role_id' => $user_role_id));
    }

    /**
     * @Route("/users/deleteUsers/{user_id}",defaults={"user_id"="0"})
     * @Template()
     */
    public function deleteUserAction($user_id, Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->findOneBy(array('user_master_id' => $user_id, 'is_deleted' => 0));

        if (!empty($user)) {
            $user->setIs_deleted(1);
            $em->flush();

            $user_video = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideorelation")->findBy(array('user_id' => $user_id, 'is_deleted' => 0));
            if ($user_video) {
                foreach ($user_video as $video) {
                    $video->setIs_deleted(1);
                    $em->flush();
                }
            }

            $user_schedule = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Scheduleuserrelation")->findBy(array('user_id' => $user_id, 'is_deleted' => 0));
            if ($user_schedule) {
                foreach ($user_schedule as $schedule) {
                    $schedule->setIs_deleted(1);
                    $em->flush();
                }
            }
        }

        $this->get('session')->getFlashBag()->set('success_msg', 'User deleted successfully');

        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }
    /**
     * @Route("/changeuserstatus")
     * @Template()
     */
    public function changeuserstatusAction(Request $req)
    {
        $domain_id = $this->get('session')->get('domain_id');

        $id = $req->request->get('user_master_id');
        $status = $req->request->get('status');

        $em = $this->getDoctrine()->getManager();


        $user_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Usermaster')->findOneBy(
            array(
                'is_deleted' => 0,
                'user_master_id' => $id
            )
        );
        if ($user_master && $user_master->getUser_role_id() != 1  ) {
            
            if ($status == 'true') {
                $user_master->setStatus('active');
            } else {
                $user_master->setStatus('inactive');
                // Delete All Order_master , order_meal_relation , order_meal_type_include_realtion ,
                //order_off_Days_relation , order_package_upgrade_history
                $order_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findBy(array("is_deleted" => 0, "order_by" => $id, "order_status" => array('success', 'pending')));

                $orderID_array = [];
                if ($order_list) {
                    foreach ($order_list as $oval) {
                        $oval->setIs_deleted(1);
                        $orderID_array[] = $oval->getOrder_master_id();
                        $em->flush();
                    }
                }
                $order_meal_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->findBy(array("is_deleted" => 0, "user_id" => $id));
                if ($order_meal_list) {
                    foreach ($order_meal_list as $oval) {
                        $oval->setIs_deleted(1);
                        $em->flush();
                    }
                }
                $order_meal_type_include_realtionlist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealtypesincluderelation")->findBy(array("is_deleted" => 0, "order_id" => $orderID_array));

                if ($order_meal_type_include_realtionlist) {
                    foreach ($order_meal_type_include_realtionlist as $oval) {
                        $oval->setIs_deleted(1);
                        $em->flush();
                    }
                }
                $order_package_upgrade_historylist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackageupgradehistory")->findBy(array("is_deleted" => 0, "order_id" => $orderID_array));
                if ($order_package_upgrade_historylist) {
                    foreach ($order_package_upgrade_historylist as $oval) {
                        $oval->setIs_deleted(1);
                        $em->flush();
                    }
                }
                $order_off_days_relationlist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderoffdaysrelation")->findBy(array("is_deleted" => 0, "order_id" => $orderID_array));
                if ($order_off_days_relationlist) {
                    foreach ($order_off_days_relationlist as $oval) {
                        $oval->setIs_deleted(1);
                        $em->flush();
                    }
                }
            }
            $em->flush();
        }

        return new Response('done');
    }


     function getUniqueCode() {
        //$_sql = "SELECT * from user_master where unique_user_id != '' order by user_master_id desc";
        $_sql = "SELECT * from user_master where unique_user_id != '' order by unique_user_id desc LIMIT 0 ,1";
        $data = $this->firequery($_sql);
        if (!empty($data)) {
            $unique_no = (int) $data[0]['unique_user_id'];
            if (is_numeric($unique_no)) {
                $unique_no = $unique_no + 1;
            } else {
                $unique_no = 50001;
            }
        } else {
            $unique_no = 50001;
        }
        return $unique_no;
    }
}
