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

use AdminBundle\Entity\Heightmaster;

class HeightController extends BaseController
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
     * @Route("/Height")
     * @Template()
     */
    public function indexAction()
    {

		$languages = $this->getLanguages();
		$sql = "select * from height_master where is_deleted = '0' group by main_height_id";
		$main_reason = $this->fireQuery($sql);
		$reason = null;
		
		if(!empty($main_reason)){
			foreach($main_reason as $res){
				$lang_wise = null;
				
				
				if($languages){
					foreach($languages as $lang){
						
						$sql = "select * from height_master where is_deleted = '0' and language_id = '".$lang->getLanguage_master_id()."' and main_height_id = '".$res['main_height_id']."'";
						$lang_goal = $this->fireQuery($sql);
						if(!empty($lang_goal)){
							$lang_wise[] = array('height'=>$lang_goal[0]['height'],'lang_id'=>$lang->getLanguage_master_id());
						}else{
							$lang_wise[] = array('height'=>'-','lang_id'=>$lang->getLanguage_master_id());
						}
					
					}
				}
				
				$reason[] = array(
					'main_height_id'=>$res['main_height_id'],
					'lang_wise'=>$lang_wise,
				);
			}	
		}
//		echo"<pre>";print_r($packages);exit;
		return array('reason'=>$reason,'languages'=>$languages);
    }
	
    /**
     * @Route("/height/addHeight/{main_height_id}",defaults={"main_height_id"="0"})
     * @Template()
     */
    public function addHeightAction($main_height_id)
    {
		
		$languages = $this->getLanguages();
	
		$sql = "select * from height_master 				
				where is_deleted = '0' and main_height_id = '$main_height_id' ";
		$main_reason = $this->fireQuery($sql);
		
//		echo"<pre>";print_r($product_for);exit;
		return array('main_reason'=>$main_reason,'language_list'=>$languages);
    }	
	
    /**
     * @Route("/height/save")
     * @Template()
     */
    public function saveheightAction(Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$height = $req->request->get('height');
			$main_height_id = $req->request->get('main_height_id');
			$language_id = $req->request->get('language_id');
			
			#check Usergoalmaster
			$weight1 = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Heightmaster")->findOneBy(array('main_height_id'=>$main_height_id,'language_id'=>$language_id,'is_deleted'=>0));
			
			if($weight1){
				$weight1->setHeight($height);
				$em->flush();			
				$this->get('session')->getFlashBag()->set('success_msg','Height Upadated Successfully');
		
			}else{
				$reasonmaster = new Heightmaster();
				$reasonmaster->setHeight($height);
				$reasonmaster->setLanguage_id($language_id);
				$reasonmaster->setMain_height_id($main_height_id);
				$reasonmaster->setStatus('active');
				$reasonmaster->setIs_deleted(0);				
				$em->persist($reasonmaster);
				$em->flush();
				
				if($main_height_id == 0){
					$main_height_id = $reasonmaster->getHeight_master_id();
					$reasonmaster->setMain_height_id($main_height_id);
					$em->flush();
				}				
				$this->get('session')->getFlashBag()->set('success_msg','Height Inserted Successfully');
			}			
			return $this->redirectToRoute('admin_height_index');
				
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');
			return $this->redirectToRoute('admin_default_index');
		}
    }	

    /**
     * @Route("/height/deleteheight/{main_height_id}",defaults={"main_height_id"="0"})
     * @Template()
     */
    public function deleteheightAction($main_height_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$reasons = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Heightmaster")->findBy(array('main_height_id'=>$main_height_id,'is_deleted'=>0));	
		
		if($reasons){
				
			foreach($reasons as $res){
				$res->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Height deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }

	
}
