<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_rating_master")
*/
class Productratingmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_rating_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $product_meal_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $ratings="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_rating_master_id()
	{
		return $this->product_rating_master_id;
	}

	public function getMain_product_id()
	{
		return $this->main_product_id;
	}
	public function setMain_product_id($main_product_id)
	{
		$this->main_product_id = $main_product_id;
	}

	public function getProduct_meal_id()
	{
		return $this->product_meal_id;
	}
	public function setProduct_meal_id($product_meal_id)
	{
		$this->product_meal_id = $product_meal_id;
	}

	public function getUser_master_id()
	{
		return $this->user_master_id;
	}
	public function setUser_master_id($user_master_id)
	{
		$this->user_master_id = $user_master_id;
	}

	public function getRatings()
	{
		return $this->ratings;
	}
	public function setRatings($ratings)
	{
		$this->ratings = $ratings;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
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