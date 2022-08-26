<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="diet_consult_status")
*/
class Dietconsultstatus
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $diet_consult_status_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $diet_consult_status_name="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_diet_consult_status_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getDiet_consult_status_id()
	{
		return $this->diet_consult_status_id;
	}

	public function getDiet_consult_status_name()
	{
		return $this->diet_consult_status_name;
	}
	public function setDiet_consult_status_name($diet_consult_status_name)
	{
		$this->diet_consult_status_name = $diet_consult_status_name;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_diet_consult_status_id()
	{
		return $this->main_diet_consult_status_id;
	}
	public function setMain_diet_consult_status_id($main_diet_consult_status_id)
	{
		$this->main_diet_consult_status_id = $main_diet_consult_status_id;
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