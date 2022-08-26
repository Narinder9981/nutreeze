<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="package_for_with_package_relation")
*/
class Packageforwithpackagerelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $package_for_with_package_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_for_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getPackage_for_with_package_relation_id()
	{
		return $this->package_for_with_package_relation_id;
	}

	public function getPackage_for_id()
	{
		return $this->package_for_id;
	}
	public function setPackage_for_id($package_for_id)
	{
		$this->package_for_id = $package_for_id;
	}

	public function getMain_package_id()
	{
		return $this->main_package_id;
	}
	public function setMain_package_id($main_package_id)
	{
		$this->main_package_id = $main_package_id;
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