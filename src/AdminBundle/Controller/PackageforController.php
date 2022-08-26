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
use AdminBundle\Entity\Packageforwithpackagerelation;
use AdminBundle\Entity\Packageformaster;

class PackageforController extends BaseController {

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
     * @Route("/packageFor")
     * @Template()
     */
    public function indexAction() {
        $languages = $this->getLanguages();
        $pk_for_details_all = array();

        $con = $this->getDoctrine()->getManager()->getConnection();

        $main_pk_for_sql = "select main_package_for_master_id,type,friday_offday from package_for_master where is_deleted = 0 group by main_package_for_master_id";
        $stmt = $con->prepare($main_pk_for_sql);
        $stmt->execute();
        $main_for_pk = $stmt->fetchAll();

//		echo"<pre>";print_r($main_city);exit;
        if (!empty($main_for_pk)) {

            foreach ($main_for_pk as $pk_for) {
                $lang_wise = array();
                $main_package_for_master_id = $pk_for['main_package_for_master_id'];
                $type = $pk_for['type'];
                $friday_offday = $pk_for['friday_offday'];

                if (!empty($languages)) {
                    foreach ($languages as $lang) {
                        $pk_for_details = "select * from package_for_master where is_deleted = 0 and language_id = " . $lang->getLanguage_master_id() . " and main_package_for_master_id = " . $main_package_for_master_id;
                        $stmt = $con->prepare($pk_for_details);
                        $stmt->execute();
                        $pk_for_details = $stmt->fetchAll();

                        if (!empty($pk_for_details)) {
                            $lang_wise [] = array('lang_id' => $lang->getLanguage_master_id(), 'pk_for_name' => $pk_for_details[0]['name']);
                        } else {
                            $lang_wise [] = array('lang_id' => $lang->getLanguage_master_id(), 'pk_for_name' => '-');
                        }
                    }
                }

                $pk_for_details_all[] = array(
                    'main_package_for_master_id' => $main_package_for_master_id,
                    'lang_wise' => $lang_wise,
                    'type' => $type,
                    'friday_offday'=>$friday_offday
                );
            }
        }
//		echo"<pre>";print_r($meal_details_all);exit;
        return array('pk_for_details_all' => $pk_for_details_all, 'language_list' => $languages);
    }

    /**
     * @Route("/addPackageFor/{pk_for_id}",defaults={"pk_for_id"="0"})
     * @Template()
     */
    public function addpackageForAction($pk_for_id) {
        
        $languages = $this->getLanguages();

        $con = $this->getDoctrine()->getManager()->getConnection();

        $main_meal_sql = "select * from package_for_master where is_deleted = 0  and main_package_for_master_id=$pk_for_id";
        $stmt = $con->prepare($main_meal_sql);
        $stmt->execute();
        $pk_for = $stmt->fetchAll();
        $selected_packages = [] ; 
        if($pk_for){
             $package_for_with_package_relation  = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageforwithpackagerelation")->findBy(array("package_for_id"=>$pk_for_id,"is_deleted"=>0));
             if($package_for_with_package_relation){
                 foreach($package_for_with_package_relation as $ppfkey=>$ppfval){
                     $selected_packages[] = $ppfval->getMain_package_id();
                 }
             }
        }
        $packageList = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packagemaster")->findBy(array("is_deleted"=>0));

		//echo"<pre>";print_r($packageList);exit;
        return array('pk_for' => $pk_for, 'language_list' => $languages,"package_list"=>$packageList,'selected_packages'=>$selected_packages);
    }

    /**
     * @Route("/savePackageFor")
     * @Template()
     */
    public function savepackageForAction(Request $req) {

        $languages = $this->getLanguages();
        // begin transaction and suspend auto commit
        $em = $entity = $this->getDoctrine()->getManager();
        $entity->getConnection()->beginTransaction();

        $response = array();
        $domain_id = 1;

        if ($req->request->get('submit') != NULL) {

            $lang_id = $req->request->get('language_id');
            $name = $req->request->get('name');
            $description = $req->request->get('description');
            $package_ids = $req->request->get('package_ids');
           // var_dump($package_ids);exit;
            $name_db = str_replace(" ", "_", strtolower($req->request->get('name')));

            $main_package_for_master_id = $req->request->get('main_package_for_master_id');
            $type = $req->request->get('type');
            $price = $req->request->get('price');
            $days = $req->request->get('days');
            $friday_offday = $req->request->get('friday_off_day');


            $pk_for = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageformaster")->findOneBy(array(
                'language_id' => $lang_id,
                'main_package_for_master_id' => $main_package_for_master_id,
                'is_deleted' => 0
                    )
            );

