<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_master")
*/
class Productmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $product_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $product_name_ar="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $product_description="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $product_nutrition="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $calory="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $prot="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $carb="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $fat="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $fiber="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $product_image=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_category_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $product_status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $max_meal_value=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_master_id()
	{
		return $this->product_master_id;
	}

	public function getProduct_name()
	{
		return $this->product_name;
	}
	public function setProduct_name($product_name)
	{
		$this->product_name = $product_name;
	}

	public function getProduct_name_ar()
	{
		return $this->product_name_ar;
	}
	public function setProduct_name_ar($product_name_ar)
	{
		$this->product_name_ar = $product_name_ar;
	}

	public function getProduct_description()
	{
		return $this->product_description;
	}
	public function setProduct_description($product_description)
	{
		$this->product_description = $product_description;
	}

	public function getProduct_nutrition()
	{
		return $this->product_nutrition;
	}
	public function setProduct_nutrition($product_nutrition)
	{
		$this->product_nutrition = $product_nutrition;
	}

	public function getCalory()
	{
		return $this->calory;
	}
	public function setCalory($calory)
	{
		$this->calory = $calory;
	}

	public function getProt()
	{
		return $this->prot;
	}
	public function setProt($prot)
	{
		$this->prot = $prot;
	}

	public function getCarb()
	{
		return $this->carb;
	}
	public function setCarb($carb)
	{
		$this->carb = $carb;
	}

	public function getFat()
	{
		return $this->fat;
	}
	public function setFat($fat)
	{
		$this->fat = $fat;
	}

	public function getFiber()
	{
		return $this->fiber;
	}
	public function setFiber($fiber)
	{
		$this->fiber = $fiber;
	}

	public function getProduct_image()
	{
		return $this->product_image;
	}
	public function setProduct_image($product_image)
	{
		$this->product_image = $product_image;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getMain_product_category_id()
	{
		return $this->main_product_category_id;
	}
	public function setMain_product_category_id($main_product_category_id)
	{
		$this->main_product_category_id = $main_product_category_id;
	}

	public function getProduct_status()
	{
		return $this->product_status;
	}
	public function setProduct_status($product_status)
	{
		$this->product_status = $product_status;
	}

	public function getMax_meal_value()
	{
		return $this->max_meal_value;
	}
	public function setMax_meal_value($max_meal_value)
	{
		$this->max_meal_value = $max_meal_value;
	}

	public function getMain_product_master_id()
	{
		return $this->main_product_master_id;
	}
	public function setMain_product_master_id($main_product_master_id)
	{
		$this->main_product_master_id = $main_product_master_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
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