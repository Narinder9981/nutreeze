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
use AdminBundle\Entity\Productavailability;
use AdminBundle\Entity\Productcombinationmaster;
use AdminBundle\Entity\Productpackagerelation;
use AdminBundle\Entity\Productcombodisplayrelation;

class ProductController extends BaseController {

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
     * @Route("/getSubPackages")
     * @Template()
     */
    public function getSubPackagesAction(Request $req) {
        $html = '';
        $subpack = null;
        $pk_ids = !empty($req->request->get('pk_ids')) ? json_decode($req->request->get('pk_ids')) : NULL;
        $product_master_id = !empty($req->request->get('product_master_id')) ? $req->request->get('product_master_id') : 0;
        $str_pk = '';
        $success = false;
        if ($pk_ids != null) {
            foreach ($pk_ids as $p_id) {
                $str_pk .= $p_id->pk_id . ",";
            }

            $str_pk = trim($str_pk, ',');
            if ($str_pk == '') {
                $str_pk = "0";
            }
            $sql_sub_pk = "select * from sub_package_master 
			join package_master On sub_package_master.main_package_id = package_master.main_package_master_id            
            where sub_package_master.main_package_id in ($str_pk) and sub_package_master.is_deleted = 0 group by sub_package_master.main_sub_package_id";
            $sub_pk = $this->fireQuery($sql_sub_pk);

            if (!empty($sub_pk)) {
                $ind = 0;
                $html .= '<div class="col-md-12">';
                foreach ($sub_pk as $pk) {

                    $sub_pk_id = $pk['main_sub_package_id'];

                    #getMealTypeCombination changes
                    $sql_get_sub_pk_combo = "select sub_package_combination_master.meal_value,product_category_master.product_category_name from sub_package_combination_master 
                                            join product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                                            where sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and sub_package_combination_master.sub_package_id = '$sub_pk_id' 
                                            group by main_product_category_master_id";

                    $sub_pk_combo = $this->fireQuery($sql_get_sub_pk_combo);
                    $combo_str = "";
                    if(!empty($sub_pk_combo)){
                        foreach($sub_pk_combo as $_sub_pk_combo){
                            $combo_str .= $_sub_pk_combo['meal_value']."*".$_sub_pk_combo['product_category_name']." + "; 
                        }

                        $combo_str = trim($combo_str , " + ");
                    }    

                    
                    #getMealTypeCombination changes done
                    #bothEggsChanges
                    $sql_combo1 = "SELECT p_c_m.* from product_combination_master p_c_m
					where p_c_m.is_deleted = '0' and p_c_m.sub_pakage_id = '" . $pk['main_sub_package_id'] . "' and product_master_id = '$product_master_id' ";

                    $combo_array_final = null;

                    $details_product_combo = $this->fireQuery($sql_combo1);
                    if (!empty($details_product_combo)) {

                        foreach ($details_product_combo as $combo_details) {

                            $combo_array_final[] = array(
                                'main_combination_id' => $combo_details['main_combination_id'],
                                'prot_type' => $combo_details['prot_type'],
                                'prot_crab' => $combo_details['prot_crab'],
                                'sub_pakage_id' => $combo_details['sub_pakage_id'],
                            );
                        }
                    }

                    $raw_eggs_selected = '';
                    $raw_eggs_count = '';
                    $white_eggs_selected = 0;
                    $white_eggs_count = 0;
                    $prot_selected = 0;
                    $prot_count = 0;
                    $carb_selected = 0;
                    $carb_count = 0;

                    if (!empty($combo_array_final)) {

                        foreach ($combo_array_final as $_combo_array_final) {
                            if ($_combo_array_final['prot_type'] == 'raw_eggs') {
                                $raw_eggs_selected = 'checked';
                                $raw_eggs_count = $_combo_array_final['prot_crab'];
                            }

                            if ($_combo_array_final['prot_type'] == 'white_eggs') {
                                $white_eggs_selected = 'checked';
                                $white_eggs_count = $_combo_array_final['prot_crab'];
                            }

                            if ($_combo_array_final['prot_type'] == 'prot') {
                                $prot_selected = 'checked';
                                $prot_count = $_combo_array_final['prot_crab'];
                            }

                            if ($_combo_array_final['prot_type'] == 'carb') {
                                $carb_selected = 'checked';
                                $carb_count = $_combo_array_final['prot_crab'];
                            }

                            if ($_combo_array_final['prot_type'] == 'calory') {
                                $carb_selected = 'checked';
                                $carb_count = $_combo_array_final['prot_crab'];
                            }
                        }
                    }

                    #bothEggsChanges
                    // $html .= "<option value='".$pk['main_sub_package_id']."'>".$pk['package_name']."-".$pk['grams']."</option>";

                    $html .= "<div class='col-md-12 form-group'>";

                    $grams = $pk['package_grams'];

                    $html .= '<div class="col-md-2"></div><div class="col-md-4"><label data-toggle="tooltip" title="'.$combo_str.'" >' . $pk['package_name'] . '('. $grams .') [ '.$combo_str.' ] </label></div>';
/*
                    $html .= "<div class='col-md-2'><label for='id1-{$pk['main_sub_package_id']}' class='checkbox-inline'><input id='id1-{$pk['main_sub_package_id']}' type='checkbox' name='radio-{$ind}' value='protiens' " . $prot_selected . " onchange=\"toogleEggValue($(this),'{$pk['main_sub_package_id']}','prot')\" >Proteins</label>";
*/
                    $html .="<div class='col-md-2 hide'><label>Proteins</label>";
                    $html .= "<input id='prot_{$pk['main_sub_package_id']}' class='form-control' type='number' name='proteins[" . $pk['main_sub_package_id'] . "]' placeholder='Enter Proteins' value='{$grams}' readonly >";
                    $html .= '</div>';                    
/*
                    $html .= "<div class='col-md-2'><label for='id1-{$pk['main_sub_package_id']}' class='checkbox-inline'><input id='id1-{$pk['main_sub_package_id']}' type='checkbox' name='radio-{$ind}' value='carbs' " . $carb_selected . " onchange=\"toogleEggValue($(this),'{$pk['main_sub_package_id']}','carb')\" >Carbs</label>";
*/
                    $html .="<div class='col-md-2 hide'><label>Carbs</label>";
                    $html .= "<input id='carb_{$pk['main_sub_package_id']}' class='form-control' type='number' name='carbs[" . $pk['main_sub_package_id'] . "]' placeholder='Enter Carbs' value='{$grams}' readonly >";
                    $html .= '</div>';
/*                    
                    $html .= "<div class='col-md-2'><label for='id1-{$pk['main_sub_package_id']}' class='checkbox-inline'><input id='id1-{$pk['main_sub_package_id']}' type='checkbox' name='radio-{$ind}' value='raw_eggs' " . $raw_eggs_selected . " onchange=\"toogleEggValue($(this),'{$pk['main_sub_package_id']}','raw')\">Raw Eggs</label>";
*/
                    $html .="<div class='col-md-2 hide'><label>Raw Eggs</label>";

                    $html .= "<input id='raw_eggs_{$pk['main_sub_package_id']}' class='form-control eggs_input' type='number' name='raw_eggs[" . $pk['main_sub_package_id'] . "]' placeholder='Enter Raw Eggs' value='{$raw_eggs_count}' >";
                    $html .= '</div>';
/*
                    $html .= "<div class='col-md-2'><label for='id1-{$pk['main_sub_package_id']}' class='checkbox-inline'><input id='id1-{$pk['main_sub_package_id']}' type='checkbox' name='radio-{$ind}' value='white_eggs' " . $raw_eggs_selected . " onchange=\"toogleEggValue($(this),'{$pk['main_sub_package_id']}','white')\" >White Eggs</label>";
*/
                    $html .="<div class='col-md-2 hide'><label>White Eggs</label>";

                    $html .= "<input id='white_eggs_{$pk['main_sub_package_id']}' class='form-control eggs_input' type='number' name='white_eggs[" . $pk['main_sub_package_id'] . "]' placeholder='Enter White Eggs' value='{$white_eggs_count}' >";
                    $html .= '</div>';

                    $html .="<div class='col-md-2'><label>calory</label>";

                    $html .= "<input id='calory_{$pk['main_sub_package_id']}' class='form-control ' type='number' name='calory[" . $pk['main_sub_package_id'] . "]' placeholder='Enter calory' value='{$raw_eggs_count}' >";
                    $html .= '</div>';

                    $html .= "<input id='' type='hidden' name='grams[]' value='{$pk['grams']}'>";
                    $html .= "<input id='' type='hidden' name='subpackid[]' value='{$pk['main_sub_package_id']}'>";
                    $html .= "<input id='' type='hidden' name='idList[]' value='{$ind}'>";

//                    $html .= '</div>';
                    /*
                      $html .= "<div class='col-md-2'>";
                      $html .= "<input type='text' name='breakfast_eggs[]' placeholder='Enter Number of Eggs' value='0'>";
                      $html .= "</div>";
                     */


                    $html .= "</div>";

                    $subpack[] = array(
                        'main_sub_package_id' => $pk['main_sub_package_id'],
                        'package_name' => $pk['package_name'],
                    );

                    $ind++;
                }
                $html .= '</div>';
                $success = true;
            }
        }

        $_data = array(
            'success' => $success,
            'subpack' => $subpack,
            'html' => $html,
        );

        echo json_encode($_data);
        exit;

        //return new Response($html);
    }

