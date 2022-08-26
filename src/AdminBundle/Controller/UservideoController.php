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
use AdminBundle\Entity\Usergoalmaster;
use AdminBundle\Entity\Commongallerymaster;
use AdminBundle\Entity\Uservideomaster;
use AdminBundle\Entity\Uservideorelation;
use AdminBundle\Entity\Videotutorial;
use AdminBundle\Entity\Videopackagerelation;

class UservideoController extends BaseController {

    public function __construct() {
        parent::__construct();
        $obj = new BaseController();
        $obj->chksessionAction();

        $session = new Session();
        if (in_array($session->get('role_id'), [1])) {
            // allow - Superadmin
        } else {
            $referer = $this->getRefererUrl();

            // deny access
            $session->getFlashBag()->set('error_msg', 'You have not enough privilege to access this feature');
            header("Location: " . $referer);
            exit;
        }
    }

    /**
     * @Route("/userVideo/list/{user_id}",defaults={"user_id"="0"})
     * @Template()
     */
    public function indexAction($user_id) {
        $user_relation_join = '';
        $pk_where = '';
        $user_name = '';
        if ($user_id != 0) {


            if ($user_id != 0) {
                $sql = "select user_firstname from user_master where user_master_id = '$user_id' ";
                $user_details = $this->fireQuery($sql);
                $user_name = '';
                if ($user_details) {
                    $user_name = $user_details[0]['user_firstname'];
                }
            }

            #checkPackage buy for workout or not and consultant_fee_type_id =  4 for workout 
            $sql_1 = "select package_id from order_master 
					LEFT JOIN order_include_relation ON order_master.order_master_id = order_include_relation.order_id 
					where order_master.order_by = '$user_id' and order_master.order_status = 'success'";
            $packages_for_workout = $this->fireQuery($sql_1);
            $pk_array = null;

            if (!empty($packages_for_workout)) {
                foreach ($packages_for_workout as $pk) {
                    $pk_array [] = $pk['package_id'];
                }
            }
            if (!empty($pk_array)) {
                $pk_array_str = implode(',', $pk_array);
                $pk_where = " AND main_package_id IN ($pk_array_str) ";
            } else {
                $pk_where = " AND main_package_id IN (0) ";
            }

            $user_relation_join = " LEFT JOIN user_video_relation ON user_video_relation.main_video_id = user_video_master.main_video_master_id and user_video_relation.user_id = '$user_id' and user_video_relation.is_deleted = 0 ";
        }
        $sql = "select user_video_master.*,media_library_master.*,user_video_category_master.name as video_category  from user_video_master 
				LEFT JOIN user_video_category_master ON user_video_category_master.main_user_video_category_master_id =  user_video_master.video_category 
				JOIN media_library_master ON user_video_master.media_id = media_library_master.media_library_master_id  
				$user_relation_join 
				where user_video_master.is_deleted = 0 and media_library_master.is_deleted = 0  group by main_video_master_id ";
        $gallery = $this->fireQuery($sql);

        $live_path = $this->container->getParameter('live_path');

        if (!empty($gallery)) {
            foreach ($gallery as $key => $value) {
                $gallery[$key]['media_url'] = "$live_path" . $value['media_location'] . "/" . $value['media_name'];
            }
        }
//		echo"<pre>";print_r($gallery);exit;
        return array('gallery' => $gallery, 'user_id' => $user_id, 'user_name' => $user_name);
    }

    /**
     * @Route("/tutorialvideolist")
     * @Template()
     */
    public function tutorialvideolistAction() {
        $user_relation_join = '';
        $pk_where = '';
        $user_name = '';
       
        $sql = "select * from video_tutorial
                where is_deleted = 0  ";
        $videoList = $this->fireQuery($sql);

        $live_path = $this->container->getParameter('live_path');

        // if (!empty($videoList)) {
        //     foreach ($videoList as $key => $value) {
        //         $gallery[$key]['media_url'] = "$live_path" . $value['media_location'] . "/" . $value['media_name'];
        //     }
        // }
//      echo"<pre>";print_r($gallery);exit;
        return array('videoList' => $videoList);
    }

