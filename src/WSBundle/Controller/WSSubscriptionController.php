<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Subscriptionrequest;

class WSSubscriptionController extends WSBaseController
{

	 /**
   * @Route("/ws/subscribe",defaults = {"param"=""},requirements={"param"=".+"})
   * @Template()
   */
  public function subscribeAction($param) {
      try {

          $this->title = "Newsletter";
          $this->status = 200;
          $this->message = true;
          //$param = $this->requestAction($this->getRequest()) ;
          $param = $this->requestAction($this->getRequest(),0) ;
          $this->validateRule = array(
              array(
                  'rule' => 'NOTNULL',
                  'field' => array('email'),
              ),
                  );
          if($this->validateData($param))
          {

                  $email = $param->email;

                  $get_tc	=	$this->getDoctrine()->getManager()
          								->getRepository("AdminBundle:Subscriptionrequest")
          								->findOneBy(array("email"=>$email,"is_deleted"=>0));
          				if(empty($get_tc))
          				{
                    $subscriptionrequest = new Subscriptionrequest();
          						$subscriptionrequest->setEmail($email);
                      $subscriptionrequest->setStatus('1');
                      $subscriptionrequest->setCreated_at(date('Y-m-d'));
                      $subscriptionrequest->setIs_deleted('0');
                       $em = $this->getDoctrine()->getManager();
                $em->persist($subscriptionrequest);
                $em->flush();
          					$this->error = "SFD" ;
                    $this->error_msg="Subscribed successfully";
          				}
                  else {
                    $this->error_msg="Already Subscribed";
                      $this->error = "ARE";
                  }
              } else {
                  $this->error = "PIM";
              }

          if (empty($response)) {
            //   $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Subscriptionrequest();
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
