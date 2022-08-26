<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="sub_package_master")
*/
class Subpackagemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $sub_package_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $grams="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $price="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_sub_package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $min_limit=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $max_limit=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_archive=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getSub_package_master_id()
	{
		return $this->sub_package_master_id;
	}

	public function getMain_package_id()
	{
		return $this->main_package_id;
	}
	public function setMain_package_id($main_package_id)
	{
		$this->main_package_id = $main_package_id;
	}

	public function getGrams()
	{
		return $this->grams;
	}
	public function setGrams($grams)
	{
		$this->grams = $grams;
	}

	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getMain_sub_package_id()
	{
		return $this->main_sub_package_id;
	}
	public function setMain_sub_package_id($main_sub_package_id)
	{
		$this->main_sub_package_id = $main_sub_package_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMin_limit()
	{
		return $this->min_limit;
	}
	public function setMin_limit($min_limit)
	{
		$this->min_limit = $min_limit;
	}

	public function getMax_limit()
	{
		return $this->max_limit;
	}
	public function setMax_limit($max_limit)
	{
		$this->max_limit = $max_limit;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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