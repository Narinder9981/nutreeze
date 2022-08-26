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

use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Deliverymethodmaster;

class DeliveryMethodsController extends BaseController
{
	public function __construct()
    {
		parent::__construct();
        $obj = new BaseController();
		$obj->chksessionAction();
    }
    /**
     * @Route("/deliveryMethod")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$sql = "select * from delivery_method_master where is_deleted = '0' group by main_delivery_method_master_id";
		$main_goal = $this->fireQuery($sql);
		$goals = null;
		if(!empty($main_goal)){
			foreach($main_goal as $goal_){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select * from delivery_method_master where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_delivery_method_master_id = '".$goal_['main_delivery_method_master_id']."'";
						$lang_goal = $this->fireQuery($sql);
						if(!empty($lang_goal)){
							$lang_wise[] = array('name'=>$lang_goal[0]['name'],'lang_id'=>$lang->getLanguage_master_id());
						}else{
							$lang_wise[] = array('name'=>'-','lang_id'=>$lang->getLanguage_master_id());
						}
					
					}
				}
				
				$goals[] = array(
					'main_delivery_method_master_id'=>$goal_['main_delivery_method_master_id'],
					'lang_wise'=>$lang_wise,
				);
			}	
		}

		return array('delivery_methods'=>$goals,'languages'=>$languages);
    }
	
    /**
     * @Route("/deliveryMethod/addDeliveryMethod/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function addAction($main_id)
    {		
			$languages = $this->getLanguages();
			$sql = "select * from delivery_method_master where is_deleted = '0' and main_delivery_method_master_id = '$main_id' ";
			$main_goal = $this->fireQuery($sql);
			
			return array('delivery_method'=>$main_goal,'language_list'=>$languages);
    }	
	
    /**
     * @Route("/deliveryMethod/save")
     * @Template()
     */
    public function saveAction(Request $req)
    {

		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$name = $req->request->get('name');
			$note = $req->request->get('note');
			$main_delivery_method_master_id = $req->request->get('main_delivery_method_master_id');
			$language_id = $req->request->get('language_id');
						
			#check Usergoalmaster 
			$deliveryMethod = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Deliverymethodmaster")->findOneBy(array('main_delivery_method_master_id'=>$main_delivery_method_master_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($deliveryMethod){
				$deliveryMethod->setName($name);
				$deliveryMethod->setNote($note);
				$em->flush();
				$this->get('session')->getFlashBag()->set('success_msg','Delivery Method Upadated successfully');
				
			}else{
				$new_method = new Deliverymethodmaster();
				$new_method->setName($name);
				$new_method->setNote($note);
				$new_method->setLanguage_id($language_id);

				$new_method->setMain_delivery_method_master_id($main_delivery_method_master_id);
				$new_method->setIs_deleted(0);
				
				$em->persist($new_method);
				$em->flush();
				
				if($main_delivery_method_master_id == 0){
					$main_delivery_method_master_id = $new_method->getDelivery_method_master_id();
					$new_method->setMain_delivery_method_master_id($main_delivery_method_master_id);
					$em->flush();
				}
				
				$this->get('session')->getFlashBag()->set('success_msg','Delivery inserted successfully');
			}
			
			//$referer = $req->headers->get('referer');
			return $this->redirectToRoute('admin_deliverymethods_index');
				
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');
			return $this->redirectToRoute('admin_default_index');
		}
    }	

    /**
     * @Route("/deliveryMethod/deleteDeliveryMethod/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function deleteAction($main_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Deliverymethodmaster")->findBy(array('main_delivery_method_master_id'=>$main_id,'is_deleted'=>0));	
		
		if($goal_all_lang){
			foreach($goal_all_lang as $lang_goal){
				$lang_goal->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Delivery Method deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }	
}
