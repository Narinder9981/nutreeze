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

class SalesreportsController extends BaseController
{

    private $upload_doc_dir = "/bundles/design/uploads/about_us/";

    public function __construct()
    {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();

        $session = new Session();
        if(in_array($session->get('role_id'), [1, 5])){
            // allow - Superadmin, Accountant
        } else {
            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: ".$referer);exit;
        }
    }


    /**
     * @Route("/salesreport")
     * @Template()
     */
    public function indexAction()
    {

        $selected_filter_year = date("Y");
        if (isset($_POST['year_filter'])) {
            $selected_filter_year = $_POST['year_filter'];
        }
        
        $start_date_filter = $loop_start_filter = date($selected_filter_year . '-01-01');
        $end_date_filter = $loop_end_filter = date($selected_filter_year . '-12-31');

        $selected_filter_date = '';
        $selected_filter_date_obj = null;
        if (isset($_POST['date_filter'])) {
            $selected_filter_date = date('Y-m-d', strtotime($_POST['date_filter']));
            $selected_filter_first_date = date('Y-m-01', strtotime($_POST['date_filter']));


            $sql = "SELECT sum(payment_amount) as total_value ,count(*) as cnt FROM `order_master` where DATE_FORMAT(created_date, '%Y-%m-%d') = '{$selected_filter_date}' and is_deleted = 0 and order_status = 'success'";
            $salesOnThatDay = $this->firequery($sql);

            if(!empty($salesOnThatDay)){
                $selected_filter_date_obj['on_same_day'] = array(
                    'total_orders' => $salesOnThatDay[0]['cnt'],
                    'total_value' => $salesOnThatDay[0]['total_value']
                );
            }

            $sql = "SELECT sum(payment_amount) as total_value ,count(*) as cnt FROM `order_master` where DATE_FORMAT(created_date, '%Y-%m-%d') >= '{$selected_filter_first_date}' AND DATE_FORMAT(created_date, '%Y-%m-%d') <= '{$selected_filter_date}' and is_deleted = 0 and order_status = 'success'";
            $salesOnMonth = $this->firequery($sql);

            if(!empty($salesOnMonth)){
                $selected_filter_date_obj['of_that_month'] = array(
                    'total_orders' => $salesOnMonth[0]['cnt'],
                    'total_value' => $salesOnMonth[0]['total_value'],
                    'first_date_of_month' => $selected_filter_first_date
                );
            }
        }

        while ($loop_start_filter <= $end_date_filter) {
            $loop_end_filter =  date('Y-m-t', strtotime($loop_start_filter));
            // get packages in between year 
            //$sql = "SELECT sum(payment_amount) as total_value ,count(*) as cnt FROM `order_master` where start_date >= '".$loop_start_filter."' and end_date <= '".$loop_end_filter."' and is_deleted = 0 and order_status = 'success'";
            $sql = "SELECT sum(payment_amount) as total_value ,count(*) as cnt FROM `order_master` where created_date  >= '" . $loop_start_filter . "' and created_date <= '" . $loop_end_filter . "' and is_deleted = 0 and order_status = 'success'";



            $order_list = $this->fireQuery($sql);
            $month_array[] = array(
                "month" => date('F', strtotime($loop_start_filter)),
                "total_orders" => $order_list[0]['cnt'],
                "sales_value" =>  number_format((float) $order_list[0]['total_value'], 2, '.', '')
            );

            $loop_start_filter =  date('Y-m-d', strtotime("+1 months", strtotime($loop_start_filter)));
        }
        
        $year = [];
        for ($y = date("Y", strtotime(date('2014-01-01'))); $y <= date("Y"); $y++) {
            $year[] = (int) $y;
        }

        return array(
            "years" => $year,
            "month_array" => $month_array,
            "selected_filter_year" => $selected_filter_year,
            "start_date_filter" => $start_date_filter,
            "end_date_filter" => $end_date_filter,
            'selected_filter_date' => $selected_filter_date,
            'selected_filter_date_obj' => $selected_filter_date_obj
        );
    }

