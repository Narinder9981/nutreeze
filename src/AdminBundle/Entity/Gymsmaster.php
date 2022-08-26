<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="gyms_master")
*/
class Gymsmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $gyms_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $gym_name = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $tag_line = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $description = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $address = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $start_day = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $end_day = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_time = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $end_time = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $latitude = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $longitude = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $media_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $status = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_gyms_master_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $country_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted = 0;

	public function getGyms_master_id()
	{
		return $this->gyms_master_id;
	}

	public function getGym_name()
	{
		return $this->gym_name;
	}
	public function setGym_name($gym_name)
	{
		$this->gym_name = $gym_name;
	}

	public function getTag_line()
	{
		return $this->tag_line;
	}
	public function setTag_line($tag_line)
	{
		$this->tag_line = $tag_line;
	}

	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function getStart_day()
	{
		return $this->start_day;
	}
	public function setStart_day($start_day)
	{
		$this->start_day = $start_day;
	}

	public function getEnd_day()
	{
		return $this->end_day;
	}
	public function setEnd_day($end_day)
	{
		$this->end_day = $end_day;
	}

	public function getStart_time()
	{
		return $this->start_time;
	}
	public function setStart_time($start_time)
	{
		$this->start_time = $start_time;
	}

	public function getEnd_time()
	{
		return $this->end_time;
	}
	public function setEnd_time($end_time)
	{
		$this->end_time = $end_time;
	}

	public function getLatitude()
	{
		return $this->latitude;
	}
	public function setLatitude($latitude)
	{
		$this->latitude = $latitude;
	}

	public function getLongitude()
	{
		return $this->longitude;
	}
	public function setLongitude($longitude)
	{
		$this->longitude = $longitude;
	}

	public function getMedia_id()
	{
		return $this->media_id;
	}
	public function setMedia_id($media_id)
	{
		$this->media_id = $media_id;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_gyms_master_id()
	{
		return $this->main_gyms_master_id;
	}
	public function setMain_gyms_master_id($main_gyms_master_id)
	{
		$this->main_gyms_master_id = $main_gyms_master_id;
	}

	public function getCountry_id()
	{
		return $this->country_id;
	}
	public function setCountry_id($country_id)
	{
		$this->country_id = $country_id;
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