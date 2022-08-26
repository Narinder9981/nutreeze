<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="gallery")
*/
class Gallery
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $gallery_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $media_master_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $media_type_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $media_location;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $media_name;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getMedia_master_id()
	{
		return $this->media_master_id;
	}
	public function setMedia_master_id($media_master_id)
	{
		$this->media_master_id = $media_master_id;
	}
	
	public function getMedia_type_id()
	{
		return $this->media_type_id;
	}
	public function setMedia_type_id($media_type_id)
	{
		$this->media_type_id = $media_type_id;
	}
	
	public function getMedia_location()
	{
		return $this->media_location;
	}
	public function setMedia_location($media_location)
	{
		$this->media_location = $media_location;
	}
	
	public function getMedia_name()
	{
		return $this->media_name;
	}
	public function setMedia_name($media_name)
	{
		$this->media_name = $media_name;
	}
	
	public function getCreate_date()
	{
		return $this->create_date;
	}
	public function setCreate_date($create_date)
	{
		$this->create_date = $create_date;
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
	* Get gallery_id
	* 
	* @return integer
	*/
	public function getGallery_id()
	{
		return $this->gallery_id;
	}
	
}