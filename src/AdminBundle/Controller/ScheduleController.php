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
use AdminBundle\Entity\Commongallerymaster;
use AdminBundle\Entity\Uservideomaster ;
use AdminBundle\Entity\Schedulemaster  ;
use AdminBundle\Entity\Scheduleuserrelation  ;

class ScheduleController extends BaseController
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
     * @Route("/schedule/list/{user_id}/{assign_schedule}",defaults={"user_id"="0", "assign_schedule"=""})
     * @Template()
     */
    public function indexAction($user_id, $assign_schedule)
    {
		$user_relation_join = '';
		$pk_where = '';
		
		if($user_id != 0){
			#checkPackage buy for workout or not and consultant_fee_type_id =  4 for workout 
			$sql_1 = "select package_id from order_master 
					LEFT JOIN order_include_relation ON order_master.order_master_id = order_include_relation.order_id 
					where order_master.order_by = '$user_id' and order_master.order_status = 'success' ";	
			$packages_for_schedule = $this->fireQuery($sql_1);	
			$pk_array = null;

			if(!empty($packages_for_schedule)){
				foreach($packages_for_schedule as $pk){
					$pk_array [] = $pk['package_id'];
				}
			}
			if(!empty($pk_array)){
				$pk_array_str = implode(',',$pk_array);
				$pk_where = " AND main_package_id IN ($pk_array_str) ";
			}else{
				$pk_where = " AND main_package_id IN (0) ";				
			}
			
			$user_relation_join = " LEFT JOIN schedule_user_relation ON schedule_user_relation.main_schedule_id = schedule_master.main_schedule_id and schedule_user_relation.user_id = '$user_id' and schedule_user_relation.is_deleted = 0 ";
		}
		
		$sql = "select *,schedule_master.main_schedule_id as main_schedule_id_ from schedule_master 
				JOIN media_library_master ON schedule_master.media_id = media_library_master.media_library_master_id 
				JOIN package_master ON schedule_master.main_package_id = package_master.main_package_master_id 
				$user_relation_join 
				where schedule_master.is_deleted = 0 and media_library_master.is_deleted = 0 and package_master.is_deleted = 0 group by schedule_master.main_schedule_id";
		$gallery = $this->fireQuery($sql);	
	
		$live_path = $this->container->getParameter('live_path');
		
		if(!empty($gallery)){
			foreach($gallery as $key=>$value){
				$gallery[$key]['media_url'] = "$live_path".$value['media_location']."/".$value['media_name'];
			}
		}
//		echo"<pre>";print_r($gallery);exit;
		return array(
			'gallery'=>$gallery,
			'user_id'=>$user_id,
			'assign_schedule' => $assign_schedule
		);
    }
	
    /**
     * @Route("/schedule/addSchedule/{schedule_id}/{user_id}",defaults={"schedule_id"="0","user_id"="0"})
     * @Template()
     */
    public function addScheduleAction($schedule_id, $user_id)
    {
		
		$languages = $this->getLanguages();		
	
		$sql = "select main_package_master_id,package_name,language_id from package_master where is_deleted = '0'";
		$main_packages = $this->fireQuery($sql);		
	
		$sql = "select * from schedule_master 
				JOIN media_library_master ON schedule_master.media_id = media_library_master.media_library_master_id 
				where schedule_master.is_deleted = 0 and media_library_master.is_deleted = 0 and 	main_schedule_id = '$schedule_id'";
		$video_master = $this->fireQuery($sql);	
	
		$live_path = $this->container->getParameter('live_path');
		
		if(!empty($video_master)){
			foreach($video_master as $key=>$value){
				$video_master[$key]['media_url'] = $live_path."".$value['media_location']."/".$value['media_name'];
			}
		}

		$user_role_id = 3;
		$sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,email,status,media_name,media_location from user_master 
		LEFT JOIN media_library_master ON user_master.user_image = media_library_master.media_library_master_id 
		where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' ";
		$users = $this->fireQuery($sql);

		$sql = "select user_id from schedule_user_relation where is_deleted = '0' and main_schedule_id = {$schedule_id} ";
		$user_sched_rel = $this->fireQuery($sql);	
		$user_selected = null;

		if(!empty($user_sched_rel)){
			foreach($user_sched_rel as $rel_sched){
				$user_selected[] = $rel_sched['user_id'];
			}
		}

		return array(
			'video_master'=>$video_master,
			'language_list'=>$languages,
			'main_packages'=>$main_packages,
			'user_id' => $user_id,
			'users'=>$users,
			'user_selected'=>$user_selected,
			'schedule_id' => $schedule_id
		);
	}
	
    /**
     * @Route("/schedule/deleteSchedule/{schedule_id}",defaults={"schedule_id"="0"})
     * @Template()
     */
    public function deleteScheduleAction($schedule_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();	
		$gallery_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Schedulemaster")->findBy(array('main_schedule_id'=>$schedule_id,'is_deleted'=>0));
		
		if(!empty($gallery_exist)){
			foreach($gallery_exist as $video){
				$image_url = $this->getmediaAction($video->getMedia_id());
				$video->setIs_deleted(1);
				$em->flush();
			
			}
		}		
		
		$this->get('session')->getFlashBag()->set('success_msg','Schedule deleted successfully');	
		
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
		
	}
	
    /**
     * @Route("/schedule/AssignSchdule")
     * @Template()
     */
    public function assignScheduleAction(Request $req)
    {
		$user_id = $req->request->get('user_id');	
		$schedule_id = $req->request->get('schedule_id');	
		$status = $req->request->get('status');	
		
		$em = $this->getDoctrine()->getManager();	
		$assign_schedule = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Scheduleuserrelation")->findOneBy(array('main_schedule_id'=>$schedule_id,'is_deleted'=>0,'user_id'=>$user_id));
		
		if(!empty($assign_schedule)){
			if($status == 'true'){
				$assign_schedule->setIs_deleted(0);
			}
			if($status == 'false'){
				$assign_schedule->setIs_deleted(1);
			}			
			$em->flush();
		}else{
			$new_assign = new Scheduleuserrelation();
			$new_assign->setMain_schedule_id($schedule_id);
			$new_assign->setUser_id($user_id);
			$new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
			$new_assign->setIs_deleted(0);
			$em->persist($new_assign);
			$em->flush();
		}		
		return new Response('done');	
		
	}	
	
    /**
     * @Route("/schedule/save")
     * @Template()
     */
    public function saveScheduleAction(Request $req)
    {

		$em = $this->getDoctrine()->getManager(); 
		$main_schedule_id = $req->request->get('main_schedule_id');
		$language_id = $req->request->get('language_id');
		$user_id = $req->request->get('user_id');
		$user_selected = null;
		if($req->request->has('user_selected')){
			$user_selected = $req->request->get('user_selected');
		}
		$main_package_master_id = $req->request->get('main_package_master_id');

		//if(isset($_FILES['gallery']) && !empty($_FILES['gallery']) && isset($_FILES['gallery']['size']) && $_FILES['gallery']['size'] > 0){

			#get_media_type Mediatype
		if(isset($_FILES['gallery']) && !empty($_FILES['gallery']) && isset($_FILES['gallery']['size']) && $_FILES['gallery']['size'] > 0){
			$media_type = $this->getDoctrine()->getRepository("AdminBundle:Mediatype")->findBy(
				array(
					'is_deleted'=>0,
				)
			);										
			
			$img_ext = null;
			$video_ext = null;
			$doc_ext = null;
			
			if($media_type){
				foreach($media_type as $type_list){
					if($type_list->getMedia_type_name() == 'Image'){
						$img_ext = explode(',',$type_list->getMedia_type_allowed());
					}
					if($type_list->getMedia_type_name() == 'doc'){
						$doc_ext = explode(',',$type_list->getMedia_type_allowed());
					}
					
					if($type_list->getMedia_type_name() == 'Video'){
						$video_ext = explode(',',$type_list->getMedia_type_allowed());
					}												
				}
			}		
			
			$file_name = $_FILES['gallery']['name'];
			$tmp_name = $_FILES['gallery']['tmp_name'];	
			$media_type_id = 1; 
			$media_type = 'img';
			
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);
								
			if(in_array($ext,$doc_ext)){
				$media_type_id = 4;
				$media_type = 'video';
			}
			
			$upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/schedule/";
			
			$media_id = $this->mediauploadAction($file_name,$tmp_name,"/bundles/uploads/schedule/",$upload_dir,$media_type_id);
		} else {
			if($req->request->has('hidden_media_id')){
				$media_id = $req->request->get('hidden_media_id');
			}
		}
	
		if(isset($media_id)){
			#check Commongallerymaster
			
			$gallery_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Schedulemaster")->findOneBy(array('main_schedule_id'=>$main_schedule_id,'language_id'=>$language_id,'is_deleted'=>0));

			if($gallery_exist){
				$gallery_exist->setMedia_id($media_id);	
				$gallery_exist->setMain_package_id($main_package_master_id);	
				$em->flush();
				
				if($user_selected != null){
					// remove older
					$userSelected = $em->getRepository("AdminBundle:Scheduleuserrelation")->findBy(
						array(
							'main_schedule_id' => $main_schedule_id,
							'is_deleted' => 0
						)
					);
					if($userSelected != null){
						foreach($userSelected as $_selected){
							$_selected->setIs_deleted(1);
							$em->flush();
						}
					}

					foreach($user_selected as $_selected){
						$new_assign = new Scheduleuserrelation();
						$new_assign->setMain_schedule_id($main_schedule_id);
						$new_assign->setUser_id($_selected);
						$new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
						$new_assign->setIs_deleted(0);
						$em->persist($new_assign);
						$em->flush();
					}
				}

				$this->get('session')->getFlashBag()->set('success_msg','Schedule updated successfully');	
		
			}else{

				$new_gallery = new Schedulemaster();
				$new_gallery->setMedia_id($media_id);	
				$new_gallery->setMain_package_id($main_package_master_id);					
				$new_gallery->setIs_deleted(0);					
				$new_gallery->setMain_schedule_id($main_schedule_id);					
				$new_gallery->setLanguage_id($language_id);					
				$new_gallery->setCreated_by($this->get('session')->get('user_id'));					
				$new_gallery->setCreated_datetime(date('Y-m-d H:i:s'));	
				$em->persist($new_gallery);
				$em->flush();
				
				if($main_schedule_id == 0){
					$main_schedule_id = $new_gallery->getSchedule_master_id();
					$new_gallery->setMain_schedule_id($main_schedule_id);
					
				}

				$em->flush();

				if($user_selected != null){
					foreach($user_selected as $_selected){
						$new_assign = new Scheduleuserrelation();
						$new_assign->setMain_schedule_id($main_schedule_id);
						$new_assign->setUser_id($_selected);
						$new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
						$new_assign->setIs_deleted(0);
						$em->persist($new_assign);
						$em->flush();
					}
				}
				
				// assign schedule to user direcly
				if($user_id != '0' && $user_id != 0){
					$new_assign = new Scheduleuserrelation();
					$new_assign->setMain_schedule_id($main_schedule_id);
					$new_assign->setUser_id($user_id);
					$new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
					$new_assign->setIs_deleted(0);
					$em->persist($new_assign);
					$em->flush();
				}
			
				$this->get('session')->getFlashBag()->set('success_msg','Schedule inserted successfully');	
				return $this->redirectToRoute('admin_schedule_index');
			}
		} else {
			$this->get('session')->getFlashBag()->set('error_msg','Please Upload Media');	
		}
			
		/*}else{
			$this->get('session')->getFlashBag()->set('success_msg','User Video updated successfully');	
		}*/	

		$referer = $req->headers->get('referer');
		return $this->redirect($referer);
			
	}	
		
}
