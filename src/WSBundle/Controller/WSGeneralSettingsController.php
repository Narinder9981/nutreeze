<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Aboutus ;

class WSAboutusController extends WSBaseController
{

	/**
   * @Route("/ws/aboutus/{param}",defaults = {"param"=""},requirements={"param"=".+"})
   * @Template()
   */
  public function aboutusAction($param) {
      try {

          $this->title = "About us";
          $this->status = 200;
            $this->message = true;
          //$param = $this->requestAction($this->getRequest()) ;
          $param = $this->requestAction($this->getRequest(),0) ;
          $this->validateRule = array(
              array(
                  'rule' => 'NOTNULL',
                  'field' => array('lang_id'),
              ),
                  );
          if($this->validateData($param))
          {

                  $language_id = $param->lang_id;

                  $get_tc	=	$this->getDoctrine()->getManager()
          								->getRepository("AdminBundle:Aboutus")
          								->findOneBy(array("language_id"=>$language_id,"is_deleted"=>0));
          				if(!empty($get_tc))
          				{
          						$response = array(
          							"content"=>$get_tc->getDescription(),
									"image"=>$this->getMediaDetailAction($get_tc->getImage_id()),
                          
          						);
          					$this->error = "SFD" ;
          				}
                  else {
                      $this->error = "NRF";
                  }
              } else {
                  $this->error = "PIM";
              }

          if (empty($response)) {
            //   $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Aboutus();
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
