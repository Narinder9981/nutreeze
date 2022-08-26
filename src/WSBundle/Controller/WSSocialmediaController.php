<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Socialmedia;

class WSSocialmediaController extends WSBaseController
{

	 /**
   * @Route("/ws/socialmedia",defaults = {"param"=""},requirements={"param"=".+"})
   * @Template()
   */
  public function socialmediaAction($param) {
      try {

          $this->title = "Social Media List";
          $this->status = 200;
          $this->message = true;
          //$param = $this->requestAction($this->getRequest()) ;
          $response = [];
          $param = $this->requestAction($this->getRequest(),0);
                  $get_tc	=	$this->getDoctrine()->getManager()
          								->getRepository("AdminBundle:Socialmedia")
          								->findBy(array("is_deleted"=>0));
          				if(!empty($get_tc))
          				{
                    
          foreach($get_tc as $key=>$val){
            $response[] = array(
                  'link'=>$val->getLink(),
                  'alt'=>$val->getTitle(),
                  'image_url'=> $this->getMediaDetailAction($val->getImg())
                );

          }           
          $this->error = "SFD" ;
          				}
                  else {
                    
                      $this->error = "NRF";
                  }
               

          if (empty($response)) {
            //   $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Socialmedia();
            $response = $emptyObj;
          }
          $this->data = $response;
          return $this->responseAction();
      } catch (\Exception $e) {
          $this->error = "SFND$e";
          $this->data = false;
          return $this->responseAction();
      }
  }


}
?>
