<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="notify_user_list")
*/
class Notifyuserlist
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $notify_user_list_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $notify_status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getNotify_user_list_id()
	{
		return $this->notify_user_list_id;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getSub_package_id()
	{
		return $this->sub_package_id;
	}
	public function setSub_package_id($sub_package_id)
	{
		$this->sub_package_id = $sub_package_id;
	}

	public function getStart_date()
	{
		return $this->start_date;
	}
	public function setStart_date($start_date)
	{
		$this->start_date = $start_date;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getNotify_status()
	{
		return $this->notify_status;
	}
	public function setNotify_status($notify_status)
	{
		$this->notify_status = $notify_status;
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