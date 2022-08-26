<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_note_master")
*/
class Ordernotemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_note_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $order_note_text="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_order_note_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getOrder_note_master_id()
	{
		return $this->order_note_master_id;
	}

	public function getOrder_note_text()
	{
		return $this->order_note_text;
	}
	public function setOrder_note_text($order_note_text)
	{
		$this->order_note_text = $order_note_text;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_order_note_id()
	{
		return $this->main_order_note_id;
	}
	public function setMain_order_note_id($main_order_note_id)
	{
		$this->main_order_note_id = $main_order_note_id;
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
