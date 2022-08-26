<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_availability")
*/
class Productavailability
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_availability_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_days_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $week_id="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_availability_id()
	{
		return $this->product_availability_id;
	}

	public function getMain_days_id()
	{
		return $this->main_days_id;
	}
	public function setMain_days_id($main_days_id)
	{
		$this->main_days_id = $main_days_id;
	}

	public function getWeek_id()
	{
		return $this->week_id;
	}
	public function setWeek_id($week_id)
	{
		$this->week_id = $week_id;
	}

	public function getMain_product_id()
	{
		return $this->main_product_id;
	}
	public function setMain_product_id($main_product_id)
	{
		$this->main_product_id = $main_product_id;
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