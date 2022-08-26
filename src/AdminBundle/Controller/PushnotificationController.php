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

class PushnotificationController extends BaseController {

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
     * @Route("/pushnotification")
     * @Template()
     */
    public function indexAction() {

        $note_list = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Generalnotification')
                ->findBy(array('is_deleted' => 0, 'notification_type' => 'general'), array('create_date' => 'desc'));

        $health_list = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Generalnotification')
                ->findBy(array('is_deleted' => 0, 'notification_type' => 'healthtip'), array('create_date' => 'desc'));

        return array("note_list" => $note_list, "health_list" => $health_list);
    }

    /**
     * @Route("/notification/delete/{id}",defaults={"id"=""})
     * @Template()
     */
    public function deleteNotificationAction($id, Request $request) {
        if ($id != '') {
            $entity = $this->getDoctrine()->getManager();
            $note_list = $entity->getRepository('AdminBundle:Generalnotification')->findOneBy([
                'general_notification_id' => $id,
                'is_deleted' => 0
            ]);

            if (!empty($note_list)) {
                $note_list->setIs_deleted(1);
                $entity->flush();
                $this->get('session')->getFlashBag()->set('success_msg', 'Notification Removed Successfully');
            } else {
                $this->get('session')->getFlashBag()->set('error_msg', 'Notification not found');
            }
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Notification not found');
        }

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @Route("/notification-bulk/delete")
     * @Template()
     */
    public function deleteNotificationBulkAction(Request $request) {
        $postData = $_REQUEST;
        if (!array_key_exists('note_ids', $postData)) {
            $data = array(
                'success' => false,
                'message' => 'Parameter not found'
            );

            echo json_encode($data);
            exit;
        }

        $note_id_str = $postData['note_ids'];
        $note_ids = explode(',', $note_id_str);

        if (!empty($note_ids)) {
            $entity = $this->getDoctrine()->getManager();
            foreach ($note_ids as $_noteId) {
                $note_list = $entity->getRepository('AdminBundle:Generalnotification')->findOneBy([
                    'general_notification_id' => $_noteId,
                    'is_deleted' => 0
                ]);

                if (!empty($note_list)) {
                    $note_list->setIs_deleted(1);
                    $entity->flush();
                }
            }
            $data = array(
                'success' => true,
                'message' => "Removed successfully"
            );
        } else {
            $data = array(
                'success' => false,
                'message' => 'No value found'
            );
        }

        echo json_encode($data);
        exit;
    }

    /**

     * @Route("/addpushnotification/{user_id}",defaults={"user_id"="0"})

     * @Template()

     */
    public function addpushnotificationAction($user_id){

        $user_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usermaster")->findBy(array("is_deleted" => 0, "user_role_id" => 3, "status" => "active"));

        $today = date('Y-m-d');
       // $sql = "SELECT u.user_master_id from user_master u, order_master o where u.user_master_id = o.created_by and o.is_deleted = 0 and u.is_deleted = 0 and end_date >= '$today'  group by u.user_master_id";
        $sql = "SELECT u.user_master_id from user_master u where u.is_deleted = 0  group by u.user_master_id";
        if($user_id != 0 && $user_id != '0'){
            //$sql = "SELECT u.user_master_id from user_master u, order_master o where u.user_master_id = o.created_by and o.is_deleted = 0 and u.is_deleted = 0 and end_date >= '$today' and u.user_master_id = " . $user_id . "  group by u.user_master_id";
             $sql = "SELECT u.user_master_id from user_master u where u.is_deleted = 0  and u.user_master_id = " . $user_id . "  group by u.user_master_id";
        }
        $user_list = $this->firequery($sql);

        $userList = null;
        if (!empty($user_list)) {
            $userArr = null;
            foreach ($user_list as $_user) {
                $userArr[] = $_user['user_master_id'];
            }

            if ($userArr != null) {
                $active_users = implode(",", $userArr);
                //$sql = "SELECT u.* from user_master u, order_master o where u.user_master_id = o.created_by and o.is_deleted = 0 and u.is_deleted = 0 and o.created_by NOT IN ($active_users) group by u.user_master_id";
                $sql = "SELECT u.* from user_master u where u.is_deleted = 0 group by u.user_master_id";
                if($user_id != 0 && $user_id != '0'){
                    //$sql = "SELECT u.* from user_master u, order_master o where u.user_master_id = o.created_by and o.is_deleted = 0 and u.is_deleted = 0 and u.user_master_id IN ($active_users) group by u.user_master_id";
                    $sql = "SELECT u.* from user_master u where u.is_deleted = 0 and u.user_master_id = " . $user_id . "    group by u.user_master_id";
                }                
                $userList = $this->firequery($sql);
            }
        }

        return array("user_list" => $userList);
    }

    /**

     * @Route("/sendnotification")

     */
    public function sendnotificationAction() {

        if (isset($_POST['send_notification']) && $_POST['send_notification'] == "send_notification") {
            if ($_POST['note_title'] != "" && $_POST['note_message'] != "") {
                if (!empty($_POST['notification_type']) && $_POST['notification_type'] == 'healthtip') {
                    $code = '7';
                } elseif (!empty($_POST['notification_type']) && $_POST['notification_type'] == 'app_alert') {
                    $code = '11';
                } else {
                    $code = '10';
                }

                $send_to = 'customer'; //$_POST['send_to'];
                $media_id = 'FALSE';
                if (!empty($_FILES['image'])) {
                    $Config_live_site = $this->container->getParameter('live_path');
                    $file_path = $this->container->getParameter('file_path');
                    $file = $_FILES['image']['name'];     // only profile image is allowed
                    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                    if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
                        $tmpname = $_FILES['image']['tmp_name'];
                        $path = $file_path . '/uploads/notification';
                        $upload_dir = $this->container->getParameter('upload_dir') . '/notification/';
                        $media_id = $this->mediauploadAction($file, $tmpname, $path, $upload_dir, 1);
                        $Config_live_site = $this->container->getParameter('live_path');
                        //media upload check

                        if ($media_id != "FALSE") {

                            $media_library = $this->getDoctrine()
                                    ->getManager()
                                    ->getRepository('AdminBundle:Medialibrarymaster')
                                    ->findOneBy(array('media_library_master_id' => $media_id, 'is_deleted' => 0));

                            $response = array(
                                "notification_title" => $_POST['note_title'],
                                "notification_image" => $Config_live_site . $media_library->getMedia_location() . "/" . $media_library->getMedia_name()
                            );



                            $message = json_encode(array("detail" => $_POST['note_message'], "code" => $code, "response" => $response));
                        } else {

                            $message = json_encode(array("detail" => $_POST['note_message'], "code" => $code, "response" => $_POST['note_title']));
                        }
                    } else {

                        $message = json_encode(array("detail" => $_POST['note_message'], "code" => $code, "response" => $_POST['note_title']));
                    }
                } else {
                    $message = json_encode(array("detail" => $_POST['note_message'], "code" => $code, "response" => $_POST['note_title']));
                }
                $em = $this->getDoctrine()->getManager();
                $general_notification = new Generalnotification();
                $general_notification->setNotification_type($_POST['notification_type']);
                $general_notification->setTitle($_POST['note_title']);
                $general_notification->setMessage($_POST['note_message']);
                if (!empty($_FILES['image'])) {
                    if ($media_id != "FALSE") {
                        $general_notification->setImage_id($media_id);
                    }
                }
                $general_notification->setUser_master_id(0);
                $general_notification->setSend_to($send_to);
                if (!empty($this->get('session')->get('domain_id'))) {
                    $general_notification->setDomain_id($this->get('session')->get('domain_id'));
                }
                $general_notification->setCreate_date(date("Y-m-d H:i:s"));
                $general_notification->setIs_deleted(0);
                
                $em->persist($general_notification);
                $em->flush();

                $notification_id_send = $general_notification->getGeneral_notification_id();

                $domain_id = 1;
                $app_id = 'CUST';
                $user_array = array();
                $user_apns_id = array();

                if (isset($_POST['user']) && !empty($_POST['user'])) {
                    foreach ($_POST['user'] as $check) {
                        $user_array[] = $check;
                    }
                }
                
              
                $user_gcm_id = array();

                if ($send_to == "customer") {
                    if (isset($_POST['sendall'])) {  // not in use now
                        if (!empty($this->get('session')->get('domain_id'))) {
                            if ($this->get('session')->get('role_id') == '1') {

                                $user_master = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('AdminBundle:Usermaster')
                                        ->findBy(array("user_role_id" => 7, "status" => "active", "user_type" => "user", "is_deleted" => 0));

                                //"user_type"=>"user"



                                foreach ($user_master as $key => $val) {
                                    $user_array[] = $val->getUser_master_id();
                                }
                            } else {

                                $user_master = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('AdminBundle:Usermaster')
                                        ->findBy(array("user_role_id" => 7, "user_status" => "active", "user_type" => "user", "is_deleted" => 0, "domain_id" => $this->get('session')->get('domain_id')));

                                //"user_type"=>"user"



                                foreach ($user_master as $key => $val) {

                                    $user_array[] = $val->getUser_master_id();
                                }
                            }
                        }
                    }
                }
                if ($send_to == "DEL") {

                    if (isset($_POST['sendall'])) {

                        if (!empty($this->get('session')->get('domain_id'))) {

                            if ($this->get('session')->get('role_id') == '1') {

                                $user_master = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('AdminBundle:Usermaster')
                                        ->findBy(array("user_role_id" => 6, "user_status" => "active", "user_type" => "user", "is_deleted" => 0));



                                //"user_type"=>"user"

                                foreach ($user_master as $key => $val) {

                                    $user_array[] = $val->getUser_master_id();
                                }
                            } else {

                                $user_master = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('AdminBundle:Usermaster')
                                        ->findBy(array("user_role_id" => 6, "user_status" => "active", "user_type" => "user", "is_deleted" => 0, "domain_id" => $this->get('session')->get('domain_id')));

                                //"user_type"=>"user"



                                foreach ($user_master as $key => $val) {

                                    $user_array[] = $val->getUser_master_id();
                                }
                            }
                        }
                    }
                }

                if (!empty($user_array)) {

                    $gcm_regids = $this->find_gcm_regid($user_array);


                    if (!empty($gcm_regids)) {
                        if (count($gcm_regids) > 0) {
                            $this->send_notification($gcm_regids, $_POST['note_title'], $message, 2, $app_id, $domain_id, "general_notification", $notification_id_send);
                        }
                    }




                    $apns_regids = $this->find_apns_regid($user_array);

                    if (!empty($apns_regids)) {

                        if (count($apns_regids[0]) > 0) {

                            $this->send_notification($apns_regids, $_POST['note_title'], $message, 1, $app_id, $domain_id, "general_notification", $notification_id_send);
                        }
                    }

                    $this->get('session')->getFlashBag()->set('success_msg', "Notification sent successfully");
                }



                return $this->redirect($this->generateUrl('admin_pushnotification_index', array("domain" => $this->get('session')->get('domain'))));
            } else {

                $this->get('session')->getFlashBag()->set('error_msg', "Notification title and message is required");
            }
        } else {

            $this->get('session')->getFlashBag()->set('error_msg', 'Oops! Something goes wrong! Try again later');
        }

        return $this->redirect($this->generateUrl('admin_pushnotification_addpushnotification', array("domain" => $this->get('session')->get('domain'))));
    }

