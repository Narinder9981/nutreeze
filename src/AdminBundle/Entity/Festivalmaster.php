<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="festival_master")
*/
class Festivalmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $festival_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $festival_name_english="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $festival_name_arabic="";

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
	protected $is_archive=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getFestival_master_id()
	{
		return $this->festival_master_id;
	}

	public function getFestival_name_english()
	{
		return $this->festival_name_english;
	}
	public function setFestival_name_english($festival_name_english)
	{
		$this->festival_name_english = $festival_name_english;
	}

	public function getFestival_name_arabic()
	{
		return $this->festival_name_arabic;
	}
	public function setFestival_name_arabic($festival_name_arabic)
	{
		$this->festival_name_arabic = $festival_name_arabic;
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

	public function getIs_archive()
	{
		return $this->is_archive;
	}
	public function setIs_archive($is_archive)
	{
		$this->is_archive = $is_archive;
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