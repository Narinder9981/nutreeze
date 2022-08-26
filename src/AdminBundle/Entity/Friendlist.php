<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="friend_list")
*/
class Friendlist
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $friend_list_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $usermaster_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $friend_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $friend_request;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $conformation;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getUsermaster_id()
	{
		return $this->usermaster_id;
	}
	public function setUsermaster_id($usermaster_id)
	{
		$this->usermaster_id = $usermaster_id;
	}
	
	public function getFriend_id()
	{
		return $this->friend_id;
	}
	public function setFriend_id($friend_id)
	{
		$this->friend_id = $friend_id;
	}
	
	public function getFriend_request()
	{
		return $this->friend_request;
	}
	public function setFriend_request($friend_request)
	{
		$this->friend_request = $friend_request;
	}
	
	public function getConformation()
	{
		return $this->conformation;
	}
	public function setConformation($conformation)
	{
		$this->conformation = $conformation;
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
	* Get friend_list_id
	* 
	* @return integer
	*/
	public function getFriend_list_id()
	{
		return $this->friend_list_id;
	}
	
}