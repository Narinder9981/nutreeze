<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="pause_package")
*/
class Pausepackage
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $pause_package_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $order_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $sub_package_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $user_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $remaining_working_days_after_pause=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $pause_start_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $pause_end_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $pause_end_date_by_update="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $pause_end_date_update_by=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $pause_created_datetime="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $pause_package_history_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $comment_log="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getPause_package_id()
	{
		return $this->pause_package_id;
	}

	public function getOrder_id()
	{
		return $this->order_id;
	}
	public function setOrder_id($order_id)
	{
		$this->order_id = $order_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
	}

	public function getSub_package_id()
	{
		return $this->sub_package_id;
	}
	public function setSub_package_id($sub_package_id)
	{
		$this->sub_package_id = $sub_package_id;
	}

	public function getUser_id()
	{
		return $this->user_id;
	}
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getRemaining_working_days_after_pause()
	{
		return $this->remaining_working_days_after_pause;
	}
	public function setRemaining_working_days_after_pause($remaining_working_days_after_pause)
	{
		$this->remaining_working_days_after_pause = $remaining_working_days_after_pause;
	}

	public function getPause_start_date()
	{
		return $this->pause_start_date;
	}
	public function setPause_start_date($pause_start_date)
	{
		$this->pause_start_date = $pause_start_date;
	}

	public function getPause_end_date()
	{
		return $this->pause_end_date;
	}
	public function setPause_end_date($pause_end_date)
	{
		$this->pause_end_date = $pause_end_date;
	}

	public function getPause_end_date_by_update()
	{
		return $this->pause_end_date_by_update;
	}
	public function setPause_end_date_by_update($pause_end_date_by_update)
	{
		$this->pause_end_date_by_update = $pause_end_date_by_update;
	}

	public function getPause_end_date_update_by()
	{
		return $this->pause_end_date_update_by;
	}
	public function setPause_end_date_update_by($pause_end_date_update_by)
	{
		$this->pause_end_date_update_by = $pause_end_date_update_by;
	}

	public function getPause_created_datetime()
	{
		return $this->pause_created_datetime;
	}
	public function setPause_created_datetime($pause_created_datetime)
	{
		$this->pause_created_datetime = $pause_created_datetime;
	}

	public function getPause_package_history_id()
	{
		return $this->pause_package_history_id;
	}
	public function setPause_package_history_id($pause_package_history_id)
	{
		$this->pause_package_history_id = $pause_package_history_id;
	}

	public function getComment_log()
	{
		return $this->comment_log;
	}
	public function setComment_log($comment_log)
	{
		$this->comment_log = $comment_log;
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