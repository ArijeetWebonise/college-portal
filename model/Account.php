<?php
$file = "config.json";
$json = json_decode(file_get_contents($file));
define('imagelocation', $site->getHost().'/media/image/');


class Account {
	public $firstname;
	public $middlename;
	public $lastname;
	public $username;
	public $prn;
	public $email;
	public $address;
	public $Birthday;
	public $qualification;
	public $skills;
	public $attendance;
	public $accomplishments;
	public $workexp;
	public $sex;
	public $parentName;
	public $workntrainning;
	public $pnumber;
	public $year;
	public $class;
	public $profile;

	public function __construct($data)  
	{ 
		$this->firstname=$data['firstname'];
		$this->middlename=$data['middlename'];
		$this->lastname=$data['lastname'];
		$this->username=$data['username'];
		$this->prn=$data['prn'];
		$this->email=$data['email'];
		$this->mobile=$data['mobile'];
		$this->address=$data['Address'];
		$this->attendance=$data['Attendance'];
		$this->laddress=$data['LAddress'];
		$this->qualification=$data['qualification'];
		$this->skills=$data['skills'];
		$this->accomplishments=$data['accomplishments'];
		$this->workntrainning=$data['ent'];
		$this->workexp=$data['workexp'];
		$this->Birthday=$data['Birthday'];
		$this->sex=$data['sex'];
		$this->profile=constant('imagelocation').$data['profile'];
		$this->parentName=$data['parentName'];
		$this->pnumber=$data['pnumber'];
		$this->year=$data['year'];
		$this->class=$data['class'];
		$this->ppass=NULL;
	} 
}

class TAccount {
	public $firstname;
	public $middlename;
	public $lastname;
	public $username;
	public $enrol;
	public $email;
	public $dept;
	private $pass;
	public $expteach;
	public $expindex;
	public $aoi;
	public $interjournal;
	public $nationjournal;
	public $interconf;
	public $nationconf;
	public $Birthday;
	public $PublicationDetails;
	public $Workshops;
	public $Achievements;
	public $profile;

	public function __construct($data)  
	{ 
		$this->firstname=$data['firstname'];
		$this->middlename=$data['middlename'];
		$this->lastname=$data['lastname'];
		$this->username=$data['username'];
		$this->enrol=$data['enrol'];
		$this->dept=$data['dept'];
		$this->expteach=$data['expteach'];
		$this->profile=constant('imagelocation').$data['profile'];
		$this->expindex=$data['expindex'];
		$this->interjournal=$data['International Journal'];
		$this->nationjournal=$data['National Journal'];
		$this->interconf=$data['International Conference'];
		$this->nationconf=$data['National Conference'];
		$this->aoi=$data['Area Of Interest'];
		$this->Birthday=$data['Birthday'];
		$this->email=$data['email'];
		$this->mobile=$data['Phone'];
		$this->PublicationDetails=$data['Publication Details'];
		$this->pass=$data['pass'];
		$this->sex=$data['sex'];
		$this->Workshops=$data['Workshops'];
		$this->ExtraActivities=$data['Extra Activities'];
	} 
}
?>
