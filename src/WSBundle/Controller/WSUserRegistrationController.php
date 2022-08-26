<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Usermaster;
use AdminBundle\Entity\Userrolemaster;
use AdminBundle\Entity\Smshistorymaster;
use AdminBundle\Entity\Timeslotmaster;
use AdminBundle\Entity\Gcmuser;
use AdminBundle\Entity\Apnsuser;
use AdminBundle\Entity\Userdetailsmaster;
use AdminBundle\Entity\Addressmaster;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Walletmaster;
class WSUserRegistrationController extends WSBaseController {
    /**
     * @Route("/ws/userregistration/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function userRegistrationAction($param) {
        //try{
        //die('test');
        $this->title = "User registration";
        $param = $this->requestAction($this->getRequest(), 0);
        // use to validate required param validation
        if(!empty($param->user_id)){
              $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('first_name', 'last_name', 'email', 'mobile_no', 'device_name', 'device_token', 'device_id'),
            ),
        );
        }
        else{
            $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('first_name', 'last_name', 'email', 'mobile_no',   'password', 'device_name', 'device_token', 'device_id'),
            ),
        );
        }
        
        if ($this->validateData($param)) {
            $registration_from = !empty($param->registration_from) ? $param->registration_from : 'normal';
            $firstname = $param->first_name;
            $lastname = $param->last_name;
            $email_id = $param->email;
            $mobile_no = $param->mobile_no;
            $gender = !empty($param->gender) ? $param->gender : 'male';//$param->gender;
            $Date = date("Y-m-d");
            $date_of_birth = NULL ; //date('Y-m-d', strtotime($Date. ' - 7 days'));
            if(isset($param->date_of_birth ) && ($param->date_of_birth !='' ) && ($param->date_of_birth != NULL) ){
                $date_of_birth = date('Y-m-d', ($param->date_of_birth / 1000));
            }
            $password = !empty($param->password) ? $param->password : '';
            $user_id = !empty($param->user_id) ? $param->user_id : '0';
            $height = !empty($param->height) ? $param->height : '';
            $weight = !empty($param->weight) ? $param->weight : '';
            $area_id = !empty($param->area_id) ? $param->area_id : 0;
            $calorie_count = !empty($param->calorie_count) ? $param->calorie_count : 1300;
            $delivery_time = !empty($param->delivery_time) ? $param->delivery_time : 0;
            $order_note_id = !empty($param->order_note_id) ? $param->order_note_id : 0;
            $area_id = !empty($param->area_id) ? $param->area_id : 0;
            $lang_id = !empty($param->lang_id) ? $param->lang_id : 1;
            $user_goal_id = !empty($param->goal_id) ? $param->goal_id : 0;
            $is_know_what_to_eat = !empty($param->is_know_what_to_eat) ? $param->is_know_what_to_eat : 'no';
            $is_consult_for_schedule = !empty($param->is_consult_for_schedule) ? $param->is_consult_for_schedule : 'no';
            $is_consult_for_workout = !empty($param->is_consult_for_workout) ? $param->is_consult_for_workout : 'no';
            $area_name = '';
            $device_name = '';
            $device_token = '';
            $device_id = '';
            $domain_code = 1;
            if (isset($param->device_name)) {
                $device_name = strtoupper($param->device_name);
                $device_token = $param->device_token;
                $device_id = $param->device_id;
            }
            $domain_code = '';
            $app_id = 'CUST';
            //user image
            $media_id = $media_id1 = 0;
            $upload_dir = "";
            if (isset($_FILES['user_image']) && !empty($_FILES['user_image'])) {
                $tmpname = $_FILES['user_image']['tmp_name'];
                $file = $_FILES['user_image']['name'];
                $path = "users";
                $media_id = $this->fileupload1($file, $tmpname, $path);
            }
            if (isset($_FILES['body_report_image']) && !empty($_FILES['body_report_image'])) {
                $tmpname = $_FILES['body_report_image']['tmp_name'];
                $file = $_FILES['body_report_image']['name'];
                $path = "user_report";
                $media_id1 = $this->fileupload1($file, $tmpname, $path);
            }
            //user image..
            // check for user exist or not
            if (!empty($user_id)) {
                $userDetail = $this->getDoctrine()
                        ->getManager()
                        ->getRepository("AdminBundle:Usermaster")
                        ->findOneBy(array(
                    "user_master_id" => $user_id,
                    "email" => $email_id,
                    "is_deleted" => 0,
                        )
                        );
                if (!isset($userDetail) && empty($userDetail)) {
                    $userDetail = $this->getDoctrine()
                            ->getManager()
                            ->getRepository("AdminBundle:Usermaster")
                            ->findOneBy(array(
                        "email" => $email_id,
                            )
                            );
                    if (isset($userDetail) && !empty($userDetail)) {
                        $this->error = "ARE";
                        $this->data = false;
                        return $this->responseAction();
                    }
                }
            } else {
                $userDetail = $this->getDoctrine()
                        ->getManager()
                        ->getRepository("AdminBundle:Usermaster")
                        ->findOneBy(array(
                    "email" => $email_id,
                    "is_deleted" => 0,
                        )
                        );
                if (isset($userDetail) && !empty($userDetail)) {
                    $this->error = "ARE";
                    $emptyObj = new Usermaster();
                    $this->data = $emptyObj;
                    $this->message = false;
                    $this->status = 201;
                    //echo'<pre>';print_r($emptyjson);die('test');
                    return $this->responseAction();
                }
            }
            // Create local user
            $userMaster = $this->getDoctrine()
                    ->getManager()
                    ->getRepository("AdminBundle:Usermaster")
                    ->findOneBy(array(
                "user_master_id" => $user_id,
                "is_deleted" => 0,
                    )
                    );
            $verification_code = rand(1000, 9999);
            $verification_code = 0000;
            if (empty($userMaster)) {
                $userMaster = new Usermaster();
            }
            $userMaster->setUser_role_id(3);
            if (empty($user_id)) {
                $unique_no = $this->getUniqueCode();
                $userMaster->setUnique_user_id($unique_no);
                //$userMaster->setUnique_user_id(uniqid()) ;
            }
            $userMaster->setUsername($email_id); // default for customer
            if ($password != '') {
                $userMaster->setPassword(md5($password));
                $userMaster->setShow_password($password);
            }
            $userMaster->setUser_firstname($firstname);
            $userMaster->setUser_lastname($lastname);
            $userMaster->setUser_mobile($mobile_no);
            $userMaster->setEmail($email_id);
            if ($media_id != 0 || $user_id == 0) {
                $userMaster->setUser_image($media_id);
            }
            $userMaster->setParent_user_id(0);
            $userMaster->setUser_gender($gender);
            $userMaster->setDate_of_birth($date_of_birth);
            if (!empty($param->height) || $user_id == 0) {
                $userMaster->setHeight($height);
            }
            if (!empty($param->weight) || $user_id == 0) {
                $userMaster->setWeight($weight);
            }
            if (!empty($param->area_id) || $user_id == 0) {
                $userMaster->setArea_id($area_id);
            }
            $userMaster->setLat(0);
            $userMaster->setLang(0);
            $userMaster->setCreated_by(1);
            $userMaster->setStatus("active");
            $userMaster->setUser_type("user");
            $userMaster->setCurrent_lang_id(1);
            $userMaster->setCalorie_count($calorie_count);
            $userMaster->setDelivery_time_id($delivery_time);
            $userMaster->setOrder_note_id($order_note_id);
            $userMaster->setDomain_id(1);
            $userMaster->setCreated_datetime(date('Y-m-d H:i:s'));
            $userMaster->setLast_modified(date('Y-m-d H:i:s'));
            $userMaster->setLast_login(date('Y-m-d H:i:s'));
            $userMaster->setRegistration_from($registration_from);
            if ($user_id == 0) {
                $userMaster->setIs_verified(0);
                $userMaster->setLoyalty_points(0);
            }
            if (empty($user_id)) {
                $userMaster->setVerification_code($verification_code);
            }
            $userMaster->setIs_deleted(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($userMaster);
            $em->flush();
            if (empty($user_id)) {
                $userName = $firstname . " " . $lastname;
                $this->sendMailAfterRegistration($userName, $email_id);
            }
            $user_master_id = $userMaster->getUser_master_id();
            $wallet_array = NULL ;
            if (!empty($user_master_id)) {
                //-- create Wallet of this user -------------
                $wallet_master = new Walletmaster();
                $wallet_master->setUser_master_id($user_master_id);
                $wallet_master->setWallet_user_code(sha1($user_master_id. 'MuscleFuel') );
               
                $wallet_master->setWallet_amount(0);
                $wallet_master->setWallet_status('active');
                $wallet_master->setWallet_created(date("Y-m-d h:i:s"));
                $wallet_master->setWallet_last_updated(date("Y-m-d h:i:s"));
                $wallet_master->setIs_deleted(0);
                $em->persist($wallet_master);
                $em->flush();
                
                $wallet_transaction_history = new Wallettransactionhistory();
                $wallet_transaction_history->setWallet_master_id($wallet_master->getWallet_master_id());
                $wallet_transaction_history->setUser_master_id($user_master_id);
                $wallet_transaction_history->setWallet_action('init');
                $wallet_transaction_history->setPrevious_amount(0);
                $wallet_transaction_history->setAfter_action_amount(0);
                $wallet_transaction_history->setTransaction_amount(0);
                $wallet_transaction_history->setAction_created_datetime(date("Y-m-d H:i:s"));
                $wallet_transaction_history->setIs_deleted(0);
                $em->persist($wallet_transaction_history);
                $em->flush();
                
                $wallet_array = array(
                    "wallet_id"=>$wallet_master->getWallet_master_id(),
                    "wallet_amount"=>$wallet_master->getWallet_amount(),
                    "wallet_code"=>$wallet_master->getWallet_user_code()                    
                );
                $userDetailsMaster = $this->getDoctrine()
                        ->getManager()
                        ->getRepository("AdminBundle:Userdetailsmaster")
                        ->findOneBy(array(
                    "user_master_id" => $user_id,
                    "is_deleted" => 0,
                        )
                        );
                if (empty($userDetailsMaster)) {
                    $userDetailsMaster = new Userdetailsmaster();
                }
                $userDetailsMaster->setUser_master_id($user_master_id);
                if (!empty($param->goal_id) || $user_id == 0) {
                    $userDetailsMaster->setUser_goal_id($user_goal_id);
                }
                if (!empty($param->is_know_what_to_eat) || $user_id == 0) {
                    $userDetailsMaster->setKnow_what_to_eat($is_know_what_to_eat);
                }
                if (!empty($param->is_consult_for_schedule) || $user_id == 0) {
                    $userDetailsMaster->setIs_consult_for_schedule($is_consult_for_schedule);
                }
                if (!empty($param->is_consult_for_workout) || $user_id == 0) {
                    $userDetailsMaster->setIs_consult_for_workout($is_consult_for_workout);
                }
                $userDetailsMaster->setNeed_consulatant_for('none');
                if ($media_id1 != 0 || $user_id == 0) {
                    $userDetailsMaster->setBody_report($media_id1);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($userDetailsMaster);
                $em->flush();
                $know_what_to_eat = $userDetailsMaster->getKnow_what_to_eat();
            }
            $em = $this->getDoctrine()->getManager();
            $userMasterUpdate = $em->getRepository("AdminBundle:Usermaster")->find($user_master_id);
            $userMasterUpdate->setCreated_by($user_master_id);
            $em->flush();
            #addAddressOfUser here while registration step 1
            $address_type = !empty($param->address_type) ? $param->address_type : '';
            $area_id = !empty($param->area_id) ? $param->area_id : '';
            $block = !empty($param->block) ? $param->block : '';
            $street = !empty($param->street) ? $param->street : '';
            $avenue = !empty($param->avenue) ? $param->avenue : '';
            $lat = !empty($param->lat) ? $param->lat : '';
            $lang = !empty($param->lang) ? $param->lang : '';
            $house_number = !empty($param->house_number) ? $param->house_number : '';
            $floor_no = !empty($param->floor_no) ? $param->floor_no : '';
            $flat_no = !empty($param->flat_no) ? $param->flat_no : '';
            $directions = !empty($param->directions) ? $param->directions : '';
            $em = $this->getDoctrine()->getManager();

            #addAddressOfUser here while registration done step 1
            //SMS SEND
            //-----------Send SMS to User----------------------------------
            $msg_sent_error = "";
            
            //-------------End SMS End------------------------
            /*             * ****** for IOS apns_reg_id issue solution ****** */
            if ($device_name == 'IPHONE' || strtolower($device_name) == 'iphone' || strtolower($device_name) == 'ios') {
                $em = $this->getDoctrine()->getManager();
                $conn = $em->getConnection();
                $st = $conn->prepare("
                  UPDATE apns_user
                  SET is_deleted = '1'
                  WHERE domain_id = '$domain_code' AND device_id='$device_id' AND app_id='$app_id'
                ");
                $st->execute();
                $em->flush();
                if (isset($device_id) && isset($device_token)) {
                    $apns_user_update = $this->getDoctrine()
                            ->getManager()
                            ->getRepository("AdminBundle:Apnsuser")
                            ->findOneBy(array("user_id" => $user_master_id, "domain_id" => $domain_code, "app_id" => $app_id));
                    if (!empty($apns_user_update)) {
                        $apns_user_update->setApns_regid($device_token);
                        $apns_user_update->setUser_id($user_master_id);
                        $apns_user_update->setDevice_id($device_id);
                        $apns_user_update->setCreated_date(date('Y-m-d H:i:s'));
                        $apns_user_update->setSend_notification('on');
                        $apns_user_update->setUser_type('user');
                        $apns_user_update->setApp_id($app_id);
                        $apns_user_update->setName('');
                        $apns_user_update->setIs_deleted(0);
                        $em->persist($apns_user_update);
                        $em->flush();
                    } else {
                        $send_notification = 'on';
                        $check2 = $this->getDoctrine()
                                ->getManager()
                                ->getRepository("AdminBundle:Apnsuser")
                                ->findOneBy(array("user_id" => $user_master_id));
                        if (!empty($check2)) {
                            $send_notification = $check2->getSend_notification();
                        }
                        $apns_user_update = new Apnsuser();
                        $apns_user_update->setApns_regid($device_token);
                        $apns_user_update->setUser_id($user_master_id);
                        $apns_user_update->setDevice_id($device_id);
                        $apns_user_update->setCreated_date(date('Y-m-d H:i:s'));
                        $apns_user_update->setUser_type('user');
                        $apns_user_update->setApp_id($app_id);
                        $apns_user_update->setSend_notification($send_notification);
                        $apns_user_update->setName('');
                        $apns_user_update->setIs_deleted(0);
                        $em->persist($apns_user_update);
                        $em->flush();
                    }
                }
            }
            if ($device_name == 'ANDROID' || strtolower($device_name) == 'android' || $device_name == 'Android') {
                $em = $this->getDoctrine()->getManager();
                $conn = $em->getConnection();
                $st = $conn->prepare("
                  UPDATE gcm_user
                  SET Is_deleted = '1'
                  WHERE domain_id = '$domain_code' AND device_id='$device_id' AND app_id='$app_id'
                ");
                $st->execute();
                $em->flush();
                $gcm_user_del = $this->getDoctrine()
                        ->getManager()
                        ->getRepository("AdminBundle:Gcmuser")
                        ->findOneBy(array("user_id" => $user_master_id, "domain_id" => $domain_code, "app_id" => $app_id));
                if (!empty($gcm_user_del)) {
                    $gcm_user_del->setGcm_regid($device_token);
                    $gcm_user_del->setUser_id($user_master_id);
                    $gcm_user_del->setDevice_id($device_id);
                    $gcm_user_del->setApp_id($app_id);
                    $gcm_user_del->setDomain_id($domain_code);
                    $gcm_user_del->setName('');
                    $gcm_user_del->setCreated_date(date('Y-m-d H:i:s'));
                    $gcm_user_del->setSend_notification('on');
                    $gcm_user_del->setUser_type('user');
                    $gcm_user_del->setIs_deleted(0);
                    $em->persist($gcm_user_del);
                    $em->flush();
                } else {
                    $send_notification = 'on';
                    $check2 = $this->getDoctrine()
                            ->getManager()
                            ->getRepository("AdminBundle:Gcmuser")
                            ->findOneBy(array("user_id" => $user_master_id));
                    if (!empty($check2)) {
                        $send_notification = $check2->getSend_notification();
                    }
                    $gcm_user_del = new Gcmuser();
                    $gcm_user_del->setGcm_regid($device_token);
                    $gcm_user_del->setUser_id($user_master_id);
                    $gcm_user_del->setDevice_id($device_id);
                    $gcm_user_del->setApp_id($app_id);
                    $gcm_user_del->setDomain_id($domain_code);
                    $gcm_user_del->setName('');
                    $gcm_user_del->setCreated_date(date('Y-m-d H:i:s'));
                    $gcm_user_del->setUser_type('user');
                    $gcm_user_del->setSend_notification($send_notification);
                    $gcm_user_del->setIs_deleted(0);
                    $em->persist($gcm_user_del);
                    $em->flush();
                }
            }
            $img_details = $this->getMediaDetailAction($userMaster->getUser_image());
            $img_details_body_report = $this->getMediaDetailAction($userDetailsMaster->getBody_report());
            $img_url = !empty($img_details) ? $img_details['url'] : null;
            $img_url_body_report = !empty($img_details_body_report) ? $img_details_body_report['url'] : null;
            $user_goal = null;
            if ($userDetailsMaster) {
                $user_goal = $this->getGoalAction($userDetailsMaster->getUser_goal_id());
            }
            $area_arr = $this->getAreaAction($userMaster->getArea_id(), $lang_id);
            if (!empty($area_arr)) {
                $area_name = $area_arr['area_name'];
            }
            $get_tc  =   $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Timeslotmaster")
                                ->findOneBy(array("main_time_slot_master_id"=> $userMaster->getDelivery_time_id(),"is_deleted"=>0));
                        $delivery_time = null;
                        if(!empty($get_tc)){
                            $delivery_time=$get_tc->getTitle();
                        }
            $height = $this->getHeightAction($userMaster->getHeight());
            $weight = $this->getWeightAction($userMaster->getWeight());
            $point = $this->getLoyalitypointAction($userMaster->getUser_master_id());
            $address = $this->getAddressAction($userMaster->getAddress_master_id());
            $order_master = $this->getDoctrine()->getManager()
                    ->getRepository("AdminBundle:Ordermaster")
                    ->findBy(array("order_by" => $userMaster->getUser_master_id()));

            foreach($order_master as $order){
                if(strtotime($order->getStart_date())>=strtotime('Y-m-d')){
                    $order->setDelivery_time_id($userMaster->getDelivery_time_id());
                    $order->setOrder_note_id($userMaster->getOrder_note_id());
                    $em->persist($order);
                    $em->flush();
                }
            }

            $response = array(
                "user_id" => $userMaster->getUser_master_id(),
                "email" => $userMaster->getEmail(),
                "first_name" => $userMaster->getUser_firstname(),
                "last_name" => $userMaster->getUser_lastname(),
                "mobile_no" => $userMaster->getUser_mobile(),
                "height" => $userMaster->getHeight(),
                "calorie_count" => $userMaster->getCalorie_count(),
                "delivery_time_id" => $userMaster->getDelivery_time_id(),
                "order_note_id" => $userMaster->getOrder_note_id(),
                "delivery_time_name"=>$delivery_time,

                "gender" => $userMaster->getUser_gender(),
                "date_of_birth" => ($userMaster->getDate_of_birth() != NULL ) ?strtotime($userMaster->getDate_of_birth()) * 1000 : NULL,
                "weight" => $userMaster->getWeight(),
                "user_image" => $img_url,
                "img_url_body_report" => $img_url_body_report,
                "is_know_what_to_eat" => $know_what_to_eat,
                "goal" => $user_goal,
                "goal_id" => $userDetailsMaster->getUser_goal_id(),
                "area" => $area_name,
                "address" => $address,
                "point" => $point,
                "new_points" => $userMaster->getLoyalty_points(),
                "current_package" => $this->getCurrentpackageAction($userMaster->getUser_master_id()),
                //'verification_code'	=> empty($user_id)?$userMaster->getVerification_code():0						
                'verification_code' => 0000,
                'wallet_array'=>$wallet_array
            );
            $this->error = "SFD";
        } else {
            $this->error = "PIM";
        }
        
        if (empty($response)) {
            
            $response = false;
        }
        $this->data = $response;
        $this->status = 200;
        $this->message = true;
        return $this->responseAction();
        //}catch(\Exception $e){
        //	$this->error = "SFND ".$e ;
        //	$this->data = false ;
        //	return $this->responseAction() ;
        //}
    }
    function getUniqueCode() {
        //$_sql = "SELECT * from user_master where unique_user_id != '' order by user_master_id desc";
        //$_sql = "SELECT * from user_master where unique_user_id != '' order by unique_user_id desc LIMIT 0 ,1";
       $_sql = "SELECT * from user_master where unique_user_id != '' order by user_master_id desc LIMIT 0 ,1";
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
    function sendMailAfterRegistration($userName, $email) {
        $Config_live_site = $this->container->getParameter('live_path');
        #email html template
        $email_message = "<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title></title><style type='text/css'>body {margin: 0;}body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;font-style: normal;font-weight: 400;}
button{width:90%;}@media screen and (max-width:600px) {body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;}
table {width: 100%;}.footer {height: auto !important;max-width: 48% !important;width: 48% !important;}table.responsiveImage {height: auto !important;max-width: 30% !important;width: 30% !important;}table.responsiveContent {height: auto !important;max-width: 66% !important;width: 66% !important;}.top {height: auto !important;max-width: 48% !important;width: 48% !important;}.catalog {margin-left: 0%!important;}}@media screen and (max-width:480px) {body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;}table {width: 100% !important;border-style: none !important;}.footer {height: auto !important;max-width: 96% !important;width: 96% !important;}.table.responsiveImage {height: auto !important;max-width: 96% !important;width: 96% !important;}.table.responsiveContent {height: auto !important;max-width: 96% !important;width: 96% !important;}.top {height: auto !important;max-width: 100% !important;width: 100% !important;}
.catalog {margin-left: 0%!important;}}</style></head><body><table width='100%' cellspacing='0' cellpadding='0'><tbody><tr><td><table style='border:1px solid' width='70%'  align='center' cellpadding='0' cellspacing='0'><tbody><tr><td><table  bgcolor='#FFFFFF' class='top' width='100%'  align='left' cellpadding='0' cellspacing='0' style='padding:10px 10px 10px 10px;border-radius:5px'><tbody><tr><td style='font-size: 12px; color:#FFF; padding-left:20px; font-family: arial,sans-serif;'><img src='" . $Config_live_site . "/bundles/design/appLogo.png' style='height:50px;width:50px' ></td></tr></tbody></table></td></tr><tr> <td><table width='100%'  align='left' cellpadding='0' cellspacing='0'><tr><td style='font-size: 14px; font-weight: bold; padding: 20px; color: #222; font-family: arial,sans-serif;'>Congratulation , you have success fully registered with us.</td></tr><tr> <td align='center' style='font-size: 16px; font-weight:300; color: #929292; font-family: arial,sans-serif;'>
                    <h4>Hello " . $userName . " , Now you can Login to Nutrezee app.</h4>
                    
