<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;

use AdminBundle\Entity\Countrymaster;
use AdminBundle\Entity\Productcategorymaster;

class RatingsController extends BaseController
{
	public function __construct() {
        parent::__construct();
        $obj = new BaseController();
		$obj->chksessionAction();
		
		$session = new Session();
        if(in_array($session->get('role_id'), [1])){
            // allow - Superadmin
        } else {
            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }
	
    /**
     * @Route("/rating/list/{product_id}",defaults={"product_id"="0"})
     * @Template()
     */
    public function indexAction($product_id)
    {
		$product_where = '';	
		if($product_id != 0){
			$product_where = " AND product_rating_master.main_product_id = '$product_id' ";
		}
		$ratings_list_sql = "select 
						product_rating_master.created_datetime,product_rating_master.ratings,product_rating_master.product_rating_master_id,CONCAT(user_master.user_firstname,' ',user_master.user_lastname) as full_name,product_master.product_name
						from product_rating_master 
						JOIN user_master ON user_master.user_master_id = product_rating_master.user_master_id 
						JOIN product_master ON product_master.main_product_master_id = product_rating_master.main_product_id  
						where product_rating_master.is_deleted = 0 $product_where group by product_rating_master.product_rating_master_id order by product_rating_master.product_rating_master_id DESC ";
		$ratings = $this->fireQuery($ratings_list_sql);

//		echo"<pre>";print_r($ratings);exit;
		return array('ratings'=>$ratings,'product_id'=>$product_id);
    }
	
	
    /**
     * @Route("/ratings/deteleRating/{ratings_id}",defaults={"ratings_id"="0"})
     * @Template()
     */
    public function deteleRatingAction($ratings_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$rating = $em->getRepository("AdminBundle:Productratingmaster")->find($ratings_id);
		if($rating){
			$rating->setIs_deleted(1);
			$em->flush();
		}
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);
	}		
	
}
