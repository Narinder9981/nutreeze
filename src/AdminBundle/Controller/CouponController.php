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

use AdminBundle\Entity\Couponmaster;
use AdminBundle\Entity\Couponcategorymaster;

class CouponController extends BaseController
{
	
	public function __construct() {
        parent::__construct();
        $obj = new BaseController();
		$obj->chksessionAction();
		
		$session = new Session();
        if(in_array($session->get('role_id'), [1,8])){
            // allow - Superadmin
        } else {

            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }
	
	/**
     * @Route("/coupon/report/{main_coupon_id}", defaults={"main_coupon_id":"0"})
     * @Template()
     */
    public function couponreportAction($main_coupon_id)
    {
		// $_sql = "SELECT * from coupon_master where coupon_master_id = {$main_coupon_id}";
		$_sql = "SELECT c.*, cat.coupon_category_name from coupon_master c, coupon_category_master cat where cat.main_coupon_category_id = c.coupon_category_id and c.is_deleted = 0 and cat.is_deleted = 0 and coupon_master_id = {$main_coupon_id}";
		$coupon = $this->firequery($_sql);

		$_query = "SELECT coupon_id, u.user_master_id, CONCAT(u.user_firstname, ' ', u.user_lastname) as user_full_name, user_mobile, email, count(usage_count) as total_usage FROM coupon_usage_history c, order_master o, user_master u where c.order_id = o.order_master_id and o.order_by = u.user_master_id and coupon_id = {$main_coupon_id} and o.is_deleted = 0 and c.is_deleted = 0 and u.is_deleted = 0 and order_status != 'pending' group by u.user_master_id";
		$coupon_report = $this->firequery($_query);

		return array(
			'coupon' => $coupon,
			'coupon_report' => $coupon_report,
			'main_coupon_id' => $main_coupon_id
		);
	}

	/**
     * @Route("/coupon/usage/{main_coupon_id}/{user_master_id}", defaults={"main_coupon_id":"0","user_master_id":"0"})
     * @Template()
     */
    public function couponusageAction($main_coupon_id, $user_master_id)
    {
		// $_sql = "SELECT * from coupon_master where coupon_master_id = {$main_coupon_id}";
		$_sql = "SELECT c.*, cat.coupon_category_name from coupon_master c, coupon_category_master cat where cat.main_coupon_category_id = c.coupon_category_id and c.is_deleted = 0 and cat.is_deleted = 0 and coupon_master_id = {$main_coupon_id}";
		$coupon = $this->firequery($_sql);

		$_sql = "SELECT * from user_master where user_master_id = {$user_master_id}";
		$user = $this->firequery($_sql);

		$_query = "SELECT c.*, order_master_id, unique_no, package_amount, promo_code_discount, payment_amount, c.create_date as date_of_use  FROM coupon_usage_history c, order_master o WHERE o.order_master_id = c.order_id and order_status != 'pending' and coupon_id = {$main_coupon_id} AND user_master_id = {$user_master_id}";
		$coupon_usage = $this->firequery($_query);

		return array(
			'user' => $user,
			'coupon' => $coupon,
			'coupon_usage' => $coupon_usage,
			'main_coupon_id' => $main_coupon_id
		);
	}

    /**
     * @Route("/coupon")
     * @Template()
     */
    public function indexAction()
    {
		
		$where_clause = '';
		$main_coupon_category_id = 0;
		if(isset($_REQUEST['main_coupon_category_id'])){
			if($_REQUEST['main_coupon_category_id'] != ''){
				$main_coupon_category_id = $_REQUEST['main_coupon_category_id'];
				$where_clause .= " AND main_coupon_category_id = {$main_coupon_category_id} ";
			}
		}

		$domain_id = 1;
		$languages = $this->getLanguages();
		$coupon_details =  null;
		// $coupon_details = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponmaster')->findBy(array('is_deleted'=>0));
		
		$_sql = "SELECT * from coupon_category_master where is_deleted = 0 group by main_coupon_category_id";
		$coupon_category = $this->firequery($_sql);

		$_sql = "SELECT c.*, cat.coupon_category_name from coupon_master c, coupon_category_master cat where cat.main_coupon_category_id = c.coupon_category_id and c.is_deleted = 0 and cat.is_deleted = 0 {$where_clause} order by coupon_master_id desc";
		$coupon_details = $this->firequery($_sql);

		return array(
			'coupon_details'=>$coupon_details,
			'coupon_category'=>$coupon_category,
			'language_list'=>$languages,
			'main_coupon_category_id' => $main_coupon_category_id 
		);
	}

	/**
     * @Route("/coupon/addCouponCategory/{main_coupon_category_id}", defaults={"main_coupon_category_id"="0"})
     * @Template()
     */
    public function addcouponcategoryAction($main_coupon_category_id)
    {
		if($main_coupon_category_id != 0){
			$language_id = 1;
			$_sql = "SELECT * from coupon_category_master where is_deleted = 0 and main_coupon_category_id = {$main_coupon_category_id} and language_id = {$language_id} group by main_coupon_category_id";
			$coupon_category = $this->firequery($_sql);

			if(!empty($coupon_category)){
				$coupon_category = $coupon_category[0];
			}
		}

		return array(
			'coupon_category' => $coupon_category,
			'main_coupon_category_id' => $main_coupon_category_id
		);
	}
	
	/**
     * @Route("/coupon/saveCouponCategory")
     * @Template()
     */
    public function saveCouponCategoryAction(Request $request)
    {
		$postData = $_POST;

		if(!empty($postData)){
			$main_coupon_category_id = $postData['main_coupon_category_id'];
			$coupon_category_name = $postData['coupon_category_name'];
			$description = $postData['description'];
			$language_id = isset($postData['language_id']) ? $postData['language_id'] : 1;
			$status = isset($postData['status']) ? $postData['status'] : 'active';

			$entity = $this->getDoctrine()->getManager();
			$coupon_category = null;
			if($main_coupon_category_id != 0){
				$coupon_category = $entity->getRepository("AdminBundle:Couponcategorymaster")->findOneBy([
					'main_coupon_category_id' => $main_coupon_category_id,
					'is_deleted' => 0
				]);
			}

			$isInsert = false;
			if(empty($coupon_category)){
				$isInsert = true;
				$coupon_category = new Couponcategorymaster();
			}

			$coupon_category->setCoupon_category_name($coupon_category_name);
			$coupon_category->setDescription($description);
			$coupon_category->setLanguage_id($language_id);
			$coupon_category->setStatus($status);
			$coupon_category->setCreated_datetime(date('Y-m-d H:i:s'));
			$coupon_category->setIs_deleted(0);

			if($isInsert){
				// $coupon_category->setMain_coupon_category_id(0);
				$entity->persist($coupon_category);
				$entity->flush();
				
				$main_coupon_category_id = $coupon_category->getCoupon_category_master_id();
				$coupon_category->setMain_coupon_category_id($main_coupon_category_id);
				$entity->flush();

				$this->get('session')->getFlashBag()->set('success_msg','Coupon Category Saved successfully');
			} else {

				$entity->flush();
				$this->get('session')->getFlashBag()->set('success_msg','Coupon Category Upadated successfully');
			}
		}

		// $referer = $request->headers->get('referer');
		return $this->redirect($this->generateUrl('admin_coupon_categorylist'));
	}

	/**
     * @Route("/coupon/category")
     * @Template()
     */
    public function categorylistAction()
    {
		// $languages = $this->getLanguages();
		$_sql = "SELECT * from coupon_category_master where is_deleted = 0 group by main_coupon_category_id";
		$coupon_category = $this->firequery($_sql);

		return array(
			'coupon_category' => $coupon_category
		);
	}
	
	 /**
     * @Route("/coupon/addcoupon/{main_coupon_id}",defaults={"main_coupon_id"="0"})
     * @Template()
     */
    public function addcouponAction($main_coupon_id)
    {
		$coupon_details = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponmaster')->findBy(array('coupon_master_id'=>$main_coupon_id,'is_deleted'=>0));
		$live_path = $this->container->getParameter('live_path');
		
		if(!empty($coupon_details)){
			foreach($coupon_details as $key=>$value){
				$coupon_image_id = $value->getCoupon_image_id();
				$coupon_details[$key]->media_url = $this->getmediaAction($coupon_image_id);
			}
		}

		$sql = "SELECT * from coupon_category_master where is_deleted = 0 group by main_coupon_category_id";
		$coupon_category = $this->firequery($sql);

		return array(
			'main_coupon'=>$coupon_details,
			'coupon_category' => $coupon_category
		);
	}
	/**
     * @Route("/coupon/savecoupon")
     */
	public function savecouponAction(Request $req){
		$em = $this->getDoctrine()->getManager();
		
		if($req->request->get('submit') != null){
			$coupon_name = $req->request->get('coupon_name');
			$coupon_code = $req->request->get('coupon_code');
			$no_of_users_use = $req->request->get('no_of_users_use');
			$no_of_times_use = $req->request->get('no_of_times_use');
			$start_date = $req->request->get('start_date');
			$end_date = $req->request->get('end_date');
			$discount_type = $req->request->get('discount_type');
			$discount_amount = $req->request->get('discount_amount');
			$minimum_amount = $req->request->get('minimum_amount');
			$loyalty_points = $req->request->get('loyalty_points');
			$status = $req->request->get('status');
			$coupon_master_id = $req->request->get('coupon_master_id');
			$coupon_category_id = $req->request->get('coupon_category_id');
			// $file_name1 = $_FILES['coupon_image']['name'];
			// $tmp_name1 = $_FILES['coupon_image']['tmp_name'];	
			$media_type_id = 1; 
			$media_type = 'img';
			
			$coupon_image = 0;
			
			// $upload_dir = $this->container->getParameter('absolute_path')."/bundles/uploads/coupon/";
			// if(!empty($_FILES['coupon_image']) && $_FILES['coupon_image']['size'] >0 ){
			// 	$coupon_image = $this->mediauploadAction($file_name1,$tmp_name1,"/bundles/uploads/coupon/",$upload_dir,$media_type_id);					
			// }

			if(!empty($coupon_master_id)){
				$coupon_details = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponmaster')->findOneBy(array('coupon_master_id'=>$coupon_master_id,'is_deleted'=>0));
			}else{
				$coupon_details = new Couponmaster();				
			}
			$coupon_details->setCoupon_name($coupon_name);
			$coupon_details->setCoupon_code($coupon_code);
			$coupon_details->setStart_date($start_date);
			$coupon_details->setEnd_date($end_date);
			$coupon_details->setDiscount_value($discount_amount);
			$coupon_details->setDiscount_type($discount_type);
			$coupon_details->setNo_of_users_use($no_of_users_use);
			$coupon_details->setNo_of_times_use($no_of_times_use);
			$coupon_details->setCoupon_usage_interval(0);
			$coupon_details->setCoupon_category_id($coupon_category_id);
			$coupon_details->setLoyalty_points($loyalty_points);
			$coupon_details->setMinimum_amount($minimum_amount);
			$coupon_details->setCoupon_image_id($coupon_image);
			$coupon_details->setStatus($status);
			$coupon_details->setCreated_datetime(date('Y-m-d H:i:s'));
			$coupon_details->setIs_deleted(0);
			$em->persist($coupon_details);
			$em->flush();
			if(!empty($coupon_master_id)){
				$this->get('session')->getFlashBag()->set('success_msg','Coupon Upadated successfully');
			}else{
				$this->get('session')->getFlashBag()->set('success_msg','Coupon Inserted successfully');
			}
			return $this->redirectToRoute('admin_coupon_index');
		}
		return $this->redirectToRoute('admin_coupon_index');
	}

	/**
     * @Route("/coupon/deleteCoupon/{main_coupon_id}",defaults={"main_coupon_id"="0"})
     * @Template()
     */
    public function deletecouponAction($main_coupon_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$coupon = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Couponmaster")->findBy(array('coupon_master_id'=>$main_coupon_id,'is_deleted'=>0));	
		
		if($coupon){
				
			foreach($coupon as $coupon){
				$coupon->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Coupon deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);
	}
	/**
     * @Route("/changeCouponStatus")
     * @Template()
     */
	public function changecouponstatusAction(Request $req){
		$domain_id = $this->get('session')->get('domain_id');
	
		$id = $req->request->get('main_coupon_id');
		$status = $req->request->get('status');
		
		$em = $this->getDoctrine()->getManager();
		
		
		$coupon_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponmaster')->findBy(array(
																	'is_deleted'=>0,
																	'coupon_master_id'=>$id
																	)
																);
		if($coupon_master){
			foreach($coupon_master as $coupon_master){
				if($status == 'true'){
					$coupon_master->setStatus('active');
				}else{
					$coupon_master->setStatus('inactive');					
				}
				$em->flush();
			}
		}
		
		return new Response('done');
	}	

