<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="admin_shop_status")
*/
class Adminshopstatus
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $admin_shop_status_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $admin_shop_status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $busy_text="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $updated_at="";

	public function getAdmin_shop_status_id()
	{
		return $this->admin_shop_status_id;
	}

	public function getAdmin_shop_status()
	{
		return $this->admin_shop_status;
	}
	public function setAdmin_shop_status($admin_shop_status)
	{
		$this->admin_shop_status = $admin_shop_status;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_id()
	{
		return $this->main_id;
	}
	public function setMain_id($main_id)
	{
		$this->main_id = $main_id;
	}

	public function getBusy_text()
	{
		return $this->busy_text;
	}
	public function setBusy_text($busy_text)
	{
		$this->busy_text = $busy_text;
	}

	public function getUpdated_at()
	{
		return $this->updated_at;
	}
	public function setUpdated_at($updated_at)
	{
		$this->updated_at = $updated_at;
	}
}