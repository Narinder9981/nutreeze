<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

use AdminBundle\Entity\Medialibrarymaster;
use AdminBundle\Entity\Addressmaster;
use AdminBundle\Entity\Areamaster;
use AdminBundle\Entity\Citymaster;

use Symfony\Component\HttpFoundation\Request;

class WSBaseController extends Controller {

    public $title = "";
    public $error = "SFND";
    public $error_msg = "";
    public $status = "";
    public $message = "";
    public $data = false;
    public $CUSTOMER_ROLE = 3;
    public $DRIVER_ROLE = 2;
    public $SELECT_MEAL_AFTER_DAYS = 3 ;

    public function __construct() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: authorization");
        date_default_timezone_set("Asia/Kuwait");
    }

    public function requestAction($req, $allowed_method) {
        $request_param = '';
        switch ($req->getMethod()) {
            case 'GET':
                if ($allowed_method != 2) {
                    $request_param = $req->get('param');
                }
                break;
            case 'POST':
                if ($allowed_method != 1) {
                    $request_param = json_encode($req->request->all());
                }
                break;
            default :
                $request_param = array();
                break;
        }
        if (!empty($request_param)) {
            $param = json_decode($request_param);

            if (JSON_ERROR_NONE == json_last_error_msg()) {
                return $param;
            }
        }
        return array();
    }

    public function responseAction() {

        $response = array(
            "title" => $this->title,
            "error" => $this->error,
            "error_msg" => $this->error_msg,
            "status" => $this->status,
            "message" => $this->message,
            "data" => $this->data,
            
        );

        $jsonResponse = new JsonResponse();
        $jsonResponse->setData($response);
        return $jsonResponse;
    }

    public function getOrderDataAction($order_meal_id, $lang_id, $user_id = 0) {

        $order_meal = $this->getDoctrine()->getManager()
                ->getRepository("AdminBundle:Mealproductrelation")
                ->findBy(array("meal_id" => $order_meal_id, "is_deleted" => 0));
        //echo'<pre>';print_r($order_meal);die('test');
        $response = null;

        $sub_package_id = $calory = 0 ;
        $order_meal_relation_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->find($order_meal_id);

        if($order_meal_relation_info){
            $order_master_id = $order_meal_relation_info->getOrder_master_id() ; 
            $order_master_info = $this->getdoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_master_id);
            if($order_master_info){
                $sub_package_id = $order_master_info->getSub_package_id();
            }
        }

        if (!empty($order_meal)) {
            foreach ($order_meal as $key => $val) {
                $meal_id = $val->getMain_product_id();
                $calory = 0 ; 

                $product_combination_master = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findOneBy(array("product_master_id"=> $meal_id , "sub_pakage_id"=>$sub_package_id,"prot_type"=>"calory","is_deleted"=>0));
    
                
    
                if($product_combination_master){
                    $calory = $product_combination_master->getProt_crab() ; 
                }
                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Productmaster")
                        ->findBy(array("language_id" => $lang_id, "main_product_master_id" => $meal_id, "is_deleted" => 0));


                if (empty($get_tc)) {
                    $get_tc = $this->getDoctrine()->getManager()
                            ->getRepository("AdminBundle:Productmaster")
                            ->findBy(array("main_product_master_id" => $meal_id, "is_deleted" => 0));
                }

                if (!empty($get_tc)) {
                    foreach ($get_tc as $key => $val2) {
                        $get_tc_c = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productcombinationmaster")
                                ->findBy(array("product_master_id" => $val2->getMain_product_master_id(), 'language_id' => $lang_id, "is_deleted" => 0));
                        /* $combination=array();
                          if(!empty($get_tc_c)){
                          foreach($get_tc_c as $key1=>$val1){
                          $combination[] = array(
                          'combination_id'=>$val1->getMain_combination_id(),
                          'type'=>$val1->getProt_type(),
                          'name'=>$val1->getProt_crab());
                          }
                          } */

                        $selected_combo = array('prot' => $val->getProteins_amount(), 'crab' => $val->getCarbs_amount(), 'raw_eggs' => $val->getRaw_eggs(), 'white_eggs' => $val->getWhite_eggs());

                        $meal_type_ = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productcategorymaster")
                                ->findOneBy(array("main_product_category_master_id" => $val2->getMain_product_category_id(), 'language_id' => $lang_id, "is_deleted" => 0));

                        $meal_type_ar = null;

                        if (empty($meal_type_)) {
                            $meal_type_ = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productcategorymaster")
                                    ->findOneBy(array("main_product_category_master_id" => $val2->getMain_product_category_id(), "is_deleted" => 0));
                        }

                        if ($meal_type_) {
                            $meal_type_ar = array('main_meal_type_id' => $meal_type_->getMain_product_category_master_id(),
                                'meal_name' => $meal_type_->getProduct_category_name(), 'count_in' => $meal_type_->getCount_in()
                            );
                        }

                        $main_product_id_ = $val2->getMain_product_master_id();
                        $sql_combo_display = "SELECT combo_type from product_combo_display_relation  				
							where is_deleted = '0' and product_id = {$main_product_id_}";
                        $combo_display = $this->fireQuery($sql_combo_display);

                        $display_prot_carb = false;
                        $display_eggs = false;
                        
                        if(empty($combo_display)){
                            $combo_display = null;
                        }else{
                            foreach($combo_display as $_combo_display){
                                if($_combo_display['combo_type'] == 'prot_carb'){
                                    $display_prot_carb = true;
                                }
                                if($_combo_display['combo_type'] == 'eggs'){
                                    $display_eggs = true;
                                }

                            }
                        }


                        $ratings_done_flag = false;

                        if ($user_id != 0) {
                            #check rating done or not $order_meal_id

                            $user_id_ = $val2->getMain_product_master_id();

                            $rating_exist = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productratingmaster")
                                    ->findOneBy(array("user_master_id" => $user_id, "is_deleted" => 0, 'main_product_id' => $main_product_id_, 'product_meal_id' => $order_meal_id));

                            if ($rating_exist) {
                                $ratings_done_flag = true;
                            }
                        }



                        $response[] = array(
                            'meal_id' => $val2->getProduct_master_id(),

                            'calory' => $val2->getCalory(),
                            'fiber' => $val2->getFiber(),
                            'fat' => $val2->getFat(),
                            'prot' => $val2->getProt(),
                            'carb' => $val2->getCarb(),

                            'meal_id' => $val2->getProduct_master_id(),
                            'meal_id' => $val2->getProduct_master_id(),
                           // 'calory' => $calory,
                            'main_meal_id' => $val2->getMain_product_master_id(),
                            'language_id' => $val2->getLanguage_id(),
                            'meal_type' => $val2->getMain_product_category_id(),
                            'meal_name' => $val2->getProduct_name(),
                            'meal_description' => $val2->getProduct_description(),
                            'meal_image' => $this->getMediaDetailAction($val2->getProduct_image()),
                            'rating' => $this->getProductRatings($val2->getMain_product_master_id()),
                            'user_rating' => $this->getProductRatings($val2->getMain_product_master_id(), $order_meal_id),
                            'selected_combo' => $selected_combo,
                            'meal_type_object' => $meal_type_ar,
                            'ratings_done_flag' => $ratings_done_flag,
                            'display_eggs' => $display_eggs,
                            'display_prot_carbs' => $display_prot_carb
                        );
                    }
                }
            }
        }
        return $response;
    }

	 public function getOrderDataSpecificMealTypeAction($order_meal_id, $meal_type_id,$lang_id, $user_id = 0) {

        $order_meal = $this->getDoctrine()->getManager()
                ->getRepository("AdminBundle:Mealproductrelation")
                ->findBy(array("meal_id" => $order_meal_id,"meal_type"=>$meal_type_id, "is_deleted" => 0));

        $response = null;

        $sub_package_id = $calory = 0 ;
        $order_meal_relation_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")->find($order_meal_id);
        if($order_meal_relation_info){
            $order_master_id = $order_meal_relation_info->getOrder_master_id() ; 
            $order_master_info = $this->getdoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->find($order_master_id);
            if($order_master_info){
                $sub_package_id = $order_master_info->getSub_package_id();
                
            }
        }

        if (!empty($order_meal)) {
            foreach ($order_meal as $key => $val) {
                $meal_id = $val->getMain_product_id();
                 $calory = 0 ;
                $product_combination_master = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findOneBy(array("product_master_id"=> $meal_id , "sub_pakage_id"=>$sub_package_id,"prot_type"=>"calory","is_deleted"=>0));
                if($product_combination_master){
                    $calory = $product_combination_master->getProt_crab() ; 
                }
                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Productmaster")
                        ->findBy(array("language_id" => $lang_id, "main_product_master_id" => $meal_id, "is_deleted" => 0));
                if (empty($get_tc)) {
                    $get_tc = $this->getDoctrine()->getManager()
                            ->getRepository("AdminBundle:Productmaster")
                            ->findBy(array("main_product_master_id" => $meal_id, "is_deleted" => 0));
                }

                if (!empty($get_tc)) {
                    foreach ($get_tc as $key => $val2) {
                        $get_tc_c = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productcombinationmaster")
                                ->findBy(array("product_master_id" => $val2->getMain_product_master_id(), 'language_id' => $lang_id, "is_deleted" => 0));
                        /* $combination=array();
                          if(!empty($get_tc_c)){
                          foreach($get_tc_c as $key1=>$val1){
                          $combination[] = array(
                          'combination_id'=>$val1->getMain_combination_id(),
                          'type'=>$val1->getProt_type(),
                          'name'=>$val1->getProt_crab());
                          }
                          } */

                        $selected_combo = array(
                            'prot' => $val->getProteins_amount(), 
                            'crab' => $val->getCarbs_amount(),
                             'raw_eggs' => $val->getRaw_eggs(),
                              'white_eggs' => $val->getWhite_eggs(),
                              'calory' => $val->getCalory(),
                            );
                        

                        $meal_type_ = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productcategorymaster")
                                ->findOneBy(array("main_product_category_master_id" => $val2->getMain_product_category_id(), 'language_id' => $lang_id, "is_deleted" => 0));

                        $meal_type_ar = null;

                        if (empty($meal_type_)) {
                            $meal_type_ = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productcategorymaster")
                                    ->findOneBy(array("main_product_category_master_id" => $val2->getMain_product_category_id(), "is_deleted" => 0));
                        }

                        if ($meal_type_) {
                            $meal_type_ar = array('main_meal_type_id' => $meal_type_->getMain_product_category_master_id(),
                                'meal_name' => $meal_type_->getProduct_category_name(), 'count_in' => $meal_type_->getCount_in()
                            );
                        }

                        $main_product_id_ = $val2->getMain_product_master_id();
                        $sql_combo_display = "SELECT combo_type from product_combo_display_relation  				
							where is_deleted = '0' and product_id = {$main_product_id_}";
                        $combo_display = $this->fireQuery($sql_combo_display);

                        $display_prot_carb = false;
                        $display_eggs = false;

                        if(empty($combo_display)){
                            $combo_display = null;
                        }else{
                            foreach($combo_display as $_combo_display){
                                if($_combo_display['combo_type'] == 'prot_carb'){
                                    $display_prot_carb = true;
                                }
                                if($_combo_display['combo_type'] == 'eggs'){
                                    $display_eggs = true;
                                }

                            }
                        }


                        $ratings_done_flag = false;

                        if ($user_id != 0) {
                            #check rating done or not $order_meal_id

                            $user_id_ = $val2->getMain_product_master_id();

                            $rating_exist = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productratingmaster")
                                    ->findOneBy(array("user_master_id" => $user_id, "is_deleted" => 0, 'main_product_id' => $main_product_id_, 'product_meal_id' => $order_meal_id));

                            if ($rating_exist) {
                                $ratings_done_flag = true;
                            }
                        }

                        $response[] = array(
                            'meal_id' => $val2->getProduct_master_id(),

                            'calory' => $val2->getCalory(),
                            'fiber' => $val2->getFiber(),
                            'fat' => $val2->getFat(),
                            'prot' => $val2->getProt(),
                            'carb' => $val2->getCarb(),
                            
                            'main_meal_id' => $val2->getMain_product_master_id(),
                            'language_id' => $val2->getLanguage_id(),
                            'meal_type' => $val2->getMain_product_category_id(),
                            'meal_name' => $val2->getProduct_name(),
                            'calory' =>$calory,
                            'meal_description' => $val2->getProduct_description(),
                            'meal_image' => $this->getMediaDetailAction($val2->getProduct_image()),
                            'rating' => $this->getProductRatings($val2->getMain_product_master_id()),
                            'user_rating' => $this->getProductRatings($val2->getMain_product_master_id(), $order_meal_id),
                            'selected_combo' => $selected_combo,
                            'meal_type_object' => $meal_type_ar,
                            'ratings_done_flag' => $ratings_done_flag,
                            'display_eggs' => $display_eggs,
                            'display_prot_carbs' => $display_prot_carb
                        );
                    }
                }
            }
        }
        return $response;
    }
	
	public function weekOfMonth($date) {
		//Get the first day of the month.
		$firstOfMonth = strtotime(date("Y-m-01", $date));
		//Apply above formula.
		return $this->weekOfYear($date) - $this->weekOfYear($firstOfMonth) + 1;
	}

	public function weekOfYear($date) {
		$weekOfYear = intval(date("W", $date));
		if (date('n', $date) == "1" && $weekOfYear > 51) {
			// It's the last week of the previos year.
			$weekOfYear = 0;    
		}
		return $weekOfYear;
	}

   public function getOrderDataV1QtyUpdateAction($order_meal_id, $lang_id, $user_id = 0) {

        $order_meal = $this->getDoctrine()->getManager()
                ->getRepository("AdminBundle:Mealproductrelation")
                ->findBy(array("meal_id" => $order_meal_id, "is_deleted" => 0));

        $response = null;

        if (!empty($order_meal)) {
            foreach ($order_meal as $key => $val) {
                $meal_id = $val->getMain_product_id();
                $meal_qty = $val->getMeal_product_qty();
                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Productmaster")
                        ->findBy(array("language_id" => $lang_id, "main_product_master_id" => $meal_id, "is_deleted" => 0));
                if (empty($get_tc)) {
                    $get_tc = $this->getDoctrine()->getManager()
                            ->getRepository("AdminBundle:Productmaster")
                            ->findBy(array("main_product_master_id" => $meal_id, "is_deleted" => 0));
                }

                if (!empty($get_tc)) {
                    foreach ($get_tc as $key => $val2) {
                        $get_tc_c = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productcombinationmaster")
                                ->findBy(array("product_master_id" => $val2->getMain_product_master_id(), 'language_id' => $lang_id, "is_deleted" => 0));
                        /* $combination=array();
                          if(!empty($get_tc_c)){
                          foreach($get_tc_c as $key1=>$val1){
                          $combination[] = array(
                          'combination_id'=>$val1->getMain_combination_id(),
                          'type'=>$val1->getProt_type(),
                          'name'=>$val1->getProt_crab());
                          }
                          } */

                        $selected_combo = array('prot' => $val->getProteins_amount(), 'crab' => $val->getCarbs_amount(), 'raw_eggs' => $val->getRaw_eggs(), 'white_eggs' => $val->getWhite_eggs());

                        $meal_type_ = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productcategorymaster")
                                ->findOneBy(array("main_product_category_master_id" => $val2->getMain_product_category_id(), 'language_id' => $lang_id, "is_deleted" => 0));

                        $meal_type_ar = null;

                        if (empty($meal_type_)) {
                            $meal_type_ = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productcategorymaster")
                                    ->findOneBy(array("main_product_category_master_id" => $val2->getMain_product_category_id(), "is_deleted" => 0));
                        }

                        if ($meal_type_) {
                            $meal_type_ar = array('main_meal_type_id' => $meal_type_->getMain_product_category_master_id(),
                                'meal_name' => $meal_type_->getProduct_category_name(), 'count_in' => $meal_type_->getCount_in()
                            );
                        }

                        $main_product_id_ = $val2->getMain_product_master_id();
                        $sql_combo_display = "SELECT combo_type from product_combo_display_relation  				
							where is_deleted = '0' and product_id = {$main_product_id_}";
                        $combo_display = $this->fireQuery($sql_combo_display);

                        $display_prot_carb = false;
                        $display_eggs = false;

                        if(empty($combo_display)){
                            $combo_display = null;
                        }else{
                            foreach($combo_display as $_combo_display){
                                if($_combo_display['combo_type'] == 'prot_carb'){
                                    $display_prot_carb = true;
                                }
                                if($_combo_display['combo_type'] == 'eggs'){
                                    $display_eggs = true;
                                }

                            }
                        }


                        $ratings_done_flag = false;

                        if ($user_id != 0) {
                            #check rating done or not $order_meal_id

                            $user_id_ = $val2->getMain_product_master_id();

                            $rating_exist = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productratingmaster")
                                    ->findOneBy(array("user_master_id" => $user_id, "is_deleted" => 0, 'main_product_id' => $main_product_id_, 'product_meal_id' => $order_meal_id));

                            if ($rating_exist) {
                                $ratings_done_flag = true;
                            }
                        }

                        $response[] = array(
                            'meal_id' => $val2->getProduct_master_id(),
                            'main_meal_id' => $val2->getMain_product_master_id(),
                            'language_id' => $val2->getLanguage_id(),
                            'meal_type' => $val2->getMain_product_category_id(),
                            'meal_name' => $val2->getProduct_name(),
                            'meal_description' => $val2->getProduct_description(),
                            'meal_qty' => $meal_qty,
                            'meal_image' => $this->getMediaDetailAction($val2->getProduct_image()),
                            'rating' => $this->getProductRatings($val2->getMain_product_master_id()),
                            'user_rating' => $this->getProductRatings($val2->getMain_product_master_id(), $order_meal_id),
                            'selected_combo' => $selected_combo,
                            'meal_type_object' => $meal_type_ar,
                            'ratings_done_flag' => $ratings_done_flag,
                            'display_eggs' => $display_eggs,
                            'display_prot_carbs' => $display_prot_carb
                        );
                    }
                }
            }
        }
        return $response;
    }

    
    public function getUserdetailsAction($user_id) {
        $userMaster = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Usermaster')
                ->findOneBy(array(
            'user_master_id' => $user_id,
            'is_deleted' => 0,
                )
        );
        $user = array();
        if (!empty($userMaster)) {
            $media_id = $userMaster->getUser_image();
            $img_details = $this->getMediaDetailAction($media_id);
            $img_url = !empty($img_details) ? $img_details['url'] : null;
            $area = $this->getAreaAction($userMaster->getArea_id());
            $address = $this->getAddressAction($userMaster->getAddress_master_id());
            $user = array(
                "customer_id" => $userMaster->getUser_master_id(),
                "unique_no"=> $userMaster->getUnique_user_id(),
                "email" => $userMaster->getEmail(),
                "first_name" => $userMaster->getUser_firstname(),
                "last_name" => $userMaster->getUser_lastname(),
                "mobile_no" => $userMaster->getUser_mobile(),
                "user_image" => $img_url,
                "area" => $area,
                "address" => $address,
                    );
        }
        return $user;
    }

    public function getCompanydetails($user_id) {
        $userMaster = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Usermaster')
                ->findOneBy(array(
            'user_master_id' => $user_id,
            'is_deleted' => 0,
                )
        );
        $user = array();
        if (!empty($userMaster)) {
            $media_id = $userMaster->getUser_image();
            $img_details = $this->getMediaDetailAction($media_id);
            $img_url = !empty($img_details) ? $img_details['url'] : null;
            $user = array(
                "company_id" => $userMaster->getUser_master_id(),
                "email" => $userMaster->getEmail(),
                "first_name" => $userMaster->getUser_firstname(),
                "last_name" => $userMaster->getUser_lastname(),
                "mobile_no" => $userMaster->getUser_mobile(),
                "user_image" => $img_url,
                    );
        }
        return $user;
    }
    public function getRunningFestival($date) {  
        $sql = "SELECT * from festival_master where is_deleted = 0 and start_date <= '{$date}' and end_date >= '{$date}'";
		$check_for_festival = $this->firequery($sql);

        if(!empty($check_for_festival)) {
            $diff = strtotime($check_for_festival[0]['start_date']) - strtotime($date); 
            $remaining_days_in_festival =  abs(round($diff / 86400)); 
            $festivalData = array(
                "festival_id"=>$check_for_festival[0]['festival_master_id'],
                "start_date"=>$check_for_festival[0]['start_date'],
                "end_date"=>$check_for_festival[0]['end_date'],
                "diff_days"=> $remaining_days_in_festival)
                    ;
        } else {
            $festivalData = null;
        }
        // $festivalData = array("festival_id"=>1,"start_date"=>"","end_date"=>"");
        return $festivalData;
    }
    public function getUpcomingFestival($date) {  
        $sql = "SELECT * from festival_master where is_deleted = 0 and start_date <= '{$date}' and end_date >= '{$date}' ORDER BY `start_date` ASC limit 0,1";
		$check_for_festival = $this->firequery($sql);
        $festivalData = NULL ;         
        if(!empty($check_for_festival)) {
            $diff = strtotime($check_for_festival[0]['start_date']) - strtotime($date); 
           
            $remaining_days_in_festival =  abs(round($diff / 86400)); 
            $festivalData = array(
                "festival_id"=>$check_for_festival[0]['festival_master_id'],
                "start_date"=>$check_for_festival[0]['start_date'],
                "end_date"=>$check_for_festival[0]['end_date'],
                "diff_days"=> $remaining_days_in_festival )
                    ;
        } else {
            $sql = "SELECT * from festival_master where is_deleted = 0 and start_date >= '{$date}'  ORDER BY `start_date` ASC limit 0,1 ";
            $check_for_festival = $this->firequery($sql);
            if(!empty($check_for_festival)) {
                $diff = strtotime($check_for_festival[0]['start_date']) - strtotime($date); 
                 
                $remaining_days_in_festival =  abs(round($diff / 86400)); 
                $festivalData = array(
                    "festival_id"=>$check_for_festival[0]['festival_master_id'],
                    "start_date"=>$check_for_festival[0]['start_date'],
                    "end_date"=>$check_for_festival[0]['end_date'],
                    "diff_days"=> $remaining_days_in_festival )
                        ;
            }
        }
        // $festivalData = array("festival_id"=>1,"start_date"=>"","end_date"=>"");
        return $festivalData;
    }

    public function validateData($param) {

        if (count($this->validateRule)) {

            foreach ($this->validateRule as $value) {
                switch ($value['rule']) {
                    case 'NOTNULL' :
                        foreach ($value['field'] as $field) {
                            if (!isset($param->$field) && empty($param->$field)) {
                                // For error tracking
                                $this->status = 201;
                                $this->message = "false";
                                $this->error = "Missing field : " . $field;
                                $emptyobj = new Medialibrarymaster;
                                echo json_encode([
                                    'status' => 400,
                                    'message' => $this->message,
                                    'error' =>  $this->error,
                                    'data' => $emptyobj,
                                ]);
                                die;
                                // echo'<pre>';print_r($this);die();
                                // var_dump($this->message);
                                // exit;
                                // return false;
                                // echo  '<pre>';
                                // print_r($this->responseAction())->;die;
                                return $this->responseAction();
                            }
                        }
                        break;
                }
            }
        } else {
            $this->error = "Not Initialize";
            return false;
        }
        return true;
    }

    public function getparams() { // MP - 03.11.15
        $live_path = $this->container->getParameter("live_path");
        $absolute_path = $this->container->getParameter("absolute_path");
        $upload_dir = $this->container->getParameter("upload_dir");
        $file_path = $this->container->getParameter("file_path");
        $array = array("live" => $live_path, "abs" => $absolute_path, "upload_dir" => $upload_dir, "file_path" => $file_path);
        return $this->array_to_object($array);
    }

    public function array_to_object($array) {
        $new_array = json_decode(json_encode($array, false));
        return $new_array;
    }

    /**
     * @Route("/admin/fileupload1/{file}/{tmp}/{path}/{media_id}",defaults={"file"="","tmp"="","path"="","media_id"=""})
     */
    public function fileupload1($file, $tmp, $path = "", $media_id = 0) {

        $clean_image = preg_replace('/\s+/', '', $file);
        $file_name = date('Y_m_d_H_i_s') . '_' . $clean_image;
        $upload_path = $this->getparams()->upload_dir . "/" . $path . "/";
        $upload_file = $upload_path . $file_name;
        $save_path = $this->getparams()->file_path;
        $save_path .= $path ? "/" . $path . "/" : '';

        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        if (move_uploaded_file($tmp, $upload_file)) {
            $Medialibrarymaster = new Medialibrarymaster();
            $Medialibrarymaster->setMedia_type_id(1);
            $Medialibrarymaster->setMedia_title($clean_image);
            $Medialibrarymaster->setMedia_location($save_path);
            $Medialibrarymaster->setMedia_name($file_name);
            $Medialibrarymaster->setCreated_on(date("Y-m-d H:i:s"));
            $Medialibrarymaster->setIs_deleted(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Medialibrarymaster);
            $em->flush();

            return $Medialibrarymaster->getMedia_library_master_id();
        }
        return false;
    }

    /**
     * @Route("/ws/mediaupload")
     * @Template()
     */
    function mediauploadAction($file, $tmpname, $path, $upload_dir) {

        $clean_image = preg_replace('/\s+/', '', $file);
        $logo_name = date('Y_m_d_H_i_s') . '_' . $clean_image;
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777);
        }
        //logo upload check
        if (move_uploaded_file($tmpname, $upload_dir . $logo_name)) {
            $Medialibrarymaster = new Medialibrarymaster();
            $Medialibrarymaster->setMedia_type_id(1);
            $Medialibrarymaster->setMedia_title($clean_image);
            $Medialibrarymaster->setMedia_location($save_path);
            $Medialibrarymaster->setMedia_name($file_name);
            $Medialibrarymaster->setCreated_on(date("Y-m-d H:i:s"));
            $Medialibrarymaster->setIs_deleted(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Medialibrarymaster);
            $em->flush();
            $media_master_id = $Medialibrarymaster->getMedia_library_master_id();
            return $media_master_id;
        } else {
            return FALSE;
        }
    }

    public function getmediadetails($id) {
        $media = $this->getDoctrine()->getManager()
                ->getRepository("AdminBundle:Mediamaster")
                ->findOneBy(array("media_master_id" => $id, "is_deleted" => 0));
        if (!empty($media)) {
            $live_path = $this->container->getParameter('live_path');
            //$media_url = "http://".$_SERVER['HTTP_HOST']."/q8".$media->getMedia_location()."/".$media->getMedia_name();
            $media_url = $live_path . $media->getMedia_location() . "/" . $media->getMedia_name();
            /* $size = filesize($this->container->getParameter("absolute_path").$media->getMedia_location()."/".$media->getMedia_name()); */
            return array("media_id" => $id, "media_url" => $media_url);
        }
        return false;
    }

    public function getMediaDetailAction($media_library_id) {
        $Config_absolute_path = $this->container->getParameter('absolute_path');
        $Config_live_site = $this->container->getParameter('live_path');

        $media_library_master_info = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Medialibrarymaster')
                ->findOneBy(array(
            'media_library_master_id' => $media_library_id,
            'is_deleted' => 0,
                )
        );

        if (isset($media_library_master_info) && !empty($media_library_master_info)) {
            $file_path = $Config_absolute_path . $media_library_master_info->getMedia_location() .'/'. $media_library_master_info->getMedia_name();

            if (file_exists($file_path)) {
                $file_url = array(
                    "url" => $Config_live_site . $media_library_master_info->getMedia_location() . $media_library_master_info->getMedia_name(),
                    "size" => filesize($file_path),
                    "title" => $media_library_master_info->getMedia_title(),
                );
                return $file_url;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function getGoalAction($goal_id) {
        $goal_master = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Usergoalmaster')
                ->findOneBy(array(
            'user_goal_master_id' => $goal_id,
            'is_deleted' => 0,
                )
        );
        $goal = array();
        if (!empty($goal_master)) {
            $goal = array(
                'goal_id' => $goal_master->getUser_goal_master_id(),
                'goal_name' => $goal_master->getName(),
                'description' => $goal_master->getDescription(),
                'goal_background' => $this->getMediaDetailAction($goal_master->getImage_id()),
                'goal_logo' => $this->getMediaDetailAction($goal_master->getIcon_id())
            );
        }
        return $goal;
    }

    public function getAreaAction($area_id, $language_id = 1) {
        $area_master = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Areamaster')
                ->findOneBy(array(
            'main_area_id' => $area_id,
            'is_deleted' => 0,
            'language_id' => 1
                )
        );
        $area = null;

        $language_id_another = ($language_id == 1) ? 2 : 1;
        if (!empty($area_master)) {

            $area_master_another = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('AdminBundle:Areamaster')
                    ->findOneBy(array(
                'main_area_id' => $area_id,
                'is_deleted' => 0,
                'language_id' => 2
                    )
            );

            $area_ar = $city_name_ar = $city_name = '';
            if ($area_master_another) {
                $area_ar = $area_master_another->getArea_name();
            }

            $city_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Citymaster')->findOneBy(array("language_id"=>$language_id,"main_city_master_id"=>$area_master->getCity_id()));
            if($city_master){
                $city_name = $city_master->getCity_name() ; 

                 $city_master_another = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('AdminBundle:Citymaster')
                    ->findOneBy(array(
                         'main_city_master_id' => $area_master->getCity_id(),
                         'language_id' => 2
                             )
                     );
                if($city_master_another){
                    $city_name_ar = $city_master_another->getCity_name();
                }


            }

            $area = array(
                'area_id' => $area_master->getArea_master_id(),
                'area_name' => $area_master->getArea_name(),
                'area_name_ar' => $area_ar,
                'city_name' => $city_name,
                'city_name_ar' => $city_name_ar,
            );
        }
        return $area;
    }

    public function getAddressAction($address_id) {
        $address_master = $this->getDoctrine()
                ->getManager()
                ->getRepository('AdminBundle:Addressmaster')
                ->findOneBy(array(
            'address_master_id' => $address_id,
            'is_deleted' => 0,
                )
        );
        $address = null;
        if (!empty($address_master)) {
            $address = array(
                'address_id' => $address_master->getAddress_master_id(),
                'address_type' => $address_master->getAddress_type(),
                'governorate_id' => $address_master->getCity_id(),
                'area' => $this->getAreaAction($address_master->getArea_id()),
                'optional_address' => $address_master->getOptional_address(),
                'block' => $address_master->getAddress_name(),
                'street' => $address_master->getStreet(),
                'lat' => $address_master->getLat(),
                'lang' => $address_master->getLng(),
                'avenue' => $address_master->getAddress_name2(),
                'house_number' => $address_master->getFlate_house_number(),
                'floor_no' => $address_master->getSociety_building_name(),
                'flat_no' => $address_master->getFlat_no(),
                'directions' => $address_master->getLandmark(),
            );
        }
        return $address;
    }

    public function getpackagedetailsAction($package_id, $language_id, $type) {
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $query = "SELECT * FROM package_for_master pfm JOIN package_for_relation pfr ON pfm.main_package_for_master_id=pfr.main_package_for_id WHERE pfm.is_deleted=0 and pfr.is_deleted=0 and pfm.type='$type' and pfr.main_package_id='$package_id' and pfm.language_id='$language_id'";
        $statement = $connection->prepare($query);
        $statement->execute();
        $package_info = $statement->fetchAll();
        $response = null;
        if (!empty($package_info)) {
            foreach ($package_info as $key => $val) {
                $response[] = array('package_for_id' => $val['main_package_for_master_id'], 'package_for_name' => $val['name'], 'package_for_price' => $val['price']);
            }
        }
        return $response;
    }

    public function getProductRatings($product_id, $order_meal_id = 0) {
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $where_clause = "";
        if ($order_meal_id != 0) {
            $where_clause = " AND product_meal_id = '$order_meal_id' ";
        }
        $query = "SELECT sum(ratings) as ratings,count(product_rating_master_id) as total_rating_done FROM product_rating_master where main_product_id = '$product_id' and is_deleted = 0 $where_clause";
        $statement = $connection->prepare($query);
        $statement->execute();
        $ratings_info = $statement->fetchAll();
        $response = null;

        $total_rating_done = 1;
        $ratings = 0;

        if (!empty($ratings_info)) {
            $ratings = $ratings_info[0]['ratings'];
            $total_rating_done = $ratings_info[0]['total_rating_done'];
        }
        if ($total_rating_done != 0) {
            return $ratings / $total_rating_done;
        } else {
            return 0;
        }
    }

    public function getPackageAddonsAction($package_id, $package_for_id, $language_id, $type) {

        if (!empty($package_for_id)) {
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $query = "SELECT * FROM package_for_master pfm JOIN package_for_relation pfr ON pfm.main_package_for_master_id=pfr.main_package_for_id WHERE pfm.is_deleted=0 and pfr.is_deleted=0 and pfm.type='$type' and pfr.main_package_id='$package_id' and pfm.language_id='$language_id' and main_package_for_master_id IN ($package_for_id) group by main_package_for_master_id";
            $statement = $connection->prepare($query);
            $statement->execute();
            $package_info = $statement->fetchAll();
            $response = null;
            if (!empty($package_info)) {
                foreach ($package_info as $key => $val) {
                    if ($type == 'consultant_fee') {

                        $response [] = array('package_for_id' => $val['main_package_for_master_id'], 'package_for_name' => $val['name'], 'package_for_price' => $val['price'], "days" => $val['days']);
                    } else {

                        $response = array('package_for_id' => $val['main_package_for_master_id'], 'package_for_name' => $val['name'], 'package_for_price' => $val['price'], "days" => $val['days']);
                    }
                }
            } else {

                $query = "SELECT * FROM package_for_master pfm JOIN package_for_relation pfr ON pfm.main_package_for_master_id=pfr.main_package_for_id WHERE pfm.is_deleted=0 and pfr.is_deleted=0 and pfm.type='$type' and pfr.main_package_id='$package_id' and main_package_for_master_id IN ($package_for_id) group by main_package_for_master_id";
                $statement = $connection->prepare($query);
                $statement->execute();
                $package_info = $statement->fetchAll();
                if (!empty($package_info)) {
                    foreach ($package_info as $key => $val) {
                        if ($type == 'consultant_fee') {

                            $response [] = array('package_for_id' => $val['main_package_for_master_id'], 'package_for_name' => $val['name'], 'package_for_price' => $val['price'], "days" => $val['days']);
                        } else {

                            $response = array('package_for_id' => $val['main_package_for_master_id'], 'package_for_name' => $val['name'], 'package_for_price' => $val['price'], "days" => $val['days']);
                        }
                    }
                }
            }
            return $response;
        } else {
            return null;
        }
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);


        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    /**
     * @Route("/fireQuery")
     * @Template()
     */
    function fireQuery($query) {
        $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @Route("/getLoyalitypoint")
     */
    function getLoyalitypointAction($user_id) {
        $point = "";
        $sql_combo = "SELECT *,sum(package_master.loyality_point) as point FROM order_master JOIN package_master ON order_master.package_id=package_master.package_master_id WHERE order_master.order_by='$user_id' AND order_master.is_deleted=0 AND order_master.end_date>='" . date('Y-m-d') . "'";
        $sub_package = $this->fireQuery($sql_combo);
        if ($sub_package) {
            $point = $sub_package[0]['point'];
        }
        return $point;
    }

    /**
     * @Route("/getHeight")
     */
    function getHeightAction($height_id) {
        $point = null;
        $sql_combo = "SELECT * FROM height_master WHERE is_deleted=0 AND status='active' AND main_height_id='$height_id'";
        $sub_package = $this->fireQuery($sql_combo);
        if ($sub_package) {
            $point = $sub_package[0];
        }
        return $point;
    }

    /**
     * @Route("/getWeight")
     */
    function getWeightAction($weight_id) {
        $point = null;
        $sql_combo = "SELECT * FROM weight_master WHERE is_deleted=0 AND status='active' AND main_weight_id='$weight_id'";
        $sub_package = $this->fireQuery($sql_combo);
        if ($sub_package) {
            $point = $sub_package[0];
        }
        return $point;
    }

    /**
     * @Route("/getCurrentpackage")
     */
    function getCurrentpackageAction($user_id) {
        $lang_id = 1;
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $query = "SELECT * FROM order_master JOIN package_master ON 
				 order_master.package_id=package_master.package_master_id
				 JOIN sub_package_master on order_master.sub_package_id = sub_package_master.main_sub_package_id 
				 WHERE order_master.order_by='$user_id' AND order_master.is_deleted=0 AND  order_master.order_status != 'pending' AND order_master.transaction_id != 0  AND order_master.end_date>='" . date('Y-m-d') . "' and package_master.is_deleted = 0 group by order_master_id  ORDER BY order_master.order_master_id ASC limit 1";
//        $query = "SELECT * FROM order_master JOIN package_master ON 
//				 order_master.package_id=package_master.package_master_id
//				 JOIN sub_package_master on order_master.sub_package_id = sub_package_master.main_sub_package_id 
//				 WHERE order_master.order_by='$user_id' AND order_master.is_deleted=0 AND order_master.order_status != 'cancel' AND order_master.order_status != 'pending'  AND order_master.end_date>='" . date('Y-m-d') . "' and package_master.is_deleted = 0 group by order_master_id  ORDER BY order_master.order_master_id ASC limit 1";
        //echo $query;exit;
        $statement = $connection->prepare($query);
        $statement->execute();
        $order_info = $statement->fetchAll();
        $response = null;
        if (!empty($order_info)) {
            foreach ($order_info as $key => $val) {
//var_dump($order_info);
                $sub_p_id = $val['sub_package_id'];
                #new Track Counts of Meal Type done		
                $totalComboCount = array(
                    'meals' => 0,
                    'snacks' => 0,
                    'soup' => 0,
                    'breakfast' => 0,
                );


                #new SubPackage Details
                $sub_packages_data = null;
                $sub_p_id = $val['sub_package_id'];
                $package_for_id = $val['package_for'];
                $main_package_id = $val['package_id'];

#check package contains any video or not
                $sql_check_video = "select video_package_relation_id from video_package_relation where is_deleted = 0
						and package_id = '$main_package_id'";
                $videos = $this->fireQuery($sql_check_video);
                $available_for_video = ( count($videos) > 0 ) ? true : false;

#check package contains any video or not done
                #getSubPackages
                $sql_pk_for = "select main_package_for_master_id,days,description,name,name_db from package_for_master where is_deleted = 0 and type='package_for' and main_package_for_master_id = '$package_for_id' group by main_package_for_master_id";
                $pk_for = $this->fireQuery($sql_pk_for);

                $pk_for_data = null;
                $availabel_for_off_days = false;
                $available_for_upgrade = false;
                $is_monthly_package = false;
                $is_daily_package = false;

                $package_duration = '';
                if (!empty($pk_for)) {
                    if ($pk_for[0]['main_package_for_master_id'] == 1) {
                        $is_monthly_package = true;
                        $availabel_for_off_days = true;
                        $available_for_upgrade = true;
                    }

                    if ($pk_for[0]['main_package_for_master_id'] == 11) {
                        $is_daily_package = true;
                    }

                    $pk_for_data = array(
                        "main_package_for_master_id" => $pk_for[0]['main_package_for_master_id'],
                        "days" => $pk_for[0]['days'],
                        "name" => $pk_for[0]['name'],
                    );
                    $package_duration = $pk_for[0]['name_db'];
                }
                $sql_get_sub_packages = "select * from sub_package_master 
                        JOIN sub_package_price_master ON sub_package_master.main_sub_package_id = sub_package_price_master.sub_package_id 
                        where sub_package_master.is_deleted = 0 and sub_package_price_master.is_deleted = 0 
						and sub_package_price_master.sub_package_id = '$sub_p_id' and sub_package_master.main_package_id = '$main_package_id' and sub_package_price_master.duration_type = '$package_duration' ";

                $sub_packages = $this->fireQuery($sql_get_sub_packages);

                if (!empty($sub_packages)) {
                    foreach ($sub_packages as $_sub_packages) {

                        $sub_pk_id = $_sub_packages['main_sub_package_id'];
                        $price = $_sub_packages['price'];

                        $sub_package_combo = null;
                        $sql_get_sub_package_combo = "select sub_package_combination_master.meal_value,
                                product_category_master.product_category_name,product_category_master.main_product_category_master_id,
                                product_category_master.count_in,sub_package_combination_master.sub_package_id 
                                from sub_package_combination_master 
                                JOIN product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                                where sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and sub_package_combination_master.sub_package_id = '$sub_p_id' group by sub_package_combination_master.sub_package_combination_master_id";

                        $sub_packages_combo = $this->fireQuery($sql_get_sub_package_combo);

                        $totalMeals = 0;
                        $totalSnacks = 0;
                        $totalSoup = 0;
                        $totalBreakfast = 0;

                        if (empty($sub_packages_combo)) {
                            $sub_packages_combo = null;
                        } else {
                            foreach ($sub_packages_combo as $_sub_packages_combo) {
                                if ($_sub_packages_combo['count_in'] == 'meal') {
                                    $totalMeals += $_sub_packages_combo['meal_value'];
                                }
                                if ($_sub_packages_combo['count_in'] == 'snacks') {
                                    $totalSnacks += $_sub_packages_combo['meal_value'];
                                }
                                if ($_sub_packages_combo['count_in'] == 'soup') {
                                    $totalSoup += $_sub_packages_combo['meal_value'];
                                }
                                if ($_sub_packages_combo['count_in'] == 'breakfast') {
                                    $totalBreakfast += $_sub_packages_combo['meal_value'];
                                }
                            }
                        }

                        $totalComboCount = array(
                            'meals' => $totalMeals,
                            'snacks' => $totalSnacks,
                            'soup' => $totalSoup,
                            'breakfast' => $totalBreakfast
                        );

                        $sub_packages_data = array(
                            "sub_package_id" => $_sub_packages['main_sub_package_id'],
                            "price" => $price,
                            "total_combo_count" => $totalComboCount,
                            "sub_package_combo" => $sub_packages_combo,
                        );
                    }
                }

               
                #remaining Days exclude off_days , suspended days and added meal days
                $order_id = $val['order_master_id'];
                $order_status = $val['order_status'];
                $order_start_date = strtotime($val['start_date']);
                $order_end_date = strtotime($val['end_date']);

                $totalDays = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) + 1;

                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
						JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
						where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $offDaysArray = array();

                $total_off_days = 0;

                $day_passed = 0;
                $today = strtotime(date('Y-m-d'));

                if (!empty($offDays)) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray [] = $_offDays['main_days_master_id'];
                    }
                }

              


                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );

                $freezeOnce = false;

                $supend_start_date = null;
                $supend_end_date = null;
                $supend_end_date_response = null;
                $supend_start_date_response = null;

                $suspendedFridays = [];
                $suspendedOffDays = [];
                $freezeDays = [];

                $suspesion_days = 0;
                if ($checkFreeze) {
                    $freezeOnce = true;
                    foreach ($checkFreeze as $_checkFreeze) {
                        $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getStart_date())));
                        $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getEnd_date())));
                        $supend_start_date_response = date('Y-m-d', $supend_start_date);
                        $supend_end_date_response = date('Y-m-d', $supend_end_date);
                        while ($supend_start_date <= $supend_end_date) {

                            $freezeDays [] = date('Y-m-d', $supend_start_date);
                            $suspesion_days += 1;

                            $supend_start_date = strtotime("+1 day", $supend_start_date);
                        }
                    }
                }
                $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );
                $PauseDays =  [] ;
                $pause_days = 0 ;
                if ($checkPause) {
                    $pauseOnce = true;
                    foreach ($checkPause as $_checkPause) {
                        $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_start_date())));
                        $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date())));

                        $pause_start_date_response = date('Y-m-d', $pause_start_date);
                        $pasue_end_date_response = date('Y-m-d', $pasue_end_date);

                        while ($pause_start_date <= $pasue_end_date) {

                            $PauseDays [] = date('Y-m-d', $pause_start_date);
                            $pause_days += 1;

                            $pause_start_date = strtotime("+1 day", $pause_start_date);
                        }
                    }
                }
                $offDaysDates = [];
                $totalDaysDateArray = []; 
                $passed_days_dateArray = [] ;
                while ($order_start_date <= $order_end_date) {
                    $totalDaysDateArray[] =  date('Y-m-d', $order_start_date);
                    //if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                    if (( in_array(date('N', $order_start_date), $offDaysArray) ) && !in_array($order_start_date, $freezeDays)) {
                        $total_off_days += 1;
                         $offDaysDates [] = date('Y-m-d', $order_start_date);
                    }
                    if ($order_start_date <= $today) {
                        $passed_days_dateArray[] =  date('Y-m-d', $order_start_date);
                        $day_passed += 1;
                    }
                    $order_start_date = strtotime("+1 day", $order_start_date);
                }
             
                foreach($totalDaysDateArray as $tdkey => $tdval){
                    if(in_array($tdval,$passed_days_dateArray)){
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if(in_array($tdval,$offDaysDates)){
                        unset($totalDaysDateArray[$tdkey]);
                    }
                     if(in_array($tdval,$freezeDays)){
                        unset($totalDaysDateArray[$tdkey]);
                    }
                     if(in_array($tdval,$PauseDays)){
                        unset($totalDaysDateArray[$tdkey]);
                    }
                }
              
                $remaining_days = count($totalDaysDateArray) ;
                $meal_added_days = 0;
                $sql_meal_added = "select count(order_meal_relation_id) as added_meal_day
											from order_meal_relation
											where order_master_id = '$order_id' and is_deleted = 0";
                $mealAddedDays = $this->fireQuery($sql_meal_added);
                if (!empty($mealAddedDays)) {
                    $meal_added_days = $mealAddedDays[0]['added_meal_day'];
                }

              $availabel_for_suspend_days = false;
                if ($remaining_days > 3 && $is_monthly_package) {
                    $availabel_for_suspend_days = true;
                }

                if ($freezeOnce) {
                    $availabel_for_suspend_days = false;
                }
                $days_array = array(
                    "suspendedFridays" => $suspendedFridays,
                    "offDAysDates" => $offDaysDates,
                    'day_passed' => $day_passed,
                    'totalDays' => $totalDays,
                    'suspesion_days' => $suspesion_days,
                    'meal_added_days' => $meal_added_days,
                    'total_off_days' => $total_off_days,
                );
                // fetch diff from today to start date
                $package_end_date = $val['end_date'] ;
               
                $TodayDate = date_create(date("Y-m-d")) ;
                $DiffEndate = date_create($package_end_date);
                $diff= date_diff($TodayDate,$DiffEndate);
                $EndDayDiff = $diff->format("%a")  ;
                  $DiffstartDate = date_create($val['start_date']);
                $diff= date_diff($TodayDate,$DiffstartDate);
                $startDayDiff = $diff->format("%a")  ;

                $pause_package = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackage")->findBy(array("order_id"=>$val['order_master_id'],"is_deleted"=>0));
                $pause_package_arr = NULL ;
                if($pause_package ){
                  foreach($pause_package  as $pppkey=>$pppval){
                    $pause_package_history =  $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->findOneBy(array("pause_package_history_id"=>$pppval->getPause_package_history_id()));
                    $resume_choice = NULL ;
                    if($pause_package_history){
                      $resume_choice = $pause_package_history->getResume_choice();
                    }
                    $pause_package_arr[] = array(
                      "pause_package_id"=>$pppval->getPause_package_id() ,
                      "pause_start_date"=>$pppval->getPause_start_date() ,
                      "pause_end_date"=>$pppval->getPause_end_date() ,
                      "pause_end_date_by_update"=>$pppval->getPause_end_date_by_update() ,
                      "pause_end_date_update_by"=>$pppval->getPause_end_date_update_by() ,
                      "pause_package_history_id"=>$pppval->getPause_package_history_id() ,
                      "resume_choice"=>$resume_choice ,
                      "comment_log"=>$pppval->getComment_log() 
                    );
                  }
                }


                $response = array(
                    'days_array' => $days_array,
                    'package_master_id' => $val['main_package_master_id'],
                    'package_name' => $val['package_name'],
                    'package_grams' => $val['package_grams'],
//									'price_array'=>$price_array,
//									'package_snakes'=>$val['package_snakes'],
//									'package_meals'=>$val['package_meals'],
                    'package_meals' => $totalComboCount['meals'],
                    'package_snakes' => $totalComboCount['snacks'],
                    'package_soup' => $totalComboCount['soup'],
                    'package_breakfast' => $totalComboCount['breakfast'],
//									'meal_count_array'=> $meal_count_array,
//									'sub_package'=>$sub_package,
//									'sub_packages_data'=>$sub_packages_data,
                    'order_id' => $val['order_master_id'],
                    'order_status' => $order_status,
                     'pause_status' => $val['pause_status'],
                   'pause_package_arr'=>$pause_package_arr ,
                    'sub_package_id' => $val['sub_package_id'],
//									'description'=>$val['description'],
//									'price_starting_from'=>$val['price_starting_from'],
                    'start_date' => strtotime($val['start_date']) * 1000,
                    'start_date_display' => $val['start_date'],
                    'end_date' => strtotime($package_end_date) * 1000,
                    'end_date_display' => $package_end_date,
                    //'package_for'=>$pk_for_data,                  
                   'remaining_days' =>$remaining_days,
                   // 'remaining_days' => $remaining_days, // + $total_off_days + $startDayDiff,
//									'consultant_fee'=>$this->getPackageAddonsAction($val['main_package_master_id'],$val['consulatant_fee'],$lang_id,'consultant_fee'),
//									'for_workout'=>$for_workout,
//									'for_schedule'=>$for_schedule,
//									'off_days' => $offDays,
                    //		'available_for_off_days' => $availabel_for_off_days,
                    'available_for_suspend_days' => $availabel_for_suspend_days,
                    'available_for_upgrade' => $available_for_upgrade,
                    'available_for_video' => $available_for_video,
                    'supend_start_date' => !empty($supend_start_date_response) ? strtotime($supend_start_date_response) : null,
                    'supend_start_date_read' => !empty($supend_start_date_response) ? $supend_start_date_response : null,
                     'supend_end_date_read' => !empty($supend_end_date_response) ? $supend_end_date_response : null,
                     'is_daily_package' => $is_daily_package
                );
            }
        }
        return $response;
    }

}
