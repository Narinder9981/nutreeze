<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="pause_package_history")
*/
class Pausepackagehistory
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $pause_package_history_id;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $package_id=0;

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
	protected $resume_choice="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $pause_updated_date="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $resume_flag="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $update_by=0;

	public function getPause_package_history_id()
	{
		return $this->pause_package_history_id;
	}

	public function getPackage_id()
	{
		return $this->package_id;
	}
	public function setPackage_id($package_id)
	{
		$this->package_id = $package_id;
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

	public function getResume_choice()
	{
		return $this->resume_choice;
	}
	public function setResume_choice($resume_choice)
	{
		$this->resume_choice = $resume_choice;
	}

	public function getPause_updated_date()
	{
		return $this->pause_updated_date;
	}
	public function setPause_updated_date($pause_updated_date)
	{
		$this->pause_updated_date = $pause_updated_date;
	}

	public function getResume_flag()
	{
		return $this->resume_flag;
	}
	public function setResume_flag($resume_flag)
	{
		$this->resume_flag = $resume_flag;
	}

	public function getUpdate_by()
	{
		return $this->update_by;
	}
	public function setUpdate_by($update_by)
	{
		$this->update_by = $update_by;
	}
}