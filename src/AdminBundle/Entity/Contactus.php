<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="contact_us")
*/
class Contactus
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $contact_us_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $address;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $email_address;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $contact_no1;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $contact_no2;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $start_day;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $end_day;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $start_time;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $end_time;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $latitude;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $longitude;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $last_updated_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($address)
	{
		$this->address = $address;
	}
	
	public function getEmail_address()
	{
		return $this->email_address;
	}
	public function setEmail_address($email_address)
	{
		$this->email_address = $email_address;
	}
	
	public function getContact_no1()
	{
		return $this->contact_no1;
	}
	public function setContact_no1($contact_no1)
	{
		$this->contact_no1 = $contact_no1;
	}
	
	public function getContact_no2()
	{
		return $this->contact_no2;
	}
	public function setContact_no2($contact_no2)
	{
		$this->contact_no2 = $contact_no2;
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
	
	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}
	
	public function getLast_updated_date()
	{
		return $this->last_updated_date;
	}
	public function setLast_updated_date($last_updated_date)
	{
		$this->last_updated_date = $last_updated_date;
	}
	
	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}
	
	/**
	* Get contact_us_id
	* 
	* @return integer
	*/
	public function getContact_us_id()
	{
		return $this->contact_us_id;
	}
	
}