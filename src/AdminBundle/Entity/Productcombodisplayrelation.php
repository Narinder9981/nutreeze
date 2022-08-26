<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product_combo_display_relation")
*/
class Productcombodisplayrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $product_combo_display_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $product_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $combo_type="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getProduct_combo_display_relation_id()
	{
		return $this->product_combo_display_relation_id;
	}

	public function getProduct_id()
	{
		return $this->product_id;
	}
	public function setProduct_id($product_id)
	{
		$this->product_id = $product_id;
	}

	public function getCombo_type()
	{
		return $this->combo_type;
	}
	public function setCombo_type($combo_type)
	{
		$this->combo_type = $combo_type;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
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