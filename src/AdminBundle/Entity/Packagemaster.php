<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="package_master")
*/
class Packagemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $package_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sort_order=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $festival_affect="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $package_type="";
	/**
	* @ORM\Column(type="string")
	*/
	protected $package_pause="no";

	/**
	* @ORM\Column(type="string")
	*/
	protected $package_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $description="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_grams=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_max_grams_limit=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $gram_label="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $loyality_point=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $off_days_allowed=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_meals=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_snakes=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $price_starting_from="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_package_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $img_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_updated_on="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getPackage_master_id()
	{
		return $this->package_master_id;
	}

	public function getSort_order()
	{
		return $this->sort_order;
	}
	public function setSort_order($sort_order)
	{
		$this->sort_order = $sort_order;
	}

	public function getFestival_affect()
	{
		return $this->festival_affect;
	}
	public function setFestival_affect($festival_affect)
	{
		$this->festival_affect = $festival_affect;
	}

	public function getPackage_type()
	{
		return $this->package_type;
	}
	public function setPackage_type($package_type)
	{
		$this->package_type = $package_type;
	}
	public function getPackage_pause()
	{
		return $this->package_pause;
	}
	public function setPackage_pause($package_pause)
	{
		$this->package_pause = $package_pause;
	}

	public function getPackage_name()
	{
		return $this->package_name;
	}
	public function setPackage_name($package_name)
	{
		$this->package_name = $package_name;
	}

	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getPackage_grams()
	{
		return $this->package_grams;
	}
	public function setPackage_grams($package_grams)
	{
		$this->package_grams = $package_grams;
	}

	public function getPackage_max_grams_limit()
	{
		return $this->package_max_grams_limit;
	}
	public function setPackage_max_grams_limit($package_max_grams_limit)
	{
		$this->package_max_grams_limit = $package_max_grams_limit;
	}

	public function getGram_label()
	{
		return $this->gram_label;
	}
	public function setGram_label($gram_label)
	{
		$this->gram_label = $gram_label;
	}

	public function getLoyality_point()
	{
		return $this->loyality_point;
	}
	public function setLoyality_point($loyality_point)
	{
		$this->loyality_point = $loyality_point;
	}

	public function getOff_days_allowed()
	{
		return $this->off_days_allowed;
	}
	public function setOff_days_allowed($off_days_allowed)
	{
		$this->off_days_allowed = $off_days_allowed;
	}

	public function getPackage_meals()
	{
		return $this->package_meals;
	}
	public function setPackage_meals($package_meals)
	{
		$this->package_meals = $package_meals;
	}

	public function getPackage_snakes()
	{
		return $this->package_snakes;
	}
	public function setPackage_snakes($package_snakes)
	{
		$this->package_snakes = $package_snakes;
	}

	public function getPrice_starting_from()
	{
		return $this->price_starting_from;
	}
	public function setPrice_starting_from($price_starting_from)
	{
		$this->price_starting_from = $price_starting_from;
	}

	public function getMain_package_master_id()
	{
		return $this->main_package_master_id;
	}
	public function setMain_package_master_id($main_package_master_id)
	{
		$this->main_package_master_id = $main_package_master_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getImg_id()
	{
		return $this->img_id;
	}
	public function setImg_id($img_id)
	{
		$this->img_id = $img_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getLast_updated_on()
	{
		return $this->last_updated_on;
	}
	public function setLast_updated_on($last_updated_on)
	{
		$this->last_updated_on = $last_updated_on;
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