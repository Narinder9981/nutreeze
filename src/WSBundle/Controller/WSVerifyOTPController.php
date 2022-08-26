<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Aboutus ;

class WSVerifyOTPController extends WSBaseController
{

	/**
   * @Route("/ws/verifyOTP/{param}",defaults = {"param"=""},requirements={"param"=".+"})
   * @Template()
   */
  public function verifyOTPAction($param) {
      try {

          $this->title = "Verify OTP";
          $this->status = 200;
          $this->message = true;
          //$param = $this->requestAction($this->getRequest()) ;
          $param = $this->requestAction($this->getRequest(),0) ;
          $this->validateRule = array(
              array(
                  'rule' => 'NOTNULL',
                  'field' => array('user_id','verification_code'),
              ),
                  );
          if($this->validateData($param))
          {

                $user_id = $param->user_id;
				//$mobile = $param->mobile;
				$verification_code = $param->verification_code;
				
                $get_tc	=	$this->getDoctrine()->getManager()
          								->getRepository("AdminBundle:Usermaster")
          								->findOneBy(array("user_master_id"=>$user_id,"verification_code"=>$verification_code,"is_deleted"=>0));
          		if(!empty($get_tc))
          		{     
					$get_tc->setIs_verified(1);
					$em = $this->getDoctrine()->getManager();
					$em->persist($get_tc);
					$em->flush();
          			$this->error = "SFD" ;
          		}else{
					$this->error = "VCW" ;  // verification code is wrong
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
