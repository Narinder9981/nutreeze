<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;

use AdminBundle\Entity\Areamaster;

class SubscriberController extends BaseController
{
	
	public function __construct() {
        parent::__construct();
        $obj = new BaseController();
		$obj->chksessionAction();
		
		$session = new Session();
        if(in_array($session->get('role_id'), [1])){
            // allow - Superadmin
        } else {

            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }
	
    /**
     * @Route("/subscribers")
     * @Template()
     */
    public function indexAction(){
		
		$domain_id = $this->get('session')->get('domain_id');
				
//		echo"<pre>";print_r($city_list_details);exit;
		$sql = "select * from subscription_request where is_deleted = 0";
		$subscribers = $this->firequery($sql);
		
		return array(
			'subscribers' => $subscribers,
			'language_list' => $this->getLanguages()
		);
    }
     /**
     * @Route("/delete/{subscription_id}",defaults={"subscription_id" = "0"})
     * @Template()
     */
    public function deleteAction($subscription_id){
		
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		$subscription_check = $this->getDoctrine()->getManager()
		->getRepository("AdminBundle:Subscriptionrequest")
		->findBy(array(
			'subscription_id'=>$subscription_id,
			'is_deleted'=>0));
																									
		if($subscription_check){
			foreach($subscription_check as $sub_check){
				$sub_check->setIs_deleted(1);				
				$entity->flush();			
			}
			
			$this->get('session')->getFlashBag()->set('success_msg','Subscription deleted Succesfully');	
		}
		
		
		// manual commit
		$entity->getConnection()->commit();
		$entity->clear();		
		
		return $this->redirectToRoute('admin_subscriber_index');

			
    }
    /**
     * @Route("/changeStatus")
     * @Template()
     */
    public function changestatusAction(Request $req)
    {
		$domain_id = $this->get('session')->get('domain_id');
	
		$id = $req->request->get('subscription_id');
		$status = $req->request->get('status');
		
		$em = $this->getDoctrine()->getManager();
		
		
		$subscriptions = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subscriptionrequest')->findBy(array(
			'is_deleted'=>0,
			'subscription_id'=>$id
		));
		if($subscriptions){
			foreach($subscriptions as $subscription){
				if($status == 'true'){
					
					$subscription->setStatus('1');
				}else{
					$subscription->setStatus('0');					
				}
				$em->flush();
			}
		}
		
		return new Response('done');
	
    }
	
   	
}
