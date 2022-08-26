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
use AdminBundle\Entity\Aboutus;

class PauseuserreportsController extends BaseController {

    private $upload_doc_dir = "/bundles/design/uploads/about_us/";

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
     * @Route("/pausereports/{flag_type}/{filter_date_selected}",defaults={"flag_type"="0","filter_date_selected"="0"})
     * @Template()
     */
    public function pausereportsAction($flag_type, $filter_date_selected) {

        $domain_id = 1;
        $languages = $this->getLanguages();
        $live_path = $this->container->getParameter('live_path');
        if (isset($_POST['date_filter'])) {
            $filter_date = $_POST['date_filter'];
        } else {
            $filter_date = $filter_date_selected;
            if ($filter_date_selected == '0') {
                $filter_date = date("Y-m-d");
            }
        }
        $timestamp = strtotime($filter_date);
        $filter_day = date('D', $timestamp);
        $filter_day_number = date('N', strtotime($filter_day));

        $_toDay = date('Y-m-d');

        $dateWiseQuery_package_nt_start_coun = "SELECT pause_package.* , user_master.user_firstname , user_master.user_lastname ,  user_master.user_mobile , user_master.unique_user_id , order_master.unique_no FROM `pause_package` join user_master on pause_package.user_id = user_master.user_master_id join order_master on pause_package.order_id = order_master.order_master_id WHERE pause_package.is_deleted = 0 and DATE(pause_package.`pause_start_date`) >= '{$filter_date}' and  DATE(pause_package.`pause_end_date`) <= '{$filter_date}'  and order_master.pause_status = 'yes'";
        $dateWiseData_dateWiseQuery_package_nt_start = $this->fireQuery($dateWiseQuery_package_nt_start_coun);
        $pause_user_package_nt_start_count = count($dateWiseData_dateWiseQuery_package_nt_start);



        $dateWiseQuery = "SELECT pause_package.* , user_master.user_firstname , user_master.user_lastname , user_master.user_mobile , user_master.unique_user_id , order_master.unique_no FROM `pause_package` join user_master on pause_package.user_id = user_master.user_master_id join order_master on pause_package.order_id = order_master.order_master_id WHERE pause_package.is_deleted = 0 and DATE(pause_package.`pause_start_date`) >= '{$filter_date}' and ( DATE(pause_package.`pause_end_date`) <= '{$filter_date}' OR DATE(pause_package.`pause_end_date`) is NULL )";
        $dateWiseDatapauseusers = $this->fireQuery($dateWiseQuery);
        $pause_user_count = count($dateWiseDatapauseusers);

        $dateWiseData = NULL ;
        if($flag_type == 'pause_users'){
           
            $dateWiseData = $dateWiseDatapauseusers ;
        }
        elseif($flag_type == 'active_not_start_users'){
            
            $dateWiseData = $dateWiseData_dateWiseQuery_package_nt_start ;
            
        }
      
        

        

        return array(
            'flag_type' => $flag_type, 
            'filter_date' => $filter_date, 
            'pause_user_count' => $pause_user_count,           
            'pause_user_package_nt_start_count' => $pause_user_package_nt_start_count,           
        
            "order_data" => $dateWiseData
        );
    }
}
