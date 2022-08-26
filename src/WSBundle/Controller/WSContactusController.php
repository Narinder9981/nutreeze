<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Contactusfeedback ;


class WSContactusController extends WSBaseController
{
    /**
     * @Route("/ws/contactus/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function contactusAction($param){
		//try{
			$this->title = "Contact us" ;
			$this->status = 200;
       		$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			//var_dump($param);exit;
			// use to validate required param validation
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('language_id','name','code','email','message','mobile'),
				),
			);
			//var_dump($param);exit;
			if($this->validateData($param))
			{


				$language_id = urldecode($param->language_id);
				$name = urldecode($param->name) ;
				$code = urldecode($param->code) ;
				$email = urldecode($param->email) ;
				$message = urldecode($param->message) ;
				$mobile = urldecode($param->mobile) ;

						$contact = new Contactusfeedback() ;
						$contact->setName($name) ;
						$contact->setSubject($code) ;
						$contact->setEmail_address($email) ;
						$contact->setPhone_number($mobile) ;
						$contact->setMessage($message) ;
						$contact->setCreated_date(date('Y-m-d H:i:s')) ;
						$contact->setDomain_id(1) ;
						$contact->setIs_deleted(0) ;

						$em = $this->getDoctrine()->getManager();
						$em->persist($contact);
						$em->flush();

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				// More headers
				$headers .= 'Contact us - Nutrezee' . "\r\n";
				
				

				@mail('contact@musclefuel-kw.com',"Contact us",$message,$headers);

							$response = array(
										"contact_us_id"=>$contact->getContact_us_feedback_id(),

											) ;
						$this->error = "SFD" ;

			}
				else{
					$this->error = "PIM" ;
				}
			if(empty($response)){
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Addressmaster();
				$response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		/*}catch(\Exception $e){
			$this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}	*/
	}
}

?>
