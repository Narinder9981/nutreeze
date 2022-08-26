<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="days_master")
*/
class Daysmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $days_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $days_name="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_days_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getDays_master_id()
	{
		return $this->days_master_id;
	}

	public function getDays_name()
	{
		return $this->days_name;
	}
	public function setDays_name($days_name)
	{
		$this->days_name = $days_name;
	}

	public function getMain_days_master_id()
	{
		return $this->main_days_master_id;
	}
	public function setMain_days_master_id($main_days_master_id)
	{
		$this->main_days_master_id = $main_days_master_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
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