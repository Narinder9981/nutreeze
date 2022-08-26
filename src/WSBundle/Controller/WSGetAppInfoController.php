<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Country ;

class WSGetAppInfoController extends WSBaseController{

	/**
     * @Route("/ws/getAppInfo/{param}",defaults = {"param"=""})
     * @Template()
     */
	 public function getAppInfoAction($param){

		
			$this->title = "App Info" ;
			$this->status = 200;
        	$this->message = true;
            $param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array(),
				),
			) ;
			$response = null;
           
		   if($this->validateData($param)){
			
			$con = $this->getDoctrine()->getManager()->getConnection();
			
			$sql = "SELECT * FROM `general_setting` where general_setting_key = 'app_info' and is_deleted = 0";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$settings = $stmt->fetchAll();
						
            
			if($settings)
			{
                foreach($settings as $key=>$val)
				{
					$appdata = json_decode($val['general_setting_value']);
					if(!empty($appdata)){
						$response = array(
						'email'=>$appdata[0]->data->email,
						'mobile'=>$appdata[0]->data->phone_no,
						'social_links'=>array($appdata[0]->data->facebook_link,$appdata[0]->data->twitter_link,$appdata[0]->data->instagram_link,$appdata[0]->data->snapchat_link),
						);
					}
                }
				
                $this->error = "SFD" ;
            }
			else
			{
                $this->error = "NRF" ;
            }

			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Country();
				$response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;

        }else{
				$this->error = "PIM" ;
			}

	}



}
