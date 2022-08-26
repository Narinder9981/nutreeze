<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Country;
use AdminBundle\Entity\Mealproductrelation;
class WSGetMyMealController extends WSBaseController {

    /**
     * @Route("/ws/getMyMeal/{param}",defaults = {"param"=""})
     * @Template()
     */
    public function getMyMealAction($param) {


        $this->title = "My Meal";
        $this->status = 200;
        $this->message = true;

        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id', 'language_id', 'date', 'order_id', 'sub_package_id'),
            ),
                );
        $response = null;

        if ($this->validateData($param)) {

            $today = date('Y-m-d 00:00:00');

            $user_id = !empty($param->user_id) ? $param->user_id : 0;
            $order_id = $param->order_id;
            $sub_package_id = $param->sub_package_id;
//			$date=!empty($param->date)?$param->date:0;
            //$date=date('Y-m-d',($param->date/1000));
            $date = date('Y-m-d', strtotime($param->date));
            $language_id = !empty($param->language_id) ? $param->language_id : 1;
			$meal_type_id = !empty($param->meal_type_id) ? $param->meal_type_id : NULL;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();

            $query = "SELECT * FROM order_meal_relation JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id 
			WHERE order_meal_relation.user_id = '$user_id' AND order_master.order_status != 'cancel' AND order_meal_relation.requested_datetime = '$date' and order_meal_relation.order_master_id = '$order_id' and order_master.sub_package_id = '$sub_package_id' and order_master.is_deleted = 0 and order_meal_relation.is_deleted = 0 group by order_meal_relation_id";

            $statement = $connection->prepare($query);
            $statement->execute();
            $order_info = $statement->fetchAll();
            // echo'<pre>';print_r($order_info);
            $min_limit =$max_limit = 0 ; 
            $sub_package_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Subpackagemaster")->findOneBy(array("main_sub_package_id"=>$sub_package_id));
            if($sub_package_info){
                $min_limit = $sub_package_info->getMin_limit();
                $max_limit = $sub_package_info->getMax_limit();
            }
          
            if (!empty($order_info)) {
                
                foreach ($order_info as $key => $vls) {
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
                    //print_r($vls);exit;
					if($meal_type_id != NULL ){
						$order_data = $this->getOrderDataSpecificMealTypeAction($vls['order_meal_relation_id'], $meal_type_id , $language_id, $user_id) ;
					}
					else{
						$order_data = $this->getOrderDataAction($vls['order_meal_relation_id'], $language_id, $user_id) ;
					}
                    // echo'<pre>';print_r($order_data);die('test');
                    $response[] = array(
                        'meal_id' => $vls['order_meal_relation_id'],
                       // 'order_data' => $this->getOrderDataAction($vls['order_meal_relation_id'], $language_id, $user_id),
						'order_data' => $order_data,
                        'order_status' => $status,
                        'editable_flag' => $editable_flag,
                        'sub_package_id'=>$sub_package_id,
                        'min_limit'=>$min_limit,
                        'max_limit'=>$max_limit,
                        'delivery_datetime' => $vls['delivery_datetime'],
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
        /**
     * @Route("/ws/filterWithSliderMeal/{param}",defaults = {"param"=""})
     * @Template()
     */
    public function filterWithSliderMealAction($param) {


        $this->title = "My Meal";
        $this->status = 200;
        $this->message = true;

        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                // 'field' => array('user_id', 'language_id', 'date', 'order_id', 'sub_package_id'),
                'field' => array('meal_id','package_id'),
            ),
                );
        $response = null;

        if ($this->validateData($param)) {

            $today = date('Y-m-d 00:00:00');

            $user_id = !empty($param->user_id) ? $param->user_id : 0;
            // $main_meal_id = $param->main_meal_id;
            $meal_id = $param->meal_id;
            $package_id = $param->package_id;
            $type = $param->type;
            $protein = $param->protein;
            $carbs = $param->carb;
            $date = date('Y-m-d');
            // $language_id = !empty($param->language_id) ? $param->language_id : 1;
			// $meal_type_id = !empty($param->meal_type_id) ? $param->meal_type_id : NULL;
          
            // $order_meal = $this->getDoctrine()->getManager()
            //     ->getRepository("AdminBundle:Mealproductrelation")
            //     ->findBy(array("meal_id" => $main_meal_id, "main_product_id"=>$meal_id ,"is_deleted" => 0));
                
            // $em = $this->getDoctrine()->getManager();

        
            if (!empty($meal_id)) {
                // foreach ($order_meal as $key => $val) {
                 
                // print_r($main_product_id);exit;
              
                    $mealArr = null;

                    $prottotal = 0;
                    $carbtotal = 0;
                    $fattotal = 0;
                    $calorytotal = 0 ; 
                    $comb = NULL ; 
                    $order_data = array();
                    $max_grams = 0;
                    if($type != 'none'){
                        
                        $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
                            'is_deleted' => 0,
                            'product_master_id' => $meal_id,
                            
                            // 'product_master_id' => 8,
                            'type' => $type,
                        ]);
                        
                            // print_r($comb); die;
                        if (!empty($comb)) {
                            foreach ($comb as $_comb) { 
                                
                                if($type == 'prot_carb'){
                                    $packageSql = "select package_max_grams_limit from package_master where package_master_id = $package_id";
                                    $package = $this->fireQuery($packageSql);
                                    $max_grams = $package[0]['package_max_grams_limit']; 
                                    
                                    if ($_comb->getProt_carb() == 'protein') 
                                    {
                                        $calc = 1;
                                        if($protein <= $max_grams){
                                            $calc = $protein/50;
                                        }  
                                        $prot = (int) $_comb->getProtein()*$calc;
                                        $fat = (int) $_comb->getFat()*$calc;
                                        $carb = (int) $_comb->getCarb()*$calc;
                                        $calory = (int) $_comb->getCalory()*$calc;
                                    }
                                    if ($_comb->getProt_carb() == 'carb') 
                                    {
                                        $calc1 = 1;
                                        if($carbs <= $max_grams){
                                            $calc1 = $carbs/50;
                                        }  
                                        $prot1 = (int) $_comb->getProtein()*$calc1;
                                        $fat1 = (int) $_comb->getFat()*$calc1;
                                        $carb1 = (int) $_comb->getCarb()*$calc1;
                                        $calory1 = (int) $_comb->getCalory()*$calc1;
                                    }
                                }
                            }
                            $prottotal = $prot1+$prot;
                            $fattotal = $fat1+$fat;
                            $carbtotal = $carb1+$carb;
                            $calorytotal = $calory1+$calory;
                            $order_data[] = array(
                                "meal_id" => $meal_id,
                                "calory"=> $calorytotal,
                                "fat" => $fattotal,
                                "prot" => $prottotal,
                                "carb" => $carbtotal,
                            );  
                        }
                    }
                    else{
                        $comb = $this->getDoctrine()->getRepository("AdminBundle:Productmealrelation")->findBy([
                            'is_deleted' => 0,
                            'product_master_id' => $meal_id,
                            // 'product_master_id' => 8,
                            'type' => $type,
                        ]);
                        if (!empty($comb)) {
                            foreach ($comb as $_comb) {    
                                $prot += (int) $_comb->getProtein();
                                $fat += (int) $_comb->getFat();
                                $carb += (int) $_comb->getCarb();
                                $calory += (int) $_comb->getCalory();
                            }
                        }  
                    }
                // }
                $response[] = array(
                    // 'meal_id' => $main_meal_id,
                    'order_data' => $order_data,
                    'today'=>$today,
                );
                
                $this->error = "SFD";
            } else {
                $order_status = 'not_allow_meal';
                $editable_flag = false;
                $meal_date = "{$date}";
                if (empty($response)) {
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
