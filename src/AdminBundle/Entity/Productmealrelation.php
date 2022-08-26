<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_meal_relation")
*/
class Productmealrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_meal_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $product_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $prot_carb="";

	/**
	* @ORM\Column(type="float")
	*/
	protected $calory=0;

	/**
	* @ORM\Column(type="float")
	*/
	protected $fat=0;

	/**
	* @ORM\Column(type="float")
	*/
	protected $protein=0;

	/**
	* @ORM\Column(type="float")
	*/
	protected $carb=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	
	public function getProduct_meal_relation_id()
	{
		return $this->product_meal_relation_id;
	}

	public function getProduct_master_id()
	{
		return $this->product_master_id;
	}
	
	public function setProduct_master_id($product_master_id)
	{
		$this->product_master_id = $product_master_id;
	}

	public function getPackage_master_id()
	{
		return $this->package_master_id;
	}
	public function setPackage_master_id($package_master_id)
	{
		$this->package_master_id = $package_master_id;
	}

	public function getType()
	{
		return $this->type;
	}
	public function setType($type)
	{
		$this->type = $type;
	}

	public function getProt_carb()
	{
		return $this->prot_carb;
	}
	public function setProt_carb($prot_carb)
	{
		$this->prot_carb = $prot_carb;
	}

	public function getCalory()
	{
		return $this->calory;
	}
	public function setCalory($calory)
	{
		$this->calory = $calory;
	}

	public function getFat()
	{
		return $this->fat;
	}
	public function setFat($fat)
	{
		$this->fat = $fat;
	}

	public function getProtein()
	{
		return $this->protein;
	}
	public function setProtein($protein)
	{
		$this->protein = $protein;
	}

	public function getCarb()
	{
		return $this->carb;
	}
	public function setCarb($carb)
	{
		$this->carb = $carb;
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