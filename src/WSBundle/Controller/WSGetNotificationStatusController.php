<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Apnsuser;
use AdminBundle\Entity\Gcmuser;

class WSGetNotificationStatusController extends WSBaseController {

    /**
     * @Route("/ws/getnotification_status/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function getnotification_statusAction() {
        try {
            $this->title = "App user Notification status";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('user_id', 'device_id', 'device_name', 'device_token'),
                ),
            );

            if ($this->validateData($param)) {
                $user_id = $param->user_id;
                $device_name = strtoupper($param->device_name);
                $device_id = $param->device_id;
                $device_token = $param->device_token;
                $em = $this->getDoctrine()->getManager();
				if ($device_name == 'IPHONE' || $device_name == 'iphone' || $device_name == 'ios' || $device_name == 'IOS') {
                    if (isset($user_id)) {

                        $entity = $this->getDoctrine()->getManager();
                        $update_user = $entity->getRepository('AdminBundle:Apnsuser')->findOneBy(
                                array(
                                    'user_id' => $user_id,
                                    'device_id' => $device_id,
                                    'is_deleted' => 0
                                )
                        );
                        
                        // echo'<pre>';print_r($update_user);die('test');
                        if (!empty($update_user)) {
                            if($update_user->getSend_notification()=='on'){
                                $send_notification = 'true';
                            } else {
                                $send_notification = 'false';
                            }
                            $response = array(
                                'user_id' => $user_id,
                                'device_name' => $device_name,
                                'device_id' => $device_id,
                                'device_token' => $device_token,
                                'notification_status' => $send_notification
                            );

                            $this->error = "SFD";
                        } else {
                            $this->error = "NRF";
                        }
                    }
				} else if($device_name == 'ANDROID' || $device_name == 'android' || $device_name == 'Android'){
                    if (isset($user_id)) {

                        $entity = $this->getDoctrine()->getManager();
                        $update_user = $entity->getRepository('AdminBundle:Gcmuser')->findOneBy(
                                array(
                                    'user_id' => $user_id,
                                    'device_id' => $device_id,
                                    'is_deleted' => 0
                                )
                        );
                        
                        // echo'<pre>';print_r($update_user);die('test');
                        if (!empty($update_user)) {
                            if($update_user->getSend_notification()=='on'){
                                $send_notification = 'true';
                            } else {
                                $send_notification = 'false';
                            }
                            $response = array(
                                'user_id' => $user_id,
                                'device_name' => $device_name,
                                'device_id' => $device_id,
                                'device_token' => $device_token,
                                'notification_status' => $send_notification
                            );

                            $this->error = "SFD";
                        } else {
                            $this->error = "NRF";
                        }
                    }
                }
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->error = "NRF";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Apnsuser();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND" . $e;
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>