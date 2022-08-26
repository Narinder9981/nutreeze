<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="driver_location_history")
*/
class Driverlocationhistory
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $driver_location_history_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_meal_relation_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $driver_user_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $lat=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $lng=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $location_created_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $location_created_time="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $order_updated_status="";

	public function getDriver_location_history_id()
	{
		return $this->driver_location_history_id;
	}

	public function getOrder_id()
	{
		return $this->order_id;
	}
	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

	public function getOrder_meal_relation_id()
	{
		return $this->order_meal_relation_id;
	}
	public function setOrder_meal_relation_id($order_meal_relation_id)
	{
		$this->order_meal_relation_id = $order_meal_relation_id;
	}

	public function getDriver_user_id()
	{
		return $this->driver_user_id;
	}
	public function setDriver_user_id($driver_user_id)
	{
		$this->driver_user_id = $driver_user_id;
	}

	public function getLat()
	{
		return $this->lat;
	}
	public function setLat($lat)
	{
		$this->lat = $lat;
	}

	public function getLng()
	{
		return $this->lng;
	}
	public function setLng($lng)
	{
		$this->lng = $lng;
	}

	public function getLocation_created_date()
	{
		return $this->location_created_date;
	}
	public function setLocation_created_date($location_created_date)
	{
		$this->location_created_date = $location_created_date;
	}

	public function getLocation_created_time()
	{
		return $this->location_created_time;
	}
	public function setLocation_created_time($location_created_time)
	{
		$this->location_created_time = $location_created_time;
	}

	public function getOrder_updated_status()
	{
		return $this->order_updated_status;
	}
	public function setOrder_updated_status($order_updated_status)
	{
		$this->order_updated_status = $order_updated_status;
	}
}