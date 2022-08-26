<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Languagemaster;
use AdminBundle\Entity\Bannermaster;


class WSIngredientController extends WSBaseController{

     /**
      * @Route("/ws/get_ingredients/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function get_ingredientsAction(){
		/*try{*/

			$this->title = "Ingredient List" ;
			$this->status = 200;
            $this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('language_id'),
				),
			) ;
                if($this->validateData($param)){
			$language_id=$param->language_id;
			$em = $this->getDoctrine()->getManager();
			$conn = $em->getConnection();
			$today=date('Y-m-d');
            $sql1 = "SELECT * FROM ingredients_master WHERE ingredients_master.is_deleted = '0' and ingredients_master.language_id = '$language_id'";

			$st = $conn->prepare($sql1);
			$st->execute();
			$advertisementList = $st->fetchAll();
    
			if(!empty($advertisementList)){
				foreach($advertisementList  as $advertisement)
                {
					$response[] = array(
							  'ingredient_master_id'=>$advertisement['ingredient_master_id'],
							  'name'=>$advertisement['name'],
							  'status'=>$advertisement['status'],
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
