<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Productratingmaster;
use AdminBundle\Entity\Ordermealrelation;
use AdminBundle\Entity\Mealproductrelation;

class WSAddMealController extends WSBaseController {

    /**
     * @Route("/ws/addMeal/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function addMealAction($param) {

        //try{
        $this->title = "Add Meal";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('order_id', 'package_id', 'meal', 'meal_date', 'user_id'),
            ),
                );

        if ($this->validateData($param)) {

            $today = date('Y-m-d');

            $current_date_time = date('Y-m-d 00:00:00');

            //$meal_date = date('Y-m-d H:i:s',($param->meal_date/1000));
            $meal_date = date('Y-m-d H:i:s', strtotime($param->meal_date));
            //$unique_no = $param->unique_no;

            $full_day_name = date('l', strtotime($meal_date));

            #getOffDaysEntered
            $order_id = $param->order_id;

            $sql = "SELECT days_master.days_name,days_master.main_days_master_id from order_off_days_relation 
				JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day 
				where order_off_days_relation.is_deleted = 0 and order_id = '$order_id' group by days_master.main_days_master_id";

            $offDays = $this->fireQuery($sql);

            $day_entered_as_off = false;

            if (!empty($offDays)) {
                foreach ($offDays as $_offDays) {
                    if ($_offDays['days_name'] == $full_day_name) {
                        $day_entered_as_off = true;
                        break;
                    }
                }
            }

            if ($day_entered_as_off) {
                $this->error = "PIW";
                $this->error_msg = "Day entered is a Off day.";
                return $this->responseAction();
            }

            $time_after_two_days = date('Y-m-d 00:00:00', strtotime("+3 days", strtotime($current_date_time)));

            $date_diff = date_diff(date_create($meal_date), date_create($time_after_two_days));

            $array_date = array('date' => $current_date_time, 'after_two_days' => $time_after_two_days, 'hours' => $date_diff->h, 'days' => $date_diff->d, 'meal_date' => $meal_date);


           // if (strtotime($meal_date) <= strtotime($time_after_two_days)) { due to whatapp audio on 7 sept 2019
            if (strtotime($meal_date) < strtotime($time_after_two_days)) {

                $this->error = "PIW";
                $this->error_msg = "Cant Order before 72 Hours of delivery.";
                return $this->responseAction();
            }

            $order_id = $param->order_id;
            $user_id = $param->user_id;
            $package_id = $param->package_id;
            $lat = !empty($param->lat) ? $param->lat : 0;
            $lang = !empty($param->lang) ? $param->lang : 0;
            $meal = json_decode($param->meal);
            //$meal_day = date('D',($param->meal_date/1000));
            $meal_day = date('D', strtotime($param->meal_date));
            //$meal_date = date('Y-m-d',($param->meal_date/1000));
            $meal_date = date('Y-m-d', strtotime($param->meal_date));

            $em = $this->getDoctrine()->getManager();
            $array_meal_ok = true;
            $meal_count = 0;
            $soup_count = 0;
            $breakfast_count = 0;
            $snakes_count = 0;
            if (!empty($meal)) {
                foreach ($meal as $meal_data) {
                    if (
                            array_key_exists("main_meal_id", $meal_data) &&
                            array_key_exists("proteins_amount", $meal_data) &&
                            array_key_exists("carbs_amount", $meal_data) &&
                            array_key_exists("meal_type", $meal_data) &&
                            array_key_exists("raw_eggs", $meal_data) &&
                            array_key_exists("white_eggs", $meal_data)
                    ) {
                        #meal_count
                        //if ($meal_data->meal_type == 1 || $meal_data->meal_type == 2) {
                        if ($meal_data->meal_type == 2 ) {
                            $meal_count = $meal_count + 1;
                        }
                        #snakes count
                        if ($meal_data->meal_type == 3) {
                            $snakes_count = $snakes_count + 1;
                        }
                        if ($meal_data->meal_type == 1) {
                            $breakfast_count = $breakfast_count + 1;
                        }

                        #soup count
                        if ($meal_data->meal_type == 10) {
                            $soup_count = $soup_count + 1;
                        }
                    } else {
                        $array_meal_ok = false;
                    }
                }
            }

            if (!$array_meal_ok || $meal == '') {
                $this->error = "Meal Array is Wrong";
                return $this->responseAction();
            }

            $user = $em->getRepository("AdminBundle:Usermaster")->findBy(array('user_master_id' => $user_id, 'is_deleted' => 0));
            if ($user) {
                #check order for given package and order id and user_id
                $order = $em->getRepository("AdminBundle:Ordermaster")->findOneBy(array('order_master_id' => $order_id, 'is_deleted' => 0, 'order_by' => $user_id, 'package_id' => $package_id));

                if ($order) {
                    $order_end_date = $order->getEnd_date();
                    $order_start_date = $order->getStart_date();
                    if (strtotime($meal_date) <= strtotime($order_end_date) && strtotime($meal_date) >= strtotime($order_start_date) && strtotime($meal_date) >= strtotime($today)) {

                        #getPackageDetails no of meals and snakes
                        $package = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(array('main_package_master_id' => $package_id, 'is_deleted' => 0));
                        if ($package) {

                            #get Meal type Counts from in V2 table : order_meal_types_include_relation
                            $order_start_date = $order_start_date;

                            $sql_ = "select sum(total_meal_type) as total_count,meal_type from order_meal_types_include_relation where is_deleted = 0 and is_archive = 0 and order_id = '$order_id' and start_from_date <= '$meal_date' group by meal_type order by start_from_date DESC";
                            $totalMealCount = $this->fireQuery($sql_);


                            $meals_allowed = 0;
                            $snakes_allowed = 0;
                            $soup_allowed = 0;
                            $breakfast_allowed = 0;
                            /* 							echo $sql_;
                              print_r($totalMealCount);exit;
                             */
                            if (!empty($totalMealCount)) {
                                foreach ($totalMealCount as $_totalMealCount) {
                                    //if ($_totalMealCount['meal_type'] == 1 || $_totalMealCount['meal_type'] == 2) {
                                    if ($_totalMealCount['meal_type'] == 1 ) {
                                        $breakfast_allowed = $_totalMealCount['total_count'];
                                    }
                                    if ($_totalMealCount['meal_type'] == 2 ) {
                                        $meals_allowed =  $_totalMealCount['total_count'];
                                    }

                                    if ($_totalMealCount['meal_type'] == 3) {
                                        $snakes_allowed = $_totalMealCount['total_count'];
                                    }

                                    if ($_totalMealCount['meal_type'] == 10) {
                                        $soup_allowed = $_totalMealCount['total_count'];
                                    }
                                }
                            }
//							$meals_allowed = $package->getPackage_meals();
//							$snakes_allowed = $package->getPackage_snakes();

