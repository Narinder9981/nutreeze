<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Termsconditionsmaster;


class WSTutorialvideolistController extends WSBaseController {

    /**
     * @Route("/ws/tutorialvideolist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function tutorialvideolistAction($param) {
        try {
            $this->title = "Tutorial Video List";
            $this->status = 200;
        	$this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array(),
                ),
                    );

            if ($this->validateData($param)) {
                $em = $this->getDoctrine()->getManager();
                $tutorial_video = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Videotutorial")->find(1);
                if($tutorial_video){
                    $response = array(
                        "video_id"=>$tutorial_video->getVideo_id(),
                        "video_link"=>$tutorial_video->getVideo_link(),
                        "video_title"=>$tutorial_video->getVideo_title()
                    );
                }else{
                    $this->error = "NRF";
                }
            } else {
                $this->error = "PIM";
            }
            if (!empty($response)) {
                $this->error = "SFD";
            } else {
                $this->error = "NRF";
            }

            if (empty($response)) {
                // $response = false;
                $this->status = 201;
				$this->message = false;
				$emptyObj = new Termsconditionsmaster();
				$response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND";
            $this->error_msg = $e->getMessage();
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>
