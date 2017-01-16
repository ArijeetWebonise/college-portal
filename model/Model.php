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
		$ret=$this->db->GetData('*','student');
		while($row=$this->db->fetch($ret)){
			$firstname=$row['First Name'];
			$middlename=$row['Middle Name'];
			$lastname=$row['Last Name'];
			$username=$row['UserName'];
			$attendance=$row['Attendances'];
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
				'Attendance'=>$attendance,
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
	
	public function getEventList()
	{
		$arr=array();
		if($ret=$GLOBALS['db']->getData('*','events')){
			while ($row=$GLOBALS['db']->fetch($ret)) {
				$arr[$row['eventid']]=array(
					'event id'=>$row['eventid'],
					'event name'=>$row['event name'],
					'event desp'=>$row['event desp'],
					'creator'=>$row['creator'],
					'creator type'=>$row['creatortype'],
					'location'=>$row['location'],
					'start date'=>$row['start date'],
					'end date'=>$row['end date'],
					'start time'=>$row['start time'],
					'end time'=>$row['end time'],
					'isVirtual'=>$row['is virtual'],
					'show Map'=>$row['showmap']
				);
			}
		}
		return $arr;
	}	

	public function insertAttendance($stu)
	{
		if($ret=$GLOBALS['db']->InsertData("attendance","`Date Of Class`,`period`,`prn`,`attendance`","'".$_REQUEST['dateofattendance']."',".$_REQUEST['period'].",".$stu.", 1")){
			return TRUE;
		}else{
			die("ERROR");
		}
	}

	public function getEvent($eventid)
	{
		$eventlist = $this->getEventList();
		return $eventlist[$eventid];
	}

	public function getAttendanceList(){
		$arr=array();
		if($ret=$GLOBALS['db']->getData('*','attendance_list')){
			while ($row=$GLOBALS['db']->fetch($ret)) {
		$name=$row['First Name'];
		if($row['Middle Name']!=''){
			$name.=$row['Middle Name'];
		}
		$name.=' '.$row['Last Name'];
				$arr[$row['UserName']]=array(
					'name'=>$name,
					'prn'=>$row['prn'],
					'UserName'=>$row['UserName'],
					'Date Of Class'=>$row['Date of Class'],
					'Period'=>$row['class'],
					'attendance'=>$row['attendance']=='1'?TRUE:FALSE
				);
			}
		}
		return $arr;
	}

	public function getAttendance($username){
		return $this->getAttendanceList()[$username];
	}
	private function getTimeTableday($class,$day){
		$tt=array();
		if($ret=$GLOBALS['db']->getData('*','timetabledb',"`day`='".$day."' AND `class`='".$class."'")){
			while ($row=$GLOBALS['db']->fetch($ret)) {
				$tt[$row['period']]= array(
					'subject'=>$row['subject'],
					'type'=> $row['type']
				);
			}
		}
		return $tt;
	}
	public function getClasses()
	{
		$arr=array();
		if($ret=$GLOBALS['db']->getData('DISTINCT `class`','timetabledb')){
			while ($row=$GLOBALS['db']->fetch($ret)) {
				array_push($arr, $row['class']);
			}
		}
		return $arr;
	}
	public function getTimeTablelist()
	{
		$tt=array();
		if($ret=$GLOBALS['db']->getData('DISTINCT `class`, `day`','timetabledb')){
			while ($row=$GLOBALS['db']->fetch($ret)) {
				 $tt[$row['class']][$row['day']]=$this->getTimeTableday($row['class'],$row['day']);
			}
		}
		return $tt;
	}
	public function getTimeTable($class)
	{
		return $this->getTimeTablelist()[$class];
	}
}

?>
