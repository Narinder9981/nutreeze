<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="city_master")
*/
class Citymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $city_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $city_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $city_description="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_city_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date="";
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getCity_master_id()
	{
		return $this->city_master_id;
	}

	public function getCity_name()
	{
		return $this->city_name;
	}
	public function setCity_name($city_name)
	{
		$this->city_name = $city_name;
	}

	public function getCity_description()
	{
		return $this->city_description;
	}
	public function setCity_description($city_description)
	{
		$this->city_description = $city_description;
	}

	public function getMain_city_master_id()
	{
		return $this->main_city_master_id;
	}
	public function setMain_city_master_id($main_city_master_id)
	{
		$this->main_city_master_id = $main_city_master_id;
	}
	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}
	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getCreate_date()
	{
		return $this->create_date;
	}
	public function setCreate_date($create_date)
	{
		$this->create_date = $create_date;
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