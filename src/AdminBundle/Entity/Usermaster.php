<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="user_master")
*/
class Usermaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $user_master_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_role_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $unique_user_id="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $loyalty_points=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $username="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $password="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $show_password="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_firstname="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_lastname="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_mobile="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $email="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_image=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $address_master_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $parent_user_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_gender="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $date_of_birth="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $height="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $weight="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $area_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $lat="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $lang="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_by=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $status="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $user_type="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $current_lang_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $domain_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_modified="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $last_login="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $registration_from="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_verified=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $verification_code="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_note_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $calorie_count=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $delivery_time_id=0;

	public function getUser_master_id()
	{
		return $this->user_master_id;
	}

	public function getUser_role_id()
	{
		return $this->user_role_id;
	}
	public function setUser_role_id($user_role_id)
	{
		$this->user_role_id = $user_role_id;
	}

	public function getUnique_user_id()
	{
		return $this->unique_user_id;
	}
	public function setUnique_user_id($unique_user_id)
	{
		$this->unique_user_id = $unique_user_id;
	}

	public function getLoyalty_points()
	{
		return $this->loyalty_points;
	}
	public function setLoyalty_points($loyalty_points)
	{
		$this->loyalty_points = $loyalty_points;
	}

	public function getUsername()
	{
		return $this->username;
	}
	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getPassword()
	{
		return $this->password;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getShow_password()
	{
		return $this->show_password;
	}
	public function setShow_password($show_password)
	{
		$this->show_password = $show_password;
	}

	public function getUser_firstname()
	{
		return $this->user_firstname;
	}
	public function setUser_firstname($user_firstname)
	{
		$this->user_firstname = $user_firstname;
	}

	public function getUser_lastname()
	{
		return $this->user_lastname;
	}
	public function setUser_lastname($user_lastname)
	{
		$this->user_lastname = $user_lastname;
	}

	public function getUser_mobile()
	{
		return $this->user_mobile;
	}
	public function setUser_mobile($user_mobile)
	{
		$this->user_mobile = $user_mobile;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getUser_image()
	{
		return $this->user_image;
	}
	public function setUser_image($user_image)
	{
		$this->user_image = $user_image;
	}

	public function getAddress_master_id()
	{
		return $this->address_master_id;
	}
	public function setAddress_master_id($address_master_id)
	{
		$this->address_master_id = $address_master_id;
	}

	public function getParent_user_id()
	{
		return $this->parent_user_id;
	}
	public function setParent_user_id($parent_user_id)
	{
		$this->parent_user_id = $parent_user_id;
	}

	public function getUser_gender()
	{
		return $this->user_gender;
	}
	public function setUser_gender($user_gender)
	{
		$this->user_gender = $user_gender;
	}

	public function getDate_of_birth()
	{
		return $this->date_of_birth;
	}
	public function setDate_of_birth($date_of_birth)
	{
		$this->date_of_birth = $date_of_birth;
	}

	public function getHeight()
	{
		return $this->height;
	}
	public function setHeight($height)
	{
		$this->height = $height;
	}

	public function getWeight()
	{
		return $this->weight;
	}
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}

	public function getArea_id()
	{
		return $this->area_id;
	}
	public function setArea_id($area_id)
	{
		$this->area_id = $area_id;
	}

	public function getLat()
	{
		return $this->lat;
	}
	public function setLat($lat)
	{
		$this->lat = $lat;
	}

	public function getLang()
	{
		return $this->lang;
	}
	public function setLang($lang)
	{
		$this->lang = $lang;
	}

	public function getCreated_by()
	{
		return $this->created_by;
	}
	public function setCreated_by($created_by)
	{
		$this->created_by = $created_by;
	}

	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getUser_type()
	{
		return $this->user_type;
	}
	public function setUser_type($user_type)
	{
		$this->user_type = $user_type;
	}

	public function getCurrent_lang_id()
	{
		return $this->current_lang_id;
	}
	public function setCurrent_lang_id($current_lang_id)
	{
		$this->current_lang_id = $current_lang_id;
	}

	public function getDomain_id()
	{
		return $this->domain_id;
	}
	public function setDomain_id($domain_id)
	{
		$this->domain_id = $domain_id;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getLast_modified()
	{
		return $this->last_modified;
	}
	public function setLast_modified($last_modified)
	{
		$this->last_modified = $last_modified;
	}

	public function getLast_login()
	{
		return $this->last_login;
	}
	public function setLast_login($last_login)
	{
		$this->last_login = $last_login;
	}

	public function getRegistration_from()
	{
		return $this->registration_from;
	}
	public function setRegistration_from($registration_from)
	{
		$this->registration_from = $registration_from;
	}

	public function getIs_verified()
	{
		return $this->is_verified;
	}
	public function setIs_verified($is_verified)
	{
		$this->is_verified = $is_verified;
	}

	public function getVerification_code()
	{
		return $this->verification_code;
	}
	public function setVerification_code($verification_code)
	{
		$this->verification_code = $verification_code;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted)
	{
		$this->is_deleted = $is_deleted;
	}

	
	public function getOrder_note_id()
	{
		return $this->order_note_id;
	}
	public function setOrder_note_id($order_note_id)
	{
		$this->order_note_id = $order_note_id;
	}

	
	public function getCalorie_count()
	{
		return $this->calorie_count;
	}
	public function setCalorie_count($calorie_count)
	{
		$this->calorie_count = $calorie_count;
	}

	public function getDelivery_time_id()
	{
		return $this->delivery_time_id;
	}
	public function setDelivery_time_id($delivery_time_id)
	{
		$this->delivery_time_id = $delivery_time_id;
	}
}