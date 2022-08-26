<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="contact_us_feedback")
*/
class Contactusfeedback
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $contact_us_feedback_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $subject="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $email_address="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $phone_number="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $message="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_date="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getContact_us_feedback_id()
	{
		return $this->contact_us_feedback_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getSubject()
	{
		return $this->subject;
	}
	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function getEmail_address()
	{
		return $this->email_address;
	}
	public function setEmail_address($email_address)
	{
		$this->email_address = $email_address;
	}

	public function getPhone_number()
	{
		return $this->phone_number;
	}
	public function setPhone_number($phone_number)
	{
		$this->phone_number = $phone_number;
	}

	public function getMessage()
	{
		return $this->message;
	}
	public function setMessage($message)
	{
		$this->message = $message;
	}

	public function getCreated_date()
	{
		return $this->created_date;
	}
	public function setCreated_date($created_date)
	{
		$this->created_date = $created_date;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
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