    /**
     * @Route("/products")
     * @Template()
     */
    public function indexAction(Request $req) {
        $package_id = 0;
        $category = 0;

        $category_where = '';

        if (!empty($req->request->get('package_id'))) {
            $package_id = $req->request->get('package_id');
        }

//		print($package_id);exit;
        if (!empty($req->request->get('category'))) {
            $category = $req->request->get('category');

            $category_where = " AND main_product_category_id = '$category' ";
        }


        $languages = $this->getLanguages();
        $sql = "select main_product_master_id,product_image,product_status,product_name,product_name_ar, product_category_name from product_master, product_category_master cat where cat.main_product_category_master_id = main_product_category_id and cat.is_deleted = 0 and product_master.is_deleted = '0' $category_where group by main_product_master_id";
        $main_product = $this->fireQuery($sql);
        $products = null;
        //	print($sql);exit;
        if (!empty($main_product)) {
            foreach ($main_product as $product_) {

                #ratings
                $ratings = 0;
                $sql_rating = "select sum(ratings) as ratings_sum,count(product_rating_master_id) as total_rate 
								from product_rating_master where main_product_id = '" . $product_['main_product_master_id'] . "' and is_deleted = 0 ";
                $ratings_ar = $this->fireQuery($sql_rating);
                if (!empty($ratings_ar)) {
                    if (!empty($ratings_ar[0]['total_rate'])) {
                        if (!empty($ratings_ar[0]['ratings_sum'])) {
                            $ratings = $ratings_ar[0]['ratings_sum'] / $ratings_ar[0]['total_rate'];
                        }
                    }
                }
                #ratings done 

                $lang_wise = null;
                $pck_ids = array();

                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select product_name,language_id from product_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and main_product_master_id = '" . $product_['main_product_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_wise[] = array('product_name' => $lang_goal[0]['product_name'], 'lang_id' => $lang->getLanguage_master_id());
                        } else {
                            $lang_wise[] = array('product_name' => '-', 'lang_id' => $lang->getLanguage_master_id());
                        }
                    }
                }

