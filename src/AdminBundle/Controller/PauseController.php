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
use AdminBundle\Entity\Pausepackage;
use AdminBundle\Entity\Addedextradaysorder;
use AdminBundle\Entity\Pausepackagehistory;

class PauseController extends BaseController {
    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();
    }

     /**
     * @Route("/pausepackage/{main_package_id}",defaults={"main_package_id"="0"})
     * @Template()
     */
    public function pausepackageAction($main_package_id) {
        $package_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array("main_package_master_id"=>$main_package_id));
        $package_name = '';
        if($package_master_info){
            $package_name = " " . $package_master_info->getPackage_name()  ;
        }

        // get pause package history 
        $pause_package_history = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->findBy(array("package_id"=>$main_package_id) , array('pause_package_history_id' => 'DESC'));
        $pause_package_historyArr = NULL ;
        if($pause_package_history){
            foreach($pause_package_history as $phkey=>$phval){
                 $order_number_query = "SELECT unique_no FROM `order_master` where order_master_id IN (SELECT order_id FROM `pause_package` WHERE `pause_package_history_id` = ".$phval->getPause_package_history_id()." and is_deleted =0 )";
                 $order_number_list = $this->fireQuery($order_number_query) ;
                 $order_number_arr = [];
                 $order_number_str = '' ; 
                 if($order_number_list){
                    foreach($order_number_list as $orval){
                        $order_number_arr[] = $orval['unique_no'];
                    }
                    if($order_number_arr){
                        $order_number_str = implode(" , ", $order_number_arr) ;
                    }
                 }
                $pause_package_historyArr[] = array(
                    "pause_package_history_id"=>$phval->getPause_package_history_id(),
                    "package_id"=>$phval->getPackage_id(),
                    "pause_start_date"=>$phval->getPause_start_date(),
                    "pause_end_date"=>$phval->getPause_end_date(),
                    "resume_choice"=>$phval->getResume_choice(),
                    "pause_updated_date"=>$phval->getPause_updated_date(),
                    "resume_flag"=>$phval->getResume_flag(),
                    "update_by"=>$phval->getUpdate_by(),
                    "affected_orders"=>$order_number_str

                );
            }
           

        }


        return array(
            "main_package_master_id"=>$main_package_id,
            "package_name"=>$package_name,
            "pause_package_history"=>$pause_package_historyArr
           );
    }

     /**
     * @Route("/savepausepackage")
     * @Template()
     */
    public function savepausepackageAction(Request $req) {
        $entity = $em = $this->getDoctrine()->getManager();
        $session = new Session();
        $pause_start_date = $req->request->get('pause_start_date');
        $pause_end_date = $req->request->get('pause_end_date');
        $pause_start_date_param_value = $req->request->get('pause_start_date');
        $pause_end_date_param_value = $req->request->get('pause_end_date');
        $resume_choice = $req->request->get('resume_choice');
        $main_package_master_id = $req->request->get('main_package_master_id');

        // update Package as pause
        // get Orders of this Package
        // loop for all orders
        // add pause entry
        // update End date on this Order 
        // order_meal_relation delete for pause range
        $package_master_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findBy(array("main_package_master_id"=>$main_package_master_id));
        if($package_master_list){
            foreach($package_master_list as $pkey=>$pval){
                $pval->setPackage_pause('yes');
                $em->flush();                
            }
        }

        $pause_package_history = new Pausepackagehistory();
        $pause_package_history->setPackage_id($main_package_master_id);
        $pause_package_history->setPause_start_date($pause_start_date_param_value);
        $pause_package_history->setPause_end_date(NULL); // $pause_end_date
        $pause_package_history->setResume_choice($resume_choice);
        $pause_package_history->setResume_flag('pending');
        $pause_package_history->setPause_updated_date(date('Y-m-d H:i:s'));
        $pause_package_history->setUpdate_by($session->get('user_id'));
        //$pause_package_history->setIs_deleted(0);

        $entity->persist($pause_package_history);
        $entity->flush();

        $pause_package_history_id = $pause_package_history->getPause_package_history_id();
        //--------------- Get Orders of this package ------------------
        $orderQuery = "SELECT * FROM `order_master` WHERE `package_id` = ".$main_package_master_id." AND `order_status` = 'success' AND `end_date` >= '".$pause_start_date."' AND `transaction_id` != 0 AND `is_deleted` = 0 AND pause_status = 'no' "; //and order_master_id =  6884

        $OrderList = $this->fireQuery($orderQuery);
        if($OrderList){
            foreach($OrderList as $orkey=>$orval){
                
                $order_master_id = $order_id = $orval['order_master_id'];
                $order_start_date = $orval['start_date'] ; 
                $order_end_date = $orval['end_date'] ; 

                $start_date = strtotime($order_start_date);
                $end_date = strtotime($order_end_date);

                $given_start_date = $start_date;
                $given_end_date = $end_date;

                $totalWorkingDays = 0;

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
                if (!empty($offDaysArray)) {
                    $dates = null;
                    while ($given_start_date <= $given_end_date) {
                        $dates [] = date('N', $given_start_date);                        
                        if (!in_array(date('N', $given_start_date), $offDaysArray) ) {
                            $totalWorkingDays += 1;
                        }
                        $given_start_date = strtotime("+1 days", $given_start_date);
                    }
                }
                $totalDaysDateArray = [];
                $passed_days_dateArray = [];
               
                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );
                $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );
                $freezeDays = $PauseDays =  [];

                $suspesion_days = $pause_days = 0;
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
                $PauseDays =  [] ;
                $pause_days = 0;

                $total_off_days = 0;
                $day_passed = 0;
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
                $order_start_date = strtotime($order_start_date);
                $order_end_date = strtotime($order_end_date);
                $today = strtotime($pause_start_date_param_value);
                $offDaysDates = NULL ;
               
                while ($order_start_date <= $order_end_date) {
                    $totalDaysDateArray[] = date('Y-m-d', $order_start_date);
                   
                  // echo "<br> date : ".date('Y-m-d', $order_start_date)." = days ==> " . date('N', $order_start_date) . " and condition " . (in_array(date('N', $order_start_date), $offDaysArray)   ) . " and Frezze Conditions " . (in_array($order_start_date, $freezeDays));
                    if (
                        ( ($offDaysArray != NULL && in_array(date('N', $order_start_date), $offDaysArray)   )) 
                     ||
                     ($freezeDays!= NULL && in_array($order_start_date, $freezeDays) ) 
                  ) {
                        if ($order_start_date >= $today) {
                            $total_off_days += 1;
                        }
                        $offDaysDates [] = date('Y-m-d', $order_start_date);
                    }

                   
                    if($order_start_date <= strtotime(date("Y-m-d"))){
                         if ($order_start_date <= $today) {
                            $passed_days_dateArray[] = date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }
                    }else{
                         if ($order_start_date < $today) {
                            $passed_days_dateArray[] = date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }
                    }

                    $order_start_date = strtotime("+1 day", $order_start_date);
                }



                foreach ($totalDaysDateArray as $tdkey => $tdval) {
                    if (in_array($tdval, $passed_days_dateArray)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if ($offDaysDates != NULL && in_array($tdval, $offDaysDates)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if (in_array($tdval, $freezeDays)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if (in_array($tdval, $PauseDays)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                }
                $remaining_working_days_after_pause = count($totalDaysDateArray);



                $pause_package = new Pausepackage();
                $pause_package->setOrder_id($order_id);
                $pause_package->setPackage_id($orval['package_id']);
                $pause_package->setSub_package_id($orval['sub_package_id']);
                $pause_package->setUser_id($orval['order_by']);
                $pause_package->setRemaining_working_days_after_pause($remaining_working_days_after_pause);
                $pause_package->setPause_start_date($pause_start_date_param_value);
                $pause_package->setPause_end_date(NULL); // $pause_end_date
                $pause_package->setPause_end_date_by_update(NULL); // $pause_end_date
                $pause_package->setPause_created_datetime(date('Y-m-d H:i:s'));
                $pause_package->setComment_log('Pause By Admin');
                $pause_package->setPause_package_history_id($pause_package_history_id);
                $pause_package->setPause_end_date_update_by($session->get('user_id'));
                $pause_package->setIs_deleted(0);

                $entity->persist($pause_package);
                $entity->flush();

                
                $total_pause_dates = null;
                $given_pause_start_date = strtotime($pause_start_date ); 
                $totalPauseWorkingDays = 0 ; 
                $given_pause_end_date = NULL ; 
                if($pause_end_date != NULL && $pause_end_date != ''){
                    $given_pause_end_date = strtotime($pause_end_date) ;               
                }
                // check 3 senarios 
                /*
                * 1. Package end date < pause end date
                * 2. Package end date > pause end date
                * 3. Package end date = pause end date 
                */
                if($given_pause_end_date != NULL){
                    if( $end_date < $given_pause_end_date ){
                        while ($given_pause_start_date <= $end_date) {
                            $total_pause_dates[] = date('N', $given_pause_start_date);                        
                            if (!in_array(date('N', $given_pause_start_date), $offDaysArray) ) {
                                $totalPauseWorkingDays += 1;
                            }
                            
                             #delete Old Entry Entered Before Suspension.
                            $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                            requested_datetime='" . date("Y-m-d" , $given_pause_start_date) . "' and order_master_id ={$order_master_id} ";
                            $connection = $em->getConnection();
                            $stmt = $connection->prepare($sql_update_order_meal_relation);
                            $stmt->execute();

                            $given_pause_start_date = strtotime("+1 days", $given_pause_start_date);
                        }
                    }
                    else if( $end_date >= $given_pause_end_date ){
                        while ($given_pause_start_date <= $given_pause_end_date) {
                            $total_pause_dates[] = date('N', $given_pause_start_date);                        
                            if ($offDaysArray == NULL  || ( !in_array(date('N', $given_pause_start_date), $offDaysArray)) ) {
                                $totalPauseWorkingDays += 1;
                            }
                           
                             #delete Old Entry Entered Before Suspension.
                            $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                            requested_datetime='" . date("Y-m-d" , $given_pause_start_date) . "' and order_master_id ={$order_master_id} ";
                            $connection = $em->getConnection();
                            $stmt = $connection->prepare($sql_update_order_meal_relation);
                            $stmt->execute();

                             $given_pause_start_date = strtotime("+1 days", $given_pause_start_date);
                        }
                    }
                }
              
                //  add Pause Working Days after End date 
                /*  --- comment due to that we are selecting pause end date -------------
                $updated_end_datewill_be = $end_date ; 
                for($i = 0 ; $i <= $totalPauseWorkingDays ; $i++){                    
                    $newUpdated_order_end_date = strtotime("+1 days", $updated_end_datewill_be);
                    if (!in_array(date('N', $newUpdated_order_end_date), $offDaysArray) ) {
                       
                    }
                    else{                       
                        if($i == 0 ){
                            $i = 0 ;
                        }
                        else{
                            $i = $i - 1 ;
                        }
                    }
                    $updated_end_datewill_be = $newUpdated_order_end_date ; 

                   
                }
                $upEnd_date = date("Y-m-d",$updated_end_datewill_be) ; 
                */

                // update  Order End date 
                
                //$order_updateQuery = "UPDATE order_master SET end_date = '".date("Y-m-d",$updated_end_datewill_be)."' where order_master_id ={$order_master_id} ";
                $order_updateQuery = "UPDATE order_master SET pause_status = 'yes' where order_master_id ={$order_master_id} ";
                $connection = $em->getConnection();
                $stmt = $connection->prepare($order_updateQuery);
                $stmt->execute();

                $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                requested_datetime >='" . $pause_start_date_param_value . "' and order_master_id ={$order_master_id} ";
                $connection = $em->getConnection();
                $stmt = $connection->prepare($sql_update_order_meal_relation);
                $stmt->execute();
/*
                // now check this user's next order date
                $otherOrdersQuery ="SELECT * FROM `order_master` WHERE `order_by` = ".$orval['order_by']." and order_master_id != ".$order_id." and order_status = 'success' and transaction_id!= 0 and start_date <= '".$upEnd_date."' and end_date >= '".$upEnd_date."'";
                $otherOrdersList = $this->fireQuery($otherOrdersQuery);
                if($otherOrdersList){
                    foreach($otherOrdersList as $okey => $oval ){

                    }
                }
*/

               
                
            }
        }

        $this->get('session')->getFlashBag()->set('success_msg', 'Package Paused with active Orders');
        return $this->redirectToRoute('admin_pause_pausepackage',array("main_package_id" => $main_package_master_id));
    }



     /**
     * @Route("/singlepauseorder")
     * @Template()
     */
    public function singlepauseorderAction(Request $req) {
     // ($pause_package_date,$order_master_id,$resume_choice) {
          //--------------- Get Orders of this package ------------------
        $entity = $em = $this->getDoctrine()->getManager();
        $session = new Session();
        $pause_start_date = $pause_package_date = $req->request->get('pause_package_date');
        $pause_end_date = NULL ; 
        $pause_start_date_param_value = $req->request->get('pause_package_date');
        $order_master_id = $req->request->get('order_master_id');
        $resume_choice = $req->request->get('resume_choice');
        $orderQuery = "SELECT * FROM `order_master` WHERE `order_master_id` = ".$order_master_id." AND `order_status` = 'success' AND `end_date` >= '".$pause_package_date."' AND `transaction_id` != 0 AND `is_deleted` = 0";// AND pause_status = 'no' ";
        $OrderList = $this->fireQuery($orderQuery);
        $main_package_master_id = 0 ; 
        if($OrderList){
            $main_package_master_id = $OrderList[0]['package_id'];
            if($OrderList[0]['pause_status'] == 'yes'){
                  return new Response('pause_already');
            }
        }
        $checkQuery = "SELECT * FROM `pause_package` join pause_package_history on pause_package.pause_package_history_id = pause_package_history.pause_package_history_id where pause_package.order_id = ".$order_master_id." and ( ( pause_package.pause_start_date <= '".$pause_start_date."' and pause_package.pause_end_date >= '".$pause_start_date."' and pause_package.pause_end_date is not null )  OR   ( pause_package_history.resume_choice =  'admin' and pause_package.pause_end_date is NULL )  OR ( pause_package_history.resume_choice = 'customer' and pause_package.pause_end_date_by_update is NULL ) ) " ;
        $checkOrdr = $this->fireQuery($checkQuery);
        if($checkOrdr){
             return new Response('pause_already');
        }
        $pause_package_history = new Pausepackagehistory();
        $pause_package_history->setPackage_id($main_package_master_id);
        $pause_package_history->setPause_start_date($pause_start_date_param_value);
        $pause_package_history->setPause_end_date(NULL); // $pause_end_date
        $pause_package_history->setResume_choice($resume_choice);
        $pause_package_history->setResume_flag('pending');
        $pause_package_history->setPause_updated_date(date('Y-m-d H:i:s'));
        $pause_package_history->setUpdate_by($session->get('user_id'));
        //$pause_package_history->setIs_deleted(0);

        $entity->persist($pause_package_history);
        $entity->flush();

        $pause_package_history_id = $pause_package_history->getPause_package_history_id();
        //--------------- Get Orders of this package ------------------
       
        if($OrderList){
            foreach($OrderList as $orkey=>$orval){
                
                $order_master_id = $order_id = $orval['order_master_id'];
                $order_start_date = $orval['start_date'] ; 
                $order_end_date = $orval['end_date'] ; 

                $start_date = strtotime($order_start_date);
                $end_date = strtotime($order_end_date);

                $given_start_date = $start_date;
                $given_end_date = $end_date;

                $totalWorkingDays = 0;

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
                if (!empty($offDaysArray)) {
                    $dates = null;
                    while ($given_start_date <= $given_end_date) {
                        $dates [] = date('N', $given_start_date);                        
                        if (!in_array(date('N', $given_start_date), $offDaysArray) ) {
                            $totalWorkingDays += 1;
                        }
                        $given_start_date = strtotime("+1 days", $given_start_date);
                    }
                }
                $totalDaysDateArray = [];
                $passed_days_dateArray = [];
               
                $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );
                $checkPause = $this->getDoctrine()->getRepository("AdminBundle:Pausepackage")->findBy(
                        array(
                            "order_id" => $order_id,
                            "is_deleted" => 0
                        )
                );
                $freezeDays = $PauseDays =  [];

                $suspesion_days = $pause_days = 0;
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
                $PauseDays =  [] ;
                $pause_days = 0;

                $total_off_days = 0;
                $day_passed = 0;
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
                $order_start_date = strtotime($order_start_date);
                $order_end_date = strtotime($order_end_date);
                $today = strtotime($pause_start_date_param_value);
                $offDaysDates = NULL ;
                while ($order_start_date <= $order_end_date) {
                    $totalDaysDateArray[] = date('Y-m-d', $order_start_date);
                   
                  //   if (    (  ($offDaysArray != NULL && in_array(date('N', $order_start_date), $offDaysArray)   ) ) 
                  //    ||  ($freezeDays!= NULL && !in_array($order_start_date, $freezeDays) ) 
                  // ) {
                    if (  ($offDaysArray != NULL && in_array(date('N', $order_start_date), $offDaysArray)   ) ) 
                     
                   {
                        if ($order_start_date >= $today) {
                            $total_off_days += 1;
                        }
                        $offDaysDates [] = date('Y-m-d', $order_start_date);
                    }

                    if($order_start_date <= strtotime(date("Y-m-d"))){
                         if ($order_start_date <= $today) {
                            $passed_days_dateArray[] = date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }
                    }else{
                         if ($order_start_date < $today) {
                            $passed_days_dateArray[] = date('Y-m-d', $order_start_date);
                            $day_passed += 1;
                        }
                    }
                   

                    $order_start_date = strtotime("+1 day", $order_start_date);
                }


                // var_dump($totalDaysDateArray);
                // var_dump($offDaysDates);
                // var_dump($freezeDays);
                // var_dump($PauseDays);
              

                foreach ($totalDaysDateArray as $tdkey => $tdval) {
                    if (in_array($tdval, $passed_days_dateArray)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if ($offDaysDates != NULL && in_array($tdval, $offDaysDates)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if (in_array($tdval, $freezeDays)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                    if (in_array($tdval, $PauseDays)) {
                        unset($totalDaysDateArray[$tdkey]);
                    }
                }
               //  var_dump($totalDaysDateArray);
                $remaining_working_days_after_pause = count($totalDaysDateArray);
             //var_dump($remaining_working_days_after_pause);exit;

                $pause_package = new Pausepackage();
                $pause_package->setOrder_id($order_id);
                $pause_package->setPackage_id($orval['package_id']);
                $pause_package->setSub_package_id($orval['sub_package_id']);
                $pause_package->setUser_id($orval['order_by']);
                $pause_package->setRemaining_working_days_after_pause($remaining_working_days_after_pause);
                $pause_package->setPause_start_date($pause_start_date_param_value);
                $pause_package->setPause_end_date(NULL); // $pause_end_date
                $pause_package->setPause_end_date_by_update(NULL); // $pause_end_date
                $pause_package->setPause_created_datetime(date('Y-m-d H:i:s'));
                $pause_package->setComment_log('Pause By Admin');
                $pause_package->setPause_package_history_id($pause_package_history_id);
                $pause_package->setPause_end_date_update_by($session->get('user_id'));
                $pause_package->setIs_deleted(0);

                $entity->persist($pause_package);
                $entity->flush();

                
                $total_pause_dates = null;
                $given_pause_start_date = strtotime($pause_start_date ); 
                $totalPauseWorkingDays = 0 ; 
                $given_pause_end_date = strtotime($pause_end_date) ;               
                // check 3 senarios 
                /*
                * 1. Package end date < pause end date
                * 2. Package end date > pause end date
                * 3. Package end date = pause end date 
                */
                if( $end_date < $given_pause_end_date ){
                    while ($given_pause_start_date <= $end_date) {
                        $total_pause_dates[] = date('N', $given_pause_start_date);                        
                        if (!in_array(date('N', $given_pause_start_date), $offDaysArray) ) {
                            $totalPauseWorkingDays += 1;
                        }
                        
                         #delete Old Entry Entered Before Suspension.
                        $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                        requested_datetime='" . date("Y-m-d" , $given_pause_start_date) . "' and order_master_id ={$order_master_id} ";
                        $connection = $em->getConnection();
                        $stmt = $connection->prepare($sql_update_order_meal_relation);
                        $stmt->execute();

                        $given_pause_start_date = strtotime("+1 days", $given_pause_start_date);
                    }
                }
                else if( $end_date >= $given_pause_end_date ){
                    while ($given_pause_start_date <= $given_pause_end_date) {
                        $total_pause_dates[] = date('N', $given_pause_start_date);                        
                        if ($offDaysArray == NULL || (!in_array(date('N', $given_pause_start_date), $offDaysArray) )) {
                            $totalPauseWorkingDays += 1;
                        }
                       
                         #delete Old Entry Entered Before Suspension.
                        $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                        requested_datetime='" . date("Y-m-d" , $given_pause_start_date) . "' and order_master_id ={$order_master_id} ";
                        $connection = $em->getConnection();
                        $stmt = $connection->prepare($sql_update_order_meal_relation);
                        $stmt->execute();

                         $given_pause_start_date = strtotime("+1 days", $given_pause_start_date);
                    }
                }

              
               
                $order_updateQuery = "UPDATE order_master SET pause_status = 'yes' where order_master_id ={$order_master_id} ";
                $connection = $em->getConnection();
                $stmt = $connection->prepare($order_updateQuery);
                $stmt->execute();

                $sql_update_order_meal_relation = "UPDATE order_meal_relation SET is_deleted = 1 where
                                requested_datetime >='" . $pause_start_date_param_value . "' and order_master_id ={$order_master_id} ";
                $connection = $em->getConnection();
                $stmt = $connection->prepare($sql_update_order_meal_relation);
                $stmt->execute();

               
                
            }
            return new Response('Done');
        }

        return new Response('notdone');
    }

    /**
     * @Route("/pausepackageorders/{main_package_id}/{pause_package_history_id}",defaults={"main_package_id"="0","pause_package_history_id"="0"})
     * @Template()
     */
    public function pausepackageordersAction($main_package_id,$pause_package_history_id) {
        $package_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findOneBy(array("main_package_master_id"=>$main_package_id));
        $package_name = '';
        if($package_master_info){
            $package_name = " " . $package_master_info->getPackage_name()  ;
        }

        $pause_package_history = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->findOneBy(array("pause_package_history_id"=>$pause_package_history_id));
        $pause_start_date = $pause_end_date = $pause_end_date_by_customer =  NULL ;
        if($pause_package_history){
            $pause_start_date = $pause_package_history->getPause_start_date();
            $pause_end_date = $pause_package_history->getPause_end_date();
            //$pause_end_date_by_customer = $pause_package_history->getPause_end_date_by_update();
        }
        $query = "SELECT pause_package.pause_package_id ,pause_package.pause_start_date, pause_package.pause_end_date ,pause_package.pause_end_date_by_update,pause_package.pause_end_date_update_by , pause_package.pause_created_datetime ,order_master.unique_no , order_master.order_master_id , order_master.pause_status,order_master.start_date, order_master.end_date , order_master.created_date,order_master.order_by ,user_master.user_firstname,user_master.user_lastname ,pause_package.comment_log FROM `pause_package` join order_master on pause_package.order_id = order_master.order_master_id join user_master on order_master.created_by = user_master.user_master_id WHERE pause_package.`pause_package_history_id` = ".$pause_package_history_id." AND pause_package.`is_deleted` = 0";
        $list = $this->fireQuery($query);

        $Date =date("Y-m-d");
        $resume_date_would_be_pass = NULL ;
        $resume_date_would_be = date('Y-m-d', strtotime($Date. ' + '.$this->SELECT_MEAL_AFTER_DAYS.' days'));
        $pause_start_date_plusoneday = date('Y-m-d', strtotime($pause_start_date. ' + 1 days'));
        if(strtotime($pause_start_date_plusoneday) > strtotime($resume_date_would_be)  ){
            $resume_date_would_be_pass = $pause_start_date_plusoneday ;
        }
        else{
            $resume_date_would_be_pass = $resume_date_would_be ;
        }

        return array(
            "main_package_master_id"=>$main_package_id,
            "package_name"=>$package_name,
            "pause_start_date"=>$pause_start_date,
            "pause_end_date"=>$pause_end_date,
            "pause_end_date_by_customer"=>$pause_end_date_by_customer,
            "resume_date_would_be_pass"=>$resume_date_would_be_pass,
            "order_list"=>$list,
            "pause_package_history_id"=>$pause_package_history_id,
            "pause_package_history"=>$pause_package_history
           );
    }

      /**
     * @Route("/updatepausepackage")
     * @Template()
     */
    public function updatepausepackageAction(Request $req) {
        $entity = $em = $this->getDoctrine()->getManager();
        $session = new Session();
        $resume_date = $req->request->get('resume_date');
        $pause_package_history_id = $req->request->get('pause_package_history_id');

        $pause_package_history = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackagehistory")->findOneBy(array("pause_package_history_id"=>$pause_package_history_id));
        $resume_choice = NULL; $package_id = 0 ; 
        if($pause_package_history){
            $resume_choice = $pause_package_history->getResume_choice();
            $package_id = $pause_package_history->getPackage_id();
            $pause_package_history->setResume_flag('done');
            $pause_package_history->setPause_end_date($resume_date);
            $em->flush();

            $packageinfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->find($package_id);
            if($packageinfo){
                $main_package_id = $packageinfo ->getMain_package_master_id();
                $packageList =  $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findBy(array("main_package_master_id"=>$main_package_id,"is_deleted"=>0));
                if($packageList){
                    foreach($packageList as $pplkey=>$pplval){
                        $pplval->setPackage_pause('no');
                        $em->flush();
                    }
                }
                //$packageinfo->setPackage_pause('no');
                //$em->flush();
            }
        }
        $pause_orders = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Pausepackage")->findBy(array("pause_package_history_id"=>$pause_package_history_id));
        $userIDArray = NULL ; 
        if($pause_orders){
            foreach($pause_orders as $pukey=>$puval){
                $puval->setPause_end_date($resume_date);
                $puval->setComment_log($puval->getComment_log() . " , Package Resumed by Admin, Pause Last date is :  ".$resume_date." ");
                $entity->flush();
                $remaining_working_days_after_pause = $puval->getRemaining_working_days_after_pause();
                // if resume choice =  admin then update end date of each orders
                if($resume_choice == 'admin'){
                    // get Each order then pause _satus = off
                    // updated Order End date , add remianing days in Resume date
                    // get off days , freeze days , pause days
                    $checkFreeze = $this->getDoctrine()->getRepository("AdminBundle:Freezesubpackage")->findBy(
                        array(
                            "order_id" => $puval->getOrder_id(),
                            "is_deleted" => 0
                        )
                    );
                    $freezeOnce = false;

                    $supend_start_date = null;
                    $supend_end_date = null;
                    $supend_end_date_response = null;
                    $supend_start_date_response = null;
                  
                    $freezeDays = [];

                    $suspesion_days = 0;
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
                    $sql = "SELECT days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                        JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                        where order_off_days_relation.is_deleted = 0 and order_id = " . $puval->getOrder_id() . " group by days_master.main_days_master_id";

                    $offDays = $this->fireQuery($sql);
                    $offDaysArray = array();
                    $total_off_days = 0;
                    $day_passed = 0;
                    
                    if (!empty($offDays)) {
                        foreach ($offDays as $_offDays) {
                            $offDaysArray [] = $_offDays['main_days_master_id'];
                        }
                    }
                    $days_added_in_end_date_caluclation = 0 ;
                    $order_wise_resume_date = $resume_date ; 
                    $order_wise_resume_date = date("Y-m-d",strtotime("+1 day", strtotime($order_wise_resume_date)));
                    while($days_added_in_end_date_caluclation <= $remaining_working_days_after_pause){
                        if(  ( in_array($order_wise_resume_date, $freezeDays)  )  ||  ( in_array(date('N',strtotime( $order_wise_resume_date)), $offDaysArray) )   )  {

                           // echo "<br> not consider this date : ". $order_wise_resume_date . " freexe falg : " . in_array($order_wise_resume_date, $freezeDays) . " and Off day flag : " . ( in_array(date('N',strtotime( $order_wise_resume_date)), $offDaysArray) ) ;

                        }else{
                            $days_added_in_end_date_caluclation = $days_added_in_end_date_caluclation + 1 ;
                            //echo "<br>===========> day plus " . $days_added_in_end_date_caluclation ; 

                          // echo "<br> ***consider this date : ". $order_wise_resume_date ;
                        }
                        if($days_added_in_end_date_caluclation >= $remaining_working_days_after_pause){
                            break ;
                        }else{
                            $order_wise_resume_date = date("Y-m-d",strtotime("+1 day", strtotime($order_wise_resume_date)));
                        }

                        

                        
                    }
                  // var_dump($order_wise_resume_date);
                 //  exit;
                    $order_updateQuery = "UPDATE order_master SET pause_status = 'no' ,end_date = '".$order_wise_resume_date."' where order_master_id =".$puval->getOrder_id();
                    $connection = $em->getConnection();
                    $stmt = $connection->prepare($order_updateQuery);
                    $stmt->execute();


                    
                }
                $userIDArray[] = $puval->getUser_id() ; 
               // exit;
            }

             //-------------send notification
            // send notification from here 
           
            $send_to = 'customer';
            $app_id = 'CUST';
            $title = 'Package Resumed';
            $message = 'Package Resumed';
            $domain_id = 1 ;// $this->get('session')->get('domain_id');
            if ($userIDArray != NULL) {
                $general_notification = new Generalnotification();
                $general_notification->setNotification_type('general');
                $general_notification->setTitle($title);
                $general_notification->setMessage($message);
                $general_notification->setImage_id(0);
                $general_notification->setUser_master_id(0);
                $general_notification->setSend_to($send_to);
                if (!empty($this->get('session')->get('domain_id'))) {
                   // $general_notification->setDomain_id($this->get('session')->get('domain_id'));
                    $general_notification->setDomain_id(1);
                }
                $general_notification->setCreate_date(date("Y-m-d H:i:s"));
                $general_notification->setIs_deleted(0);
                $em = $this->getDoctrine()->getManager();
                $em->persist($general_notification);
                $em->flush();

                $notification_id_send = $general_notification->getGeneral_notification_id();
                $gcm_regids = $this->find_gcm_regid($userIDArray);
                if (!empty($gcm_regids)) {
                    if (count($gcm_regids) > 0) {
                        $this->send_notification($gcm_regids, $title, $message, 2, $app_id, 1, "general_notification", $notification_id_send);
                    }
                }
                $apns_regids = $this->find_apns_regid($userIDArray);
                if (!empty($apns_regids)) {
                    if (count($apns_regids[0]) > 0) {
                        $this->send_notification($apns_regids, $title, $message, 1, $app_id, 1, "general_notification", $notification_id_send);
                    }
                }
            }
        }


        $this->get('session')->getFlashBag()->set('success_msg', 'Package Resume with affected Orders');
        return $this->redirectToRoute('admin_pause_pausepackageorders',array("pause_package_history_id" => $pause_package_history_id,"main_package_id"=>$package_id));
    }

}
