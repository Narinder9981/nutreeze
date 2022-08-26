<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Productmaster;
use AdminBundle\Entity\Productcombinationmaster;

class WSMealListController extends WSBaseController {

    /**
     * @Route("/ws/meallist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function meallistAction($param) {

        //try{
        $this->title = "Meal List";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('lang_id', 'package_id'),
            ),
        );

        if ($this->validateData($param)) {

            $lang_id = $param->lang_id;
            $package_id = $param->package_id;
            $week_id = !empty($param->week_id) ? $param->week_id : '';
            $days_master_id = !empty($param->days_master_id) ? $param->days_master_id : '';
            $mealtype_id = !empty($param->mealtype_id) ? $param->mealtype_id : '';

            $order_id = !empty($param->order_id) ? $param->order_id : 0;
            $user_id = !empty($param->user_id) ? $param->user_id : 0;
            $meal_date = !empty($param->meal_date) ? $param->meal_date : '';
            $main_sub_package_id = !empty($param->main_sub_package_id) ? $param->main_sub_package_id : '';

            if( ($week_id != '' && $days_master_id  == '' )  || ($days_master_id !='' && $week_id == '') ){
                $this->error = "PIW" ;
                $this->error_msg = "week id or days id param missing" ;
                // $this->data = false ;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Productmaster();
                $this->data = $emptyObj;
                return $this->responseAction() ;
            }

            //  $day=!empty($param->given_date)?date('l',($param->given_date/1000)): date('l');
            //$day=!empty($param->given_date)?$param->given_date: date('l');
            $day = isset($param->given_date) ? date('w', strtotime($param->given_date)) : date('w');

            if ($day == 0) {
                // 0 = Sunday
                $day = 7;
            }

            $em = $this->getDoctrine()->getManager();

            #get Products of package from 
            $sql1 = "select main_product_id from product_package_relation where is_deleted = '0' and main_package_id = '$package_id' ";
            $products_all = $this->fireQuery($sql1);
			
            $main_product_ids = array();

            if (!empty($products_all)) {
                foreach ($products_all as $pack) {
                    $main_product_ids[] = $pack['main_product_id'];
                }
            }
  
			$get_tc = NULL;
            #get Products of package from tabel relation
            if (!empty($mealtype_id)) {
                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Productmaster")
                        ->findBy(array( "main_product_category_id" => $mealtype_id, "product_status" => 'active', "is_deleted" => 0,'language_id'=>1), ['main_product_master_id' => 'DESC']);
            } else {
                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Productmaster")
                        ->findBy(array( "product_status" => 'active', "is_deleted" => 0,'language_id'=>1), ['main_product_master_id' => 'DESC']);
            }
			
            //echo'<pre>';print_r($get_tc);
            if (!empty($get_tc)) {
                $sql_get_sub_package_combo = "select sub_package_combination_master.meal_value,
                product_category_master.product_category_name,product_category_master.main_product_category_master_id,
                product_category_master.count_in,sub_package_combination_master.sub_package_id 
                from sub_package_combination_master 
                JOIN product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                where sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and sub_package_combination_master.sub_package_id = '$main_sub_package_id' and product_category_master.language_id = ' $lang_id 'group by sub_package_combination_master.sub_package_combination_master_id";

                $sub_packages_combo = $this->fireQuery($sql_get_sub_package_combo);

                $totalMeals = 0;
                $totalSnacks = 0;
                $totalSoup = 0;
                $totalBreakfast = 0;

                if(empty($sub_packages_combo)){
                    $sub_packages_combo = null;
                }else{
                    foreach($sub_packages_combo as $_sub_packages_combo){
                        if($_sub_packages_combo['count_in'] == 'meal'){
                            $totalMeals += $_sub_packages_combo['meal_value']; 
                        }
                        if($_sub_packages_combo['count_in'] == 'snacks'){
                            $totalSnacks += $_sub_packages_combo['meal_value']; 
                        }
                        if($_sub_packages_combo['count_in'] == 'soup'){
                            $totalSoup += $_sub_packages_combo['meal_value']; 
                        }
                        if($_sub_packages_combo['count_in'] == 'breakfast'){
                            $totalBreakfast += $_sub_packages_combo['meal_value']; 
                        }
                    }
                }

                $totalComboCount = array(
                    'meals' => $totalMeals,
                    'snacks' => $totalSnacks,
                    'soup' => $totalSoup,
                    'breakfast' => $totalBreakfast,
                );

        
                //echo'<pre>';print_r($get_tc);//die('test');
                foreach ($get_tc as $key => $val) {                    
                    // if (in_array($val->getMain_product_master_id(), $main_product_ids)) {
                        $is_meal_added = false;                        
                        $main_product_id = $val->getMain_product_master_id();
                        $selected_pro_grams = 0;
                        $selected_carb_grams = 0;
                        $meal_id = 0;
                        if(!empty($order_id)){
                            $sql_order_meal = "select meal_id, order_meal_relation_id, selected_proteins, selected_carbs from order_meal_relation JOIN meal_product_relation ON meal_product_relation.meal_id = order_meal_relation.order_meal_relation_id                
                            where order_meal_relation.is_deleted = '0' and order_meal_relation.order_master_id = '$order_id' and order_meal_relation.requested_datetime='$meal_date' and order_meal_relation.user_id='$user_id' and meal_product_relation.main_product_id='$main_product_id' and meal_product_relation.is_deleted='0'";
                            $meal_count = $this->fireQuery($sql_order_meal);
                            // echo'<pre>';print_r($sql_order_meal);

                            

                            if(count($meal_count) > 0){
                                
                                $is_meal_added = true;
                                $meal_id = $meal_count[0]['order_meal_relation_id'];
                                $selected_pro_grams = $meal_count[0]['selected_proteins'];
                                $selected_carb_grams = $meal_count[0]['selected_carbs'];
                            }    
                                                   
                        }
                        $sql_combo_display = "select combo_type from product_combo_display_relation                 
                            where is_deleted = '0' and product_id = '$main_product_id'  ";
                        $combo_display = $this->fireQuery($sql_combo_display);

                        $display_prot_carb = false;
                        $display_eggs = false;

                        if (empty($combo_display)) {
                            $combo_display = null;
                        } else {
                            foreach ($combo_display as $_combo_display) {
                                if ($_combo_display['combo_type'] == 'prot_carb') {
                                    $display_prot_carb = true;
                                }
                                if ($_combo_display['combo_type'] == 'eggs') {
                                    $display_eggs = true;
                                }
                            }
                        }
                        /*
                          $get_tc_c = $this->getDoctrine()->getManager()
                          ->getRepository("AdminBundle:Productcombinationmaster")
                          ->findBy(array("product_master_id"=>$val->getMain_product_master_id(),'language_id'=>$lang_id,"is_deleted"=>0));
                          $combination=array();
                          if(!empty($get_tc_c)){
                          foreach($get_tc_c as $key1=>$val1){
                          $combination[] = array(
                          'combination_id'=>$val1->getMain_combination_id(),
                          'type'=>$val1->getProt_type(),
                          'name'=>$val1->getProt_crab());
                          }
                          }
                         */
                        $week_query =  $days_query = '' ;
                        if($week_id != ''){
                            $week_query = " AND week_id  like '%week".$week_id."%'" ; 
                        }
                        if($days_master_id != '' ){
                            $days_query = ' AND main_days_id  = ' . $days_master_id . ' ' ;
                        }
                        $query = "SELECT * FROM `product_availability` JOIN days_master ON product_availability.main_days_id=days_master.main_days_master_id WHERE product_availability.is_deleted=0 AND days_master.is_deleted=0 AND days_master.language_id=$lang_id AND product_availability.main_product_id='" . $val->getMain_product_master_id() . "'" . $week_query . $days_query;
                        $meal_avail = $this->fireQuery($query);

