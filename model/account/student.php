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
?>
