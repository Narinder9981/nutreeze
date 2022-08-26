<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="area_master")
*/
class Areamaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $area_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $area_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $area_code="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $city_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $pincode=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $delivery_charge="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_area_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getArea_master_id()
	{
		return $this->area_master_id;
	}

	public function getArea_name()
	{
		return $this->area_name;
	}
	public function setArea_name($area_name)
	{
		$this->area_name = $area_name;
	}

	public function getArea_code()
	{
		return $this->area_code;
	}
	public function setArea_code($area_code)
	{
		$this->area_code = $area_code;
	}

	public function getCity_id()
	{
		return $this->city_id;
	}
	public function setCity_id($city_id)
	{
		$this->city_id = $city_id;
	}

	public function getPincode()
	{
		return $this->pincode;
	}
	public function setPincode($pincode)
	{
		$this->pincode = $pincode;
	}

	public function getDelivery_charge()
	{
		return $this->delivery_charge;
	}
	public function setDelivery_charge($delivery_charge)
	{
		$this->delivery_charge = $delivery_charge;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_area_id()
	{
		return $this->main_area_id;
	}
	public function setMain_area_id($main_area_id)
	{
		$this->main_area_id = $main_area_id;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
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