    /**
     * @Route("/userVideo/assignVideo")
     * @Template()
     */
    public function assignVideoAction(Request $req) {
        $user_id = $req->request->get('user_id');
        $video_id = $req->request->get('video_id');
        $day = $req->request->get('day');
        $operation = $req->request->get('operation');
        #Uservideorelation

        $em = $this->getDoctrine()->getManager();
        $video_assign = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideorelation")->findOneBy(array('main_video_id' => $video_id, 'user_id' => $user_id));

        if ($video_assign) {
            if ($video_assign->getIs_deleted() == 0 && $operation == 'remove') {
                $video_assign->setIs_deleted(1);
            } else {
                $video_assign->setIs_deleted(0);
                $video_assign->setDay($day);
            }
            $em->flush();
        } else {
            $new_assign = new Uservideorelation();
            $new_assign->setMain_video_id($video_id);
            $new_assign->setUser_id($user_id);
            $new_assign->setIs_deleted(0);
            $new_assign->setDay($day);
            $new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
            $em->persist($new_assign);
            $em->flush();
        }
        return new Response('done');
    }

    /**
     * @Route("/userVideo/adduserVideo/{video_id}/{user_id}",defaults={"video_id"="0","user_id"="0"})
     * @Template()
     */
    public function adduserVideoAction($video_id, $user_id) {


        $user_role_id = 3;
        $sql = "select user_firstname,lang,lat,parent_user_id,user_lastname,username,user_master_id,email,status,media_name,media_location from user_master 
		LEFT JOIN media_library_master ON user_master.user_image = media_library_master.media_library_master_id 
		where user_master.is_deleted = 0 and user_master.user_role_id = '$user_role_id' ";
        $users = $this->fireQuery($sql);

        $user_name = '';
        if ($user_id != 0) {
            $sql = "select user_firstname from user_master where user_master_id = '$user_id' ";
            $user_details = $this->fireQuery($sql);
            $user_name = '';
            if ($user_details) {
                $user_name = $user_details[0]['user_firstname'];
            }
        }
        $languages = $this->getLanguages();

        $sql = "select main_package_master_id,package_name,language_id from package_master where is_deleted = '0'";
        $main_packages = $this->fireQuery($sql);

        $sql = "select * from user_video_master 
				JOIN media_library_master ON user_video_master.media_id = media_library_master.media_library_master_id 
				where user_video_master.is_deleted = 0 and media_library_master.is_deleted = 0 and 	main_video_master_id = '$video_id'";
        $video_master = $this->fireQuery($sql);

        $live_path = $this->container->getParameter('live_path');

        if (!empty($video_master)) {
            foreach ($video_master as $key => $value) {
                $thumb_image_id = $value['thumb_image_id'];
                $video_master[$key]['thumb_url'] = $this->getmediaAction($thumb_image_id);
                $video_master[$key]['media_url'] = $live_path . "" . $value['media_location'] . "/" . $value['media_name'];
            }
        }

        $sql = "select user_id from user_video_relation where is_deleted = '0' and main_video_id = '$video_id' ";
        $user_video_rel = $this->fireQuery($sql);
        $user_selected = null;

        if (!empty($user_video_rel)) {
            foreach ($user_video_rel as $rel_video) {
                $user_selected [] = $rel_video['user_id'];
            }
        }

        $sql = "select package_id from video_package_relation where is_deleted = '0' and video_id = '$video_id' ";
        $pk_video_rel = $this->fireQuery($sql);
        $pk_selected = null;

        if (!empty($pk_video_rel)) {
            foreach ($pk_video_rel as $rel_video_pk) {
                $pk_selected [] = $rel_video_pk['package_id'];
            }
        }

        $video_category = null;

        $sql = "select main_user_video_category_master_id,image_id,status from user_video_category_master where is_deleted = '0' group by main_user_video_category_master_id";
        $main_goal = $this->fireQuery($sql);
        $goals = null;
        if (!empty($main_goal)) {
            foreach ($main_goal as $goal_) {
                $lang_wise = '';


                if ($languages) {
                    foreach ($languages as $lang) {

                        $sql = "select name,language_id from user_video_category_master where is_deleted = '0' and language_id = '" . $lang->getLanguage_master_id() . "' and main_user_video_category_master_id = '" . $goal_['main_user_video_category_master_id'] . "'";
                        $lang_goal = $this->fireQuery($sql);
                        if (!empty($lang_goal)) {
                            $lang_wise .= $lang_goal[0]['name'] . " /";
                        }
                    }
                }
                $lang_wise = trim($lang_wise, ' /');

                $video_category[] = array(
                    'main_user_video_category_master_id' => $goal_['main_user_video_category_master_id'],
                    'lang_wise' => $lang_wise,
                );
            }
        }

        return array('user_selected' => $user_selected, 'video_master' => $video_master, 'users' => $users, 'video_category' => $video_category, 'user_name' => $user_name, 'user_id' => $user_id, 'language_list' => $languages, 'main_packages' => $main_packages, 'pk_selected' => $pk_selected);
    }
    /**
     * @Route("/userVideo/addtutorialvideo/{video_id}",defaults={"video_id"="0","user_id"="0"})
     * @Template()
     */
    public function addtutorialVideoAction($video_id, $user_id) {
        $em = $this->getDoctrine()->getManager();
        $tutorial_video = NULL ; 
        if($video_id != 0 ){
            $tutorial_video = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Videotutorial")->find($video_id);
        }
        
        
       

        return array('tutorial_video' => $tutorial_video, );
    }

