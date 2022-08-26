<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Statemaster;
use AdminBundle\Entity\Countrymaster;
class WSDietStatusListController extends WSBaseController
{
    /**
     * @Route("/ws/dietstatuslist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function dietstatuslistAction($param)
	{
		try
		{
			$this->title = "Diet Status List" ;
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
				
				
				$where = "";
				
				
				$em = $this->getDoctrine()->getManager();
				$connection = $em->getConnection();

				$statement1 = $connection->prepare("SELECT * FROM diet_consult_status WHERE language_id = $language_id AND  is_deleted = 0  ");
				$statement1->execute();
				$governorate_master = $statement1->fetchAll();

				if(!empty($governorate_master)){
					foreach($governorate_master as $_governorate_master){					
	
						$response [] = array(
								"main_diet_consult_status_id"=>$_governorate_master['main_diet_consult_status_id'],
								"diet_consult_status_name" => $_governorate_master['diet_consult_status_name']
							);							
						
												
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