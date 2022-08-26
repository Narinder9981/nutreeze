<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Usermaster;
use AdminBundle\Entity\Timeslotmaster;
use AdminBundle\Entity\Addressmaster;
use AdminBundle\Entity\Gcmuser;
use AdminBundle\Entity\Apnsuser;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Walletmaster;
class WSUserLoginController extends WSBaseController {

    /**
     * @Route("/ws/userlogin/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function userLoginAction($param) {
        //try{
        $this->title = "User login";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('email', 'password', 'device_name', 'device_token', 'device_id'),
            ),
        );

        if ($this->validateData($param)) {

            $username = $param->email;
            $password = md5($param->password);
            $device_name = '';
            $device_token = '';
            $device_id = '';
            $domain_code = 1;
            if (isset($param->device_name)) {
                $device_name = strtoupper($param->device_name);
                $device_token = $param->device_token;
                $device_id = $param->device_id;
            }
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("SELECT  *   FROM user_master WHERE  is_deleted =0 and status='active' and	(email = '$username') and password='$password'");
            $statement->execute();
            $userMaster = $statement->fetchAll();
            if (!empty($userMaster)) {
                foreach ($userMaster as $userMaster) {
                    $mauser = $this->getDoctrine()
                            ->getManager()
                            ->getRepository("AdminBundle:Usermaster")
                            ->findOneBy(array("user_master_id" => $userMaster['user_master_id'],
                        "is_deleted" => 0));

                    $media_id = $userMaster['user_image'];

                    if (!empty($userMaster) && !empty($device_name) && ($device_name == 'IOS' || $device_name == 'IPHONE' || $device_name == 'Iphone' || $device_name == 'ios')) {
                        $sql = " UPDATE apns_user SET is_deleted='1' WHERE device_id='$device_id' AND app_id='CUST' AND is_deleted='0' ";
                        $em = $this->getDoctrine()->getManager();
                        $conn = $em->getConnection();
                        $st = $conn->prepare($sql);
                        $st->execute();
                        $em->flush();

                        $apns_user_info = new Apnsuser();
                        $apns_user_info->setApns_regid($device_token);
                        $apns_user_info->setUser_id($userMaster['user_master_id']);
                        $apns_user_info->setUser_type('user');
                        $apns_user_info->setApp_id('CUST');
                        $apns_user_info->setName($userMaster['user_firstname']);
                        $apns_user_info->setDevice_id($device_id);
                        $apns_user_info->setIs_deleted(0);
                        $apns_user_info->setSend_notification('on');
                        $apns_user_info->setCreated_date(date('Y-m-d H:i:s'));
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($apns_user_info);
                        $em->flush();
                        $data = true;
                    } elseif (!empty($userMaster) && !empty($device_name) && ($device_name == 'ANDROID' || $device_name == 'Android' || $device_name == 'ANDROID' || $device_name == 'android')) {
                        $sql = "UPDATE gcm_user SET is_deleted='1' WHERE device_id='$device_id' AND app_id='CUST' AND is_deleted='0'";
                        $em = $this->getDoctrine()->getManager();
                        $conn = $em->getConnection();
                        $st = $conn->prepare($sql);
                        $st->execute();
                        $em->flush();

                        $gcm_user_info = new Gcmuser();
                        $gcm_user_info->setGcm_regid($device_token);
                        $gcm_user_info->setUser_id($userMaster['user_master_id']);
                        $gcm_user_info->setUser_type('user');
                        $gcm_user_info->setApp_id('CUST');
                        $gcm_user_info->setName($userMaster['user_firstname']);
                        $gcm_user_info->setCreated_date(date('Y-m-d H:i:s'));
                        $gcm_user_info->setDevice_id($device_id);
                        $gcm_user_info->setIs_deleted(0);
                        $gcm_user_info->setSend_notification('on');
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($gcm_user_info);
                        $em->flush();
                        $data = true;
                    }
                    $mauser_details = $this->getDoctrine()
                            ->getManager()
                            ->getRepository("AdminBundle:Userdetailsmaster")
                            ->findOneBy(array(
                        "user_master_id" => $userMaster['user_master_id'],
                        "is_deleted" => 0
                    ));
                    $user_goal_id = 0;
                    $know_what_to_eat = 0;
                    if (!empty($mauser_details)) {
                        $user_goal_id = $mauser_details->getUser_goal_id();
                        $know_what_to_eat = $mauser_details->getKnow_what_to_eat();
                    }

                    $img_details = $this->getMediaDetailAction($media_id);
                    $img_url = !empty($img_details) ? $img_details['url'] : null;
                    $user_goal = $this->getGoalAction($user_goal_id);
                    $area = $this->getAreaAction($userMaster['area_id']);
                    $address = $this->getAddressAction($userMaster['address_master_id']);
                    $point = $this->getLoyalitypointAction($userMaster['user_master_id']);
                    $height = $this->getHeightAction($userMaster['height']);
                    $weight = $this->getWeightAction($userMaster['weight']);
                    $wallet_array = NULL ; 
                    $wallet_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("user_master_id"=>$userMaster['user_master_id'],'is_deleted'=>0,'wallet_status'=>'active'));
                    if($wallet_master_info){
                        $wallet_array = array(
                            "wallet_id"=>$wallet_master_info->getWallet_master_id(),
                            "wallet_amount"=>$wallet_master_info->getWallet_amount(),
                            "wallet_code"=>$wallet_master_info->getWallet_user_code()                    
                        );
                    }
                    if ($userMaster['user_role_id'] == $this->CUSTOMER_ROLE) {
                       $get_tc  =   $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Timeslotmaster")
                                ->findOneBy(array("main_time_slot_master_id"=> $userMaster['delivery_time_id'],"is_deleted"=>0));
                        $delivery_time = null;
                        if(!empty($get_tc)){
                            $delivery_time=$get_tc->getTitle();
                        }
                        $response = array(
                            "user_id" => $userMaster['user_master_id'],
                            "email" => $userMaster['email'],
                            "first_name" => $userMaster['user_firstname'],
                            "last_name" => $userMaster['user_lastname'],
                            "mobile_no" => $userMaster['user_mobile'],
                            "height" => $userMaster['height'],
                            "calorie_count" => $userMaster['calorie_count'],
                            "delivery_time_id" => $userMaster['delivery_time_id'],
							"order_note_id" => $userMaster['order_note_id'],
                            "delivery_time_name"=>$delivery_time,
                            "gender" => $userMaster['user_gender'],
                            "date_of_birth" => !empty($userMaster['date_of_birth']) ? strtotime($userMaster['date_of_birth']) * 1000 : 0,
                            "weight" => $userMaster['weight'],
                            "user_image" => $img_url,
                            "is_know_what_to_eat" => !empty($know_what_to_eat) ? $know_what_to_eat : 0,
                            "goal" => $user_goal,
                            "area" => $area,
                            "point" => $point,
                            "new_points" => $userMaster['loyalty_points'],
                            "address" => $address,
                            "wallet_array" => $wallet_array,
                            "current_package" => $this->getCurrentpackageAction($userMaster['user_master_id']),
                                );
                    }
                    $company = $this->getCompanydetails($userMaster['parent_user_id']);
                    if ($userMaster['user_role_id'] == $this->DRIVER_ROLE) {
                        $response = array(
                            "user_id" => $userMaster['user_master_id'],
                            "email" => $userMaster['email'],
                            "first_name" => $userMaster['user_firstname'],
                            "last_name" => $userMaster['user_lastname'],
                            "mobile_no" => $userMaster['user_mobile'],
                            "user_image" => $img_url,
                            "company" => $company,
                            "area" => $area,
                            "lat" => $userMaster['lat'],
                            "lng" => $userMaster['lang'],
                                );
                    }
                    if (!empty($response)) {
                        $this->error = "SFD";
                    } else {
                        $this->error = "NRF";
                    }
                }
            } else {
                $this->error = "NRF";
            }
        } else {
            $this->error = "PIM";
        }
        $res = new Gcmuser();
        if (empty($response)) {
            $response = $res;
            $this->status = 201;
            $this->message = false;
        } else {
            $this->status = 200;
            $this->message = true;
        }

        
        $this->data = $response;
        
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = "SFND" ;
          return $this->responseAction() ;
          } */
    }

    /**
     * @Route("/ws/update_token/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function update_tokenAction($param) {
        //try{
        $this->title = "Update token";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'device_type', 'device_id', 'reg_id', 'app_id', 'user_type'),
            ),
        );

        if ($this->validateData($param)) {

            $devicename = strtolower(urlencode($param->device_type));

            $device_id = urlencode($param->device_id);

            $regid = $param->reg_id;

            $user_id = $param->user_id;

            $app_id = $param->app_id;

            $user_type = $param->user_type;

            $data = false;

            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("SELECT  *   FROM user_master WHERE  is_deleted =0 and  status='active' AND user_master_id='$user_id' ");
            $statement->execute();
            $userMaster = $statement->fetch();


            if (!empty($userMaster) && !empty($devicename) && ($devicename == 'ios' || $devicename == 'iphone' || $devicename == 'Iphone' || $devicename == 'IPHONE')) {
                $sql = "UPDATE apns_user set is_deleted='1' WHERE device_id='$device_id' AND is_deleted='0' AND app_id='$app_id' ";

                $em = $this->getDoctrine()->getManager();
                $conn = $em->getConnection();
                $st = $conn->prepare($sql);
                $st->execute();
                $em->flush();

                $apns_user_info = new Apnsuser();
                $apns_user_info->setApns_regid($regid);
                $apns_user_info->setUser_id($user_id);
                $apns_user_info->setUser_type($user_type);
                $apns_user_info->setApp_id($app_id);
                $apns_user_info->setName('');
                $apns_user_info->setDevice_id($device_id);
                $apns_user_info->setIs_deleted(0);
                $apns_user_info->setCreated_date(date('Y-m-d H:i:s'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($apns_user_info);
                $em->flush();
                $data = true;
                $this->error = "SFD";
            } elseif (!empty($userMaster) && !empty($devicename) && $devicename == 'android' && $devicename == 'ANDROID' && $devicename == 'Android') {

                $sql = "UPDATE gcm_user set is_deleted='1' WHERE device_id='$device_id' AND is_deleted='0' AND app_id='$app_id' ";

                $em = $this->getDoctrine()->getManager();
                $conn = $em->getConnection();
                $st = $conn->prepare($sql);
                $st->execute();
                $em->flush();

                $gcm_user_info = new Gcmuser();
                $gcm_user_info->setGcm_regid($regid);
                $gcm_user_info->setUser_id($user_id);
                $gcm_user_info->setUser_type($user_type);
                $gcm_user_info->setApp_id($app_id);
                $gcm_user_info->setName('');
                $gcm_user_info->setCreated_date(date('Y-m-d H:i:s'));
                $gcm_user_info->setDevice_id($device_id);

                $gcm_user_info->setIs_deleted(0);
                $em = $this->getDoctrine()->getManager();
                $em->persist($gcm_user_info);
                $em->flush();
                $data = true;
                $this->error = "SFD";
            } else {
                $this->error = "NRF";
            }
            $response = $data;
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            $response = false;
        }

        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = "SFND" ;
          return $this->responseAction() ;
          } */
    }

    /**
     * @Route("/ws/userlogout/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function userlogoutAction($param) {
        //try{
        $this->title = "User Logout";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'device_id', 'app_id'),
            ),
        );

        if ($this->validateData($param)) {
            $user_id = $param->user_id;
            $device_id = $param->device_id;
            $app_id = $param->app_id;
            $apns_user_delete_list = $this->getDoctrine()
                    ->getManager()
                    ->getRepository("MainAdminBundle:Apnsuser")
                    ->findOneBy(array(
                "user_id" => $user_id,
                "device_id" => $device_id,
                "app_id" => $app_id,
                "is_deleted" => '0'
            ));
            if (!empty($apns_user_delete_list)) {
                $apns_user_delete_list->setIs_deleted(1);
                $em = $this->getDoctrine()->getManager();
                $em->persist($apns_user_delete_list);
                $em->flush();
                $response = array('user_id' => $user_id, 'device_id' => $device_id, 'app_id' => $app_id);
                $this->error = "SFD";
            } else {
                $this->error = "NRF";
            }
            if (empty($response)) {
                $response = false;
            }

            $this->data = $response;
            return $this->responseAction();
        }
    }

}

?>
