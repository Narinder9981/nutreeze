<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="time_master")
*/
class Timemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $time_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $time_text;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $gym_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getTime_text()
	{
		return $this->time_text;
	}
	public function setTime_text($time_text)
	{
		$this->time_text = $time_text;
	}
	
	public function getGym_id()
	{
		return $this->gym_id;
	}
	public function setGym_id($gym_id)
	{
		$this->gym_id = $gym_id;
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
	* Get time_id
	* 
	* @return integer
	*/
	public function getTime_id()
	{
		return $this->time_id;
	}
	
}