<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Freezesubpackage;

class WSSuspendplanController extends WSBaseController {

    /**
     * @Route("/ws/suspendplan/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     */
    public function suspendplanAction($param) {

        try {
            $this->title = "Freeze Subpackage";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array(
                        'user_id',
                        'sub_package_id',
                        'start_date',
                        'end_date',
                        'order_id'
                    ),
                ),
                    );

            if ($this->validateData($param)) {

                $user_id = $param->user_id;
                $end_date = $param->end_date;
                $order_id = $param->order_id;
                $start_date = $param->start_date;
                $sub_package_id = $param->sub_package_id;

                // check sub package found or not
                $checkPackage = $this->getDoctrine()->getRepository("AdminBundle:Subpackagemaster")->findOneBy(
                        array(
                            "main_sub_package_id" => $sub_package_id,
                            "is_deleted" => 0
                        )
                );

                if (empty($checkPackage)) {
                    $this->error = "NRF";
                    $this->error_msg = "Sub package not found";
                    // $this->data = false;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Freezesubpackage();
                    $this->data = $emptyObj;
                    return $this->responseAction();
                }
                $current_date_time = date('Y-m-d 00:00:00');
                $time_after_two_days = date('Y-m-d 00:00:00', strtotime("+".$this->SELECT_MEAL_AFTER_DAYS." days", strtotime($current_date_time)));
                // if (strtotime($meal_date) <= strtotime($time_after_two_days)) { due to whatapp audio on 7 sept 2019
                if (strtotime($start_date) < strtotime($time_after_two_days)) {

                    $this->error = "PIW";
                    $this->error_msg = "Cant Suspend before ".$this->SELECT_MEAL_AFTER_DAYS."  Day.";
                    return $this->responseAction();
                }
                // check sub package is monthly package
                $checkMonthlyPackage = $this->getDoctrine()->getRepository("AdminBundle:Ordermaster")->findOneBy(
                        array(
                            "order_master_id" => $order_id,
                            "is_deleted" => 0
                        )
                );

                if ($checkMonthlyPackage) {
                    
                    if ($checkMonthlyPackage->getOrder_status() == 'cancel') {
                        $this->error = "PIC";
                        $this->error_msg = "Package Cancel";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Freezesubpackage();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }
                    if ($checkMonthlyPackage->getPackage_for() != 1) {
                        $this->error = "PIW";
                        $this->error_msg = "Sub package is not Monthly package";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Freezesubpackage();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }
                }


                // check sub package already freeze
                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findOneBy(
                        array(
                            "user_id" => $user_id,
                            "order_id" => $order_id,
                            "sub_package_id" => $sub_package_id,
                            "is_deleted" => 0
                        )
                );

                if (!empty($checkFreeze)) {
                    $this->error = "PAF";
                    $this->error_msg = "Sub package Already Freezed";
                    // $this->data = false;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Freezesubpackage();
                    $this->data = $emptyObj;
                    return $this->responseAction();
                }

                // check freeze date range not in between pause dates
                 $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                                array(
                                    "order_id" => $order_id,
                                    "is_deleted" => 0
                                )
                        );
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

