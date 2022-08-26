<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="terms_conditions_master")
*/
class Termsconditionsmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $terms_conditions_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $description="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $image_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_terms_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_updated="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getTerms_conditions_master_id()
	{
		return $this->terms_conditions_master_id;
	}

	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getImage_id()
	{
		return $this->image_id;
	}
	public function setImage_id($image_id)
	{
		$this->image_id = $image_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_terms_id()
	{
		return $this->main_terms_id;
	}
	public function setMain_terms_id($main_terms_id)
	{
		$this->main_terms_id = $main_terms_id;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
	}

	public function getCreate_date()
	{
		return $this->create_date;
	}
	public function setCreate_date($create_date)
	{
		$this->create_date = $create_date;
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