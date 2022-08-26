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
use AdminBundle\Entity\Ordernotemaster;
use AdminBundle\Entity\Productcategorymaster;
use AdminBundle\Entity\Productcategorypackagerelation;

class OrdernoteController extends BaseController {

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
     * @Route("/ordernote")
     * @Template()
     */
    public function indexAction() {
        $languages = $this->getLanguages();
        $meal_details_all = array();

        $con = $this->getDoctrine()->getManager()->getConnection();

        $main_meals_sql = "select main_order_note_id  from order_note_master where is_deleted = 0 group by main_order_note_id";
        $stmt = $con->prepare($main_meals_sql);
        $stmt->execute();
        $main_meals = $stmt->fetchAll();

//		echo"<pre>";print_r($main_city);exit;
        if (!empty($main_meals)) {

            foreach ($main_meals as $meal) {
                $lang_wise = array();
                $main_order_note_id = $meal['main_order_note_id'];

                if (!empty($languages)) {
                    foreach ($languages as $lang) {
                        $meal_sql = "select * from order_note_master where is_deleted = 0 and language_id = " . $lang->getLanguage_master_id() . " and main_order_note_id = " . $main_order_note_id;
                        $stmt = $con->prepare($meal_sql);
                        $stmt->execute();
                        $meal_details = $stmt->fetchAll();

                        if (!empty($meal_details)) {
                            $lang_wise [] = array('lang_id' => $lang->getLanguage_master_id(), 'order_note_text' => $meal_details[0]['order_note_text']);
                        } else {
                            $lang_wise [] = array('lang_id' => $lang->getLanguage_master_id(), 'order_note_text' => '-');
                        }
                    }
                }

                $meal_details_all[] = array(
                    'main_order_note_id' => $main_order_note_id,                    
                    'lang_wise' => $lang_wise,
                );
            }
        }
//		echo"<pre>";print_r($meal_details_all);exit;
        return array('order_notes_list' => $meal_details_all, 'language_list' => $languages);
    }

    /**
     * @Route("/addOrdernote/{ordernote_id}",defaults={"ordernote_id"="0"})
     * @Template()
     */
    public function addordernoteAction($ordernote_id) {
        $languages = $this->getLanguages();

        $con = $this->getDoctrine()->getManager()->getConnection();

        $main_meal_sql = "select * from order_note_master where is_deleted = 0  and main_order_note_id=".$ordernote_id ;
        $stmt = $con->prepare($main_meal_sql);
        $stmt->execute();
        $meal = $stmt->fetchAll();

       
        
//		echo"<pre>";print($main_city_sql);exit;
        return array('ordernote' => $meal,'language_list' => $languages);
    }

    /**
     * @Route("/saveordernote")
     * @Template()
     */
    public function saveordernoteAction(Request $req) {

        // begin transaction and suspend auto commit
        $entity = $this->getDoctrine()->getManager();
       

        $response = array();
        $domain_id = 1;

        $languages = $this->getLanguages();

        if ($req->request->get('submit') != NULL) {

            $lang_id = $req->request->get('language_id');           
            $main_order_note_id = $req->request->get('main_order_note_id');
            $order_note_text = $req->request->get('order_note_text');

            $meal_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordernotemaster")->findOneBy(array(
                'language_id' => $lang_id,
                'main_order_note_id' => $main_order_note_id,
                'is_deleted' => 0
                    )
            );
            if ($meal_check) {
                $meal_check->setOrder_note_text($order_note_text);
                $entity->flush();
                $this->get('session')->getFlashBag()->set('success_msg', 'Order note updated Succesfully');
            } else {
                if($main_order_note_id == 0){
                    if ($languages) {
                        foreach ($languages as $_languages) {
                            $new_meal_type = new Ordernotemaster();
                            $new_meal_type->setOrder_note_text($order_note_text);
                            $new_meal_type->setLanguage_id($_languages->getLanguage_master_id());                      
                            $new_meal_type->setIs_deleted(0); 
                            $new_meal_type->setMain_order_note_id($main_order_note_id);                       
                            $entity->persist($new_meal_type);
                            $entity->flush();
                            if ($main_order_note_id == 0) {
                                $main_order_note_id = $new_meal_type->getOrder_note_master_id();
                                $new_meal_type->setMain_order_note_id($main_order_note_id);
                                $entity->flush();
                            }
                        }
                    }
                }
                else{
                    $new_meal_type = new Ordernotemaster();
                    $new_meal_type->setOrder_note_text($order_note_text);
                    $new_meal_type->setLanguage_id($lang_id);                      
                    $new_meal_type->setIs_deleted(0);    
                    $new_meal_type->setMain_order_note_id($main_order_note_id);                    
                    $entity->persist($new_meal_type);
                    $entity->flush();
                    
                }
                

                $this->get('session')->getFlashBag()->set('success_msg', 'Order note added Succesfully');
            }

            // manual commit
          

            return $this->redirectToRoute('admin_ordernote_index', array('domain' => $this->get('session')->get('domain')));
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_dashboard_index', array('domain' => $this->get('session')->get('domain')));
        }
    }

    /**
     * @Route("/deleteordernote/{ordernote_id}",defaults={"ordernote_id" = "0"})
     * @Template()
     */
    public function deleteordernoteAction($ordernote_id) {

        $entity = $this->getDoctrine()->getManager();
        $entity->getConnection()->beginTransaction();

        $response = array();
        $domain_id = 1;

        $meal_type = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ordernotemaster")->findBy(array(
            'main_order_note_id' => $ordernote_id,
            'is_deleted' => 0
                )
        );

        if ($meal_type) {
            foreach ($meal_type as $meal_type) {
                $meal_type->setIs_deleted(1);
                $entity->flush();
            }

            $this->get('session')->getFlashBag()->set('success_msg', 'Order note deleted Succesfully');
        }


        // manual commit
        $entity->getConnection()->commit();
        $entity->clear();

        return $this->redirectToRoute('admin_ordernote_index');
    }

}

