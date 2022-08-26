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

class AboutusController extends BaseController
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
     * @Route("/about_us")
     * @Template()
     */
    public function indexAction()
    {
		
		$domain_id = 1;
		$languages = $this->getLanguages();
		$live_path = $this->container->getParameter('live_path');
		$about_us_details =  null;
		
		$about_us = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Aboutus')->findBy(array('is_deleted'=>0,'domain_id'=>$domain_id));
		
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
     * @Route("/saveAboutUs")
     * @Template()
     */
    public function saveaboutAction(Request $req)
    {
		$domain_id = 1;
		
		$entity = $this->getDoctrine()->getManager();
		
		// begin transaction and suspend auto commit
		$entity->getConnection()->beginTransaction();
		
		$lang_id = $req->request->get('language_id');
		$main_about_us_id = $req->request->get('main_about_us_id');
		$description = $req->request->get('description');

		$about_us_check = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Aboutus')->findOneBy(array('main_about_us_id'=>$main_about_us_id,'is_deleted'=>0,'domain_id'=>$domain_id,'language_id'=>$lang_id));
		
		
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
						$about_us_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Aboutus')->findBy(array('main_about_us_id'=>$main_about_us_id,'is_deleted'=>0,'domain_id'=>$domain_id));

						if($about_us_check_all){
							foreach($about_us_check_all as $lang_about){
								$lang_about->setImage_id($media_id);
								$entity->flush();
							}
						}
					}

					$entity->getConnection()->commit();
					$entity->clear();
					
				$this->get('session')->getFlashBag()->set('success_msg','About us Updated Successfully');
				return $this->redirectToRoute('admin_aboutus_index',array('domain'=>$this->get('session')->get('domain')));					
			}else{
					$new_about = new Aboutus();
					$new_about->setDescription($description);
					$new_about->setImage_id($media_id);
					$new_about->setIs_deleted(0);
					$new_about->setLanguage_id($lang_id);
					$new_about->setMain_about_us_id($main_about_us_id);			

					$new_about->setDomain_id($domain_id);
					
					$entity->persist($new_about);
					$entity->flush();
					
					if($main_about_us_id == 0){
						$main_about_us_id = $new_about->getAbout_us_id();						
					}
				
					$new_about->setMain_about_us_id($main_about_us_id);	
					$entity->flush();			
				
					//update image for all language about_us
						$about_us_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Aboutus')->findBy(array('main_about_us_id'=>$main_about_us_id,'is_deleted'=>0,'domain_id'=>$domain_id));

						if($about_us_check_all){
							foreach($about_us_check_all as $lang_about){
								$lang_about->setImage_id($media_id);
								$entity->flush();
							}
						}				
					// manual commit
					$entity->getConnection()->commit();
					$entity->clear();
					
					$this->get('session')->getFlashBag()->set('success_msg','About us Inserted Successfully');
					return $this->redirectToRoute('admin_aboutus_index',array('domain'=>$this->get('session')->get('domain')));									
			}
		}catch(\Exception $e){
			echo $e->getMessage();exit;				
		}		
	}	
  /**
	 * @Route("/checkEmailTemplate")
	 * @Template()
	 */
	public function checkEmailTemplateAction(){

		$Config_live_site = $this->container->getParameter('live_path');

		#email html template
$email_message = "<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title></title><style type='text/css'>body {margin: 0;}body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;font-style: normal;font-weight: 400;}
button{width:90%;}@media screen and (max-width:600px) {body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;}
table {width: 100%;}.footer {height: auto !important;max-width: 48% !important;width: 48% !important;}table.responsiveImage {height: auto !important;max-width: 30% !important;width: 30% !important;}table.responsiveContent {height: auto !important;max-width: 66% !important;width: 66% !important;}.top {height: auto !important;max-width: 48% !important;width: 48% !important;}.catalog {margin-left: 0%!important;}}@media screen and (max-width:480px) {body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;}table {width: 100% !important;border-style: none !important;}.footer {height: auto !important;max-width: 96% !important;width: 96% !important;}.table.responsiveImage {height: auto !important;max-width: 96% !important;width: 96% !important;}.table.responsiveContent {height: auto !important;max-width: 96% !important;width: 96% !important;}.top {height: auto !important;max-width: 100% !important;width: 100% !important;}
.catalog {margin-left: 0%!important;}}</style></head><body><table width='100%' cellspacing='0' cellpadding='0'><tbody><tr><td><table style='border:1px solid' width='70%'  align='center' cellpadding='0' cellspacing='0'><tbody><tr><td><table  bgcolor='#FFFFFF' class='top' width='100%'  align='left' cellpadding='0' cellspacing='0' style='padding:10px 10px 10px 10px;border-radius:5px'><tbody><tr><td style='font-size: 12px; color:#FFF; padding-left:20px; font-family: arial,sans-serif;'><img src='".$Config_live_site."/bundles/design/appLogo.png' style='height:50px;width:50px' ></td></tr></tbody></table></td></tr><tr> <td><table width='100%'  align='left' cellpadding='0' cellspacing='0'><tr><td style='font-size: 14px; font-weight: bold; padding: 20px; color: #222; font-family: arial,sans-serif;'>Congratulation , you have success fully registered with us.</td></tr><tr> <td align='center' style='font-size: 16px; font-weight:300; color: #929292; font-family: arial,sans-serif;'>

                    <h4>Hello Username , Now you can Login to Nutrezee app.</h4>
                    
                    </td>
                  </tr>
                  <tr>
                    <td align='center' style='font-size: 16px; font-weight:300; color: #929292; font-family: arial,sans-serif;'>
                    
                    </td>
</tr><tr><td></td></tr><tr><td style='font-size: 0; line-height: 0;' height='20'><table width='96%' align='left'  cellpadding='0' cellspacing='0'><tr><td style='font-size: 0; line-height: 0;' height='20'>&nbsp;</td></tr></table></td></tr><tr> <td align='left' style='font-size: 14px; font-style: normal; font-weight: bold; color: #222; line-height: 1.8; text-align:justify; padding:10px 20px 0px 20px; font-family:arial,sans-serif;'></td></tr></table></td></tr><tr> <td style='font-size: 0; line-height: 0;' height='10'><table width='96%' align='left'  cellpadding='0' cellspacing='0'><tr><td style='font-size: 0; line-height: 0;' height='20'>&nbsp;</td></tr></table></td></tr><tr bgcolor='#FFFFFF'><td><table class='footer' width='48%'  align='left' cellpadding='0' cellspacing='0'><tr><td><p align='center'  style='font-size: 14px; font-weight:300; line-height: 10px; color: black; font-family: arial,sans-serif;'>&copy; Copyright Nutrezee</p></td></tr></table></td></tr></tbody></table></td></tr></tbody></table></body></html>
					";
				
#email html template done

echo $email_message;exit;
	}
}
