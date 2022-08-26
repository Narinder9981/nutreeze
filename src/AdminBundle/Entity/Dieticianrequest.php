<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="dietician_requests")
*/
class Dieticianrequest
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $dietician_request_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $gender="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $height="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $weight="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $waist="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $goal="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $appointment_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_date="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getDietician_request_id()
	{
		return $this->dietician_request_id;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getGender()
	{
		return $this->gender;
	}
	public function setGender($gender)
	{
		$this->gender = $gender;
	}

	public function getHeight()
	{
		return $this->height;
	}
	public function setHeight($height)
	{
		$this->height = $height;
	}

	public function getWeight()
	{
		return $this->weight;
	}
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}

	public function getWaist()
	{
		return $this->waist;
	}
	public function setWaist($waist)
	{
		$this->waist = $waist;
	}

	public function getGoal()
	{
		return $this->goal;
	}
	public function setGoal($goal)
	{
		$this->goal = $goal;
	}

	public function getAppointment_date()
	{
		return $this->appointment_date;
	}
	public function setAppointment_date($appointment_date)
	{
		$this->appointment_date = $appointment_date;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getCreated_date()
	{
		return $this->created_date;
	}
	public function setCreated_date($created_date)
	{
		$this->created_date = $created_date;
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