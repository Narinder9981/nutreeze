<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Country;

class WSGetDriversOrdersV1QtyUpdateController extends WSBaseController {

    /**
     * @Route("/ws/getDriversOrdersV1QtyUpdate/{param}",defaults = {"param"=""})
     * @Template()
     */
    public function getDriversOrdersV1QtyUpdateAction($param) {


        $this->title = "Driver Orders V1 qty update";
        $this->status = 200;
        $this->message = true;

        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array(),
            ),
                );
        $response = null;

        if ($this->validateData($param)) {
            $user_id = !empty($param->user_id) ? $param->user_id : 0;
            $lat = !empty($param->lat) ? $param->lat : 0;
            $requested_status = !empty($param->status) ? $param->status : NULL ;
            $isTodaysOrder = isset($param->isTodaysOrder) ? $param->isTodaysOrder : 'true' ;
            if($isTodaysOrder == 'true')
                $today = date('Y-m-d');
            else
                $today = date('Y-m-d', strtotime(' +1 day')) ;
            $lng = !empty($param->lng) ? $param->lng : 0;
            $language_id = !empty($param->language_id) ? $param->language_id : 1;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $where = 'is_deleted = 0 ';
			
			$area_id = isset($param->area_id) ? $param->area_id : NULL ;
			 
            if (!empty($user_id)) {
                $where .= " AND omr.assign_driver_id = '$user_id' ";
            }

            if ($today != '') {
                //$where.= " AND omr.requested_datetime <= '2019-06-19' ";
                $where .= " AND  omr.requested_datetime = '$today' ";
            }
            if($requested_status != NULL){
                
				
				
                if($requested_status == 'not_delivered' || $requested_status == 'driver_assigned' ){
                    $requested_status = "'not_delivered' , 'driver_assigned'";
                }
				else{
					$requested_status = "'" .  $requested_status ."'";
				}
                $where .= " AND  omr.status IN ( ". $requested_status. " ) ";
            }
			
			
			if($area_id != NULL){
                $where .= " AND omr.order_master_id IN ( SELECT order_master_id FROM `order_master` join address_master on address_master.main_address_id = order_master.delivery_address_id where address_master.area_id = ".$area_id ." and order_master.is_deleted = 0 ) " ; 
            }

            $array = array('ordered', 'not_delivered', 'delivered', 'cancel', 'driver_assigned');
            $query = "SELECT * FROM order_meal_relation omr WHERE $where";
            //echo $query ;exit;
            $statement = $connection->prepare($query);
            $statement->execute();
            $order_info = $statement->fetchAll();

            if (!empty($order_info)) {
                foreach ($order_info as $key => $val) {

                    $sql1 = "select lat,lng from address_master where owner_id = '" . $val['user_id'] . "' and is_deleted = 0 LIMIT 1";
                    $statement1 = $connection->prepare($sql1);
                    $statement1->execute();
                    $user_lat_lng = $statement1->fetchAll();

                    if (!empty($user_lat_lng)) {
                        $val['lat'] = $user_lat_lng[0]['lat'];
                        $val['lang'] = $user_lat_lng[0]['lng'];
                    }

                    $order_status = $val['status'];
                    if ($order_status == 'not_delivered' or $order_status == 'delivered') {
                        
                    } else {
                        $order_status = 'ordered';
                    }


                    $order_master_id = $val['order_master_id'];

                    #get delivery method and delivery time
                    $sql = "select order_master_id,time_slot_master.*,delivery_method_master.* from order_master 
							 JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id
							 JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
							 where order_master_id = '$order_master_id' and delivery_method_master.language_id = '$language_id' and time_slot_master.language_id = '$language_id'";

                    $deliveryData = $this->fireQuery($sql);
                    if (empty($deliveryData)) {
                        $sql = "select order_master_id,time_slot_master.*,delivery_method_master.* from order_master 
							 JOIN delivery_method_master ON delivery_method_master.main_delivery_method_master_id = order_master.delivery_method_id
							 JOIN time_slot_master ON time_slot_master.main_time_slot_master_id = order_master.delivery_time_id 
							 where order_master_id = '$order_master_id' group by order_master_id";

                        $deliveryData = $this->fireQuery($sql);
                    }

                    $deliveryDataArray = null;
                    if (!empty($deliveryData)) {
                        $deliveryDataArray = array(
                            "time_slot_id" => $deliveryData[0]['main_time_slot_master_id'],
                            "time_slot_title" => $deliveryData[0]['title'],
                            //"start_time" => strtotime($deliveryData[0]['start_time']),
                            //"end_time" => strtotime($deliveryData[0]['end_time']),
                            "start_time" => $deliveryData[0]['start_time'],
                            "end_time" => $deliveryData[0]['end_time'],
                            "delivery_method" => $deliveryData[0]['name']
                        );
                    }
                    #get delivery method and delivery time done

                    $distance = $this->distance((float) $lat, (float) $lng, (float) $val['lat'], (float) $val['lang'], 'k');

                    $order_key = array_search($val['status'], $array);
                    $response[] = array(
                        'order_id' => $val['order_meal_relation_id'],
                        'unique_no' => $val['unique_no'],
                        'order_by' => $val['user_id'],
                        'order_data' => null , //$this->getOrderDataV1QtyUpdateAction($val['order_meal_relation_id'], $language_id),
                        'order_status' => $order_status,
                        'requested_datetime' => strtotime($val['requested_datetime']) * 1000,
                        'created_datetime' => strtotime($val['created_datetime']) * 1000,
                        'requested_datetime_read' => $val['requested_datetime'],
                        'created_datetime' => $val['created_datetime'],
                        'order_status_id' => $order_key + 1,
                        'customer_details' => $this->getUserdetailsAction($val['user_id']),
                        'distance' => $distance,
                        'user_lat' => $val['lat'],
                        'user_lng' => $val['lang'],
                        'deliveryDataArray' => $deliveryDataArray
                    );
                }


                $sort_col = array();
                $sort_colOrdered = array();
                $sort_colDelivered = array();
                $sort_colNotDelivered = array();
                foreach ($response as $key => $row) {
                    if ($row['order_status'] == 'ordered') {
                        $sort_colOrdered[] = $row['distance'];
                    } else if ($row['order_status'] == 'delivered') {
                        $sort_colDelivered[] = $row['distance'];
                    } else if ($row['order_status'] == 'not_delivered') {
                        $sort_colNotDelivered[] = $row['distance'];
                    }
                    //$sort_col[$key] = $row['distance'];
                }
                //array_multisort($sort_col, SORT_ASC, $response);
                /* $sort_col1 = array();
                  foreach ($response as $key2=> $row2) {
                  $sort_col1[$key2] = $row2['order_status_id'];
                  }
                  array_multisort($sort_col1, SORT_ASC, $response); */

                $pendingOrder = null;
                $deliveredOrder = null;
                $driverassignedOrder = null;
                $cancelOrder = null;
                $notdeliveredOrder = null;
                $orderList = array();
                if (!empty($response)) {
                    foreach ($response as $_res) {
                        if ($_res['order_status'] == 'ordered') {
                            $pendingOrder[] = $_res;
                        } else if ($_res['order_status'] == 'delivered') {
                            $deliveredOrder[] = $_res;
                        } else if ($_res['order_status'] == 'driver_assigned') {
                            $driverassignedOrder[] = $_res;
                        } else if ($_res['order_status'] == 'cancel') {
                            $cancelOrder[] = $_res;
                        } else if ($_res['order_status'] == 'not_delivered') {
                            $notdeliveredOrder[] = $_res;
                        }
                    }

                    if (!empty($pendingOrder)) {
                        array_multisort($sort_colOrdered, SORT_ASC, $pendingOrder);
                        $orderList = array_merge($orderList, $pendingOrder);
                    }
                    if (!empty($notdeliveredOrder)) {
                        array_multisort($sort_colNotDelivered, SORT_ASC, $notdeliveredOrder);
                        $orderList = array_merge($orderList, $notdeliveredOrder);
                    }
                    if (!empty($deliveredOrder)) {
                        array_multisort($sort_colDelivered, SORT_ASC, $deliveredOrder);
                        $orderList = array_merge($orderList, $deliveredOrder);
                    }

                    $response = $orderList;
                }

                $this->error = "SFD";
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
