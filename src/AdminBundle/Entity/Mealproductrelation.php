<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="meal_product_relation")
*/
class Mealproductrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $meal_product_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_product_qty=1;

	/**
	* @ORM\Column(type="string")
	*/
	protected $proteins_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $carbs_amount="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $selected_proteins="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $selected_carbs="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $raw_eggs=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $white_eggs=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $calory="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_type=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $meal_id=0;

	public function getMeal_product_relation_id()
	{
		return $this->meal_product_relation_id;
	}

	public function getMain_product_id()
	{
		return $this->main_product_id;
	}
	public function setMain_product_id($main_product_id)
	{
		$this->main_product_id = $main_product_id;
	}

	public function getMeal_product_qty()
	{
		return $this->meal_product_qty;
	}
	public function setMeal_product_qty($meal_product_qty)
	{
		$this->meal_product_qty = $meal_product_qty;
	}

	public function getProteins_amount()
	{
		return $this->proteins_amount;
	}
	public function setProteins_amount($proteins_amount)
	{
		$this->proteins_amount = $proteins_amount;
	}

	public function getCarbs_amount()
	{
		return $this->carbs_amount;
	}
	public function setCarbs_amount($carbs_amount)
	{
		$this->carbs_amount = $carbs_amount;
	}

	public function getSelected_proteins()
	{
		return $this->selected_proteins;
	}
	public function setSelected_proteins($selected_proteins)
	{
		$this->selected_proteins = $selected_proteins;
	}

	public function getSelected_carbs()
	{
		return $this->selected_carbs;
	}
	public function setSelected_carbs($selected_carbs)
	{
		$this->selected_carbs = $selected_carbs;
	}

	public function getRaw_eggs()
	{
		return $this->raw_eggs;
	}
	public function setRaw_eggs($raw_eggs)
	{
		$this->raw_eggs = $raw_eggs;
	}

	public function getWhite_eggs()
	{
		return $this->white_eggs;
	}
	public function setWhite_eggs($white_eggs)
	{
		$this->white_eggs = $white_eggs;
	}

	public function getCalory()
	{
		return $this->calory;
	}
	public function setCalory($calory)
	{
		$this->calory = $calory;
	}

	public function getMeal_type()
	{
		return $this->meal_type;
	}
	public function setMeal_type($meal_type)
	{
		$this->meal_type = $meal_type;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}

	public function getMeal_id()
	{
		return $this->meal_id;
	}
	public function setMeal_id($meal_id)
	{
		$this->meal_id = $meal_id;
	}
}