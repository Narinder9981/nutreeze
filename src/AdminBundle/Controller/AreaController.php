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

use AdminBundle\Entity\Areamaster;

class AreaController extends BaseController
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
     * @Route("/area")
     * @Template()
     */
    public function indexAction(){
		
		$domain_id = $this->get('session')->get('domain_id');
				
//		echo"<pre>";print_r($city_list_details);exit;
		$sql = "select * from area_master where is_deleted = 0 group by main_area_id";
		$area_list = $this->firequery($sql);
		
		$response = array();
		if(!empty($area_list)){
			
			foreach($area_list as $_area){
				// get language wise data
				$_sql = "select area_name, language_id from area_master where main_area_id = {$_area['main_area_id']} order by language_id";
				$lang_area = $this->firequery($_sql);
				
				$lang_array = array();
				if(!empty($lang_area)){
					foreach($lang_area as $_lang){						
						$lang_array[] = array(
							'area_name' => $_lang['area_name'],
							'language_id' => $_lang['language_id'],
						);
					}
				}
				
				$_area['lang_array'] = $lang_array;
				
				$response[] = $_area;
			}
		}
//		echo"<pre>";print_r($response);exit;
		return array(
			'area_list' => $response,
			'language_list' => $this->getLanguages()
		);
    }
	
    /**
     * @Route("/area/addArea/{main_area_id}",defaults={"main_area_id" = "0"})
     * @Template()
     */
    public function addareaAction($main_area_id){
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		$_sql = "select * from area_master where main_area_id = {$main_area_id} and is_deleted= 0";
		$lang_area = $this->firequery($_sql);

		$_sql_city = "select * from city_master where is_deleted= 0";
		$city_master = $this->firequery($_sql_city);

		return array(
			'area' => $lang_area,
			"city_list" => $city_master,
			'language_list' => $this->getLanguages(),
		);
    }
	
    /**
     * @Route("/deleteArea/{main_area_id}",defaults={"main_area_id" = "0"})
     * @Template()
     */
    public function deleteareaAction($main_area_id){
		
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		$area_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Areamaster")->findBy(array(
																												'main_area_id'=>$main_area_id,
																												'is_deleted'=>0
																												)
																												);
																												
		if($area_check){
			foreach($area_check as $area_check){
				$area_check->setIs_deleted(1);				
				$entity->flush();			
			}
			
			$this->get('session')->getFlashBag()->set('success_msg','Area deleted Succesfully');	
		}
		
		
		// manual commit
		$entity->getConnection()->commit();
		$entity->clear();		
		
		return $this->redirectToRoute('admin_area_index');

			
    }
	
	
    /**
     * @Route("/saveArea")
     * @Template()
     */
    public function saveareaAction(Request $req){
		
		// begin transaction and suspend auto commit
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		if($req->request->get('submit') != NULL){
			
			$lang_id = $req->request->get('language_id');
			$area_name = $req->request->get('area_name');
			$delivery_charge = $req->request->get('delivery_charge');
			$main_area_id = $req->request->get('main_area_id');
			$city = $req->request->get('city');
		//	$city = 0 ;
			$pincode = $req->request->get('pincode');
			
			//check area
			$area_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Areamaster")->findOneBy(array('language_id'=>$lang_id,
																													'main_area_id'=>$main_area_id,
																													'is_deleted'=>0
																													)
																													);
																													
			if($area_check){

				$area_check->setArea_name($area_name);
				$area_check->setDelivery_charge($delivery_charge);
				$area_check->setArea_code(0);
				$entity->flush();	
				//common_changes
				
				$area_check_all = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Areamaster")->findBy(array(
																														'main_area_id'=>$main_area_id,
																													
																														'is_deleted'=>0
																														)
																														);	
				if($area_check_all){
					foreach($area_check_all as $area_lang){
					
						$area_lang->setCity_id($city);
						$area_lang->setPincode($pincode);
						$area_lang->setDelivery_charge($delivery_charge);
						
						$entity->flush();
					
					}
				}																											

				$this->get('session')->getFlashBag()->set('success_msg','Area updated Succesfully');	
			}else{
				
				$new_area = new Areamaster();
				$new_area->setArea_name($area_name);
				$new_area->setArea_code(0);
				$new_area->setCity_id($city);
				$new_area->setDelivery_charge($delivery_charge);
				$new_area->setLanguage_id($lang_id);
				$new_area->setMain_area_id(0);
				$new_area->setDomain_id(1);
				$new_area->setStatus('active');
				$new_area->setIs_deleted(0);
				$new_area->setPincode($pincode);
				
				$entity->persist($new_area);
				$entity->flush();
				
				if($main_area_id == 0){
					$main_area_id = $new_area->getArea_master_id();
				}
				
				$new_area->setMain_area_id($main_area_id);
				$entity->flush();			

				$this->get('session')->getFlashBag()->set('success_msg','Area added Succesfully');	
			}																										

			// manual commit
			$entity->getConnection()->commit();
			$entity->clear();

			return $this->redirectToRoute('admin_area_index');
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');			
			return $this->redirectToRoute('admin_dashboard_index');		
		}		
    }
	
    /**
     * @Route("/changeAreaStatus")
     * @Template()
     */
    public function changeareastatusAction(Request $req)
    {
		$domain_id = $this->get('session')->get('domain_id');
	
		$id = $req->request->get('main_area_id');
		$status = $req->request->get('status');
		
		$em = $this->getDoctrine()->getManager();
		
		
		$area_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Areamaster')->findBy(array(
																	'is_deleted'=>0,
																	'main_area_id'=>$id
																	)
																);
		if($area_master){
			foreach($area_master as $area_master){
				if($status == 'true'){
					$area_master->setStatus('active');
				}else{
					$area_master->setStatus('inactive');					
				}
				$em->flush();
			}
		}
		
		return new Response('done');
	
    }
	
	
	
}