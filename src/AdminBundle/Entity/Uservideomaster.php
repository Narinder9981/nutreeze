<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="user_video_master")
*/
class Uservideomaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $user_video_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $media_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $title="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $video_category=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $thumb_image_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

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
	protected $main_video_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getUser_video_master_id()
	{
		return $this->user_video_master_id;
	}

	public function getMedia_id()
	{
		return $this->media_id;
	}
	public function setMedia_id($media_id)
	{
		$this->media_id = $media_id;
	}

	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getVideo_category()
	{
		return $this->video_category;
	}
	public function setVideo_category($video_category)
	{
		$this->video_category = $video_category;
	}

	public function getThumb_image_id()
	{
		return $this->thumb_image_id;
	}
	public function setThumb_image_id($thumb_image_id)
	{
		$this->thumb_image_id = $thumb_image_id;
	}

	public function getMain_package_id()
	{
		return $this->main_package_id;
	}
	public function setMain_package_id($main_package_id)
	{
		$this->main_package_id = $main_package_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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

	public function getMain_video_master_id()
	{
		return $this->main_video_master_id;
	}
	public function setMain_video_master_id($main_video_master_id)
	{
		$this->main_video_master_id = $main_video_master_id;
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