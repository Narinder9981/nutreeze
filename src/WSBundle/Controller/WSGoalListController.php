<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Usergoalmaster;
class WSGoalListController extends WSBaseController
{

	/**
     * @Route("/ws/goallist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function goallistAction($param){

		//try{
			$this->title = "Goal List" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('lang_id'),
				),
			) ;

			if($this->validateData($param)){

				$lang_id = $param->lang_id ;
				$em = $this->getDoctrine()->getManager();

				$get_tc	=	$this->getDoctrine()->getManager()
								->getRepository("AdminBundle:Usergoalmaster")
								->findBy(array("language_id"=>$lang_id,"is_deleted"=>0));

				if(!empty($get_tc))
				{
					foreach($get_tc as $key=>$val){
						$response[] = array(
									'goal_id'=>$val->getUser_goal_master_id(),
									'goal_name'=>$val->getName(),
									'description'=>$val->getDescription(),
									'goal_background'=>$this->getMediaDetailAction($val->getImage_id()),
									'goal_logo'=>$this->getMediaDetailAction($val->getIcon_id())
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
                $emptyObj = new Usergoalmaster();
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
