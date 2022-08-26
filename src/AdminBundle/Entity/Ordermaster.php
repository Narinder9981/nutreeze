<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_master")
*/
class Ordermaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_by=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $unique_no="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $delivery_address_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $order_status="";
	/**
	* @ORM\Column(type="string")
	*/
	protected $pause_status="no";

	/**
	* @ORM\Column(type="string")
	*/
	protected $domain_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $delivery_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $delivery_time_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $delivery_method_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $delivery_time_notes="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $delivery_method_notes="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $package_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $package_for="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $consulatant_fee="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $promo_code_discount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $payment_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $payment_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_modified="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $end_date="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $transaction_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_by=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_note_id=0;

	public function getOrder_master_id()
	{
		return $this->order_master_id;
	}

	public function getOrder_by()
	{
		return $this->order_by;
	}
	public function setOrder_by($order_by)
	{
		$this->order_by = $order_by;
	}

	public function getUnique_no()
	{
		return $this->unique_no;
	}
	public function setUnique_no($unique_no)
	{
		$this->unique_no = $unique_no;
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

	public function getDelivery_address_id()
	{
		return $this->delivery_address_id;
	}
	public function setDelivery_address_id($delivery_address_id)
	{
		$this->delivery_address_id = $delivery_address_id;
	}

	public function getOrder_status()
	{
		return $this->order_status;
	}
	public function setOrder_status($order_status)
	{
		$this->order_status = $order_status;
	}

	public function getPause_status()
	{
		return $this->pause_status;
	}
	public function setPause_status($pause_status)
	{
		$this->pause_status = $pause_status;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
	}

	public function getDelivery_datetime()
	{
		return $this->delivery_datetime;
	}
	public function setDelivery_datetime($delivery_datetime)
	{
		$this->delivery_datetime = $delivery_datetime;
	}

	public function getDelivery_time_id()
	{
		return $this->delivery_time_id;
	}
	public function setDelivery_time_id($delivery_time_id)
	{
		$this->delivery_time_id = $delivery_time_id;
	}

	public function getDelivery_method_id()
	{
		return $this->delivery_method_id;
	}
	public function setDelivery_method_id($delivery_method_id)
	{
		$this->delivery_method_id = $delivery_method_id;
	}

	public function getDelivery_time_notes()
	{
		return $this->delivery_time_notes;
	}
	public function setDelivery_time_notes($delivery_time_notes)
	{
		$this->delivery_time_notes = $delivery_time_notes;
	}

	public function getDelivery_method_notes()
	{
		return $this->delivery_method_notes;
	}
	public function setDelivery_method_notes($delivery_method_notes)
	{
		$this->delivery_method_notes = $delivery_method_notes;
	}

	public function getPackage_amount()
	{
		return $this->package_amount;
	}
	public function setPackage_amount($package_amount)
	{
		$this->package_amount = $package_amount;
	}

	public function getPackage_for()
	{
		return $this->package_for;
	}
	public function setPackage_for($package_for)
	{
		$this->package_for = $package_for;
	}

	public function getConsulatant_fee()
	{
		return $this->consulatant_fee;
	}
	public function setConsulatant_fee($consulatant_fee)
	{
		$this->consulatant_fee = $consulatant_fee;
	}

	public function getPromo_code_discount()
	{
		return $this->promo_code_discount;
	}
	public function setPromo_code_discount($promo_code_discount)
	{
		$this->promo_code_discount = $promo_code_discount;
	}

	public function getPayment_amount()
	{
		return $this->payment_amount;
	}
	public function setPayment_amount($payment_amount)
	{
		$this->payment_amount = $payment_amount;
	}

	public function getPayment_type()
	{
		return $this->payment_type;
	}
	public function setPayment_type($payment_type)
	{
		$this->payment_type = $payment_type;
	}

	public function getCreated_date()
	{
		return $this->created_date;
	}
	public function setCreated_date($created_date)
	{
		$this->created_date = $created_date;
	}

	public function getLast_modified()
	{
		return $this->last_modified;
	}
	public function setLast_modified($last_modified)
	{
		$this->last_modified = $last_modified;
	}

	public function getStart_date()
	{
		return $this->start_date;
	}
	public function setStart_date($start_date)
	{
		$this->start_date = $start_date;
	}

	public function getEnd_date()
	{
		return $this->end_date;
	}
	public function setEnd_date($end_date)
	{
		$this->end_date = $end_date;
	}

	public function getTransaction_id()
	{
		return $this->transaction_id;
	}
	public function setTransaction_id($transaction_id)
	{
		$this->transaction_id = $transaction_id;
	}

	public function getCreated_by()
	{
		return $this->created_by;
	}
	public function setCreated_by($created_by)
	{
		$this->created_by = $created_by;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}

	public function getOrder_note_id()
	{
		return $this->order_note_id;
	}
	public function setOrder_note_id($order_note_id)
	{
		$this->order_note_id = $order_note_id;
	}
}
