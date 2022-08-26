<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="sub_package_price_master")
*/
class Subpackagepricemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $sub_package_price_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $duration_type="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_package_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $price="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getSub_package_price_master_id()
	{
		return $this->sub_package_price_master_id;
	}

	public function getDuration_type()
	{
		return $this->duration_type;
	}
	public function setDuration_type($duration_type)
	{
		$this->duration_type = $duration_type;
	}

	public function getSub_package_id()
	{
		return $this->sub_package_id;
	}
	public function setSub_package_id($sub_package_id)
	{
		$this->sub_package_id = $sub_package_id;
	}

	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
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