                            if ($snakes_count <= $snakes_allowed && $meal_count <= $meals_allowed && $soup_count <= $soup_allowed && $breakfast_count <= $breakfast_allowed) {

                                $order_meal_exist = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                        array(
                                            'order_master_id' => $order_id,
                                            'is_deleted' => 0, 'requested_datetime' => $meal_date
                                        )
                                );
                                $current_day_meal_id = $meal_id = 0;
                                $meal_id_list = null;

                                if ($order_meal_exist) {

                                    #date validation of delivery date
                                    //$date_before_two_days = date('Y-m-d H:i:s', strtotime("-2 days", strtotime($order_meal_exist->getRequested_datetime())));
                                    $date_before_two_days = date('Y-m-d H:i:s', strtotime("-3 days", strtotime($order_meal_exist->getRequested_datetime())));

                                    if (strtotime($today) < strtotime($date_before_two_days)) {

                                        $order_meal_exist->setOrder_master_id($order_id);
                                        //$order_meal_exist->setUnique_no($unique_no);
                                        $order_meal_exist->setUser_id($user_id);
                                        $order_meal_exist->setMeal_day(strtolower($meal_day));
                                        $order_meal_exist->setLast_modified_datetime(date('Y-m-d H:i:s'));
                                        $order_meal_exist->setRequested_datetime($meal_date);
                                        $order_meal_exist->setAssign_driver_id(0);
                                        $order_meal_exist->setStatus('ordered');
                                        $order_meal_exist->setNot_delivered_reason(0);
                                        $order_meal_exist->setLat($lat);
                                        $order_meal_exist->setLang($lang);
                                        $order_meal_exist->setIs_deleted(0);

                                        $em->flush();
                                        $current_day_meal_id = $meal_id = $order_meal_exist->getOrder_meal_relation_id();

                                        $meal_id_list[] = $meal_id;

                                        $meal_day_ = strtolower($meal_day);
                                        #copyToSameDay
                                        if (!empty($param->isCopyToAllDays) && $param->isCopyToAllDays == 'yes') {
                                            $sql_get_upcoming_days = "select order_meal_relation_id from order_meal_relation
																							 where order_master_id = '$order_id' and requested_datetime > '$meal_date' 
																							 and meal_day = '$meal_day_' and is_deleted = 0 ";
                                            $upcoming_meals = $this->fireQuery($sql_get_upcoming_days);

                                            if (!empty($upcoming_meals)) {
                                                foreach ($upcoming_meals as $_upcoming_meals) {
                                                    $meal_id_list[] = $_upcoming_meals['order_meal_relation_id'];
                                                }
                                            }
                                        }
                                        #copyToSameDay done
                                    } else {
                                        $this->error = "ETG";
                                        $this->error_msg = "Edit Time Gone";
                                    }
                                } else {

                                    // find number of times same day comes
                                    $index = 0;
                                    $current_day_meal_id = 0;
                                    $dayInd = 7;
                                    $dayList = null;
                                    $dayList[] = $meal_date;

                                    if (!empty($param->isCopyToAllDays) && $param->isCopyToAllDays == 'yes') {
                                        while (strtotime("-{$dayInd} days {$meal_date}") >= strtotime($order_start_date)) {
                                            $next_same_day = date("Y-m-d", strtotime("+{$dayInd} days {$meal_date}")) . '<br>';

                                            if (date('D', strtotime($next_same_day) == $meal_day)) {
                                                // check if already ordered or not
                                                $checkMeal = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                                        array(
                                                            'order_master_id' => $order_id, 'is_deleted' => 0, 'requested_datetime' => $next_same_day
                                                        )
                                                );

                                                if (empty($checkMeal)) {
                                                    $dayList[] = $next_same_day;
                                                }
                                            }

                                            $index++;
                                            $dayInd = $dayInd + 7;
                                        }

                                        while (strtotime("+{$dayInd} days {$meal_date}") <= strtotime($order_end_date)) {
                                            $next_same_day = date("Y-m-d", strtotime("+{$dayInd} days {$meal_date}")) . '<br>';

                                            if (date('D', strtotime($next_same_day) == $meal_day)) {
                                                // check if already ordered or not
                                                $checkMeal = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(
                                                        array(
                                                            'order_master_id' => $order_id, 'is_deleted' => 0, 'requested_datetime' => $next_same_day
                                                        )
                                                );

                                                if (empty($checkMeal)) {
                                                    $dayList[] = $next_same_day;
                                                }
                                            }

                                            $index++;
                                            $dayInd = $dayInd + 7;
                                        }
                                    }

