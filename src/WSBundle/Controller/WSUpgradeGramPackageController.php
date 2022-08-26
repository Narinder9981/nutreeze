<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;
use AdminBundle\Entity\Ordermealtypesincluderelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Orderpackagegramrelation;
use AdminBundle\Entity\Orderpackagegramupgradehistory;
use AdminBundle\Entity\Orderpackageupgradehistory;

class WSUpgradeGramPackageController extends WSBaseController {

    /**
     * @Route("/ws/upgradeGramPackage/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function upgradeGramPackageAction($param) {
      //  try {
            $this->title = "Upgrade Gram of Package";
            $this->status = 200;
        	$this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('upgrade_package_gram_id', 'user_id', 'order_id', 'payment_type', 'total_amount','upgrade_start_date'),
                ),
            );
            if ($this->validateData($param)) {

                $upgrade_package_gram_id = $param->upgrade_package_gram_id;
                $user_id = $param->user_id;
                $upgrade_start_date = $param->upgrade_start_date;
                $payment_type = $param->payment_type;
                $total_amount = $param->total_amount;
                $order_id = $param->order_id;

                $app_mode = !empty($param->app_mode) ? $param->app_mode : 'prod';
                 
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                #check current package remaining days from order_master
                $orderMaster = $em->getRepository("AdminBundle:Ordermaster")
                        ->findOneBy(
                        ["is_deleted" => 0,
                            "order_master_id" => $order_id,
                            "order_by" => $user_id
                ]);


                if ($orderMaster) {
                    if($orderMaster->getOrder_status() == 'cancel'){
                        $this->error = "PIC";
                        $this->error_msg = "Package Cancelled";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }

                    //----------Check Pause or not ---------------------
                    $checkPause = $this->firequery("SELECT *  FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id WHERE pause_package.`order_id` = " . $order_id . "  and pause_package.is_deleted = 0 ");
                
                    if ($checkPause) {
                        $pauseOnce = true;
                        foreach ($checkPause as $_checkPause) {
                            if ($_checkPause['resume_choice'] == 'admin'){
                                 if($_checkPause['pause_end_date'] == NULL){
                                    $this->error = "PIW";
                                    $this->error_msg = " package is in Pause mode";
                                    // $this->data = false;
                                    $this->status = 201;
                                    $this->message = false;
                                    $emptyObj = new Countrymaster();
                                    $this->data = $emptyObj;
                                    return $this->responseAction();
                                 }   
                            }
                            elseif($_checkPause['resume_choice'] == 'customer'){
                                if($_checkPause['pause_end_date_by_update'] == NULL){
                                     $this->error = "PIW";
                                    $this->error_msg = " package is in Pause mode";
                                    // $this->data = false;
                                    $this->status = 201;
                                    $this->message = false;
                                    $emptyObj = new Countrymaster();
                                    $this->data = $emptyObj;
                                    return $this->responseAction();
                                 }       
                            }
                            
                        }
                    }
                    $package_id = $orderMaster->getPackage_id();
                    $upgrade_package_gram_Info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageupgradepricegram")->findOneBy(array("package_upgrade_price_gram_id"=>$upgrade_package_gram_id,"package_id"=>$package_id));
                    $package_Info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array("main_package_master_id"=>$orderMaster->getPackage_id()));
                    if(empty($upgrade_package_gram_Info)){
                        $this->error = "PIW";
                        $this->error_msg = "Package have no Value for upgrade gram";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }
               
                    $checkMonthlyPackage = $this->getDoctrine()->getRepository("AdminBundle:Subpackagepricemaster")->findOneBy(
                            array(
                                "duration_type" => 'monthly',
                                "sub_package_id" => $orderMaster->getSub_package_id(),
                                "is_deleted" => 0
                            )
                    );

                    if (empty($checkMonthlyPackage)) {
                        $this->error = "PIW";
                        $this->error_msg = "Sub package is not Monthly package";
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->data = $emptyObj;
                        return $this->responseAction();
                    }
                    $today = strtotime('now');

                    $order_end_date = strtotime($orderMaster->getEnd_date());
                    $order_start_date = strtotime($orderMaster->getStart_date());

//					$day_remains = floor(($order_end_date - $order_start_date)/(60*60*24));

                    $day_remains_overall = floor(($order_end_date - $today) / (60 * 60 * 24));

                    $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findOneBy(
                            array(
                                "user_id" => $user_id,
                                "order_id" => $order_id,
                                "sub_package_id" => $orderMaster->getSub_package_id(),
                                "is_deleted" => 0
                            )
                    );

                    $suspesion_days = 0;
                    if ($checkFreeze) {
                        $supend_start_date = strtotime($checkFreeze->getStart_date());
                        $supend_end_date = strtotime($checkFreeze->getEnd_date());

                        $suspesion_days = floor(($supend_end_date - $supend_start_date) / (60 * 60 * 24));
                    }

                    $day_remains_overall = $day_remains_overall - $suspesion_days;

                    $start_from_date = $order_start_date;

                    //$date_after_two_days = strtotime('+2 days', $today);
                    // Client Feedback : change 2 days to 3 days so 
                    $date_after_two_days = strtotime('+'.$this->SELECT_MEAL_AFTER_DAYS.' days', $today);
                    $day_remain = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) - $suspesion_days;


                    if ($order_start_date > $today) {
                        //exit('order yet not started');
                        #order yet not started
                        $day_remain = floor(($order_end_date - $order_start_date) / (60 * 60 * 24)) - $suspesion_days;

                        $days_remain_to_start_order = floor(($order_start_date - $today) / (60 * 60 * 24));

                        //if ($days_remain_to_start_order >= 2) {
                        if ($days_remain_to_start_order >= $this->SELECT_MEAL_AFTER_DAYS) {
                            $start_from_date = $order_start_date;
                        } else {
                            $start_from_date = $date_after_two_days;
                        }
                    } else {
                        #order started
                        $day_remain = floor(($order_end_date - $date_after_two_days) / (60 * 60 * 24)) - $suspesion_days;

                        $start_from_date = $date_after_two_days;
                    }
                    $upgrade_start_date = date('Y-m-d 00:00:00', strtotime($upgrade_start_date));
                     $start_from_date = date('Y-m-d 00:00:00', $start_from_date);
                    if($upgrade_start_date < $start_from_date ){
                        $this->error = "DIW";
                        $this->error_msg = "Upgrade Date (".$upgrade_start_date.") must be >= " . date('Y-m-d 00:00:00', strtotime($start_from_date)); 
                        // $this->data = false;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Countrymaster();
                        $this->data = $emptyObj;
                        return $this->responseAction();

                    }
                   
                    $upgrade_gram_total = 0 ;
                    $orderpackagegramupgradehistory_id = 0 ;
                    //if ($day_remains_overall > 2) {
                     // Client Feedback : change 2 days to 3 days so 
                    if ($day_remains_overall > $this->SELECT_MEAL_AFTER_DAYS) {
                        #make entry in Orderpackageupgradehistory
                        $today_date = date('Y-m-d H:i:s');

                        $con = $em->getConnection();

                        if (!empty($upgrade_package_gram_Info)) {

                            // Check Max Limit of upgrade Gram
                            $upgrade_gram_totalQuery = "SELECT sum(package_gram) as total_upgrade_gram FROM `order_package_gram_relation` where order_id = $order_id and order_packagegram_upgrade_history_id IN (SELECT order_packagegram_upgrade_history_id FROM `order_packagegram_upgrade_history` WHERE `status` = 'paid' AND `payment_status` = 'success' AND `added_flag` LIKE 'upgrade' AND `is_archive` = 0 AND `is_deleted` = 0 and order_id = $order_id) and gram_added_flag = 'upgrade' and is_deleted = 0";
                            $upgrade_gram_totalValue = $this->fireQuery($upgrade_gram_totalQuery);
                            if($upgrade_gram_totalValue){
                                $upgrade_gram_total = $upgrade_gram_totalValue[0]['total_upgrade_gram'];
                            }
                            $upgrade_gram_total = $upgrade_gram_total + $upgrade_package_gram_Info->getGram() ;
                            if($upgrade_gram_total > $package_Info->getPackage_max_grams_limit() ){
                                $this->error = "GMR";
                                $this->error_msg = "Upgrade Gram Max Limit Reached";
                                // $this->data = false;
                                $this->status = 201;
                                $this->message = false;
                                $emptyObj = new Countrymaster();
                                $this->data = $emptyObj;
                                return $this->responseAction();
                            }
                            $orderpackagegramupgradehistory = new Orderpackagegramupgradehistory();
                            $orderpackagegramupgradehistory->setOrder_id($order_id);
                            $orderpackagegramupgradehistory->setPackage_id($package_id);
                            $orderpackagegramupgradehistory->setStart_from_date($upgrade_start_date);
                            $orderpackagegramupgradehistory->setCreated_datetime($today_date);
                            $orderpackagegramupgradehistory->setAdded_flag('upgrade');
                            $orderpackagegramupgradehistory->setIs_archive(0);
                            $orderpackagegramupgradehistory->setIs_deleted(0);
                            $orderpackagegramupgradehistory->setTotal_amount($total_amount);
                            $orderpackagegramupgradehistory->setPayment_method($payment_type);

                            if ($app_mode == 'prod') {
                                $orderpackagegramupgradehistory->setPayment_status('pending');
                                $orderpackagegramupgradehistory->setStatus('pending');
                            }

                            if ($app_mode == 'dev') {
                                $orderpackagegramupgradehistory->setPayment_status('success');
                                $orderpackagegramupgradehistory->setStatus('paid');
                            }
                            $orderpackagegramupgradehistory->setAdded_flag('upgrade');
                            $orderpackagegramupgradehistory->setTransaction_id(0);
                            $orderpackagegramupgradehistory->setIs_archive(0);
                            $orderpackagegramupgradehistory->setIs_deleted(0);
                            $em->persist($orderpackagegramupgradehistory);
                            $em->flush();

                            $orderpackagegramupgradehistory_id = $orderpackagegramupgradehistory->getOrder_packagegram_upgrade_history_id();

                           
                            $order_package_gram_relation = new Orderpackagegramrelation();
                            $order_package_gram_relation->setOrder_id($order_id);
                            $order_package_gram_relation->setPackage_id($package_id);
                            $order_package_gram_relation->setPackage_gram($upgrade_package_gram_Info->getGram());
                            $order_package_gram_relation->setPackage_gram_price($upgrade_package_gram_Info->getGram_price());
                            $order_package_gram_relation->setGram_added_flag('upgrade');
                            $order_package_gram_relation->setOrder_packagegram_upgrade_history_id($orderpackagegramupgradehistory_id);
                            $order_package_gram_relation->setCreated_datetime(date("Y-m-d H:i:s"));
                            $order_package_gram_relation->setStart_from_date($upgrade_start_date);
                            $order_package_gram_relation->setIs_archive(0);
                            $order_package_gram_relation->setIs_deleted(0);                           
                            $em->persist($order_package_gram_relation);
                            $em->flush();
                           
                        }
                        $this->error = "SFD";
                        $response = array(
                            "order_packagegramupgrade_history_id"=>$orderpackagegramupgradehistory_id
                                );
                    } else {
                        $this->error = "PIW";
                        $this->error_msg = "Only Three days Left , Cant Upgrade the package";
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
				$emptyObj = new Countrymaster();
				$response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
//        } catch (\Exception $e) {
//            $this->error = "SFND";
//            $this->error_msg = $e->getMessage();
//            $this->data = false;
//            return $this->responseAction();
//        }
    }

}

?>