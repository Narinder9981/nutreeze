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

class GalleryController extends BaseController
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
     * @Route("/gallery")
     * @Template()
     */
    public function indexAction()
    {
		$sql = "select * from common_gallery_master 
				JOIN media_library_master ON common_gallery_master.media_id = media_library_master.media_library_master_id 
				where common_gallery_master.is_deleted = 0 and media_library_master.is_deleted = 0 ";
		$gallery = $this->fireQuery($sql);	
	
		$live_path = $this->container->getParameter('live_path');
		
		if(!empty($gallery)){
			foreach($gallery as $key=>$value){
				$gallery[$key]['media_url'] = "$live_path".$value['media_location']."/".$value['media_name'];
			}
		}

		return array('gallery'=>$gallery);	
    }
	
    /**
     * @Route("/gallery/addGallery/{gallery_id}",defaults={"gallery_id"="0"})
     * @Template()
     */
    public function addGalleryAction($gallery_id)
    {
		
		$sql = "select * from common_gallery_master 
				JOIN media_library_master ON common_gallery_master.media_id = media_library_master.media_library_master_id 
				where common_gallery_master.is_deleted = 0 and media_library_master.is_deleted = 0 and 	common_gallery_master_id = '$gallery_id'";
		$gallery = $this->fireQuery($sql);	
	
		$live_path = $this->container->getParameter('live_path');
		
		if(!empty($gallery)){
			foreach($gallery as $key=>$value){
				$gallery[$key]['media_url'] = $live_path."".$value['media_location']."/".$value['media_name'];
			}
		}		
		return array('gallery'=>$gallery);
	}
	
    /**
     * @Route("/gallery/deleteGallery/{gallery_id}",defaults={"gallery_id"="0"})
     * @Template()
     */
    public function deleteGalleryAction($gallery_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();	
		$gallery_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Commongallerymaster")->findOneBy(array('common_gallery_master_id'=>$gallery_id,'is_deleted'=>0));
		
		if(!empty($gallery_exist)){
			$gallery_exist->setIs_deleted(1);
			$em->flush();
		}		
		
		$this->get('session')->getFlashBag()->set('success_msg','Gallery deleted successfully');	
		
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
		
	}
	
	
    /**
     * @Route("/gallery/save")
     * @Template()
     */
    public function saveGalleryAction(Request $req)
    {

		$em = $this->getDoctrine()->getManager(); 
		$gallery_id = $req->request->get('main_gallery_id');
		
		if(isset($_FILES['gallery']) && !empty($_FILES['gallery']) && isset($_FILES['gallery']['size']) && $_FILES['gallery']['size'] > 0){

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
			
			$file_name = $_FILES['gallery']['name'];
			$tmp_name = $_FILES['gallery']['tmp_name'];	
			$media_type_id = 1; 
			$media_type = 'img';
			
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);
								
			if(in_array($ext,$video_ext)){
				$media_type_id = 2;
				$media_type = 'video';
			}
			
			$upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/common_gallery/";
			
			$media_id = $this->mediauploadAction($file_name,$tmp_name,"/bundles/uploads/common_gallery/",$upload_dir,$media_type_id);	
		
			if($media_id){
				#check Commongallerymaster
				
				$gallery_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Commongallerymaster")->findOneBy(array('common_gallery_master_id'=>$gallery_id,'is_deleted'=>0));
				if($gallery_exist){
					$gallery_exist->setMedia_id($media_id);	
					$gallery_exist->setMedia_type($media_type);	
					$em->flush();
					
					$this->get('session')->getFlashBag()->set('success_msg','Gallery updated successfully');	
			
				}else{
					$new_gallery = new Commongallerymaster();
					$new_gallery->setMedia_id($media_id);	
					$new_gallery->setMedia_type($media_type);					
					$new_gallery->setIs_deleted(0);					
					$new_gallery->setCreated_datetime(date('Y-m-d H:i:s'));	

					$em->persist($new_gallery);
					$em->flush();
				
					$this->get('session')->getFlashBag()->set('success_msg','Gallery inserted successfully');	
					return $this->redirectToRoute('admin_gallery_index');
				}
			}
			
		}else{
			$this->get('session')->getFlashBag()->set('success_msg','Gallery updated successfully');	
		}	

		$referer = $req->headers->get('referer');
		return $this->redirect($referer);
			
	}	
		
}
