<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="why_us")
*/
class Whyus
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $about_us_id;

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
	protected $main_about_us_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_deleted="";

	public function getAbout_us_id()
	{
		return $this->about_us_id;
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

	public function getMain_about_us_id()
	{
		return $this->main_about_us_id;
	}
	public function setMain_about_us_id($main_about_us_id)
	{
		$this->main_about_us_id = $main_about_us_id;
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
}
