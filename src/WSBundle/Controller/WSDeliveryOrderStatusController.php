<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Driverlocationhistory;

class WSDeliveryOrderStatusController extends WSBaseController {

    /**
     * @Route("/ws/deliveryorderstatus/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function deliveryorderstatusAction($param) {

        //try{
        $this->title = "Delivery Order Status";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'order_meal_relation_id', 'status','lat','lng'),
            ),
                );

        if ($this->validateData($param)) {
            // $status_arr = ['delivered', 'not_delivered', 'cancel'];

            $user_id = $param->user_id;
            $lat = $param->lat;
            $lng = $param->lng;
            $order_id = $param->order_meal_relation_id;
            $status = $param->status;
            $reason_id = !empty($param->reason_id) ? $param->reason_id : 0;
            $em = $this->getDoctrine()->getManager();
            // $status = $status_arr[$status];

            if ($status == 'not_delivered' || $status == 'cancel') {
                if (empty($param->reason_id)) {
                    $this->error = "PIM";
                    $this->error_msg = "Please Provide Reason";
                    return $this->responseAction();
                }
            }

            $reason_tc = $this->getDoctrine()->getManager()
                    ->getRepository("AdminBundle:Ordermealrelation")
                    ->findOneBy(array("order_meal_relation_id" => $order_id, "is_deleted" => 0));
            if (!empty($reason_tc)) {
                $join = '';
                if (!empty($reason_id)) {
                    $join .= ",not_delivered_reason='$reason_id'";
                }
                if (in_array($status, ['ordered', 'not_delivered', 'delivered', 'cancel'])) {

                    $query = "UPDATE order_meal_relation SET status='$status' , last_modified_datetime='".date("Y-m-d H:i:s")."' $join WHERE order_meal_relation_id='$order_id' AND assign_driver_id='$user_id'";
                    $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($query);
                    $stmt->execute();
                    // Add driver History 
                    $driver_location_history = new Driverlocationhistory();
                    $driver_location_history->setOrder_id($reason_tc->getOrder_master_id());
                    $driver_location_history->setOrder_meal_relation_id($order_id);
                    $driver_location_history->setDriver_user_id($user_id);
                    $driver_location_history->setLat($lat);
                    $driver_location_history->setLng($lng);
                    $driver_location_history->setLocation_created_date(date("Y-m-d"));
                    $driver_location_history->setLocation_created_time(date("H:i:s"));
                    $driver_location_history->setOrder_updated_status($status);
                    $em->persist($driver_location_history);
                    $em->flush();
                    
                    $this->error = "SFD";
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Usergoalmaster();
                    $this->data = $emptyObj;
                    $response = array('order_id' => $order_id, 'status' => $status);
                } else {
                    $this->error = "PIW";
                    $this->error_msg = "Status is wrong";
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Usergoalmaster();
                    $this->data = $emptyObj;
                    $this->responseAction();
                }
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
            $emptyObj = new Usergoalmaster();
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
