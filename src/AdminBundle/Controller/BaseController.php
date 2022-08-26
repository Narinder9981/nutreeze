<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Mediamaster;
use AdminBundle\Entity\Gallery;
use AdminBundle\Entity\Languagemaster;
use AdminBundle\Entity\Medialibrarymaster;
use AdminBundle\Entity\Packagemaster;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;

use AdminBundle\Entity\Apppushnotificationmaster;
use AdminBundle\Entity\Apptypemaster;
use AdminBundle\Entity\Appdetails;

class BaseController extends Controller
{
    public $SELECT_MEAL_AFTER_DAYS = 3 ;
    
    public function __construct()
    {
        
    }
    /**
     * @Route("/chksession")
     * @Template()
     */
    function chksessionAction()
    {
        $session = new Session();
        if($session->get('user_id') == '' && $session->get('role_id') == '' && $session->get('email_address') == '')
        {
            $hostname = $_SERVER["SERVER_NAME"];
            echo '<script>window.location="';
            echo 'http://'.$hostname;
            echo '"</script>';
            exit;
        }
    }
    
    public function getRefererUrl(){
        $referer = '';
        if(isset($_SERVER['HTTP_REFERER'])){
            $referer = $_SERVER['HTTP_REFERER'];
        } else {
            $referer = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['BASE'].'/dashboard';
        }

        return $referer;
    }
    
    /**
     * @Route("/fireQuery")
     * @Template()
     */
    function fireQuery($query)
    {
        $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();   
    }
  
   /**
     * @Route("/fireupdateQuery")
     * @Template()
     */
    function fireupdateQuery($query)
    {
        $stmt = $this->getDoctrine()->getManager()->getConnection()->prepare($query);
        $stmt->execute();
        return true; //$stmt->fetchAll();   
    }

    public function weekOfMonth($date) {
        //Get the first day of the month.
        $firstOfMonth = strtotime(date("Y-m-01", $date));
        //Apply above formula.
        return $this->weekOfYear($date) - $this->weekOfYear($firstOfMonth) + 1;
    }

    public function weekOfYear($date) {
        $weekOfYear = intval(date("W", $date));
        if (date('n', $date) == "1" && $weekOfYear > 51) {
            // It's the last week of the previos year.
            $weekOfYear = 0;    
        }
        return $weekOfYear;
    }

    
    /**
     * @Route("/getLanguages")
     * @Template()
     */
    function getLanguages()
    {
        $languages = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Languagemaster")->findBy(array('is_deleted'=>0));
        return $languages;  
    }

    /*
      get GCM user device / @param int $user_id / @return mixed
     */

