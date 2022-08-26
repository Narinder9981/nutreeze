<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="package_upgrade_price_gram")
*/
class Packageupgradepricegram
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $package_upgrade_price_gram_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $gram=0;

	/**
	* @ORM\Column(type="float")
	*/
	protected $gram_price=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getPackage_upgrade_price_gram_id()
	{
		return $this->package_upgrade_price_gram_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getGram()
	{
		return $this->gram;
	}
	public function setGram($gram)
	{
		$this->gram = $gram;
	}

	public function getGram_price()
	{
		return $this->gram_price;
	}
	public function setGram_price($gram_price)
	{
		$this->gram_price = $gram_price;
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