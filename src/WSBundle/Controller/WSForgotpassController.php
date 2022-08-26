<?php
namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AdminBundle\Entity\Usermaster;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PropertyAccess\PropertyAccess;

class WSForgotpassController extends WSBaseController
{
    public function __construct()
    {
		parent::__construct();
    }
    /**
	* @Route("/ws/passwordreset/{param}",defaults = {"param"=""},requirements={"param"=".+"})
	*/
	public function passwordreset($param)
	{
		/*try
		{*/
			$this->title = "Forget Password" ;
			$this->status = 200;
        	$this->message = true;
			$param = $this->requestAction($this->getRequest(),0);
			$this->validateRule = array(
				array(
					'rule'=>'NOTNULL',
					'field'=>array('email'),
				),
			);
			
			if($this->validateData($param))
			{
				$email = $param->email;
				$chkuser = $this->getDoctrine()
							->getManager()
							->getRepository("AdminBundle:Usermaster")
							->findOneBy(array("is_deleted"=>'0',"status"=>"active","email"=>$email));
				if(!empty($chkuser))
				{
					$link = md5($email).time();
					$to = $email;
					$Config_live_site = $this->container->getParameter('live_path');
					$full_link = $Config_live_site.'/passwordresetview/'.$link.'/'.$email;
					$from = "support@anonadiet.com";
					$message = "
					<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title></title><style type='text/css'>body {margin: 0;}body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;font-style: normal;font-weight: 400;}
button{width:90%;}@media screen and (max-width:600px) {body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;}
table {width: 100%;}.footer {height: auto !important;max-width: 48% !important;width: 48% !important;}table.responsiveImage {height: auto !important;max-width: 30% !important;width: 30% !important;}table.responsiveContent {height: auto !important;max-width: 66% !important;width: 66% !important;}.top {height: auto !important;max-width: 48% !important;width: 48% !important;}.catalog {margin-left: 0%!important;}}@media screen and (max-width:480px) {body, table, td, p, a, li, blockquote {font-family: arial,sans-serif;}table {width: 100% !important;border-style: none !important;}.footer {height: auto !important;max-width: 96% !important;width: 96% !important;}.table.responsiveImage {height: auto !important;max-width: 96% !important;width: 96% !important;}.table.responsiveContent {height: auto !important;max-width: 96% !important;width: 96% !important;}.top {height: auto !important;max-width: 100% !important;width: 100% !important;}
.catalog {margin-left: 0%!important;}}</style></head><body><table width='100%' style='border:2px solid #888;'  cellspacing='0' cellpadding='0'><tbody><tr><td><table width='100%'  align='center' cellpadding='0' cellspacing='0'><tbody><tr><td><table bgcolor='#888' class='top' width='100%'  align='left' cellpadding='0' cellspacing='0' style='padding:10px 10px 10px 10px;'><tbody><tr><td style='font-size: 12px; color:#FFF; padding-left:20px; font-family: arial,sans-serif;text-align:center;'><img src='http://148.72.247.205/bundles/design/images/logo.png' width='80px'></td></tr></tbody></table></td></tr><tr> <td><table width='100%'  align='left' cellpadding='0' cellspacing='0'><tr><td style='font-size: 14px; font-weight: bold; padding: 20px; color: #222; font-family: arial,sans-serif;'>You told us you forgot your password. if you really did, click here to choose a new one:</td></tr><tr> <td align='center' style='font-size: 16px; font-weight:300; color: #929292; font-family: arial,sans-serif;'>

                    <h4>Email ID : ".$email."</h4>
                    
                    </td>
                  </tr>
                  <tr>
                    <td align='center' style='font-size: 16px; font-weight:300; color: #929292; font-family: arial,sans-serif;'>
                    <a href='".$full_link."' style='background-color: #582d20;color: #fff;font-weight: bold;padding: 10px 25px;text-decoration: none;'>Choose a new password</a>
                    
                    </td>
</tr><tr><td style='font-size: 0; line-height: 0;' height='20'><table width='96%' align='left'  cellpadding='0' cellspacing='0'><tr><td style='font-size: 0; line-height: 0;' height='20'>&nbsp;</td></tr></table></td></tr><tr> <td align='left' style='font-size: 14px; font-style: normal; font-weight: bold; color: #222; line-height: 1.8; text-align:justify; padding:10px 20px 0px 20px; font-family:arial,sans-serif;'>If you didn't mean to reset your password, then you can just ignore this email; your password will not change.</td></tr></table></td></tr><tr> <td style='font-size: 0; line-height: 0;' height='10'><table width='96%' align='left'  cellpadding='0' cellspacing='0'><tr><td style='font-size: 0; line-height: 0;' height='20'>&nbsp;</td></tr></table></td></tr><tr bgcolor='#888'><td><table class='footer' width='100%'  align='left' cellpadding='0' cellspacing='0'><tr><td><p align='center'  style='font-size: 14px; font-weight:300; line-height: 10px; color: #FFF; font-family: arial,sans-serif;text-align:center;'>&copy; Copyright</p></td></tr></table></td></tr></tbody></table></td></tr></tbody></table></body></html>
					";
					$subject = "Anona - Password Reset";
		            /*$headers = 'MIME-Version: 1.0' . "\r\n";
		            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: '.$from."\r\n".
								'Reply-To: '.$to."\r\n".
								'X-Mailer: PHP/'.phpversion();					 
				    $headers .= "X-Priority: 1\n"; // Urgent message!
					*/
					//$errLevel = error_reporting(E_ALL ^ E_NOTICE);
					$headers  = "From: support@anonadiet <mail@testsite.com>\r\n";
					$headers .= "Cc: testsite <aaska@infoware.ws>\r\n"; 
					$headers .= "X-Sender: testsite <mail@testsite.com>\r\n";
					$headers .= 'X-Mailer: PHP/' . phpversion();
					$headers .= "X-Priority: 1\r\n"; // Urgent message!
					$headers .= "Return-Path: mail@testsite.com\r\n"; // Return path for errors
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=utf-8\r\n";
				   
					//$mailRes  = mail($to,$subject,$message,$headers) ;
					if(mail($to,$subject,$message,$headers))
					{
						$response = "Password reset link is sent to your Email ID.Password reset link will expire within 30 Minutes.";
					} 
					else 
					{
						$response = "Something is wrong with server , Please contact Admin or Please enter valid Email ID.";
					
					}
					//print_r(error_get_last());
					$this->title = "password reset";
					$this->error = "SFD";
					$this->status = 200;
            		$this->message = true;
				} 
				else 
				{
					$this->error = "NRF";
					// $response = false;
					$emptyObj = new Usermaster();
					$response = $emptyObj;
					$this->status = 201;
            		$this->message = false;
				}
			} 
			else 
			{
				$this->error = "PIM";
				$emptyObj = new Usermaster();
				$response = $emptyObj;
				// $response = false;
				$this->status = 201;
            	$this->message = false;
			}
			$this->data = $response;
			return $this->responseAction() ;
		/*} 
		catch (\Exception $e) 
		{
			$this->error = "SFND";
			$this->data = false;
			return $this->responseAction() ;
		}*/
	}
	/**
	* @Route("/passwordresetview/{hash}/{email}",defaults={"hash"="","email"=""})
	* @Template()
	*/
	public function passwordresetviewAction($hash,$email)
	{
		if(isset($_REQUEST['status']) && !empty($_REQUEST['status']))
		{
			return array("done"=>$_REQUEST['status']);
		}
		if(isset($hash) && !empty($hash) && isset($email) && !empty($email))
		{
			$hash = str_split($hash,32);
			$time = $hash[1];
			$hashemail = $hash[0];
			if((md5($email) == $hashemail) && (intval($time+(30*60)) > time()))
			{
				$usermaster = $this->getDoctrine()
						->getManager()
						->getRepository("AdminBundle:Usermaster")
						->findOneBy(array("email"=>$email,"status"=>"active","is_deleted"=>'0'));
				if(!empty($usermaster))
				{
					$msg = "1"; // user found
				} 
				else 
				{
					$msg = "2"; // user not found
				}
			} 
			else 
			{
				$msg = "3"; // link expired
			}
			return array("email"=>$email,"msg"=>$msg);
		}
		return array();
	}
   /**
	* @Route("/passwordresetform")
	*/
	public function passwordresetformAction()
	{
		if(isset($_POST['change_password']))
		{
			$email = $_POST['email'];
			$new_password = $_POST['new_password'];
			$msg = "2";
			$usermaster = $this->getDoctrine()
						->getManager()
						->getRepository("AdminBundle:Usermaster")
						->findOneBy(array("email"=>$email,"status"=>"active","is_deleted"=>0));
			if(!empty($usermaster))
			{
				$em = $this->getDoctrine()->getManager();
				$update = $em->getRepository("AdminBundle:Usermaster")->find($usermaster->getUser_master_id());
				$update->setPassword(md5($new_password));
				$update->setShow_password($new_password);
				$em->flush();
				$msg = "1";
			}
			return $this->redirect($this->generateUrl("ws_wsforgotpass_passwordresetview")."?status=".$msg);
		}
		exit;
	}
    /**
	* @Route("/ws/changepassword/{user_id}/{old_pass}/{new_pass}",defaults={"user_id"="","old_pass"="","new_pass"=""})
	*/
	public function changepasswordAction($user_id,$old_pass,$new_pass)
	{

		try
    	{
    		$this->title = "Password change" ;
			$this->status = 200;
        	$this->message = true;
			$response = array();
			//var_dump($user_id);exit;
			if(!empty($user_id))
			{
				$usermaster = $this->getDoctrine()->getManager()
							->getRepository("AdminBundle:Usermaster")
							->findOneBy(array("user_master_id"=>$user_id,"is_deleted"=>0));	
				
				$name = $usermaster->getUser_firstname()." ".$usermaster->getUser_lastname();
				$email = $usermaster->getEmail();
				$oldpassword = $usermaster->getPassword();
				if(!empty($usermaster))
				{
					if($oldpassword == md5($old_pass))
					{
						$em = $this->getDoctrine()->getManager();
						$user_update = $em->getRepository('AdminBundle:Usermaster')->find($user_id);
						$user_update->setPassword(md5($new_pass));
						$user_update->setShow_password($new_pass);
						$em->flush();
						
						$response = array(
								"user_id"=>$user_id,
								"name"=>$name,
								"email"=>$email
							);
						$this->error = "SFD";
					}
					else
					{
						$this->error = "PNM";
					}
				}
				else
				{
					$this->error = "NRF";
				}
			}
			else
			{
				$this->error = "PIM" ;
			}
			
			if(empty($response))
			{
				// $response = false ;
				$emptyObj = new Usermaster();
				$response = $emptyObj;
				// $response = false;
				$this->status = 201;
            	$this->message = false;
			}
			$this->data = $response;
			return $this->responseAction() ;
		}
		catch(\Exception $e)
		{
			$this->error = "SFND" ;
			$this->data = false ;
			return $this->responseAction() ;
		}
	}
}