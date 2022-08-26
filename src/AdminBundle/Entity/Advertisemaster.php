<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="advertise_master")
*/
class Advertisemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $advertise_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $advertise_name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $advertisement_link="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $advertise_image_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $end_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_advertise_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sort_order=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $advertise_type="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_deleted="";

	public function getAdvertise_master_id()
	{
		return $this->advertise_master_id;
	}

	public function getAdvertise_name()
	{
		return $this->advertise_name;
	}
	public function setAdvertise_name($advertise_name)
	{
		$this->advertise_name = $advertise_name;
	}

	public function getAdvertisement_link()
	{
		return $this->advertisement_link;
	}
	public function setAdvertisement_link($advertisement_link)
	{
		$this->advertisement_link = $advertisement_link;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getAdvertise_image_id()
	{
		return $this->advertise_image_id;
	}
	public function setAdvertise_image_id($advertise_image_id)
	{
		$this->advertise_image_id = $advertise_image_id;
	}

	public function getStart_date()
	{
		return $this->start_date;
	}
	public function setStart_date($start_date)
	{
		$this->start_date = $start_date;
	}

	public function getEnd_date()
	{
		return $this->end_date;
	}
	public function setEnd_date($end_date)
	{
		$this->end_date = $end_date;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getMain_advertise_id()
	{
		return $this->main_advertise_id;
	}
	public function setMain_advertise_id($main_advertise_id)
	{
		$this->main_advertise_id = $main_advertise_id;
	}

	public function getSort_order()
	{
		return $this->sort_order;
	}
	public function setSort_order($sort_order)
	{
		$this->sort_order = $sort_order;
	}

	public function getAdvertise_type()
	{
		return $this->advertise_type;
	}
	public function setAdvertise_type($advertise_type)
	{
		$this->advertise_type = $advertise_type;
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