                                    if (!empty($dayList)) {
                                        foreach ($dayList as $next_same_day) {

                                            $unique_no = $this->getUniqueCode();

                                            $new_meal = new Ordermealrelation();
                                            $new_meal->setOrder_master_id($order_id);
                                            $new_meal->setUnique_no($unique_no);
                                            $new_meal->setUser_id($user_id);
                                            $new_meal->setMeal_day(strtolower($meal_day));
                                            $new_meal->setCreated_datetime(date('Y-m-d H:i:s'));
                                            $new_meal->setLast_modified_datetime(date('Y-m-d H:i:s'));
                                            $new_meal->setRequested_datetime($next_same_day);
                                            $new_meal->setAssign_driver_id(0);
                                            $new_meal->setStatus('ordered');
                                            $new_meal->setNot_delivered_reason(0);
                                            $new_meal->setLat($lat);
                                            $new_meal->setLang($lang);
                                            $new_meal->setIs_deleted(0);
                                            $em->persist($new_meal);
                                            $em->flush();

                                            $meal_id = $new_meal->getOrder_meal_relation_id();

                                            if ($meal_date == $next_same_day) {
                                                $current_day_meal_id = $meal_id;
                                            }

                                            $meal_id_list[] = $meal_id;
                                        }
                                    }
                                }
                                if (!empty($meal) && !empty($meal_id_list) != 0) {
                                    #delete Existed Meal
                                    if ($order_meal_exist) {
                                        foreach ($meal_id_list as $meal_id) {
                                            $meal_product_exist = $em->getRepository("AdminBundle:Mealproductrelation")->findBy(array('meal_id' => $meal_id, 'is_deleted' => 0));
                                            if ($meal_product_exist) {
                                                foreach ($meal_product_exist as $exist_product) {
                                                    $exist_product->setIs_deleted(1);
                                                    $em->flush();
                                                }
                                            }
                                        }
                                    }

                                    foreach ($meal as $meal_data) {

                                        if (isset($meal_data->raw_eggs)) {
                                            $raw_eggs = $meal_data->raw_eggs;
                                        } else {
                                            $raw_eggs = 0;
                                        }

                                        if (isset($meal_data->white_eggs)) {
                                            $white_eggs = $meal_data->white_eggs;
                                        } else {
                                            $white_eggs = 0;
                                        }

                                        if (isset($meal_data->calory)) {
                                            $calory = $meal_data->calory;
                                        } else {
                                            $calory = 0;
                                        }

                                        foreach ($meal_id_list as $meal_id) {
                                            $new_meal_product = new Mealproductrelation();
                                            $new_meal_product->setMeal_id($meal_id);
                                            $new_meal_product->setMain_product_id($meal_data->main_meal_id);
                                            $new_meal_product->setMeal_product_qty(1);
                                            $new_meal_product->setProteins_amount($meal_data->proteins_amount);
                                            $new_meal_product->setCarbs_amount($meal_data->carbs_amount);
                                            $new_meal_product->setRaw_eggs($raw_eggs);
                                            $new_meal_product->setWhite_eggs($white_eggs);
                                            $new_meal_product->setCalory($calory);
                                            $new_meal_product->setMeal_type($meal_data->meal_type);
                                            $new_meal_product->setIs_deleted(0);
                                            $em->persist($new_meal_product);
                                            $em->flush();
                                        }
                                    }
                                    $this->error = "SFD";
                                    $response = array('meal_id' => $current_day_meal_id);
                                }
                            } else {
                                $this->error = "PIW";
                                $this->error_msg = "Meal or Snakes count exceeds limit.";
                            }
                        } else {
                            $this->error = "PNE";
                        }
                    } else {
                        $this->error = "ODW";
                        $this->error_msg = "Date is not between Order Period";
                    }
                } else {
                    $this->error = "ONE";
                }
            } else {
                $this->error = "UNE";
            }
        } else {
            $this->error = "PIM";
        }
        if (empty($response)) {
            $response = false;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }

    public function getUniqueCode() {
        $_sql = "SELECT * from order_meal_relation order by unique_no desc";
        $data = $this->firequery($_sql);

        if (!empty($data)) {
            $unique_no = (int) $data[0]['unique_no'];
            $unique_no = $unique_no + 1;
        } else {
            $unique_no = 10001;
        }

        return $unique_no;
    }

}

?>
