<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Apnsuser;
use AdminBundle\Entity\Gcmuser;

class WSNotificationStatusController extends WSBaseController{
    /**
     * @Route("/ws/notification_status/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function notification_statusAction(){
		try{
			$this->title = "App user Notification";
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(), 0);
			$this->validateRule = array(
				array(
					'rule' => 'NOTNULL',
					'field' => array('user_id', 'device_id', 'device_name', 'device_token','notification_status'),
				),
					);

			if ($this->validateData($param)) {
				$user_id = $param->user_id;
				$device_name = strtoupper($param->device_name);
				$device_id = $param->device_id;
				$device_token = $param->device_token;
				$notification_status = $param->notification_status;

				$em = $this->getDoctrine()->getManager();
				if ($device_name == 'IPHONE' || $device_name == 'iphone' || $device_name == 'ios' || $device_name == 'IOS') {
					if (isset($device_id)) {
						
						$entity = $this->getDoctrine()->getManager();
						$update_user = $entity->getRepository('AdminBundle:Apnsuser')->findBy(
							array(
								'user_id' => $user_id,
								'device_id' => $device_id,
								'is_deleted' => 0
							)
						);
						
						if(!empty($update_user)){
							foreach($update_user as $_user){
								$_user->setSend_notification($notification_status);
								$entity->flush();
							}
							$this->error = "SFD";
						} else {
							$this->error = "NRF";
						}
						
						$response = true;
					}
				} else if($device_name == 'ANDROID' || $device_name == 'android' || $device_name == 'Android'){
					if (isset($device_id)) {
						
						$entity = $this->getDoctrine()->getManager();
						$update_user = $entity->getRepository('AdminBundle:Gcmuser')->findBy(
							array(
								'user_id' => $user_id,
								'device_id' => $device_id,
								'is_deleted' => 0
							)
						);
						
						if(!empty($update_user)){
							foreach($update_user as $_user){
								$_user->setSend_notification($notification_status);
								$entity->flush();
							}
							$this->error = "SFD";
						} else {
							$this->error = "NRF";
						}
						
						$response = true;
					}

				}
				
			} else {
				$this->error = "PIM";
			}
			if (empty($response)) {
				// $response = false;
				$this->status = 201;
                $this->message = false;
                $emptyObj = new Apnsuser();
                $response = $emptyObj;
				$this->error = "SFND";
			}
			$this->data = $response;
			return $this->responseAction();
		}
		catch(\Exception $e){
			$this->error = "SFND".$e ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}
}
?>