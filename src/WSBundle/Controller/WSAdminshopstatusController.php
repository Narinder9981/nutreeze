<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Statemaster;
use AdminBundle\Entity\Notifyuserlist;

class WSAdminshopstatusController extends WSBaseController {

    /**
     * @Route("/ws/getadminshopstaus/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function getadminshopstausAction($param) {
        try {
            $this->title = "Get Admin Shop status";
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('language_id'),
                ),
            );
            if ($this->validateData($param)) {
                $language_id = $param->language_id;
                $em = $this->getDoctrine()->getManager();
                $admin_status = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Adminshopstatus")->findOneBy(array("language_id"=>$language_id,"main_id"=>1));
                if($admin_status){
                    $response = array(
                        "busy_text"=>$admin_status->getBusy_text(),
                        "shop_sttaus"=>$admin_status->getAdmin_shop_status()
                    );
                }
                if($response){
                    $this->error = "SFD";
                }
                
            } else {
                $this->error = "PIM";
            }

            $this->status = 200;
            $this->message = true;

            if (empty($response)) {
                // $response = false;
                $this->error = "NRF";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Statemaster();
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
    
     /**
     * @Route("/ws/notifymeadd/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function notifymeaddAction($param) {
        try {
            $this->title = "Add Notify me";
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('package_id','start_date','user_id'),
                ),
            );
            if ($this->validateData($param)) {
                $user_id = $param->user_id;
                $package_id = $param->package_id;
                $start_date = $param->start_date;
                $em = $this->getDoctrine()->getManager();
                $admin_status = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Adminshopstatus")->findOneBy(array("main_id"=>1));
                if(!empty($admin_status) && ($admin_status->getAdmin_shop_status() == 'busy')){

                   $notify_user_list = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Notifyuserlist')->findOneBy(array("user_id"=>$user_id,"package_id"=>$package_id,"notify_status"=>'notify_me','is_deleted'=>0));
                   if(empty($notify_user_list)){
                       $notify_user_list = new Notifyuserlist();
                       $notify_user_list->setUser_id($user_id);
                       $notify_user_list->setPackage_id($package_id);
                       $notify_user_list->setSub_package_id(0);
                       $notify_user_list->setStart_date($start_date);
                       $notify_user_list->setCreated_datetime(date("Y-m-d H:i:s"));
                       $notify_user_list->setNotify_status('notify_me');
                       $notify_user_list->setIs_deleted(0);
                       $em->persist($notify_user_list);
                       $em->flush();
                       
                       $this->error = "SFD";
                       $response = true ;
                   }
                   else{

                       $this->error = "NRF";
                       $response = false ;
                   }
                }
                else{                    
                   $this->error = "SNB";
                   $response = false ;
                }
                if($response){
                    $this->error = "SFD";
                }
                
            } else {
                $this->error = "PIM";
            }

            $this->status = 200;
            $this->message = true;
          
            if (empty($response)) {
                // $response = false;
                $this->error = "NRF";
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Statemaster();
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