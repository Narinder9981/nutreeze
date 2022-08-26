<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name=" clientof_month")
*/
class Clientofmonth
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $clientof_month_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $usermaster_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $year = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $month = "";

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

	/**
	* @ORM\Column(type="string")
	*/
	protected $description = "";

	public function getClientof_month_id()
	{
		return $this->clientof_month_id;
	}

	public function getUsermaster_id()
	{
		return $this->usermaster_id;
	}
	public function setUsermaster_id($usermaster_id)
	{
		$this->usermaster_id = $usermaster_id;
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

	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
}