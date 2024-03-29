<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="address_master")
*/
class Addressmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $address_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $address_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $address_name2="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $optional_address="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $owner_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $base_address_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $address_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $contact_no="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $city_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $area_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $street="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $flate_house_number="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $flat_no="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $society_building_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $landmark="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $pincode=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_address_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_defaulte_ship_address="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $gmap_link="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $lat="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $lng="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $domain_id="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;
	/**
	* @ORM\Column(type="string")
	*/
	protected $last_modified_date;

	public function getAddress_master_id()
	{
		return $this->address_master_id;
	}

	public function getAddress_name()
	{
		return $this->address_name;
	}
	public function setAddress_name($address_name)
	{
		$this->address_name = $address_name;
	}
	public function getOptional_address()
	{
		return $this->optional_address;
	}
	public function setOptional_address($optional_address)
	{
		$this->optional_address = $optional_address;
	}

	public function getAddress_name2()
	{
		return $this->address_name2;
	}
	public function setAddress_name2($address_name2)
	{
		$this->address_name2 = $address_name2;
	}

	public function getOwner_id()
	{
		return $this->owner_id;
	}
	public function setOwner_id($owner_id)
	{
		$this->owner_id = $owner_id;
	}

	public function getBase_address_type()
	{
		return $this->base_address_type;
	}
	public function setBase_address_type($base_address_type)
	{
		$this->base_address_type = $base_address_type;
	}

	public function getAddress_type()
	{
		return $this->address_type;
	}
	public function setAddress_type($address_type)
	{
		$this->address_type = $address_type;
	}

	public function getContact_no()
	{
		return $this->contact_no;
	}
	public function setContact_no($contact_no)
	{
		$this->contact_no = $contact_no;
	}

	public function getCity_id()
	{
		return $this->city_id;
	}
	public function setCity_id($city_id)
	{
		$this->city_id = $city_id;
	}

	public function getArea_id()
	{
		return $this->area_id;
	}
	public function setArea_id($area_id)
	{
		$this->area_id = $area_id;
	}

	public function getStreet()
	{
		return $this->street;
	}
	public function setStreet($street)
	{
		$this->street = $street;
	}

	public function getFlate_house_number()
	{
		return $this->flate_house_number;
	}
	public function setFlate_house_number($flate_house_number)
	{
		$this->flate_house_number = $flate_house_number;
	}

	public function getFlat_no()
	{
		return $this->flat_no;
	}
	public function setFlat_no($flat_no)
	{
		$this->flat_no = $flat_no;
	}

	public function getSociety_building_name()
	{
		return $this->society_building_name;
	}
	public function setSociety_building_name($society_building_name)
	{
		$this->society_building_name = $society_building_name;
	}

	public function getLandmark()
	{
		return $this->landmark;
	}
	public function setLandmark($landmark)
	{
		$this->landmark = $landmark;
	}

	public function getPincode()
	{
		return $this->pincode;
	}
	public function setPincode($pincode)
	{
		$this->pincode = $pincode;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_address_id()
	{
		return $this->main_address_id;
	}
	public function setMain_address_id($main_address_id)
	{
		$this->main_address_id = $main_address_id;
	}

	public function getIs_defaulte_ship_address()
	{
		return $this->is_defaulte_ship_address;
	}
	public function setIs_defaulte_ship_address($is_defaulte_ship_address)
	{
		$this->is_defaulte_ship_address = $is_defaulte_ship_address;
	}

	public function getGmap_link()
	{
		return $this->gmap_link;
	}
	public function setGmap_link($gmap_link)
	{
		$this->gmap_link = $gmap_link;
	}

	public function getLat()
	{
		return $this->lat;
	}
	public function setLat($lat)
	{
		$this->lat = $lat;
	}

	public function getLng()
	{
		return $this->lng;
	}
	public function setLng($lng)
	{
		$this->lng = $lng;
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

	public function getLast_modified_date()
	{
		return $this->last_modified_date;
	}
	public function setLast_modified_date($last_modified_date)
	{
		$this->last_modified_date = $last_modified_date;
	}
}