    public function find_gcm_regid($user_id) {

        if (is_array($user_id)) {
            $user_id = implode(",", $user_id);
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $query = "SELECT * FROM gcm_user WHERE user_id in ('" . $user_id . "') and user_type='user' and gcm_regid NOT LIKE ''  and is_deleted = 0";



        $gcm_user = $connection->prepare($query);
        $gcm_user->execute();
        $gcm_user_list = $gcm_user->fetchAll();
        //user_type = 'user' and
        if (count($gcm_user_list) > 0) {
            $reg_ids = array_map(function($sub) {
                return $sub['gcm_regid'];
            }, $gcm_user_list);
            return $reg_ids;
        }
        return false;
    }

    /*
      get APNS user device / @param int $user_id / @return mixed
     */

    public function find_apns_regid($user_id) {

        if (is_array($user_id)) {
            $user_id = implode(",", $user_id);
        }

        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $apns_user = $connection->prepare("SELECT * FROM apns_user WHERE user_id in (" . $user_id . ") and apns_regid NOT LIKE '(null)' and apns_regid NOT LIKE '' and user_type='user' and  is_deleted=0");
        
        $apns_user->execute();
        $apns_user_list = $apns_user->fetchAll();


        if (count($apns_user_list) > 0) {
            $reg_ids = array_map(function($sub) {
                return $sub['apns_regid'];
            }, $apns_user_list);
            return $reg_ids;
        }
        return false;
    }
    
    public function send_notification($registration_ids, $title, $message, $provider, $app_id, $domain_id, $tablename, $tabledataid) {
        //$date_t = strtotime(date("y-m-d H:i:s"));
        ob_start();
        /*
          $app_id= CUST // Customer App
          $app_id = DEL // Delivery App
          $domain_id = domain_code
         */


        switch ($provider) {
            case 1:
                $result = "FALSE";
                $development = false;
                $apns_url = NULL; // Set Later
                $pathCk = NULL; // Set Later
                $apns_port = 2195;


                $app_type_master = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AdminBundle:Apptypemaster')
                        ->findOneBy(array('is_deleted' => 0, 'app_type_code' => $app_id));


                if (!empty($app_type_master)) {
                
                    $app_details = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('AdminBundle:Appdetails')
                            ->findOneBy(array('is_deleted' => 0, 'app_type_id' => $app_type_master->getApp_type_id(), "domain_id" => $domain_id, "status" => 'active'));

                    if (!empty($app_details)) {
                        if ($development) {

                            if (!empty($app_details->getApp_apns_certificate_development()) && $app_details->getApp_apns_certificate_development() != "" && !empty($app_details->getApp_apns_certificate_development_password()) && $app_details->getApp_apns_certificate_development_password() != "") {

                                $apns_url = 'gateway.sandbox.push.apple.com';

                                $pathCk = $this->container->get('kernel')->locateResource('@WSBundle/Controller/' . $app_details->getApp_apns_certificate_development());
                                $passphrase = $app_details->getApp_apns_certificate_development_password();
                            }
                        } else {
                            if (!empty($app_details->getApp_apns_certificate_production()) && $app_details->getApp_apns_certificate_production() != "" && !empty($app_details->getApp_apns_certificate_production_password()) && $app_details->getApp_apns_certificate_production_password() != "") {
                                $apns_url = 'gateway.push.apple.com';

                                $pathCk = $this->container->get('kernel')->locateResource('@WSBundle/Controller/' . $app_details->getApp_apns_certificate_production());
                                $passphrase = $app_details->getApp_apns_certificate_production_password();
                            }
                        }
                    }
                }

                if (!empty($apns_url) && $apns_url != "") {
                    /*
                      $ctx = stream_context_create();
                      stream_context_set_option($ctx, 'ssl', 'local_cert', $pathCk);
                      stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                      $apns = stream_socket_client(
                      'ssl://' . $apns_url . ':' . $apns_port, $err,
                      $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
                     */
                    $data = json_decode($message);
                    $response = $response1 = "";
                    /*
                     * $payload['aps'] = array(
                      'alert' => $data->detail,
                      'badge' => 1,
                      'sound' => 'default',
                      'response'=>$data->response
                      );
                     */
                    $code = 1 ;
                    if(isset($data->code)){
                        $code = $data->code;
                    }
                    $detail =  $response =  '' ;
                    if(isset($data->detail)){
                        $detail = $data->detail;
                    }
                    $payload['job_id'] =  $code;
                    
                    if(isset($data->response)){
                        $response = print_r($data->response, 1);    
                    }
                    

                    // START LOOP
                    if ($registration_ids != "ALL") {
                        unset($where);
                        if (is_array($registration_ids)) {
                            $registration_ids = implode("','", $registration_ids);
                        }

                        $em = $this->getDoctrine()->getManager();

                        $connection = $em->getConnection();
                        $apns_user = $connection->prepare("SELECT * FROM apns_user WHERE apns_regid in ('" . $registration_ids . "') and is_deleted=0");

                        $apns_user->execute();
                        $apns_user_list = $apns_user->fetchAll();

                        // specific user

                        $em = $this->getDoctrine()->getManager();
                        $connection = $em->getConnection();
                        $statement = $connection->prepare("UPDATE apns_user SET badge=(badge+1) WHERE apns_regid in ('" . $registration_ids . "') and is_deleted=0");
                        $statement->execute();
                    } else {
                        // All user
                        $em = $this->getDoctrine()->getManager();
                        $connection = $em->getConnection();
                        $statement = $connection->prepare("UPDATE apns_user SET badge = (badge+1) WHERE  is_deleted=0");
                        $statement->execute();
                    }
                    $result = "";
                    //$res_arr = array();
                    $ctx = stream_context_create();
                    stream_context_set_option($ctx, 'ssl', 'local_cert', $pathCk);
                    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                    $apns = @stream_socket_client(
                            'ssl://' . $apns_url . ':' . $apns_port, $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                    @stream_set_blocking($apns, 0);

                    foreach (array_slice($apns_user_list, 0) as $key => $val) {
                        if ($key == "50" || $key == "100" || $key == "250" || $key == "500" || $key == "750" || $key == "1000" || $key == "1250" || $key == "1500" || $key == "1750" ||
                                $key == "2000" || $key == "2250" || $key == "2500" || $key == "2750" || $key == "3000" || $key == "3250" ||
                                $key == "3500" || $key == "3750" || $key == "4000") {
                            ob_flush();
                            flush();
                        }
                        $device = $val['apns_regid'];

                        //$final_payload = json_encode($payload);
                        if (strlen($device) == 64) {
                            if (!$apns) {
                              //  echo "Failed to connect (stream_socket_client): $err $errstr";
                                $result = "Failed to connect";// : @$error @$errorString " . PHP_EOL;
                                $ctx = @stream_context_create();
                                @stream_context_set_option($ctx, 'ssl', 'local_cert', $pathCk);
                                @stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                                $apns = @stream_socket_client(
                                        'ssl://' . $apns_url . ':' . $apns_port, $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                                @stream_set_blocking($apns, 0);
                            } else {
                                
                                //$data->detail,
                                
                                $payload['aps'] = array(
                                    'alert' => array('title' => 'test', 'body' => $data->detail),
                                    'badge' => 1,
                                    'sound' => 'default',
                                    'response' => $data->response
                                );

                                $final_payload = json_encode($payload);

                                $apnsMessage = chr(0) . pack('n', 32) . pack('H*', str_replace(' ', '', $device)) . pack('n', strlen($final_payload)) . $final_payload;
                                $result = '';

                                try {
                                    $result = fwrite($apns, $apnsMessage);
                                } catch (\Exception $e) {
                                    @fclose($apns);
                                    $result = $e->getMessage();
                                    echo('<br>Error sending Device: ' . $device );
                                    echo('<br>Error sending payload: ' . $e->getMessage());


                                    $ctx = stream_context_create();
                                    stream_context_set_option($ctx, 'ssl', 'local_cert', $pathCk);
                                    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                                    $apns = stream_socket_client(
                                            'ssl://' . $apns_url . ':' . $apns_port, $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                                    stream_set_blocking($apns, 0);
                                }
                                //write log start
                                $txtf = "iphone_push_file.txt";
                                if (!file_exists($txtf)) {
                                    fopen($txtf, 'w');
                                }
                                //-----write file to track error---------
                                // Open the file to get existing content
                                $current = file_get_contents($txtf);
                                // Append a new person to the file
                                $current .= "\nAPNS :- " . $val['apns_regid'] . "====>" . $result;
                                // Write the contents back to the file
                                file_put_contents($txtf, $current);

                                unset($payload);
                                unset($statement);
                                unset($final_payload);
                                unset($apnsMessage);
                                $result = $device = '';
                            }
                            // END LOOP
                        }
                    }

                    foreach (array_slice($apns_user_list, 0) as $key => $val) {
                        $device = $val['apns_regid'];
                        $apppushnotificationmaster = new Apppushnotificationmaster();
                        $apppushnotificationmaster->setDevice_name('ios');
                        $apppushnotificationmaster->setApp_id($app_id);
                        $apppushnotificationmaster->setDomain_id($domain_id);
                        $apppushnotificationmaster->setDevice_token($device);

                        $connection = $em->getConnection();
                        $apns_query = $connection->prepare("SELECT * FROM apns_user WHERE apns_regid = '" . $device . "' and is_deleted=0 ORDER BY apns_user_id DESC");
                        $apns_query->execute();
                        $apns_user = $apns_query->fetchAll();
                        $user_id = '';
                        if (!empty($apns_user)) {
                            $user_id = $apns_user[0]['user_id'];
                            $device_id = $apns_user[0]['device_id'];

                            $em = $this->getDoctrine()->getManager();
//                            $user_setting = $em->getRepository('AdminBundle:Usersetting')->findOneBy(array("user_id" => $user_id, "is_deleted" => 0));
//
//                            $value = json_decode($user_setting->getSetting_value(), true);

                            $lang_id = 1;

                            $apppushnotificationmaster->setUser_id($user_id);
                            $apppushnotificationmaster->setLanguage_id($lang_id);
                            $apppushnotificationmaster->setDevice_id($device_id);
                        }

                        $apppushnotificationmaster->setData($detail);
                        $apppushnotificationmaster->setCode($code);
                        $apppushnotificationmaster->setTable_name($tablename);
                        $apppushnotificationmaster->setTable_id($tabledataid);
                        $apppushnotificationmaster->setResponse($response);
                        $apppushnotificationmaster->setDatetime(date("Y-m-d H:i:s"));
                        $apppushnotificationmaster->setIs_deleted(0);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($apppushnotificationmaster);
                        $em->flush();
                    }

                    // END LOOP


                    @fclose($apns);
                    unset($apns_user_list);
                }

                break;

            case 2:

                $result = "FALSE";
                $title_name = $title;
                $data = array("title" => $title_name, "message" => $message);
                //$URL = 'https://android.googleapis.com/gcm/send';
                $URL = 'https://fcm.googleapis.com/fcm/send';

                $fields = array(
                    'registration_ids' => $registration_ids,
                    'data' => $data,
                );
                
//              return $fields;
                $app_type_master = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AdminBundle:Apptypemaster')
                        ->findOneBy(array('is_deleted' => 0, 'app_type_code' => $app_id));

                if (!empty($app_type_master)) {
                    $app_details = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('AdminBundle:Appdetails')
                            ->findOneBy(array('is_deleted' => 0, 'app_type_id' => $app_type_master->getApp_type_id(), "domain_id" => 1, "status" => 'active'));

                    if (!empty($app_details)) {
                      
                        if (!empty($app_details->getApp_gcm_key()) && $app_details->getApp_gcm_key() != "") {
                            
                            $headers = array(
                                'Authorization: key=' . $app_details->getApp_gcm_key(),
                                'Content-Type: application/json'
                            );

                            $data1 = json_decode($message);
                            $response = "";
                            if (isset($data1->response) && !empty($data1->response)) {
                                $response = print_r($data1->response, 1);
                            } else {
                                $response = "";
                            }

                            $code = "";
                            if (isset($data1->code) && !empty($data1->code)) {
                                $code = $data1->code;
                            } else {
                                $code = "";
                            }

                            $registration_ids_array = $registration_ids;
                            if (is_array($registration_ids)) {
                                $registration_ids = implode("','", $registration_ids);
                            } else {
                                $registration_ids = "";
                            }

                            $detail = "";
                            if (isset($data1->detail) && !empty($data1->detail)) {
                                $detail = $data1->detail;
                            } else {
                                $detail = "";
                            }
                            $em = $this->getDoctrine()->getManager();
                            //$registration_ids_array = '';

                            if (!empty($registration_ids_array)) {
                                foreach ($registration_ids_array as $val) {

                                    $apppushnotificationmaster = new Apppushnotificationmaster();
                                    $apppushnotificationmaster->setDevice_name('android');
                                    $apppushnotificationmaster->setApp_id($app_id);
                                    $apppushnotificationmaster->setDomain_id($domain_id);
                                    $apppushnotificationmaster->setDevice_token($val);

                                    $connection = $em->getConnection();
                                    $gcm = $connection->prepare("SELECT * FROM gcm_user WHERE gcm_regid = '" . $val . "' and is_deleted=0 ORDER BY gcm_user_id DESC");
                                    $gcm->execute();
                                    $gcm_user = $gcm->fetchAll();
                                    if (!empty($gcm_user)) {
                                        $user_id = $gcm_user[0]['user_id'];
                                        $device_id = $gcm_user[0]['device_id'];

                                       

                                        $apppushnotificationmaster->setUser_id($user_id);
                                        $apppushnotificationmaster->setLanguage_id(1);
                                        $apppushnotificationmaster->setDevice_id($device_id);
                                    }

                                    $apppushnotificationmaster->setData($detail);
                                    $apppushnotificationmaster->setCode($code);
                                    $apppushnotificationmaster->setTable_name($tablename);
                                    $apppushnotificationmaster->setTable_id($tabledataid);
                                    $apppushnotificationmaster->setResponse($response);
                                    $apppushnotificationmaster->setDatetime(date("Y-m-d H:i:s"));
                                    $apppushnotificationmaster->setIs_deleted(0);
                                    $em = $this->getDoctrine()->getManager();
                                    $em->persist($apppushnotificationmaster);
                                    $em->flush();
                                    
                                    $notification = array(
                                           'body' => $detail,
                                           'title' => $title,
                                           'icon' => 'ic_launcher'
                                       );

                                    $base_json_data = array(
                                        'to' => $val,
                                        'data' => $notification
                                    );

                                    $fields_json = json_encode($base_json_data);
                                     // Open connection
                                    $ch = curl_init();
                                    // Set the url, number of POST vars, POST data
                                    curl_setopt($ch, CURLOPT_URL, $URL);
                                    curl_setopt($ch, CURLOPT_POST, true);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    // Disabling SSL Certificate support temporarly
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_json);
                                    $txtf = "android_push_file.txt";
                                    if (!file_exists($txtf)) {
                                        fopen($txtf, 'w');
                                    }
                                    //-----write file to track error---------
                                    // Open the file to get existing content
                                    $current = file_get_contents($txtf);
                                    // Append a new person to the file
                                    $current .= http_build_query($fields);
                                    // Write the contents back to the file
                                    file_put_contents($txtf, $current);
                                    // Execute post
                                    $result = curl_exec($ch);
                                    if ($result === FALSE) {
                                        die('Curl failed: ' . curl_error($ch));
                                        $logger->error('GCM Curl failed: !!');
                                    }
                                        // Close connection
                                    curl_close($ch);
                                   
                                }
                            }
//                            // Open connection
//                            $ch = curl_init();
//
//                            // Set the url, number of POST vars, POST data
//                            curl_setopt($ch, CURLOPT_URL, $URL);
//                            curl_setopt($ch, CURLOPT_POST, true);
//                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//                            // Disabling SSL Certificate support temporarly
//                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//                            $txtf = "android_push_file.txt";
//                            if (!file_exists($txtf)) {
//                                fopen($txtf, 'w');
//                            }
//                            //-----write file to track error---------
//                            // Open the file to get existing content
//                            $current = file_get_contents($txtf);
//                            // Append a new person to the file
//                            $current .= http_build_query($fields);
//                            // Write the contents back to the file
//                            file_put_contents($txtf, $current);
//
//                            // Execute post
//
//
//                            $result = curl_exec($ch);
//                          
////    ini_set('xdebug.var_display_max_depth', 5); ini_set('xdebug.var_display_max_children', 256); ini_set('xdebug.var_display_max_data', 1024);
//
//                          
////                            print_r($result);exit;
//                            if ($result === FALSE) {
//                                die('Curl failed: ' . curl_error($ch));
//                            }
//                            // Close connection
//                            curl_close($ch);
                        }
                    }
                }

                break;
        }

        return $result;
    }
    
     /**
     * @Route("/mediaupload")
     * @Template()
     */
    function mediauploadAction($file,$tmpname,$path,$upload_dir,$media_type_id=1)
    {
        $clean_image = preg_replace('/\s+/', '', $file);
        $logo_name = date('Y_m_d_H_i_s').'_'.$clean_image;
        if(!file_exists($upload_dir)){
            mkdir($upload_dir,0777);
        }
        //logo upload check
        if(move_uploaded_file($tmpname,$upload_dir.$logo_name))
        {
            $mediamaster = new Medialibrarymaster();

            $mediamaster->setMedia_title($logo_name);

            $mediamaster->setMedia_type_id($media_type_id);
            $mediamaster->setMedia_location($path);
            $mediamaster->setMedia_name($logo_name);
            $mediamaster->setMedia_title($logo_name);
            $mediamaster->setCreated_on(date("Y-m-d H:i:s"));
            $mediamaster->setIs_deleted(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($mediamaster);
            $em->flush();
            $media_master_id = $mediamaster->getMedia_library_master_id();
            return $media_master_id;
        }
        else
        {
            return FALSE;
        }
    }
   
    /**
     * @Route("/getmedia")
     */
    function getmediaAction($media_id)
    {
        $live_path = $this->container->getParameter('live_path');
        #default image
        $img_url = $live_path."/bundles/design/images/no_img.png";
        $media_master = $this->getDoctrine()
                ->getManager()
                ->getRepository("AdminBundle:Medialibrarymaster")
                ->findOneBy(array('media_library_master_id'=>$media_id,'is_deleted'=>0));
        if($media_master){
            $img_url = $live_path."".$media_master->getMedia_location()."/".$media_master->getMedia_name();
        }   
        return $img_url;
    }
    /**
     * @Route("/getLoyalitypoint")
     */
    function getLoyalitypointAction($user_id){
        $sql_combo = "SELECT *,sum(package_master.loyality_point) as point FROM order_master JOIN package_master ON order_master.package_id=package_master.package_master_id WHERE order_master.order_by='$user_id' AND order_master.is_deleted=0 AND order_master.end_date>='".date('Y-m-d')."'";
        $sub_package = $this->fireQuery($sql_combo);
        if($sub_package){
            $point = $sub_package[0]['point'];
        }   
        return $point;
    }
    
    public function getPackageAddonsAction($package_id,$package_for_id,$type,$language_id =1){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $query = "SELECT * FROM package_for_master pfm JOIN package_for_relation pfr ON pfm.main_package_for_master_id=pfr.main_package_for_id WHERE pfm.is_deleted=0 and pfr.is_deleted=0 and pfm.type='$type' and pfr.main_package_id='$package_id' and pfm.language_id='$language_id' and main_package_for_master_id = '$package_for_id' group by main_package_for_master_id";
        $statement = $connection->prepare($query);              
        $statement->execute();
        $package_info = $statement->fetchAll();
        $response=null;
        if(!empty($package_info)){
            foreach($package_info as $key=>$val){
                $response=array('package_for_id'=>$val['main_package_for_master_id'],'package_for_name'=>$val['name'],'package_for_price'=>$val['price']);
            }
        }
        return $response;
    }   
   


}
