<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="article_master")
*/
class Articlemaster
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $article_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $article_title = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $article_description = "";

	/**
	* @ORM\Column(type="string")
	*/
	protected $created_datetime = "";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $country_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $created_by = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_article_id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_deleted = "";

	public function getArticle_id()
	{
		return $this->article_id;
	}

	public function getArticle_title()
	{
		return $this->article_title;
	}
	public function setArticle_title($article_title)
	{
		$this->article_title = $article_title;
	}

	public function getArticle_description()
	{
		return $this->article_description;
	}
	public function setArticle_description($article_description)
	{
		$this->article_description = $article_description;
	}

	public function getCreated_datetime()
	{
		return $this->created_datetime;
	}
	public function setCreated_datetime($created_datetime)
	{
		$this->created_datetime = $created_datetime;
	}

	public function getCountry_id()
	{
		return $this->country_id;
	}
	public function setCountry_id($country_id)
	{
		$this->country_id = $country_id;
	}

	public function getCreated_by()
	{
		return $this->created_by;
	}
	public function setCreated_by($created_by)
	{
		$this->created_by = $created_by;
	}

	public function getLanguage_id()
	{
		return $this->language_id;
	}
	public function setLanguage_id($language_id)
	{
		$this->language_id = $language_id;
	}

	public function getMain_article_id()
	{
		return $this->main_article_id;
	}
	public function setMain_article_id($main_article_id)
	{
		$this->main_article_id = $main_article_id;
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