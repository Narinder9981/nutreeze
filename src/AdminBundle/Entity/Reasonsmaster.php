<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="reasons_master")
*/
class Reasonsmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $not_delivered_reasons_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $reason="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_by=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_reason_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getNot_delivered_reasons_master_id()
	{
		return $this->not_delivered_reasons_master_id;
	}

	public function getReason()
	{
		return $this->reason;
	}
	public function setReason($reason)
	{
		$this->reason = $reason;
	}

	public function getCreated_by()
	{
		return $this->created_by;
	}
	public function setCreated_by($created_by)
	{
		$this->created_by = $created_by;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_reason_id()
	{
		return $this->main_reason_id;
	}
	public function setMain_reason_id($main_reason_id)
	{
		$this->main_reason_id = $main_reason_id;
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