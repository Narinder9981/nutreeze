<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="common_gallery_master")
*/
class Commongallerymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $common_gallery_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $media_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $media_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getCommon_gallery_master_id()
	{
		return $this->common_gallery_master_id;
	}

	public function getMedia_id()
	{
		return $this->media_id;
	}
	public function setMedia_id($media_id)
	{
		$this->media_id = $media_id;
	}

	public function getMedia_type()
	{
		return $this->media_type;
	}
	public function setMedia_type($media_type)
	{
		$this->media_type = $media_type;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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