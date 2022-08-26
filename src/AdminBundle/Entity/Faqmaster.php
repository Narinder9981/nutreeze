<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="faq_master")
*/
class Faqmaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $faq_master_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $faq_question="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $faq_answer="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id=0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_faq_master_id=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $faq_status="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getFaq_master_id()
	{
		return $this->faq_master_id;
	}

	public function getFaq_question()
	{
		return $this->faq_question;
	}
	public function setFaq_question($faq_question)
	{
		$this->faq_question = $faq_question;
	}

	public function getFaq_answer()
	{
		return $this->faq_answer;
	}
	public function setFaq_answer($faq_answer)
	{
		$this->faq_answer = $faq_answer;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_faq_master_id()
	{
		return $this->main_faq_master_id;
	}
	public function setMain_faq_master_id($main_faq_master_id)
	{
		$this->main_faq_master_id = $main_faq_master_id;
	}

	public function getFaq_status()
	{
		return $this->faq_status;
	}
	public function setFaq_status($faq_status)
	{
		$this->faq_status = $faq_status;
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