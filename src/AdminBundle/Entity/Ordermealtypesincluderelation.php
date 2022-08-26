<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_meal_types_include_relation")
*/
class Ordermealtypesincluderelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_meal_types_include_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $meal_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $added_flag="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $total_meal_type=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_package_upgrade_history_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $price="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $days=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_updated_on="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_from_date="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_archive=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getOrder_meal_types_include_relation_id()
	{
		return $this->order_meal_types_include_relation_id;
	}

	public function getOrder_id()
	{
		return $this->order_id;
	}
	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

	public function getMeal_type()
	{
		return $this->meal_type;
	}
	public function setMeal_type($meal_type)
	{
		$this->meal_type = $meal_type;
	}

	public function getAdded_flag()
	{
		return $this->added_flag;
	}
	public function setAdded_flag($added_flag)
	{
		$this->added_flag = $added_flag;
	}

	public function getTotal_meal_type()
	{
		return $this->total_meal_type;
	}
	public function setTotal_meal_type($total_meal_type)
	{
		$this->total_meal_type = $total_meal_type;
	}

	public function getOrder_package_upgrade_history_id()
	{
		return $this->order_package_upgrade_history_id;
	}
	public function setOrder_package_upgrade_history_id($order_package_upgrade_history_id)
	{
		$this->order_package_upgrade_history_id = $order_package_upgrade_history_id;
	}

	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getDays()
	{
		return $this->days;
	}
	public function setDays($days)
	{
		$this->days = $days;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getLast_updated_on()
	{
		return $this->last_updated_on;
	}
	public function setLast_updated_on($last_updated_on)
	{
		$this->last_updated_on = $last_updated_on;
	}

	public function getStart_from_date()
	{
		return $this->start_from_date;
	}
	public function setStart_from_date($start_from_date)
	{
		$this->start_from_date = $start_from_date;
	}

	public function getIs_archive()
	{
		return $this->is_archive;
	}
	public function setIs_archive($is_archive)
	{
		$this->is_archive = $is_archive;
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