                            if($resume_choice == 'admin'){
                                if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                                    if(strtotime(date("Y-m-d")) >= $pause_start_date){
                                        $this->error = "PIW";
                                        $this->error_msg = "Your Package is in Pause mode";
                                        // $this->data = false;
                                        $this->status = 201;
                                        $this->message = false;
                                        $emptyObj = new Freezesubpackage();
                                        $this->data = $emptyObj;
                                        return $this->responseAction();
                                    }
                                }
                            }
                            else if ($resume_choice == 'customer'){
                                if($_checkPause->getPause_end_date() == NULL || $_checkPause->getPause_end_date() == ''){
                                    if(strtotime(date("Y-m-d")) >= $pause_start_date){
                                        $this->error = "PIW";
                                        $this->error_msg = "Your Package is in Pause mode";
                                        // $this->data = false;
                                        $this->status = 201;
                                        $this->message = false;
                                        $emptyObj = new Freezesubpackage();
                                        $this->data = $emptyObj;
                                        return $this->responseAction();
                                    }
                                }
                                elseif($_checkPause->getPause_end_date_by_update() == NULL || $_checkPause->getPause_end_date_by_update() == ''){
                                    if(strtotime(date("Y-m-d")) >= $pause_start_date){
                                        $this->error = "PIW";
                                        $this->error_msg = "Your Package is in Pause mode";
                                        // $this->data = false;
                                        $this->status = 201;
                                        $this->message = false;
                                        $emptyObj = new Freezesubpackage();
                                        $this->data = $emptyObj;
                                        return $this->responseAction();
                                    }
                                }
                                $pasue_end_date = $pause_end_date_by_update ;
                            }

                            $pause_start_date_response = date('Y-m-d', $pause_start_date);
                            $pasue_end_date_response = date('Y-m-d', $pasue_end_date);

                            if ( ( (strtotime($start_date) >= $pause_start_date) && ( strtotime($start_date) <= $pasue_end_date) )  ||
                                 ( (strtotime($end_date) >= $pause_start_date) && (strtotime($end_date) <= $pasue_end_date) )
                              ){
                                $this->error = "PIW";
                                $this->error_msg = "Freeze dates are in between your Package pause dates, Please select other dates";
                                // $this->data = false;
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Freezesubpackage();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                                 
                            }
                            else{

                            }
                        }
                }
                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
				JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
				where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);

                $offDaysArray = null;
                if ($offDays) {
                    foreach ($offDays as $_offDays) {
                        $offDaysArray [] = $_offDays['main_days_master_id'];
                    }
                }
                $start_date = strtotime($start_date);
                $end_date = strtotime($end_date);

                $given_start_date = $start_date;
                $given_end_date = $end_date;

                $totalWorkingDays = 0;

                if (!empty($offDaysArray)) {
                    $dates = null;
                    while ($given_start_date <= $given_end_date) {
                        $dates [] = date('N', $given_start_date);

                        //if (!in_array(date('N', $given_start_date), $offDaysArray) && date('N', $given_start_date) != 5) {
                        if (!in_array(date('N', $given_start_date), $offDaysArray) ) {
                            $totalWorkingDays += 1;
                        }
                        $given_start_date = strtotime("+1 days", $given_start_date);
                    }
                }


                $entity = $this->getDoctrine()->getManager();
                $entity->beginTransaction();

                $freeze_subpackage = new Freezesubpackage();
                $freeze_subpackage->setSub_package_id($sub_package_id);
                $freeze_subpackage->setUser_id($user_id);
                $freeze_subpackage->setOrder_id($order_id);
                $freeze_subpackage->setStart_date(date('Y-m-d H:i:s', $start_date));
                $freeze_subpackage->setEnd_date(date('Y-m-d H:i:s', $end_date));
                $freeze_subpackage->setCreated_datetime(date('Y-m-d H:i:s'));
                $freeze_subpackage->setIs_deleted(0);

                $entity->persist($freeze_subpackage);
                $entity->flush();

                if ($freeze_subpackage) {
                    $start_date_read = date('Y-m-d H:i:s', $start_date);
                    $end_date_read = date('Y-m-d H:i:s', $end_date);
                    #delete Old Entry Entered Before Suspension.
                    $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
					requested_datetime BETWEEN '$start_date_read' AND '$end_date_read' and order_master_id ={$order_id}";
                    $connection = $entity->getConnection();
                    $stmt = $connection->prepare($sql_update_order_meal_relation);
                    $stmt->execute();
                }
                // extend subscription expiry date
                $order = $entity->getRepository("AdminBundle:Ordermaster")->findOneBy([
                    'sub_package_id' => $sub_package_id,
                    'order_master_id' => $order_id,
                    'order_by' => $user_id,
                    'is_deleted' => 0,
                ]);

                $date1 = date_create(date('Y-m-d H:i:s', $start_date));
                $date2 = date_create(date('Y-m-d H:i:s', $end_date));
                $diff = date_diff($date1, $date2);
                $daydiff = 0;
                $daydiff = (floor(($end_date - $start_date) / (60 * 60 * 24))) + 1;

              
                


                if (!empty($order)) {
#################### NEW METHOD ####################
                    $end_date = $order->getEnd_date();
                    if (!empty($totalWorkingDays)) {
                        $given_end_date = strtotime($order->getEnd_date());
                        $total_days_added = 0;
                        while ($totalWorkingDays > 0) {

                            $given_end_date = strtotime("+1 days", $given_end_date);
                       
                            if (!in_array(date('N', $given_end_date), $offDaysArray) ) {
                                $totalWorkingDays -= 1;
                            }
                        }
                        $end_date = date('Y-m-d', $given_end_date);
                    }                   
#################### NEW METHOD ####################
                    $order->setEnd_date($end_date);
                    $entity->flush();
                }

                $entity->commit();
                $entity->clear();

                $this->error = "SFD";
            } else {
                $this->error = "PIM";
            }
            if (empty($response)) {
                // $response = false;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Freezesubpackage();
                $response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {

            echo $e->getMessage();
            exit;

            $this->error = "SFND";
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>
