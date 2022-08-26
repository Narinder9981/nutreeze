<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Languagemaster;
use AdminBundle\Entity\Bannermaster;


class WSBannerController extends WSBaseController{

     /**
      * @Route("/ws/get_banner/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function get_bannerAction(){
		/*try{*/

			$this->title = "Banner List" ;
			$this->status = 200;
            $this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('type','language_id'),
				),
			) ;
                if($this->validateData($param)){
			$advertise_type=$param->type;
			$language_id=$param->language_id;
			$em = $this->getDoctrine()->getManager();
			$conn = $em->getConnection();
			$today=date('Y-m-d');
			$sql1 = "SELECT * FROM advertise_master WHERE status='active' AND advertise_type='$advertise_type' AND is_deleted='0' AND start_date <= '$today' AND end_date >= '$today' AND language_id='$language_id' order by sort_order";
			$st = $conn->prepare($sql1);
			$st->execute();
			$advertisementList = $st->fetchAll();
  
			if(!empty($advertisementList)){
				foreach($advertisementList  as $advertisement)
                {
					$response[] = array(
							  'advertisement_id'=>$advertisement['advertise_master_id'],
							  'advertisement_name'=>$advertisement['advertise_name'],
							  'advertisement_link'=>$advertisement['advertisement_link'],
							  'advertisement_image'=>$this->getMediaDetailAction($advertisement['advertise_image_id']),
						) ;
				}
				$this->error = "SFD" ;
			}else{
				$this->error = "NRF" ;
			}
                 }
                 else{
                   $this->error = "PIM" ;
                 }

			if(empty($response)){
				// $response = false ;
				//$this->error = "NRF" ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = "";
				$response = $emptyObj;
				
			}
			$this->data = $response;
			return $this->responseAction() ;
		/*}catch(\Exception $e){
			$this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}*/
	}

}
?>
