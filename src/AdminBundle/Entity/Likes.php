<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="likes")
*/
class Likes
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $likes_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $likes_by;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $likes_of;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $likes_of_user_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getLikes_by()
	{
		return $this->likes_by;
	}
	public function setLikes_by($likes_by)
	{
		$this->likes_by = $likes_by;
	}
	
	public function getLikes_of()
	{
		return $this->likes_of;
	}
	public function setLikes_of($likes_of)
	{
		$this->likes_of = $likes_of;
	}
	
	public function getLikes_of_user_id()
	{
		return $this->likes_of_user_id;
	}
	public function setLikes_of_user_id($likes_of_user_id)
	{
		$this->likes_of_user_id = $likes_of_user_id;
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
	* Get likes_id
	* 
	* @return integer
	*/
	public function getLikes_id()
	{
		return $this->likes_id;
	}
	
}