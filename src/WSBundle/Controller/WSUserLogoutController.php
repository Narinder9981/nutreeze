<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use AdminBundle\Entity\Apnsuser;
use AdminBundle\Entity\Gcmuser;

class WSUserLogoutController extends WSBaseController{
    /**
     * @Route("/ws/user-logout/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function userlogoutAction($param){
		try{
			$this->title = "App user logout";
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(), 0);
			$this->validateRule = array(
							array(
								'rule' => 'NOTNULL',
								'field' => array('user_id', 'device_id', 'device_name','device_token'),
							),
						);

			if ($this->validateData($param)) {
				$response=false;
				$user_id = $param->user_id;
				$device_name = strtoupper($param->device_name);
				$device_id = $param->device_id;
                $device_token = $param->device_token;
				
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
								$_user->setIs_deleted(1);
								$entity->flush();
							}
							$this->error = "SFD";
						} else {
							$this->error = "NRF";
						}
						
						$response = true;
					}
				}
				if ($device_name == 'ANDROID' || $device_name == 'android') {
					
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
								$_user->setIs_deleted(1);
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
				$this->error = "NRF";
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Apnsuser();
				$response = $emptyObj;
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