<?php
//-----------------------------------------------------------
//-------- File created using SYMFONY ENTITY GENERATOR ------
//-------- SEG Created By : Nirmesh Mashru ------------------
//-------- SEG Updated By : Mehul Panchasara ----------------
//-----------------------------------------------------------

namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="event_comment")
*/
class Eventcomment{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $event_comment_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $event_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id;
	
	/**
	* @ORM\Column(type="text")
	*/
	protected $comment_text;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $comment_datetime;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getEvent_id(){
		return $this->event_id;
	}
	public function setEvent_id($event_id){
		$this->event_id = $event_id;
	}
	
	public function getUser_id(){
		return $this->user_id;
	}
	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}
	
	public function getComment_text(){
		return $this->comment_text;
	}
	public function setComment_text($comment_text){
		$this->comment_text = $comment_text;
	}
	
	public function getComment_datetime(){
		return $this->comment_datetime;
	}
	public function setComment_datetime($comment_datetime){
		$this->comment_datetime = $comment_datetime;
	}
	
	public function getIs_deleted(){
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted){
		$this->is_deleted = $is_deleted;
	}
	
	/**
	* Get event_comment_id
	* @return integer
	*/
	public function getEvent_comment_id(){
		return $this->event_comment_id;
	}
}