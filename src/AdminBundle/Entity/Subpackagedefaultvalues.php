<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="sub_package_default_values")
*/
class Subpackagedefaultvalues
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $sub_package_default_values_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_type_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $day_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $week_id="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_value=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $default_value_flag="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getSub_package_default_values_id()
	{
		return $this->sub_package_default_values_id;
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

	public function getDay_id()
	{
		return $this->day_id;
	}
	public function setDay_id($day_id)
	{
		$this->day_id = $day_id;
	}

	public function getWeek_id()
	{
		return $this->week_id;
	}
	public function setWeek_id($week_id)
	{
		$this->week_id = $week_id;
	}

	public function getMeal_value()
	{
		return $this->meal_value;
	}
	public function setMeal_value($meal_value)
	{
		$this->meal_value = $meal_value;
	}

	public function getDefault_value_flag()
	{
		return $this->default_value_flag;
	}
	public function setDefault_value_flag($default_value_flag)
	{
		$this->default_value_flag = $default_value_flag;
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