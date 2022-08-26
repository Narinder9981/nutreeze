<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="app_version_master")
*/
class Appversionmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $app_version_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $app_type="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $app_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $version_no="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $force_update="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getApp_version_master_id()
	{
		return $this->app_version_master_id;
	}

	public function getApp_type()
	{
		return $this->app_type;
	}
	public function setApp_type($app_type)
	{
		$this->app_type = $app_type;
	}

	public function getApp_id()
	{
		return $this->app_id;
	}
	public function setApp_id($app_id)
	{
		$this->app_id = $app_id;
	}

	public function getVersion_no()
	{
		return $this->version_no;
	}
	public function setVersion_no($version_no)
	{
		$this->version_no = $version_no;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getForce_update()
	{
		return $this->force_update;
	}
	public function setForce_update($force_update)
	{
		$this->force_update = $force_update;
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