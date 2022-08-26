<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="exercise_type")
*/
class Exercisetype
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $exercise_type_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $type_name = "";

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

	public function getExercise_type_id()
	{
		return $this->exercise_type_id;
	}

	public function getType_name()
	{
		return $this->type_name;
	}
	public function setType_name($type_name)
	{
		$this->type_name = $type_name;
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