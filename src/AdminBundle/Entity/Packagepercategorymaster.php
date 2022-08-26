<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="package_per_category_master")
*/
class Packagepercategorymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $package_per_category_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_type_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $unit_price="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getPackage_per_category_master_id()
	{
		return $this->package_per_category_master_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getMeal_type_id()
	{
		return $this->meal_type_id;
	}
	public function setMeal_type_id($meal_type_id)
	{
		$this->meal_type_id = $meal_type_id;
	}

	public function getUnit_price()
	{
		return $this->unit_price;
	}
	public function setUnit_price($unit_price)
	{
		$this->unit_price = $unit_price;
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