<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_category_master")
*/
class Productcategorymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_category_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $product_category_name="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_category_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $count_in="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $product_category_image_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_category_master_id()
	{
		return $this->product_category_master_id;
	}

	public function getProduct_category_name()
	{
		return $this->product_category_name;
	}
	public function setProduct_category_name($product_category_name)
	{
		$this->product_category_name = $product_category_name;
	}

	public function getMain_product_category_master_id()
	{
		return $this->main_product_category_master_id;
	}
	public function setMain_product_category_master_id($main_product_category_master_id)
	{
		$this->main_product_category_master_id = $main_product_category_master_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getCount_in()
	{
		return $this->count_in;
	}
	public function setCount_in($count_in)
	{
		$this->count_in = $count_in;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getProduct_category_image_id()
	{
		return $this->product_category_image_id;
	}
	public function setProduct_category_image_id($product_category_image_id)
	{
		$this->product_category_image_id = $product_category_image_id;
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