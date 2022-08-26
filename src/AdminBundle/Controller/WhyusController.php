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

use AdminBundle\Entity\Aboutus;

class WhyusController extends BaseController
{
	private $upload_doc_dir = "/bundles/design/uploads/why_us/";		
	
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
     * @Route("/why_us")
     * @Template()
     */
    public function indexAction()
    {
		
		$domain_id = 1;
		$languages = $this->getLanguages();
		$live_path = $this->container->getParameter('live_path');
		$about_us_details =  null;
		
		$about_us = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Whyus')->findBy(array('is_deleted'=>0,'domain_id'=>$domain_id));
		
		if($about_us){
			foreach($about_us as $about_us){
				$about_us_details [] = array('main_about_us_id'=>$about_us->getMain_about_us_id(),
											 'description'=>$about_us->getDescription(),
											 'language_id'=>$about_us->getLanguage_id(),
											 'img'=>$this->getmediaAction($about_us->getImage_id())	
											); 
			}
		}
		return array('about_us'=>$about_us_details,'language_list'=>$languages);		
    }
	
    /**
     * @Route("/saveWhyus")
     * @Template()
     */
    public function savewhyAction(Request $req)
    {
		$domain_id = 1;
		
		$entity = $this->getDoctrine()->getManager();
		
		// begin transaction and suspend auto commit
		$entity->getConnection()->beginTransaction();
		
		$lang_id = $req->request->get('language_id');
		$main_about_us_id = $req->request->get('main_about_us_id');
		$description = $req->request->get('description');

		$about_us_check = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Whyus')->findOneBy(array('main_about_us_id'=>$main_about_us_id,'is_deleted'=>0,'domain_id'=>$domain_id,'language_id'=>$lang_id));
		
		
		try{		
//		echo"<pre>";print_r($_FILES['about_img']);exit;
			$media_id = 0 ;
			if(isset($_FILES['about_img']) && !empty($_FILES['about_img']) && isset($_FILES['about_img']['size']) && $_FILES['about_img']['size'] > 0)
			{
				$file_name = $_FILES['about_img']['name'];
				$tmp_name = $_FILES['about_img']['tmp_name'];
							
				$path = $this->upload_doc_dir;
							
				$upload_dir = $this->container->getParameter('absolute_path').$path;

				$media_id = $this->mediauploadAction($file_name, $tmp_name, $path, $upload_dir, 1);									
				
			}
					
			if($about_us_check){
					
					$about_us_check->setDescription($description);
					$entity->flush();
					
					if($media_id != 0){
					//update image for all language about_us
						$about_us_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Whyus')->findBy(array('main_about_us_id'=>$main_about_us_id,'is_deleted'=>0,'domain_id'=>$domain_id));

						if($about_us_check_all){
							foreach($about_us_check_all as $lang_about){
								$lang_about->setImage_id($media_id);
								$entity->flush();
							}
						}
					}

					$entity->getConnection()->commit();
					$entity->clear();
					
				$this->get('session')->getFlashBag()->set('success_msg','Why us Updated Successfully');
				return $this->redirectToRoute('admin_whyus_index',array('domain'=>$this->get('session')->get('domain')));					
			}else{
					$new_about = new Whyus();
					$new_about->setDescription($description);
					$new_about->setImage_id($media_id);
					$new_about->setIs_deleted(0);
					$new_about->setLanguage_id($lang_id);
					$new_about->setmain_about_us_id($main_about_us_id);			

					$new_about->setDomain_id($domain_id);
					
					$entity->persist($new_about);
					$entity->flush();
					
					if($main_about_us_id == 0){
						$main_about_us_id = $new_about->getAbout_us_id();						
					}
				
					$new_about->setmain_about_us_id($main_about_us_id);	
					$entity->flush();			
				
					//update image for all language about_us
						$about_us_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Whyus')->findBy(array('main_about_us_id'=>$main_about_us_id,'is_deleted'=>0,'domain_id'=>$domain_id));

						if($about_us_check_all){
							foreach($about_us_check_all as $lang_about){
								$lang_about->setImage_id($media_id);
								$entity->flush();
							}
						}				
					// manual commit
					$entity->getConnection()->commit();
					$entity->clear();
					
					$this->get('session')->getFlashBag()->set('success_msg','Why us Inserted Successfully');
					return $this->redirectToRoute('admin_whyus_index',array('domain'=>$this->get('session')->get('domain')));									
			}
		}catch(\Exception $e){
			echo $e->getMessage();exit;				
		}		
	}	
 
}

