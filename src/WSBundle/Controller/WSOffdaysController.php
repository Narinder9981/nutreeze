<?php
namespace WSBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Countrymaster;

class WSOffdaysController extends WSBaseController
{
    /**
     * @Route("/ws/GetOffDaysList/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function offDaysAction($param)
	{
		try
		{
			$this->title = "Off Days List" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('package_id','language_id'),
				),
			);
			if($this->validateData($param))
			{
				$package_id = $param->package_id;
				$language_id = $param->language_id;
				$em = $this->getDoctrine()->getManager();
				$connection = $em->getConnection();
				$packageMaster = $em->getRepository("AdminBundle:Packagemaster")->findOneBy(
					[
						"is_deleted" => 0,
						"main_package_master_id" => $package_id
					]
				);

				if($packageMaster){
					$off_days_allowed  = $packageMaster->getOff_days_allowed();

					$sql_days = "select * from days_master where is_deleted = 0 and language_id = '$language_id' ";

					$days = $this->fireQuery($sql_days);

					$daysData = null;

					if(!empty($days)){
						foreach($days as $_days){
							$daysData [] = array(
								"day_name" => $_days['days_name'],
								"main_days_master_id" => $_days['main_days_master_id'],
							);
						}
					}

					$response = array(
						"off_days_allowed" => $off_days_allowed,
						"days" => $daysData
					);

					$this->error = "SFD";
				}else{
					$this->error = "NRF";
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