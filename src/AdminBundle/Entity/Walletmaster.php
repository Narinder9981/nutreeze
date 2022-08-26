<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="wallet_master")
*/
class Walletmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $wallet_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $wallet_user_code="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $wallet_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $wallet_status="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $wallet_created="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $wallet_last_updated="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getWallet_master_id()
	{
		return $this->wallet_master_id;
	}

	public function getUser_master_id()
	{
		return $this->user_master_id;
	}
	public function setUser_master_id($user_master_id)
	{
		$this->user_master_id = $user_master_id;
	}

	public function getWallet_user_code()
	{
		return $this->wallet_user_code;
	}
	public function setWallet_user_code($wallet_user_code)
	{
		$this->wallet_user_code = $wallet_user_code;
	}

	public function getWallet_amount()
	{
		return $this->wallet_amount;
	}
	public function setWallet_amount($wallet_amount)
	{
		$this->wallet_amount = $wallet_amount;
	}

	public function getWallet_status()
	{
		return $this->wallet_status;
	}
	public function setWallet_status($wallet_status)
	{
		$this->wallet_status = $wallet_status;
	}

	public function getWallet_created()
	{
		return $this->wallet_created;
	}
	public function setWallet_created($wallet_created)
	{
		$this->wallet_created = $wallet_created;
	}

	public function getWallet_last_updated()
	{
		return $this->wallet_last_updated;
	}
	public function setWallet_last_updated($wallet_last_updated)
	{
		$this->wallet_last_updated = $wallet_last_updated;
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