     /**
     * @Route("/deletetutorialvideo/{video_id}",defaults={"video_id"="0"})
     * @Template()
     */
    public function deletetutorialvideoAction($video_id, Request $req) {
        $em = $this->getDoctrine()->getManager();
        $video_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Videotutorial")->find($video_id);

        if (!empty($video_exist)) {               
            $video_exist->setIs_deleted(1);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success_msg', 'User Video deleted successfully');
        }

        

        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @Route("/userVideo/deleteUserVideo/{video_id}",defaults={"video_id"="0"})
     * @Template()
     */
    public function deleteuserVideoAction($video_id, Request $req) {
        $em = $this->getDoctrine()->getManager();
        $gallery_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideomaster")->findBy(array('main_video_master_id' => $video_id, 'is_deleted' => 0));

        if (!empty($gallery_exist)) {
            foreach ($gallery_exist as $video) {
                $image_url = $this->getmediaAction($video->getMedia_id());
                $video->setIs_deleted(1);
                $em->flush();
            }
        }

        $this->get('session')->getFlashBag()->set('success_msg', 'User Video deleted successfully');

        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }

    /**
     * @Route("/userVideo/save")
     * @Template()
     */
    public function saveuservideoAction(Request $req) {
        $em = $this->getDoctrine()->getManager();
        $main_video_master_id = $req->request->get('main_video_master_id');
        $video_category = $req->request->get('video_category');
        $language_id = $req->request->get('language_id');
        $user_id = $req->request->get('user_id');

        $main_package_master_id = $req->request->get('main_package_master_id');

        //if(isset($_FILES['gallery']) && !empty($_FILES['gallery']) && isset($_FILES['gallery']['size']) && $_FILES['gallery']['size'] > 0){
        #get_media_type Mediatype

        $media_type = $this->getDoctrine()->getRepository("AdminBundle:Mediatype")->findBy(
                array(
                    'is_deleted' => 0,
                )
        );

        $img_ext = null;
        $video_ext = null;

        if ($media_type) {
            foreach ($media_type as $type_list) {
                if ($type_list->getMedia_type_name() == 'Image') {
                    $img_ext = explode(',', $type_list->getMedia_type_allowed());
                }

                if ($type_list->getMedia_type_name() == 'Video') {
                    $video_ext = explode(',', $type_list->getMedia_type_allowed());
                }
            }
        }

        $file_name = $_FILES['gallery']['name'];
        $tmp_name = $_FILES['gallery']['tmp_name'];
        $media_type_id = 1;
        $media_type = 'img';

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (in_array($ext, $video_ext)) {
            $media_type_id = 2;
            $media_type = 'video';
        }
        $upload_dir = $this->container->getParameter('absolute_path') . "/bundles/uploads/common_gallery/";
        $media_id = $this->mediauploadAction($file_name, $tmp_name, "/bundles/uploads/common_gallery/", $upload_dir, $media_type_id);
        $file_name1 = $_FILES['thumb_image']['name'];
        $tmp_name1 = $_FILES['thumb_image']['tmp_name'];
        $media_type_id = 1;
        $media_type = 'img';

        $upload_dir = $this->container->getParameter('absolute_path') . "/bundles/uploads/common_gallery/";

        $thumb_image = $this->mediauploadAction($file_name1, $tmp_name1, "/bundles/uploads/common_gallery/", $upload_dir, $media_type_id);

        if (!empty($main_video_master_id)) {
            #check Commongallerymaster				
            $gallery_exist = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Uservideomaster")->findOneBy(array('main_video_master_id' => $main_video_master_id, 'language_id' => $language_id, 'is_deleted' => 0));
            if ($gallery_exist) {
                if (!empty($media_id)) {
                    $gallery_exist->setMedia_id($media_id);
                }
                if (!empty($thumb_image)) {
                    $gallery_exist->setThumb_image_id($thumb_image);
                }
                $gallery_exist->setMain_package_id(0);
                $gallery_exist->setVideo_category($video_category);
                $gallery_exist->setTitle($_REQUEST['title']);
                $em->flush();

                if (!empty($main_video_master_id)) {
                    #remove old entries from Videopackagerelation

                    $packageExist = $em->getRepository("AdminBundle:Videopackagerelation")->findBy(
                            array(
                                'video_id' => $main_video_master_id,
                                'is_deleted' => 0
                            )
                    );

                    if (!empty($packageExist)) {
                        foreach ($packageExist as $_packageExist) {
                            $_packageExist->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($_REQUEST['main_package_master_id'] as $main_package_master_id_selected) {
                        $new_assign_pk = new Videopackagerelation();
                        $new_assign_pk->setVideo_id($main_video_master_id);
                        $new_assign_pk->setPackage_id($main_package_master_id_selected);
                        $new_assign_pk->setIs_deleted(0);
                        $new_assign_pk->setCreated_datetime(date('Y-m-d H:i:s'));
                        $em->persist($new_assign_pk);
                        $em->flush();
                    }
                }

                if (!empty($_REQUEST['user_selected'])) {

                    // remove older entries
                    $userSelected = $em->getRepository("AdminBundle:Uservideorelation")->findBy(
                            array(
                                'main_video_id' => $main_video_master_id,
                                'is_deleted' => 0
                            )
                    );

                    if (!empty($userSelected)) {
                        foreach ($userSelected as $_user) {
                            $_user->setIs_deleted(1);
                            $em->flush();
                        }
                    }

                    foreach ($_REQUEST['user_selected'] as $user_selected) {
                        $new_assign = new Uservideorelation();
                        $new_assign->setMain_video_id($main_video_master_id);
                        $new_assign->setUser_id($user_selected);
                        $new_assign->setIs_deleted(0);
                        $new_assign->setDay($_REQUEST['title']);
                        $new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
                        $em->persist($new_assign);
                        $em->flush();
                    }
                }

                $this->get('session')->getFlashBag()->set('success_msg', 'User Video updated successfully');
            }
        } else {

            $new_gallery = new Uservideomaster();
            $new_gallery->setMedia_id($media_id);
            $new_gallery->setVideo_category($video_category);
            $new_gallery->setThumb_image_id($thumb_image);
            $new_gallery->setTitle($_REQUEST['title']);
            $new_gallery->setMain_package_id(0);
            $new_gallery->setIs_deleted(0);
            $new_gallery->setMain_video_master_id($main_video_master_id);
            $new_gallery->setLanguage_id($language_id);
            $new_gallery->setCreated_by($this->get('session')->get('user_id'));
            $new_gallery->setCreated_datetime(date('Y-m-d H:i:s'));
            $em->persist($new_gallery);
            $em->flush();

            if ($main_video_master_id == 0) {
                $main_video_master_id = $new_gallery->getUser_video_master_id();
                $new_gallery->setMain_video_master_id($main_video_master_id);
            }
            $em->flush();

            if (!empty($main_video_master_id)) {
                #remove old entries from Videopackagerelation

                $packageExist = $em->getRepository("AdminBundle:Videopackagerelation")->findBy(
                        array(
                            'video_id' => $main_video_master_id,
                            'is_deleted' => 0
                        )
                );

                if (!empty($packageExist)) {
                    foreach ($packageExist as $_packageExist) {
                        $_packageExist->setIs_deleted(1);
                        $em->flush();
                    }
                }

                foreach ($_REQUEST['main_package_master_id'] as $main_package_master_id_selected) {
                    $new_assign_pk = new Videopackagerelation();
                    $new_assign_pk->setVideo_id($main_video_master_id);
                    $new_assign_pk->setPackage_id($main_package_master_id_selected);
                    $new_assign_pk->setIs_deleted(0);
                    $new_assign_pk->setCreated_datetime(date('Y-m-d H:i:s'));
                    $em->persist($new_assign_pk);
                    $em->flush();
                }
            }

            if (!empty($_REQUEST['user_selected'])) {
                foreach ($_REQUEST['user_selected'] as $user_selected) {
                    $new_assign = new Uservideorelation();
                    $new_assign->setMain_video_id($main_video_master_id);
                    $new_assign->setUser_id($user_selected);
                    $new_assign->setIs_deleted(0);
                    $new_assign->setDay($_REQUEST['title']);
                    $new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
                    $em->persist($new_assign);
                    $em->flush();
                }
            }

            if (!empty($user_id)) {
                $new_assign = new Uservideorelation();
                $new_assign->setMain_video_id($main_video_master_id);
                $new_assign->setUser_id($user_id);
                $new_assign->setIs_deleted(0);
                $new_assign->setDay($_REQUEST['title']);
                $new_assign->setCreated_datetime(date('Y-m-d H:i:s'));
                $em->persist($new_assign);
                $em->flush();
                $this->get('session')->getFlashBag()->set('success_msg', 'User Video inserted successfully');
                return $this->redirectToRoute('admin_uservideo_index');
            } else {
                $this->get('session')->getFlashBag()->set('success_msg', 'User Video inserted successfully');
                return $this->redirectToRoute('admin_uservideo_index');
            }
        }




        //}else{
        //	$this->get('session')->getFlashBag()->set('success_msg','User Video updated successfully');	
        //}	

        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }
    /**
     * @Route("/userVideo/savetutorialvideo")
     * @Template()
     */
    public function savetutorialvideoAction(Request $req) {
        $em = $this->getDoctrine()->getManager();
        $main_video_master_id = $req->request->get('main_video_master_id');
        $video_id = $req->request->get('video_id');
        $video_link = $req->request->get('video_link');
        $video_title = $req->request->get('video_title');
       
        if($main_video_master_id != 0 ){
            $tutorial_video = $this->getDoctrine()->getManager()->getRepository("AdminBundle:Videotutorial")->find($main_video_master_id);
            $tutorial_video->setVideo_id($video_id);
            $tutorial_video->setVideo_link($video_link);
            $tutorial_video->setVideo_title($video_title);
            $em->persist($tutorial_video);
             
            $em->flush();      
        }
        else{
            $tutorial_video = new Videotutorial();
            $tutorial_video->setVideo_id($video_id);
            $tutorial_video->setVideo_link($video_link);
            $tutorial_video->setVideo_title($video_title);
            $tutorial_video->setIs_deleted(0);
            $em->persist($tutorial_video);
            $em->flush();
        }
        
        $referer = $req->headers->get('referer');
        return $this->redirect($referer);
    }

}
