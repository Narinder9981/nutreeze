<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Usergoalmaster;
class WSDeliveryMethodsController extends WSBaseController
{

	/**
     * @Route("/ws/DeliveryMethod/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function deliveryMethodlistAction($param){

		//try{
			$this->title = "Delivery Method List" ;
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
								->getRepository("AdminBundle:Deliverymethodmaster")
								->findBy(array("language_id"=>$lang_id,"is_deleted"=>0));

				if(!empty($get_tc))
				{
					foreach($get_tc as $key=>$val){
						$response[] = array(
									'methodid'=>$val->getMain_delivery_method_master_id(),
									'methodname'=>$val->getName(),
									'note'=>$val->getNote(),
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
				$emptyObj = new Usergoalmaster();
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
