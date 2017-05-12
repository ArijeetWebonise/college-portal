<?php
class Account {
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
		$this->firstname=$data['First Name'];
		$this->middlename=$data['Middle Name'];
		$this->lastname=$data['Last Name'];
		$this->username=$data['username'];
		$this->enrol=$data['PhExtension'];
		$this->dept=$data['dept'];
		$this->expteach=$data['expteach'];
		$this->profile="http://localhost/media/image/".$data['Profile'];
		$this->expindex=$data['expindus'];
		$this->interjournal=$data['International Journal'];
		$this->nationjournal=$data['National Journals'];
		$this->interconf=$data['International Conference'];
		$this->nationconf=$data['National Conference'];
		$this->aoi=json_decode($data['Area Of Interest']);
		$this->Birthday=$data['DateOfBirth'];
		$this->email=$data['email'];
		$this->Achievements=json_decode($data['Achievements']);
		$this->mobile=$data['Phone'];
		$this->PublicationDetails=json_decode($data['Publication Details']);
		$this->pass=$data['password'];
		$this->sex=$data['sex'];
		$this->Workshops=json_decode($data['workshop']);
		$this->ExtraActivities=json_decode($data['Extra Activities']);
		$this->type=$data['facaltytype'];
	} 
}

$ret=$GLOBALS['db']->GetData('*','teacher',"`UserName`='".$_REQUEST['id']."'");
$account=new Account($ret[0]);
?>
