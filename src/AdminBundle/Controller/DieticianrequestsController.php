<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;

use AdminBundle\Entity\Dieticianrequest;

class DieticianrequestsController extends BaseController
{
	public function __construct()
    {
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
     * @Route("/dietician_requests")
     * @Template()
     */
    public function indexAction() {
        $languages = $this->getLanguages();
        $sql = "select dietician_requests.*,user_master.username from dietician_requests INNER JOIN user_master ON user_master.user_master_id = dietician_requests.user_id where dietician_requests.is_deleted = 0";
        $main_requests = $this->fireQuery($sql);
        $requests = null;
        //	print($sql);exit;
        if (!empty($main_requests)) {
            foreach ($main_requests as $request_) {               
				$requests[] = array(
					'dietician_request_id' => $request_['dietician_request_id'],
                    'username'=> $request_['username'],             
                    'gender'=> $request_['gender'],     
                    'height'=> $request_['height'],     
                    'weight'=> $request_['weight'],     
                    'waist'=> $request_['waist'],     
                    'goal'=> $request_['goal'],      
                    'appointment_date'=> $request_['appointment_date'],               
					'status' => $request_['status'],
                    'created_date' => $request_['created_date']
				);
                
            }
        }
        // echo '<pre>'; print_r($requests); die;
     
        return array(
            'requests' => $requests,
        );
    }
}
