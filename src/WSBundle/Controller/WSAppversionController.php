<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Statemaster;
use AdminBundle\Entity\Countrymaster;

class WSAppversionController extends WSBaseController {

    /**
     * @Route("/ws/appversionlist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function appversionlistAction($param) {
        try {
            $this->title = "app version List";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('app_id','app_type'),
                ),
            );
            if ($this->validateData($param)) {
                $app_id = $param->app_id;
                $app_type = $param->app_type;

               

                $em = $this->getDoctrine()->getManager();
                $app_version_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Appversionmaster")->findBy(array("is_deleted"=>0,"app_type"=>$app_type,"app_id"=>$app_id));
                if($app_version_list){
                    $this->error = "SFD";
                    foreach ($app_version_list as $appkey=>$appval){
                        $response[] = array(
                            "app_version_id"=>$appval->getApp_version_master_id(),
                            "app_type"=>$appval->getApp_type(),
                            "app_id"=>$appval->getApp_id(),
                            "version_no"=>$appval->getVersion_no(),
                            "force_type"=>$appval->getForce_update(),
                            "created_datetime"=>$appval->getCreated_datetime()
                        );
                    }
                }
                
            } else {
                $this->error = "PIM";
            }

         
            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Statemaster();
                $response = $emptyObj;
                $this->error = "NRF";
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