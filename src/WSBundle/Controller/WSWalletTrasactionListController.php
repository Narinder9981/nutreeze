<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Country;
use AdminBundle\Entity\Wallettransactionhistory;
use AdminBundle\Entity\Walletmaster;

class WSWalletTrasactionListController extends WSBaseController {

    /**
     * @Route("/ws/getWalletTransactionList/{param}",defaults = {"param"=""})
     * @Template()
     */
    public function getWalletTransactionListAction($param) {


        $this->title = "My Orders";
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('user_id'),
            ),
                );
        $response = null;

        if ($this->validateData($param)) {
            
            $user_id =  $param->user_id ;
            $wallet_master_info = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Walletmaster")->findOneBy(array("user_master_id"=>$user_id,'is_deleted'=>0,'wallet_status'=>'active'));
            if($wallet_master_info){
                $transacationOfWallet = NULL ;
                // get Wallet Transaction List 
                $wallet_transcation_list = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Wallettransactionhistory")->findBy(array("is_deleted"=>0,"user_master_id"=>$user_id,"wallet_master_id"=>$wallet_master_info->getWallet_master_id()));
                if($wallet_transcation_list){
                    foreach($wallet_transcation_list as $trkey=>$trval){
                        $transacationOfWallet[] = array(
                            "wallet_transaction_history_id"=>$trval->getWallet_transaction_history_id(),
                            "wallet_action"=>$trval->getWallet_action(),
                            "previous_amount"=>$trval->getPrevious_amount(),
                            "after_action_amount"=>$trval->getAfter_action_amount(),
                            "transaction_amount"=>$trval->getTransaction_amount(),
                            "action_created_datetime"=>$trval->getAction_created_datetime(),
                        );
                        
                    }
                }
                $response = array(
                    "wallet_id"=>$wallet_master_info->getWallet_master_id(),
                    "wallet_amount"=>$wallet_master_info->getWallet_amount(),
                    "wallet_code"=>$wallet_master_info->getWallet_user_code() ,                   
                    "transacationOfWallet"=>$transacationOfWallet                    
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
