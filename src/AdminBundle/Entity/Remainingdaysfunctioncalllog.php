<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="remaining_days_function_call_log")
*/
class Remainingdaysfunctioncalllog
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $remaining_days_function_call_log_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $called_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $ip_address="";

	public function getRemaining_days_function_call_log_id()
	{
		return $this->remaining_days_function_call_log_id;
	}

	public function getCalled_datetime()
	{
		return $this->called_datetime;
	}
	public function setCalled_datetime($called_datetime)
	{
		$this->called_datetime = $called_datetime;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getIp_address()
	{
		return $this->ip_address;
	}
	public function setIp_address($ip_address)
	{
		$this->ip_address = $ip_address;
	}
}