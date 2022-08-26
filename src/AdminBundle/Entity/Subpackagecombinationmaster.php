<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="sub_package_combination_master")
*/
class Subpackagecombinationmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $sub_package_combination_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_type_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $meal_value="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_by=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getSub_package_combination_master_id()
	{
		return $this->sub_package_combination_master_id;
	}

	public function getSub_package_id()
	{
		return $this->sub_package_id;
	}
	public function setSub_package_id($sub_package_id)
	{
		$this->sub_package_id = $sub_package_id;
	}

	public function getMeal_type_id()
	{
		return $this->meal_type_id;
	}
	public function setMeal_type_id($meal_type_id)
	{
		$this->meal_type_id = $meal_type_id;
	}

	public function getMeal_value()
	{
		return $this->meal_value;
	}
	public function setMeal_value($meal_value)
	{
		$this->meal_value = $meal_value;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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
}