            if ($pk_for) {

                $pk_for->setName($name);
                $pk_for->setDescription($description);
                $pk_for->setFriday_offday($friday_offday);
                $entity->flush();
                #commmon_changes
                $pk_for_all = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageformaster")->findBy(array('main_package_for_master_id' => $main_package_for_master_id,
                    'is_deleted' => 0
                        )
                );

                if ($pk_for_all) {
                    foreach ($pk_for_all as $pk_lang) {
                        $pk_lang->setType($type);
                        $pk_lang->setPrice($price);
                        $pk_lang->setDays($days);
                        $pk_lang->setFriday_offday($friday_offday);
                        $entity->flush();
                    }
                }
                
                // deleted earlier entries
                $package_for_with_package_relation  = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageforwithpackagerelation")->findBy(array("package_for_id"=>$main_package_for_master_id,"is_deleted"=>0));
                if($package_for_with_package_relation){
                    foreach($package_for_with_package_relation as $ppkey=>$ppval){
                        $ppval->setIs_deleted(1);
                        $em->flush();
                    }
                }
                // Add entries
                if($package_ids){
                    foreach($package_ids as $pkey=>$pval){
                        $package_for_with_package_relation = new Packageforwithpackagerelation();
                        $package_for_with_package_relation->setMain_package_id($pval);
                        $package_for_with_package_relation->setPackage_for_id($main_package_for_master_id);
                        $package_for_with_package_relation->setIs_deleted(0);
                        $em->persist($package_for_with_package_relation);
                        $em->flush();
                    }
                }

                $this->get('session')->getFlashBag()->set('success_msg', 'Package For updated Succesfully');
            } else {

                if ($languages) {
                    foreach ($languages as $_languages) {
                        $new_pk_for_type = new Packageformaster();
                        $new_pk_for_type->setName($name);
                        $new_pk_for_type->setDescription($description);
                        $new_pk_for_type->setType($type);
                        $new_pk_for_type->setFriday_offday($friday_offday);
                        $new_pk_for_type->setLanguage_id($_languages->getLanguage_master_id());
                        $new_pk_for_type->setMain_package_for_master_id($main_package_for_master_id);
                        $new_pk_for_type->setIs_deleted(0);
                        $new_pk_for_type->setPrice($price);
                        $new_pk_for_type->setDays($days);

                        if ($main_package_for_master_id == 0) {
                            $new_pk_for_type->setName_db($name_db);
                        } else {
                            $pk_ex = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageformaster")->findOneBy(array('main_package_for_master_id' => $main_package_for_master_id,
                                'is_deleted' => 0));
                            if ($pk_ex) {
                                $name_db = $pk_ex->getName_db();
                            }
                            $new_pk_for_type->setName_db($name_db);
                        }

                        $entity->persist($new_pk_for_type);
                        $entity->flush();

                        if ($main_package_for_master_id == 0) {
                            $main_package_for_master_id = $new_pk_for_type->getPackage_for_master_id();
                            $new_pk_for_type->setMain_package_for_master_id($main_package_for_master_id);
                            $entity->flush();
                        }
                        
                         // deleted earlier entries
                        $package_for_with_package_relation  = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageforwithpackagerelation")->findBy(array("package_for_id"=>$main_package_for_master_id,"is_deleted"=>0));
                        if($package_for_with_package_relation){
                            foreach($package_for_with_package_relation as $ppkey=>$ppval){
                                $ppval->setIs_deleted(1);
                                $em->flush();
                            }
                        }
                        // Add entries
                        if($package_ids){
                            foreach($package_ids as $pkey=>$pval){
                                $package_for_with_package_relation = new Packageforwithpackagerelation();
                                $package_for_with_package_relation->setMain_package_id($pval);
                                $package_for_with_package_relation->setPackage_for_id($main_package_for_master_id);
                                $package_for_with_package_relation->setIs_deleted(0);
                                $em->persist($package_for_with_package_relation);
                                $em->flush();
                            }
                        }
                    }
                }

                /*
                  #commmon_changes
                  $pk_for_all = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageformaster")->findBy(array(																	'main_package_for_master_id'=>$main_package_for_master_id,
                  'is_deleted'=>0
                  )
                  );

                  if($pk_for_all){
                  foreach($pk_for_all as $pk_lang){
                  $pk_lang->setType($type);
                  $pk_lang->setPrice($price);
                  $pk_lang->setDays($days);
                  $entity->flush();
                  }
                  }
                 */
                $this->get('session')->getFlashBag()->set('success_msg', 'Package For added Succesfully');
            }

            // manual commit
            $entity->getConnection()->commit();
            $entity->clear();

            return $this->redirectToRoute('admin_packagefor_index', array('domain' => $this->get('session')->get('domain')));
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_dashboard_index', array('domain' => $this->get('session')->get('domain')));
        }
    }

    /**
     * @Route("/deletePackageFor/{pk_for_id}",defaults={"pk_for_id" = "0"})
     * @Template()
     */
    public function deletepackageforAction($pk_for_id) {

        $entity = $this->getDoctrine()->getManager();
        $entity->getConnection()->beginTransaction();

        $response = array();
        $domain_id = 1;

        $meal_type = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Packageformaster")->findBy(array(
            'main_package_for_master_id' => $pk_for_id,
            'is_deleted' => 0
                )
        );

        if ($meal_type) {
            foreach ($meal_type as $meal_type) {
                $meal_type->setIs_deleted(1);
                $entity->flush();
            }

            $this->get('session')->getFlashBag()->set('success_msg', 'Package For deleted Succesfully');
        }


        // manual commit
        $entity->getConnection()->commit();
        $entity->clear();

        return $this->redirectToRoute('admin_packagefor_index');
    }

}