                $image = $this->getmediaAction($product_['product_image']);

                // package list
                $_packageSql = "SELECT main_package_master_id from package_master pm, product_package_relation rel where pm.main_package_master_id=rel.main_package_id and rel.main_product_id = {$product_['main_product_master_id']} and pm.is_deleted = 0 and rel.is_deleted = 0 group by pm.main_package_master_id";
                $_packageList = $this->fireQuery($_packageSql);

                $_packNameList = array();
                if (!empty($_packageList)) {
                    foreach ($_packageList as $_package) {
                        $pck_ids[] = $_package['main_package_master_id'];

                        $_sql = "SELECT package_name from package_master where main_package_master_id = {$_package['main_package_master_id']} and is_deleted = 0";
                        $lang_package = $this->fireQuery($_sql);

                        $lang_package_name = '';
                        if (!empty($lang_package)) {
                            $tempArray = array();
                            foreach ($lang_package as $_langpack) {
                                $tempArray[] = $_langpack['package_name'];
                            }
                            $lang_package_name = implode(' / ', $tempArray);
                        }
                        $_packNameList[] = $lang_package_name;
                    }
                }
//				echo"<pre>";print_r($pck_ids);exit;

                if (!empty($package_id)) {

                    if (in_array($package_id, $pck_ids)) {

                        $products[] = array(
                            'main_product_master_id' => $product_['main_product_master_id'],
                            'product_status' => $product_['product_status'],
                            'lang_wise' => $lang_wise,
                            'name'=>$product_['product_name'],                            
                            'name_ar'=>$product_['product_name_ar'],
                            'product_category_name' => $product_['product_category_name'],
                            'package_name_list' => $_packNameList,
                            'image' => $image,
                            'ratings' => $ratings
                        );
                    }
                } else {

                    $products[] = array(
                        'main_product_master_id' => $product_['main_product_master_id'],
                        'product_status' => $product_['product_status'],
                        'lang_wise' => $lang_wise,
                            'name'=>$product_['product_name'],                            
                            'name_ar'=>$product_['product_name_ar'],
                        'product_category_name' => $product_['product_category_name'],
                        'package_name_list' => $_packNameList,
                        'image' => $image,
                        'ratings' => $ratings
                    );
                }
            }
        }

        // get package list
        $packageList = array();
        $_packageSql = "SELECT main_package_master_id from package_master pm where pm.is_deleted = 0 group by pm.main_package_master_id";
        $_packageList = $this->fireQuery($_packageSql);

        if (!empty($_packageList)) {

            foreach ($_packageList as $_package) {
                $_sql = "SELECT package_name from package_master where main_package_master_id = {$_package['main_package_master_id']} and is_deleted = 0";
                $lang_package = $this->fireQuery($_sql);

                $lang_package_name = '';
                if (!empty($lang_package)) {
                    $tempArray = array();
                    foreach ($lang_package as $_langpack) {
                        $tempArray[] = $_langpack['package_name'];
                    }
                    $lang_package_name = implode(' / ', $tempArray);
                }

                $packageList[] = array(
                    'main_package_master_id' => $_package['main_package_master_id'],
                    'lang_package_name' => $lang_package_name
                );
            }
        }

        // category list
        $categoryList = array();
        $_sql = "SELECT main_product_category_master_id from product_category_master pm where pm.is_deleted = 0 group by pm.main_product_category_master_id";
        $_categoryList = $this->fireQuery($_sql);

        if (!empty($_categoryList)) {

            foreach ($_categoryList as $_category) {
                $_sql = "SELECT product_category_name from product_category_master where main_product_category_master_id = {$_category['main_product_category_master_id']} and is_deleted = 0";
                $lang_category = $this->fireQuery($_sql);

                $lang_category_name = '';
                if (!empty($lang_category)) {
                    $tempArray = array();
                    foreach ($lang_category as $_langpack) {
                        $tempArray[] = $_langpack['product_category_name'];
                    }
                    $lang_category_name = implode(' / ', $tempArray);
                }

                $categoryList[] = array(
                    'main_product_category_master_id' => $_category['main_product_category_master_id'],
                    'lang_category_name' => $lang_category_name
                );
            }
        }
