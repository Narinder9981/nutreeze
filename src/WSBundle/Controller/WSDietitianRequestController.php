<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Dieticiancomment;
use AdminBundle\Entity\Dieticianrequest;
class WSDietitianRequestController extends WSBaseController
{

	/**
     * @Route("/ws/senddietcallrequest/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function senddietcallrequestAction($param){

		//try{
			$this->title = "Send Diet Request" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('order_id','user_id','view_flag'),
				),
			) ;

			if($this->validateData($param)){

				$user_id = $param->user_id ;
				$order_id = $param->order_id ;
				$entity = $em = $this->getDoctrine()->getManager();

				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Dieticiancomment")
								->findOneBy(array("order_id"=>$order_id,"is_deleted"=>0));

				if(!empty($get_tc))
				{
					$this->error = "RAD" ;
					$diet_consult_status = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Dietconsultstatus")->find($get_tc->getStatus());
					$status_name = '';
					if($diet_consult_status){
						$status_name = $diet_consult_status->getDiet_consult_status_name();
					}
					$response = array(
						"status"=>$status_name,//$get_tc->getStatus(),
						"dietician_id"=>$get_tc->getDietician_id(),
						"comment"=>$get_tc->getComment(),
						"status_id"=>$get_tc->getStatus()

					);
				}
				else
				{
					if($view_flag == "false"){
						$status = 'requested';

						$new_comment   = new Dieticiancomment();
			            $new_comment->setDietician_id(0);
			            $new_comment->setOrder_id($order_id);
			            $new_comment->setStatus($status);
			            $new_comment->setComment('');
			            $new_comment->setUser_id($user_id);
			            $new_comment->setIs_deleted(0);

		                $entity->persist($new_comment);
		                $entity->flush();

		                $this->error = "SFD" ;
		                $response = array(
							"status"=>$new_comment->getStatus(),
							"dietician_id"=>$new_comment->getDietician_id(),
							"comment"=>$new_comment->getComment(),
							"status"=>$new_comment->getStatus()

						);
					}
					else{
						 $this->error = "SFD" ;
		                 $response = NULL ; 
						
					}
					
				}
			}else{
				$this->error = "PIM" ;
			}
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Dieticiancomment();
				$response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		/*}catch(\Exception $e){
            $this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}*/
	}

	/**
     * @Route("/ws/dieticianrequest/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function dieticianrequestAction($param){
		// try{
		
			$this->title = "Send Appointment Request";		
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(), 0);
			
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('user_id','gender','height','weight','waist','goal','appointment_date'),
				),
			);
			if($this->validateData($param)){
				$user_id = $param->user_id;
				$gender = $param->gender;
				$height = $param->height;
				$weight = $param->weight;
				$waist = $param->waist;
				$goal = $param->goal;
				$appointment_date = $param->appointment_date;
				$entity = $em = $this->getDoctrine()->getManager();

				$get_tc	= $this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Dieticianrequest")
								->findOneBy(array("user_id"=>$user_id,"is_deleted"=>0,"appointment_date"=>$appointment_date));
				// print_r($get_tc); die;
				if(!empty($get_tc)){					
					$this->error = "RAD";
					
					$response = array(
						"status"=>$get_tc->getStatus(),//$get_tc->getStatus(),
						"comment"=>$get_tc->getGoal(),
						"status_id"=>$get_tc->getStatus()

					);
				}
				else{
					$status = 'requested';
					$dieticianReq = new Dieticianrequest();
					$dieticianReq->setUser_id($user_id);
					$dieticianReq->setGender($gender);
					$dieticianReq->setHeight($height);
					$dieticianReq->setWeight($weight);
					$dieticianReq->setWaist($waist);
					$dieticianReq->setGoal($goal);
					$dieticianReq->setAppointment_date($appointment_date);
					$dieticianReq->setStatus($status);
					$dieticianReq->setCreated_date(date('Y-m-d H:i:s'));
					$dieticianReq->setIs_deleted(0);
					$entity->persist($dieticianReq);
					$entity->flush();

					$this->error = "SFD" ;
					$response = array(
						"dietician_request_id"=>$dieticianReq->getDietician_request_id(),
						"status"=>$dieticianReq->getStatus()
					);					
				}
			}else{
				$this->error = "PIM";
				// $response = array(
				// 	"status"=>$new_comment->getStatus(),
				// 	"comment"=>$new_comment->getComment(),
				// 	"status"=>$new_comment->getStatus()
				// );	
			}
			if(empty($response)){
				// $response = false;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Dieticiancomment();
				$response = $emptyObj;
			}
			$this->data = $response;
			return $this->responseAction();
		// }catch(\Exception $e){
		// 	print_r($e); die
        //     $this->error = "SFND" ;
		// 	$this->data = false ;
		// 	return $this->responseAction() ;
		// }
	}


}
?>
