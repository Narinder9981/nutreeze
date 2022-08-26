<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="remaining_days_order_wise")
*/
class Remainingdaysorderwise
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $remaining_days_order_wise_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $remaining_days=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_order_completed="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_updated_datetime="";

	public function getRemaining_days_order_wise_id()
	{
		return $this->remaining_days_order_wise_id;
	}

	public function getOrder_master_id()
	{
		return $this->order_master_id;
	}
	public function setOrder_master_id($order_master_id)
	{
		$this->order_master_id = $order_master_id;
	}

	public function getUser_master_id()
	{
		return $this->user_master_id;
	}
	public function setUser_master_id($user_master_id)
	{
		$this->user_master_id = $user_master_id;
	}

	public function getRemaining_days()
	{
		return $this->remaining_days;
	}
	public function setRemaining_days($remaining_days)
	{
		$this->remaining_days = $remaining_days;
	}

	public function getIs_order_completed()
	{
		return $this->is_order_completed;
	}
	public function setIs_order_completed($is_order_completed)
	{
		$this->is_order_completed = $is_order_completed;
	}

	public function getLast_updated_datetime()
	{
		return $this->last_updated_datetime;
	}
	public function setLast_updated_datetime($last_updated_datetime)
	{
		$this->last_updated_datetime = $last_updated_datetime;
	}
}