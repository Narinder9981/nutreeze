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
use AdminBundle\Entity\Productcategorypackagerelation;

class MealtypesController extends BaseController {

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
     * @Route("/mealsType")
     * @Template()
     */
    public function indexAction() {
        $languages = $this->getLanguages();
        $meal_details_all = array();

        $con = $this->getDoctrine()->getManager()->getConnection();

        $main_meals_sql = "select main_product_category_master_id ,product_category_image_id from product_category_master where is_deleted = 0 group by main_product_category_master_id";
        $stmt = $con->prepare($main_meals_sql);
        $stmt->execute();
        $main_meals = $stmt->fetchAll();

//		echo"<pre>";print_r($main_city);exit;
        if (!empty($main_meals)) {

            foreach ($main_meals as $meal) {
                $lang_wise = array();
                $main_product_category_master_id = $meal['main_product_category_master_id'];

                if (!empty($languages)) {
                    foreach ($languages as $lang) {
                        $meal_sql = "select * from product_category_master where is_deleted = 0 and language_id = " . $lang->getLanguage_master_id() . " and main_product_category_master_id = " . $main_product_category_master_id;
                        $stmt = $con->prepare($meal_sql);
                        $stmt->execute();
                        $meal_details = $stmt->fetchAll();

                        if (!empty($meal_details)) {
                            $lang_wise [] = array('lang_id' => $lang->getLanguage_master_id(), 'meal_type_name' => $meal_details[0]['product_category_name']);
                        } else {
                            $lang_wise [] = array('lang_id' => $lang->getLanguage_master_id(), 'meal_type_name' => '-');
                        }
                    }
                }

                $meal_details_all[] = array(
                    'main_product_category_master_id' => $main_product_category_master_id,
                    'meal_image'=>$this->getmediaAction($meal['product_category_image_id']),
                    'lang_wise' => $lang_wise,
                );
            }
        }
//		echo"<pre>";print_r($meal_details_all);exit;
        return array('meal_details_all' => $meal_details_all, 'language_list' => $languages);
    }

    /**
     * @Route("/addMeal/{meal_id}",defaults={"meal_id"="0"})
     * @Template()
     */
    public function addmealAction($meal_id) {
        $languages = $this->getLanguages();

        $con = $this->getDoctrine()->getManager()->getConnection();

        $main_meal_sql = "select * from product_category_master where is_deleted = 0  and main_product_category_master_id=$meal_id";
        $stmt = $con->prepare($main_meal_sql);
        $stmt->execute();
        $meal = $stmt->fetchAll();

        $sql_package = "select * from package_master p_m 				
				where p_m.is_deleted = '0' ";
        $package_cat = $this->fireQuery($sql_package);

        $sql_package = "select * from product_category_package_relation  				
				where is_deleted = '0' and product_category_id = '$meal_id'";
        $package_cat_selected = $this->fireQuery($sql_package);

        $package_cat_selected_arr = null;

        if (!empty($package_cat_selected)) {
            foreach ($package_cat_selected as $_package_cat_selected) {
                $package_cat_selected_arr [] = $_package_cat_selected['package_id'];
            }
        }
//		echo"<pre>";print($main_city_sql);exit;
        return array('meal' => $meal, 'package' => $package_cat, 'language_list' => $languages, "package_cat_selected_arr" => $package_cat_selected_arr);
    }

