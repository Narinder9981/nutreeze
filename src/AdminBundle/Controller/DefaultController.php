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

class DefaultController extends Controller
{
	/**
	 * @Route("/")
	 * @Template()
	 */
	public function indexAction()
	{
		return array();
	}
	/**
	 * @Route("/logincheck")
	 * @Template()
	 */
	public function logincheckAction()
	{
		$ADMIN_ROLES = [1, 2, 5, 6, 7 , 8 ];

		$session = new Session();
		$email_address = $_POST['email_address'];
		$password = md5($_POST['password']);

		$usermaster = $this->getDoctrine()
			->getManager()
			->getRepository('AdminBundle:Usermaster')
			->findOneBy(array('email' => $email_address, 'password' => $password, 'is_deleted' => 0));

		if (!empty($usermaster) ) { // && count($usermaster) == 1
			if (in_array($usermaster->getUser_role_id() , $ADMIN_ROLES)) {
				//user status check
				if ($usermaster->getStatus() == 'active') {
					//email conformation check
					// var_dump($usermaster->getIs_verified());exit;
					if ($usermaster->getIs_verified() == '1' || true) {
						$session->set('user_id', $usermaster->getUser_master_id());
						$session->set('role_id', $usermaster->getUser_role_id());
						$session->set('logged_in_username', $usermaster->getUser_firstname());
						$session->set('email_address', $usermaster->getEmail());

						$this->get('session')->getFlashBag()->set('success_msg', 'Login sucessfull..');
						return $this->redirect($this->generateUrl('admin_dashboard_index'));
					} else {
						$this->get('session')->getFlashBag()->set('error_msg', 'Please conform your email address.');
					}
				} else {
					$this->get('session')->getFlashBag()->set('error_msg', 'Your user account was Inactive.');
				}
			} else {
				$this->get('session')->getFlashBag()->set('error_msg', 'Login failed! try again later..');
			}
		} else {
			$this->get('session')->getFlashBag()->set('error_msg', 'Username or password is incorrect!');
		}
		return $this->redirect($this->generateUrl('admin_default_index'));
	}
	/**
	 * @Route("/logout")
	 * @Template()
	 */
	public function logoutAction()
	{
		$session = new Session();
		$session->clear();
		return $this->redirect($this->generateUrl('admin_default_index'));
	}
}
