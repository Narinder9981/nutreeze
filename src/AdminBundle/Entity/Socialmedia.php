<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="social_media")
*/
class Socialmedia
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $social_media_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $title="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $img=0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $link="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $is_deleted="";

	public function getSocial_media_id()
	{
		return $this->social_media_id;
	}

	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getImg()
	{
		return $this->img;
	}
	public function setImg($img)
	{
		$this->img = $img;
	}

	public function getLink()
	{
		return $this->link;
	}
	public function setLink($link)
	{
		$this->link = $link;
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
