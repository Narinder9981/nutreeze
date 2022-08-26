<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;
class WSWeightController extends WSBaseController
{
    /**
     * @Route("/ws/weightlist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function weightlistAction($param)
	{
		try
		{
			$this->title = "Weight List" ;
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
				$statement = $connection->prepare("SELECT weight_master.* FROM weight_master WHERE weight_master.language_id = $language_id AND weight_master.status='active' AND  weight_master.is_deleted = 0 ");
				$statement->execute();
				$country_master_info = $statement->fetchAll();
				if(isset($country_master_info) && !empty($country_master_info))
				{
					foreach($country_master_info as $key=>$val)
					{
						$response[] =array(
							"main_weight_id"=>$val['main_weight_id'],
							"weight"=>$val['weight'],
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