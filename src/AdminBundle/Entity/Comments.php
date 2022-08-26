<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="comments")
*/
class Comments
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $comments_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $comment_text;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $comment_by;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $comment_of;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $comment_of_user_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getComment_text()
	{
		return $this->comment_text;
	}
	public function setComment_text($comment_text)
	{
		$this->comment_text = $comment_text;
	}
	
	public function getCreate_date()
	{
		return $this->create_date;
	}
	public function setCreate_date($create_date)
	{
		$this->create_date = $create_date;
	}
	
	public function getComment_by()
	{
		return $this->comment_by;
	}
	public function setComment_by($comment_by)
	{
		$this->comment_by = $comment_by;
	}
	
	public function getComment_of()
	{
		return $this->comment_of;
	}
	public function setComment_of($comment_of)
	{
		$this->comment_of = $comment_of;
	}
	
	public function getComment_of_user_id()
	{
		return $this->comment_of_user_id;
	}
	public function setComment_of_user_id($comment_of_user_id)
	{
		$this->comment_of_user_id = $comment_of_user_id;
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
	* Get comments_id
	* 
	* @return integer
	*/
	public function getComments_id()
	{
		return $this->comments_id;
	}
	
}