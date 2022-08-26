<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Addressmaster;

class WSAddAddressController extends WSBaseController {

    /**
     * @Route("/ws/addaddress/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function addaddressAction($param) {

        //try{
        $this->title = "Add Address";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('lang_id','user_id','area_id', 'governorate_id'),
            ),
                );

        if ($this->validateData($param)) {
            $lang_id = $param->lang_id;
            $address_type = !empty($param->address_type) ? $param->address_type : '';
            $user_master_id = !empty($param->user_id) ? $param->user_id : '';
            $area_id = !empty($param->area_id) ? $param->area_id : '';
            $block = !empty($param->block) ? $param->block : '';
            $optional_address = !empty($param->optional_address) ? $param->optional_address : '';
            $street = !empty($param->street) ? $param->street : '';
            $avenue = !empty($param->avenue) ? $param->avenue : '';
            $flat_no = !empty($param->flat_no) ? $param->flat_no : '';
            $lat = !empty($param->lat) ? $param->lat : 0;
            $floor_no = !empty($param->floor_no) ? $param->floor_no : 0;
            $lang = !empty($param->lang) ? $param->lang : 0;
            $house_number = !empty($param->house_number) ? $param->house_number : '';
            $directions = !empty($param->directions) ? $param->directions : '';
            $main_address_id = !empty($param->main_address_id) ? $param->main_address_id : 0;
            $governorate_id = !empty($param->governorate_id) ? $param->governorate_id : 0;
            
            $current_date_time = date('Y-m-d H:i:s');
            $em = $this->getDoctrine()->getManager();
            if ($main_address_id != 0 ) {
                $userAddressMaster = $this->getDoctrine()->getManager()
                        ->getRepository("AdminBundle:Addressmaster")
                        ->findOneBy(array("address_master_id" => $main_address_id, "is_deleted" => 0));

                if (empty($userAddressMaster)) {
                    $userAddressMaster = new Addressmaster();
                }
            } else {
                $userAddressMaster = new Addressmaster();
            }
            $userAddressMaster->setOptional_address($optional_address);
            $userAddressMaster->setAddress_name($block);
            $userAddressMaster->setAddress_name2($avenue);
            $userAddressMaster->setOwner_id($user_master_id);
            $userAddressMaster->setBase_address_type('none');
            $userAddressMaster->setAddress_type($address_type);
            $userAddressMaster->setContact_no(0);
            $userAddressMaster->setCity_id(0);
            $userAddressMaster->setArea_id($area_id);
            $userAddressMaster->setStreet($street);
            $userAddressMaster->setFlate_house_number($house_number);
            $userAddressMaster->setSociety_building_name($floor_no);//floor_no
            $userAddressMaster->setLandmark($directions);
            $userAddressMaster->setPincode(0);
            $userAddressMaster->setLanguage_id($lang_id);
            $userAddressMaster->setMain_address_id(0);
            $userAddressMaster->setIs_defaulte_ship_address(0);
            $userAddressMaster->setGmap_link('');
            $userAddressMaster->setLat($lat);
            $userAddressMaster->setLng($lang);
            $userAddressMaster->setDomain_id(1);
            $userAddressMaster->setIs_deleted(0);
            $userAddressMaster->setFlat_no($flat_no);
            $userAddressMaster->setCity_id($governorate_id);
            // $userAddressMaster->setLast_modified_date($current_date_time);

            // print_r($userAddressMaster);
            $em = $this->getDoctrine()->getManager();
            $em->persist($userAddressMaster);
            $em->flush();

            $address_master_id = $userAddressMaster->getAddress_master_id();
            $em = $this->getDoctrine()->getManager();

            $userAddressMaster1 = $em->getRepository("AdminBundle:Addressmaster")->find($address_master_id);

            $userAddressMaster1->setMain_address_id($address_master_id);
            $em->persist($userAddressMaster1);

            $userMasterUpdate = $em->getRepository("AdminBundle:Usermaster")->find($user_master_id);
            if($userMasterUpdate){
                $userMasterUpdate->setCreated_by($user_master_id);
                $userMasterUpdate->setAddress_master_id($address_master_id);
            }
            $em->flush();
            if (!empty($address_master_id)) {
                $response = array('address_master_id' => $address_master_id);
                $this->error = "SFD";
            } else {
                $this->error = "NRF";
            }
        } else {
            $this->error = "PIM";
        }
        $this->status = 200;
        $this->message = true;
        if (empty($response)) {
            // $response = false;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Addressmaster();
            $this->data = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }




    /**
     * @Route("/ws/useraddresslist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function useraddresslistAction($param) {

        //try{
        $this->title = "user Address list";
        $param = $this->requestAction($this->getRequest(), 0);
        $this->validateRule = array(
            array(
                'rule' => 'NOTNULL',
                'field' => array('lang_id','user_id'),
            ),
        );

        if ($this->validateData($param)) {
            $lang_id = $param->lang_id;
           
            $user_master_id = !empty($param->user_id) ? $param->user_id : '';
           
            $em = $this->getDoctrine()->getManager();
            $address = NULL ;
            if ($user_master_id != 0 ) {
                $userAddressMaster = $this->getDoctrine()->getManager()
                ->getRepository("AdminBundle:Addressmaster")
                ->findBy(
                    array("owner_id" => $user_master_id, "is_deleted" => 0),
                    array('last_modified_date' => 'DESC')
                );

                if (!empty($userAddressMaster)) {
                   foreach($userAddressMaster as $uakey=>$uaval){
                        $address[] = $this->getAddressAction($uaval->getAddress_master_id());
                   }
                   $response = $address ; 
                }
                else{
                    $this->error = "NRF";
                }
            } else {
                $this->error = "PIW";
            }
        } else {
            $this->error = "PIM";
        }

        $this->status = 200;
        $this->message = true;

        if (empty($response)) {
            // $response = false;
            $this->error = "NRF" ;
            $this->status = 201;
            $this->message = false;
            $emptyObj = new Addressmaster();
            $response = $emptyObj;
        }
        $this->data = $response;
        return $this->responseAction();
        /* }catch(\Exception $e){
          $this->error = "SFND" ;
          $this->data = false ;
          return $this->responseAction() ;
          } */
    }

     /**
     * @Route("/ws/governoratelist/{param}",defaults = {"param"=""},requirements={"param"=".+"})
     * @Template()
     */
    public function getGovernorateListAction(){
        $this->title = "Governorate List" ;
        $this->status = 200;
        $this->message = true;
        $param = $this->requestAction($this->getRequest(),0) ;
        $this->validateRule = array(
            array(
                'rule'=>'NOTNULL',
                'field'=>array('language_id'),
            ),
        );
        if($this->validateData($param))
        {
            $language_id = $param->language_id ;
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement1 = $connection->prepare("SELECT main_city_master_id as governorate_id, city_name as name FROM city_master WHERE language_id = $language_id AND  is_deleted = 0 AND status='Active' ");
            $statement1->execute();
            $governorate_master = $statement1->fetchAll();

            if(!empty($governorate_master)){
                $response [] = $governorate_master;
                $this->error = "SFD" ;
            }  
    

            if(empty($response))
            {
                // $response = false ;
                $this->status = 201;
                $this->message = false;
                $emptyObj = new Statemaster();
                $response = $emptyObj;
                $this->error = "NRF" ;
            }	
        }
        $this->data = $response ;		
        return $this->responseAction() ;
    }
}

?>
