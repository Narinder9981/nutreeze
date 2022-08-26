<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Country;

class WSGetMyOrdersController extends WSBaseController {

    /**
     * @Route("/ws/getMyOrdersNotInuse/{param}",defaults = {"param"=""})
     * @Template()
     */
    public function getMyOrdersNotInuseAction($param) {


        $this->title = "My Orders";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'language_id', 'date'),
            ),
                );
        $response = null;

        if ($this->validateData($param)) {
            date_default_timezone_set("Asia/Kuwait");
            $user_id = !empty($param->user_id) ? $param->user_id : 0;
            $date_check = !empty($param->date) ? (date('Y-m-d', ($param->date / 1000))) : 0;
            $language_id = !empty($param->language_id) ? $param->language_id : 1;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $date = date('Y-m-d');
            $query = "SELECT * FROM order_master WHERE end_date >= '" . $date . "' and order_status='success'";
            $statement = $connection->prepare($query);
            $statement->execute();
            $order_info = $statement->fetchAll();

            if (!empty($order_info)) {
                foreach ($order_info as $key => $val) {
                    $query1 = "SELECT * FROM order_meal_relation WHERE order_master_id = '" . $val['order_master_id'] . "' AND DATE_FORMAT(requested_datetime,'%Y-%m-%d') = '" . $date_check . "' ";
                    $statement1 = $connection->prepare($query1);
                    $statement1->execute();
                    $order_meal_info = $statement1->fetchAll();
                    if (!empty($order_meal_info)) {
                        foreach ($order_meal_info as $kys => $vls) {
                            if ($vls['assign_driver_id'] != 0) {
                                $status = 'Assigned';
                            } else {
                                $status = $vls['status'];
                            }
                            $response[] = array(
                                'order_id' => $vls['order_meal_relation_id'],
                                'unique_no' => $vls['unique_no'],
                                'order_data' => $this->getOrderDataAction($vls['order_meal_relation_id'], $language_id),
                                'order_status' => $status,
                                'request_date' => date('Y-m-d', strtotime($vls['requested_datetime'])),
                            );
                        }
                    }
                }
                if (!empty($response)) {
                    $this->error = "SFD";
                } else {
                    $this->error = "NRF";
                }
            } else {
                $this->error = "NRF";
            }

            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Country();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } else {
            $this->error = "PIM";
        }
    }

}
