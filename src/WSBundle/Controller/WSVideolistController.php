<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Aboutus ;


class WSVideolistController extends WSBaseController
{

	/**
     * @Route("/ws/videolist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */

    public function videolistAction($param){
		try{
			$this->title = "Video List" ;
			$this->status = 200;
          	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0) ;
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('lang_id','user_id'),
				),
			) ;

			if($this->validateData($param)){
				$language_id = $param->lang_id;
				$user_id = $param->user_id;
				$order_id = !empty($param->order_id) ? $param->order_id : 0;

				$em = $this->getDoctrine()->getManager();
				$date=date('Y-m-d');

				$package_where = "";
				if(!empty($order_id)){
					$package_where = " and order_master_id = '$order_id' ";
				}

				$package_query = "SELECT package_id FROM `order_master` WHERE created_by='$user_id' AND end_date >= '$date' AND is_deleted=0 AND order_status='success' $package_where group by package_id";
				
				$stmt2 = $this->getDoctrine()->getManager()->getConnection()->prepare($package_query);
				$stmt2->execute();
				$purchase_package = $stmt2->fetchAll();
				$response=array();
				if(!empty($purchase_package)){

					$pk_str = "";
					foreach($purchase_package as $_purchase_package){
						$pk_str .= $_purchase_package['package_id'].","; 
					}
					$pk_str = trim($pk_str,",");

					#getVideoCategories
					$sql_video_category = "select * from user_video_category_master where is_deleted = 0 and language_id = '$language_id' ";
					$video_category = $this->fireQuery($sql_video_category);					
					#getVideoCategories done
					if(!empty($video_category)){
						foreach($video_category as $_video_category){
							$video_category_id  = $_video_category['main_user_video_category_master_id'];

							$query = "SELECT * FROM user_video_master uvm JOIN video_package_relation vpr ON uvm.main_video_master_id=vpr.video_id WHERE uvm.language_id='$language_id' and video_category = '$video_category_id'  AND uvm.is_deleted=0 and vpr.package_id IN ($pk_str)  group by uvm.main_video_master_id ";
							$stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($query);
							$stmt->execute();
							$video = $stmt->fetchAll();
							
							$videoData = null;

							if(!empty($video))
							{
								foreach($video as $key=>$val){
									$videoData[] = array(
										'video_id'=>$val['main_video_master_id'],
										'title'=>$val['title'],
										'day'=>0,
										'video'=>$this->getMediaDetailAction($val['media_id']),
										'thumb_image'=>$this->getMediaDetailAction($val['thumb_image_id'])
									);
								}
							}
							$response [] = array(
								'category_id' => $video_category_id,
								'category_name' => $_video_category['name'],
								'video' => $videoData
							); 
						}
					}else{
						$this->error = "NRF";
					}
				}
				else
				{
					$this->error = "PNP" ;
					$this->error_msg = "Package Not Purchased" ;
				}
			}else{
				$this->error = "PIM" ;
			}
			if(!empty($response)){
				$this->error = "SFD" ;
			}else{
				$this->error = "NRF" ;
			}
				
			if(empty($response))
			{
				// $response = false ;
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Aboutus();
				$response = $emptyObj;
			}
			$this->data = $response ;
			return $this->responseAction() ;
		}catch(\Exception $e){
            $this->error = "SFND" ;
            $this->error_msg = $e->getMessage() ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}


}
?>
