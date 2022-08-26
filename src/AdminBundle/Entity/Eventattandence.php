<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="event_attandence")
*/
class Eventattandence
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $event_attandence_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $event_master_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $usermaster_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $status;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getEvent_master_id()
	{
		return $this->event_master_id;
	}
	public function setEvent_master_id($event_master_id)
	{
		$this->event_master_id = $event_master_id;
	}
	
	public function getUsermaster_id()
	{
		return $this->usermaster_id;
	}
	public function setUsermaster_id($usermaster_id)
	{
		$this->usermaster_id = $usermaster_id;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
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
	* Get event_attandence_id
	* 
	* @return integer
	*/
	public function getEvent_attandence_id()
	{
		return $this->event_attandence_id;
	}
	
}