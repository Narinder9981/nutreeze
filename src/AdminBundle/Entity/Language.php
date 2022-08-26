<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="language")
*/
class Language
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $language_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $language_name;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $language_status;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_createdby;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $language_dateadded;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getLanguage_name()
	{
		return $this->language_name;
	}
	public function setLanguage_name($language_name)
	{
		$this->language_name = $language_name;
	}
	
	public function getLanguage_status()
	{
		return $this->language_status;
	}
	public function setLanguage_status($language_status)
	{
		$this->language_status = $language_status;
	}
	
	public function getLanguage_createdby()
	{
		return $this->language_createdby;
	}
	public function setLanguage_createdby($language_createdby)
	{
		$this->language_createdby = $language_createdby;
	}
	
	public function getLanguage_dateadded()
	{
		return $this->language_dateadded;
	}
	public function setLanguage_dateadded($language_dateadded)
	{
		$this->language_dateadded = $language_dateadded;
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
	* Get language_id
	* 
	* @return integer
	*/
	public function getLanguage_id()
	{
		return $this->language_id;
	}
	
}