                        if (empty($meal_avail)) {
                            $query = "SELECT * FROM `product_availability` JOIN days_master ON product_availability.main_days_id=days_master.main_days_master_id WHERE product_availability.is_deleted=0 AND days_master.is_deleted=0 AND product_availability.main_product_id='" . $val->getMain_product_master_id() . "'" . $week_query . $days_query;
                            $meal_avail = $this->fireQuery($query);
                        }

                        //echo $query ;  exit ; 
                        $meal_availabilty = array();
                        $meal_availabiliy_days = [];

                        if (!empty($meal_avail)) {
                            foreach ($meal_avail as $ky => $vs) {
                                $meal_availabilty[] = array(
                                    'product_availability_id' => $vs['product_availability_id'],
                                    'week' => $vs['week_id'],
                                    'name' => $vs['days_name']
                                );
                                //$meal_availabiliy_days [] = $vs['days_name'];
                                $meal_availabiliy_days [] = $vs['main_days_master_id'];
                            }
                        }

                        if(($meal_availabilty != NULL && $week_id != '' && $days_master_id != '' ) || ($week_id == '' && $days_master_id == '') ){


                        

                            $meal_type_ = $this->getDoctrine()->getManager()
                                    ->getRepository("AdminBundle:Productcategorymaster")
                                    ->findOneBy(array("main_product_category_master_id" => $val->getMain_product_category_id(), 'language_id' => $lang_id, "is_deleted" => 0));

                            $meal_type_ar = new Productmaster();
                            if ($meal_type_) {
                                $meal_type_ar = array('main_meal_type_id' => $meal_type_->getMain_product_category_master_id(),
                                    'meal_name' => $meal_type_->getProduct_category_name(),
                                    'count_in' => $meal_type_->getCount_in()
                                );
                            }

                            $mealArr = null;

                            $prot = 0;
                            $carb = 0;
                            $fat = 0;
                            $calory = 0 ; 
                            $comb = NULL ; 
                            $type = $combo_display[0]['combo_type'];
                            // echo'<pre>';print_r($type);
                            $max_grams = 0;
                            $selected_carb = 50;
                            $selected_protien = 50;
                            // $selected_carb = $selected_pro_grams;
                            // $selected_protien = $selected_carb_grams;
                            if($type != 'none' && !empty($type)){
                                if (isset($package_id) && $type == 'package_wise') {   
                                                
                                    $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
                                        'is_deleted' => 0,
                                        'package_master_id' => $package_id,
                                        'product_master_id' => $val->getMain_product_master_id(),
                                        'type' => $type
                                    ]);
                                    
                                }
                                else{
                                    $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
                                        'is_deleted' => 0,
                                        'product_master_id' => $val->getMain_product_master_id(),
                                        'type' => $type
                                    ]);
                                }
                                //print_r($comb); die;
                                
                                if($type == 'prot_carb'){
                                   
                                    $selected_carb = $selected_pro_grams;
                                    $selected_protien = $selected_carb_grams;
                                    $packageSql = "select package_max_grams_limit from package_master where package_master_id = $package_id";
                                    $package = $this->fireQuery($packageSql);
                                    $max_grams = $package[0]['package_max_grams_limit']; 
                                    $calc = 1;
                                    if (!empty($comb[0])) {
                                       $combo_arr = [];
                                        foreach ($comb as $_comb) { 
                                            $prot = (int) $_comb->getProtein();
                                            $fat = (int) $_comb->getFat();
                                            $carb = (int) $_comb->getCarb();
                                            $calory = (int) $_comb->getCalory();
                                            $carb_prot_type = $_comb->getProt_carb();
                                            if ($selected_protien >= 50 || $selected_carb >= 50) {
                                                if($selected_protien <= $max_grams){
                                                    $calcp = $selected_protien/50;
                                                }     
                                                
                                                if($carb_prot_type == 'protein') {
                                                    $combo_arr['protein']['prot'] = $prot*$calcp;
                                                    $combo_arr['protein']['fat']= $fat*$calcp;
                                                    $combo_arr['protein']['carb']= $carb*$calcp;
                                                    $combo_arr['protein']['calory'] = $calory*$calcp; 
                                                }                             
                                                
                                                if($selected_carb <= $max_grams){
                                                    $calcc = $selected_carb/50;
                                                }      
                                                
                                                if($carb_prot_type == 'carb') {    
                                                    $combo_arr['carb']['prot'] = $prot*$calcc;
                                                    $combo_arr['carb']['fat']= $fat*$calcc;
                                                    $combo_arr['carb']['carb']= $carb*$calcc;
                                                    $combo_arr['carb']['calory'] = $calory*$calcc;  
                                                }
                                            }
                                            else{
                                                //die('else1');
                                                if($max_grams > 0){
                                                    $calc = $max_grams/50;
                                                } 
                                                                              
                                                $prot += $prot*$calc;
                                                $fat += $fat*$calc;
                                                $carb += $carb*$calc;
                                                $calory += $calory*$calc; 
                                            }  
                                        }
                                       
                                        if(!empty($combo_arr)){
                                            $prot =0;
                                            $fat = 0;
                                            $carb = 0;
                                            $calory = 0;
                                            foreach($combo_arr as $arr){
                                                $prot += $arr['prot'];
                                                $fat += $arr['fat'];
                                                $carb += $arr['carb'];
                                                $calory += $arr['carb'];
                                            }                                        
                                           
                                        }
                                    }
                                                                 
                                }
                            }else{
                                //die('else2');
                                $prot = $val->getProt();
                                $fat = $val->getFat();
                                $carb = $val->getCarb();
                                $calory = $val->getCalory();
                            }       

                            if($lang_id==1){
                                $name = $val->getProduct_name();   
                            }else{
                                $name = $val->getProduct_name_ar();
                                if(empty($val->getProduct_name_ar())){
                                    $name = $val->getProduct_name();
                                }                                
                            }
                      
                            if (isset($param->given_date)) {
                                #check day availability
                                if (in_array($day, $meal_availabiliy_days)) {
                                    
                                    $response[] = array(
                                        // 'meal_id'=>$val->getProduct_master_id(),
                                        'meal_id' => $meal_id,
                                        'main_meal_id' => $val->getMain_product_master_id(),
                                        'language_id' => $val->getLanguage_id(),
                                        'meal_type' => $val->getMain_product_category_id(),
                                        'meal_name' => $name,
                                        'meal_description' => $val->getProduct_description(),
                                        'max_meal_value' => $val->getMax_meal_value(),
                                        'product_nutrition' => $val->getProduct_nutrition(),
                                        'max_gram' => $max_grams,
                                        'selected_carb_gram' => $selected_carb,
                                        'selected_protien_gram' => $selected_protien,
                                        'calory' => $calory,
                                        // 'fiber' => $val->getFiber(),
                                        'fat' => $fat,
                                        'prot' => $prot,
                                        'carb' => $carb,
                                        'meal_image' => $this->getMediaDetailAction($val->getProduct_image()),
                                        //          'meal_combination'=>$combination,
                                        'meal_availabilty' => $meal_availabilty,
                                        'rating' => $this->getProductRatings($val->getMain_product_master_id()),
                                        'meal_type_object' => $meal_type_ar,
                                        'day' => $day,
                                        // 'raw_eggs' => $raw_eggs,
                                        // 'white_eggs' => $white_eggs,
                                        // 'prot' => $prot,
                                        // 'carb' => $carb,
                                        // 'calory'=>$calory,
                                        'combo_display' => $combo_display,
                                        'display_eggs' => $display_eggs,
                                        'display_prot_carbs' => $display_prot_carb,
                                        'is_meal_added' => $is_meal_added,
                                        'total_combo_count' => !empty($totalComboCount) ? $totalComboCount : [],
                                    );
                                }
                            } else {
                               // echo'<pre>';print_r($calory);
                                //die('lastelse');
                                $response[] = array(
                                            //  'meal_id'=>$val->getProduct_master_id(),
                                    'meal_id' => $meal_id,
                                    'main_meal_id' => $val->getMain_product_master_id(),
                                    'language_id' => $val->getLanguage_id(),
                                    'meal_type' => $val->getMain_product_category_id(),
                                    'meal_name' => $name,
                                    'meal_description' => $val->getProduct_description(),
                                    'product_nutrition' => $val->getProduct_nutrition(),
                                    'meal_image' => $this->getMediaDetailAction($val->getProduct_image()),
                                    //      'meal_combination'=>$combination,
                                    'meal_availabilty' => $meal_availabilty,
                                    'rating' => $this->getProductRatings($val->getMain_product_master_id()),
                                    'meal_type_object' => $meal_type_ar,
                                    'day' => $day,
                                    'max_gram' => $max_grams,
                                    'selected_carb_gram' => $selected_carb,
                                    'selected_protien_gram' => $selected_protien,
                                    // 'raw_eggs' => $raw_eggs,
                                    // 'white_eggs' => $white_eggs,
                                    // 'prot' => $prot,
                                    // 'carb' => $carb,
                                    // 'calory'=>$calory,
                                    'calory' => $calory,
                                    // 'fiber' => $val->getFiber(),
                                    'fat' => $fat,
                                    'prot' => $prot,
                                    'carb' => $carb,
                                    
                                    'combo_display' => $combo_display,
                                    'display_eggs' => $display_eggs,
                                    'display_prot_carbs' => $display_prot_carb,
                                    'is_meal_added' => $is_meal_added,
                                    'total_combo_count' => !empty($totalComboCount) ? $totalComboCount : [],
                                );
                            }
                        }
                    // }
                }
                $this->error = "SFD";
            } else {
                $this->error = "NRF";
            }
        } 
        else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->error = "NRF";
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Productmaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }

    /**
     * @Route("/ws/meallistv2/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function meallistv2Action($param) {

        //try{
        $this->title = "Meal List v2";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('lang_id', 'package_id'),
            ),
        );

        if ($this->validateData($param)) {

            $lang_id = $param->lang_id;
            $package_id = $param->package_id;
            $mealtype_id = !empty($param->mealtype_id) ? $param->mealtype_id : '';

            $order_id = !empty($param->order_id) ? $param->order_id : 0;
            $user_id = !empty($param->user_id) ? $param->user_id : 0;

            //  $day=!empty($param->given_date)?date('l',($param->given_date/1000)): date('l');
            //$day=!empty($param->given_date)?$param->given_date: date('l');
            $day = isset($param->given_date) ? date('w', strtotime($param->given_date)) : date('w');
            $em = $this->getDoctrine()->getManager();
            if ($day == 0) {
                // 0 = Sunday
                $day = 7;
            }
            $response = [] ;
            $meal_typeList = $this->fireQuery("SELECT * FROM `product_category_master` WHERE `is_deleted` = 0 and language_id = " . $lang_id);
            if ($meal_typeList) {
                foreach ($meal_typeList as $mkey => $mval) {
                    $mealtype_id = $mval['main_product_category_master_id'];
                    #get Products of package from 
                    $sql1 = "select main_product_id from product_package_relation where is_deleted = '0' and main_package_id = '$package_id' ";
                    $products_all = $this->fireQuery($sql1);

                    $main_product_ids = array();
                    if (!empty($products_all)) {
                        foreach ($products_all as $pack) {
                            $main_product_ids[] = $pack['main_product_id'];
                        }
                    }
                    $get_tc = NULL;
                    #get Products of package from tabel relation
                    if (!empty($mealtype_id)) {
                        $get_tc = $this->getDoctrine()->getManager()
                                ->getRepository("AdminBundle:Productmaster")
                                ->findBy(array("language_id" => $lang_id, "main_product_category_id" => $mealtype_id, "product_status" => 'active', "is_deleted" => 0), ['main_product_master_id' => 'DESC']);
                    }
                    $responseArr = [] ;
                    if (!empty($get_tc)) {
                        foreach ($get_tc as $key => $val) {
                            if (in_array($val->getMain_product_master_id(), $main_product_ids)) {

                                $main_product_id = $val->getMain_product_master_id();

                               
                                /*
                                  $get_tc_c = $this->getDoctrine()->getManager()
                                  ->getRepository("AdminBundle:Productcombinationmaster")
                                  ->findBy(array("product_master_id"=>$val->getMain_product_master_id(),'language_id'=>$lang_id,"is_deleted"=>0));
                                  $combination=array();
                                  if(!empty($get_tc_c)){
                                  foreach($get_tc_c as $key1=>$val1){
                                  $combination[] = array(
                                  'combination_id'=>$val1->getMain_combination_id(),
                                  'type'=>$val1->getProt_type(),
                                  'name'=>$val1->getProt_crab());
                                  }
                                  }
                                 */
                                $query = "SELECT * FROM `product_availability` JOIN days_master ON product_availability.main_days_id=days_master.main_days_master_id WHERE product_availability.is_deleted=0 AND days_master.is_deleted=0 AND days_master.language_id=$lang_id AND product_availability.main_product_id='" . $val->getMain_product_master_id() . "'";
                                $meal_avail = $this->fireQuery($query);

                                if (empty($meal_avail)) {
                                    $query = "SELECT * FROM `product_availability` JOIN days_master ON product_availability.main_days_id=days_master.main_days_master_id WHERE product_availability.is_deleted=0 AND days_master.is_deleted=0 AND product_availability.main_product_id='" . $val->getMain_product_master_id() . "'";
                                    $meal_avail = $this->fireQuery($query);
                                }

                                $meal_availabilty = array();
                                $meal_availabiliy_days = [];

                                if (!empty($meal_avail)) {
                                    foreach ($meal_avail as $ky => $vs) {
                                        $meal_availabilty[] = array(
                                            'product_availability_id' => $vs['product_availability_id'],
                                            'name' => $vs['days_name']
                                        );
                                        //$meal_availabiliy_days [] = $vs['days_name'];
                                        $meal_availabiliy_days [] = $vs['main_days_master_id'];
                                    }
                                }

                                $meal_type_ = $this->getDoctrine()->getManager()
                                        ->getRepository("AdminBundle:Productcategorymaster")
                                        ->findOneBy(array("main_product_category_master_id" => $val->getMain_product_category_id(), 'language_id' => $lang_id, "is_deleted" => 0));

                               

                                $mealArr = null;

                                $raw_eggs = 0;
                                $prot = 0;
                                $carb = 0;
                                $white_eggs = 0;
                               

                                if (isset($param->given_date)) {
                                    #check day availability


                                    if (in_array($day, $meal_availabiliy_days)) {

                                        $responseArr[] = array(
                                            //'meal_id'=>$val->getProduct_master_id(),
                                            'main_meal_id' => $val->getMain_product_master_id(),
                                            'language_id' => $val->getLanguage_id(),
                                            'meal_type' => $val->getMain_product_category_id(),
                                            'meal_name' => $val->getProduct_name(),
                                            'meal_description' => $val->getProduct_description(),
                                            'product_nutrition' => $val->getProduct_nutrition(),
                                            'meal_image' => $this->getMediaDetailAction($val->getProduct_image()),
                                            //          'meal_combination'=>$combination,
                                            'meal_availabilty' => $meal_availabilty,
                                           
                                            
                                            'day' => $day,
                                           
                                            
                                        );
                                    }
                                } else {

                                    $responseArr[] = array(
                                        //          'meal_id'=>$val->getProduct_master_id(),
                                        'main_meal_id' => $val->getMain_product_master_id(),
                                        'language_id' => $val->getLanguage_id(),
                                        'meal_type' => $val->getMain_product_category_id(),
                                        'meal_name' => $val->getProduct_name(),
                                        'meal_description' => $val->getProduct_description(),
                                        'product_nutrition' => $val->getProduct_nutrition(),
                                        'meal_image' => $this->getMediaDetailAction($val->getProduct_image()),
                                        //      'meal_combination'=>$combination,
                                        'meal_availabilty' => $meal_availabilty,
                                        
                                        
                                        'day' => $day,
                                        
                                        
                                    );
                                }
                            }
                        }
                    }
                    $response[] = array(
                        "meal_type_id"=>$mealtype_id ,
                        "meal_type_name"=>$mval['product_category_name'],
                        "list"=>$responseArr
                    );
                    $this->error = "SFD";
                }
            }
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->error = "NRF";
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Productmaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }

     /**
     * @Route("/ws/mealdetail/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function mealdetailAction($param) {
        $this->title = "Meal Detail";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('lang_id', 'product_id', 'package_id'),
            ),
        );

        if ($this->validateData($param)) {
            $lang_id = $param->lang_id;
            $product_id = $param->product_id;
            $package_id = $param->package_id;
            $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Productmaster")
                        ->findOneBy(['product_master_id' => $product_id]);
            
            $sql_combo_display = "select combo_type from product_combo_display_relation                 
                where is_deleted = '0' and product_id = '$product_id'  ";
            $combo_display = $this->fireQuery($sql_combo_display);
            
            $prot = 0;
            $carb = 0;
            $fat = 0;
            $calory = 0 ; 
            $comb = NULL ; 
            if(!empty($combo_display)){
                $type = $combo_display[0]['combo_type'];
            }else{
                $type = 'none';
            }            
            if($type != 'none' && !empty($type)){                
                $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
                    'is_deleted' => 0,
                    'product_master_id' => $get_tc->getMain_product_master_id(),
                    'type' => $type
                ]);
                if (!empty($comb)) {
                    foreach ($comb as $_comb) {    
                        $prot += (int) $_comb->getProtein();
                        $fat += (int) $_comb->getFat();
                        $carb += (int) $_comb->getCarb();
                        $calory += (int) $_comb->getCalory();
                    }
                } 
                // if($type == 'prot_carb'){
                //     // $selected_carb = $selected_pro_grams;
                //     // $selected_protien = $selected_carb_grams;
                //     $packageSql = "select MAX(package_master.package_max_grams_limit) as package_max_grams_limit from product_master Left join product_package_relation ON product_package_relation.main_product_id = product_master.product_master_id LEFT JOIN package_master ON package_master.package_master_id = product_package_relation.main_package_id where product_master.product_master_id = $product_id";
                //     $package = $this->fireQuery($packageSql);
                //     $max_grams = $package[0]['package_max_grams_limit']; 
                //     $calc = 1;
                //     if ($selected_protien > 50 || $selected_carb > 50) {
                //         // if($selected_protien <= $max_grams){
                //         //     $calc = $selected_protien/50;
                //         // }                                   
                //         $protp = $prot*$calc;
                //         $fatp= $fat*$calc;
                //         $carbp = $carb*$calc;
                //         $caloryp = $calory*$calc; 
                //         //die('if1');
                //         if($selected_carb <= $max_grams){
                //             $calc = $selected_carb/50;
                //         }                                   
                //         $protc = $prot*$calc;
                //         $fatc = $fat*$calc;
                //         $carbc = $carb*$calc;
                //         $caloryc = $calory*$calc;
                //         //die('if2');
                //         $prot = $protc+$protp;
                //         $fat = $fatc+$fatp;
                //         $carb = $carbc+$carbp;
                //         $calory = $caloryc+$caloryp;
                //     }
                //     else{
                //         //die('else1');
                //         if($max_grams > 0){
                //             $calc = $max_grams/50;
                //         }                                    
                //         $prot = $prot*$calc;
                //         $fat = $fat*$calc;
                //         $carb = $carb*$calc;
                //         $calory = $calory*$calc; 
                //     }                               
                // } 
                if($type == 'prot_carb'){
                    $packageSql = "select package_max_grams_limit from package_master where package_master_id = $package_id";
                    // $packageSql = "select MAX(package_master.package_max_grams_limit) as package_max_grams_limit, package_master.package_master_id from product_master Left join product_package_relation ON product_package_relation.main_product_id = product_master.product_master_id LEFT JOIN package_master ON package_master.package_master_id = product_package_relation.main_package_id where product_master.product_master_id = $product_id";
                    $package = $this->fireQuery($packageSql);
                    $max_grams = $package[0]['package_max_grams_limit']; 
                    $calc = 1;
                    if($max_grams > 0){
                        $calc = $max_grams/50;
                    }                                    
                    $prot = $prot*$calc;
                    $fat = $fat*$calc;
                    $carb = $carb*$calc;
                    $calory = $calory*$calc;                                
                }
            }else{
                $prot = $get_tc->getProt();
                $fat = $get_tc->getFat();
                $carb = $get_tc->getCarb();
                $calory = $get_tc->getCalory();
            } 
            $response = [
                'name' => $get_tc->getProduct_name(),
                'name_ar' => $get_tc->getProduct_name_ar(),
                'product_description' => $get_tc->getProduct_description(),
                'calory' => $calory,
                'fat' => $fat,
                'prot' => $prot,
                'carb' => $carb,
                'meal_image' => $this->getMediaDetailAction($get_tc->getProduct_image()),
            ];
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->error = "NRF";
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Productmaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
    }


    /**
     * @Route("/ws/addProCab/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function addProCabAction($param) {

        //try{
            $this->title = "Meal's carb and protien filter";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('lang_id', 'package_id', 'pro', 'carb'),
                ),
            );
    
            if ($this->validateData($param)) {
    
                $lang_id = $param->lang_id;
                $package_id = $param->package_id;
                $pro =  $param->pro;
                $carb = $param->carb;
                $mealtype_id = $param->mealtype_id;

                $get_tc = NULL;
                #get Products of package from tabel relation
                if (!empty($mealtype_id)) {
                    $get_tc = $this->getDoctrine()->getManager()
                    ->getRepository("AdminBundle:Productmaster")
                    ->findBy(array( "main_product_category_id" => $mealtype_id, "product_status" => 'active', "is_deleted" => 0,'language_id'=>1), ['main_product_master_id' => 'DESC']);
                } 

                print_r($get_tc);
                exit;
                
    //             if (!empty($get_tc)) {
    
    //                 foreach ($get_tc as $key => $val) {
                        
    
    //                     if (in_array($val->getMain_product_master_id(), $main_product_ids)) {
    
    //                         $main_product_id = $val->getMain_product_master_id();
    
    //                         $sql_combo_display = "select combo_type from product_combo_display_relation                 
    //                             where is_deleted = '0' and product_id = '$main_product_id'  ";
    //                         $combo_display = $this->fireQuery($sql_combo_display);
    
    //                         $display_prot_carb = false;
    //                         $display_eggs = false;
    
    //                         if (empty($combo_display)) {
    //                             $combo_display = null;
    //                         } else {
    //                             foreach ($combo_display as $_combo_display) {
    //                                 if ($_combo_display['combo_type'] == 'prot_carb') {
    //                                     $display_prot_carb = true;
    //                                 }
    //                                 if ($_combo_display['combo_type'] == 'eggs') {
    //                                     $display_eggs = true;
    //                                 }
    //                             }
    //                         }
    //                         /*
    //                           $get_tc_c = $this->getDoctrine()->getManager()
    //                           ->getRepository("AdminBundle:Productcombinationmaster")
    //                           ->findBy(array("product_master_id"=>$val->getMain_product_master_id(),'language_id'=>$lang_id,"is_deleted"=>0));
    //                           $combination=array();
    //                           if(!empty($get_tc_c)){
    //                           foreach($get_tc_c as $key1=>$val1){
    //                           $combination[] = array(
    //                           'combination_id'=>$val1->getMain_combination_id(),
    //                           'type'=>$val1->getProt_type(),
    //                           'name'=>$val1->getProt_crab());
    //                           }
    //                           }
    //                          */
    //                         $week_query =  $days_query = '' ;
    //                         if($week_id != ''){
    //                             $week_query = " AND week_id  like '%week".$week_id."%'" ; 
    //                         }
    //                         if($days_master_id != '' ){
    //                             $days_query = ' AND main_days_id  = ' . $days_master_id . ' ' ;
    //                         }
    //                         $query = "SELECT * FROM `product_availability` JOIN days_master ON product_availability.main_days_id=days_master.main_days_master_id WHERE product_availability.is_deleted=0 AND days_master.is_deleted=0 AND days_master.language_id=$lang_id AND product_availability.main_product_id='" . $val->getMain_product_master_id() . "'" . $week_query . $days_query;
    //                         $meal_avail = $this->fireQuery($query);
    
    //                         if (empty($meal_avail)) {
    //                             $query = "SELECT * FROM `product_availability` JOIN days_master ON product_availability.main_days_id=days_master.main_days_master_id WHERE product_availability.is_deleted=0 AND days_master.is_deleted=0 AND product_availability.main_product_id='" . $val->getMain_product_master_id() . "'" . $week_query . $days_query;
    //                             $meal_avail = $this->fireQuery($query);
    //                         }
    
    // //echo $query ;  exit ; 
    //                         $meal_availabilty = array();
    //                         $meal_availabiliy_days = [];
    
    //                         if (!empty($meal_avail)) {
    //                             foreach ($meal_avail as $ky => $vs) {
    //                                 $meal_availabilty[] = array(
    //                                     'product_availability_id' => $vs['product_availability_id'],
    //                                     'week' => $vs['week_id'],
    //                                     'name' => $vs['days_name']
    //                                 );
    //                                 //$meal_availabiliy_days [] = $vs['days_name'];
    //                                 $meal_availabiliy_days [] = $vs['main_days_master_id'];
    //                             }
    //                         }
    
    //                         if(($meal_availabilty != NULL && $week_id != '' && $days_master_id != '' ) || ($week_id == '' && $days_master_id == '') ){
    
    
                            
    
    //                             $meal_type_ = $this->getDoctrine()->getManager()
    //                                     ->getRepository("AdminBundle:Productcategorymaster")
    //                                     ->findOneBy(array("main_product_category_master_id" => $val->getMain_product_category_id(), 'language_id' => $lang_id, "is_deleted" => 0));
    
    //                             $meal_type_ar = null;
    //                             if ($meal_type_) {
    //                                 $meal_type_ar = array('main_meal_type_id' => $meal_type_->getMain_product_category_master_id(),
    //                                     'meal_name' => $meal_type_->getProduct_category_name(),
    //                                     'count_in' => $meal_type_->getCount_in()
    //                                 );
    //                             }
    
    //                             $mealArr = null;
    
    //                             $prot = 0;
    //                             $carb = 0;
    //                             $fat = 0;
    //                             $calory = 0 ; 
    //                             $comb = NULL ; 
    //                             $type = $combo_display[0]['combo_type'];
    //                             if($type != 'none'){
    //                                 if (isset($package_id) && $type == 'package_wise') {                                
    //                                     $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
    //                                         'is_deleted' => 0,
    //                                         'package_master_id' => $package_id,
    //                                         'product_master_id' => $val->getMain_product_master_id(),
    //                                         'type' => $type
    //                                     ]);
    //                                 }
    //                                 else{
    //                                     $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
    //                                         'is_deleted' => 0,
    //                                         'product_master_id' => $val->getMain_product_master_id(),
    //                                         'type' => $type
    //                                     ]);
    //                                 }
    //                                 // print_r($comb); die;
    //                                 if (!empty($comb)) {
    //                                     foreach ($comb as $_comb) {    
    //                                         $prot += (int) $_comb->getProtein();
    //                                         $fat += (int) $_comb->getFat();
    //                                         $carb += (int) $_comb->getCarb();
    //                                         $calory += (int) $_comb->getCalory();
    //                                     }
    //                                 }  
    //                                 if($type == 'prot_carb'){
    //                                     $packageSql = "select package_max_grams_limit from package_master where package_master_id = $package_id";
    //                                     $package = $this->fireQuery($packageSql);
    //                                     $max_grams = $package[0]['package_max_grams_limit']; 
    //                                     $calc = 1;
    //                                     if($max_grams > 0){
    //                                         $calc = $max_grams/50;
    //                                     }                                    
    //                                     $prot = $prot*$calc;
    //                                     $fat = $fat*$calc;
    //                                     $carb = $carb*$calc;
    //                                     $calory = $calory*$calc;                                
    //                                 }
    //                             }else{
    //                                 $prot = $val->getProt();
    //                                 $fat = $val->getFat();
    //                                 $carb = $val->getCarb();
    //                                 $calory = $val->getCalory();
    //                             }       
    
    //                             if($lang_id==1){
    //                                 $name = $val->getProduct_name();   
    //                             }else{
    //                                 $name = $val->getProduct_name_ar();
    //                                 if(empty($val->getProduct_name_ar())){
    //                                     $name = $val->getProduct_name();
    //                                 }                                
    //                             }
    
    //                             if (isset($param->given_date)) {
    //                                 #check day availability
    //                                 if (in_array($day, $meal_availabiliy_days)) {
                                       
    //                                     $response[] = array(
    //                                         //'meal_id'=>$val->getProduct_master_id(),
    //                                         'main_meal_id' => $val->getMain_product_master_id(),
    //                                         'language_id' => $val->getLanguage_id(),
    //                                         'meal_type' => $val->getMain_product_category_id(),
    //                                         'meal_name' => $name,
    //                                         'meal_description' => $val->getProduct_description(),
    //                                         'max_meal_value' => $val->getMax_meal_value(),
    //                                         'product_nutrition' => $val->getProduct_nutrition(),
    //                                         'max_gram' => $max_grams,
    //                                         'calory' => $calory,
    //                                         // 'fiber' => $val->getFiber(),
    //                                         'fat' => $fat,
    //                                         'prot' => $prot,
    //                                         'carb' => $carb,
    //                                         'meal_image' => $this->getMediaDetailAction($val->getProduct_image()),
    //                                         //          'meal_combination'=>$combination,
    //                                         'meal_availabilty' => $meal_availabilty,
    //                                         'rating' => $this->getProductRatings($val->getMain_product_master_id()),
    //                                         'meal_type_object' => $meal_type_ar,
    //                                         'day' => $day,
    //                                         // 'raw_eggs' => $raw_eggs,
    //                                         // 'white_eggs' => $white_eggs,
    //                                         // 'prot' => $prot,
    //                                         // 'carb' => $carb,
    //                                         // 'calory'=>$calory,
    //                                         'combo_display' => $combo_display,
    //                                         'display_eggs' => $display_eggs,
    //                                         'display_prot_carbs' => $display_prot_carb
    //                                     );
    //                                 }
    //                             } else {
    
    //                                 $response[] = array(
    //                                     //          'meal_id'=>$val->getProduct_master_id(),
    //                                     'main_meal_id' => $val->getMain_product_master_id(),
    //                                     'language_id' => $val->getLanguage_id(),
    //                                     'meal_type' => $val->getMain_product_category_id(),
    //                                     'meal_name' => $name,
    //                                     'meal_description' => $val->getProduct_description(),
    //                                     'product_nutrition' => $val->getProduct_nutrition(),
    //                                     'meal_image' => $this->getMediaDetailAction($val->getProduct_image()),
    //                                     //      'meal_combination'=>$combination,
    //                                     'meal_availabilty' => $meal_availabilty,
    //                                     'rating' => $this->getProductRatings($val->getMain_product_master_id()),
    //                                     'meal_type_object' => $meal_type_ar,
    //                                     'day' => $day,
    //                                     'max_gram' => $max_grams,
    //                                     // 'raw_eggs' => $raw_eggs,
    //                                     // 'white_eggs' => $white_eggs,
    //                                     // 'prot' => $prot,
    //                                     // 'carb' => $carb,
    //                                     // 'calory'=>$calory,
    //                                     'calory' => $calory,
    //                                     // 'fiber' => $val->getFiber(),
    //                                     'fat' => $fat,
    //                                     'prot' => $prot,
    //                                     'carb' => $carb,
    //                                     'combo_display' => $combo_display,
    //                                     'display_eggs' => $display_eggs,
    //                                     'display_prot_carbs' => $display_prot_carb
    //                                 );
    //                             }
    
    //                         }
    //                     }
    //                 }
    //                 $this->error = "SFD";
    //             } else {
    //                 $this->error = "NRF";
    //             }
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->error = "NRF";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Productmaster();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
            /* }catch(\Exception $e){
              $this->error = "SFND" ;
              $this->data = false ;
              return $this->responseAction() ;
              } */
        }
}

?>