    /**
     * @Route("/saveMealType")
     * @Template()
     */
    public function savemealAction(Request $req) {

        // begin transaction and suspend auto commit
        $entity = $this->getDoctrine()->getManager();
        $entity->getConnection()->beginTransaction();

        $response = array();
        $domain_id = 1;

        $languages = $this->getLanguages();

        if ($req->request->get('submit') != NULL) {

            $lang_id = $req->request->get('language_id');
            $product_category_name = $req->request->get('product_category_name');

            $count_in = !empty($req->request->get('count_in')) ? $req->request->get('count_in') : 'meal';


            $main_product_category_master_id = $req->request->get('main_product_category_master_id');
            $product_package = $req->request->get('product_package');

            $meal_check = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcategorymaster")->findOneBy(array(
                'language_id' => $lang_id,
                'main_product_category_master_id' => $main_product_category_master_id,
                'is_deleted' => 0
                    )
            );
            $media_id = 0;
           
           
            if (isset($_FILES['meal_image']) && !empty($_FILES['meal_image']) && isset($_FILES['meal_image']['size']) && $_FILES['meal_image']['size'] > 0) {
                $file_name = $_FILES['meal_image']['name'];
                $tmp_name = $_FILES['meal_image']['tmp_name'];
                $upload_dir = $this->container->getParameter('absolute_path') . "/bundles/uploads/meal_type/";
                
                $media_id = $this->mediauploadAction($file_name, $tmp_name, "/bundles/uploads/meal_type/", $upload_dir);

                if (!$media_id) {
                    $media_id = 0;
                }
            }
            if ($meal_check) {

                $meal_check->setProduct_category_name($product_category_name);
                $meal_check->setPackage_id(0);
                if($media_id != 0 ){
                    $meal_check->setProduct_category_image_id($media_id);
                }
                $meal_check->setCount_in($count_in);
                $entity->flush();

                $this->get('session')->getFlashBag()->set('success_msg', 'Meal type updated Succesfully');
            } else {

                if ($languages) {
                    foreach ($languages as $_languages) {
                        $new_meal_type = new Productcategorymaster();
                        $new_meal_type->setProduct_category_name($product_category_name);
                        $new_meal_type->setLanguage_id($_languages->getLanguage_master_id());
                        $new_meal_type->setPackage_id(0);
                        $new_meal_type->setMain_product_category_master_id($main_product_category_master_id);
                        $new_meal_type->setCreated_datetime(date('Y-m-d H:i:s'));
                        $new_meal_type->setIs_deleted(0);
                        $new_meal_type->setCount_in($count_in);
                        $new_meal_type->setProduct_category_image_id($media_id);
                       
                        $entity->persist($new_meal_type);
                        $entity->flush();

                        if ($main_product_category_master_id == 0) {
                            $main_product_category_master_id = $new_meal_type->getProduct_category_master_id();
                            $new_meal_type->setMain_product_category_master_id($main_product_category_master_id);
                            $entity->flush();
                        }
                    }
                }

                $this->get('session')->getFlashBag()->set('success_msg', 'Meal Type added Succesfully');
            }
            
            #make Entry in Productcategorypackagerelation	
            $old_entry = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcategorypackagerelation")->findBy(["product_category_id" => $main_product_category_master_id, "is_deleted" => 0]);

            if ($old_entry) {
                foreach ($old_entry as $_old_entry) {
                    $_old_entry->setIs_deleted(1);
                    $entity->flush();
                }
            }
            if (!empty($product_package)) {
                foreach ($product_package as $_product_package) {
                    $newProductcategorypackagerelation = new Productcategorypackagerelation();
                    $newProductcategorypackagerelation->setProduct_category_id($main_product_category_master_id);
                    $newProductcategorypackagerelation->setPackage_id($_product_package);
                    $newProductcategorypackagerelation->setCreated_datetime(date('Y-m-d H:i:s'));
                    $newProductcategorypackagerelation->setIs_deleted(0);
                    $entity->persist($newProductcategorypackagerelation);
                    $entity->flush();
                }
            }


            // manual commit
            $entity->getConnection()->commit();
            $entity->clear();

            return $this->redirectToRoute('admin_mealtypes_index', array('domain' => $this->get('session')->get('domain')));
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_dashboard_index', array('domain' => $this->get('session')->get('domain')));
        }
    }

    /**
     * @Route("/deleteMeal/{meal_id}",defaults={"meal_id" = "0"})
     * @Template()
     */
    public function deletemealAction($meal_id) {

        $entity = $this->getDoctrine()->getManager();
        $entity->getConnection()->beginTransaction();

        $response = array();
        $domain_id = 1;

        $meal_type = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Productcategorymaster")->findBy(array(
            'main_product_category_master_id' => $meal_id,
            'is_deleted' => 0
                )
        );

        if ($meal_type) {
            foreach ($meal_type as $meal_type) {
                $meal_type->setIs_deleted(1);
                $entity->flush();
            }

            $this->get('session')->getFlashBag()->set('success_msg', 'Meal Type deleted Succesfully');
        }


        // manual commit
        $entity->getConnection()->commit();
        $entity->clear();

        return $this->redirectToRoute('admin_mealtypes_index');
    }

}
