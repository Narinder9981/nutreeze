<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;
use AdminBundle\Entity\Countrymaster;
use AdminBundle\Entity\Productcategorymaster;
use AdminBundle\Entity\Mealproductrelation;
use AdminBundle\Entity\Ordermealrelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Freezesubpackage;
use AdminBundle\Entity\Generalnotification;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Addedextradaysorder;
use AdminBundle\Entity\Remainingdaysfunctioncalllog;
use AdminBundle\Entity\Remainingdaysorderwise;

class RemainingdaysController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();
    }


    /**
     * @Route("/remdayscalllogs")
     * @Template()
     */
    public function remdayscalllogsAction(Request $req) {
         $em = $this->getDoctrine()->getManager();
         $call_logs = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Remainingdaysfunctioncalllog")->findAll();
         
         return array("call_logs"=>$call_logs);

    }


     /**
     * @Route("/updateremainingdays")
     * @Template()
     */
    public function updateremainingdaysAction(Request $req) {
        

        $em = $this->getDoctrine()->getManager();
        $session = new Session();
        $ip =   getenv('HTTP_CLIENT_IP')?:
                getenv('HTTP_X_FORWARDED_FOR')?:
                getenv('HTTP_X_FORWARDED')?:
                getenv('HTTP_FORWARDED_FOR')?:
                getenv('HTTP_FORWARDED')?:
                getenv('REMOTE_ADDR');

        $orders = $this->firequery("SELECT * FROM order_master where order_status = 'success' and is_deleted = 0 and order_master_id NOT IN (SELECT order_master_id  FROM `remaining_days_order_wise` WHERE `is_order_completed` = 'yes')");
        $up_data = [] ; 
        if ($orders) {
            $remaining_days_function_call_log = new Remainingdaysfunctioncalllog();
            $remaining_days_function_call_log->setCalled_datetime(date("Y-m-d H:i:s"));
            $remaining_days_function_call_log->setUser_id($session->get('user_id'));
            $remaining_days_function_call_log->setIp_address($ip);

            $em->persist($remaining_days_function_call_log);
            $em->flush() ; 



           foreach($orders as $orderkey=>$orderval){
                $order_id = $orderval['order_master_id'];
                $pause_status = $orderval['pause_status'];
                $user_id = $orderval['order_by'];
                $remaining_days = 0 ; 
                //check Remaining Days Calculation 
                if( $pause_status   == 'no'){
                    $total_off_days  = 0 ;
                    $offDaysArray  = $totalDaysDateArray = $PauseDays = [];
                    $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                                JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                                where order_off_days_relation.is_deleted = 0 and order_id = " .$order_id . " group by days_master.main_days_master_id";

                    $offDays = $this->fireQuery($sql);
                    
                    $pause_days = 0;

                    if (!empty($offDays)) {
                        foreach ($offDays as $_offDays) {
                            $offDaysArray [] = $_offDays['main_days_master_id'];
                        }
                    }

                    $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                            array(
                                "order_id" => $order_id,
                                "is_deleted" => 0
                            )
                    );
                        
                    $suspesion_days = 0 ; 
                    $freezeDays = [];   
                    if ($checkFreeze) {
                        $freezeOnce = true;
                        foreach ($checkFreeze as $_checkFreeze) {
                            $supend_start_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getStart_date())));
                            $supend_end_date = strtotime(date('Y-m-d', strtotime($_checkFreeze->getEnd_date())));

                            $supend_start_date_response = date('Y-m-d', $supend_start_date);
                            $supend_end_date_response = date('Y-m-d', $supend_end_date);

                            while ($supend_start_date <= $supend_end_date) {

                                $freezeDays [] = date('Y-m-d', $supend_start_date);
                                $suspesion_days += 1;

                                $supend_start_date = strtotime("+1 day", $supend_start_date);
                            }
                        }
                    }
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

                            $pause_start_date_response = date('Y-m-d', $pause_start_date);
                            $pasue_end_date_response = date('Y-m-d', $pasue_end_date);

                            while ($pause_start_date <= $pasue_end_date) {

                                $PauseDays [] = date('Y-m-d', $pause_start_date);
                                $pause_days += 1;

                                $pause_start_date = strtotime("+1 day", $pause_start_date);
                            }
                        }
                    }
                  
                    $order_start_date = strtotime($orderval['start_date']) ;
                     $order_end_date =  strtotime($orderval['end_date']);
                    $today =  strtotime(date("Y-m-d"));
                    $offDaysDates = [];
                    $day_passed = 0 ;
                    $totalDaysDateArray = [];
                    $passed_days_dateArray = [];
                  
                    while ($order_start_date <= $order_end_date) {
                        $totalDaysDateArray[] = date('Y-m-d', $order_start_date);
                        if (( in_array(date('N', $order_start_date), $offDaysArray) || date('N', $order_start_date) == 5 ) && !in_array($order_start_date, $freezeDays)) {
                            if ($order_start_date >= $today) {
                                $total_off_days += 1;
                            }
                            $offDaysDates [] = date('Y-m-d', $order_start_date);
                        }

                        if ($order_start_date <= $today) {
                            $passed_days_dateArray[] = date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }

                        $order_start_date = strtotime("+1 day", $order_start_date);
                    }


                    foreach ($totalDaysDateArray as $tdkey => $tdval) {
                        if (in_array($tdval, $passed_days_dateArray)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if (in_array($tdval, $offDaysDates)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if (in_array($tdval, $freezeDays)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                        if (in_array($tdval, $PauseDays)) {
                            unset($totalDaysDateArray[$tdkey]);
                        }
                    }
                    $remaining_days = count($totalDaysDateArray);
                 }   
                else{
                    $sql = "SELECT * FROM `pause_package` WHERE `order_id` =  ".$order_id."  and is_deleted = 0 and pause_end_date_by_update is NULL ";
                    $list = $this->firequery($sql);
                    if($list){
                        $remaining_days = $list[0]['remaining_working_days_after_pause'] ;
                    }
                }  
               
                $is_order_completed = 'no';
                if($remaining_days <= 0 ){
                    $is_order_completed = 'yes';
                }
             
                // check Remaing days taable 
                $remaining_days_order_wise = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Remainingdaysorderwise')->findOneBy(array("order_master_id"=>$order_id));
                if($remaining_days_order_wise){
                    $remaining_days_order_wise->setRemaining_days($remaining_days);
                    $remaining_days_order_wise->setLast_updated_datetime(date("Y-m-d H:i:s"));
                    $remaining_days_order_wise->setIs_order_completed($is_order_completed);
                    $em->flush();
                }
                else{
                    $remaining_days_order_wise = new Remainingdaysorderwise();
                    $remaining_days_order_wise->setOrder_master_id($order_id);
                    $remaining_days_order_wise->setUser_master_id($user_id);
                    $remaining_days_order_wise->setIs_order_completed($is_order_completed);
                    $remaining_days_order_wise->setRemaining_days($remaining_days);
                    $remaining_days_order_wise->setLast_updated_datetime(date("Y-m-d H:i:s"));
                    $em->persist($remaining_days_order_wise);
                    $em->flush(); 
                }

                $up_data[] = array("order_id"=>$order_id,"rem_days"=>$remaining_days); 
                $remaining_days = 0 ; 
                unset($totalDaysDateArray);
                unset($PauseDays);
                unset($offDaysDates);
                unset($freezeDays);
                unset($passed_days_dateArray);
                unset($checkPause);
                unset($order_start_date);
                unset($remaining_days_order_wise);
                unset($order_end_date);
           }

            return new Response('true');
        }
        return new Response('done');
    }

}
