<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="added_extra_days_order")
*/
class Addedextradaysorder
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $added_extra_days_order_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $added_days=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $old_order_end_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $new_order_end_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $added_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $added_by=0;

	public function getAdded_extra_days_order_id()
	{
		return $this->added_extra_days_order_id;
	}

	public function getOrder_id()
	{
		return $this->order_id;
	}
	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

	public function getAdded_days()
	{
		return $this->added_days;
	}
	public function setAdded_days($added_days)
	{
		$this->added_days = $added_days;
	}

	public function getOld_order_end_date()
	{
		return $this->old_order_end_date;
	}
	public function setOld_order_end_date($old_order_end_date)
	{
		$this->old_order_end_date = $old_order_end_date;
	}

	public function getNew_order_end_date()
	{
		return $this->new_order_end_date;
	}
	public function setNew_order_end_date($new_order_end_date)
	{
		$this->new_order_end_date = $new_order_end_date;
	}

	public function getAdded_datetime()
	{
		return $this->added_datetime;
	}
	public function setAdded_datetime($added_datetime)
	{
		$this->added_datetime = $added_datetime;
	}

	public function getAdded_by()
	{
		return $this->added_by;
	}
	public function setAdded_by($added_by)
	{
		$this->added_by = $added_by;
	}
}