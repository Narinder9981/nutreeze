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
use AdminBundle\Entity\Notifyuserlist;
use AdminBundle\Entity\Generalnotification;
use AdminBundle\Entity\Adminshopstatus;

class AdminstatusController extends BaseController {

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
     * @Route("/updateshopstatus")
     * @Template()
     */
    public function updateshopstatusAction() {
        $languages = $this->getLanguages();
        $sql = "SELECT * FROM `admin_shop_status` GROUP by main_id";
        $admin_status_list = $this->fireQuery($sql);
        if ($admin_status_list) {

            foreach ($languages as $lval) {
                $busy_text = '';
                $status = '';
                $get_langAdminStatus = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Adminshopstatus")->findOneBy(array("language_id" => $lval->getLanguage_master_id(), "main_id" => 1));
                if ($get_langAdminStatus) {
                    $busy_text = $get_langAdminStatus->getBusy_text();
                    $status = $get_langAdminStatus->getAdmin_shop_status();
                }
                $langWise_data[] = array(
                    "language_id" => $lval->getLanguage_master_id(),
                    "busy_text" => $busy_text,
                    "status" => $status
                );
            }
        }


        return array('language_list' => $languages, "langWise_data" => $langWise_data);
    }

    /**
     * @Route("/updatesettings")
     * @Template()
     */
    public function updatesettingsAction(Request $req) {
        $em = $this->getDoctrine()->getManager();
        if ($req->request->get('submit') != null) {
            $shop_status = $req->request->get('shop_status');
            $busy_text = $req->request->get('busy_text');
            $lang_id = $req->request->get('language_id');
            $admin_shop_status = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Adminshopstatus")->findOneBy(array("main_id" => 1, "language_id" => $lang_id));
            if (!empty($admin_shop_status)) {
                $admin_shop_status->setAdmin_shop_status($shop_status);
                $admin_shop_status->setBusy_text($busy_text);
                $admin_shop_status->setUpdated_at(date("Y-m-d H:i:s"));
                $em->persist($admin_shop_status);
                $em->flush();
            } else {
                $admin_shop_status = new Adminshopstatus();
                $admin_shop_status->setAdmin_shop_status($shop_status);
                $admin_shop_status->setBusy_text($busy_text);
                $admin_shop_status->setLanguage_id($lang_id);
                $admin_shop_status->setMain_id(1);
                $admin_shop_status->setUpdated_at(date("Y-m-d H:i:s"));
                $em->persist($admin_shop_status);
                $em->flush();
            }
            $admin_shop_statusAll = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Adminshopstatus")->findBy(array("main_id" => 1));
            if($admin_shop_statusAll){
                foreach($admin_shop_statusAll as $aval){
                    $aval->setAdmin_shop_status($shop_status);
                    $em->flush();
                }
            }
            $this->get('session')->getFlashBag()->set('success_msg', 'Shop status updated successfully');
        }
        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @Route("/notifylist")
     * @Template()
     */
    public function notifylistAction() {
        $em = $this->getDoctrine()->getManager();
        $notify_listData = [];
        $notify_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Notifyuserlist")->findBy(array("is_deleted" => 0,"notify_status"=>'notify_me'));
        if ($notify_list) {
            foreach ($notify_list as $nkey => $nval) {
                $package_name = $user_name = $user_mobile = '';
                $package_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array("is_deleted" => 0, "main_package_master_id" => $nval->getPackage_id()));
                if ($package_info) {
                    $package_name = $package_info->getPackage_name();
                }
                $user_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->findOneBy(array("is_deleted" => 0, "user_master_id" => $nval->getUser_id()));
                if ($user_info) {
                    $user_mobile = $user_info->getUser_mobile();
                    $user_name = $user_info->getUser_firstname() . " " . $user_info->getUser_lastname();
                }
                $notify_listData[] = array(
                    "package_id" => $nval->getPackage_id(),
                    "sub_package_id" => $nval->getSub_package_id(),
                    "package_name" => $package_name,
                    "user_id" => $nval->getUser_id(),
                    "phone_no" => $user_mobile,
                    "user_name" => $user_name,
                    "status" => $nval->getNotify_status(),
                    "start_date" => $nval->getStart_date(),
                    "notify_create_date" => $nval->getCreated_datetime()
                );
            }
        }
        return array("notify_listData" => $notify_listData);
    }

    /**
     * @Route("/notifysendnotification")
     */
    public function notifysendnotification(Request $req) {
        $main_sub_package_id = $req->request->get('main_sub_package_id');
        $main_package_id = $req->request->get('main_package_id');
        $user_id = $req->request->get('user_id');
        $code = '16';    
        $send_to = 'customer'; //$_POST['send_to'];
        $media_id = 'FALSE';      
        $title = "Place your order now";
        $title_ar = "ضع طلبك الآن";
        $detail = "Packages are available now, place your order now";
        $detail_ar = "الحزم متوفرة الآن ، ضع طلبك الآن";
        $userInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->find($user_id);
        $language_id = 1; 
        if($userInfo){
            $language_id = $userInfo->getCurrent_lang_id();
        }
        if($language_id == 1 ){
            
        }
        else{
            $title = $title_ar ;
            $detail = $detail_ar ;
        }
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
        $user_array = array();
        $user_apns_id = array();
        $user_array[] = $user_id;           
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
        }
        return new Response(json_encode(true));
    }

    /**
     * @Route("/sendtoall")
     */
    public function sendtoallAction(Request $req) {
       
        $code = '16';    
        $send_to = 'customer'; //$_POST['send_to'];
        $media_id = 'FALSE';      
        $title = $req->request->get('notify_text') ;// "Place your order now";
        $title_ar = $req->request->get('notify_text') ;//  "ضع طلبك الآن";
        $detail = $req->request->get('notify_msg') ;//  "Packages are available now, place your order now";
        $detail_ar =  $req->request->get('notify_msg') ; // "الحزم متوفرة الآن ، ضع طلبك الآن";
        
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
        $user_array = array();
        $notify_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Notifyuserlist")->findBy(array("is_deleted" => 0,"notify_status"=>'notify_me'));
        
        $user_array_str = ''; 
        if($notify_list){
            foreach($notify_list as $nkey=>$nval){
                $user_array[] = $nval->getUser_id() ;
            }
            $user_array_str = implode(",", $user_array);
            $updateQuery = "UPDATE notify_user_list SET notify_status = 'notified_by_admin' where user_id IN (".$user_array_str.") and is_deleted = 0  ";
            $updateQueryList = $this->fireupdateQuery($updateQuery) ;

            $domain_id = 1;
            $app_id = 'CUST';
            
            $user_apns_id = array();
            //$user_array[] = $user_id;           
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
            }

            $this->get('session')->getFlashBag()->set("success_msg", "Notification sent");
            return $this->redirect($req->headers->get('referer'));

        }

         $this->get('session')->getFlashBag()->set("error_msg", "No users ");
                            return $this->redirect($req->headers->get('referer'));

        
      
        return new Response(json_encode(true));
    }

}
