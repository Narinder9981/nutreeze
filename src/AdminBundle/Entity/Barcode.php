<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="barcode")
*/
class Barcode
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $barcode_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $barcode_url = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_date = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted = 0;

	public function getBarcode_id()
	{
		return $this->barcode_id;
	}

	public function getBarcode_url()
	{
		return $this->barcode_url;
	}
	public function setBarcode_url($barcode_url)
	{
		$this->barcode_url = $barcode_url;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
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