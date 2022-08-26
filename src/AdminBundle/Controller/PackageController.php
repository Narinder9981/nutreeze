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
use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Productmaster;
use AdminBundle\Entity\Packagemaster;
use AdminBundle\Entity\Productcombinationmaster;
use AdminBundle\Entity\Subpackagemaster;
use AdminBundle\Entity\Packageforrelation;
use AdminBundle\Entity\Productcategorypackagerelation;
use AdminBundle\Entity\Subpackagecombinationmaster;
use AdminBundle\Entity\Subpackagepricemaster;
use AdminBundle\Entity\Packagepercategorymaster;
use AdminBundle\Entity\Packageupgradepricegram;
use AdminBundle\Entity\Subpackagedefaultvalues;

class PackageController extends BaseController {

    private $upload_doc_dir = "/bundles/design/uploads/packages/";

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
     * @Route("/package")
     * @Template()
     */
    public function indexAction() {

        $languages = $this->getLanguages();
        $sql = "select main_package_master_id,package_grams,package_pause,sort_order from package_master where is_deleted = '0' group by main_package_master_id";
        $main_product = $this->fireQuery($sql);
        $packages = null;

        if (!empty($main_product)) {
            foreach ($main_product as $product_) {
                $lang_wise = null;


                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select * from package_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and main_package_master_id = '" . $product_['main_package_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_wise[] = array('package_name' => $lang_goal[0]['package_name'], 'lang_id' => $lang->getLanguage_master_id());
                        } else {
                            $lang_wise[] = array('package_name' => '-', 'lang_id' => $lang->getLanguage_master_id());
                        }
                    }
                }

                $packages[] = array(
                    'main_package_master_id' => $product_['main_package_master_id'],
                    'package_grams' => $product_['package_grams'],
                    'lang_wise' => $lang_wise,
                    'package_pause' => $product_['package_pause'],
                    'sort_order' => $product_['sort_order']
                );
            }
        }
//  echo"<pre>";print_r($packages);exit;
        return array('packages' => $packages, 'languages' => $languages);
    }

    /**
     * @Route("/package/addPackage/{main_package_id}",defaults={"main_package_id"="0"})
     * @Template()
     */
    public function addPackageAction($main_package_id) {

        $sql_pk_cat = "select * from product_category_master 
            where is_deleted = '0'";
        $categories = $this->fireQuery($sql_pk_cat);

        $languages = $this->getLanguages();

        $sql_pk_for = "select * from package_for_master p_f_m LEFT JOIN package_for_relation ON package_for_relation.main_package_for_id = p_f_m.main_package_for_master_id and package_for_relation.is_deleted = 0 and package_for_relation.main_package_id = '$main_package_id' 
        where p_f_m.is_deleted = '0'  and p_f_m.main_package_for_master_id  IN (SELECT package_for_id FROM `package_for_with_package_relation` WHERE `main_package_id` =  '$main_package_id' AND `is_deleted` = 0) order by p_f_m.days desc";
      //  echo $sql_pk_for;
        $product_for = $this->fireQuery($sql_pk_for);
        //print_r($product_for);
        $sql = "select * from package_master p_m                
                where p_m.is_deleted = '0' and p_m.main_package_master_id = '$main_package_id' ";
        $main_package = $this->fireQuery($sql);

        $upgrade_gram_Price = $unitPrice = null;

        if (!empty($main_package)) {

            $unitPrice = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagepercategorymaster")->findBy(
                [
                    "is_deleted" => 0,
                    "package_id" => $main_package_id
                ]
            );
            $upgrade_gram_Price = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageupgradepricegram")->findBy(
                [
                    "is_deleted" => 0,
                    "package_id" => $main_package_id
                ]
            );
            //get package for types
            #getCombination for both lang it will be same
//            $categories_arr = [];
//            $sub_package_categoryt_list = [];
//            if($categories){
//                foreach($categories as $ckey=>$cval){
//                    $categories_arr[] = array(
//                        "main_catgeory_id"=>$cval->getMain_category_id(),
//                        "category_name"=>$cval->getCategoryName(),
//                        "sub_package_category_list"=>$sub_package_categoryt_list
//                    );
//                }
//            }

            $sql_combo = "select * from sub_package_master p_c_m                
                    where p_c_m.is_deleted = '0' and p_c_m.is_archive ='0' and p_c_m.main_package_id = '$main_package_id' ";
            $sub_package = $this->fireQuery($sql_combo);

            if (!empty($sub_package)) {
                foreach ($sub_package as $sub_key => $sub_val) {
                    $sub_p_id = $sub_val['main_sub_package_id'];

                    $price_array = $meal_type = $meal_typeID = null;

                    $sql_combo_price = "select * from sub_package_price_master p_p_m                
                    where p_p_m.is_deleted = '0' and p_p_m.sub_package_id = '$sub_p_id' ";
                    $sub_package_price = $this->fireQuery($sql_combo_price);
                    
                    if (!empty($sub_package_price)) {
                        foreach ($sub_package_price as $price_sub) {

                            $duration = $price_sub['duration_type'];

                            $price_array[] = array(
                                "duration" => $duration,
                                "price" => $price_sub['price']
                            );
                            //  $sub_package[$sub_key][$duration] = $price_sub['price'];
                            $sub_package[$sub_key]['price_array'] = $price_array;
                        }
                    } else {
                        $sub_package[$sub_key]['price_array'] = null;
//                      $sub_package[$sub_key]['monthly'] = 0;
//                      $sub_package[$sub_key]['weekly'] = 0;
                    }
                    $sql_combo_meal_type = "SELECT *  FROM `sub_package_combination_master` WHERE `sub_package_id` = $sub_p_id AND `is_deleted` = 0";
                    $sql_combo_meal_type = $this->fireQuery($sql_combo_meal_type);
                    if($sql_combo_meal_type){
                        foreach($sql_combo_meal_type as $mkey=>$mval){
                            $meal_typeID[] = $mval['meal_type_id'];
                            $meal_type[] = array(
                                "meal_type_id"=>$mval['meal_type_id'],
                                "meal_value"=>$mval['meal_value']
                            );
                             $sub_package[$sub_key]['meal_type'] = $meal_type;
                             $sub_package[$sub_key]['meal_type_ID'] = $meal_typeID;
                        }
                        
                    }
                    else{
                         $sub_package[$sub_key]['meal_type'] = NULL;
                         $sub_package[$sub_key]['meal_type_ID'] = NULL;
                    }
                }
            }

