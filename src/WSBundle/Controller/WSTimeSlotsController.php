<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Usergoalmaster;
class WSTimeSlotsController extends WSBaseController
{

	/**
     * @Route("/ws/DeliveryTime/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function timeSlotlistAction($param){

		//try{
			$this->title = "Delivery Time Slot List" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('language_id'),
				),
			) ;

			if($this->validateData($param)){

				$lang_id = $param->language_id ;
				$em = $this->getDoctrine()->getManager();

				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Timeslotmaster")
								->findBy(array("language_id"=>$lang_id,"is_deleted"=>0));

				if(!empty($get_tc))
				{
					foreach($get_tc as $key=>$val){
						$response[] = array(
									'timeid'=>$val->getMain_time_slot_master_id(),
									'timename'=>$val->getTitle(),
									'note'=>$val->getNote(),
									'start_time'=>strtotime($val->getStart_time()),
									'end_time'=>strtotime($val->getEnd_time()),
									'start_time_read'=>date('h:i a',strtotime($val->getStart_time())),
									'end_time_read'=>date('h:i a',strtotime($val->getEnd_time())),
								);

					}						
					$this->error = "SFD" ;
				}
				else
				{
					$this->error = "NRF" ;
				}
			}else{
				$this->error = "PIM" ;
			}
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Termsconditionsmaster();
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


}
?>
