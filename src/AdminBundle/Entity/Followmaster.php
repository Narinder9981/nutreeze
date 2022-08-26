<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="follow_master")
*/
class Followmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $follow_master_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $usermaster_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $follower_id;
	
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
	
	public function getFollower_id()
	{
		return $this->follower_id;
	}
	public function setFollower_id($follower_id)
	{
		$this->follower_id = $follower_id;
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
	* Get follow_master_id
	* 
	* @return integer
	*/
	public function getFollow_master_id()
	{
		return $this->follow_master_id;
	}
	
}