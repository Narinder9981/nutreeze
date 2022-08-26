<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Ordermaster;
use AdminBundle\Entity\Couponmaster;
use AdminBundle\Entity\Couponusagehistory;
use AdminBundle\Entity\Ordermealtypesincluderelation;
use AdminBundle\Entity\Orderoffdaysrelation;
use AdminBundle\Entity\Orderpackageupgradehistory;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Walletmaster;
use AdminBundle\Entity\Transcationmaster;

class WSResumepauseorderController extends WSBaseController {

    /**
     * @Route("/ws/resumepackage/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function resumepackageAction($param) {

        //try{
        $this->title = "resume Package";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('order_id', 'package_id', 'user_id', 'resume_date_by_customer', 'sub_package_id','pause_packageId'),
            ),
        );

        if ($this->validateData($param)) {
            $entity = $em = $this->getDoctrine()->getManager();
            $order_id = $param->order_id;
            $package_id = $param->package_id;
            $sub_package_id = $param->sub_package_id;
            $resume_date_by_customer = date('Y-m-d', strtotime($param->resume_date_by_customer));           
            $user_id = $param->user_id;
            $pause_packageId = $param->pause_packageId;
            $order_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordermaster")->findOneBy(array("order_master_id"=>$order_id,"is_deleted"=>0));
            if(empty($order_master_info)){
                $this->error = "PIW" ;
                // $this->data = false ;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction() ;
            }

            //---------------check remaining pause Orders --------------
            $CheckOtherPauseQuery = " SELECT * FROM `order_master` WHERE `order_by` = ".$user_id." and pause_status = 'yes' and order_status = 'success'   and transaction_id != 0  order by order_master_id ASC";
            $CheckOtherPauseList = $this->fireQuery($CheckOtherPauseQuery);
            if($CheckOtherPauseList){
                foreach($CheckOtherPauseList as $chkkey=>$chkval){
                    if($chkkey == 0 && $chkval['order_master_id'] != $order_id){
                        $this->error = "PIW" ;
                        $this->error_msg = "Please Resume  Old Order First" ;
                        // $this->data = false ;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Ordermaster();
                        $this->data = $emptyObj;
                        return $this->responseAction() ;
                    }
                }
            }
            //------------Check Resume date is not clash with other packages --------------------
            $checkResumeDateQuery = "SELECT *  FROM `order_master` WHERE `order_by` = ".$user_id."  and  pause_status = 'no' and order_status = 'success'  and transaction_id != 0 and order_master_id != ". $order_id." order by end_date desc limit 0, 1";
            $checkResumeDateList = $this->fireQuery($checkResumeDateQuery);
            if($checkResumeDateList!= NULL && isset($checkResumeDateList[0])){
                $other_package_end_date = $checkResumeDateList[0]['end_date'] ;
                if(strtotime($resume_date_by_customer) <= strtotime($other_package_end_date)){
                    $this->error = "PIW" ;
                    $this->error_msg = "Please select resume date greater than end date of current package ( End date of other package : " . $other_package_end_date . " ) " ;
                    $this->data = false ;
                    return $this->responseAction() ;
                }
            }
            $pause_package_info = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Pausepackage')->find($pause_packageId);
            if($pause_package_info){
                $remaining_working_days_after_pause = $pause_package_info->getRemaining_working_days_after_pause();
                $pause_package_history = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Pausepackagehistory')->find($pause_package_info->getPause_package_history_id());
                if($pause_package_history){
                    $resume_choice = $pause_package_history->getResume_choice() ; 
                    if($resume_choice == 'customer'){
                        $pause_package_info->setPause_end_date($resume_date_by_customer);
                        $pause_package_info->setPause_end_date_by_update($resume_date_by_customer);
                        $pause_package_info->setComment_log($pause_package_info->getComment_log(). "  -  ". " Resume package by User ,Pause Last date : ". $resume_date_by_customer );
                        $em->flush();

                        
                        $order_master_info->setPause_status('no');
                        $em->flush();

                        // add Remaining days 
                        $updated_end_datewill_be = strtotime($resume_date_by_customer ); 

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

                        //----------------------------------------
                        $order_suspend_history_sql = "select * from freeze_subpackage where order_id = '$order_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";
                        $suspendHistory = $this->fireQuery($order_suspend_history_sql);
                        $suspend_dates = [];
                        if ($suspendHistory) {
                            foreach ($suspendHistory as $skey => $sval) {
                                $sus_start_date = $loop_sus_date = $sval['start_date'];
                                $loop_sus_date = date("Y-m-d", strtotime($loop_sus_date));
                                $sus_end_date = $sval['end_date'];
                                while ($loop_sus_date <= $sus_end_date) {
                                    $suspend_dates[] = $loop_sus_date;

                                    $loop_sus_date = date('Y-m-d', strtotime($loop_sus_date . ' + 1 days'));
                                }
                            }
                        }
                           
                        for($i = 0 ; $i < $remaining_working_days_after_pause ; ){                    
                            $newUpdated_order_end_date = strtotime("+1 days", $updated_end_datewill_be);
                            //echo "<br>updated_end_datewill_be = " . $updated_end_datewill_be ." day no : " .date('N', $newUpdated_order_end_date) . " date :". date('Y-m-d', $newUpdated_order_end_date) ; 
                            //echo "<br>====> i = ". $i  ; 
                            if (!in_array(date('N', $newUpdated_order_end_date), $offDaysArray) && !in_array(date('Y-m-d', $newUpdated_order_end_date), $suspend_dates) ) {
                               $i++ ; 
                            }
                            else{                       
                                if($i == 0 ){
                                   // $i = 0 ;
                                  //  echo " <br> i as it is " ; 
                                }
                                else{
                                 //   $i = $i - 1 ;
                                   // echo " <br> i as it is " ; 
                                }
                            }
                           // echo "Later i = ". $i  ;
                            $updated_end_datewill_be = $newUpdated_order_end_date ; 

                           
                        }

                         $upEnd_date = date("Y-m-d",$updated_end_datewill_be) ; 
                        
                       
                        $order_master_info->setEnd_date($upEnd_date);
                        $em->flush();

                        $this->error = "SFD";
                        $response = array("order_id"=>$order_id,"updated_end_date"=>$upEnd_date,"resume_date"=>$resume_date_by_customer) ; 
                       

                    }
                    else{
                        $this->error = "PIW" ;
                        // $this->data = false ;
                        $this->status = 201;
                        $this->message = false;
                        $emptyObj = new Ordermaster();
                        $this->data = $emptyObj;
                        return $this->responseAction() ;
                    }
                }
                else{
                    $this->error = "PIW" ;
                    $this->status = 201;
                    $this->message = false;
                    $emptyObj = new Ordermaster();
                    $this->data = $emptyObj;
                    return $this->responseAction() ;
                }
            }
            else{
                $this->error = "PIW" ;
                // $this->data = false ;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Ordermaster();
                $this->data = $emptyObj;
                return $this->responseAction() ;
            }
          
            
           
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Ordermaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }

   
}

?>