//		echo"<pre>";print_r($products);exit;
        return array(
            'packageList' => $packageList,
            'categoryList' => $categoryList,
            'products' => $products,
            'package_id' => $package_id,
            'category_id' => $category,
            'languages' => $languages
        );
    }

    /**
     * @Route("/products/addProduct/{main_product_id}",defaults={"main_product_id"="0"})
     * @Template()
     */
    public function addProductAction($main_product_id) {

        $languages = $this->getLanguages();
        $subpackageList = null;

        $product_combo = null;
        $product_combo1 = null;

        $breakfast_id = 1;

        $sql_cat = "select * from product_category_master p_c 				
				where p_c.is_deleted = '0' ";
        $product_cat = $this->fireQuery($sql_cat);

        $sql_package = "select * from package_master p_m 				
				where p_m.is_deleted = '0' ";
        $package_cat = $this->fireQuery($sql_package);

        $sql_days = "select * from days_master d_m 				
				where d_m.is_deleted = '0' ";
        $days = $this->fireQuery($sql_days);
        
        $sql_aiavl = "select * from product_availability  				
				where is_deleted = '0' and main_product_id = '$main_product_id'  ";
        $avail = $this->fireQuery($sql_aiavl);

        $sql_combo_display = "select * from product_combo_display_relation  				
				where is_deleted = '0' and product_id = '$main_product_id'  ";
        $combo_display = $this->fireQuery($sql_combo_display);        

        $sql = "select * from product_master p_m 				
				where p_m.is_deleted = '0' and p_m.main_product_master_id = '$main_product_id' ";
        $main_product = $this->fireQuery($sql);

        if (!empty($main_product)) {

            #getCombination for both lang it will be same

            $sql_combo = "SELECT main_combination_id,sub_pakage_id,grams,package_name,package_grams from product_combination_master p_c_m, product_master product , sub_package_master sub_package ,package_master p  
					where p_c_m.product_master_id = product.main_product_master_id and sub_package.main_sub_package_id = p_c_m.sub_pakage_id and p_c_m.is_deleted = '0' and p.main_package_master_id = sub_package.main_package_id and p_c_m.product_master_id = '$main_product_id' group by sub_pakage_id";
            $main_product_combo = $this->fireQuery($sql_combo);

            $combo_array_final = null;
            $combo_array = null;

            if (!empty($main_product_combo)) {
                $ind = 0;
                foreach ($main_product_combo as $main_combo) {

                    #getMealTypeCombination changes
                    $sql_get_sub_pk_combo = "select sub_package_combination_master.meal_value,product_category_master.product_category_name from sub_package_combination_master 
                                            join product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                                            where sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and sub_package_combination_master.sub_package_id = '" . $main_combo['sub_pakage_id'] . "' 
                                            group by main_product_category_master_id";

                    $sub_pk_combo = $this->fireQuery($sql_get_sub_pk_combo);
                    $combo_str = "";
                    if(!empty($sub_pk_combo)){
                        foreach($sub_pk_combo as $_sub_pk_combo){
                            $combo_str .= $_sub_pk_combo['meal_value']."*".$_sub_pk_combo['product_category_name']." + "; 
                        }

                        $combo_str = trim($combo_str , " + ");
                    }    

                    
                    #getMealTypeCombination changes done

                    //	$combo_array = array('prot'=>0,'carb'=>0,'raw_eggs'=>0,'white_eggs'=>0);

                    $sql_combo1 = "SELECT p_c_m.* from product_combination_master p_c_m
					where p_c_m.is_deleted = '0' and p_c_m.sub_pakage_id = '" . $main_combo['sub_pakage_id'] . "' and product_master_id = '$main_product_id' ";

                    $combo_array_final = null;

                    $details_product_combo = $this->fireQuery($sql_combo1);
                    if (!empty($details_product_combo)) {
                        /* foreach($details_product_combo as $combo_details){
                          $type = $combo_details['prot_type'];
                          $combo_array[$type] = $combo_details['prot_crab'];
                          }

                          $combo_array_final[] = array('main_combination_id'=>$main_combo['main_combination_id'],'combo'=>$combo_array); */
                        foreach ($details_product_combo as $combo_details) {

                            $combo_array_final[] = array(
                                'main_combination_id' => $combo_details['main_combination_id'],
                                'prot_type' => $combo_details['prot_type'],
                                'prot_crab' => $combo_details['prot_crab'],
                                'sub_pakage_id' => $combo_details['sub_pakage_id'],
                            );
                        }
                    }

                    $combo_array [] = array(
                        "sub_package_id" => $main_combo['sub_pakage_id'],
                        "main_combination_id" => $main_combo['main_combination_id'],
                        "package_name" => $main_combo['package_name'],
                        "grams" => $main_combo['package_grams'],
                    //    "grams" => $main_combo['grams'],
                        "combo_str" => $combo_str,
                        "combo_array" => $combo_array_final
                    );
                }
            }

            //echo"<pre>";print_r($combo_array);exit;
            #getSubPackagesOfPackage

            $selectedPackages = null;
            foreach ($main_product as $key => $value) {

                $main_product_id = $value['main_product_master_id'];

                $sql1 = "select main_package_id from product_package_relation where is_deleted = '0' and main_product_id = '$main_product_id' ";
                $main_product_package = $this->fireQuery($sql1);

                $package_ids = array();

                if (!empty($main_product_package)) {
                    foreach ($main_product_package as $pack) {
                        $package_ids[] = $pack['main_package_id'];
                        $selectedPackages[] = $pack['main_package_id'];
                    }
                }

                $main_product[$key]['img_url'] = $this->getmediaAction($value['product_image']);
                $main_product[$key]['product_combo'] = $product_combo;
                $main_product[$key]['product_combo1'] = $product_combo1;
                $main_product[$key]['package_ids'] = $package_ids;
                $main_product[$key]['new_combo'] = $combo_array_final;
                $main_product[$key]['combo_array_detail'] = $combo_array;
            }

            $selectedPackagesStr = '';
            if (!empty($selectedPackages)) {
                $selectedPackagesStr = implode(',', $selectedPackages);
            }

            $subPackSql = "select * from sub_package_master 
			join package_master On sub_package_master.main_package_id = package_master.main_package_master_id 
			where sub_package_master.main_package_id in ({$selectedPackagesStr}) and sub_package_master.is_deleted = 0 group by sub_package_master.main_sub_package_id";
            $subpackageList = $this->firequery($subPackSql);
        }
//		echo"<pre>";print_r($main_product);exit;
        return array('days' => $days, 'avail' => $avail, 'main_product' => $main_product, 'package' => $package_cat, 'language_list' => $languages, 'product_cat' => $product_cat, 'subpackageList' => $subpackageList, 'main_product_id' => $main_product_id , 'combo_display' => $combo_display);
    }

    /**
     * @Route("/product/save")
     * @Template()
     */
    public function saveProductAction(Request $req) {

        $em = $this->getDoctrine()->getManager();

//        echo"<pre>";print_r($_REQUEST);exit;
        if ($req->request->get('submit') != null) {
            $product_name = $req->request->get('product_name');
            $product_name_ar = $req->request->get('product_name_ar');
            $display_in_app = $req->request->get('display_in_app');
            $product_nutrition = $req->request->get('product_nutrition');

            $product_calory = $req->request->get('product_calory');
            $product_prot = $req->request->get('product_prot');
            $product_fat = $req->request->get('product_fat');
            $product_carb = $req->request->get('product_carb');
            $product_fiber = $req->request->get('product_fiber');

            $product_description = $req->request->get('product_description');
            $main_product_category_id = $req->request->get('main_product_category_id');
            $max_meal_value = $req->request->get('meal_max_value');
            $product_status = $req->request->get('product_status');
            $main_product_master_id = $req->request->get('main_product_master_id');
            $language_id = $req->request->get('language_id');

            $raw_egg = $req->request->get('raw_eggs');
            $white_egg = $req->request->get('white_eggs');
            $proteins = $req->request->get('proteins');
            $carbs = $req->request->get('carbs');
            $calory = $req->request->get('calory') ; 

            //$prot_crab = $req->request->get('prot_crab');
            //$raw_eggs = $req->request->get('raw_eggs');
            //$white_eggs = $req->request->get('white_eggs');
            //$prot_crab1 = $req->request->get('prot_crab1');
            $prot_crab = null;
            $prot_crab1 = null;

            $breakfast_id = 1;

            $product_package = $req->request->get('product_package');
           // $product_availability = $req->request->get('product_availability');
            $product_availability_week1 = $req->request->get('product_availability_week1');
            $product_availability_week2 = $req->request->get('product_availability_week2');
            $media_id = 0;

            if (isset($_FILES['product_image']) && !empty($_FILES['product_image']) && isset($_FILES['product_image']['size']) && $_FILES['product_image']['size'] > 0) {
                $file_name = $_FILES['product_image']['name'];
                $tmp_name = $_FILES['product_image']['tmp_name'];
                $upload_dir = $this->container->getParameter('absolute_path') . "/bundles/uploads/product/";

                $media_id = $this->mediauploadAction($file_name, $tmp_name, "/bundles/uploads/product/", $upload_dir);

                if (!$media_id) {
                    $media_id = 0;
                }
            }

            #check Usergoalmaster
            $product = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->findOneBy(array('main_product_master_id' => $main_product_master_id, 'language_id' => $language_id, 'is_deleted' => 0));
            

            if ($product) {
                $product->setProduct_name($product_name);
                $product->setProduct_name_ar($product_name_ar);
                $product->setProduct_description($product_description);
                $product->setProduct_nutrition($product_nutrition);
                $product->setCalory($product_calory);
                $product->setProt($product_prot);
                $product->setCarb($product_carb);
                $product->setFat($product_fat);
                $product->setFiber($product_fiber);
                $product->setMax_meal_value($max_meal_value);
                $product->setPackage_id(0);
                $em->flush();

                #multiple package entry changes product_package_relation
                $existed_package_entry = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productpackagerelation")->findBy(array('is_deleted' => 0, 'main_product_id' => $main_product_master_id));

                if ($existed_package_entry) {
                    foreach ($existed_package_entry as $existed_pack) {
                        $existed_pack->setIs_deleted(1);
                        $em->flush();
                    }
                }

                #newPackageEntry
                if (!empty($product_package)) {
                    foreach ($product_package as $pro_pack) {
                        $new_pack = new Productpackagerelation();
                        $new_pack->setMain_product_id($main_product_master_id);
                        $new_pack->setMain_package_id($pro_pack);
                        $new_pack->setIs_deleted(0);
                        $em->persist($new_pack);
                        $em->flush();
                    }
                }

                #multiple package entry changes done
                #both language changes

                $product_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->findBy(array('main_product_master_id' => $main_product_master_id, 'is_deleted' => 0));

                if ($product_all_lang) {
                    foreach ($product_all_lang as $lang_product) {
                        $lang_product->setProduct_status($product_status);
                        $lang_product->setMain_product_category_id($main_product_category_id);
                        $lang_product->setMax_meal_value($max_meal_value);
                          $lang_product->setCalory($product_calory);
                        $lang_product->setProt($product_prot);
                        $lang_product->setCarb($product_carb);
                        $lang_product->setFat($product_fat);
                        $lang_product->setFiber($product_fiber);
                        if ($media_id != 0) {
                            $lang_product->setProduct_image($media_id);
                        }
                        $em->flush();
                    }
                }

                $comboDeleted = false;

                if (!empty($raw_egg)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'raw_eggs'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }
                    if(isset($display_in_app) && $display_in_app != 'none'){

                        foreach ($raw_egg as $sub_package_id => $raw_egg_value) {
                            $main_combination_id = 0;

                            if (!empty($raw_egg_value)) {

                                $new_combo = new Productcombinationmaster();
                                $new_combo->setProduct_master_id($main_product_master_id);
                                $new_combo->setProt_crab($raw_egg_value);
                                $new_combo->setProt_type('raw_eggs');
                                $new_combo->setSub_pakage_id($sub_package_id);
                                $new_combo->setMain_combination_id($main_combination_id);
                                $new_combo->setLanguage_id($language_id);
                                $new_combo->setIs_deleted(0);

                                $em->persist($new_combo);
                                $em->flush();

                                if ($main_combination_id == 0) {
                                    $main_combination_id = $new_combo->getProduct_combination_master_id();
                                }
                                $new_combo->setMain_combination_id($main_combination_id);
                                $em->flush();
                            }
                        }
                    }
                }

                if (!empty($white_egg)) {

                    if (1) {
                        $product_all_combo1 = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'white_eggs'));

                        if ($product_all_combo1) {
                            foreach ($product_all_combo1 as $combo1) {
                                $combo1->setIs_deleted(1);
                                $em->flush();
                            }
                        }
                    }

                    if(isset($display_in_app) && $display_in_app != 'none'){

                        foreach ($white_egg as $sub_package_id1 => $white_egg_value) {
                            $main_combination_id = 0;

                            if (!empty($white_egg_value)) {

                                $new_combo = new Productcombinationmaster();
                                $new_combo->setProduct_master_id($main_product_master_id);
                                $new_combo->setProt_crab($white_egg_value);
                                $new_combo->setProt_type('white_eggs');
                                $new_combo->setSub_pakage_id($sub_package_id1);
                                $new_combo->setMain_combination_id($main_combination_id);
                                $new_combo->setLanguage_id($language_id);
                                $new_combo->setIs_deleted(0);

                                $em->persist($new_combo);
                                $em->flush();

                                if ($main_combination_id == 0) {
                                    $main_combination_id = $new_combo->getProduct_combination_master_id();
                                }
                                $new_combo->setMain_combination_id($main_combination_id);
                                $em->flush();
                            }
                        }
                    }    
                }

                #manual updates reg proteins and carbs

                if (!empty($proteins)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'prot'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($proteins as $sub_package_id => $proteins_value) {
                        $main_combination_id = 0;

                        if (!empty($proteins_value)) {

                            $new_combo = new Productcombinationmaster();
                            $new_combo->setProduct_master_id($main_product_master_id);
                            $new_combo->setProt_crab($proteins_value);
                            $new_combo->setProt_type('prot');
                            $new_combo->setSub_pakage_id($sub_package_id);
                            $new_combo->setMain_combination_id($main_combination_id);
                            $new_combo->setLanguage_id($language_id);
                            $new_combo->setIs_deleted(0);

                            $em->persist($new_combo);
                            $em->flush();

                            if ($main_combination_id == 0) {
                                $main_combination_id = $new_combo->getProduct_combination_master_id();
                            }
                            $new_combo->setMain_combination_id($main_combination_id);
                            $em->flush();
                        }
                    }
                }

                if (!empty($calory)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'calory'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($calory as $sub_package_id => $calory_value) {
                        $main_combination_id = 0;

                        if (!empty($calory_value)) {

                            $new_combo = new Productcombinationmaster();
                            $new_combo->setProduct_master_id($main_product_master_id);
                            $new_combo->setProt_crab($calory_value);
                            $new_combo->setProt_type('calory');
                            $new_combo->setSub_pakage_id($sub_package_id);
                            $new_combo->setMain_combination_id($main_combination_id);
                            $new_combo->setLanguage_id($language_id);
                            $new_combo->setIs_deleted(0);

                            $em->persist($new_combo);
                            $em->flush();

                            if ($main_combination_id == 0) {
                                $main_combination_id = $new_combo->getProduct_combination_master_id();
                            }
                            $new_combo->setMain_combination_id($main_combination_id);
                            $em->flush();
                        }
                    }
                }
                
                if (!empty($carbs)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'carb'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($carbs as $sub_package_id => $carbs_value) {
                        $main_combination_id = 0;

                        if (!empty($carbs_value)) {

                            $new_combo = new Productcombinationmaster();
                            $new_combo->setProduct_master_id($main_product_master_id);
                            $new_combo->setProt_crab($carbs_value);
                            $new_combo->setProt_type('carb');
                            $new_combo->setSub_pakage_id($sub_package_id);
                            $new_combo->setMain_combination_id($main_combination_id);
                            $new_combo->setLanguage_id($language_id);
                            $new_combo->setIs_deleted(0);

                            $em->persist($new_combo);
                            $em->flush();

                            if ($main_combination_id == 0) {
                                $main_combination_id = $new_combo->getProduct_combination_master_id();
                            }
                            $new_combo->setMain_combination_id($main_combination_id);
                            $em->flush();
                        }
                    }
                }

                #manual updates reg proteins and carbs done

                $sql_avail = "UPDATE product_availability SET is_deleted = '1' WHERE main_product_id = '$main_product_master_id' ";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();
               
               /* if (!empty($product_availability)) {
                    for ($i = 0; $i < count($product_availability); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability[$i]);
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                } */

                if (!empty($product_availability_week1)) {
                    for ($i = 0; $i < count($product_availability_week1); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability_week1[$i]);
                        $new_combo->setWeek_id('week1,week3,week5');
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }

                if (!empty($product_availability_week2)) {
                    for ($i = 0; $i < count($product_availability_week2); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability_week2[$i]);
                        $new_combo->setWeek_id('week2,week4');
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }

                #combo display changes
                $existEntry = $em->getRepository("AdminBundle:Productcombodisplayrelation")->findBy(["product_id"=>$main_product_master_id,'is_deleted'=>0]);
                if($existEntry){
                    foreach($existEntry as $_existEntry){
                        $_existEntry->setIs_deleted(1);
                        $em->flush();
                    }
                }

                if(!empty($display_in_app)){
                    if($display_in_app != 'none'){
                        $newProductcombodisplayrelation = new Productcombodisplayrelation();
                        $newProductcombodisplayrelation->setProduct_id($main_product_master_id); 
                        $newProductcombodisplayrelation->setCombo_type($display_in_app); 
                        $newProductcombodisplayrelation->setCreated_datetime(date('Y-m-d H:i:s'));
                        $newProductcombodisplayrelation->setIs_deleted(0);
                        
                        $em->persist($newProductcombodisplayrelation);
                        $em->flush();

                    }
                }
                #combo display changes done

                $this->get('session')->getFlashBag()->set('success_msg', 'Product Upadated successfully');
            } else {

                $new_product = new Productmaster();
                $new_product->setProduct_name($product_name);
                $new_product->setProduct_name_ar($product_name_ar);
                $new_product->setProduct_description($product_description);
                $new_product->setProduct_nutrition($product_nutrition);
                $new_product->setCalory($product_calory);
                $new_product->setProt($product_prot);
                $new_product->setCarb($product_carb);
                $new_product->setFat($product_fat);
                $new_product->setFiber($product_fiber);
                $new_product->setPackage_id(0);
                $new_product->setLanguage_id($language_id);
                $new_product->setMain_product_master_id($main_product_master_id);
                $new_product->setProduct_status($product_status);
                $new_product->setMax_meal_value($max_meal_value);
                $new_product->setMain_product_category_id($main_product_category_id);
                $new_product->setProduct_image($media_id);
                $new_product->setIs_deleted(0);
                $new_product->setCreated_datetime(date('Y-m-d H:i:s'));

                $em->persist($new_product);
                $em->flush();


                if ($main_product_master_id == 0) {
                    $main_product_master_id = $new_product->getProduct_master_id();
                    $new_product->setMain_product_master_id($main_product_master_id);
                    $em->flush();
                }

                #multiple package entry changes product_package_relation
                $existed_package_entry = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productpackagerelation")->findBy(array('is_deleted' => 0, 'main_product_id' => $main_product_master_id));

                if ($existed_package_entry) {
                    foreach ($existed_package_entry as $existed_pack) {
                        $existed_pack->setIs_deleted(1);
                        $em->flush();
                    }
                }

                #newPackageEntry
                if (!empty($product_package)) {
                    foreach ($product_package as $pro_pack) {
                        $new_pack = new Productpackagerelation();
                        $new_pack->setMain_product_id($main_product_master_id);
                        $new_pack->setMain_package_id($pro_pack);
                        $new_pack->setIs_deleted(0);
                        $em->persist($new_pack);
                        $em->flush();
                    }
                }

                #multiple package entry changes done

                $sql_avail = "UPDATE product_availability SET is_deleted = '1' WHERE main_product_id = '$main_product_master_id' ";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();
                if (!empty($product_availability)) {
                    for ($i = 0; $i < count($product_availability); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability[$i]);
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }
                #both language changes

                $product_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->findBy(array('main_product_master_id' => $main_product_master_id, 'is_deleted' => 0));

                if ($product_all_lang) {
                    foreach ($product_all_lang as $lang_product) {
                        $lang_product->setProduct_status($product_status);
                        $lang_product->setMain_product_category_id($main_product_category_id);
                        $lang_product->setMax_meal_value($max_meal_value);
                          $lang_product->setCalory($product_calory);
                        $lang_product->setProt($product_prot);
                        $lang_product->setCarb($product_carb);
                        $lang_product->setFat($product_fat);
                        $lang_product->setFiber($product_fiber);
                        if ($media_id != 0) {
                            $lang_product->setProduct_image($media_id);
                        }
                        $em->flush();
                    }
                }

                $comboDeleted = false;

                if (!empty($raw_egg)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'raw_eggs'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    if(isset($display_in_app) && $display_in_app != 'none'){
                        foreach ($raw_egg as $sub_package_id => $raw_egg_value) {
                            $main_combination_id = 0;

                            if (!empty($raw_egg_value)) {
                                $new_combo = new Productcombinationmaster();
                                $new_combo->setProduct_master_id($main_product_master_id);
                                $new_combo->setProt_crab($raw_egg_value);
                                $new_combo->setProt_type('raw_eggs');
                                $new_combo->setSub_pakage_id($sub_package_id);
                                $new_combo->setMain_combination_id($main_combination_id);
                                $new_combo->setLanguage_id($language_id);
                                $new_combo->setIs_deleted(0);

                                $em->persist($new_combo);
                                $em->flush();

                                if ($main_combination_id == 0) {
                                    $main_combination_id = $new_combo->getProduct_combination_master_id();
                                }
                                $new_combo->setMain_combination_id($main_combination_id);
                                $em->flush();
                            }
                        }
                    }
                }



                if (!empty($white_egg)) {

                    if (1) {
                        $product_all_combo1 = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'white_eggs'));

                        if ($product_all_combo1) {
                            foreach ($product_all_combo1 as $combo1) {
                                $combo1->setIs_deleted(1);
                                $em->flush();
                            }
                        }
                    }

                    if(isset($display_in_app) && $display_in_app != 'none'){

                        foreach ($white_egg as $sub_package_id1 => $white_egg_value) {
                            $main_combination_id = 0;

                            if (!empty($white_egg_value)) {

                                $new_combo = new Productcombinationmaster();
                                $new_combo->setProduct_master_id($main_product_master_id);
                                $new_combo->setProt_crab($white_egg_value);
                                $new_combo->setProt_type('white_eggs');
                                $new_combo->setSub_pakage_id($sub_package_id1);
                                $new_combo->setMain_combination_id($main_combination_id);
                                $new_combo->setLanguage_id($language_id);
                                $new_combo->setIs_deleted(0);

                                $em->persist($new_combo);
                                $em->flush();

                                if ($main_combination_id == 0) {
                                    $main_combination_id = $new_combo->getProduct_combination_master_id();
                                }
                                $new_combo->setMain_combination_id($main_combination_id);
                                $em->flush();
                            }
                        }
                    }
                }

                #manual updates reg proteins and carbs

                if (!empty($proteins)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'prot'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($proteins as $sub_package_id => $proteins_value) {
                        $main_combination_id = 0;

                        if (!empty($proteins_value)) {

                            $new_combo = new Productcombinationmaster();
                            $new_combo->setProduct_master_id($main_product_master_id);
                            $new_combo->setProt_crab($proteins_value);
                            $new_combo->setProt_type('prot');
                            $new_combo->setSub_pakage_id($sub_package_id);
                            $new_combo->setMain_combination_id($main_combination_id);
                            $new_combo->setLanguage_id($language_id);
                            $new_combo->setIs_deleted(0);

                            $em->persist($new_combo);
                            $em->flush();

                            if ($main_combination_id == 0) {
                                $main_combination_id = $new_combo->getProduct_combination_master_id();
                            }
                            $new_combo->setMain_combination_id($main_combination_id);
                            $em->flush();
                        }
                    }
                }
                
                if (!empty($carbs)) {

                    $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_master_id, 'is_deleted' => 0, "prot_type" => 'carb'));

                    if ($product_all_combo) {
                        foreach ($product_all_combo as $combo) {
                            $combo->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($carbs as $sub_package_id => $carbs_value) {
                        $main_combination_id = 0;

                        if (!empty($carbs_value)) {

                            $new_combo = new Productcombinationmaster();
                            $new_combo->setProduct_master_id($main_product_master_id);
                            $new_combo->setProt_crab($carbs_value);
                            $new_combo->setProt_type('carb');
                            $new_combo->setSub_pakage_id($sub_package_id);
                            $new_combo->setMain_combination_id($main_combination_id);
                            $new_combo->setLanguage_id($language_id);
                            $new_combo->setIs_deleted(0);

                            $em->persist($new_combo);
                            $em->flush();

                            if ($main_combination_id == 0) {
                                $main_combination_id = $new_combo->getProduct_combination_master_id();
                            }
                            $new_combo->setMain_combination_id($main_combination_id);
                            $em->flush();
                        }
                    }
                }
                   $sql_avail = "UPDATE product_availability SET is_deleted = '1' WHERE main_product_id = '$main_product_master_id' ";
                $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($sql_avail);
                $stmt->execute();
               
               /* if (!empty($product_availability)) {
                    for ($i = 0; $i < count($product_availability); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability[$i]);
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                } */

                if (!empty($product_availability_week1)) {
                    for ($i = 0; $i < count($product_availability_week1); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability_week1[$i]);
                        $new_combo->setWeek_id('week1,week3,week5');
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }

                if (!empty($product_availability_week2)) {
                    for ($i = 0; $i < count($product_availability_week2); $i++) {
                        $new_combo = new Productavailability();
                        $new_combo->setMain_days_id($product_availability_week2[$i]);
                        $new_combo->setWeek_id('week2,week4');
                        $new_combo->setMain_product_id($main_product_master_id);
                        $new_combo->setIs_deleted(0);
                        $em->persist($new_combo);
                        $em->flush();
                    }
                }

                #manual updates reg proteins and carbs done
                     
                #combo display changes
                $existEntry = $em->getRepository("AdminBundle:Productcombodisplayrelation")->findBy(["product_id"=>$main_product_master_id,'is_deleted'=>0]);
                if($existEntry){
                    foreach($existEntry as $_existEntry){
                        $_existEntry->setIs_deleted(1);
                        $em->flush();
                    }
                }

                if(!empty($display_in_app)){
                    if($display_in_app != 'none'){
                        $newProductcombodisplayrelation = new Productcombodisplayrelation();
                        $newProductcombodisplayrelation->setProduct_id($main_product_master_id); 
                        $newProductcombodisplayrelation->setCombo_type($display_in_app); 
                        $newProductcombodisplayrelation->setCreated_datetime(date('Y-m-d H:i:s'));
                        $newProductcombodisplayrelation->setIs_deleted(0);
                        
                        $em->persist($newProductcombodisplayrelation);
                        $em->flush();

                    }
                }
                #combo display changes done

                $this->get('session')->getFlashBag()->set('success_msg', 'Product inserted successfully');
            }


            return $this->redirectToRoute('admin_product_index');
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_default_index');
        }
    }

    /**
     * @Route("/product/deleteProduct/{main_product_id}",defaults={"main_product_id"="0"})
     * @Template()
     */
    public function deleteProductAction($main_product_id, Request $req) {
        $em = $this->getDoctrine()->getManager();
        $products = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productmaster")->findBy(array('main_product_master_id' => $main_product_id, 'is_deleted' => 0));

        if ($products) {

            $product_all_combo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcombinationmaster")->findBy(array('product_master_id' => $main_product_id, 'is_deleted' => 0));

            if ($product_all_combo) {
                foreach ($product_all_combo as $combo) {
                    $combo->setIs_deleted(1);
                    $em->flush();
                }
            }

            foreach ($products as $product) {
                $product->setIs_deleted(1);
                $em->flush();
            }
        }

        $this->get('session')->getFlashBag()->set('success_msg', 'Product deleted successfully');
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
