<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Statemaster;
use AdminBundle\Entity\Countrymaster;
class WSAreaController extends WSBaseController
{
    /**
     * @Route("/ws/arealist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function arealistAction($param)
	{
		try
		{
			$this->title = "Area List" ;
			$this->status = 200;
            $this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('language_id'),
				),
			);
			if($this->validateData($param))
			{
				$language_id = $param->language_id ;
				
				$keyword = !empty($param->keyword) ? $param->keyword : false ;
				
				$where = "";
				if($keyword){
					$where = " AND area_master.area_name LIKE '%$keyword%' ";
				}
				
				$em = $this->getDoctrine()->getManager();
				$connection = $em->getConnection();

				$statement1 = $connection->prepare("SELECT * FROM city_master WHERE language_id = $language_id AND  is_deleted = 0 AND status='Active' ");
				$statement1->execute();
				$governorate_master = $statement1->fetchAll();

				if(!empty($governorate_master)){
					foreach($governorate_master as $_governorate_master){
						$gov_id = $_governorate_master['main_city_master_id'];

						$areas = null;
						$statement = $connection->prepare("SELECT * FROM area_master WHERE language_id = $language_id AND  is_deleted = 0 AND status='active' and city_id = '$gov_id' $where ");
						$statement->execute();
						$area_master_info = $statement->fetchAll();
						
						if(isset($area_master_info) && !empty($area_master_info))
						{
							foreach($area_master_info as $key=>$val)
							{
								
								$areas[] =array(
									"main_area_id"=>$val['main_area_id'],
									"area_name"=>$val['area_name'],
									"area_code"=>$val['area_code'],
									"pincode"=>$val['pincode'],
									"language_id"=>$language_id,
									"status"=>$val['status'],
									"governorate_id"=>$_governorate_master['main_city_master_id']									
								);		
							}
						
						}
	
						if(!empty($areas)){
							$response [] = array(
								"governorate_id"=>$_governorate_master['main_city_master_id'],
								"governorate_name" => $_governorate_master['city_name'],
								'areas' => $areas
							);							
						}
												
					}

					$this->error = "SFD" ;
				}else
				{
					$this->error = "NRF" ;
				}
			}
			else
			{
				$this->error = "PIM" ;
			}
			
			#if area_name not maches check for governorate_name
/*			
			if(!empty($keyword) && empty($response)){
				$statement1 = $connection->prepare("SELECT * FROM city_master WHERE language_id = $language_id AND  is_deleted = 0 AND status='Active' AND city_name LIKE '%$keyword%'");
				$statement1->execute();
				$governorate_master = $statement1->fetchAll();
	
				if(!empty($governorate_master)){
					foreach($governorate_master as $_governorate_master){
						$gov_id = $_governorate_master['main_city_master_id'];

						$areas = null;
						$statement = $connection->prepare("SELECT * FROM area_master WHERE language_id = $language_id AND  is_deleted = 0 AND status='active' and city_id = '$gov_id'");
						$statement->execute();
						$area_master_info = $statement->fetchAll();
						
						if(isset($area_master_info) && !empty($area_master_info))
						{
							foreach($area_master_info as $key=>$val)
							{
								
								$areas[] =array(
									"main_area_id"=>$val['main_area_id'],
									"area_name"=>$val['area_name'],
									"area_code"=>$val['area_code'],
									"pincode"=>$val['pincode'],
									"language_id"=>$language_id,
									"status"=>$val['status'],
									"governorate_id"=>$_governorate_master['main_city_master_id']									
								);		
							}
						
						}
	
						if(!empty($areas)){
							$response [] = array(
								"governorate_id"=>$_governorate_master['main_city_master_id'],
								"governorate_name" => $_governorate_master['city_name'],
								'areas' => $areas
							);							
						}
												
					}

					$this->error = "SFD" ;
				}else{
					$this->error = "NRF" ;
				}				
			}
*/						
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
                $this->message = false;
                $emptyObj = new Statemaster();
                $response = $emptyObj;
				$this->error = "NRF" ;
			}		
			$this->data = $response ;		
			return $this->responseAction() ;
		}
		catch(\Exception $e)
		{
			$this->error = "SFND ".$e->getMessage() ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}
}
?>