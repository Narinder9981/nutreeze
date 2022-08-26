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
use AdminBundle\Entity\Generalnotification;

class UserreportsController extends BaseController {

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
     * @Route("/list")
     * @Template()
     */
    public function indexAction(Request $req) {
        $filter_status = !empty($req->request->get('filter_status')) ? $req->request->get('filter_status') : NULL;
        $dob_filter_date = !empty($req->request->get('dob_filter_date')) ? $req->request->get('dob_filter_date') : NULL;
        $user_sql = "SELECT * FROM `user_master` WHERE `user_role_id` = 3 AND `status` = 'active' AND `is_deleted` = 0";
        if ($dob_filter_date != NULL) {
            $dob_filter_day = date("d",strtotime($dob_filter_date));
            $dob_filter_month = date("m",strtotime($dob_filter_date));
            $user_sql = "SELECT * FROM `user_master` WHERE `user_role_id` = 3 AND `status` = 'active' AND `is_deleted` = 0 and MONTH(date_of_birth) = ".$dob_filter_month." AND DAY(date_of_birth) = " . $dob_filter_day;
        }
        $user_list = $this->fireQuery($user_sql);
        $userArray = [];

        if ($user_list) {
            $today_date = date("Y-m-d");
            foreach ($user_list as $ukey => $uval) {
                $singleuser_sql = "SELECT order_master.*,package_master.package_name FROM `order_master` join package_master on order_master.package_id = package_master.main_package_master_id where order_master.order_by = " . $uval['user_master_id'] . " and order_master.order_status = 'success' and order_master.is_deleted = 0 group by order_master.order_master_id order by end_date DESC limit 0,1";

                $singleuserList = $this->fireQuery($singleuser_sql);
                $package_name = '';
                $package_end_Date = '';
                $package_status = 'Not Purchased';

                if (isset($singleuserList[0])) {
                    $package_name = $singleuserList[0]['package_name'];
                    $package_end_Date = $singleuserList[0]['end_date'];
                    if (strtotime($today_date) > $package_end_Date) {
                        $package_status = 'Expire';
                    } elseif (strtotime($today_date <= $package_end_Date)) {
                        $package_status = 'Active';
                    }
                }
                if ($filter_status == 'active' && $package_status == 'Active') {
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                } elseif ($filter_status == 'expired' && $package_status == 'Expire') {
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                } elseif ($filter_status == 'not_purchased' && $package_status == 'Not Purchased') {
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                } elseif ($filter_status == NULL) {
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                }
            }
        }

        // var_dump($year);exit;
        return array(
            "userArray" => $userArray,
            "dob_filter_date" => $dob_filter_date,
            "filter_status" => $filter_status
        );
    }

    /**
     * @Route("/sendotificationfilter")
     */
    function sendotificationfilter(Request $req) {
        $filter_status = !empty($req->request->get('filter_status')) ? $req->request->get('filter_status') : NULL;
        $dob_filter_date = !empty($req->request->get('dob_filter_date')) ? $req->request->get('dob_filter_date') : NULL;
        $message = !empty($req->request->get('msg_text')) ? $req->request->get('msg_text') : NULL;
        $title = !empty($req->request->get('msg_title')) ? $req->request->get('msg_title') : NULL;
       
        $user_sql = "SELECT * FROM `user_master` WHERE `user_role_id` = 3 AND `status` = 'active' AND `is_deleted` = 0";
        if ($dob_filter_date != NULL) {
            $user_sql = "sELECT * FROM `user_master` WHERE `user_role_id` = 3 AND `status` = 'active' AND `is_deleted` = 0 and date_of_birth = '" . $dob_filter_date . "'";
        }
        $user_list = $this->fireQuery($user_sql);
        $userArray = [];
        $userIDArray = [];
        if ($user_list) {
            $today_date = date("Y-m-d");
            foreach ($user_list as $ukey => $uval) {
                $singleuser_sql = "SELECT order_master.*,package_master.package_name FROM `order_master` join package_master on order_master.package_id = package_master.main_package_master_id where order_master.order_by = " . $uval['user_master_id'] . " and order_master.order_status = 'success' and order_master.is_deleted = 0 group by order_master.order_master_id order by end_date DESC limit 0,1";

                $singleuserList = $this->fireQuery($singleuser_sql);
                $package_name = '';
                $package_end_Date = '';
                $package_status = 'Not Purchased';

                if (isset($singleuserList[0])) {
                    $package_name = $singleuserList[0]['package_name'];
                    $package_end_Date = $singleuserList[0]['end_date'];
                    if (strtotime($today_date) > $package_end_Date) {
                        $package_status = 'Expire';
                    } elseif (strtotime($today_date <= $package_end_Date)) {
                        $package_status = 'Active';
                    }
                }
                if ($filter_status == 'active' && $package_status == 'Active') {
                    $userIDArray[] = $uval['user_master_id'];
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                } elseif ($filter_status == 'expired' && $package_status == 'Expire') {
                    $userIDArray[] = $uval['user_master_id'];
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                } elseif ($filter_status == 'not_purchased' && $package_status == 'Not Purchased') {
                    $userIDArray[] = $uval['user_master_id'];
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                } elseif ($filter_status == NULL) {
                    $userIDArray[] = $uval['user_master_id'];
                    $userArray[] = array(
                        "user_master_id" => $uval['user_master_id'],
                        "user_name" => $uval['user_firstname'] . " " . $uval['user_lastname'],
                        "dob" => $uval['date_of_birth'],
                        "last_package" => $package_name,
                        "package_status" => $package_status
                    );
                }
            }
        }

        $send_to = 'customer';
        $app_id = 'CUST';
        $domain_id = $this->get('session')->get('domain_id') ;
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
                    $this->send_notification($apns_regids,$title, $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
                }
            }
            return new Response(json_encode(true));
        }
    }

}
