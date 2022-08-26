<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="rating")
*/
class Rating
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $rating_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $type = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $type_id = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_id = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $total_rating = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_on = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_deleted = "";

	public function getRating_id()
	{
		return $this->rating_id;
	}

	public function getType()
	{
		return $this->type;
	}
	public function setType($type)
	{
		$this->type = $type;
	}

	public function getType_id()
	{
		return $this->type_id;
	}
	public function setType_id($type_id)
	{
		$this->type_id = $type_id;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getTotal_rating()
	{
		return $this->total_rating;
	}
	public function setTotal_rating($total_rating)
	{
		$this->total_rating = $total_rating;
	}

	public function getCreated_on()
	{
		return $this->created_on;
	}
	public function setCreated_on($created_on)
	{
		$this->created_on = $created_on;
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