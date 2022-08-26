<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="wallet_transaction_history")
*/
class Wallettransactionhistory
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $wallet_transaction_history_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $wallet_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $wallet_action="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $previous_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $after_action_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $transaction_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $transaction_for=NULL;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $transaction_for_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $action_created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getWallet_transaction_history_id()
	{
		return $this->wallet_transaction_history_id;
	}

	public function getWallet_master_id()
	{
		return $this->wallet_master_id;
	}
	public function setWallet_master_id($wallet_master_id)
	{
		$this->wallet_master_id = $wallet_master_id;
	}

	public function getUser_master_id()
	{
		return $this->user_master_id;
	}
	public function setUser_master_id($user_master_id)
	{
		$this->user_master_id = $user_master_id;
	}

	public function getWallet_action()
	{
		return $this->wallet_action;
	}
	public function setWallet_action($wallet_action)
	{
		$this->wallet_action = $wallet_action;
	}

	public function getPrevious_amount()
	{
		return $this->previous_amount;
	}
	public function setPrevious_amount($previous_amount)
	{
		$this->previous_amount = $previous_amount;
	}

	public function getAfter_action_amount()
	{
		return $this->after_action_amount;
	}
	public function setAfter_action_amount($after_action_amount)
	{
		$this->after_action_amount = $after_action_amount;
	}

	public function getTransaction_amount()
	{
		return $this->transaction_amount;
	}
	public function setTransaction_amount($transaction_amount)
	{
		$this->transaction_amount = $transaction_amount;
	}

	public function getTransaction_for()
	{
		return $this->transaction_for;
	}
	public function setTransaction_for($transaction_for)
	{
		$this->transaction_for = $transaction_for;
	}

	public function getTransaction_for_id()
	{
		return $this->transaction_for_id;
	}
	public function setTransaction_for_id($transaction_for_id)
	{
		$this->transaction_for_id = $transaction_for_id;
	}

	public function getAction_created_datetime()
	{
		return $this->action_created_datetime;
	}
	public function setAction_created_datetime($action_created_datetime)
	{
		$this->action_created_datetime = $action_created_datetime;
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