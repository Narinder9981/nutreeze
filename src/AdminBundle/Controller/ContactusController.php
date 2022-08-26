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

class ContactusController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();

        $session = new Session();
        if (in_array($session->get('role_id'), [1, 4, 6, 7])) {
            // allow - Superadmin, Accountant, Customer Service, Supervisor
        } else {

            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: " . $referer);
            exit;
        }
    }

    /**
     * @Route("/contact_us")
     * @Template()
     */
    public function indexAction() {
        $contact_feedbacks = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Contactusfeedback")->findBy(array('is_deleted' => 0), array('created_date' => 'DESC'));

        return array('contact_feedbacks' => $contact_feedbacks);
    }

    /**
     * @Route("/settings")
     * @Template()
     */
    public function settingsAction() {
        $con = $this->getDoctrine()->getManager()->getConnection();

        $sql = "SELECT * FROM `general_setting` where general_setting_key = 'app_info' and is_deleted = 0";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $settings = $stmt->fetchAll();
        
        $contactSettingsData = null;
        if ($settings) {
            foreach ($settings as $key => $val) {
                $appdata = json_decode($val['general_setting_value']);
                if (!empty($appdata)) {
                    $contactSettingsData = array(
                        'facebook_link' => $appdata[0]->data->facebook_link, 
                        'twitter_link' => $appdata[0]->data->twitter_link, 
                        'google_link' => $appdata[0]->data->google_link, 
                        'linkedin_link' => $appdata[0]->data->linkedin_link,
                        'whatsapp_link' => $appdata[0]->data->whatsapp_link,
                        'whatsapp_number' => $appdata[0]->data->whatsapp_number);
                }
            }           
        }
      
        return array('contactSettingsData' => $contactSettingsData);
    }

    /**
     * @Route("/savesettings",defaults={})
     * @Template()
     */
    public function savesettingsAction(Request $req) {
        $em = $this->getDoctrine()->getManager();
        $language_id = 1 ;
        $facebook =  $_REQUEST['facebook'];
        $twitter =  $_REQUEST['twitter'];
        $google =  $_REQUEST['google'];
        $linkedin =  $_REQUEST['linkedin'];
        $whatsapp =  $_REQUEST['whatsapp'];
        $whatsappnumber =  $_REQUEST['whatsappnumber'];
      
        $updated_data[] = array(
            "language_id"=>$language_id,
            "data"=>array(
                    "address"=>"",
                    "email"=>"email@gmail.com",
                    "phone_no"=>"1231231231",
                    "facebook_link"=>$facebook,
                    "twitter_link"=>$twitter,
                    "google_link"=>$google,
                    "linkedin_link"=>$linkedin,
                    "whatsapp_link"=>$whatsapp,
                    "whatsapp_number"=>$whatsappnumber                
                )
        ); 
        $json_updated_data = json_encode($updated_data);
        $con = $this->getDoctrine()->getManager()->getConnection();

        $sql = "Update `general_setting` SET general_setting_value = '".$json_updated_data."' where general_setting_key = 'app_info' and is_deleted = 0";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $this->get('session')->getFlashBag()->set('success_msg', 'Setting updated Succesfully');
        return $this->redirectToRoute('admin_contactus_settings');
    }
    /**
     * @Route("/deleteContactUS/{contact_id}",defaults={"contact_id" = "0"})
     * @Template()
     */
    public function deletecontactAction($contact_id) {

        $entity = $this->getDoctrine()->getManager();
        $entity->getConnection()->beginTransaction();

        $response = array();
        $domain_id = $this->get('session')->get('domain_id');

        $contact_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Contactusfeedback")->findBy(array(
            'contact_us_feedback_id' => $contact_id,
            'is_deleted' => 0
                )
        );

        if ($contact_check) {
            foreach ($contact_check as $contact_check) {
                $contact_check->setIs_deleted(1);
                $entity->flush();
            }

            $this->get('session')->getFlashBag()->set('success_msg', 'Contacted feedback deleted Succesfully');
        }


        // manual commit
        $entity->getConnection()->commit();
        $entity->clear();

        return $this->redirectToRoute('admin_contactus_index');
    }

}
