<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="driver_area_relation")
*/
class Driverarearelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $driver_area_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $driver_user_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $area_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getDriver_area_relation_id()
	{
		return $this->driver_area_relation_id;
	}

	public function getDriver_user_id()
	{
		return $this->driver_user_id;
	}
	public function setDriver_user_id($driver_user_id)
	{
		$this->driver_user_id = $driver_user_id;
	}

	public function getArea_id()
	{
		return $this->area_id;
	}
	public function setArea_id($area_id)
	{
		$this->area_id = $area_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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