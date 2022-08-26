<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="delivery_method_master")
*/
class Deliverymethodmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $delivery_method_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $name="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $note="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_delivery_method_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getDelivery_method_master_id()
	{
		return $this->delivery_method_master_id;
	}

	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getNote()
	{
		return $this->note;
	}
	public function setNote($note)
	{
		$this->note = $note;
	}

	public function getMain_delivery_method_master_id()
	{
		return $this->main_delivery_method_master_id;
	}
	public function setMain_delivery_method_master_id($main_delivery_method_master_id)
	{
		$this->main_delivery_method_master_id = $main_delivery_method_master_id;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
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