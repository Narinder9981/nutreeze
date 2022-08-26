<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="days_of_week")
*/
class Daysofweek
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $week_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $day;
	
	public function getDay()
	{
		return $this->day;
	}
	public function setDay($day)
	{
		$this->day = $day;
	}
	
	/**
	* Get week_id
	* 
	* @return integer
	*/
	public function getWeek_id()
	{
		return $this->week_id;
	}
	
}