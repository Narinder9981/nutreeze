<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_combination_master")
*/
class Productcombinationmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_combination_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $product_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $prot_crab="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $prot_type="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_pakage_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_combination_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_combination_master_id()
	{
		return $this->product_combination_master_id;
	}

	public function getProduct_master_id()
	{
		return $this->product_master_id;
	}
	public function setProduct_master_id($product_master_id)
	{
		$this->product_master_id = $product_master_id;
	}

	public function getProt_crab()
	{
		return $this->prot_crab;
	}
	public function setProt_crab($prot_crab)
	{
		$this->prot_crab = $prot_crab;
	}

	public function getProt_type()
	{
		return $this->prot_type;
	}
	public function setProt_type($prot_type)
	{
		$this->prot_type = $prot_type;
	}

	public function getSub_pakage_id()
	{
		return $this->sub_pakage_id;
	}
	public function setSub_pakage_id($sub_pakage_id)
	{
		$this->sub_pakage_id = $sub_pakage_id;
	}

	public function getMain_combination_id()
	{
		return $this->main_combination_id;
	}
	public function setMain_combination_id($main_combination_id)
	{
		$this->main_combination_id = $main_combination_id;
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