<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Commongallerymaster;
class WSGallerylistController extends WSBaseController
{

	/**
     * @Route("/ws/gallerylist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function gallerylistAction($param){

		try{
			$this->title = "Gallery List" ;
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
								->getRepository("AdminBundle:Commongallerymaster")
								->findBy(array("is_deleted"=>0));

				if(!empty($get_tc))
				{
					foreach($get_tc as $key=>$val){
						$videostatus = $this->getMediaDetailAction($val->getMedia_id());
						if(!empty($val->getMedia_id()) && $videostatus != null){
							$response[] = array(
									'gallery_id'=>$val->getCommon_gallery_master_id(),
									'gallery_type'=>$val->getMedia_type(),
									'gallery'=>$this->getMediaDetailAction($val->getMedia_id()),
								);
						}
						

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
				$emptyObj = new Commongallerymaster();
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
