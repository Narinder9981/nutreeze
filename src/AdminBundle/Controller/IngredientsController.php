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

use AdminBundle\Entity\Ingredientmaster;

class IngredientsController extends BaseController
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
     * @Route("/ingredients")
     * @Template()
     */
    public function indexAction(Request $req) {
        $languages = $this->getLanguages();
        $sql = "select ingredient_master_id,name,name_ar,status from ingredients_master where is_deleted = 0";
        $main_ingredients = $this->fireQuery($sql);
        $ingredients = null;
        //	print($sql);exit;
        if (!empty($main_ingredients)) {
            foreach ($main_ingredients as $ingredient_) {

                $lang_wise = null;

                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select name,language_id from ingredients_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and ingredient_master_id = '" . $ingredient_['ingredient_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_wise[] = array('name' => $lang_goal[0]['name'], 'lang_id' => $lang->getLanguage_master_id());
                        } else {
                            $lang_wise[] = array('name' => '-', 'lang_id' => $lang->getLanguage_master_id());
                        }
                    }
                }
               
				$ingredients[] = array(
					'ingredient_master_id' => $ingredient_['ingredient_master_id'],
					'status' => $ingredient_['status'],
					'lang_wise' => $lang_wise,
					'name'=>$ingredient_['name'],                            
					'name_ar'=>$ingredient_['name_ar'],
				);
                
            }
        }
     
		// echo"<pre>";print_r($ingredients);exit;
        return array(
            'ingredients' => $ingredients,
            'languages' => $languages
        );
    }


	/**
     * @Route("/ingredients/add/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function addAction($main_id)
    {
		$main_ingredients = null;
		$languages = $this->getLanguages();
		if(!empty($main_id)){
			$sql = "select * from ingredients_master where is_deleted = '0' and ingredient_master_id='$main_id'";
		    $main_ingredients = $this->fireQuery($sql);
		}	
	
		return array('main_ingredients'=>$main_ingredients,'language_list'=>$languages);
    }	

	/**
     * @Route("/ingredients/save")
     * @Template()
     */
	public function saveAction(Request $req) {

        $em = $this->getDoctrine()->getManager();

    //    echo"<pre>";print_r($_REQUEST);exit;
        if ($req->request->get('submit') != null) {
            $name = $req->request->get('name');
            $name_ar = $req->request->get('name_ar');
            $status = $req->request->get('status');
            $language_id = $req->request->get('language_id');
			$ingredient_master_id = $req->request->get('ingredient_master_id');
            #check Ingredientmaster
			$ingredient =[];
			if(!empty($ingredient_master_id)){
				$ingredient = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ingredientmaster")->findOneBy(array('ingredient_master_id' => $ingredient_master_id, 'language_id' => $language_id, 'is_deleted' => 0));
				// echo"<pre>";print_r($ingredient);exit;
			}            

            if ($ingredient) {
                $ingredient->setName($name);
                $ingredient->setName_ar($name_ar);
                $ingredient->setStatus($status);
                $em->flush();

                $all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ingredientmaster")->findBy(array('ingredient_master_id' => $ingredient_master_id, 'is_deleted' => 0));

                $this->get('session')->getFlashBag()->set('success_msg', 'Ingredients Upadated successfully');
            } else {
                $ingredient_new = new Ingredientmaster();
                $ingredient_new->setName($name);
                $ingredient_new->setName_ar($name_ar);
                $ingredient_new->setStatus($status);
                $ingredient_new->setLanguage_id($language_id);
                $ingredient_new->setIs_deleted(0);
                $ingredient_new->setCreated_datetime(date('Y-m-d H:i:s'));

                $em->persist($ingredient_new);
                $em->flush();

                $this->get('session')->getFlashBag()->set('success_msg', 'Ingredients inserted successfully');
            }


            return $this->redirectToRoute('admin_ingredients_index');
        } else {
            $this->get('session')->getFlashBag()->set('error_msg', 'Something went wrong');
            return $this->redirectToRoute('admin_default_index');
        }
    }

	 /**
     * @Route("/ingredients/delete/{main_id}",defaults={"main_id"="0"})
     * @Template()
     */
    public function deleteAction($main_id,Request $req)
    {
		$em = $this->getDoctrine()->getManager();
		$goal_all_lang = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Ingredientmaster")->findBy(array('ingredient_master_id'=>$main_id,'is_deleted'=>0));	
		
		if($goal_all_lang){
			foreach($goal_all_lang as $lang_goal){
				$lang_goal->setIs_deleted(1);
				$em->flush();
			}
		}	
	
		$this->get('session')->getFlashBag()->set('success_msg','Ingredients deleted successfully');	
		$referer = $req->headers->get('referer');
		return $this->redirect($referer);		
    }	

	/**
     * @Route("/ingredients/changeStatus")
     * @Template()
     */
    public function changestatusAction(Request $req) {
        $domain_id = $this->get('session')->get('domain_id');

        $id = $req->request->get('main_id');
        $status = $req->request->get('status');

        $em = $this->getDoctrine()->getManager();


        $ingredient_master = $this->getDoctrine()->getManager()->getRepository('AdminBundle:Ingredientmaster')->findBy(array(
            'is_deleted' => 0,
            'ingredient_master_id' => $id
                )
        );
        if ($ingredient_master) {
            foreach ($ingredient_master as $ingredient_master) {
                if ($status == 'true') {
                    $ingredient_master->setStatus('active');
                } else {
                    $ingredient_master->setStatus('inactive');
                }
                $em->flush();
            }
        }

        return new Response('done');
    }
}
