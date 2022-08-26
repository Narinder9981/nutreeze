<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Ordermealrelation;
use AdminBundle\Entity\Mealproductrelation;

class WSEditMealListController extends WSBaseController
{
    
/**
     * @Route("/ws/editMealList/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function editMealListAction($param){
        $this->title = "Edit Meal List";
        $this->status = 200;
        $this->message = true;

        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'language_id', 'date', 'order_id', 'meal_type', 'package_id', 'sub_package_id'),
            ),
                );
        $response = null;
        if ($this->validateData($param)) {

            $today = date('Y-m-d 00:00:00');

            $user_id = !empty($param->user_id) ? $param->user_id : 0;
            $order_id = $param->order_id;
            $sub_package_id = $param->sub_package_id;
            $package_id = $param->package_id;
//			$date=!empty($param->date)?$param->date:0;
            //$date=date('Y-m-d',($param->date/1000));
            $date = date('Y-m-d', strtotime($param->date));
            $language_id = !empty($param->language_id) ? $param->language_id : 1;
			$meal_type = !empty($param->meal_type) ? $param->meal_type : NULL;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();

            $query = "SELECT * FROM order_meal_relation JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id JOIN meal_product_relation ON meal_product_relation.meal_id = order_meal_relation.order_meal_relation_id 
			WHERE order_meal_relation.user_id = '$user_id' AND order_master.order_status != 'cancel' AND order_meal_relation.requested_datetime = '$date' and order_meal_relation.order_master_id = '$order_id' and order_master.sub_package_id = '$sub_package_id' and order_master.is_deleted = 0 and meal_product_relation.is_deleted = 0 and order_meal_relation.is_deleted = 0 group by order_meal_relation_id";
            // echo'<pre>';print_r($query);
            $statement = $connection->prepare($query);
            $statement->execute();
            $order_info = $statement->fetchAll();
            // echo'<pre>';print_r($order_info);die('test');
            $min_limit =$max_limit = 0 ; 
            $sub_package_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagemaster")->findOneBy(array("main_sub_package_id"=>$sub_package_id));
            if($sub_package_info){
                $min_limit = $sub_package_info->getMin_limit();
                $max_limit = $sub_package_info->getMax_limit();
            }
//           print_r($query);exit;
            if (!empty($order_info)) {
                
                foreach ($order_info as $key => $vls) {
                    // echo'<pre>';print_r($vls); die;
                    #edit time flag
                    //$date_before_two_days = date('Y-m-d 00:00:00',strtotime("-2 days",strtotime($vls['requested_datetime'])));	
                    $date_before_two_days = date('Y-m-d 00:00:00', strtotime("-".$this->SELECT_MEAL_AFTER_DAYS ." days", strtotime($vls['requested_datetime'])));

                    $editable_flag = false;
                    $date_array = array("two_date" => $date_before_two_days, "two_days_before_date" => strtotime($date_before_two_days), 'today' => strtotime($today));
                    	//	print_r($date_before_two_days);exit;
                   
                    #edit time flag ends

                    if ($vls['status'] == 'driver_assigned') {
                        $status = 'Assigned';
                    } else {
                        $status = $vls['status'];
                    }

                    if ($vls['status'] == 'ordered') {
                        $editable_flag = true;
                    } else {
                        $editable_flag = false;
                        if ($status == 'Assigned') {
                            if (strtotime($today) < strtotime($date_before_two_days)) {
                                $editable_flag = true;
                            }
                        }
                    }
                     if (strtotime($today) < strtotime($date_before_two_days)) {
                        $editable_flag = true;
                    } else {
                        $editable_flag = false;
                    }
					$order_data = NULL ;
					if($meal_type != NULL ){
						$order_data = $this->getOrderDataSpecificMealTypeAction($vls['order_meal_relation_id'], $meal_type , $language_id, $user_id) ;
					}
					else{
						$order_data = $this->getOrderDataAction($vls['order_meal_relation_id'], $language_id, $user_id) ;
					}
                    $packageSql = "select package_max_grams_limit from package_master where package_master_id = $package_id";
                    $package = $this->fireQuery($packageSql);
                    $max_grams = $package[0]['package_max_grams_limit']; 

                    $response[] = array(
                        'meal_id' => $vls['order_meal_relation_id'],
                       // 'order_data' => $this->getOrderDataAction($vls['order_meal_relation_id'], $language_id, $user_id),
                       'max_gram' => $max_grams,
						'order_data' => $order_data,
						'selected_proteins' => $vls['selected_proteins'],
						'selected_carbs' => $vls['selected_carbs'],
                        'order_status' => $status,
                        'editable_flag' => $editable_flag,
                        'sub_package_id'=>$sub_package_id,
                        'min_limit'=>$min_limit,
                        'max_limit'=>$max_limit,
                        'date_before_two_days'=>$date_before_two_days,
                        'today'=>$today,
                        'meal_date' => date('Y-m-d', strtotime($vls['requested_datetime'])),
                    );
                }
                $this->error = "SFD";
            } else {
                $order_status = 'not_allow_meal';
                $editable_flag = false;
                $meal_date = "{$date}";
                if (empty($response)) {
                    //$date_before_two_days = date('Y-m-d 00:00:00',strtotime("-2 days",strtotime($date)));
                    $date_before_two_days = date('Y-m-d 00:00:00', strtotime("-".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime($date)));
                    if (strtotime($today) < strtotime($date_before_two_days)) {
                        $editable_flag = true;
                        $order_status = 'allow_meal';
                    }
                }
                
                
                $response[] = array(
                    'order_status' => $order_status,
                    'editable_flag' => $editable_flag,
                    'meal_date' => $meal_date,
                    'sub_package_id'=>$sub_package_id,
                    'min_limit'=>$min_limit,
                    'max_limit'=>$max_limit,
                   
                );
                $this->error = "SFD";
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

