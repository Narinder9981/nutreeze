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

use AdminBundle\Entity\Allergymaster;

class AllergiesController extends BaseController
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
     * @Route("/allergies")
     * @Template()
     */
    public function indexAction(Request $req) {
        $languages = $this->getLanguages();
        $sql = "select allergy_master_id,name,name_ar,status from allergies_master where is_deleted = 0";
        $main_allergies = $this->fireQuery($sql);
        $allergies = null;
        //	print($sql);exit;
        if (!empty($main_allergies)) {
            foreach ($main_allergies as $allergy_) {

                $lang_wise = null;

                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select name,language_id from allergies_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and allergy_master_id = '" . $allergy_['allergy_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_wise[] = array('name' => $lang_goal[0]['name'], 'lang_id' => $lang->getLanguage_master_id());
                        } else {
                            $lang_wise[] = array('name' => '-', 'lang_id' => $lang->getLanguage_master_id());
                        }
                    }
                }
               
				$allergies[] = array(
					'allergy_master_id' => $allergy_['allergy_master_id'],
					'status' => $allergy_['status'],
					'lang_wise' => $lang_wise,
					'name'=>$allergy_['name'],                            
					'name_ar'=>$allergy_['name_ar'],
				);
                
            }
        }
     
		// echo"<pre>";print_r($allergies);exit;
        return array(
            'allergies' => $allergies,
            'languages' => $languages
        );
    }
	
    /**
     * @Route("/allergies/add/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function addAction($main_id)
    {
		$main_allergies = null;
		$languages = $this->getLanguages();
		if(!empty($main_id)){
			$sql = "select * from allergies_master where is_deleted = '0' and allergy_master_id='$main_id'";
		    $main_allergies = $this->fireQuery($sql);
		}	
	
		return array('main_allergies'=>$main_allergies,'language_list'=>$languages);
    }	
	
	/**
     * @Route("/allergies/save")
     * @Template()
     */
	public function saveAction(Request $req) {

        $em = $this->getDoctrine()->getManager();

    //    echo"<pre>";print_r($_REQUEST);exit;
        if ($req->request->get('submit') != null) {
            $name = $req->request->get('name');
            $name_ar = $req->request->get('name_ar');
            $status = $req->request->get('status');
            $language_id = $req->request->get('language_id');
			$allergy_master_id = $req->request->get('allergy_master_id');
            #check Allergymaster
			$allergy =[];
			if(!empty($allergy_master_id)){
				$allergy = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Allergymaster")->findOneBy(array('allergy_master_id' => $allergy_master_id, 'language_id' => $language_id, 'is_deleted' => 0));
				// echo"<pre>";print_r($allergy);exit;
			}            

            if ($allergy) {
                $allergy->setName($name);
                $allergy->setName_ar($name_ar);
                $allergy->setStatus($status);
                $em->flush();

                $all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Allergymaster")->findBy(array('allergy_master_id' => $allergy_master_id, 'is_deleted' => 0));

                $this->get('session')->getFlashBag()->set('success_msg', 'Allergies Upadated successfully');
            } else {
				// die('2');
                $allergy_new = new Allergymaster();
                $allergy_new->setName($name);
                $allergy_new->setName_ar($name_ar);
                $allergy_new->setStatus($status);
                $allergy_new->setLanguage_id($language_id);
                $allergy_new->setIs_deleted(0);
                $allergy_new->setCreated_datetime(date('Y-m-d H:i:s'));

                $em->persist($allergy_new);
                $em->flush();

                $this->get('session')->getFlashBag()->set('success_msg', 'Allergies inserted successfully');
            }


            return $this->redirectToRoute('admin_allergies_index');
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_default_index');
        }
    }

    /**
     * @Route("/allergies/delete/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function deleteAction($main_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Allergymaster")->findBy(array('allergy_master_id'=>$main_id,'is_deleted'=>0));	
		
		if($goal_all_lang){
			foreach($goal_all_lang as $lang_goal){
				$lang_goal->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Allergies deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }	

	/**
     * @Route("/allergies/changeStatus")
     * @Template()
     */
    public function changestatusAction(Request $req) {
        $domain_id = $this->get('session')->get('domain_id');

        $id = $req->request->get('main_id');
        $status = $req->request->get('status');

        $em = $this->getDoctrine()->getManager();


        $allergy_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Allergymaster')->findBy(array(
            'is_deleted' => 0,
            'allergy_master_id' => $id
                )
        );
        if ($allergy_master) {
            foreach ($allergy_master as $allergy_master) {
                if ($status == 'true') {
                    $allergy_master->setStatus('active');
                } else {
                    $allergy_master->setStatus('inactive');
                }
                $em->flush();
            }
        }

        return new Response('done');
    }
}
