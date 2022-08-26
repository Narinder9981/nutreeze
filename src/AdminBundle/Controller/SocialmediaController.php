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
use AdminBundle\Entity\Socialmedia;

class SocialmediaController extends BaseController
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
     * @Route("/socialmedia")
     * @Template()
     */
    public function indexAction(){
		
		$domain_id = $this->get('session')->get('domain_id');
				
//		echo"<pre>";print_r($city_list_details);exit;
		$sql = "select * from social_media where is_deleted = 0";
		$medias = $this->firequery($sql);
		
		return array(
			'medias' => $medias,
			'language_list' => $this->getLanguages()
		);
    }
     /**
     * @Route("/socialmedia/addmedia/{social_media_id}",defaults={"social_media_id"="0"})
     * @Template()
     */
    public function addmediaAction($social_media_id)
    {
		$medias = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Socialmedia')->findBy(array('social_media_id'=>$social_media_id,'is_deleted'=>0));
		$live_path = $this->container->getParameter('live_path');
		
		/*if(!empty($medias)){
			foreach($medias as $key=>$value){
				$coupon_image_id = $value->getCoupon_image_id();
				$coupon_details[$key]->media_url = $this->getmediaAction($coupon_image_id);
			}
		}*/


		return array(
			'media'=>$medias
		);
	}
	/**
     * @Route("/socialmedia/savemedia")
     */
	public function savemediaAction(Request $req){
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$title = $req->request->get('title');
			$link = $req->request->get('link');
			$social_media_id = $req->request->get('social_media_id');
			$media_type_id = 1; 
			$media_type = 'img';
			$file_name1 = $_FILES['img']['name'];
			$tmp_name1 = $_FILES['img']['tmp_name'];	
			
			$media_image = 0;
			if(!empty($req->request->get('social_media_id'))){
				$media_image = $req->request->get('social_media_id');
			}
			 $upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/social_media/";
			 if(!empty($_FILES['img']) && $_FILES['img']['size'] >0 ){
			 	$media_image = $this->mediauploadAction($file_name1,$tmp_name1,"/bundles/uploads/social_media/",$upload_dir,$media_type_id);					
			 }

			if(!empty($social_media_id)){
				$social_media = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Socialmedia')->findOneBy(array('social_media_id'=>$social_media_id,'is_deleted'=>0));
			}else{
				$social_media = new Socialmedia();				
			}
			$social_media->setTitle($title);
			$social_media->setLink($link);
			$social_media->setImg($media_image);
			$social_media->setIs_deleted(0);
			$em->persist($social_media);
			$em->flush();
			if(!empty($social_media_id)){
				$this->get('session')->getFlashBag()->set('success_msg','Social Media Item Upadated successfully');
			}else{
				$this->get('session')->getFlashBag()->set('success_msg','Social Media Item Inserted successfully');
			}
			return $this->redirectToRoute('admin_socialmedia_index');
		}
		return $this->redirectToRoute('admin_socialmedia_index');
	}

     /**
     * @Route("/socialmedia/deletemedia/{media_id}",defaults={"media_id" = "0"})
     * @Template()
     */
    public function deletemediaAction($media_id){
		
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		$media_check = $this->getDoctrine()->getManager()
		->getRepository("AdminBundle:Socialmedia")
		->findBy(array(
			'social_media_id'=>$media_id,
			'is_deleted'=>0));
																									
		if($media_check){
			foreach($media_check as $media){
				$media->setIs_deleted(1);				
				$entity->flush();			
			}
			
			$this->get('session')->getFlashBag()->set('success_msg','Social media item  deleted Succesfully');	
		}
		
		
		// manual commit
		$entity->getConnection()->commit();
		$entity->clear();		
		
		return $this->redirectToRoute('admin_socialmedia_index');

			
    }
     
    /**
     * @Route("/changemediaStatus")
     * @Template()
     */
    public function changemediastatusAction(Request $req)
    {
		$domain_id = $this->get('session')->get('domain_id');
	
		$id = $req->request->get('media_id');
		$status = $req->request->get('status');
		
		$em = $this->getDoctrine()->getManager();
		
		
		$medias = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Socialmedia')->findBy(array(
			'is_deleted'=>0,
			'social_media_id'=>$id
		));
		if($medias){
			foreach($medias as $media){
				if($status == 'true'){
					
					$media->setStatus('1');
				}else{
					$media->setStatus('0');					
				}
				$em->flush();
			}
		}
		
		return new Response('done');
	
    }
	
   	
}
