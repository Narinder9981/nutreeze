<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Country;

class WSGetMyMealV1QtyUpdateController extends WSBaseController {

    /**
     * @Route("/ws/getMyMealV1QtyUpdate/{param}",defaults = {"param"=""})
     * @Template()
     */
    public function getMyMealV1QtyUpdateAction($param) {


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
            $meal_date_format = date('Y-m-d', strtotime($param->date));
            $language_id = !empty($param->language_id) ? $param->language_id : 1;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();

            $query = "SELECT * FROM order_meal_relation JOIN order_master ON order_master.order_master_id = order_meal_relation.order_master_id 
			WHERE order_meal_relation.user_id = '$user_id' AND order_master.order_status != 'cancel' AND order_meal_relation.requested_datetime = '$date' and order_meal_relation.order_master_id = '$order_id' and order_master.sub_package_id = '$sub_package_id' and order_master.is_deleted = 0 and order_meal_relation.is_deleted = 0 group by order_meal_relation_id";

            $statement = $connection->prepare($query);
            $statement->execute();
            $order_info = $statement->fetchAll();
            $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                array(
                    "order_id" => $order_id,
                    "is_deleted" => 0
                )
            );
            $PauseDays =  [] ;
            
            $pause_days = 0;
            if ($checkPause) {
                $pauseOnce = true;


                foreach ($checkPause as $_checkPause) {

                    
                    $pause_start_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_start_date())));
                    $pasue_end_date = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date())));
                    $pause_end_date_by_update = strtotime(date('Y-m-d', strtotime($_checkPause->getPause_end_date_by_update())));

                    $pause_pacgae_historyInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->find($_checkPause->getPause_package_history_id());
                    $resume_choice = 'admin';
                    if($pause_pacgae_historyInfo){
                        $resume_choice = $pause_pacgae_historyInfo->getResume_choice() ;
                    }
                    
                    $pause_start_date_response = date('Y-m-d', $pause_start_date);
                    $pasue_end_date_response = date('Y-m-d', $pasue_end_date);
                    if($resume_choice == 'admin'){
                        if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                            if(strtotime($meal_date_format) >= $pause_start_date){
                                $this->error = "PIP";
                                $this->error_msg = "Your Package is in Pause mode";
                                // $this->data = false;
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Country();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                        }
                    }
                    else if ($resume_choice == 'customer'){
                        if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                            if(strtotime($meal_date_format) >= $pause_start_date){
                                $this->error = "PIP";
                                $this->error_msg = "Your Package is in Pause mode";
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Country();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                        }
                        elseif($_checkPause->getPause_end_date_by_update() == NULL || $_checkPause->getPause_end_date_by_update() == ''){
                            if(strtotime($meal_date_format) >= $pause_start_date){
                                $this->error = "PIP";
                                $this->error_msg = "Your Package is in Pause mode";
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Country();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                        }
                        else{
                            $pasue_end_date = $pause_end_date_by_update ;
                        }
                    }
                    while ($pause_start_date <= $pasue_end_date) {

                        $PauseDays [] = date('Y-m-d', $pause_start_date);
                        $pause_days += 1;

                        $pause_start_date = strtotime("+1 day", $pause_start_date);
                         //echo "<br> ===> updated start date : " . $pause_start_date ;
                    }
                }

                
                if($PauseDays != NULL){
                    if(in_array($meal_date_format, $PauseDays)){
                        $this->error = "PIP";
                        $this->error_msg = "Can't add meal on this date , as this date is in pause Date range.";
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Country();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }
                }
            }
//           print_r($query);exit;
            if (!empty($order_info)) {

               
                foreach ($order_info as $key => $vls) {
                    #edit time flag
                    //$date_before_two_days = date('Y-m-d 00:00:00',strtotime("-2 days",strtotime($vls['requested_datetime'])));	
                    $date_before_two_days = date('Y-m-d 00:00:00', strtotime("-".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime($vls['requested_datetime'])));

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
                    $response[] = array(
                        'meal_id' => $vls['order_meal_relation_id'],
                        'order_data' => $this->getOrderDataV1QtyUpdateAction($vls['order_meal_relation_id'], $language_id, $user_id),
                        'order_status' => $status,
                        'editable_flag' => $editable_flag,
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
                    $date_before_two_days = date('Y-m-d 00:00:00', strtotime("-". $this->SELECT_MEAL_AFTER_DAYS. " days", strtotime($date)));
                    if (strtotime($today) < strtotime($date_before_two_days)) {
                        $editable_flag = true;
                        $order_status = 'allow_meal';
                    }
                }

                $response[] = array(
                    'order_status' => $order_status,
                    'editable_flag' => $editable_flag,
                    'meal_date' => $meal_date
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
