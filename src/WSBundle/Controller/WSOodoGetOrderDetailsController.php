<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;
class WSOodoGetOrderDetailsController extends WSBaseController {
    /**
     * @Route("/ws/oodoOrderDetailsperdate/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function oodoOrderDetailsperdateAction($param) {
       // try {
            $this->title = "Order Dates List";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('given_date','secret_key'),
                ),
            );
            if ($this->validateData($param)) {  
                $date = $given_date = !empty($param->given_date) ? strtotime(date('Y-m-d', strtotime($param->given_date))) : 0;  
                 $given_date = $param->given_date ;
                 $secret_key = $param->secret_key ;
                 if(md5('mf_oddo_key') ==  $secret_key ){

                 }
                 else{
                    $this->error = "SKW";
                    // $this->data = false;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Countrymaster();
                    // $response = $emptyObj;
                    $this->data = $emptyObj;
                    return $this->responseAction();
                 }
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();       

                $order_meal = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermealrelation")
                    ->findBy(array('requested_datetime' => $given_date,'is_deleted'=>0));
                $checkPauseQuery = "SELECT order_id FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.is_deleted = 0 and ((pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date_by_update >= '{$date}' and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_end_date_by_update is NULL and pause_package_history.resume_choice = 'customer' ) or (pause_package.pause_start_date<= '{$date}' and pause_package.pause_end_date >= '{$date}' and pause_package_history.resume_choice = 'admin' ) or (pause_package.pause_end_date is NULL and pause_package_history.resume_choice = 'admin' ))";
                $checkPauseList = $this->firequery($checkPauseQuery);
              // echo $checkPauseQuery . "<br><br>";
              // var_dump($order_meal) ; 
                $pasueOrderArray = NULL ;
                $order_meal_id_arr = [] ; 
                if($checkPauseList){
                   foreach($checkPauseList as $chkpkey=>$chkpval){
                        $pasueOrderArray[] = $chkpval['order_id'];
                   }
                   foreach ($order_meal as $mealkey => $meal_) {
                        if(in_array($meal_->getOrder_master_id(), $pasueOrderArray)){
                            unset($order_meal[$mealkey]);
                        }
                        else{
                            $order_meal_id_arr[] =  $meal_->getOrder_meal_relation_id() ;
                        }
                   }
                }
                //echo "<br><br>";
               // var_dump($pasueOrderArray);
               // echo "<br><br>";
                $order_meal_id_str = ''; 
                if($order_meal_id_arr != NULL && !empty($order_meal_id_arr )){
                    $order_meal_id_str = implode(",", $order_meal_id_arr);
                }
                $drivers = null;
                $products_array_all = null;
                $total_orders_of_day = count($order_meal);
//var_dump($order_meal);exit;

                if (!empty($order_meal) && $order_meal_id_str != '' ) {
                    //foreach ($order_meal as $meal_) {

                       // $order_id = $meal_->getOrder_master_id();

                        //$customer_name = '';

                        $meal_id = $meal_->getOrder_meal_relation_id();
                       // $date_time = $meal_->getRequested_datetime();
                        //$not_delivered_reason = $meal_->getNot_delivered_reason();
                        //$driver_id = $meal_->getAssign_driver_id();
                        //$last_modified_datetime = date('Y-m-d h:i A', strtotime($meal_->getLast_modified_datetime()));
                       // $status_name = ucfirst(str_replace("_", ' ', $meal_->getStatus()));

                        $sql_product_name = "select
                        meal_product_relation.meal_product_relation_id,product_category_master.product_category_name,product_master.product_name,product_master.main_product_master_id,meal_product_relation.proteins_amount,meal_product_relation.carbs_amount,meal_product_relation.raw_eggs,meal_product_relation.white_eggs,meal_product_relation.meal_type
                                   from meal_product_relation JOIN product_master ON product_master.main_product_master_id = meal_product_relation.main_product_id
                                   LEFT JOIN product_category_master ON      meal_product_relation.meal_type =  product_category_master.main_product_category_master_id
                                   where meal_product_relation.is_deleted = 0 and product_master.is_deleted = 0 and product_category_master.is_deleted = 0 and meal_id IN (".$order_meal_id_str.") group by meal_product_relation.meal_product_relation_id";
                        // echo "OrderId : ". $order_id . " ";
                        //  echo $sql_product_name ;
                        $products = $this->fireQuery($sql_product_name);
                        if (!empty($products)) {

                            foreach ($products as $product) {

                                $products_array_all [] = array(
                                    'meal_product_relation_id' => $product['meal_product_relation_id'],
                                    'main_product_master_id' => $product['main_product_master_id'],
                                    'oodo_product_id' => 0,//$product['oodo_product_id'],
                                    'product_name' => $product['product_name'],
                                    'proteins_amount' => $product['proteins_amount'],
                                    'carbs_amount' => $product['carbs_amount'],
                                    'raw_eggs' => $product['raw_eggs'],
                                    'white_eggs' => $product['white_eggs'],
                                    'meal_type' => $product['meal_type'],
                                    'order_meal_type_name' => $product['product_category_name'],
                                    'cnt' => 0
                                );
                            }
                        }
                   // }
                }

                $productWiseData = array();
                if (!empty($products_array_all)) {
                    foreach ($products_array_all as $_products_array_all) {

                        if (!array_key_exists($_products_array_all['main_product_master_id'], $productWiseData)) {
                            $productId = $_products_array_all['main_product_master_id'];
                            $productWiseData[] = array(
                                'productId' => $productId,
                                'oodo_product_id' => $_products_array_all['oodo_product_id'],
                                'name' => $_products_array_all['product_name'],
                                'proteins_amount' => $_products_array_all['proteins_amount'],
                                'carbs_amount' => $_products_array_all['carbs_amount'],
                                'raw_eggs' => $_products_array_all['raw_eggs'],
                                'white_eggs' => $_products_array_all['white_eggs'],
                                'order_meal_type_name' => $_products_array_all['order_meal_type_name'],
                                'cnt' => $_products_array_all['cnt'] + 1
                            );
                        } else {
                            $productId = $_products_array_all['main_product_master_id'];

                            $productWiseData[] = array(
                                'name' => $_products_array_all['product_name'],
                                'productId' => $productId,
                                'oodo_product_id' => $_products_array_all['oodo_product_id'],
                                'proteins_amount' => $productWiseData[$productId]['proteins_amount'] + $_products_array_all['proteins_amount'],
                                'carbs_amount' => $productWiseData[$productId]['carbs_amount'] + $_products_array_all['carbs_amount'],
                                'raw_eggs' => $productWiseData[$productId]['raw_eggs'] + $_products_array_all['raw_eggs'],
                                'white_eggs' => $productWiseData[$productId]['white_eggs'] + $_products_array_all['white_eggs'],
                                'order_meal_type_name' => $_products_array_all['order_meal_type_name'],
                                'cnt' => $productWiseData[$productId]['cnt'] + 1
                            );
                        }
                    }
                }

                if(!empty($productWiseData)){
                    $response = $productWiseData ;
                    $this->error = "SFD";
                } 
                else{
                    $response = false ;
                    $this->error = "NRF";
                }   
                
           
              
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Countrymaster();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        // } catch (\Exception $e) {
        //     $this->error = "SFND";
        //     $this->error_msg = $e->getMessage();
        //     $this->data = false;
        //     return $this->responseAction();
        // }
    }
}
?>