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
use AdminBundle\Entity\Timeslotmaster;

class TimeSlotsController extends BaseController
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
     * @Route("/timeSlots")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$sql = "select main_time_slot_master_id,start_time,end_time from time_slot_master where is_deleted = '0' group by main_time_slot_master_id";
		$main_goal = $this->fireQuery($sql);
		$goals = null;
		if(!empty($main_goal)){
			foreach($main_goal as $goal_){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select title,language_id from time_slot_master where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_time_slot_master_id = '".$goal_['main_time_slot_master_id']."'";
						$lang_goal = $this->fireQuery($sql);
						if(!empty($lang_goal)){
							$lang_wise[] = array('name'=>$lang_goal[0]['title'],'lang_id'=>$lang->getLanguage_master_id());
						}else{
							$lang_wise[] = array('name'=>'-','lang_id'=>$lang->getLanguage_master_id());
						}
					
					}
				}
				
				$goals[] = array(
					'main_time_slot_master_id'=>$goal_['main_time_slot_master_id'],
					'start_time'=>$goal_['start_time'],
					'end_time'=>$goal_['end_time'],
					'lang_wise'=>$lang_wise,
				);
			}	
		}
//		echo"<pre>";print_r($goals);exit;
		return array('time_slots'=>$goals,'languages'=>$languages);
    }
	
    /**
     * @Route("/timeSlots/addtimeSlot/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function addtimeslotAction($main_id)
    {		
			$languages = $this->getLanguages();
			$sql = "select * from time_slot_master where is_deleted = '0' and main_time_slot_master_id = '$main_id' ";
			$main_goal = $this->fireQuery($sql);
			
			return array('time_slot'=>$main_goal,'language_list'=>$languages);
    }	
	
    /**
     * @Route("/timeSlots/save")
     * @Template()
     */
    public function savetimeSlotsAction(Request $req)
    {
		
//		echo"<pre>";print_r($_REQUEST);exit;

		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$title = $req->request->get('title');
			$note = $req->request->get('note');
			$start_time = date('H:i:s',strtotime($req->request->get('start_time')));
			$end_time = date('H:i:s',strtotime($req->request->get('end_time')));
			$main_time_slot_master_id = $req->request->get('main_time_slot_master_id');
			$language_id = $req->request->get('language_id');
						
			#check Usergoalmaster 
			$timeSlot = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Timeslotmaster")->findOneBy(array('main_time_slot_master_id'=>$main_time_slot_master_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($timeSlot){
				$timeSlot->setTitle($title);
				$timeSlot->setNote($note);
				
				#both language changes
				
				$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Timeslotmaster")->findBy(array('main_time_slot_master_id'=>$main_time_slot_master_id,'is_deleted'=>0));	
				
				if($goal_all_lang){
					foreach($goal_all_lang as $lang_goal){
						$lang_goal->setStart_time($start_time);
						$lang_goal->setEnd_time($end_time);
						$em->flush();
					}
				}	
				$this->get('session')->getFlashBag()->set('success_msg','Time Slot Upadated successfully');
				
			}else{
				$new_slot = new Timeslotmaster();
				$new_slot->setTitle($title);
				$new_slot->setNote($note);
				$new_slot->setStart_time($start_time);
				$new_slot->setEnd_time($end_time);
				$new_slot->setLanguage_id($language_id);
				$new_slot->setCreated_datetime(date('Y-m-d H:i:s'));
				$new_slot->setMain_time_slot_master_id($main_time_slot_master_id);
				$new_slot->setIs_deleted(0);
				
				$em->persist($new_slot);
				$em->flush();
				
				if($main_time_slot_master_id == 0){
					$main_time_slot_master_id = $new_slot->getTime_slot_master_id();
					$new_slot->setMain_time_slot_master_id($main_time_slot_master_id);
					$em->flush();
				}
				
				$this->get('session')->getFlashBag()->set('success_msg','Time Slot inserted successfully');
			}
			
//			$referer = $req->headers->get('referer');
			return $this->redirectToRoute('admin_timeslots_index');
				
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');
			return $this->redirectToRoute('admin_default_index');
		}
    }	

    /**
     * @Route("/timeSlots/deleteTimeSlot/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function deleteAction($main_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Timeslotmaster")->findBy(array('main_time_slot_master_id'=>$main_id,'is_deleted'=>0));	
		
		if($goal_all_lang){
			foreach($goal_all_lang as $lang_goal){
				$lang_goal->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Time Slot deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }	
}
