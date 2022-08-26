<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="height_master")
*/
class Heightmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $height_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $height=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_height_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getHeight_master_id()
	{
		return $this->height_master_id;
	}

	public function getHeight()
	{
		return $this->height;
	}
	public function setHeight($height)
	{
		$this->height = $height;
	}

	public function getMain_height_id()
	{
		return $this->main_height_id;
	}
	public function setMain_height_id($main_height_id)
	{
		$this->main_height_id = $main_height_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
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