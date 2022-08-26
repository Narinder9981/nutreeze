<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_package_upgrade_history")
*/
class Orderpackageupgradehistory
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_package_upgrade_history_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_from_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $payment_status="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $payment_method="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $total_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $added_flag="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_archive=0;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $transaction_id =0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getOrder_package_upgrade_history_id()
	{
		return $this->order_package_upgrade_history_id;
	}

	public function getOrder_id()
	{
		return $this->order_id;
	}
	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getStart_from_date()
	{
		return $this->start_from_date;
	}
	public function setStart_from_date($start_from_date)
	{
		$this->start_from_date = $start_from_date;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getPayment_status()
	{
		return $this->payment_status;
	}
	public function setPayment_status($payment_status)
	{
		$this->payment_status = $payment_status;
	}

	public function getPayment_method()
	{
		return $this->payment_method;
	}
	public function setPayment_method($payment_method)
	{
		$this->payment_method = $payment_method;
	}

	public function getTotal_amount()
	{
		return $this->total_amount;
	}
	public function setTotal_amount($total_amount)
	{
		$this->total_amount = $total_amount;
	}

	public function getAdded_flag()
	{
		return $this->added_flag;
	}
	public function setAdded_flag($added_flag)
	{
		$this->added_flag = $added_flag;
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
	
	public function getTransaction_id ()
	{
		return $this->transaction_id ;
	}
	public function setTransaction_id ($transaction_id )
	{
		$this->transaction_id  = $transaction_id ;
	}
}