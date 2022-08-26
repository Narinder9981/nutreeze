<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Ordermaster;
use AdminBundle\Entity\Couponmaster;
use AdminBundle\Entity\Couponusagehistory;
use AdminBundle\Entity\Ordermealtypesincluderelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Orderpackageupgradehistory;

class WSPurchaseOderDateController extends WSBaseController {

    /**
     * @Route("/ws/purchaseorderdate/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function purchaseorderdateAction($param) {

        //try{
        $this->title = "Purchase order date";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array(  'start_date', 'package_for', 'user_id'),
            ),
                );

        if ($this->validateData($param)) {
            $start_date = date('Y-m-d', strtotime($param->start_date));
            $package_for = $param->package_for; //package_for can be both workout as well scheduled so changes here so get comma separated ids ...
            $package_id = isset($param->package_id) ? $param->package_id : 0;
            $lang_id = isset($param->language_id) ? $param->language_id : 1;
            $user_id = $param->user_id;
            $end_date = '';
            $off_days = !empty($param->off_days) ? $param->off_days : null;
            $em = $this->getDoctrine()->getManager();
            $days_array_is_wrong = false;
            #package days
            $sql_pk_days = "select days, friday_offday from package_for_master where is_deleted = 0 and main_package_for_master_id = '$package_for' group by main_package_for_master_id";
            $days = $this->fireQuery($sql_pk_days);
            $dates = null;
            $offDayArray = [] ;
            $total_off_days = 0;
            $off_days = str_replace("\\", "", $off_days);
            $off_days = (array) json_decode($off_days);

            $friday_off_day = "yes" ;
            if ($days) {
                $friday_off_day = $days[0]['friday_offday'] ;
            }
            if($friday_off_day  == "yes"){
                $offDayArray = array("main_days_master_id"=>"5");//array();
                $off_days[] = (object)array("main_days_master_id"=>"5");//array();  
            }
            
            
            $order_start_date = strtotime($start_date);
            $order_end_date = '';           
            if (!empty($off_days)) {
                foreach ($off_days as $_off_days) {
                   // if ($_off_days->main_days_master_id != 5) {
                        #skip friday as it will count in package but as regular off day.
                        $offDayArray [] = $_off_days->main_days_master_id;
                   // }

                    if (!array_key_exists('main_days_master_id', $_off_days)) {
                        $days_array_is_wrong = true;
                        break;
                    }
                }
            }
            
            $package_type = $festival_effect_apply = '';
            if ($days) {
                $pk_days = $days[0]['days'];
                $current_festival = NULL ;
                $current_festival = $this->getUpcomingFestival($start_date);
                if($package_id!= 0 ){
                    $packageMaster = $em->getRepository("AdminBundle:Packagemaster")->findOneBy([                       
                        "main_package_master_id" => $package_id,
                        "is_deleted" => 0
                    ]);

                    if($packageMaster){  
                        $main_package_id  = $packageMaster->getMain_package_master_id();
                        $festival_effect_apply = $packageMaster->getFestival_affect();
                        $package_type = $packageMaster->getPackage_type(); 
                        $need_tocheck_subpackageFlag = false  ;
                        $remaining_days_in_festival = 0 ; 
                        //$current_festival = NULL;
                        if($current_festival == NULL ){
                            $need_tocheck_subpackageFlag = false ;
                        }
                        else{
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
                        
                        $removed  = false ;
                        $display_package_as_it_is = false ;
                        if($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays == $pk_days){
                            // display package with minuns days 
                            $display_package_as_it_is = false ;
                            $pk_days = $remaining_days_in_festival ; 
                            
                        }
                        else if ($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays != $pk_days && $remaining_days_in_festival >= $pk_days){
                            // display package as it is 
                             $display_package_as_it_is = true ;

                        }
                        else if ($need_tocheck_subpackageFlag == true && $minuns_from_package_daysPackageDays != $pk_days && $remaining_days_in_festival < $pk_days){
                            // remove this package from list
                             $display_package_as_it_is = false ;
                             $removed  = true ;
                             $pk_days = 0 ;

                        }
                        else if ($need_tocheck_subpackageFlag == false ){
                            // display package as it is 
                             $display_package_as_it_is = true ;
                        }
                       
                    }
                }
                $festival_start_date = NULL ;
                if($package_id == 0 ){
                     // find latest festival start date 
                  //  $current_festival = $this->getUpcomingFestival($start_date);
                   
                }
                 if($current_festival){
                        $festival_start_date = $current_festival['start_date'];
                    }
               
                if($package_id != 0 && $package_type == 'festival'){
                    if(strtotime($festival_start_date) >=  $order_start_date){
                        $order_start_date = strtotime($festival_start_date) ;
                        $start_date = $festival_start_date ; 
                    }
                }
                 
                $order_end_date = strtotime("+$pk_days days", $order_start_date);

                while ($pk_days > 0) {                    
                    if ($order_start_date <= $order_end_date) {
                        if (!in_array(date('N', $order_start_date), $offDayArray)) {
                            $dates [] = date('Y-m-d', $order_start_date);
                            $pk_days = $pk_days - 1;
                        }
                    } else {
                        #for extending day no need to include friday as off_day not regular off day
                        if (!in_array(date('N', $order_start_date), $offDayArray) && date('N', $order_start_date) != 5) {
                            $dates [] = date('Y-m-d', $order_start_date);
                            $pk_days = $pk_days - 1;
                        }
                    }
                    if ($pk_days > 0) {
                        if($package_id != 0 ){
                            $order_start_date = strtotime("+1 days", $order_start_date);                        
                        }
                        else{
                            if($festival_start_date == NULL ){
                                 $order_start_date = strtotime("+1 days", $order_start_date);   
                            }
                            else{
                                if(strtotime($festival_start_date) >  strtotime("+1 days", $order_start_date)  ){
                                    $order_start_date = strtotime("+1 days", $order_start_date);  
                                }
                                else{
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            $end_date = date('Y-m-d', $order_start_date);
                   #package days

            if ($days_array_is_wrong) {
                $this->error = "PIW";
                $this->error_msg = "Day Array is Wrong";
                return $this->responseAction();
            }
            $this->error = "SFD";
            $package_details = NULL ;
            if($package_id != 0 ){
                $package_details = array(
                    "package_id"=>$package_id,
                    "package_type"=>$package_type,
                    "festival_effect"=>$festival_effect_apply
                );
            }
            $response = array(
                "order_start_date"=>$start_date,
                "order_end_date"=>$end_date,
                "package_for"=>$package_for,
                "package_details"=>$package_details
            );
           
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Ordermaster();
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
