<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_allergy_relation")
*/
class Productallergyrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_allergy_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_product_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_allergy_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_allergy_relation_id()
	{
		return $this->product_allergy_relation_id;
	}

	public function getMain_product_id()
	{
		return $this->main_product_id;
	}
	public function setMain_product_id($main_product_id)
	{
		$this->main_product_id = $main_product_id;
	}

	public function getMain_allergy_id()
	{
		return $this->main_allergy_id;
	}
	public function setMain_allergy_id($main_allergy_id)
	{
		$this->main_allergy_id = $main_allergy_id;
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