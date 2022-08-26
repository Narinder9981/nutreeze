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

use AdminBundle\Entity\Returnpolicymaster;

class PolicyController extends BaseController
{
	//private $upload_doc_dir = "/bundles/design/uploads/about_us/";		
	
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
     * @Route("/return-policy")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$live_path = $this->container->getParameter('live_path');
		$return_policy =  null;
		
		$policy = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Returnpolicymaster')->findBy(array('is_deleted'=>0));
		
		if($policy){
			foreach($policy as $policy){
				$return_policy [] = array('main_policy_id'=>$policy->getMain_policy_id(),
											 'description'=>$policy->getDescription(),
											 'language_id'=>$policy->getLanguage_id()
											); 
			}
		}
		// print_r($return_policy);exit;
		return array('return_policy'=>$return_policy,'language_list'=>$languages);		
    }
	
    /**
     * @Route("/saveReturnpolicymaster")
     * @Template()
     */
    public function savepolicyAction(Request $req)
    {
	
		$entity = $this->getDoctrine()->getManager();
		
		// begin transaction and suspend auto commit
		$entity->getConnection()->beginTransaction();
		
		$lang_id = $req->request->get('language_id');
		$main_policy_id = $req->request->get('main_policy_id');
		$description = $req->request->get('description');

		$policy_check = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Returnpolicymaster')->findOneBy(array('main_policy_id'=>$main_policy_id,'is_deleted'=>0,'language_id'=>$lang_id));
		
		
		try{		
								
			if($policy_check){
					
					$policy_check->setDescription($description);
					$entity->flush();
					
					
					$entity->getConnection()->commit();
					$entity->clear();
					
				$this->get('session')->getFlashBag()->set('success_msg','Policy Updated Successfully');
				return $this->redirectToRoute('admin_policy_index');					
			}else{
					$returnPolicy = new Returnpolicymaster();
					$returnPolicy->setDescription($description);
					$returnPolicy->setIs_deleted(0);
					$returnPolicy->setLanguage_id($lang_id);
					$returnPolicy->setMain_policy_id($main_policy_id);		

					$returnPolicy->setCreated_date(date('Y-m-d H:i:s'));
					$returnPolicy->setLast_updated(date('Y-m-d H:i:s'));
					
					$entity->persist($returnPolicy);
					$entity->flush();
					
					if($main_policy_id == 0){
						$main_policy_id = $returnPolicy->getReturn_policy_master_id();						
					}
				
					$returnPolicy->setMain_policy_id($main_policy_id);	
					$entity->flush();			
				
					//update image for all language about_us
					$policy_check_all = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Returnpolicymaster')->findBy(array('main_policy_id'=>$main_policy_id,'is_deleted'=>0));

					// manual commit
					$entity->getConnection()->commit();
					$entity->clear();
					
					$this->get('session')->getFlashBag()->set('success_msg','Policy Inserted Successfully');
					return $this->redirectToRoute('admin_policy_index');									
			}
		}catch(\Exception $e){
			echo $e->getMessage();exit;				
		}		
	}	
}
