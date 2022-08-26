<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="comment")
*/
class Comment
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $comment_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $comment_text;

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
	protected $create_data;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;

	public function getComment_id()
	{
		return $this->comment_id;
	}

	public function getComment_text()
	{
		return $this->comment_text;
	}
	public function setComment_text($comment_text)
	{
		$this->comment_text = $comment_text;
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

	public function getCreate_data()
	{
		return $this->create_data;
	}
	public function setCreate_data($create_data)
	{
		$this->create_data = $create_data;
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