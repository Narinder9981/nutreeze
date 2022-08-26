<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Country;


class WSOrderConfirmController extends WSBaseController {

    /**
     * @Route("/ws/confirmOrder/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function confirmOrderAction($param) {
        try {
            $this->title = "Confirm Order";
            $this->status = 200;
            $this->message = true;
            $param = $this->requestAction($this->getRequest(), 0);
            $this->validateRule = array(
                array(
                    'rule' => 'NOTNULL',
                    'field' => array('order_id', 'status'),
                ),
            );
            if ($this->validateData($param)) {
                $order_id = $param->order_id;
                $status = $param->status;
                $flag = 'order';
                if (isset($param->flag)) {
                    $flag = $param->flag;
                }


                $em = $this->getDoctrine()->getManager();
                if ($flag == 'order') {
                    $order = $em->getRepository("AdminBundle:Ordermaster")->findOneBy(['order_master_id' => $order_id]);
                    if ($order) {
                        if (strtoupper($status) == 'CAPTURED') {
                            $order->setOrder_status('success');
                           
                        } else {
                            $order->setOrder_status('cancel');
                        }
                        $em->flush();
                        $this->error = "SFD";
                        $response = true;
                    } else {
                        $this->error = "NRF";
                    }
                } else if ($flag == 'upgradegram') {
                    $orderupgrade = $this->fireQuery("SELECT * FROM `order_packagegram_upgrade_history` where order_id = $order_id and is_deleted = 0 order by created_datetime DESC limit 0,1");
                    if (isset($param->order_packagegramupgrade_history_id) && ($param->order_packagegramupgrade_history_id != 0 )) {
                        $order_packagegramupgrade_history_id = $param->order_packagegramupgrade_history_id;
                        if ($orderupgrade) {
                            $orderupgradeInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackagegramupgradehistory")->find($order_packagegramupgrade_history_id);
                            if ($orderupgradeInfo) {
                                if (strtoupper($status) == 'CAPTURED') {
                                    $orderupgradeInfo->setPayment_status('success');
                                    $orderupgradeInfo->setStatus('paid');
                                } else {
                                    $orderupgradeInfo->setPayment_status('pending');
                                    $orderupgradeInfo->setStatus('pending');
                                }
                                //$orderupgradeInfo->setTransaction_id($transaction_id);
                                $em->flush();
                                $this->error = "SFD";
                                $response = true;
                            } else {
                                $this->error = "NRF";
                                $response = false;
                            }
                        } else {
                            $this->error = "NRF";
                            $response = false;
                        }
                    } else {
                        $this->error = "PIM";
                        $response = false;
                    }
                }
                 else {
                    $orderupgrade = $this->fireQuery("SELECT * FROM `order_package_upgrade_history` where order_id = $order_id and is_deleted = 0 order by created_datetime DESC limit 0,1");

                    if ($orderupgrade) {
                        $orderupgradeId = $orderupgrade[0]['order_package_upgrade_history_id'];
                        $orderupgradeInfo = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Orderpackageupgradehistory")->find($orderupgradeId);
                        if ($orderupgradeInfo) {
                            if (strtoupper($status) == 'CAPTURED') {
                                $orderupgradeInfo->setPayment_status('success');
                                $orderupgradeInfo->setStatus('paid');
                            } else {
                                $orderupgradeInfo->setPayment_status('pending');
                                $orderupgradeInfo->setStatus('pending');
                            }
                            $em->flush();
                            $this->error = "SFD";
                            $response = true;
                        } else {
                            $this->error = "NRF";
                            $response = false;
                        }
                    } else {
                        $this->error = "NRF";
                        $response = false;
                    }
                }
            } else {
                $this->error = "PIM";
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
        } catch (\Exception $e) {
            $this->error = "SFND " . $e->getMessage();
            $this->data = false;
            return $this->responseAction();
        }
    }

}

?>