    /**
     * @Route("/salesreportv2")
     * @Template()
     */
    public function salesreportv2Action()
    {

        $selected_filter_year = date("Y");
        if (isset($_POST['year_filter'])) {
            $selected_filter_year = $_POST['year_filter'];
        }
        $start_date_filter = $loop_start_filter = date($selected_filter_year . '-01-01');
        $end_date_filter = $loop_end_filter = date($selected_filter_year . '-12-31');

        while ($loop_start_filter <= $end_date_filter) {
            $loop_end_filter =  date('Y-m-t', strtotime($loop_start_filter));
            // get packages in between year 
            $sql = "SELECT sum(payment_amount) as total_value ,count(*) as cnt FROM `order_master` where start_date >= '" . $loop_start_filter . "' and end_date <= '" . $loop_end_filter . "' and is_deleted = 0 and order_status = 'success'";
            $order_list = $this->fireQuery($sql);
            $month_array[] = array(
                "month" => date('F', strtotime($loop_start_filter)),
                "total_orders" => $order_list[0]['cnt'],
                "sales_value" =>  number_format((float) $order_list[0]['total_value'], 2, '.', '')
            );

            $loop_start_filter =  date('Y-m-d', strtotime("+1 months", strtotime($loop_start_filter)));
        }
        //      var_dump($month_array);exit;
        $year = [];
        for ($y = date("Y", strtotime(date('2014-01-01'))); $y <= date("Y"); $y++) {
            $year[] = (int) $y;
        }
        // var_dump($year);exit;
        return array(
            "years" => $year,
            "month_array" => $month_array,
            "selected_filter_year" => $selected_filter_year,
            "start_date_filter" => $start_date_filter,
            "end_date_filter" => $end_date_filter
        );
    }

