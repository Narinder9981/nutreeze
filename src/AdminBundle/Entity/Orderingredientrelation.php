<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="order_ingredient_relation")
*/
class Orderingredientrelation
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $order_ingredient_relation_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $ingredient_master_id="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

    public function getOrder_ingredient_relation_id()
	{
		return $this->order_ingredient_relation_id;
	}

	public function setOrder_ingredient_relation_id($order_ingredient_relation_id)
	{
		return $this->order_ingredient_relation_id = $order_ingredient_relation_id;
	}

    public function getUser_id()
	{
		return $this->user_id;
	}

	public function setUser_id($user_id)
	{
		return $this->user_id = $user_id;
	}

    public function getOrder_id()
	{
		$this->order_id;
	}

	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

    public function getIngredient_master_id()
	{
		return $this->ingredient_master_id;
	}

	public function setIngredient_master_id($ingredient_master_id)
	{
		return $this->ingredient_master_id = $ingredient_master_id;
	}

    public function getIs_deleted()
	{
		$this->is_deleted;
	}

	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}
}