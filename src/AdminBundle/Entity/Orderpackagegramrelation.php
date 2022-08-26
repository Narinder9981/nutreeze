<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_package_gram_relation")
*/
class Orderpackagegramrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_package_gram_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_gram=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_gram_price=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $gram_added_flag="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_packagegram_upgrade_history_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

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

	public function getOrder_package_gram_relation_id()
	{
		return $this->order_package_gram_relation_id;
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

	public function getPackage_gram()
	{
		return $this->package_gram;
	}
	public function setPackage_gram($package_gram)
	{
		$this->package_gram = $package_gram;
	}

	public function getPackage_gram_price()
	{
		return $this->package_gram_price;
	}
	public function setPackage_gram_price($package_gram_price)
	{
		$this->package_gram_price = $package_gram_price;
	}

	public function getGram_added_flag()
	{
		return $this->gram_added_flag;
	}
	public function setGram_added_flag($gram_added_flag)
	{
		$this->gram_added_flag = $gram_added_flag;
	}

	public function getOrder_packagegram_upgrade_history_id()
	{
		return $this->order_packagegram_upgrade_history_id;
	}
	public function setOrder_packagegram_upgrade_history_id($order_packagegram_upgrade_history_id)
	{
		$this->order_packagegram_upgrade_history_id = $order_packagegram_upgrade_history_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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