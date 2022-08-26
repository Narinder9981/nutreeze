<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="subscription_request")
*/
class Subscriptionrequest
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $subscription_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $email="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_at="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_deleted="";

	public function getSubscription_id()
	{
		return $this->subscription_id;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getCreated_at()
	{
		return $this->created_at;
	}
	public function setCreated_at($created_at)
	{
		$this->created_at = $created_at;
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
