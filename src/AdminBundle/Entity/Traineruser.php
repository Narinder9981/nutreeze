<?php
namespace AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="trainer_user")
*/
class Traineruser{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $trainer_user_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $usermaster_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $firstname;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $lastname;

	/**
	* @ORM\Column(type="string")
	*/
	protected $mobile_no;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $trainer_level_master_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $nationality;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $qualification;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $specialization;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $goal;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $description;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $language_id;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $main_trainer_id;
	
	/**
	* @ORM\Column(type="string")
	*/
	protected $create_date;
	
	/**
	* @ORM\Column(type="integer")
	*/
	protected $is_deleted;
	
	public function getTrainer_level_master_id(){
		return $this->trainer_level_master_id;
	}
	public function setTrainer_level_master_id($trainer_level_master_id){
		$this->trainer_level_master_id = $trainer_level_master_id;
	}
	
	public function getUsermaster_id(){
		return $this->usermaster_id;
	}
	public function setUsermaster_id($usermaster_id){
		$this->usermaster_id = $usermaster_id;
	}
	
	public function getFirstname()
	{
		return $this->firstname;
	}
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}
	
	public function getLastname()
	{
		return $this->lastname;
	}
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}
	
	public function getMobile_no()
	{
		return $this->mobile_no;
	}
	public function setMobile_no($mobile_no)
	{
		$this->mobile_no = $mobile_no;
	}
	
	public function getNationality(){
		return $this->nationality;
	}
	public function setNationality($nationality){
		$this->nationality = $nationality;
	}
	
	public function getQualification(){
		return $this->qualification;
	}
	public function setQualification($qualification){
		$this->qualification = $qualification;
	}
	
	public function getSpecialization(){
		return $this->specialization;
	}
	public function setSpecialization($specialization){
		$this->specialization = $specialization;
	}
	
	public function getGoal(){
		return $this->goal;
	}
	public function setGoal($goal){
		$this->goal = $goal;
	}
	
	public function getDescription(){
		return $this->description;
	}
	public function setDescription($description){
		$this->description = $description;
	}
	
	public function getLanguage_id(){
		return $this->language_id;
	}
	public function setLanguage_id($language_id){
		$this->language_id = $language_id;
	}
	
	public function getMain_trainer_id(){
		return $this->main_trainer_id;
	}
	public function setMain_trainer_id($main_trainer_id){
		$this->main_trainer_id = $main_trainer_id;
	}
	
	public function getCreate_date(){
		return $this->create_date;
	}
	public function setCreate_date($create_date){
		$this->create_date = $create_date;
	}
	
	public function getIs_deleted(){
		return $this->is_deleted;
	}
	public function setIs_deleted($is_deleted){
		$this->is_deleted = $is_deleted;
	}
	
	/**
	* Get trainer_user_id
	* 
	* @return integer
	*/
	public function getTrainer_user_id(){
		return $this->trainer_user_id;
	}
	
}