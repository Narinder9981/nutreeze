<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Couponmaster;
use AdminBundle\Entity\Couponusagehistory;

class WSVerifyCouponController extends WSBaseController
{

    /**
     * @Route("/ws/verifyCoupon/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function verifyCouponAction($param)
    {
        try {

            $this->title = "Verify Coupon";
            $this->status = 200;
        	$this->message = true;
            //$param = $this->requestAction($this->getRequest()) ;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('user_id', 'coupon_code'),
                ),
            );
            if ($this->validateData($param)) {

                $user_id = $param->user_id;
                $coupon_code = $param->coupon_code;

                $coupon_info = $this->getDoctrine()->getManager()
                    ->getRepository("AdminBundle:Couponmaster")
                    ->findOneBy(array("coupon_code" => $coupon_code, "status" => 'active', "is_deleted" => 0));

                    // print_r($coupon_info);
                    // exit;

                if (!empty($coupon_info)) {
                    $user_coupon_count = 0;
                    $usage_date = '0000-00-00';
                    //                    $coupon_usage_byuser = $this->getDoctrine()
                    //                            ->getManager()
                    //                            ->getRepository('AdminBundle:Couponusagehistory')
                    //                            ->findBy(array('coupon_id' => $coupon_info->getCoupon_master_id(), 'user_master_id' => $user_id, "is_deleted" => 0));
                    //                    if (!empty($coupon_usage_byuser)) {
                    //                        $user_coupon_count = count($coupon_usage_byuser);
                    //                        $usage_date = date('Y-m-d', strtotime($coupon_usage_byuser[$user_coupon_count - 1]->getCreate_date()));
                    //                    }
                    $coupon_use_Query = "SELECT * FROM `coupon_usage_history` join order_master on coupon_usage_history.order_id = order_master.order_master_id where coupon_usage_history.user_master_id = " . $user_id . " and order_master.transaction_id != 0 and coupon_usage_history.coupon_id = " . $coupon_info->getCoupon_master_id();
                    $coupon_usage_byuser = $this->fireQuery($coupon_use_Query);
                    if (!empty($coupon_usage_byuser)) {
                        $user_coupon_count = count($coupon_usage_byuser);
                        $usage_date = date('Y-m-d', strtotime($coupon_usage_byuser[$user_coupon_count - 1]['create_date']));
                    }
                    $coupon_usage_total = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AdminBundle:Couponusagehistory')
                        ->findBy(array('coupon_id' => $coupon_info->getCoupon_master_id(), "is_deleted" => 0));

                    $diff = date_diff(date_create($usage_date), date_create(date("Y-m-d")));

                    $total_coupon_count = 0;
                    if (!empty($coupon_usage_total)) {
                        $total_coupon_count = count($coupon_usage_total);
                    }
                    if ($coupon_info->getEnd_date() >= date('Y-m-d')) {
                        if ($user_coupon_count < $coupon_info->getNo_of_times_use() && $total_coupon_count < $coupon_info->getNo_of_users_use() && ($coupon_info->getCoupon_usage_interval() < $diff->format("%a") || $coupon_info->getCoupon_usage_interval() == 0)) {
                            $response = array(
                                "coupon_master_id" => $coupon_info->getCoupon_master_id(),
                                "coupon_code" => $coupon_info->getCoupon_code(),
                                "discount_type" => $coupon_info->getDiscount_type(),
                                "discount_value" => $coupon_info->getDiscount_value(),
                                "start_date" => strtotime($coupon_info->getStart_date()),
                                "end_date" => strtotime($coupon_info->getEnd_date()),
                                "minimum_amount" => $coupon_info->getMinimum_amount(),
                                "no_of_times_use" => $coupon_info->getNo_of_times_use(),
                                "coupon_usage_interval" => $coupon_info->getCoupon_usage_interval()
                            );

                            $this->error = "SFD";
                        } else {
                            $this->status = 200;
                            $this->error = "CLO"; // Coupon Limit Is Over
                        }
                    } else {
                        $this->status = 200;
                        $this->error = "CDE"; // Coupon Date Is Expired
                    }
                } else {
                    $this->status = 200;
                    $this->error = "IVCC";  // Invaild Coupon Code
                }
            } else {
                $this->status = 201;
                $this->error = "PIM";
            }

            if (empty($response)) {
                // $response = false;
                // $this->status = 201;
				$this->message = false;
				$emptyObj = new Couponmaster();
				$response = $emptyObj;
            }
            $this->data = $response;
            return $this->responseAction();
        } catch (\Exception $e) {
            $this->error = "SFND$e";
            $this->data = false;
            return $this->responseAction();
        }
    }
}
