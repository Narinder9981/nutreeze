<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="shop_master")
*/
class Shopmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $shop_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $shop_name = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $tag_line = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $shop_cover_pic = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $shop_description = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $shop_address = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $shop_start_day = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $shop_end_day = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $holiday = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $shop_start_time = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $shop_end_time = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_by = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime = "";

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
	protected $language_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_shop_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $total_like = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $country_id = 0;

	public function getShop_id()
	{
		return $this->shop_id;
	}

	public function getShop_name()
	{
		return $this->shop_name;
	}
	public function setShop_name($shop_name)
	{
		$this->shop_name = $shop_name;
	}

	public function getTag_line()
	{
		return $this->tag_line;
	}
	public function setTag_line($tag_line)
	{
		$this->tag_line = $tag_line;
	}

	public function getShop_cover_pic()
	{
		return $this->shop_cover_pic;
	}
	public function setShop_cover_pic($shop_cover_pic)
	{
		$this->shop_cover_pic = $shop_cover_pic;
	}

	public function getShop_description()
	{
		return $this->shop_description;
	}
	public function setShop_description($shop_description)
	{
		$this->shop_description = $shop_description;
	}

	public function getShop_address()
	{
		return $this->shop_address;
	}
	public function setShop_address($shop_address)
	{
		$this->shop_address = $shop_address;
	}

	public function getShop_start_day()
	{
		return $this->shop_start_day;
	}
	public function setShop_start_day($shop_start_day)
	{
		$this->shop_start_day = $shop_start_day;
	}

	public function getShop_end_day()
	{
		return $this->shop_end_day;
	}
	public function setShop_end_day($shop_end_day)
	{
		$this->shop_end_day = $shop_end_day;
	}

	public function getHoliday()
	{
		return $this->holiday;
	}
	public function setHoliday($holiday)
	{
		$this->holiday = $holiday;
	}

	public function getShop_start_time()
	{
		return $this->shop_start_time;
	}
	public function setShop_start_time($shop_start_time)
	{
		$this->shop_start_time = $shop_start_time;
	}

	public function getShop_end_time()
	{
		return $this->shop_end_time;
	}
	public function setShop_end_time($shop_end_time)
	{
		$this->shop_end_time = $shop_end_time;
	}

	public function getCreated_by()
	{
		return $this->created_by;
	}
	public function setCreated_by($created_by)
	{
		$this->created_by = $created_by;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_shop_id()
	{
		return $this->main_shop_id;
	}
	public function setMain_shop_id($main_shop_id)
	{
		$this->main_shop_id = $main_shop_id;
	}

	public function getTotal_like()
	{
		return $this->total_like;
	}
	public function setTotal_like($total_like)
	{
		$this->total_like = $total_like;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}

	public function getCountry_id()
	{
		return $this->country_id;
	}
	public function setCountry_id($country_id)
	{
		$this->country_id = $country_id;
	}
}