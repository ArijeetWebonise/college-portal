<?php

class Account {
	public $firstname;
	public $middlename;
	public $lastname;
	public $username;
	public $prn;
	public $email;
	public $Birthday;
	public $sex;
	public $parentName;
	public $pnumber;
	public $year;
	public $class;
	public $ppass;

	public function __construct($data)  
	{ 
		$this->firstname=$data['firstname'];
		$this->middlename=$data['middlename'];
		$this->lastname=$data['lastname'];
		$this->username=$data['username'];
		$this->prn=$data['prn'];
		$this->email=$data['email'];
		$this->mobile=$data['mobile'];
		$this->Birthday=$data['Birthday'];
		$this->sex=$data['sex'];
		$this->parentName=$data['parentName'];
		$this->pnumber=$data['pnumber'];
		$this->pass=$data['pass'];
		$this->year=$data['year'];
		$this->class=$data['class'];
		$this->ppass=NULL;
	} 
}

?>