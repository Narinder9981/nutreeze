<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Returnpolicymaster;


class WSSchedulelistController extends WSBaseController
{

	/**
     * @Route("/ws/schedulelist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function schedulelistAction($param){
		try{
			$this->title = "Schedule List" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('lang_id','user_id'),
				),
			) ;

			if($this->validateData($param)){
				$language_id = $param->lang_id;
				$user_id = $param->user_id;
				$em = $this->getDoctrine()->getManager();
				$date=date('Y-m-d');
				$package_query = "SELECT * FROM `order_master` WHERE created_by='$user_id' AND end_date >= '$date' AND is_deleted=0 AND order_status='success'";
				$stmt2 = $this->getDoctrine()->getManager()->getConnection()->prepare($package_query);
				$stmt2->execute();
				$purchase_package = $stmt2->fetchAll();
				$response=array();
				if(!empty($purchase_package)){
					foreach($purchase_package as $kys=>$vls){
						$query = "SELECT * FROM schedule_master sm JOIN schedule_user_relation sur ON sm.main_schedule_id=sur.main_schedule_id WHERE sm.language_id='$language_id' AND sm.main_package_id='".$vls['package_id']."' AND sm.is_deleted=0 AND sur.is_deleted=0 AND sur.user_id='$user_id'";
						$stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($query);
						$stmt->execute();
						$schedule = $stmt->fetchAll();
						if(!empty($schedule))
						{
							foreach($schedule as $key=>$val){
								$response[] = array('schedule_id'=>$val['main_schedule_id'],'schedule'=>$this->getMediaDetailAction($val['media_id']));
							}
						}
					}
				}
				else
				{
					$this->error = "NRF" ;
				}
			}else{
				$this->error = "PIM" ;
			}
			if(!empty($response)){
				$this->error = "SFD" ;
			}else{
				$this->error = "NRF" ;
			}
				
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Returnpolicymaster();
				$response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		}catch(\Exception $e){
            $this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}


}
?>
