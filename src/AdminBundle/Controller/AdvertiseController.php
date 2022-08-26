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
use AdminBundle\Entity\Advertisemaster;

class AdvertiseController extends BaseController
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
			// redirect to dashboard
            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }
    /**
     * @Route("/advertise")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		
		$sql_main = "select * from advertise_master 
						where advertise_master.is_deleted = 0 group by main_advertise_id ";
		$ad_main = $this->fireQuery($sql_main);		
		$live_path = $this->container->getParameter('live_path');
		$ad_details_all = null ;
		
		if(!empty($ad_main)){
			
			foreach($ad_main as $key=>$value){
				$lang_wise = array();
				$main_advertise_id = $value['main_advertise_id'];				
				$start_date = $value['start_date'];				
				$end_date = $value['end_date'];				
				$status = $value['status'];				
				$sort_order = $value['sort_order'];				
				$advertise_type = $value['advertise_type'];				
				
				if(!empty($languages)){
					foreach($languages as $lang){
						$sql = "select * from advertise_master 
								JOIN media_library_master ON advertise_master.advertise_image_id = media_library_master.media_library_master_id 
								where advertise_master.is_deleted = 0 and media_library_master.is_deleted = 0 and main_advertise_id = '".$value['main_advertise_id']."' and language_id = '".$lang->getLanguage_master_id()."'";
						
						$ad_details = $this->fireQuery($sql);	
						
						if(!empty($ad_details)){
							$lang_wise [] = array('lang_id'=>$lang->getLanguage_master_id(),'ad_name'=>$ad_details[0]['advertise_name'],'media_url'=>"$live_path".$ad_details[0]['media_location']."/".$ad_details[0]['media_name']);
						}else{
							$lang_wise [] = array('lang_id'=>$lang->getLanguage_master_id(),'ad_name'=>'-','media_url'=>'');							
						}
					}
				}
				
				$ad_details_all[] = array('main_advertise_id'=>$main_advertise_id,
										'lang_wise'=>$lang_wise,
										'start_date'=>$start_date,
										'end_date'=>$end_date,
										'status'=>$status,
										'sort_order'=>$sort_order,
										'advertise_type'=>$advertise_type,
										);				
			}			
		}

//		echo"<pre>";print_r($ad_details_all);exit;	
		return array('ad_details_all'=>$ad_details_all,'language_list'=>$languages);	
    }
	
    /**
     * @Route("/advertise/addAdvertise/{ad_id}",defaults={"ad_id"="0"})
     * @Template()
     */
    public function addAdvertiseAction($ad_id)
    {

		$languages = $this->getLanguages();
	
		$sql = "select * from advertise_master 
				LEFT JOIN media_library_master ON advertise_master.advertise_image_id = media_library_master.media_library_master_id 
				where advertise_master.is_deleted = 0 and main_advertise_id = '".$ad_id."'";
		
		$ad_details = $this->fireQuery($sql);	
	
		$live_path = $this->container->getParameter('live_path');
		
		if(!empty($ad_details)){
			foreach($ad_details as $key=>$value){
				$ad_details[$key]['media_url'] = $live_path."".$value['media_location']."/".$value['media_name'];
			}
		}	
//		echo"<pre>";print_r($ad_details);exit;	
		return array('ad_details'=>$ad_details,'language_list'=>$languages);
	}
	
    /**
     * @Route("/gallery/deleteAdvertise/{ad_id}",defaults={"ad_id"="0"})
     * @Template()
     */
    public function deleteAdvertiseAction($ad_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();	
		$ad_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Advertisemaster")->findBy(array('main_advertise_id'=>$ad_id,'is_deleted'=>0));
		
		if(!empty($ad_exist)){
			foreach($ad_exist as $ad){
				$ad->setIs_deleted(1);
				$em->flush();						
			}
		}		
		
		$this->get('session')->getFlashBag()->set('success_msg','Advertisement deleted successfully');	
		
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
		
	}
	
	
    /**
     * @Route("/advertise/save")
     * @Template()
     */
    public function saveAdvertiseAction(Request $req)
    {

		$em = $this->getDoctrine()->getManager(); 
		$main_advertise_id = $req->request->get('main_advertise_id');
		$language_id = $req->request->get('language_id');
		$advertise_name = $req->request->get('advertise_name');
		$sort_order = $req->request->get('sort_order');
		$status = $req->request->get('status');
		if(empty($status)){
			$status = 'active';
		}
		$advertise_type = $req->request->get('advertise_type');
		$advertisement_link = ( $req->request->get('advertisement_link') != Null ) ?  $req->request->get('advertisement_link') : '';
		$end_date = date('Y-m-d H:i:s',strtotime($req->request->get('end_date')));
		$start_date = date('Y-m-d H:i:s',strtotime($req->request->get('start_date')));
		
		$media_id = 0 ;
//		print_r($_FILES['ad_image']);exit;
		if(isset($_FILES['ad_image']) && !empty($_FILES['ad_image']) && isset($_FILES['ad_image']['size']) && $_FILES['ad_image']['size'] > 0){

			#get_media_type Mediatype
			
			$media_type = $this->getDoctrine()->getRepository("AdminBundle:Mediatype")->findBy(
				array(
					'is_deleted'=>0,
				)
			);										
			
			$img_ext = null;
			$video_ext = null;
			
			if($media_type){
				foreach($media_type as $type_list){
					if($type_list->getMedia_type_name() == 'Image'){
						$img_ext = explode(',',$type_list->getMedia_type_allowed());
					}
					
					if($type_list->getMedia_type_name() == 'Video'){
						$video_ext = explode(',',$type_list->getMedia_type_allowed());
					}												
				}
			}		
			
			$file_name = $_FILES['ad_image']['name'];
			$tmp_name = $_FILES['ad_image']['tmp_name'];	
			$media_type_id = 1; 
			$media_type = 'img';
			
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);
								
			if(in_array($ext,$video_ext)){
				$media_type_id = 2;
				$media_type = 'video';
			}
			
			$upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/ad_gallery/";
			
			$media_id = $this->mediauploadAction($file_name,$tmp_name,"/bundles/uploads/ad_gallery/",$upload_dir,$media_type_id);	
		}
		
		#check_add
		$em = $this->getDoctrine()->getManager();	
		$ad_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Advertisemaster")->findOneBy(array('main_advertise_id'=>$main_advertise_id,'is_deleted'=>0,'language_id'=>$language_id));
		
		if($ad_exist){
			//edit
			$ad_exist->setAdvertise_name($advertise_name);
			
			if($media_id != 0){
				$ad_exist->setAdvertise_image_id($media_id);				
			}

			$em->flush();
			#common_changes
			$ad_exist_all = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Advertisemaster")->findBy(array('main_advertise_id'=>$main_advertise_id,'is_deleted'=>0));
				
			if($ad_exist_all){
				foreach($ad_exist_all as $ad_lang){
					$ad_lang->setStart_date($start_date);
					$ad_lang->setEnd_date($end_date);
					$ad_lang->setStatus($status);					
					$ad_lang->setSort_order($sort_order);
					$ad_lang->setAdvertisement_link($advertisement_link);
					$ad_lang->setAdvertise_type($advertise_type);
					$em->flush();	
				}
			}

			$this->get('session')->getFlashBag()->set('success_msg','Advertise Updated Successfully');
			
		}else{
			$new_ad = new Advertisemaster();
			$new_ad->setAdvertise_name($advertise_name);
			$new_ad->setLanguage_id($language_id);
			$new_ad->setAdvertise_image_id($media_id);
			$new_ad->setStart_date($start_date);
			$new_ad->setEnd_date($end_date);
			$new_ad->setStatus($status);
			$new_ad->setMain_advertise_id($main_advertise_id);
			$new_ad->setSort_order($sort_order);
			$new_ad->setDomain_id(1);
			$new_ad->setIs_deleted(0);
			$new_ad->setAdvertise_type($advertise_type);
			$new_ad->setAdvertisement_link($advertisement_link);			
			
			$em->persist($new_ad);
			$em->flush();
			
			if($main_advertise_id == 0){
				$main_advertise_id = $new_ad->getAdvertise_master_id();
				$new_ad->setMain_advertise_id($main_advertise_id);
				$em->flush();
			}
			
			$this->get('session')->getFlashBag()->set('success_msg','Advertise Inserted Successfully');
			return $this->redirectToRoute('admin_advertise_index');
		}

		$referer = $req->headers->get('referer');
		return $this->redirect($referer);
			
	}

    /**
     * @Route("/changeAdStatus")
     * @Template()
     */
    public function changeadstatusAction(Request $req)
    {
	
		$id = $req->request->get('main_ad_id');
		$status = $req->request->get('status');
		
		$em = $this->getDoctrine()->getManager();
		
		
		$ad_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Advertisemaster')->findBy(array(
																	'is_deleted'=>0,
																	'main_advertise_id'=>$id
																	)
																);
																
//		print_r($ad_master);exit;														
		if($ad_master){
			foreach($ad_master as $ad_master){
				if($status == 'true'){
					$ad_master->setStatus('active');
				}else{
					$ad_master->setStatus('inactive');					
				}
				$em->flush();
			}
		}
		
		return new Response('done');
	
    }
	
		
}
