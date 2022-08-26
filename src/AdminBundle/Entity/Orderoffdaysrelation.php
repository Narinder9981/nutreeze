<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_off_days_relation")
*/
class Orderoffdaysrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_off_days_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $off_day=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getOrder_off_days_relation_id()
	{
		return $this->order_off_days_relation_id;
	}

	public function getOrder_id()
	{
		return $this->order_id;
	}
	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

	public function getOff_day()
	{
		return $this->off_day;
	}
	public function setOff_day($off_day)
	{
		$this->off_day = $off_day;
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