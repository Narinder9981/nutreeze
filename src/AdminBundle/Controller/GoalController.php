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

class GoalController extends BaseController
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
     * @Route("/goal")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$sql = "select main_goal_master_id,icon_id,image_id from user_goal_master where is_deleted = '0' group by main_goal_master_id";
		$main_goal = $this->fireQuery($sql);
		$goals = null;
		if(!empty($main_goal)){
			foreach($main_goal as $goal_){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select name,language_id from user_goal_master where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_goal_master_id = '".$goal_['main_goal_master_id']."'";
						$lang_goal = $this->fireQuery($sql);
						if(!empty($lang_goal)){
							$lang_wise[] = array('name'=>$lang_goal[0]['name'],'lang_id'=>$lang->getLanguage_master_id());
						}else{
							$lang_wise[] = array('name'=>'-','lang_id'=>$lang->getLanguage_master_id());
						}
					
					}
				}
				
				$image = $this->getmediaAction($goal_['image_id']);
				
				$goals[] = array(
					'main_goal_master_id'=>$goal_['main_goal_master_id'],
					'icon_id'=>$goal_['icon_id'],
					'image_id'=>$goal_['image_id'],
					'lang_wise'=>$lang_wise,
					'image'=>$image
				);
			}	
		}
//		echo"<pre>";print_r($goals);exit;
		return array('goals'=>$goals,'languages'=>$languages);
    }
	
    /**
     * @Route("/goal/addGoal/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function addGoalAction($main_id)
    {
		
		$languages = $this->getLanguages();
		$sql = "select * from user_goal_master where is_deleted = '0' and main_goal_master_id = '$main_id' ";
		$main_goal = $this->fireQuery($sql);
		
		if(!empty($main_goal)){
			foreach($main_goal as $key=>$value){
				$main_goal[$key]['img_url'] = $this->getmediaAction($value['image_id']);
				$main_goal[$key]['icon_url'] = $this->getmediaAction($value['icon_id']);
			}
		}
		return array('goal'=>$main_goal,'language_list'=>$languages);
    }	
	
    /**
     * @Route("/goal/save")
     * @Template()
     */
    public function saveGoalAction(Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$goal_name = $req->request->get('goal_name');
			$description = $req->request->get('description');
			$main_goal_id = $req->request->get('main_goal_id');
			$language_id = $req->request->get('language_id');
			
			//goal_img   icon_img
			$goal_image_id = ($req->request->get('goal_image_id') != Null && $req->request->get('goal_image_id') != 0  ) ? $req->request->get('goal_image_id')  : 0 ;
			$icon_image_id = ($req->request->get('icon_image_id') != Null && $req->request->get('icon_image_id') != 0  ) ? $req->request->get('icon_image_id')  : 0 ;
			
			if(isset($_FILES['goal_img']) && !empty($_FILES['goal_img']) && isset($_FILES['goal_img']['size']) && $_FILES['goal_img']['size'] > 0){
				$file_name = $_FILES['goal_img']['name'];
				$tmp_name = $_FILES['goal_img']['tmp_name'];	
				$upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/goal/";
				
				$goal_image_id = $this->mediauploadAction($file_name,$tmp_name,"/bundles/uploads/goal/",$upload_dir);	
			
				if(!$goal_image_id){
					$goal_image_id = 0;
				}
				
			}			
			
			if(isset($_FILES['icon_img']) && !empty($_FILES['icon_img']) && isset($_FILES['icon_img']['size']) && $_FILES['icon_img']['size'] > 0){
				$file_name = $_FILES['icon_img']['name'];
				$tmp_name = $_FILES['icon_img']['tmp_name'];	
				$upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/goal/";
				
				$icon_image_id = $this->mediauploadAction($file_name,$tmp_name,"/bundles/uploads/goal/",$upload_dir);	
				if(!$icon_image_id){
					$icon_image_id = 0;
				}
			}						
			
			#check Usergoalmaster
			$goal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usergoalmaster")->findOneBy(array('main_goal_master_id'=>$main_goal_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($goal){
				$goal->setName($goal_name);
				$goal->setDescription($description);
				
				#both language changes
				
				$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usergoalmaster")->findBy(array('main_goal_master_id'=>$main_goal_id,'is_deleted'=>0));	
				
				if($goal_all_lang){
					foreach($goal_all_lang as $lang_goal){
						$lang_goal->setImage_id($goal_image_id);
						$lang_goal->setIcon_id($icon_image_id);
						$em->flush();
					}
				}	
				$this->get('session')->getFlashBag()->set('success_msg','Goal Upadated successfully');
				
			}else{
				$new_goal = new Usergoalmaster();
				$new_goal->setName($goal_name);
				$new_goal->setDescription($description);
				$new_goal->setImage_id($goal_image_id);
				$new_goal->setIcon_id($icon_image_id);
				$new_goal->setLanguage_id($language_id);
				$new_goal->setMain_goal_master_id($main_goal_id);
				$new_goal->setIs_deleted(0);
				
				$em->persist($new_goal);
				$em->flush();
				
				if($main_goal_id == 0){
					$main_goal_id = $new_goal->getUser_goal_master_id();
					$new_goal->setMain_goal_master_id($main_goal_id);
					$em->flush();
				}else{
					
				}
				
				$this->get('session')->getFlashBag()->set('success_msg','Goal inserted successfully');
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
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Usergoalmaster")->findBy(array('main_goal_master_id'=>$main_id,'is_deleted'=>0));	
		
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
