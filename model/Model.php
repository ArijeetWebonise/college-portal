<?php
foreach (glob("model/*.php") as $filename)
{
	require_once $filename;
}

class Model {
	private $db;

	public function __construct(){
		$this->db=$GLOBALS['db'];
	}
	public function getAccountList()
	{
		$list=array();
		$ret=$this->db->GetData('*','account');
		while($row=$this->db->fetch($ret)){
			$firstname=$row['First Name'];
			$middlename=$row['Middle Name'];
			$lastname=$row['Last Name'];
			$username=$row['UserName'];
			$prn=$row['prn'];
			$email=$row['email'];
			$address=$row['Address'];
			$laddress=$row['LAddress']!=NULL?$row['LAddress']:$row['Address'];
			$mobile=$row['mobile'];
			$quali=json_decode($row['qualification']);
			$skills=json_decode($row['Technical Skills']);
			$accomplishments=json_decode($row['Accomplishments']);
			$workexp=json_decode($row['Work Experience']);
			$ent=json_decode($row['Education and Trainning']);
			$Birthday=$row['BirthDay'];
			$sex=$row['sex'];
			$parentName=$row['parentName'];
			$profile=$row['profilepic']!=NULL?$row['profilepic']:"profile-picture-placeholder.jpg";
			$pnumber=$row['parentphone'];
			$pass=$row['password'];
			$year=$row['year'];
			$class=$row['class/branch'];
			$list[$username]=new Account(array(
				'firstname'=>$firstname,
				'middlename'=>$middlename,
				'lastname'=>$lastname,
				'username'=>$username,
				'prn'=>$prn,
				'email'=>$email,
				'Address'=>$address,
				'LAddress'=>$laddress,
				'qualification'=>$quali,
				'skills'=>$skills,
				'accomplishments'=>$accomplishments,
				'workexp'=>$workexp,
				'ent'=>$ent,
				'profile'=>$profile,
				'mobile'=>$mobile,
				'Birthday'=>$Birthday,
				'sex'=>$sex?'M':'F',
				'parentName'=>$parentName,
				'pnumber'=>$pnumber,
				'pass'=>$pass,
				'year'=>$year,
				'class'=>$class
			));
		}
		return $list;
	}

	public function getTeacherAccountList()
	{
		$list=array();
		$ret=$this->db->GetData('*','teacher');
		while($row=$this->db->fetch($ret)){
			$firstname=$row['First Name'];
			$middlename=$row['Middle Name'];
			$lastname=$row['Last Name'];
			$username=$row['username'];
			$enrol=$row['EnRol'];
			$dept=$row['dept'];
			$profile=$row['Profile']!=NULL?$row['Profile']:"profile-picture-placeholder.jpg";
			$email=$row['email'];
			$mobile=$row['Phone'];
			$pass=$row['password'];
			$expindex=$row['expindus'];
			$sex=$row['sex'];
			$dob=$row['DateOfBirth'];
			$expteach=$row['expteach'];
			$list[$username]=new TAccount(array(
				'firstname'=>$firstname,
				'middlename'=>$middlename,
				'lastname'=>$lastname,
				'username'=>$username,
				'enrol'=>$enrol,
				'Phone'=>$mobile,
				'dept'=>$dept,
				'email'=>$email,
				'expteach'=>$expteach,
				'expindex'=>$expindex,
				'pass'=>$pass,
				'sex'=>$sex,
				'Birthday'=>$dob,
				'profile'=>$profile,
				'International Journal'=>$row['International Journal'],
				'National Journal'=>$row['National Journals'],
				'International Conference'=>$row['International Conference'],
				'National Conference'=>$row['National Conference'],
				'Area Of Interest'=>json_decode($row['Area Of Interest']),
				'Publication Details'=>json_decode($row['Publication Details']),
				'Workshops'=>json_decode($row['workshop']),
				'Extra Activities'=>json_decode($row['Extra Activities'])
			));
		}
		return $list;
	}
	
	public function getAccount($title)
	{
		// we use the previous function to get all the Accounts and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allAccounts = $this->getAccountList();
		return $allAccounts[$title];
	}

	public function getTeacherAccount($title)
	{
		// we use the previous function to get all the Accounts and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allAccounts = $this->getTeacherAccountList();
		return $allAccounts[$title];
	}
	
	
}

?>
