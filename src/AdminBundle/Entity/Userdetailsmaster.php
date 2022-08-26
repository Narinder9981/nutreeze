<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="user_details_master")
*/
class Userdetailsmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $user_details_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_goal_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $know_what_to_eat="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $need_consulatant_for="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_consult_for_schedule="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_consult_for_workout="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $body_report=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getUser_details_master_id()
	{
		return $this->user_details_master_id;
	}

	public function getUser_master_id()
	{
		return $this->user_master_id;
	}
	public function setUser_master_id($user_master_id)
	{
		$this->user_master_id = $user_master_id;
	}

	public function getUser_goal_id()
	{
		return $this->user_goal_id;
	}
	public function setUser_goal_id($user_goal_id)
	{
		$this->user_goal_id = $user_goal_id;
	}

	public function getKnow_what_to_eat()
	{
		return $this->know_what_to_eat;
	}
	public function setKnow_what_to_eat($know_what_to_eat)
	{
		$this->know_what_to_eat = $know_what_to_eat;
	}

	public function getNeed_consulatant_for()
	{
		return $this->need_consulatant_for;
	}
	public function setNeed_consulatant_for($need_consulatant_for)
	{
		$this->need_consulatant_for = $need_consulatant_for;
	}

	public function getIs_consult_for_schedule()
	{
		return $this->is_consult_for_schedule;
	}
	public function setIs_consult_for_schedule($is_consult_for_schedule)
	{
		$this->is_consult_for_schedule = $is_consult_for_schedule;
	}

	public function getIs_consult_for_workout()
	{
		return $this->is_consult_for_workout;
	}
	public function setIs_consult_for_workout($is_consult_for_workout)
	{
		$this->is_consult_for_workout = $is_consult_for_workout;
	}

	public function getBody_report()
	{
		return $this->body_report;
	}
	public function setBody_report($body_report)
	{
		$this->body_report = $body_report;
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