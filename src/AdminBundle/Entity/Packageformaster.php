<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="package_for_master")
*/
class Packageformaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $package_for_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $name_db="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $description="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $friday_offday="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $price="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $days="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_package_for_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getPackage_for_master_id()
	{
		return $this->package_for_master_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName_db()
	{
		return $this->name_db;
	}
	public function setName_db($name_db)
	{
		$this->name_db = $name_db;
	}

	public function getType()
	{
		return $this->type;
	}
	public function setType($type)
	{
		$this->type = $type;
	}

	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getFriday_offday()
	{
		return $this->friday_offday;
	}
	public function setFriday_offday($friday_offday)
	{
		$this->friday_offday = $friday_offday;
	}

	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getDays()
	{
		return $this->days;
	}
	public function setDays($days)
	{
		$this->days = $days;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_package_for_master_id()
	{
		return $this->main_package_for_master_id;
	}
	public function setMain_package_for_master_id($main_package_for_master_id)
	{
		$this->main_package_for_master_id = $main_package_for_master_id;
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