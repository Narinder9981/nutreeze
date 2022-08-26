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

use AdminBundle\Entity\Festivalmaster;

class FestivalController extends BaseController
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
     * @Route("/festival")
     * @Template()
     */
    public function indexAction(){
		
		$domain_id = $this->get('session')->get('domain_id');
				
//		echo"<pre>";print_r($city_list_details);exit;
		$sql = "select * from festival_master where is_deleted = 0";
		$festival_list = $this->firequery($sql);
		
		$response = array();
		$response = $festival_list;
		// if(!empty($festival_list)){
			
		// 	foreach($festival_list as $_festival){
		// 		// get language wise data
				
		// 		$response[] = $_festival;
		// 	}
		// }
//		echo"<pre>";print_r($response);exit;
		return array(
			'festival_list' => $response,
			'language_list' => $this->getLanguages()
		);
    }
	
    /**
     * @Route("/festival/addFestival/{festival_master_id}",defaults={"festival_master_id" = "0"})
     * @Template()
     */
    public function addfestivalAction($festival_master_id){
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		$_sql = "select * from festival_master where festival_master_id = {$festival_master_id} and is_deleted= 0";
		$festival = $this->firequery($_sql);

		return array(
			'festival' => $festival,
		);
    }
	
    /**
     * @Route("/deleteFestival/{festival_master_id}",defaults={"festival_master_id" = "0"})
     * @Template()
     */
    public function deletefestivalAction($festival_master_id){
		
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		$festival_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Festivalmaster")->findOneBy(array(
																												'festival_master_id'=>$festival_master_id,
																												'is_deleted'=>0
																												)
																												);
																												
		if($festival_check){
				$festival_check->setIs_deleted(1);				
				$entity->flush();
			
			$this->get('session')->getFlashBag()->set('success_msg','Festival deleted Succesfully');	
		}
		
		
		// manual commit
		$entity->getConnection()->commit();
		$entity->clear();		
		
		return $this->redirectToRoute('admin_festival_index');

			
    }
	
	
    /**
     * @Route("/saveFestival")
     * @Template()
     */
    public function savefestivalAction(Request $req){
		
		// begin transaction and suspend auto commit
		$entity = $this->getDoctrine()->getManager();
		$entity->getConnection()->beginTransaction();
		
		$response = array();
		$domain_id = $this->get('session')->get('domain_id');
		
		if($req->request->get('submit') != NULL){
			
			$festival_name_english = $req->request->get('festival_name_english');
			$festival_name_arabic = $req->request->get('festival_name_arabic');
			$start_date = $req->request->get('start_date');
			$end_date = $req->request->get('end_date');
			$festival_master_id = $req->request->get('festival_master_id');

			// $start_date = date('Y-m-d', strtotime($start_date));
			// $end_date = date('Y-m-d', strtotime($end_date));

			// $flag = false;
			// $sql = "SELECT * from festival_master where is_deleted = 0 and start_date like '{$start_date}' and end_date like '{$start_date}'";
			// // $sql = "SELECT * from festival_master where is_deleted = 0 and start_date <= '{$start_date}' and end_date >= '{$start_date}' or start_date <= '{$end_date}' and end_date >= '{$end_date}' or start_date >= '{$start_date}' and end_date <= '{$end_date}'";
			// $check_for_festival = $this->firequery($sql);

			// if(!empty($check_for_festival)) {
			// 	$flag = true;                     
			// }

			// if($flag = false) {
				//check festival
				$festival_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Festivalmaster")->findOneBy(array(
					'festival_master_id'=>$festival_master_id,
					'is_deleted'=>0
					)
					);
								
				if($festival_check){

					$festival_check->setFestival_name_english($festival_name_english);
					$festival_check->setFestival_name_arabic($festival_name_arabic);
					$festival_check->setStart_date($start_date);
					$festival_check->setEnd_date($end_date);
					$entity->flush();																											

					$this->get('session')->getFlashBag()->set('success_msg','Festival updated Succesfully');	
					}else{

					$new_festival = new Festivalmaster();
					$new_festival->setFestival_name_english($festival_name_english);
					$new_festival->setFestival_name_arabic($festival_name_arabic);
					$new_festival->setStart_date($start_date);
					$new_festival->setEnd_date($end_date);
					$new_festival->setStatus('active');
					$new_festival->setIs_deleted(0);	

					$entity->persist($new_festival);
					$entity->flush();

					$this->get('session')->getFlashBag()->set('success_msg','Festival added Succesfully');	
				}
			// } else {
			// 	$this->get('session')->getFlashBag()->set('error_msg','Another frestival is on same date');	
			// }																										

			// manual commit
			$entity->getConnection()->commit();
			$entity->clear();

			return $this->redirectToRoute('admin_festival_index');
		}else{
			$this->get('session')->getFlashBag()->set('error_msg','Something went wrong');			
			return $this->redirectToRoute('admin_dashboard_index');		
		}		
    }
	
    /**
     * @Route("/changeFestivalStatus")
     * @Template()
     */
    public function changefestivalstatusAction(Request $req)
    {
		$domain_id = $this->get('session')->get('domain_id');
	
		$id = $req->request->get('festival_master_id');
		$status = $req->request->get('status');
		
		$em = $this->getDoctrine()->getManager();
		
		
		$festival = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Festivalmaster')->findOneBy(array(
																	'is_deleted'=>0,
																	'festival_master_id'=>$id
																	)
																);
		if($festival){
			if($status == 'true'){
				$festival->setStatus('active');
			}else{
				$festival->setStatus('inactive');					
			}
			$em->flush();
		}
		
		return new Response('done');
	
    }
	
	
	
}