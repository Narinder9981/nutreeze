<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="country_master")
*/
class Countrymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $country_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $country_name="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_country_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $std_code="";

	public function getCountry_id()
	{
		return $this->country_id;
	}

	public function getCountry_name()
	{
		return $this->country_name;
	}
	public function setCountry_name($country_name)
	{
		$this->country_name = $country_name;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_country_id()
	{
		return $this->main_country_id;
	}
	public function setMain_country_id($main_country_id)
	{
		$this->main_country_id = $main_country_id;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}

	public function getStd_code()
	{
		return $this->std_code;
	}
	public function setStd_code($std_code)
	{
		$this->std_code = $std_code;
	}
}