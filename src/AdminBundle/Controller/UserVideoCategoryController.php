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
use AdminBundle\Entity\Uservideocategorymaster;

class UserVideoCategoryController extends BaseController
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
     * @Route("/userVideoCategory")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$sql = "select main_user_video_category_master_id,image_id,status from user_video_category_master where is_deleted = '0' group by main_user_video_category_master_id";
		$main_goal = $this->fireQuery($sql);
		$goals = null;
		if(!empty($main_goal)){
			foreach($main_goal as $goal_){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select name,language_id from user_video_category_master where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_user_video_category_master_id = '".$goal_['main_user_video_category_master_id']."'";
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
					'main_user_video_category_master_id'=>$goal_['main_user_video_category_master_id'],
					'lang_wise'=>$lang_wise,
					'image'=>$image
				);
			}	
		}
//		echo"<pre>";print_r($goals);exit;
		return array('video_category'=>$goals,'languages'=>$languages);
    }
	
    /**
     * @Route("/userVideoCategory/add/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function addAction($main_id)
    {
		
		$languages = $this->getLanguages();
		$sql = "select * from user_video_category_master where is_deleted = '0' and main_user_video_category_master_id = '$main_id' ";
		$main_goal = $this->fireQuery($sql);
		
		if(!empty($main_goal)){
			foreach($main_goal as $key=>$value){
				$main_goal[$key]['img_url'] = $this->getmediaAction($value['image_id']);
			}
		}
		return array('video_category'=>$main_goal,'language_list'=>$languages);
    }
	
    /**
     * @Route("/userVideoCategory/save")
     * @Template()
     */
    public function saveAction(Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$name = $req->request->get('name');
			$description = $req->request->get('description');
			$main_user_video_category_master_id = $req->request->get('main_user_video_category_master_id');
			$language_id = $req->request->get('language_id');

			$category_image = 0;
			if(isset($_FILES['goal_img']) && !empty($_FILES['goal_img']) && isset($_FILES['goal_img']['size']) && $_FILES['goal_img']['size'] > 0){
				$file_name = $_FILES['goal_img']['name'];
				$tmp_name = $_FILES['goal_img']['tmp_name'];	
				$upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/VideoCategory/";
				
				$category_image = $this->mediauploadAction($file_name,$tmp_name,"/bundles/uploads/VideoCategory/",$upload_dir);	
			
				if(!$category_image){
					$category_image = 0;
				}
				
			}			
			
			$video_category = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideocategorymaster")->findOneBy(array('main_user_video_category_master_id'=>$main_user_video_category_master_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($video_category){
				$video_category->setName($name);
				$video_category->setDescription($description);
				
				#both language changes
				
				$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideocategorymaster")->findBy(array('main_user_video_category_master_id'=>$main_user_video_category_master_id,'is_deleted'=>0));	
				
				if($goal_all_lang){
					foreach($goal_all_lang as $lang_goal){
						if(!empty($category_image)){
							$lang_goal->setImage_id($category_image);
						}
						$em->flush();
					}
				}	
				$this->get('session')->getFlashBag()->set('success_msg','Video Category Upadated successfully');
				
			}else{
				$new_category = new Uservideocategorymaster();
				$new_category->setName($name);
				$new_category->setDescription($description);
				$new_category->setImage_id($category_image);
				$new_category->setStatus('active');
				$new_category->setCreated_datetime(date('Y-m-d H:i:s'));

				$new_category->setLanguage_id($language_id);
				$new_category->setMain_user_video_category_master_id($main_user_video_category_master_id);
				$new_category->setIs_deleted(0);
				
				$em->persist($new_category);
				$em->flush();
				
				if($main_user_video_category_master_id == 0){
					$main_user_video_category_master_id = $new_category->getUser_video_category_master_id();
					$new_category->setMain_user_video_category_master_id($main_user_video_category_master_id);
					$em->flush();
				}

				#both language changes
				
				$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideocategorymaster")->findBy(array('main_user_video_category_master_id'=>$main_user_video_category_master_id,'is_deleted'=>0));	
				
				if($goal_all_lang){
					foreach($goal_all_lang as $lang_goal){
						if(!empty($category_image)){
							$lang_goal->setImage_id($category_image);
						}
						$em->flush();
					}
				}					
				
				$this->get('session')->getFlashBag()->set('success_msg','Video Category inserted successfully');
			}
			
//			$referer = $req->headers->get('referer');
			return $this->redirectToRoute('admin_uservideocategory_index');
				
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');
			return $this->redirectToRoute('admin_default_index');
		}
    }	

    /**
     * @Route("/userVideoCategory/deleteUserVideoCategory/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function deleteAction($main_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideocategorymaster")->findBy(array('main_user_video_category_master_id'=>$main_id,'is_deleted'=>0));	
		
		if($goal_all_lang){
			foreach($goal_all_lang as $lang_goal){
				$lang_goal->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Video Category deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }	
}
