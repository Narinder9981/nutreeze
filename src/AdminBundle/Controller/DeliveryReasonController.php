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

use AdminBundle\Entity\Reasonsmaster;

class DeliveryReasonController extends BaseController
{
	public function __construct()
    {
		parent::__construct();
        $obj = new BaseController();
		$obj->chksessionAction();
    }
    /**
     * @Route("/deliveryreason")
     * @Template()
     */
    public function indexAction()
    {

		$languages = $this->getLanguages();
		$sql = "select * from reasons_master where is_deleted = '0' group by main_reason_id";
		$main_reason = $this->fireQuery($sql);
		$reason = null;
		
		if(!empty($main_reason)){
			foreach($main_reason as $res){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select * from reasons_master where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_reason_id = '".$res['main_reason_id']."'";
						$lang_goal = $this->fireQuery($sql);
						if(!empty($lang_goal)){
							$lang_wise[] = array('reason'=>$lang_goal[0]['reason'],'lang_id'=>$lang->getLanguage_master_id());
						}else{
							$lang_wise[] = array('reason'=>'-','lang_id'=>$lang->getLanguage_master_id());
						}
					
					}
				}
				
				$reason[] = array(
					'main_reason_id'=>$res['main_reason_id'],
					'lang_wise'=>$lang_wise,
				);
			}	
		}
//		echo"<pre>";print_r($packages);exit;
		return array('reason'=>$reason,'languages'=>$languages);
    }
	
    /**
     * @Route("/deliveryreason/addReason/{main_reason_id}",defaults={"main_reason_id"="0"})
     * @Template()
     */
    public function addReasonAction($main_reason_id)
    {
		
		$languages = $this->getLanguages();
	
		$sql = "select * from reasons_master r_m 				
				where r_m.is_deleted = '0' and r_m.main_reason_id = '$main_reason_id' ";
		$main_reason = $this->fireQuery($sql);
		
//		echo"<pre>";print_r($product_for);exit;
		return array('main_reason'=>$main_reason,'language_list'=>$languages);
    }	
	
    /**
     * @Route("/deliveryreason/save")
     * @Template()
     */
    public function saveReasonAction(Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$reason_name = $req->request->get('reason_name');
			$main_reason_id = $req->request->get('main_reason_id');
			$language_id = $req->request->get('language_id');
			
			#check Usergoalmaster
			$reason = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Reasonsmaster")->findOneBy(array('main_reason_id'=>$main_reason_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($reason){
				$reason->setReason($reason_name);
				$em->flush();
			
				$this->get('session')->getFlashBag()->set('success_msg','Reason Upadated successfully');
				
			}else{

				$reasonmaster = new Reasonsmaster();
				$reasonmaster->setReason($reason_name);				
				$reasonmaster->setCreated_by(0);
				$reasonmaster->setLanguage_id($language_id);
				$reasonmaster->setMain_reason_id($main_reason_id);
				$reasonmaster->setIs_deleted(0);
				
				$em->persist($reasonmaster);
				$em->flush();
				
				if($main_reason_id == 0){
					$main_reason_id = $reasonmaster->getNot_delivered_reasons_master_id();
					$reasonmaster->setMain_reason_id($main_reason_id);
					$em->flush();
				}
				
				$this->get('session')->getFlashBag()->set('success_msg','Reason inserted successfully');
			}
			

			return $this->redirectToRoute('admin_deliveryreason_index');
				
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');
			return $this->redirectToRoute('admin_default_index');
		}
    }	

    /**
     * @Route("/deliveryreason/deletereason/{main_reason_id}",defaults={"main_reason_id"="0"})
     * @Template()
     */
    public function deletereasonAction($main_reason_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$reasons = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Reasonsmaster")->findBy(array('main_reason_id'=>$main_reason_id,'is_deleted'=>0));	
		
		if($reasons){
				
			foreach($reasons as $res){
				$res->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Reasons deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }

	
}
