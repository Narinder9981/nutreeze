<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Subpackagemaster;

class WSPackageExploreCountController extends WSBaseController {

    /**
     * @Route("/ws/packageExploreCount/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function packageexploreAction($param) {
        try {
            $this->title = "Explore Active packege count";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('lang_id','user_id'),
                ),
                    );

            if ($this->validateData($param)) {

                $lang_id = $param->lang_id;
                $user_id = $param->user_id;
                $em = $this->getDoctrine()->getManager();

                $packageMaster = $em->getRepository("AdminBundle:Packagemaster")->findBy([
                    "language_id" => $lang_id,
                    "is_deleted" => 0
                ]);

                if($packageMaster){

                    foreach($packageMaster as $packageMasterid){
                        $main_package_id[]  = $packageMasterid->getMain_package_master_id();
                    }
                    $main_package_id = implode(',', $main_package_id);
                    $sql_get_sub_package_combo = "select sub_package_combination_master.meal_value,
                    product_category_master.product_category_name,product_category_master.main_product_category_master_id,
                    product_category_master.count_in,sub_package_combination_master.sub_package_id,sub_package_master.main_package_id
                    from sub_package_combination_master 
                    JOIN product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
                    JOIN sub_package_master ON sub_package_master.main_sub_package_id = sub_package_combination_master.sub_package_id
                    where sub_package_master.main_package_id in ('$main_package_id')
                    and sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and product_category_master.language_id = ' $lang_id' group by sub_package_combination_master.sub_package_combination_master_id";
                    $sub_packages_combo = $this->fireQuery($sql_get_sub_package_combo);

                    $sql_get_freezDates = "select start_date,end_date from freeze_subpackage 
                    where freeze_subpackage.user_id = '$user_id' and freeze_subpackage.is_deleted = 0 ";
                    $freezeDatesByUser = $this->fireQuery($sql_get_freezDates);

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

                    $response = array(
                        'meals' => $totalMeals,
                        'snacks' => $totalSnacks,
                        'soup' => $totalSoup,
                        'breakfast' => $totalBreakfast,
                        'freezDatesByUser' => $freezeDatesByUser,
                    );


                    $this->error = "SFD";
                   

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