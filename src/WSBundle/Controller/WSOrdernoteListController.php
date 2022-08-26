<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Productcategorymaster;

class WSOrdernoteListController extends WSBaseController {

    /**
     * @Route("/ws/ordernotelist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function ordernotelistAction($param) {

        //try{
        $this->title = "Meal Type List";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('lang_id'),
            ),
                );

        if ($this->validateData($param)) {

            $lang_id = $param->lang_id;
            $em = $this->getDoctrine()->getManager();

            //$sql = "select * from product_category_master master JOIN product_category_package_relation rel ON master.main_product_category_master_id = rel.product_category_id where master.is_deleted = 0 and master.language_id = '$lang_id' and rel.package_id = '$package_id' and rel.is_deleted = 0 group by product_category_package_relation_id";
            $sql = "select * from order_note_master where is_deleted = 0 and language_id = '$lang_id' ";

            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();
            $get_tc = $stmt->fetchAll();

            if (!empty($get_tc)) {
                foreach ($get_tc as $key => $val) {
                    
                    $response[] = array(
                        'main_order_note_id' => $val['main_order_note_id'],                        
                        'order_note_text' => $val['order_note_text'],                       
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

