<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="trainer_level_master")
*/
class Trainerlevelmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $trainer_level_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $level_name = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $description = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_trainer_level_master_id = 0;

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

	public function getTrainer_level_master_id()
	{
		return $this->trainer_level_master_id;
	}

	public function getLevel_name()
	{
		return $this->level_name;
	}
	public function setLevel_name($level_name)
	{
		$this->level_name = $level_name;
	}

	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_trainer_level_master_id()
	{
		return $this->main_trainer_level_master_id;
	}
	public function setMain_trainer_level_master_id($main_trainer_level_master_id)
	{
		$this->main_trainer_level_master_id = $main_trainer_level_master_id;
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
}