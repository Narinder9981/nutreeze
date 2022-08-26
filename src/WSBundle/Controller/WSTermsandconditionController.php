<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Termsconditionsmaster;
class WSTermsandconditionController extends WSBaseController
{

	/**
     * @Route("/ws/termsandcondition/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function termsandconditionAction($param){

		try{
			$this->title = "Terms And Condition" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('lang_id'),
				),
			) ;

			if($this->validateData($param)){

				$lang_id = $param->lang_id ;
				$em = $this->getDoctrine()->getManager();

				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Termsconditionsmaster")
								->findOneBy(array("language_id"=>$lang_id,"is_deleted"=>0));

				if(!empty($get_tc))
				{

						$response = array(
								"content"=>$get_tc->getDescription(),
								"image"=>$this->getMediaDetailAction($get_tc->getImage_id()),
						);

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
		}catch(\Exception $e){
            $this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}


}
?>