    /**
     * @Route("/detailssalesreport/{month}/{selected_year}",defaults={"month"="0","selected_year"="0"})
     * @Template()
     */
    public function detailssalesreportAction($month, $selected_year)
    {

        $month_no = date('m', strtotime($month));

        $month_start_date = date("Y-m-01", strtotime($selected_year . "-" . $month_no . "-1"));
        $month_end_date = date("Y-m-t", strtotime($month_start_date));

        /*        $sql = "SELECT order_master.* , user_master.user_firstname,user_master.user_lastname,package_master.package_name  FROM `order_master` join user_master ON order_master.order_by = user_master.user_master_id  join package_master ON order_master.package_id = package_master.package_master_id where "
                . "(order_master.start_date >= '".$month_start_date."' and order_master.start_date <='".$month_end_date."') OR (order_master.end_date >= '".$month_start_date."' and order_master.end_date <='".$month_end_date."') and order_master.is_deleted = 0 and order_master.order_status = 'success'";*/
        $sql = "SELECT order_master.* , user_master.user_firstname,user_master.user_lastname,package_master.package_name  FROM `order_master` join user_master ON order_master.order_by = user_master.user_master_id  join package_master ON order_master.package_id = package_master.package_master_id where "
            . " ((order_master.start_date between '" . $month_start_date . "' and '" . $month_end_date . "' ) OR (order_master.end_date between '" . $month_start_date . "' and '" . $month_end_date . "'  ) ) and order_master.is_deleted = 0 and order_master.order_status = 'success'";
        //echo $sql ;exit;
        $package_for = "SELECT * FROM `package_for_master` where is_deleted = 0 GROUP by main_package_for_master_id";
        $package_for_list = $this->fireQuery($package_for);
        $package_forArray = [];
        if ($package_for_list) {
            foreach ($package_for_list as $pval) {
                $package_forArray[$pval['main_package_for_master_id']] = $pval['days'];
            }
        }
        $OrderList = $this->fireQuery($sql);
        $result_array = [];
        $total_sales_cost = 0;
        if ($OrderList) {
            foreach ($OrderList as $orkey => $orval) {
                $order_master_id = $orval['order_master_id'];

                $loop_start_date = $order_start_date = $package_start_date = $orval['start_date'];
                $loop_end_date = $order_end_date = $package_end_date = $orval['end_date'];
                $package_amount = $orval['package_amount'];
                $package_for = $orval['package_for'];
                $created_at = $orval['created_date'];
                $today_date = date("Y-m-d");
                $Active_days = 0;
                $package_days = $package_forArray[$package_for];
                $tdvalue = $package_amount / $package_days;
                $sql = "select days_master.days_name,days_master.main_days_master_id from order_off_days_relation
                    JOIN days_master ON days_master.main_days_master_id = order_off_days_relation.off_day
                    where order_off_days_relation.is_deleted = 0 and order_id = '$order_master_id' group by days_master.main_days_master_id";

                $offDays = $this->fireQuery($sql);
                $off_dayName = [];
                $order_suspend_history_sql = "select * from freeze_subpackage where order_id = '$order_master_id'  and is_deleted = 0 order by freeze_subpackage_id DESC";
                $suspendHistory = $this->fireQuery($order_suspend_history_sql);
                // get all days
                $days_idArr = [];
                $date_array = [];
                $All_days = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Daysmaster")->findBy(array("is_deleted" => 0, "language_id" => 1));
                if ($All_days) {
                    foreach ($All_days as $aval) {
                        $days_idArr[$aval->getDays_name()] = $aval->getMain_days_master_id();
                    }
                }
                foreach ($offDays as $okey => $oval) {
                    $off_dayName[] = $oval['days_name'];
                }
                while ($loop_start_date <= $loop_end_date) {
                    $day = date('l',  strtotime($loop_start_date));
                    $off_dayFlag = false;
                    $day_id =  0;
                    if (in_array($day, $off_dayName)) {
                        $off_dayFlag = true;
                    }
                    $suspend_flag = false;
                    if ($suspendHistory) {
                        foreach ($suspendHistory as $sval) {
                            if ($loop_start_date >= date("Y-m-d", strtotime($sval['start_date'])) && $loop_start_date <= date("Y-m-d", strtotime($sval['end_date']))) {
                                $suspend_flag = true;
                                break;
                            }
                        }
                    }
                    if ($off_dayFlag == false && $suspend_flag == false) {
                        $date_array[] = $loop_start_date;
                    }
                    $loop_start_date = date('Y-m-d', strtotime($loop_start_date . ' + 1 days'));
                }

                if (
                    strtotime($package_start_date) >= strtotime($month_start_date) &&
                    strtotime($package_start_date) <= strtotime($month_end_date)
                ) {
                    $datediff = strtotime($month_end_date) - strtotime($package_start_date);
                    $Active_days = 0; // round($datediff / (60 * 60 * 24));
                    // get 
                    $looppackage_start_date = $package_start_date;
                    $loopmonth_end_date = $month_end_date;

                    while (strtotime($looppackage_start_date) <= strtotime($loopmonth_end_date)) {



                        if (in_array($looppackage_start_date, $date_array)) {
                            $Active_days++;
                        }
                        $looppackage_start_date =  date('Y-m-d', strtotime($looppackage_start_date . ' + 1 days'));
                    }
                } elseif (
                    strtotime($package_end_date) >= strtotime($month_start_date) &&
                    strtotime($package_end_date) <= strtotime($month_end_date)
                ) {


                    $Active_days = 0; // round($datediff / (60 * 60 * 24));
                    $looppackage_end_date = $package_end_date;
                    $loopmonth_end_Date = $month_start_date;

                    while (strtotime($loopmonth_end_Date) <= strtotime($looppackage_end_date)) {

                        if (in_array($loopmonth_end_Date, $date_array)) {
                            $Active_days++;
                        }
                        $loopmonth_end_Date =  date('Y-m-d', strtotime($loopmonth_end_Date . ' + 1 days'));
                    }
                }
                $salesCost = $tdvalue * $Active_days;
                $total_sales_cost = $total_sales_cost + $salesCost;

                $result_array[] = array(
                    "user_name" => $orval['user_firstname'] . " " . $orval['user_lastname'],
                    "package_name" => $orval['package_name'],
                    "package_value" => $package_amount,
                    "active_days" => $Active_days,
                    "sales_cost" => number_format($salesCost, 3),
                    "created_at" => $created_at,
                    "package_start_date" => $package_start_date,
                    "package_end_date" => $package_end_date,

                );
            }
        }

        return array(
            "month" => $month,
            "selected_year" => $selected_year,
            "total_sales_cost" => number_format($total_sales_cost, 3),
            "result_array" => $result_array
        );
    }
}