	/**
     * @Route("/coupon/sendMailToUser/{main_coupon_id}",defaults={"main_coupon_id"="0"})
     * @Template()
     */
    public function sendMailToUsersAction($main_coupon_id,Request $req)
    {
		$coupon_details = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Couponmaster')->findOneBy(array('coupon_master_id'=>$main_coupon_id,'is_deleted'=>0));
	
		$min_loyalty_points = $coupon_details->getLoyalty_points();

		$discount_value  = $coupon_details->getDiscount_value();
		$discount_type  = $coupon_details->getDiscount_type();
		$coupon_name  = $coupon_details->getCoupon_name();
		$coupon_code  = $coupon_details->getCoupon_code();

		$sql_get_users = "select email from user_master where loyalty_points > '$min_loyalty_points' and is_deleted = 0 ";

		$user_selected = $this->fireQuery($sql_get_users);	

		if(!empty($user_selected)){
			foreach($user_selected as $user){
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				// More headers
				$headers .= 'From: Admin - Nutrezee' . "\r\n";
				
				$message = "Hello , as per your loyalty points now you can use this Following Coupon code for Purachase Package.</br>";
				$message .= "Coupon Name : ".$coupon_name." </br>";
				$message .= "Coupon Code : ".$coupon_code." </br>";
				$message .= "Discount : ".$discount_value."-".$discount_type."";


				@mail($user['email'],"Coupon Redemption",$message,$headers);
							

			}
		}

		$this->get('session')->getFlashBag()->set('success_msg','Coupon Send successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);
	}
}
