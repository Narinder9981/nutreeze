<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="event_master")
*/
class Eventmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $event_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $event_name = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $event_description = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $media_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $status = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $event_date = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_event_master_id = 0;

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

	public function getEvent_master_id()
	{
		return $this->event_master_id;
	}

	public function getEvent_name()
	{
		return $this->event_name;
	}
	public function setEvent_name($event_name)
	{
		$this->event_name = $event_name;
	}

	public function getEvent_description()
	{
		return $this->event_description;
	}
	public function setEvent_description($event_description)
	{
		$this->event_description = $event_description;
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

	public function getEvent_date()
	{
		return $this->event_date;
	}
	public function setEvent_date($event_date)
	{
		$this->event_date = $event_date;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_event_master_id()
	{
		return $this->main_event_master_id;
	}
	public function setMain_event_master_id($main_event_master_id)
	{
		$this->main_event_master_id = $main_event_master_id;
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