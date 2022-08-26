<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_meal_relation")
*/
class Ordermealrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_meal_relation_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $unique_no="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $meal_day="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_modified_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $requested_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $assign_driver_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $not_delivered_reason=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $lat="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $lang="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getOrder_meal_relation_id()
	{
		return $this->order_meal_relation_id;
	}

	public function getUnique_no()
	{
		return $this->unique_no;
	}
	public function setUnique_no($unique_no)
	{
		$this->unique_no = $unique_no;
	}

	public function getOrder_master_id()
	{
		return $this->order_master_id;
	}
	public function setOrder_master_id($order_master_id)
	{
		$this->order_master_id = $order_master_id;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getMeal_day()
	{
		return $this->meal_day;
	}
	public function setMeal_day($meal_day)
	{
		$this->meal_day = $meal_day;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getLast_modified_datetime()
	{
		return $this->last_modified_datetime;
	}
	public function setLast_modified_datetime($last_modified_datetime)
	{
		$this->last_modified_datetime = $last_modified_datetime;
	}

	public function getRequested_datetime()
	{
		return $this->requested_datetime;
	}
	public function setRequested_datetime($requested_datetime)
	{
		$this->requested_datetime = $requested_datetime;
	}

	public function getAssign_driver_id()
	{
		return $this->assign_driver_id;
	}
	public function setAssign_driver_id($assign_driver_id)
	{
		$this->assign_driver_id = $assign_driver_id;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getNot_delivered_reason()
	{
		return $this->not_delivered_reason;
	}
	public function setNot_delivered_reason($not_delivered_reason)
	{
		$this->not_delivered_reason = $not_delivered_reason;
	}

	public function getLat()
	{
		return $this->lat;
	}
	public function setLat($lat)
	{
		$this->lat = $lat;
	}

	public function getLang()
	{
		return $this->lang;
	}
	public function setLang($lang)
	{
		$this->lang = $lang;
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