//          echo"<pre>";print_r($sub_package);exit;
            foreach ($main_package as $key => $value) {
                $img_url = $this->getmediaAction($value['img_id']);
                $main_package[$key]['sub_package'] = $sub_package;
                $main_package[$key]['img_url'] = $img_url;
            }
        }
//        echo"<pre>";
//       print_r($main_package);
//      exit;
        return array('main_package' => $main_package, 
            'language_list' => $languages,
            'product_for' => $product_for,
            'categories' => $categories ,
            'unitPrice' => $unitPrice , 
            "upgrade_gram_Price"=>$upgrade_gram_Price);
    }
    /**
     * @Route("/package/adddefaultvaluesubpackage/{main_package_id}/{sub_package_id}/{language_id}",defaults={"main_package_id"="0"})
     * @Template()
     */
    public function adddefaultvaluesubpackageAction($main_package_id,$sub_package_id,$language_id) {
        $language_id=1;
        $packageInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array("main_package_master_id"=>$main_package_id,"language_id"=>$language_id));
        $subpackageInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagemaster")->findOneBy(array("main_sub_package_id"=>$sub_package_id,"language_id"=>$language_id));
        $package_name = $sub_package_name = '' ;
        $days_master_info = $this->getDoctrine()->getRepository("AdminBundle:Daysmaster")->findBy(array("is_deleted"=>0,"language_id"=>$language_id));
        if(!empty($subpackageInfo) && !empty($packageInfo)){
            $package_name = $packageInfo->getPackage_name();

            $query = "SELECT sub_package_combination_master.*, product_category_master.product_category_name FROM `sub_package_combination_master` join product_category_master on sub_package_combination_master.meal_type_id = product_category_master.main_product_category_master_id where sub_package_combination_master.sub_package_id = ".$sub_package_id." and sub_package_combination_master.is_deleted = 0 and language_id=1 group by sub_package_combination_master_id";
            $list = $this->fireQuery($query);
        }
        $product_category_query = "SELECT * FROM `product_category_master` where language_id=1 and is_deleted = 0 and main_product_category_master_id IN (SELECT product_category_id  FROM `product_category_package_relation` WHERE `package_id` = ".$main_package_id." and is_deleted = 0) group by main_product_category_master_id";
        $product_category_list = $this->fireQuery($product_category_query);
        if($days_master_info){
            foreach($days_master_info as $daykey=>$dayval){
                $days_arr[] = array(
                    "days_master_id"=>$dayval->getDays_master_id(),
                    "days_name"=>$dayval->getDays_name(),
                );
                if($product_category_list){
                    

                    foreach($product_category_list as $prkey=>$prval){
                        $product_arr = $product_arr_w1 = $product_arr_w2 = [] ;
                        //$productQuery = "SELECT * FROM `product_master` where is_deleted = 0  and product_status = 'active' and  main_product_category_id = ".$prval['main_product_category_master_id']." and main_product_master_id IN (SELECT main_product_id  FROM `product_availability` WHERE `main_days_id` = ".$dayval->getDays_master_id()." AND `is_deleted` = 0)   and language_id = ".$language_id." ORDER BY `product_master`.`main_product_master_id` ASC";
						 $productQuery = "SELECT product_master.* FROM `product_master`  join product_package_relation on product_package_relation.main_product_id = product_master.main_product_master_id where product_master.is_deleted = 0  and product_status = 'active' and  product_master.main_product_category_id = ".$prval['main_product_category_master_id']." and product_master.main_product_master_id IN (SELECT main_product_id  FROM `product_availability` WHERE `main_days_id` = ".$dayval->getDays_master_id()." AND `is_deleted` = 0)   and product_master.language_id = ".$language_id." and product_package_relation.is_deleted = 0 and product_package_relation.main_package_id = ".$main_package_id."
ORDER BY `product_master`.`main_product_master_id` ASC";
//echo "<br>----------------------------<br><br>". $productQuery ; 
                        $productList = $this->fireQuery($productQuery);
                        $sub_package_default_values = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagedefaultvalues")
                                ->findBy(array("is_deleted"=>0,"sub_package_id"=>$sub_package_id,"day_id"=>$dayval->getDays_master_id(),"meal_type_id"=>$prval['main_product_category_master_id'] ));
                        $selectedProductArr = $selectedProductArrUpgrade = [] ;
                        $selectedProductArrW1 = $selectedProductArrUpgradeW1 = [] ;
                        $selectedProductArrW2 = $selectedProductArrUpgradeW2 = [] ;
                        if($sub_package_default_values){
                            foreach($sub_package_default_values as $skey=>$sval){
                                if($sval->getDefault_value_flag() == 'default'){
                                    $selectedProductArr[] = $sval->getMeal_value();
                                    if($sval->getWeek_id() == 'week1,week3,week5'){
                                        $selectedProductArrW1[] = $sval->getMeal_value();
                                    }
                                    if($sval->getWeek_id() == 'week2,week4'){
                                        $selectedProductArrW2[] = $sval->getMeal_value();
                                    }
                                }
                                if($sval->getDefault_value_flag() == 'upgrade'){
                                    $selectedProductArrUpgrade[] = $sval->getMeal_value();
                                    if($sval->getWeek_id() == 'week1,week3,week5'){
                                        $selectedProductArrUpgradeW1[] = $sval->getMeal_value();
                                    }
                                    if($sval->getWeek_id() == 'week2,week4'){
                                        $selectedProductArrUpgradeW2[] = $sval->getMeal_value();
                                    }
                                }
                            }
                        }
                       // echo "<br> Product cnt " . count($productList) . "<br>" ; 
                        if($productList){
                            foreach($productList as $productKey=>$productVal){
                                $selected_flag =  $upgrade_selected_flag = $selected_flag_w2 = $selected_flag_w1 =  $upgrade_selected_flag_w1 =$upgrade_selected_flag_w2 = false ;
                                if(in_array($productVal['main_product_master_id'] , $selectedProductArr)){
                                    $selected_flag = true ;
                                }
                                if(in_array($productVal['main_product_master_id'] , $selectedProductArrUpgrade)){
                                    $upgrade_selected_flag = true ;
                                }

                                if(in_array($productVal['main_product_master_id'] , $selectedProductArrW1)){
                                    $selected_flag_w1 = true ;
                                }
                                if(in_array($productVal['main_product_master_id'] , $selectedProductArrUpgradeW1)){
                                    $upgrade_selected_flag_w1 = true ;
                                }

                                if(in_array($productVal['main_product_master_id'] , $selectedProductArrW2)){
                                    $selected_flag_w2 = true ;
                                }
                                if(in_array($productVal['main_product_master_id'] , $selectedProductArrUpgradeW2)){
                                    $upgrade_selected_flag_w2 = true ;
                                }
                                $product_arr[] = array(
                                    "product_name"=>$productVal['product_name'],
                                    "main_product_id"=>$productVal['main_product_master_id'],
                                    "selected_flag"=>$selected_flag,
                                    "selected_flag_w1"=>$selected_flag_w1,
                                    "selected_flag_w2"=>$selected_flag_w2,
                                    "upgrade_selected_flag"=>$upgrade_selected_flag,
                                    "upgrade_selected_flag_w1"=>$upgrade_selected_flag_w1,
                                    "upgrade_selected_flag_w2"=>$upgrade_selected_flag_w2
                                );
                                $product_availability_w2 = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productavailability")->findOneBy(array("main_product_id"=>$productVal['main_product_master_id'],"main_days_id"=>$dayval->getDays_master_id(),"week_id"=>'week2,week4',"is_deleted"=>0)) ; 
                                if( $product_availability_w2 ){
                                    $product_arr_w2[] = array(
                                        "product_name"=>$productVal['product_name'],
                                        "main_product_id"=>$productVal['main_product_master_id'],
                                        "selected_flag"=>$selected_flag,
                                        "selected_flag_w1"=>$selected_flag_w1,
                                        "selected_flag_w2"=>$selected_flag_w2,
                                        "upgrade_selected_flag"=>$upgrade_selected_flag,
                                        "upgrade_selected_flag_w1"=>$upgrade_selected_flag_w1,
                                        "upgrade_selected_flag_w2"=>$upgrade_selected_flag_w2
                                    );
                                }
                                $product_availability_w1 = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productavailability")->findOneBy(array("main_product_id"=>$productVal['main_product_master_id'],"main_days_id"=>$dayval->getDays_master_id(),"week_id"=>'week1,week3,week5',"is_deleted"=>0)) ; 
                               
                                if( $product_availability_w1 ){
                                    $product_arr_w1[] = array(
                                        "product_name"=>$productVal['product_name'],
                                        "main_product_id"=>$productVal['main_product_master_id'],
                                        "selected_flag"=>$selected_flag,
                                        "selected_flag_w1"=>$selected_flag_w1,
                                        "selected_flag_w2"=>$selected_flag_w2,
                                        "upgrade_selected_flag"=>$upgrade_selected_flag,
                                        "upgrade_selected_flag_w1"=>$upgrade_selected_flag_w1,
                                        "upgrade_selected_flag_w2"=>$upgrade_selected_flag_w2
                                    );
                                }
                            }
                           
                            $passindex =  $prval['main_product_category_master_id']  ;
                            /* echo "<br><br> Index" . $passindex . "<br>" ; 
                             var_dump( $prval) ; */
                            $days_arr[$daykey][$passindex] = $product_arr ;
                            $days_arr[$daykey]['w1_'.$passindex] = $product_arr_w1 ;
                            $days_arr[$daykey]['w2_'.$passindex] = $product_arr_w2 ;
                            $days_arr[$daykey]["selected_" .$passindex] = $selectedProductArr ;
                            $days_arr[$daykey]["selected_upgrade_" .$passindex] = $selectedProductArrUpgrade ;
                            
                            $days_arr[$daykey]["selected_w2_" .$passindex] = $selectedProductArrW2 ;
                            $days_arr[$daykey]["selected_upgrade_w2_" .$passindex] = $selectedProductArrUpgradeW2 ;
                            
                            $days_arr[$daykey]["selected_w1_" .$passindex] = $selectedProductArrW1 ;
                            $days_arr[$daykey]["selected_upgrade_w1_" .$passindex] = $selectedProductArrUpgradeW1 ;
                             
                           
                        }
                        
                       

                        
                    }
                    
                }
                
                
            }
        }
     
      
        return array(
            'main_package_id' => $main_package_id,
            'sub_package_id' => $sub_package_id,
            "package_name"=>$package_name,"sub_package_name"=>$sub_package_name,"days"=>$days_arr,"sub_package_meal_config"=>$list);
    }
     /**
     * @Route("/package/savedefaultmealsubpackage")
     * @Template()
     */
    public function savedefaultmealsubpackageAction(Request $req) {
      //  var_dump($_REQUEST);
        $em = $this->getDoctrine()->getManager();
        $language_id = 1 ;
        $main_package_id =  $_REQUEST['main_package_id'];
        $sub_package_id =  $_REQUEST['sub_package_id'];
        // Deleted All entries of this Sub Package then insert 
        $sub_package_default_values = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagedefaultvalues")->findBy(array("is_deleted"=>0,"sub_package_id"=>$sub_package_id));
        if($sub_package_default_values){
            foreach($sub_package_default_values as $subval){
                $subval->setIs_deleted(1);
                $em->flush();
            }
        }
        $product_category_query = "SELECT * FROM `product_category_master` where is_deleted = 0 and main_product_category_master_id IN (SELECT product_category_id  FROM `product_category_package_relation` WHERE `package_id` = ".$main_package_id." and is_deleted = 0) group by main_product_category_master_id";
        $product_category_list = $this->fireQuery($product_category_query);
        $days_master_info = $this->getDoctrine()->getRepository("AdminBundle:Daysmaster")->findBy(array("is_deleted"=>0,"language_id"=>$language_id));
        if($days_master_info){
            foreach($days_master_info as $dayval){
                 if($product_category_list){
                    foreach($product_category_list as $prkey=>$prval){ 
                        if(isset($_REQUEST['w1_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']])){                          
                            $mealValuesArr = $_REQUEST['w1_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']] ;
                            for ( $i = 0 ; $i < count($mealValuesArr) ; $i++){
                                $sub_package_default_value = new Subpackagedefaultvalues();
                                $sub_package_default_value->setSub_package_id($sub_package_id);
                                $sub_package_default_value->setWeek_id('week1,week3,week5');
                                $sub_package_default_value->setMeal_type_id($prval['product_category_master_id']);
                                $sub_package_default_value->setDay_id($dayval->getDays_master_id());
                                $sub_package_default_value->setMeal_value($mealValuesArr[$i]);
                                $sub_package_default_value->setDefault_value_flag('default');
                                $em->persist($sub_package_default_value);
                                $em->flush();
                            }
                        }
                        
                        if(isset($_REQUEST['w1_up_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']])){                          
                           
                            $mealValuesArr = $_REQUEST['w1_up_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']] ;
                            for ( $i = 0 ; $i < count($mealValuesArr) ; $i++){
                                $sub_package_default_value = new Subpackagedefaultvalues();
                                $sub_package_default_value->setSub_package_id($sub_package_id);
                                $sub_package_default_value->setWeek_id('week1,week3,week5');
                                $sub_package_default_value->setMeal_type_id($prval['product_category_master_id']);
                                $sub_package_default_value->setDay_id($dayval->getDays_master_id());
                                $sub_package_default_value->setMeal_value($mealValuesArr[$i]);
                                $sub_package_default_value->setDefault_value_flag('upgrade');
                                $em->persist($sub_package_default_value);
                                $em->flush();
                               
                            }
                        }

                        // ----------------week 2 -----------------

                        if(isset($_REQUEST['w2_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']])){                          
                            $mealValuesArr = $_REQUEST['w2_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']] ;
                            for ( $i = 0 ; $i < count($mealValuesArr) ; $i++){
                                $sub_package_default_value = new Subpackagedefaultvalues();
                                $sub_package_default_value->setSub_package_id($sub_package_id);
                                $sub_package_default_value->setWeek_id('week2,week4');
                                $sub_package_default_value->setMeal_type_id($prval['product_category_master_id']);
                                $sub_package_default_value->setDay_id($dayval->getDays_master_id());
                                $sub_package_default_value->setMeal_value($mealValuesArr[$i]);
                                $sub_package_default_value->setDefault_value_flag('default');
                                $em->persist($sub_package_default_value);
                                $em->flush();
                            }
                        }
                        
                        if(isset($_REQUEST['w2_up_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']])){                          
                           
                            $mealValuesArr = $_REQUEST['w2_up_days_'.$dayval->getDays_master_id()."_".$prval['product_category_master_id']] ;
                            for ( $i = 0 ; $i < count($mealValuesArr) ; $i++){
                                $sub_package_default_value = new Subpackagedefaultvalues();
                                $sub_package_default_value->setSub_package_id($sub_package_id);
                                $sub_package_default_value->setWeek_id('week2,week4');
                                $sub_package_default_value->setMeal_type_id($prval['product_category_master_id']);
                                $sub_package_default_value->setDay_id($dayval->getDays_master_id());
                                $sub_package_default_value->setMeal_value($mealValuesArr[$i]);
                                $sub_package_default_value->setDefault_value_flag('upgrade');
                                $em->persist($sub_package_default_value);
                                $em->flush();
                               
                            }
                        }
                    }
                 }
            }
        }
        $this->get('session')->getFlashBag()->set('success_msg', 'Default Values updated');
        return $this->redirectToRoute('admin_package_adddefaultvaluesubpackage', array("main_package_id" => $main_package_id, "sub_package_id" => $sub_package_id,"language_id"=>$language_id));
    }

    /**
     * @Route("/package/save")
     * @Template()
     */
    public function savePackageAction(Request $req) {
        $em = $this->getDoctrine()->getManager();

        // echo"<pre>";print_r($_REQUEST);exit;
        if ($req->request->get('submit') != null) {

            $sql_get_package_for = "select name_db from package_for_master where is_deleted = 0 group by main_package_for_master_id ";

            $package_for_data_stmt = $em->getConnection()->prepare($sql_get_package_for);

            $package_for_data_stmt->execute();
            $package_for_data = $package_for_data_stmt->fetchAll();

            $package_name = $req->request->get('price_sub_of');

            $package_name = $req->request->get('package_name');

            $off_days_allowed = !empty($req->request->get('off_days_allowed')) ? $req->request->get('off_days_allowed') : 0;

            $affect_festival = $req->request->get('affect_festival');
            $package_type = $req->request->get('package_type');
            $description = $req->request->get('description');
            $package_gram = $req->request->get('package_gram');
            $package_gram_limit = $req->request->get('package_gram_limit');
            $gram_label = $req->request->get('gram_label');
            $package_meals = $req->request->get('package_meals');
            $package_snakes = $req->request->get('package_snakes');
            $main_package_master_id = $req->request->get('main_package_master_id');
            $language_id = $req->request->get('language_id');
            //$grams = $req->request->get('grams');
            $price_sub_month = $req->request->get('price_sub_month');
            $per_category_price = $req->request->get('per_category_price');
            $upgrade_gram = $req->request->get('upgrade_gram');
            $upgrade_gram_price = $req->request->get('upgrade_gram_price');
            $price_sub_week = $req->request->get('price_sub_week');

            $sort_order = $req->request->get('sort_order');

//          echo"<pre>";print_r($price_sub_of);exit;
            $start_price_from = 0;

            if (!empty($price_sub_month)) {
                $start_price_from = !empty($price_sub_month[0]) ? $price_sub_month[0] : 0;
            }
//          $price_sub = $req->request->get('price_sub');
            $package_for = $req->request->get('package_for');
            $price = $req->request->get('price');
            $point = $req->request->get('point');
            #check Usergoalmaster
            $package = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array('main_package_master_id' => $main_package_master_id, 'language_id' => $language_id, 'is_deleted' => 0));

            $media_id = 0;
            if (isset($_FILES['about_img']) && !empty($_FILES['about_img']) && isset($_FILES['about_img']['size']) && $_FILES['about_img']['size'] > 0) {
                $file_name = $_FILES['about_img']['name'];
                $tmp_name = $_FILES['about_img']['tmp_name'];
                $path = $this->upload_doc_dir;
                $upload_dir = $this->container->getParameter('absolute_path') . $path;
                $media_id = $this->mediauploadAction($file_name, $tmp_name, $path, $upload_dir, 1);
            }




            $packagemaster = new Packagemaster();
            $packagemaster->setPackage_name($package_name);
            $packagemaster->setPackage_type($package_type);
            $packagemaster->setFestival_affect($affect_festival);
            $packagemaster->setOff_days_allowed($off_days_allowed);
            $packagemaster->setDescription($description);
            $packagemaster->setPackage_grams($package_gram);
            $packagemaster->setPackage_max_grams_limit($package_gram_limit);
            $packagemaster->setGram_label($gram_label);
            $packagemaster->setLoyality_point($point);
            $packagemaster->setPackage_meals($package_meals);
            $packagemaster->setPackage_snakes($package_snakes);
            $packagemaster->setLanguage_id($language_id);
            $packagemaster->setMain_package_master_id($main_package_master_id);
            $packagemaster->setPrice_starting_from($start_price_from);
            $packagemaster->setIs_deleted(0);
            $packagemaster->setSort_order($sort_order);
            $packagemaster->setImg_id($media_id);
            $packagemaster->setCreated_datetime(date('Y-m-d H:i:s'));
            $packagemaster->setLast_updated_on(date('Y-m-d H:i:s'));

            $em->persist($packagemaster);
            $em->flush();

            if ($main_package_master_id == 0) {
                $main_package_master_id = $packagemaster->getPackage_master_id();
                $packagemaster->setMain_package_master_id($main_package_master_id);
                $em->flush();
            }

            //-------Make Package Entries in Other Languages Also --------------
            $languageList = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Languagemaster")
                    ->findBy(array("is_deleted"=>0));
            if($languageList){
                foreach($languageList as $langval){
                    if($langval->getLanguage_master_id() != $language_id ){
                        $packagemaster = new Packagemaster();
                        $packagemaster->setPackage_name($package_name);
                        $packagemaster->setFestival_affect($affect_festival);
                        $packagemaster->setPackage_type($package_type);
                        $packagemaster->setOff_days_allowed($off_days_allowed);
                        $packagemaster->setDescription($description);
                        $packagemaster->setPackage_grams($package_gram);
                        $packagemaster->setPackage_max_grams_limit($package_gram_limit);
                        $packagemaster->setGram_label($gram_label);
                        $packagemaster->setLoyality_point($point);
                        $packagemaster->setPackage_meals($package_meals);
                        $packagemaster->setPackage_snakes($package_snakes);
                        $packagemaster->setLanguage_id($langval->getLanguage_master_id());
                        $packagemaster->setMain_package_master_id($main_package_master_id);
                        $packagemaster->setPrice_starting_from($start_price_from);
                        $packagemaster->setIs_deleted(0);
                        $packagemaster->setSort_order($sort_order);
                        $packagemaster->setImg_id($media_id);
                        $packagemaster->setCreated_datetime(date('Y-m-d H:i:s'));
                        $packagemaster->setLast_updated_on(date('Y-m-d H:i:s'));
                        $em->persist($packagemaster);
                        $em->flush();
                    }
                }
            }
            #make entry in Packagepercategorymaster
            if ($main_package_master_id != 0) {
                #deleteOldsEntries
                $oldUnitPrice = $em->getRepository("AdminBundle:Packagepercategorymaster")->findBy(
                    [
                        "is_deleted" => 0,
                        "package_id" => $main_package_master_id
                    ]
                );
                if($oldUnitPrice){
                    foreach($oldUnitPrice as $_oldUnitPrice){
                        $_oldUnitPrice->setIs_deleted(1);
                        $em->flush();
                    }
                }
                #deleteOldsEntries done

                if(!empty($per_category_price)){
                    foreach($per_category_price as $meal_type => $unit_price){
                        $newUnitPrice = new Packagepercategorymaster();
                        $newUnitPrice->setPackage_id($main_package_master_id);
                        $newUnitPrice->setMeal_type_id($meal_type);
                        $newUnitPrice->setUnit_price($unit_price);
                        $newUnitPrice->setCreated_datetime(date('Y-m-d H:i:s'));
                        $newUnitPrice->setIs_deleted(0);

                        $em->persist($newUnitPrice);
                        $em->flush();

                    }
                }
                if(!empty($upgrade_gram)){
                    foreach($upgrade_gram as $upgkey=>$upgval){
                        if($upgval!=0){
                        $upgrade_price_gram = new Packageupgradepricegram();
                        
                        $upgrade_price_gram->setPackage_id($main_package_master_id);
                        $upgrade_price_gram->setGram($upgval);
                        $upgrade_price_gram->setGram_price($upgrade_gram_price[$upgkey]);
                        $upgrade_price_gram->setCreated_datetime(date("Y-m-d H:i:s"));
                        $upgrade_price_gram->setIs_deleted(0);
                        $em->persist($upgrade_price_gram);
                        $em->flush();
                     }
                    }
                }
            }
            #make entry in Packagepercategorymaster done
            #both language changes

            $package_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findBy(array('main_package_master_id' => $main_package_master_id, 'is_deleted' => 0));

            if ($package_all_lang) {
                foreach ($package_all_lang as $lang_package) {
                    $lang_package->setPackage_meals($package_meals);
                    $lang_package->setPackage_snakes($package_snakes);
                    $lang_package->setLoyality_point($point);

                    $lang_package->setImg_id($media_id);
                    $em->flush();
                }
            }
            $package_counter = 0;
            while (isset($_REQUEST['sub_' . $package_counter])) {

                $min_limit = $req->request->get('min_limit_' . $package_counter);
                $max_limit = $req->request->get('max_limit_' . $package_counter);

                $new_combo = new Subpackagemaster();
                $new_combo->setMain_package_id($main_package_master_id);
                $new_combo->setMain_sub_package_id(0);
                $new_combo->setGrams(0);
                $new_combo->setPrice(0);
                $new_combo->setMin_limit($min_limit);
                $new_combo->setMax_limit($max_limit);
                $new_combo->setLanguage_id($language_id);
                $new_combo->setIs_deleted(0);
                $new_combo->setIs_archive(0);
                $new_combo->setCreated_datetime(date('Y-m-d H:i:s'));
                $em->persist($new_combo);
                $em->flush();

                $new_combo->setMain_sub_package_id($new_combo->getSub_package_master_id());
                $em->flush();

                $sub_p_id = $new_combo->getMain_sub_package_id();
                if($languageList){
                    foreach($languageList as $langval){
                        if($langval->getLanguage_master_id() != $language_id ){
                            $new_combo = new Subpackagemaster();
                            $new_combo->setMain_package_id($main_package_master_id);
                            $new_combo->setMain_sub_package_id($sub_p_id);
                            $new_combo->setGrams(0);
                            $new_combo->setPrice(0);
                            $new_combo->setMin_limit($min_limit);
                            $new_combo->setMax_limit($max_limit);
                            $new_combo->setLanguage_id($langval->getLanguage_master_id());
                            $new_combo->setIs_deleted(0);
                            $new_combo->setIs_archive(0);
                            $new_combo->setCreated_datetime(date('Y-m-d H:i:s'));
                            $em->persist($new_combo);
                            $em->flush();
                        }
                    }
                }
                #setPrices of month and week in sub_package_price_master
                $price_sub_of = $req->request->get('price_sub_of_' . $package_counter);
                if (!empty($price_sub_of)) {
                    foreach ($price_sub_of as $key1 => $value1) {

                      //  $price_data = !empty($value1[$key1]) ? $value1[$key1] : 0;

                        $new_month_price = new Subpackagepricemaster();
                        $new_month_price->setDuration_type($key1);
                        $new_month_price->setSub_package_id($sub_p_id);
                        $new_month_price->setPrice($value1);
                        $new_month_price->setIs_deleted(0);
                        $em->persist($new_month_price);
                        $em->flush();
                    }
                }
                $category_type = $req->request->get('category_type_' . $package_counter);
                $category_amount_val = $req->request->get('category_amount_value_' . $package_counter);
                if (!empty($category_type)) {
                    foreach ($category_type as $ckey1 => $cvalue1) {
                        $sub_package_combination_master = new Subpackagecombinationmaster();
                        $sub_package_combination_master->setMeal_type_id($cvalue1);
                        $sub_package_combination_master->setMeal_value($category_amount_val[$ckey1]);
                        $sub_package_combination_master->setSub_package_id($sub_p_id);
                        $sub_package_combination_master->setCreated_datetime(date("Y-m-d H:i:s"));
                        $sub_package_combination_master->setCreated_by($this->get('session')->get('user_id'));
                        $sub_package_combination_master->setIs_deleted(0);
                        $em->persist($sub_package_combination_master);
                        $em->flush();
                    }
                }
                
                $package_counter++;
            }
            $grams = NULL;

            // Package Meal Type Add
            $con = $this->getDoctrine()->getManager()->getConnection();
            $main_meals_sql = "select main_product_category_master_id from product_category_master where is_deleted = 0 group by main_product_category_master_id";
            $stmt = $con->prepare($main_meals_sql);
            $stmt->execute();
            $main_meals = $stmt->fetchAll();
            foreach ($main_meals as $_meal_type) {
                $newProductcategorypackagerelation = new Productcategorypackagerelation();
                $newProductcategorypackagerelation->setProduct_category_id($_meal_type['main_product_category_master_id']);
                $newProductcategorypackagerelation->setPackage_id($main_package_master_id);
                $newProductcategorypackagerelation->setCreated_datetime(date('Y-m-d H:i:s'));
                $newProductcategorypackagerelation->setIs_deleted(0);
                $em->persist($newProductcategorypackagerelation);
                $em->flush();
                }
            $this->get('session')->getFlashBag()->set('success_msg', 'Product inserted successfully');



            return $this->redirectToRoute('admin_package_index');
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_default_index');
        }
    }

    /**
     * @Route("/package/update")
     * @Template()
     */
    public function updatePackageAction(Request $req) {
        $em = $this->getDoctrine()->getManager();

        //echo"<pre>";print_r($_REQUEST);exit;
        if ($req->request->get('submit') != null) {

            $sql_get_package_for = "select name_db from package_for_master where is_deleted = 0 group by main_package_for_master_id ";

            $package_for_data_stmt = $em->getConnection()->prepare($sql_get_package_for);

            $package_for_data_stmt->execute();
            $package_for_data = $package_for_data_stmt->fetchAll();

            $off_days_allowed = !empty($req->request->get('off_days_allowed')) ? $req->request->get('off_days_allowed') : 0;

            $package_name = $req->request->get('price_sub_of');
            $affect_festival = $req->request->get('affect_festival');
            $package_type = $req->request->get('package_type');
            $package_name = $req->request->get('package_name');
            $description = $req->request->get('description');
            $package_gram = $req->request->get('package_gram');
            $package_gram_limit = $req->request->get('package_gram_limit');
            $gram_label = $req->request->get('gram_label');
            $package_meals = $req->request->get('package_meals');
            $package_snakes = $req->request->get('package_snakes');
            $main_package_master_id = $req->request->get('main_package_master_id');
            $language_id = $req->request->get('language_id');
            //$grams = $req->request->get('grams');
            $price_sub_month = $req->request->get('price_sub_month');
            $price_sub_week = $req->request->get('price_sub_week');
            $per_category_price = $req->request->get('per_category_price');
            $upgrade_gram_price = $req->request->get('upgrade_gram_price');
            $upgrade_gram = $req->request->get('upgrade_gram');


            $sort_order = $req->request->get('sort_order');

//          echo"<pre>";print_r($price_sub_of);exit;
            $start_price_from = 0;

            if (!empty($price_sub_month)) {
                $start_price_from = !empty($price_sub_month[0]) ? $price_sub_month[0] : 0;
            }
//          $price_sub = $req->request->get('price_sub');
            $package_for = $req->request->get('package_for');
            $price = $req->request->get('price');
            $point = $req->request->get('point');
            #check Usergoalmaster
            $package = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array('main_package_master_id' => $main_package_master_id, 'language_id' => $language_id, 'is_deleted' => 0));

            $media_id = 0;
            if (isset($_FILES['about_img']) && !empty($_FILES['about_img']) && isset($_FILES['about_img']['size']) && $_FILES['about_img']['size'] > 0) {
                $file_name = $_FILES['about_img']['name'];
                $tmp_name = $_FILES['about_img']['tmp_name'];
                $path = $this->upload_doc_dir;
                $upload_dir = $this->container->getParameter('absolute_path') . $path;
                $media_id = $this->mediauploadAction($file_name, $tmp_name, $path, $upload_dir, 1);
            }
            $languageList = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Languagemaster")
                                ->findBy(array("is_deleted"=>0));

            if ($package) {
                $package->setFestival_affect($affect_festival);
                $package->setPackage_type($package_type);
                $package->setPackage_name($package_name);
                $package->setDescription($description);
                $package->setPackage_max_grams_limit($package_gram_limit);
                $package->setGram_label($gram_label);
                $package->setPackage_grams($package_gram);
                $package->setLoyality_point($point);
                $package->setSort_order($sort_order);
                $em->flush();

                #make entry in Packagepercategorymaster
                if ($main_package_master_id != 0) {
                    #deleteOldsEntries
                    $oldUnitPrice = $em->getRepository("AdminBundle:Packagepercategorymaster")->findBy(
                        [
                            "is_deleted" => 0,
                            "package_id" => $main_package_master_id
                        ]
                    );
                    if($oldUnitPrice){
                        foreach($oldUnitPrice as $_oldUnitPrice){
                            $_oldUnitPrice->setIs_deleted(1);
                            $em->flush();
                        }
                    }
                    #deleteOldsEntries done

                    if(!empty($per_category_price)){
                        foreach($per_category_price as $meal_type => $unit_price){
                            $newUnitPrice = new Packagepercategorymaster();
                            $newUnitPrice->setPackage_id($main_package_master_id);
                            $newUnitPrice->setMeal_type_id($meal_type);
                            $newUnitPrice->setUnit_price($unit_price);
                            $newUnitPrice->setCreated_datetime(date('Y-m-d H:i:s'));
                            $newUnitPrice->setIs_deleted(0);

                            $em->persist($newUnitPrice);
                            $em->flush();

                        }
                    }
                    #deleteOldsEntries
                    $oldupgradeGramPrice = $em->getRepository("AdminBundle:Packageupgradepricegram")->findBy(
                        [
                            "is_deleted" => 0,
                            "package_id" => $main_package_master_id
                        ]
                    );
                    if($oldupgradeGramPrice){
                        foreach($oldupgradeGramPrice as $_oldUnitPrice){
                            $_oldUnitPrice->setIs_deleted(1);
                            $em->flush();
                        }
                    }
                    #deleteOldsEntries done

                    if(!empty($upgrade_gram)){
                    foreach($upgrade_gram as $upgkey=>$upgval){
                        $Packageupgradepricegram  = new Packageupgradepricegram();
                        $Packageupgradepricegram->setPackage_id($main_package_master_id);
                        $Packageupgradepricegram->setGram($upgval);
                        $Packageupgradepricegram->setGram_price($upgrade_gram_price[$upgkey]);
                        $Packageupgradepricegram->setCreated_datetime(date("Y-m-d H:i:s"));
                        $Packageupgradepricegram->setIs_deleted(0);
                        $em->persist($Packageupgradepricegram);
                        $em->flush();
                    }
                }
                }
                #make entry in Packagepercategorymaster done                
                #both language changes

                $package_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findBy(array('main_package_master_id' => $main_package_master_id, 'is_deleted' => 0));

                if ($package_all_lang) {
                    foreach ($package_all_lang as $lang_package) {
                        $lang_package->setPrice_starting_from($start_price_from);
                        $lang_package->setPackage_type($package_type);                        
                        $lang_package->setFestival_affect($affect_festival);
                        $lang_package->setPackage_meals($package_meals);
                        $lang_package->setPackage_snakes($package_snakes);
                        $lang_package->setSort_order($sort_order);
                        $lang_package->setOff_days_allowed($off_days_allowed);
                        $lang_package->setLoyality_point($point);


                        if ($media_id != 0) {
                            $lang_package->setImg_id($media_id);
                        }
                        $em->flush();
                    }
                }

                $package_counter = 0;
                // get Old Sub package Ids 
                $old_subPackageIDS = [];
                $old_subPackageIDList = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subpackagemaster')->findBy(array("is_deleted" => 0, "main_package_id" => $main_package_master_id));
                if ($old_subPackageIDList) {
                    foreach ($old_subPackageIDList as $okey => $oval) {
                        $old_subPackageIDS[] = $oval->getSub_package_master_id();
                    }
                }
                $newSubpackageIDS = [];
              
                while (isset($_REQUEST['sub_' . $package_counter])) {

                    if ($_REQUEST['sub_' . $package_counter] == 0) {
                        $new_combo = new Subpackagemaster();
                        $new_combo->setMain_package_id($main_package_master_id);
                        $new_combo->setMain_sub_package_id(0);
                        $new_combo->setGrams(0);
                        $new_combo->setPrice(0);
                        $new_combo->setLanguage_id($language_id);
                        $new_combo->setIs_deleted(0);
                        $new_combo->setCreated_datetime(date('Y-m-d H:i:s'));
                        $em->persist($new_combo);
                        $em->flush();

                        $new_combo->setMain_sub_package_id($new_combo->getSub_package_master_id());
                        $em->flush();
                        
                        $sub_p_id = $new_combo->getMain_sub_package_id();
                       
                        if($languageList){
                            foreach($languageList as $langval){
                                if($langval->getLanguage_master_id() != $language_id ){
                                    $new_combo = new Subpackagemaster();
                                    $new_combo->setMain_package_id($main_package_master_id);
                                    $new_combo->setMain_sub_package_id($sub_p_id);
                                    $new_combo->setGrams(0);
                                    $new_combo->setPrice(0);
                                    $new_combo->setLanguage_id($langval->getLanguage_master_id() );
                                    $new_combo->setIs_deleted(0);
                                    $new_combo->setCreated_datetime(date('Y-m-d H:i:s'));
                                    $em->persist($new_combo);
                                    $em->flush();
                                }
                            }
                        }
                        #setPrices of month and week in sub_package_price_master
                        $price_sub_of = $req->request->get('price_sub_of_' . $package_counter);
                        if (!empty($price_sub_of)) {
                            foreach ($price_sub_of as $key1 => $value1) {

                               // $price_data = !empty($value1[$key1]) ? $value1[$key1] : 0;

                                $new_month_price = new Subpackagepricemaster();
                                $new_month_price->setDuration_type($key1);
                                $new_month_price->setSub_package_id($sub_p_id);
                                $new_month_price->setPrice($value1);
                                $new_month_price->setIs_deleted(0);
                                $em->persist($new_month_price);
                                $em->flush();
                            }
                        }
                        $category_type = $req->request->get('category_type_' . $package_counter);
                        $category_amount_val = $req->request->get('category_amount_value_' . $package_counter);
                        if (!empty($category_type)) {
                            foreach ($category_type as $ckey1 => $cvalue1) {
                                $sub_package_combination_master = new Subpackagecombinationmaster();
                                $sub_package_combination_master->setMeal_type_id($cvalue1);
                                $sub_package_combination_master->setMeal_value($category_amount_val[$ckey1]);
                                $sub_package_combination_master->setSub_package_id($sub_p_id);
                                $sub_package_combination_master->setCreated_datetime(date("Y-m-d H:i:s"));
                                $sub_package_combination_master->setCreated_by($this->get('session')->get('user_id'));
                                $sub_package_combination_master->setIs_deleted(0);
                                $em->persist($sub_package_combination_master);
                                $em->flush();
                            }
                        }
                    } 
                    else {
                        $pas = [] ;
                        $newSubpackageIDS[] = $_REQUEST['sub_' . $package_counter];
                        $min_limit = $_REQUEST['min_limit_' . $package_counter];
                        $max_limit = $_REQUEST['max_limit_' . $package_counter];
                        // update 
                        //get Sub Package master
                        $new_combo = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subpackagemaster')->findOneBy(array("is_deleted" => 0, "main_sub_package_id" => $_REQUEST['sub_' . $package_counter]));
                        if (!empty($new_combo)) {
                            
                            $sub_p_id = $new_combo->getMain_sub_package_id();
                            $other_combo = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subpackagemaster')->findBy(array("is_deleted" => 0, "main_sub_package_id" =>$sub_p_id ));
                            if($other_combo){
                                foreach($other_combo as $okey=>$oval){
                                    $pas[] = $oval->getSub_package_master_id();
                                    
                                    $oval->setMin_limit($min_limit);
                                    $oval->setMax_limit($max_limit);

                                    $em->flush();
                                }
                            }
                            $sub_primary_id = $new_combo->getSub_package_master_id() ;
                            #setPrices of month and week in sub_package_price_master
                            // delete Sub package price master
                            
                            
                            $subpackagepricedelete = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subpackagepricemaster')
                                    ->findBy(array("is_deleted"=>0,"sub_package_id"=>$pas));
                            
                            
                            if($subpackagepricedelete){
                                foreach($subpackagepricedelete as $sdelkey=>$sdelval){
                                    $sdelval->setIs_deleted(1);
                                    $em->flush($sdelval);                                    
                                }
                            }
                            $price_sub_of = $req->request->get('price_sub_of_' . $package_counter);
                           // var_dump($price_sub_of);
                            if (!empty($price_sub_of)) {
                                foreach ($price_sub_of as $key1 => $value1) {
                                    $new_month_price = new Subpackagepricemaster();
                                    $new_month_price->setDuration_type($key1);
                                    $new_month_price->setSub_package_id($sub_p_id);
                                    $new_month_price->setPrice($value1);
                                    $new_month_price->setIs_deleted(0);
                                    $em->persist($new_month_price);
                                    $em->flush();
                                }
                               
                            }
                            // delete Sub package price master
                            $subpackagecombinationdelete = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subpackagecombinationmaster')
                                    ->findBy(array("is_deleted"=>0,"sub_package_id"=>$pas));
                            if($subpackagecombinationdelete){
                                foreach($subpackagecombinationdelete as $sdelkey=>$sdelval){
                                    $sdelval->setIs_deleted(1);
                                    $em->flush($sdelval);                                    
                                }
                            }
                            $category_type = $req->request->get('category_type_' . $package_counter);
                            $category_amount_val = $req->request->get('category_amount_value_' . $package_counter);
                            
                            if (!empty($category_type)) {
                                foreach ($category_type as $ckey1 => $cvalue1) {
                                    $sub_package_combination_master = new Subpackagecombinationmaster();
                                    $sub_package_combination_master->setMeal_type_id($cvalue1);
                                    $sub_package_combination_master->setMeal_value($category_amount_val[$ckey1]);
                                    $sub_package_combination_master->setSub_package_id($sub_p_id);
                                    $sub_package_combination_master->setCreated_datetime(date("Y-m-d H:i:s"));
                                    $sub_package_combination_master->setCreated_by($this->get('session')->get('user_id'));
                                    $sub_package_combination_master->setIs_deleted(0);
                                    $em->persist($sub_package_combination_master);
                                    $em->flush();
                                }
                                
                            }
                        } else {
                            
                        }
                    }
                    $package_counter++;
                }

                if ($old_subPackageIDS) {
                    foreach ($old_subPackageIDS as $okey => $oval) {
                        if (!in_array($oval, $newSubpackageIDS)) {
                            $DeleteSubPackageInfo = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Subpackagemaster')->findBy(array("is_deleted" => 0, "main_sub_package_id" => $oval));
                            if ($DeleteSubPackageInfo) {
                                foreach ($DeleteSubPackageInfo as $delkey => $delval) {
                                    $delval->setIs_deleted(0);
                                    $delval->setIs_archive(1);
                                    $em->flush();
                                }
                            }
                        }
                    }
                }

                $this->get('session')->getFlashBag()->set('success_msg', 'Package Upadated successfully');
            }


            return $this->redirectToRoute('admin_package_index');
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_default_index');
        }
    }

    /**
     * @Route("/package/deletePackage/{main_package_id}",defaults={"main_package_id"="0"})
     * @Template()
     */
    public function deletePackageAction($main_package_id, Request $req) {
        $em = $this->getDoctrine()->getManager();
        $packages = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findBy(array('main_package_master_id' => $main_package_id, 'is_deleted' => 0));

        if ($packages) {

            $sub_packages = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagemaster")->findBy(array('main_package_id' => $main_package_id, 'is_deleted' => 0));

            if ($sub_packages) {
                foreach ($sub_packages as $package) {
                    $package->setIs_deleted(1);
                    $em->flush();
                }
            }

            foreach ($packages as $packages_) {
                $packages_->setIs_deleted(1);
                $em->flush();
            }
        }

        $this->get('session')->getFlashBag()->set('success_msg', 'Package deleted successfully');
        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @Route("/changeProductStatus")
     * @Template()
     */
    public function changeproductstatusAction(Request $req) {
        $domain_id = $this->get('session')->get('domain_id');

        $id = $req->request->get('main_product_id');
        $status = $req->request->get('status');

        $em = $this->getDoctrine()->getManager();


        $product_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Productmaster')->findBy(array(
            'is_deleted' => 0,
            'main_product_master_id' => $id
                )
        );
        if ($product_master) {
            foreach ($product_master as $product_master) {
                if ($status == 'true') {
                    $product_master->setProduct_status('active');
                } else {
                    $product_master->setProduct_status('inactive');
                }
                $em->flush();
            }
        }

        return new Response('done');
    }

}
