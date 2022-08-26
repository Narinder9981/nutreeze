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

use AdminBundle\Entity\Countrymaster;

class CountryController extends BaseController
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
     * @Route("/country")
     * @Template()
     */
    public function indexAction()
    {
		$languages = $this->getLanguages();
		$country_details = array();
		
		$con = $this->getDoctrine()->getManager()->getConnection();
		
		$main_gov_sql = "select main_country_id from country_master where is_deleted = 0 group by main_country_id";
		$stmt = $con->prepare($main_gov_sql);
		$stmt->execute();
		$main_gov = $stmt->fetchAll();

//		echo"<pre>";print_r($main_city);exit;
		if(!empty($main_gov)){
			
			foreach($main_gov as $gov){
				$lang_wise = array();
				$main_country_id = $gov['main_country_id'];				
				
				if(!empty($languages)){
					foreach($languages as $lang){
						$gov_sql = "select * from country_master where is_deleted = 0 and language_id = ".$lang->getLanguage_master_id()." and main_country_id = ".$main_country_id;
						$stmt = $con->prepare($gov_sql);
						$stmt->execute();
						$gov_detail = $stmt->fetchAll();
						
						if(!empty($gov_detail)){
							$lang_wise [] = array('lang_id'=>$lang->getLanguage_master_id(),'country_name'=>$gov_detail[0]['country_name']);
						}else{
							$lang_wise [] = array('lang_id'=>$lang->getLanguage_master_id(),'country_name'=>'-');							
						}
					}
				}
				
				$country_details[] = array('main_country_id'=>$main_country_id,
										'lang_wise'=>$lang_wise,
										);				
			}			
		}
//		echo"<pre>";print_r($country_details);exit;
		return array('country_details'=>$country_details,'language_list'=>$languages);
    }
	
    /**
     * @Route("/addCountry/{country_id}",defaults={"country_id"="0"})
     * @Template()
     */
    public function addcountryAction($country_id)
    {
		$languages = $this->getLanguages();
		
		$con = $this->getDoctrine()->getManager()->getConnection();
		
		$main_gov_sql = "select * from country_master where is_deleted = 0  and main_country_id=$country_id";
		$stmt = $con->prepare($main_gov_sql);
		$stmt->execute();
		$country = $stmt->fetchAll();

//		echo"<pre>";print($main_city_sql);exit;
		return array('country'=>$country,'language_list'=>$languages);
    }
	
    /**
     * @Route("/saveCountry")
     * @Template()
     */
    public function savecountryAction(Request $req){
		
		// begin transaction and suspend auto commit
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = 1;
		
		if($req->request->get('submit') != NULL){
			
			$lang_id = $req->request->get('language_id');
			$country_name = $req->request->get('country_name');
			$main_country_id = $req->request->get('main_country_id');
			$code = $req->request->get('code');
			
			$gov_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Countrymaster")->findOneBy(array('language_id'=>$lang_id,
																													'main_country_id'=>$main_country_id,
																													'is_deleted'=>0
																													)
																													);
																													
			if($gov_check){

				$gov_check->setCountry_name($country_name);
				$entity->flush();
				//code for all language_id
			$gov_check_all = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Countrymaster")->findBy(array(
																													'main_country_id'=>$main_country_id,
																													
																													'is_deleted'=>0
																													)
																													);
				if($gov_check_all){
					foreach($gov_check_all as $gov_lang){
						$gov_lang->setStd_code($code);
						$entity->flush();
					}
				}																										

				$this->get('session')->getFlashBag()->set('success_msg','Country updated Succesfully');	
			}else{
				
				$new_gov = new Countrymaster();
				$new_gov->setCountry_name($country_name);
				$new_gov->setLanguage_id($lang_id);
				$new_gov->setMain_country_id(0);
				$new_gov->setDomain_id(1);
				$new_gov->setStd_code($code);
				$new_gov->setIs_deleted(0);
				
				$entity->persist($new_gov);
				$entity->flush();
				
				if($main_country_id == 0){
					$main_country_id = $new_gov->getCountry_id();
				}
				
				$new_gov->setMain_country_id($main_country_id);
				$entity->flush();			

				$this->get('session')->getFlashBag()->set('success_msg','Country added Succesfully');	
			}																										

			// manual commit
			$entity->getConnection()->commit();
			$entity->clear();

			return $this->redirectToRoute('admin_country_index',array('domain'=>$this->get('session')->get('domain')));
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');			
			return $this->redirectToRoute('admin_dashboard_index',array('domain'=>$this->get('session')->get('domain')));		
		}		
    }
	
    /**
     * @Route("/deleteCountry/{country_id}",defaults={"country_id" = "0"})
     * @Template()
     */
    public function deletecountryAction($country_id){
		
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = 1;
		
		$gov_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Countrymaster")->findBy(array(
																												'main_country_id'=>$country_id,
																												'is_deleted'=>0
																												)
																												);
																												
		if($gov_check){
			foreach($gov_check as $gov_check){
				$gov_check->setIs_deleted(1);				
				$entity->flush();			
			}
			
			$this->get('session')->getFlashBag()->set('success_msg','Country deleted Succesfully');	
		}
		
		
		// manual commit
		$entity->getConnection()->commit();
		$entity->clear();		
		
		return $this->redirectToRoute('admin_country_index');

			
    }
	
}
