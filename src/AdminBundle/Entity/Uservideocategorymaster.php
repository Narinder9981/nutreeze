<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="user_video_category_master")
*/
class Uservideocategorymaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $user_video_category_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $name="";

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
	protected $main_user_video_category_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getUser_video_category_master_id()
	{
		return $this->user_video_category_master_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
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

	public function getMain_user_video_category_master_id()
	{
		return $this->main_user_video_category_master_id;
	}
	public function setMain_user_video_category_master_id($main_user_video_category_master_id)
	{
		$this->main_user_video_category_master_id = $main_user_video_category_master_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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