<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="gallery_likes")
*/
class Gallerylikes
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $like_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $gallery_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_on;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;

	public function getLike_id()
	{
		return $this->like_id;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getGallery_id()
	{
		return $this->gallery_id;
	}
	public function setGallery_id($gallery_id)
	{
		$this->gallery_id = $gallery_id;
	}

	public function getCreated_on()
	{
		return $this->created_on;
	}
	public function setCreated_on($created_on)
	{
		$this->created_on = $created_on;
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