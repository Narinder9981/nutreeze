<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Packagemaster;

class WSPackageTypelistController extends WSBaseController {

    /**
     * @Route("/ws/packagetypelist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function packagetypelistAction($param) {

        try {
            $this->title = "Package Type List";
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
                $show_festival_package = isset($param->show_festival_package) ? $param->show_festival_package : "1" ;
                if($show_festival_package == "1" ){
                    $show_festival_package = false ;
                }
                else{
                    $show_festival_package = true ;
                }
                $em = $this->getDoctrine()->getManager();

                // $get_tc = $this->getDoctrine()->getManager()
                //         ->getRepository("AdminBundle:Packagemaster")
                //         ->findBy(array("language_id" => $lang_id, "is_deleted" => 0), array("sort_order" => "DESC"));

                $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Packagemaster")
                        ->findBy(array("language_id" => $lang_id, "is_deleted" => 0,"package_pause"=>"no"), array("sort_order" => "DESC"));
                if($show_festival_package == false ){
                    $get_tc = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Packagemaster")
                        ->findBy(array("language_id" => $lang_id, "is_deleted" => 0,"package_pause"=>"no",'package_type'=>'normal'), array("sort_order" => "DESC"));
                }
                if (!empty($get_tc)) {
                    foreach ($get_tc as $key => $val) {

                        $img_arr = $this->getMediaDetailAction($val->getImg_id());
                        $img_url = null;
                        if (!empty($img_arr)) {
                            $img_url = $img_arr['url'];
                        }
                        #get
                        $response[] = array(
                            'package_master_id' => $val->getMain_package_master_id(),
                            'package_name' => $val->getPackage_name(),
                            'package_type' => $val->getPackage_type(),
                            'festival_affect' => $val->getFestival_affect(),
                            'description' => $val->getDescription(),
                            'img_url' => $img_url,
                            'package_grams' => $val->getPackage_grams(),
                            'gram_label' => $val->getGram_label(),
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
                $emptyObj = new Packagemaster();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND";
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>
