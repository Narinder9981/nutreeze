<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Packagemaster;

class WSPackageDetailsV2Controller extends WSBaseController {

    /**
     * @Route("/ws/packagedetailsV2/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function packagedetailsAction($param) {

        try {

            $this->title = "Package Details";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('lang_id', 'package_id', 'sub_package_id'),
                ),
                    );

            if ($this->validateData($param)) {

                $lang_id = $param->lang_id;
                $package_id = $param->package_id;
                $sub_package_id = $param->sub_package_id;
                $em = $this->getDoctrine()->getManager();

                $packageMaster = $em->getRepository("AdminBundle:Packagemaster")->findOneBy([
                    "language_id" => $lang_id,
                    "main_package_master_id" => $package_id,
                    "is_deleted" => 0
                ]);

                if ($packageMaster) {

                    $main_package_id = $packageMaster->getMain_package_master_id();
                    $sql_pk_for = "select main_package_for_master_id,days,description,name,name_db,friday_offday from package_for_master where is_deleted = 0 and language_id = '$lang_id' and type='package_for' ";
                    $pk_for = $this->fireQuery($sql_pk_for);

                    $packageFor = null;
                    if (!empty($pk_for)) {
                        foreach ($pk_for as $_pk_for) {
                            $sub_packages_data = null;

                            $duration_db_name = $_pk_for['name_db'];
                            #getSubPackages
                            $sql_get_sub_packages = "select * from sub_package_master 
									JOIN sub_package_price_master ON sub_package_master.main_sub_package_id = sub_package_price_master.sub_package_id 
									where sub_package_master.is_deleted = 0 and sub_package_price_master.is_deleted = 0 
									and sub_package_price_master.duration_type = '$duration_db_name' and sub_package_master.main_package_id = '$main_package_id' and  sub_package_master.main_sub_package_id = '$sub_package_id' ";

                            $sub_packages = $this->fireQuery($sql_get_sub_packages);

                            if (!empty($sub_packages)) {
                                foreach ($sub_packages as $_sub_packages) {

                                    $sub_pk_id = $_sub_packages['main_sub_package_id'];
                                    $price = $_sub_packages['price'];

                                    if ($price > 0) {
                                        $sub_package_combo = null;
                                        $sql_get_sub_package_combo = "select sub_package_combination_master.meal_value,
														product_category_master.product_category_name,product_category_master.main_product_category_master_id,
														product_category_master.count_in,sub_package_combination_master.sub_package_id 
														from sub_package_combination_master 
														JOIN product_category_master ON product_category_master.main_product_category_master_id = sub_package_combination_master.meal_type_id 
														where sub_package_combination_master.is_deleted = 0 and product_category_master.is_deleted = 0 and sub_package_combination_master.sub_package_id = '$sub_pk_id' group by sub_package_combination_master.sub_package_combination_master_id";

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
                                            'breakfast' => $totalBreakfast,
                                            'soup' => $totalSoup,
                                        );

                                        $sub_packages_data = array(
                                            "sub_package_id" => $_sub_packages['main_sub_package_id'],
                                            "price" => $price,
                                            "total_combo_count" => $totalComboCount,
                                            "sub_package_combo" => $sub_packages_combo,
                                        );
                                    }
                                }
                            }

                            $available_off_days = false;

                            if (in_array($_pk_for['main_package_for_master_id'], [1])) {
                                #only availbale for monthly package
                                $available_off_days = true;
                            }

                            if (!empty($sub_packages_data)) {
                                $packageFor [] = array(
                                    "package_for_id" => $_pk_for['main_package_for_master_id'],
                                    "name" => $_pk_for['name'],
                                    "days" => $_pk_for['days'],
                                    "friday_offday" => ($_pk_for['friday_offday'] == "yes")?1:0,
                                    "available_off_days" => $available_off_days,
                                    "description" => $_pk_for['description'],
                                    "sub_packages" => $sub_packages_data
                                );
                            }
                        }
                    }
                    $response = array(
                        "package_id" => $packageMaster->getMain_package_master_id(),
                        'description' => $packageMaster->getDescription(),
                        'package_grams' => $packageMaster->getPackage_grams(),
                        'package_gram_label' => $packageMaster->getGram_label(),
                        "package_name" => $packageMaster->getPackage_name(),
                        "off_days" => $packageMaster->getOff_days_allowed(),
                        "sub_package_list" => $packageFor
                    );
                    $this->error = "SFD";
                } else {
                    $this->error = "NRF";
                }
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Packagemaster();
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
