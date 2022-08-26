<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Subpackagemaster;

class WSPackagelistController extends WSBaseController {

    /**
     * @Route("/ws/packagelist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
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

                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Subpackagemaster")
                        ->findBy(array("language_id" => $lang_id, "main_package_id" => $package_id, "is_deleted" => 0));

                if (empty($get_tc)) {
                    $get_tc = $this->getDoctrine()->getManager()
                            ->getRepository("AdminBundle:Subpackagemaster")
                            ->findBy(array("main_package_id" => $package_id, "is_deleted" => 0));
                }

                if (!empty($get_tc)) {
                    foreach ($get_tc as $key => $val) {

                        $sql_combo_price = "select * from sub_package_price_master p_p_m 				
						where p_p_m.is_deleted = '0' and p_p_m.sub_package_id = '" . $val->getMain_sub_package_id() . "' ";
                        $sub_package_price = $this->fireQuery($sql_combo_price);

                        $price_array = array('monthly' => 0, 'weekly' => 0);
                        $price_array_new = null;
                        $min_price = 10000000000000000;
                        $max_price = 0;

                        if (!empty($sub_package_price)) {
                            foreach ($sub_package_price as $price_sub) {
                                $duration = $price_sub['duration_type'];
                                $price_array[$duration] = $price_sub['price'];

                                /*
                                  if($duration == 'monthly'){
                                  $package_for_id = 1;
                                  }

                                  if($duration == 'weekly'){
                                  $package_for_id = 2;
                                  }
                                 */
                                $sql_pk_for = "select main_package_for_master_id,days,description from package_for_master where name_db = '$duration' group by main_package_for_master_id and is_deleted = 0 ";
                                $pk_for = $this->fireQuery($sql_pk_for);
                                $days = 0;
                                $description = '';
                                if ($pk_for) {
                                    $package_for_id = $pk_for[0]['main_package_for_master_id'];
                                    $days = $pk_for[0]['days'];
                                    $description = $pk_for[0]['description'];
                                }

                                $price_array_new [] = array(
                                    "package_for_id" => $package_for_id,
                                    "days" => $days,
                                    "description" => $description,
                                    "price_duration_name" => ucfirst($duration),
                                    "price" => $price_sub['price'],
                                );
                                if ($price_sub['price'] < $min_price) {
                                    $min_price = $price_sub['price'];
                                }
                                if ($price_sub['price'] > $max_price) {
                                    $max_price = $price_sub['price'];
                                }
                            }
                        }

                        $response[] = array(
                            'sub_package_master_id' => $val->getMain_sub_package_id(),
                            'grams' => $val->getGrams(),
                            'price' => $max_price,
                            'min_price' =>$min_price ,
                            'price_array' => $price_array_new
                        );
                    }
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
