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
use AdminBundle\Entity\Generalsetting;

class GeneralSettingsController extends BaseController
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
     * @Route("/settings")
     * @Template()
     */
    public function indexAction()
    {
		
		$con = $this->getDoctrine()->getManager()->getConnection();
		
		$sql = "SELECT * FROM `general_setting` where general_setting_key = 'app_info' and is_deleted = 0";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$settings = $stmt->fetchAll();
		$response = null;			
		// 
		
		if($settings)
		{
			foreach($settings as $key=>$val)
			{
				$appdata = json_decode($val['general_setting_value']);
				if(!empty($appdata)){
				
					$response = array(
					'email'=>$appdata[0]->data->email,
					'mobile'=>$appdata[0]->data->phone_no,
					'social_links'=>array('facebook_link'=>$appdata[0]->data->facebook_link,'twitter_link'=>$appdata[0]->data->twitter_link,'google_link'=>$appdata[0]->data->google_link,'linkedin_link'=>$appdata[0]->data->linkedin_link,'whatsapp_link'=>$appdata[0]->data->whatsapp_link)
					);
					
				}
			}
		}
//		echo"<pre>";print_r($response);exit;
		return array('response'=>$response);
    }
	
    /**
     * @Route("/saveSetting")
     * @Template()
     */
    public function savesettingAction(Request $req)
    {
		$domain_id = 1;
		
		$entity = $this->getDoctrine()->getManager();
		
		// begin transaction and suspend auto commit
		$entity->getConnection()->beginTransaction();
		
		$email = $req->request->get('email');
		$mobile = $req->request->get('mobile');
		$facebook_link = $req->request->get('facebook_link_selected');
		$google_link = $req->request->get('google_link_selected');
		$twitter_link = $req->request->get('twitter_link_selected');
		$linkedin_link = $req->request->get('linkedin_link_selected');
		$whatsapp_link = $req->request->get('whatsapp_link');

		$general_setting = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Generalsetting')->findOneBy(array('general_setting_key'=>'app_info','is_deleted'=>0));
		
		
		try{
					
			$new_data[] = array('language_id'=>'1','data'=>array('address'=>'','email'=>$email,'phone_no'=>$mobile,'facebook_link'=>$facebook_link,'twitter_link'=>$twitter_link,'google_link'=>$google_link,'linkedin_link'=>$linkedin_link,'whatsapp_link'=>$whatsapp_link));
					
			if($general_setting){
					
					$general_setting->setGeneral_setting_value(json_encode($new_data));
					
					$entity->flush();
					$entity->getConnection()->commit();
					$entity->clear();
					
				$this->get('session')->getFlashBag()->set('success_msg','App info Updated Successfully');
				return $this->redirectToRoute('admin_generalsettings_index',array('domain'=>$this->get('session')->get('domain')));					
			}else{
					$new_about = new Generalsetting();
					$new_about->setGeneral_setting_key('app_info');
					$new_about->setGeneral_setting_value(json_encode($new_data));
					$new_about->setIs_deleted(0);

					$new_about->setDomain_id($domain_id);
					
					$entity->persist($new_about);
					$entity->flush();
								
					// manual commit
					$entity->getConnection()->commit();
					$entity->clear();
					
					$this->get('session')->getFlashBag()->set('success_msg','App info Inserted Successfully');
					return $this->redirectToRoute('admin_generalsettings_index',array('domain'=>$this->get('session')->get('domain')));									
			}
		}catch(\Exception $e){
			echo $e->getMessage();exit;				
		}		
	}	
}
