<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="transcation_master")
*/
class Transcationmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $transcation_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $transaction_code="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $reference_no="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $invoice_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $payment_mode="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $transaction_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $transaction_status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getTranscation_master_id()
	{
		return $this->transcation_master_id;
	}

	public function getTransaction_code()
	{
		return $this->transaction_code;
	}
	public function setTransaction_code($transaction_code)
	{
		$this->transaction_code = $transaction_code;
	}

	public function getReference_no()
	{
		return $this->reference_no;
	}
	public function setReference_no($reference_no)
	{
		$this->reference_no = $reference_no;
	}

	public function getInvoice_id()
	{
		return $this->invoice_id;
	}
	public function setInvoice_id($invoice_id)
	{
		$this->invoice_id = $invoice_id;
	}

	public function getPayment_mode()
	{
		return $this->payment_mode;
	}
	public function setPayment_mode($payment_mode)
	{
		$this->payment_mode = $payment_mode;
	}

	public function getTransaction_date()
	{
		return $this->transaction_date;
	}
	public function setTransaction_date($transaction_date)
	{
		$this->transaction_date = $transaction_date;
	}

	public function getTransaction_status()
	{
		return $this->transaction_status;
	}
	public function setTransaction_status($transaction_status)
	{
		$this->transaction_status = $transaction_status;
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