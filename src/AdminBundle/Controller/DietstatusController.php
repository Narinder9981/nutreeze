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
use AdminBundle\Entity\Dietconsultstatus;

class DietstatusController extends BaseController
{
	public function __construct()
    {
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
     * @Route("/dietstatuslist")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$sql = "select main_diet_consult_status_id from diet_consult_status where is_deleted = '0' group by main_diet_consult_status_id";
		$main_goal = $this->fireQuery($sql);
		$goals = null;
		if(!empty($main_goal)){
			foreach($main_goal as $goal_){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select diet_consult_status_name,language_id from diet_consult_status where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_diet_consult_status_id = '".$goal_['main_diet_consult_status_id']."'";
						$lang_goal = $this->fireQuery($sql);
						if(!empty($lang_goal)){
							$lang_wise[] = array('diet_consult_status_name'=>$lang_goal[0]['diet_consult_status_name'],'lang_id'=>$lang->getLanguage_master_id());
						}else{
							$lang_wise[] = array('diet_consult_status_name'=>'-','lang_id'=>$lang->getLanguage_master_id());
						}
					
					}
				}
				
			//	$image = $this->getmediaAction($goal_['image_id']);
				
				$goals[] = array(
					'main_diet_consult_status_id'=>$goal_['main_diet_consult_status_id'],					
					'lang_wise'=>$lang_wise
				);
			}	
		}
//		echo"<pre>";print_r($goals);exit;
		return array('goals'=>$goals,'languages'=>$languages);
    }
	
    /**
     * @Route("/adddietstatus/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function adddietstatusAction($main_id)
    {
		
		$languages = $this->getLanguages();
		$sql = "select * from diet_consult_status where is_deleted = '0' and main_diet_consult_status_id = '$main_id' ";
		$main_goal = $this->fireQuery($sql);
		
		
		return array('goal'=>$main_goal,'language_list'=>$languages);
    }	
	
    /**
     * @Route("/savesietstatus")
     * @Template()
     */
    public function savesietstatusAction(Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$diet_consult_status_name = $req->request->get('goal_name');
			$main_diet_consult_status_id = $req->request->get('main_diet_consult_status_id');
			$language_id = $req->request->get('language_id');
			
		
			#check Usergoalmaster
			$goal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Dietconsultstatus")->findOneBy(array('main_diet_consult_status_id'=>$main_diet_consult_status_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($goal){
				$goal->setDiet_consult_status_name($diet_consult_status_name);
				#both language changes
				
				$em->flush();
				$this->get('session')->getFlashBag()->set('success_msg','Diet Status Upadated successfully');
				
			}else{
				$new_goal = new Dietconsultstatus();
			
				$new_goal->setLanguage_id($language_id);
				$new_goal->setMain_diet_consult_status_id($main_diet_consult_status_id);
				$new_goal->setDiet_consult_status_name($diet_consult_status_name);
				$new_goal->setIs_deleted(0);
				
				$em->persist($new_goal);
				$em->flush();
				
				if($main_diet_consult_status_id == 0){

					$main_diet_consult_status_id = $new_goal->getDiet_consult_status_id();
					$new_goal->setMain_diet_consult_status_id($main_diet_consult_status_id);
					$em->flush();
				}else{
					
				}
				
				$this->get('session')->getFlashBag()->set('success_msg','Diet Status inserted successfully');
			}
			
			$referer = $req->headers->get('referer');
			return $this->redirect($referer);
				
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');
			return $this->redirectToRoute('admin_default_index');
		}
    }	

    /**
     * @Route("/goal/deleteGoal/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function deleteGoalAction($main_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Dietconsultstatus")->findBy(array('main_diet_consult_status_id'=>$main_id,'is_deleted'=>0));	
		
		if($goal_all_lang){
			foreach($goal_all_lang as $lang_goal){
				$lang_goal->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Goal deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }	
}
