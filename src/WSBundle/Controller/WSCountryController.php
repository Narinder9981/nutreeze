<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;
class WSCountryController extends WSBaseController
{
    /**
     * @Route("/ws/countrylist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function countrylistAction($param)
	{
		try
		{
			$this->title = "Country List" ;
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
				$language_id = $param->language_id;
				$em = $this->getDoctrine()->getManager();
				$connection = $em->getConnection();
				$statement = $connection->prepare("SELECT * FROM country_master WHERE language_id = $language_id AND  is_deleted = 0 ");
				$statement->execute();
				$country_master_info = $statement->fetchAll();
				if(isset($country_master_info) && !empty($country_master_info))
				{
					foreach($country_master_info as $key=>$val)
					{
						$response[] =array(
							"main_country_id"=>$val['main_country_id'],
							"country_name"=>$val['country_name'],
							"country_code"=>$val['std_code'],
							"language_id"=>$val['language_id']
						);		
					}
					$this->error = "SFD" ;
				}
				else
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
				$emptyObj = new Countrymaster();
				$response = $emptyObj;
			}		
			$this->data = $response ;		
			return $this->responseAction() ;
		}
		catch(\Exception $e)
		{
			$this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}
}
?>