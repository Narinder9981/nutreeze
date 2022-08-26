<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="month")
*/
class Month
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $month_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $month_name;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getMonth_name()
	{
		return $this->month_name;
	}
	public function setMonth_name($month_name)
	{
		$this->month_name = $month_name;
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
	* Get month_id
	* 
	* @return integer
	*/
	public function getMonth_id()
	{
		return $this->month_id;
	}
	
}