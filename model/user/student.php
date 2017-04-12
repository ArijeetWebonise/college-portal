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
		$this->firstname=$data['First Name'];
		$this->middlename=$data['Middle Name'];
		$this->lastname=$data['Last Name'];
		$this->username=$data['UserName'];
		$this->prn=$data['prn'];
		$this->email=$data['email'];
		$this->mobile=$data['mobile'];
		$this->address=$data['Address'];
		$this->attendance=0;
		$this->laddress=$data['LAddress'];
		$this->qualification=$data['qualification'];
		$this->skills=$data['Technical Skills'];
		$this->accomplishments=$data['Accomplishments'];
		$this->workntrainning=$data['Work Experience'];
		$this->workexp=$data['Education and Trainning'];
		$this->Birthday=$data['BirthDay'];
		$this->sex=$data['sex'];
		$this->profile=constant('imagelocation').$data['profilepic'];
		$this->parentName=$data['parentName'];
		$this->pnumber=$data['parentphone'];
		$this->year=$data['year'];
		$this->class=$data['class/branch'];
		$this->ppass=$data['parrentpassword'];
	} 
}

$ret=$GLOBALS['db']->GetData('*','account',"`UserName`='".$_REQUEST['id']."'");
$account=new Account($ret[0]);

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
	public $type;

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
		$this->Achievements=$data['Achievements'];
		$this->mobile=$data['Phone'];
		$this->PublicationDetails=$data['Publication Details'];
		$this->pass=$data['pass'];
		$this->sex=$data['sex'];
		$this->Workshops=$data['Workshops'];
		$this->ExtraActivities=$data['Extra Activities'];
		$this->type=$data['type'];
	} 
}
?>