    /**

     * @Route("/getuserlist")

     */
    public function getuserlistAction() {
        $html = "";
        if (isset($_POST['flag']) && $_POST['flag'] == 'getuser' && $_POST['user_type'] != "") {

            $user_type = $_POST['user_type'];
            $city_id = !empty($_POST['city_id']) ? $_POST['city_id'] : 0;
            $user_list = array();
            if ($user_type == 'CUST') {

                $user_list = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AdminBundle:Usermaster')
                        ->findBy(array("user_role_id" => 7, "user_status" => "active", "is_deleted" => 0, "domain_id" => $this->get('session')->get('domain_id'), "user_type" => "user"));
            }

            if ($user_type == 'DEL') {

                $user_list = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AdminBundle:Usermaster')
                        ->findBy(array("user_role_id" => 6, "user_status" => "active", "is_deleted" => 0, "domain_id" => $this->get('session')->get('domain_id'), "user_type" => "user"));
            }



            if (!empty($user_list)) {



                $html .= '<label class="col-sm-2 control-label">&nbsp;</label>

								<div class="col-md-10">

									<div class="box box-success box-solid">

										<div class="box-header with-border">

											<h3 class="box-title">Users list</h3>

											<input type="checkbox" id="checkAll" class="checkbox pull-right"/>

										</div>

										<div class="box-body" id="userlistbox">';

                foreach ($user_list as $key => $val) {

                    if (isset($city_id) && !empty($city_id)) {

                        $address_id = 0;

                        $order_master_id = "";

                        $em = $this->getDoctrine()->getManager();

                        $connection = $em->getConnection();

                        $statement = $connection->prepare("select delivery_address_id from order_master where order_createdby='" . $val->getUser_master_id() . "' order by `order_master_id` desc LIMIT 0,1");

                        $statement->execute();

                        $order_master_id = $statement->fetchAll();

                        if (isset($order_master_id) && !empty($order_master_id)) {

                            $address_id = $order_master_id[0]['delivery_address_id'];
                        } else {

                            if ($val->getAddress_master_id() == "0") {

                                //echo "test";

                                continue;
                            } else {

                                $address_id = $val->getAddress_master_id();
                            }
                        }

                        $address_master_id = "";

                        $connection = $em->getConnection();

                        $statement = $connection->prepare("select `city_id` from address_master where `address_master_id`='" . $address_id . "'");

                        $statement->execute();

                        $address_master_id = $statement->fetchAll();

                        if (isset($address_master_id) && !empty($address_master_id)) {

                            $get_city_id = $address_master_id[0]['city_id'];

                            //if($address_master_id[0]['city_id'])
                        }

                        if ($get_city_id == $city_id) {

                            $mono = $this->keyDecryptionAction($val->getUser_mobile());
                            if ($mono != '' && $mono != 0 && $mono != NULL) {
                                $html .= '<div class="col-md-3"><input type="checkbox" name="user[]" class="checkBoxClass" id="mychk" value="' . $val->getUser_master_id() . '"> ' . $mono . '&emsp;</div>';
                            }
                        }
                    } else {

                        $mono = $this->keyDecryptionAction($val->getUser_mobile());

                        $html .= '<input type="checkbox" name="user[]" class="checkBoxClass" id="mychk" value="' . $val->getUser_master_id() . '"> ' . $mono . '&emsp;';
                    }
                }

                $html .= '</div>

									</div>

								</div>';

                $html .= "<script>$('#checkAll').change(function () {

							$('input:checkbox').prop('checked', $(this).prop('checked'));

						});</script>";
            }
        }

        echo $html;
        return new Response;
    }

}
