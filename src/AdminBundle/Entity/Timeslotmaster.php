<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="time_slot_master")
*/
class Timeslotmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $time_slot_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $title="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $note="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $start_time="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $end_time="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_time_slot_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getTime_slot_master_id()
	{
		return $this->time_slot_master_id;
	}

	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getNote()
	{
		return $this->note;
	}
	public function setNote($note)
	{
		$this->note = $note;
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

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_time_slot_master_id()
	{
		return $this->main_time_slot_master_id;
	}
	public function setMain_time_slot_master_id($main_time_slot_master_id)
	{
		$this->main_time_slot_master_id = $main_time_slot_master_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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