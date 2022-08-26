<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Subpackagemaster;

class WSPackagelistV2Controller extends WSBaseController {

    /**
     * @Route("/ws/packagelistV2/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function packagelistAction($param) {

        try {
            $this->title = "Package List";
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
                $em = $this->getDoctrine()->getManager();

                $packageMaster = $em->getRepository("AdminBundle:Packagemaster")->findOneBy([
                    "language_id" => $lang_id,
                    "main_package_master_id" => $package_id,
                    "is_deleted" => 0
                ]);
                $current_festival = NULL ;
                if($packageMaster){
                    $date = date("Y-m-d");
                    $date_after_three_days = date('Y-m-d', strtotime("+".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime($date)));
                   
                    $current_festival = $this->getUpcomingFestival($date_after_three_days);
                   
                    $main_package_id  = $packageMaster->getMain_package_master_id();
                    $festival_effect_apply = $packageMaster->getFestival_affect();
                    $package_type = $packageMaster->getPackage_type(); 
                    $need_tocheck_subpackageFlag = false  ;
                    $remaining_days_in_festival = 0 ; 
                    $festival_start_date = NULL ; 
                   
                    if($current_festival != NULL ){
                        $festival_start_date = $current_festival['start_date'];
                    // }
                    // else{
                        $remaining_days_in_festival = $current_festival['diff_days'];
                       
                        if($package_type == 'normal'){
                            $need_tocheck_subpackageFlag = true ;                        
                        }
                        else{
                            if($festival_effect_apply == 'yes'){
                               $need_tocheck_subpackageFlag = true ;  
                            }
                        }
                    }
                  
                    $minuns_from_package_daysPackageDays = 0; 
                    if($need_tocheck_subpackageFlag == true ){
                        // find wihc days should be display 
                        // 30 26 7 1 days ==> if remaining festival days = 3 then 7 days pacjage should be display as 3 and 1 days
                        $minuns_from_package_daysQuery = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for' and main_package_for_master_id IN (SELECT package_for_id FROM `package_for_with_package_relation` WHERE `main_package_id` = $main_package_id AND `is_deleted` = 0) and days >= ".$remaining_days_in_festival." ORDER BY `package_for_master`.`days` ASC limit 0,1";
                        $minuns_from_package_daysPackageList = $this->fireQuery($minuns_from_package_daysQuery);
                        if($minuns_from_package_daysPackageList){
                            $minuns_from_package_daysPackageDays = $minuns_from_package_daysPackageList[0]['days'];
                        }
                    }
                  
                  
                    //$sql_pk_for = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for' ";
                    $sql_pk_for = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for'  and main_package_for_master_id IN (SELECT package_for_id FROM `package_for_with_package_relation` WHERE `main_package_id` = $main_package_id AND `is_deleted` = 0) order by days desc ";
                    
                    $pk_for = $this->fireQuery($sql_pk_for);

                    $packageFor = null;
                    if(!empty($pk_for)){
                        foreach($pk_for as $_pk_for){
                            
                            
                            $removed  = false ;
                            $display_package_as_it_is = false ;
                            if($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays == $_pk_for['days']){
                                // display package with minuns days 
                                $display_package_as_it_is = false ;
                            }
                            else if ($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays != $_pk_for['days'] && $remaining_days_in_festival >= $_pk_for['days']){
                                // display package as it is 
                                 $display_package_as_it_is = true ;
                                 
                            }
                            else if ($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays != $_pk_for['days'] && $remaining_days_in_festival < $_pk_for['days']){
                                // display package as it is 
                                 $display_package_as_it_is = false ;
                                 $removed  = true ;
                                 
                            }
                            else if ($need_tocheck_subpackageFlag == false ){
                                // display package as it is 
                                 $display_package_as_it_is = true ;
                            }

                                    
                            $sub_packages_data = null;

                            $duration_db_name = $_pk_for['name_db'];
                            #getSubPackages
                            $sql_get_sub_packages = "select * from sub_package_master 
                            JOIN sub_package_price_master ON sub_package_master.main_sub_package_id = sub_package_price_master.sub_package_id 
                            where sub_package_master.is_deleted = 0 and sub_package_price_master.is_deleted = 0 
                            and sub_package_price_master.duration_type = '$duration_db_name' and sub_package_master.main_package_id = '$main_package_id' and sub_package_master.language_id = '$lang_id' and sub_package_master.is_deleted = 0  and sub_package_master.is_archive = 0 ";
                           
                            
                            $sub_packages = $this->fireQuery($sql_get_sub_packages);

                            
                             //$_pk_for['days']
                            if(!empty($sub_packages)){
                                foreach($sub_packages as $_sub_packages){
                                    $sub_pk_id = $_sub_packages['sub_package_master_id'];
                                    $main_sub_package_id = $_sub_packages['main_sub_package_id'];
                                    $price = $_sub_packages['price'];
                                    $price_per_day = $_sub_packages['price'] / $_pk_for['days'] ;
                                    if($price > 0 && $price_per_day > 0 ){
                                        $sub_package_combo = null;
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
    
                                        if($display_package_as_it_is == false){
                                            $sub_packages_data [] = array(
                                                "sub_package_id" => $_sub_packages['main_sub_package_id'],
                                                "sub_package_master_id" => $_sub_packages['sub_package_master_id'],
                                                "min_limit" => $_sub_packages['min_limit'],
                                                "max_limit" => $_sub_packages['max_limit'],
                                                "price" => $price_per_day * $remaining_days_in_festival,
                                                "actual_package_price" => $price,
                                                "total_combo_count" => $totalComboCount,
                                                "sub_package_combo" => $sub_packages_combo,
                                            ); 
                                        }
                                        else{
                                            $sub_packages_data [] = array(
                                                "sub_package_id" => $_sub_packages['main_sub_package_id'],
                                                "sub_package_master_id" => $_sub_packages['sub_package_master_id'],
                                                "min_limit" => $_sub_packages['min_limit'],
                                                "max_limit" => $_sub_packages['max_limit'],
                                                "price" => $price,
                                                "actual_package_price" => $price,
                                                "total_combo_count" => $totalComboCount,
                                                "sub_package_combo" => $sub_packages_combo,
                                            ); 
                                        
                                        }
                                    }

                                }
                            }

                            if(!empty($sub_packages_data) && $removed == false){
                                if($display_package_as_it_is == false  ){
                                    $packageFor [] = array(
                                        "package_for_id" => $_pk_for['main_package_for_master_id'], 
                                        "display_package_as_it_is" => $display_package_as_it_is, 
                                        "name" => $remaining_days_in_festival . " Days" ,//$_pk_for['name'], 
                                        "real_name" => $_pk_for['name'], 
                                        "days" => $remaining_days_in_festival, 
                                        "friday_offday" => ($_pk_for['friday_offday'] == "yes")?1:0, 
                                        "description" => $_pk_for['description'], 
                                        "sub_packages" => $sub_packages_data
                                    );
                                }
                                else{
                                    $packageFor [] = array(
                                        "package_for_id" => $_pk_for['main_package_for_master_id'], 
                                        "display_package_as_it_is" => $display_package_as_it_is, 
                                        "name" => $_pk_for['name'], 
                                        "real_name" => $_pk_for['name'], 
                                        "days" => $_pk_for['days'], 
                                        "friday_offday" => ($_pk_for['friday_offday'] == "yes")?1:0, 
                                        "description" => $_pk_for['description'], 
                                        "sub_packages" => $sub_packages_data
                                    );
                                }
                            }
                        }
                    }
                    $count_in_ar = ['meal','snacks','soup'];
                    $response = array(
                        "package_id" => $packageMaster->getMain_package_master_id(),
                        "package_name" => $packageMaster->getPackage_name(),
                        "package_type" => $packageMaster->getPackage_type(),
                        "festival_affect" => $packageMaster->getFestival_affect(),
                        "count_in_ar" => $count_in_ar,
			             "off_days" => $packageMaster->getOff_days_allowed(),
                         "next_festival_start_date"=>$festival_start_date ,
                        "sub_package_list" => $packageFor
                    );
                    
                    $this->error = "SFD";
                    if($packageFor == NULL){
                        $this->error = "NRF";
                    }

                }else{
                    $this->error = "NRF";
                }            
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Subpackagemaster();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND " . $e->getMessage();
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>
