<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Aboutus ;

class WSResendOTPController extends WSBaseController
{

	/**
   * @Route("/ws/resendOTP/{param}",defaults = {"param"=""},requirements={"param"=".+"})
   * @Template()
   */
  public function verifyOTPAction($param) {
      try {

          $this->title = "Resend OTP";
          $this->status = 200;
          $this->message = true;
          //$param = $this->requestAction($this->getRequest()) ;
          $param = $this->requestAction($this->getRequest(),0) ;
          $this->validateRule = array(
              array(
                  'rule' => 'NOTNULL',
                  'field' => array('user_id'),
              ),
                  );
          if($this->validateData($param))
          {

                $user_id = $param->user_id;
				
                $get_tc	=	$this->getDoctrine()->getManager()
          								->getRepository("AdminBundle:Usermaster")
          								->findOneBy(array("user_master_id"=>$user_id,"is_deleted"=>0));
          		if(!empty($get_tc))
          		{     
					$verification_code = rand(100000,999999);
					$get_tc->setVerification_code($verification_code);
					$em = $this->getDoctrine()->getManager();
					$em->persist($get_tc);
					$em->flush();
					$response[] =array(
							"user_id"=>$user_id,
							"verification_code"=>$verification_code
						);
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
