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

use AdminBundle\Entity\Termsconditionsmaster;

class TermsController extends BaseController
{
	private $upload_doc_dir = "/bundles/design/uploads/about_us/";		
	
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
     * @Route("/terms")
     * @Template()
     */
    public function indexAction()
    {
		
		$domain_id = 1;
		$languages = $this->getLanguages();
		$live_path = $this->container->getParameter('live_path');
		$terms_details =  null;
		
		$terms = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Termsconditionsmaster')->findBy(array('is_deleted'=>0,'domain_id'=>$domain_id));
		
		if($terms){
			foreach($terms as $terms){
				$terms_details [] = array('main_terms_id'=>$terms->getMain_terms_id(),
											 'description'=>$terms->getDescription(),
											 'language_id'=>$terms->getLanguage_id(),
											 'img'=>$this->getmediaAction($terms->getImage_id())	
											); 
			}
		}
//		print_r($terms_details);exit;
		return array('terms'=>$terms_details,'language_list'=>$languages);		
    }
	
    /**
     * @Route("/saveTermsconditionsmaster")
     * @Template()
     */
    public function savetermsAction(Request $req)
    {
		$domain_id = 1;
		
		$entity = $this->getDoctrine()->getManager();
		
		// begin transaction and suspend auto commit
		$entity->getConnection()->beginTransaction();
		
		$lang_id = $req->request->get('language_id');
		$main_terms_id = $req->request->get('main_terms_id');
		$description = $req->request->get('description');

		$terms_check = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Termsconditionsmaster')->findOneBy(array('main_terms_id'=>$main_terms_id,'is_deleted'=>0,'language_id'=>$lang_id));
		
		
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
					
			if($terms_check){
					
					$terms_check->setDescription($description);
					$entity->flush();
					
					if($media_id != 0){
					//update image for all language about_us
						$terms_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Termsconditionsmaster')->findBy(array('main_terms_id'=>$main_terms_id,'is_deleted'=>0));

						if($terms_check_all){
							foreach($terms_check_all as $lang_terms){
								$lang_terms->setImage_id($media_id);
								$lang_terms->setLast_updated(date('Y-m-d H:i:s'));
								$entity->flush();
							}
						}
					}

					$entity->getConnection()->commit();
					$entity->clear();
					
				$this->get('session')->getFlashBag()->set('success_msg','Terms Updated Successfully');
				return $this->redirectToRoute('admin_terms_index');					
			}else{
					$new_about = new Termsconditionsmaster();
					$new_about->setDescription($description);
					$new_about->setImage_id($media_id);
					$new_about->setIs_deleted(0);
					$new_about->setLanguage_id($lang_id);
					$new_about->setMain_terms_id($main_terms_id);			

					$new_about->setDomain_id($domain_id);
					$new_about->setCreate_date(date('Y-m-d H:i:s'));
					$new_about->setLast_updated(date('Y-m-d H:i:s'));
					
					$entity->persist($new_about);
					$entity->flush();
					
					if($main_terms_id == 0){
						$main_terms_id = $new_about->getTerms_conditions_master_id();						
					}
				
					$new_about->setMain_terms_id($main_terms_id);	
					$entity->flush();			
				
					//update image for all language about_us
						$terms_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Termsconditionsmaster')->findBy(array('main_terms_id'=>$main_terms_id,'is_deleted'=>0));

						if($terms_check_all){
							foreach($terms_check_all as $lang_terms){
								$lang_terms->setImage_id($media_id);
								$entity->flush();
							}
						}				
					// manual commit
					$entity->getConnection()->commit();
					$entity->clear();
					
					$this->get('session')->getFlashBag()->set('success_msg','Terms Inserted Successfully');
					return $this->redirectToRoute('admin_terms_index');									
			}
		}catch(\Exception $e){
			echo $e->getMessage();exit;				
		}		
	}	
}
