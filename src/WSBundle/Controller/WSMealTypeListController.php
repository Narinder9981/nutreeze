<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Productcategorymaster;

class WSMealTypeListController extends WSBaseController {

    /**
     * @Route("/ws/mealtypelist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function mealtypelistAction($param) {

        //try{
        $this->title = "Meal Type List";
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

            //$sql = "select * from product_category_master master JOIN product_category_package_relation rel ON master.main_product_category_master_id = rel.product_category_id where master.is_deleted = 0 and master.language_id = '$lang_id' and rel.package_id = '$package_id' and rel.is_deleted = 0 group by product_category_package_relation_id";
            $sql = "select * from product_category_master master JOIN product_category_package_relation rel ON master.main_product_category_master_id = rel.product_category_id where master.is_deleted = 0 and master.language_id = '$lang_id' and rel.package_id = '$package_id' and rel.is_deleted = 0 group by product_category_master_id";

            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();
            $get_tc = $stmt->fetchAll();

            if (!empty($get_tc)) {
                foreach ($get_tc as $key => $val) {
                    $get_tc2 = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcategorymaster")
                            ->findOneBy(array("language_id" => 2, "main_product_category_master_id" => $val['main_product_category_master_id'], "is_deleted" => 0));
                    $response[] = array(
                        'meal_type_id' => $val['main_product_category_master_id'],
                        'meal_type_image' => $this->getMediaDetailAction($val['product_category_image_id']),
                        'meal_type_name' => $val['product_category_name'],
                        'meal_type_name_ar' => !empty($get_tc2) ? $get_tc2->getProduct_category_name() : '',
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
            $emptyObj = new Productcategorymaster();
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
