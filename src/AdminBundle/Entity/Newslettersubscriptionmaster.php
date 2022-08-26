<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="news_letter_subscription_master")
*/
class Newslettersubscriptionmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $news_letter_subscription_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $name=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $email=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_datetime=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $domain_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getNews_letter_subscription_master_id()
	{
		return $this->news_letter_subscription_master_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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