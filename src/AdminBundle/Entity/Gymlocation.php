<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="gym_location")
*/
class Gymlocation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $gym_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $latitude = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $longitude = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted = 0;

	public function getId()
	{
		return $this->id;
	}

	public function getGym_id()
	{
		return $this->gym_id;
	}
	public function setGym_id($gym_id)
	{
		$this->gym_id = $gym_id;
	}

	public function getLatitude()
	{
		return $this->latitude;
	}
	public function setLatitude($latitude)
	{
		$this->latitude = $latitude;
	}

	public function getLongitude()
	{
		return $this->longitude;
	}
	public function setLongitude($longitude)
	{
		$this->longitude = $longitude;
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