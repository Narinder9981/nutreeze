<?php 
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="video_tutorial")
*/
class Videotutorial
{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $video_tutorial_id;

	/**
	* @ORM\Column(type="string")
	*/
	protected $video_title="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $video_id="";

	/**
	* @ORM\Column(type="string")
	*/
	protected $video_link="";

	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted=0;

	public function getVideo_tutorial_id()
	{
		return $this->video_tutorial_id;
	}

	public function getVideo_title()
	{
		return $this->video_title;
	}
	public function setVideo_title($video_title)
	{
		$this->video_title = $video_title;
	}

	public function getVideo_id()
	{
		return $this->video_id;
	}
	public function setVideo_id($video_id)
	{
		$this->video_id = $video_id;
	}

	public function getVideo_link()
	{
		return $this->video_link;
	}
	public function setVideo_link($video_link)
	{
		$this->video_link = $video_link;
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