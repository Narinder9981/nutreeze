<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="return_policy_master")
*/
class Returnpolicymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $return_policy_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $description="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_policy_id=0;

	
	/**
	* @ORM\Column(type="string")
	*/
	protected $created_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_updated="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getReturn_policy_master_id()
	{
		return $this->return_policy_master_id;
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

	public function getMain_policy_id()
	{
		return $this->main_policy_id;
	}
	public function setMain_policy_id($main_policy_id)
	{
		$this->main_policy_id = $main_policy_id;
	}

	public function getCreated_date()
	{
		return $this->created_date;
	}
	public function setCreated_date($created_date)
	{
		$this->created_date = $created_date;
	}

	public function getLast_updated()
	{
		return $this->last_updated;
	}
	public function setLast_updated($last_updated)
	{
		$this->last_updated = $last_updated;
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