                    </td>
                  </tr>
                  <tr>
                    <td align='center' style='font-size: 16px; font-weight:300; color: #929292; font-family: arial,sans-serif;'>
                    
                    </td>
</tr><tr><td></td></tr><tr><td style='font-size: 0; line-height: 0;' height='20'><table width='96%' align='left'  cellpadding='0' cellspacing='0'><tr><td style='font-size: 0; line-height: 0;' height='20'>&nbsp;</td></tr></table></td></tr><tr> <td align='left' style='font-size: 14px; font-style: normal; font-weight: bold; color: #222; line-height: 1.8; text-align:justify; padding:10px 20px 0px 20px; font-family:arial,sans-serif;'></td></tr></table></td></tr><tr> <td style='font-size: 0; line-height: 0;' height='10'><table width='96%' align='left'  cellpadding='0' cellspacing='0'><tr><td style='font-size: 0; line-height: 0;' height='20'>&nbsp;</td></tr></table></td></tr><tr bgcolor='#FFFFFF'><td><table class='footer' width='48%'  align='left' cellpadding='0' cellspacing='0'><tr><td><p align='center'  style='font-size: 14px; font-weight:300; line-height: 10px; color: black; font-family: arial,sans-serif;'>&copy; Copyright Nutrezee</p></td></tr></table></td></tr></tbody></table></td></tr></tbody></table></body></html>
					";
#email html template done
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Nutrezee | Admin' . "\r\n";
        @mail($email, "Thank you for Registration.", $email_message, $headers);
//				echo $email_message;exit;
    }
}
?>