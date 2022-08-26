<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="gcm_user")
*/
class Gcmuser
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $gcm_user_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $gcm_regid="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $device_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $app_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $domain_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $send_notification="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getGcm_user_id()
	{
		return $this->gcm_user_id;
	}

	public function getGcm_regid()
	{
		return $this->gcm_regid;
	}
	public function setGcm_regid($gcm_regid)
	{
		$this->gcm_regid = $gcm_regid;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getUser_type()
	{
		return $this->user_type;
	}
	public function setUser_type($user_type)
	{
		$this->user_type = $user_type;
	}

	public function getDevice_id()
	{
		return $this->device_id;
	}
	public function setDevice_id($device_id)
	{
		$this->device_id = $device_id;
	}

	public function getApp_id()
	{
		return $this->app_id;
	}
	public function setApp_id($app_id)
	{
		$this->app_id = $app_id;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getSend_notification()
	{
		return $this->send_notification;
	}
	public function setSend_notification($send_notification)
	{
		$this->send_notification = $send_notification;
	}

	public function getCreated_date()
	{
		return $this->created_date;
	}
	public function setCreated_date($created_date)
	{
		$this->created_date = $created_date;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}
}