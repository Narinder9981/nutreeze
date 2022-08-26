<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="timetable")
*/
class Timetable
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $timetable_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $gym_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $time_slot_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $day;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $year;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $month;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $event_title;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getGym_id()
	{
		return $this->gym_id;
	}
	public function setGym_id($gym_id)
	{
		$this->gym_id = $gym_id;
	}
	
	public function getTime_slot_id()
	{
		return $this->time_slot_id;
	}
	public function setTime_slot_id($time_slot_id)
	{
		$this->time_slot_id = $time_slot_id;
	}
	
	public function getDay()
	{
		return $this->day;
	}
	public function setDay($day)
	{
		$this->day = $day;
	}
	
	public function getYear()
	{
		return $this->year;
	}
	public function setYear($year)
	{
		$this->year = $year;
	}
	
	public function getMonth()
	{
		return $this->month;
	}
	public function setMonth($month)
	{
		$this->month = $month;
	}
	
	public function getEvent_title()
	{
		return $this->event_title;
	}
	public function setEvent_title($event_title)
	{
		$this->event_title = $event_title;
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
	
	/**
	* Get timetable_id
	* 
	* @return integer
	*/
	public function getTimetable_id()
	{
		return $this->timetable_id;
	}
	
}