<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Packagemaster;
class WSPackageDetailsController extends WSBaseController
{

	/**
     * @Route("/ws/packagedetails/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function packagedetailsAction($param){

		try{
          
			$this->title = "Package Details" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('lang_id','package_id','sub_package_id'),
				),
			) ;

			if($this->validateData($param)){
$min_price = 10000000000000;
				$lang_id = $param->lang_id ;
				$package_id = $param->package_id ;
				$sub_package_id = $param->sub_package_id ;
				$em = $this->getDoctrine()->getManager();
				
				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Packagemaster")
								->findBy(array("language_id"=>$lang_id,"main_package_master_id"=>$package_id,"is_deleted"=>0));
				
              	if(empty($get_tc)){
				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Packagemaster")
								->findBy(array("main_package_master_id"=>$package_id,"is_deleted"=>0));                
                }
              
				if(!empty($get_tc))
				{
					foreach($get_tc as $key=>$val){
						
						$sub_packages = null;
						
						$get_tc_sub	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Subpackagemaster")
								->findBy(array("language_id"=>$lang_id,"main_package_id"=>$package_id,"is_deleted"=>0,'main_sub_package_id'=>$sub_package_id));
						
                      	if(empty($get_tc_sub)){
                        $get_tc_sub	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Subpackagemaster")
								->findBy(array("main_package_id"=>$package_id,"is_deleted"=>0,'main_sub_package_id'=>$sub_package_id));
                        }
                      
						if(!empty($get_tc_sub))
						{
							foreach($get_tc_sub as $key1=>$val1){
								
								$sql_combo_price = "select * from sub_package_price_master p_p_m 				
								where p_p_m.is_deleted = '0' and p_p_m.sub_package_id = '".$val1->getMain_sub_package_id()."' ";
								$sub_package_price = $this->fireQuery($sql_combo_price);
						
								$price_array = array('monthly'=>0,'weekly'=>0);
								
								$price_array_new = null;
								$min_price = 100000000000;
								
								if(!empty($sub_package_price)){
									foreach($sub_package_price as $price_sub){
										$duration = $price_sub['duration_type'];
										/*
										if($duration == 'monthly'){
											$package_for_id = 1;
										}
										
										if($duration == 'weekly'){
											$package_for_id = 2;
										} */
                                      
$sql_pk_for = "select main_package_for_master_id,days from package_for_master where name_db = '$duration' group by main_package_for_master_id";
                              	$pk_for = $this->fireQuery($sql_pk_for);
								$days = 0 ;
                              	if($pk_for){
                                	$package_for_id = $pk_for[0]['main_package_for_master_id'];
                                	$days = $pk_for[0]['days'];
                                }
                                      
										
										$price_array[$duration] = $price_sub['price'];
										$price_array_new []= array(
											"package_for_id"=>$package_for_id,
                                          	"days" => $days,
											"package_for_name"=>ucfirst($duration),
											"package_for_price"=>$price_sub['price']
										);
                                      
                                      	 
										if($price_sub['price'] < $min_price){
											$min_price = $price_sub['price'];
										}	
									}
								}
						
								
								$sub_packages = array(
									'sub_package_master_id'=>$val1->getMain_sub_package_id(),
									'grams'=>$val1->getGrams(),
									'min_limit'=>$val1->getMin_limit(),
									'max_limit'=>$val1->getMax_limit(),
									'price'=>$min_price,
									'price_array'=>$price_array_new
								);								
								
							}
						}		
							

						
						$response = array(
									'package_master_id'=>$val->getMain_package_master_id(),
									'package_name'=>$val->getPackage_name(),
									'description'=>$val->getDescription(),
									'sub_packages'=>$sub_packages,
									'price_starting_from'=>$min_price,
									'package_for'=>$this->getpackagedetailsAction($val->getMain_package_master_id(),$lang_id,'package_for'),
									'consultant_fee'=>$this->getpackagedetailsAction($val->getMain_package_master_id(),$lang_id,'consultant_fee'),
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
                $emptyObj = new Packagemaster();
                $response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		}catch(\Exception $e){
            $this->error = "SFND ".$e->getMessage() ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}


}
?>
