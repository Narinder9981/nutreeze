<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Productratingmaster;

class WSRatingsController extends WSBaseController
{

	/**
     * @Route("/ws/addRatings/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function addRatingAction($param){

		//try{
			$this->title = "Add Ratings" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0);
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('meal_id','user_id','ratings'),
				),
			) ;

			if($this->validateData($param)){
				
				$em = $this->getDoctrine()->getManager();

				$meal_id = $param->meal_id;
				$user_id = $param->user_id;
				$package_id = !empty($param->package_id) ? $param->package_id : 0;
				$ratings = json_decode($param->ratings);
				$array_rate_ok = true;
				
				#check meal is delivered or not
				$meal_delivered = $em->getRepository("AdminBundle:Ordermealrelation")->findOneBy(array('order_meal_relation_id'=>$meal_id,'is_deleted'=>0,'status'=>'delivered'));	
				$can_rate = false;
				if($meal_delivered){
					$can_rate = true;
				}
				
				if(!$can_rate){
					$this->error = "PIW";
					$this->error_msg = "Cant rate undelivered Meal";
					// $this->data = false;
					$this->status = 201;
					$this->message = false;
					$emptyObj = new Ordermaster();
					$this->data = $emptyObj;
					return $this->responseAction();
				}
				
				#check meal is delivered or not done	
				
				
				if(!empty($ratings)){
					foreach($ratings as $ratings_single){
						if(array_key_exists("product_id",$ratings_single) && array_key_exists("ratings",$ratings_single)){
							
						}else{
							$array_rate_ok = false;
						}
					}
				}
				
				if(!$array_rate_ok || $ratings == ''){
					$this->error = "Ratings Array is Wrong";			
					return $this->responseAction();
				}	


				
				
				$user = $em->getRepository("AdminBundle:Usermaster")->findBy(array('user_master_id'=>$user_id,'is_deleted'=>0));
				if(!empty($user)){
						$rating_ids = null;
						$rating_ids_ar = null;
						
						if(!empty($ratings)){
							foreach($ratings as $rate){				
								$product_id = $rate->product_id;
								$ratings = $rate->ratings;
								$product = $em->getRepository("AdminBundle:Productmaster")->findBy(array('main_product_master_id'=>$product_id,'is_deleted'=>0));
								if(!empty($product)){
									$rating_exist =	$this->getDoctrine()->getManager()
													->getRepository("AdminBundle:Productratingmaster")
													->findOneBy(array("user_master_id"=>$user_id,"is_deleted"=>0,'main_product_id'=>$product_id,'product_meal_id'=>$meal_id));

									if(empty($rating_exist))
									{
										$new_rating = new Productratingmaster();
										$new_rating->setMain_product_id($product_id);
										$new_rating->setProduct_meal_id($meal_id);
										$new_rating->setUser_master_id($user_id);
										$new_rating->setRatings($ratings);
										$new_rating->setPackage_id($package_id);
										$new_rating->setCreated_datetime(date('Y-m-d H:i:s'));
										$new_rating->setIs_deleted(0);
										$em->persist($new_rating);
										$em->flush();
										$rating_ids = $new_rating->getProduct_rating_master_id();
									}else{
										$rating_exist->setRatings($ratings);
										$em->flush();
										$rating_ids = $rating_exist->getProduct_rating_master_id();
									}
									$rating_ids_ar[] = array('product_ids'=>$product_id,'ratings'=>$ratings,'ratings_id'=>$rating_ids);
								}
								$response = $rating_ids_ar;								
								$this->error = "SFD" ;
												
							}
						}
						
				
				}else{
					$this->error = "UNE";
				}
			}else{
				$this->error = "PIM" ;
			}
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Ordermaster();
				$response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		/*}catch(\Exception $e){
            $this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}*/
	}


}
?>
