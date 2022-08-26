<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Couponmaster;
class WSPromotionlistController extends WSBaseController
{

	/**
     * @Route("/ws/promotionlist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function promotionlistAction($param){

		try{
			$this->title = "Promotion List" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array(),
				),
			) ;

			if($this->validateData($param)){

				$em = $this->getDoctrine()->getManager();

				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Couponmaster")
								->findBy(array("is_deleted"=>0,"status"=>'active'));

				if(!empty($get_tc))
				{
					foreach($get_tc as $key=>$val){
						$response[] = array(
									'coupon_id'=>$val->getCoupon_master_id(),
									'coupon_name'=>$val->getCoupon_name(),
									'coupon_code'=>$val->getCoupon_code(),
									'start_date'=>$val->getStart_date(),
									'end_date'=>$val->getEnd_date(),
									'discount_value'=>$val->getDiscount_value(),
									'discount_type'=>$val->getDiscount_type(),
									'no_of_users_use'=>$val->getNo_of_users_use(),
									'no_of_time_use'=>$val->getNo_of_times_use(),
									'coupon_image_id'=>$this->getMediaDetailAction($val->getCoupon_image_id()),
								);

					}						
					$this->error = "SFD" ;
				}
				else
				{
					$this->error = "NRF" ;
				}
			}else{
				$this->error = "PIM" ;
			}
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
                $this->message = false;
                $emptyObj = new Couponmaster();
                $response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		}catch(\Exception $e){
            $this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}


}
?>
