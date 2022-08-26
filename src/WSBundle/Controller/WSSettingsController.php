<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Aboutus;

class WSSettingsController extends WSBaseController {

    /**
     * @Route("/ws/settings/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function settingsAction($param) {
        try {

            $this->title = "Settings";
            $this->status = 200;
        	$this->message = true;
            //$param = $this->requestAction($this->getRequest()) ;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array(),
                ),
            );
            if ($this->validateData($param)) {

                $con = $this->getDoctrine()->getManager()->getConnection();

                $sql = "SELECT * FROM `general_setting` where general_setting_key = 'app_info' and is_deleted = 0";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $settings = $stmt->fetchAll();
                $response = null;
                if ($settings) {
                    foreach ($settings as $key => $val) {
                        $appdata = json_decode($val['general_setting_value']);
                        if (!empty($appdata)) {
                            $response = array('facebook_link' => $appdata[0]->data->facebook_link, 'twitter_link' => $appdata[0]->data->twitter_link, 'google_link' => $appdata[0]->data->google_link, 'linkedin_link' => $appdata[0]->data->linkedin_link, 'whatsapp_link' => $appdata[0]->data->whatsapp_link, 'whatsapp_number' => $appdata[0]->data->whatsapp_number);
                        }
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
				$emptyObj = new Aboutus();
				$response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND$e";
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>
