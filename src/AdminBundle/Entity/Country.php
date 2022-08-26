<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="country")
*/
class Country
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $iso = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $name = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $nicename = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $nickname_ar = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $iso3 = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $numcode = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $phonecode = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $flagfile = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted = 0;

	public function getId()
	{
		return $this->id;
	}

	public function getIso()
	{
		return $this->iso;
	}
	public function setIso($iso)
	{
		$this->iso = $iso;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getNicename()
	{
		return $this->nicename;
	}
	public function setNicename($nicename)
	{
		$this->nicename = $nicename;
	}

	public function getNickname_ar()
	{
		return $this->nickname_ar;
	}
	public function setNickname_ar($nickname_ar)
	{
		$this->nickname_ar = $nickname_ar;
	}

	public function getIso3()
	{
		return $this->iso3;
	}
	public function setIso3($iso3)
	{
		$this->iso3 = $iso3;
	}

	public function getNumcode()
	{
		return $this->numcode;
	}
	public function setNumcode($numcode)
	{
		$this->numcode = $numcode;
	}

	public function getPhonecode()
	{
		return $this->phonecode;
	}
	public function setPhonecode($phonecode)
	{
		$this->phonecode = $phonecode;
	}

	public function getFlagfile()
	{
		return $this->flagfile;
	}
	public function setFlagfile($flagfile)
	{
		$this->flagfile = $flagfile;
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