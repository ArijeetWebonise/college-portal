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

	public function createQuiz($para)
	{
		if($this->db->InsertData("quiz_list","`quiz name`,`duration`,`noofquestion` ,`createdby`,`subject`,`dept`,`Date`","'".$para['quiz_name']."','".$para['duration']."','".$para['noofquestion']."','SagarNikam','".$para['sub']."','".$para['dept']."','".$para['quizDate']."'")){
			return TRUE;
		}
		return FALSE;
	}

	public function AddQuestion($qno,$para,$marks)
	{	
		$id;
		$uploader=new UploadManager();
		$img=$uploader->uploadImage('imgq'.$qno);
		if($ret=$this->db->getData('*','quiz_list',"`quiz name`='".$para['quiz_name']."'")){
			while ($row=$this->db->fetch($ret)) {
				$id=$row['quiz id'];
			}
		}else{
			return FALSE;
		}
		if($this->db->InsertData("quiz_question","`quiz_id`,`image`,`question_name`,`marks`",$id.",'".$img."','".$_REQUEST['q'.$qno]."',".$marks))
		{
			$this->addOptions($id,$qno,$_REQUEST['q'.$qno]);
			return TRUE;
		}
		return FALSE;
	}

	public function addOptions($quizid,$qno,$ques)
	{
		if($ret=$this->db->getData('*','quiz_question',"`quiz_id`=".$quizid." AND `question_name`='".$ques."'"))
		{
			while ($row=$this->db->fetch($ret)) {
				$id=$row['question_id'];
				for ($i=1; $i <= 4; $i++) { 
					// $ans=$_REQUEST['ansq'.$qno.'op'.$i]==1?TRUE:FALSE;
					if(!$this->db->InsertData("quiz_options","`quiz id`,`question_id`,`isanswer`,`option_value`",$quizid.",".$id.",0,'".$_REQUEST['q'.$qno."op".$i]."'")){
						return FALSE;
					}
				}
		}
		}else{
			return FALSE;
		}
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
				'type'=>$row['facaltytype'],
				'dept'=>$dept,
				'email'=>$email,
				'expteach'=>$expteach,
				'expindex'=>$expindex,
				'pass'=>$pass,
				'sex'=>$sex,
				'Birthday'=>$dob,
				'profile'=>$profile,
				'Achievements'=>json_decode($row['Achievements']),
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

	public function searchStudents($inp){
		$tt=array();
		if($ret=$GLOBALS['db']->getData('*','student',"`First Name` LIKE '%".$inp."%' OR `Middle Name` LIKE '%".$inp."%' OR `Last Name` LIKE '%".$inp."%' OR `username` LIKE '%".$inp."%'")){
			while ($row=$GLOBALS['db']->fetch($ret)) {
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
			$tt[$username]=new Account(array(
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
		}
		return $tt;
	}
	public function searchFacalties($inp)
	{
		$list=array();
		if($ret=$this->db->GetData('*','teacher',"`First Name` LIKE '%".$inp."%' OR `Middle Name` LIKE '%".$inp."%' OR `Last Name` LIKE '%".$inp."%' OR `username` LIKE '%".$inp."%'")){
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
					'type'=>$row['facaltytype'],
					'dept'=>$dept,
					'email'=>$email,
					'expteach'=>$expteach,
					'expindex'=>$expindex,
					'pass'=>$pass,
					'sex'=>$sex,
					'Birthday'=>$dob,
					'profile'=>$profile,
					'Achievements'=>json_decode($row['Achievements']),
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
		}else{
			return FALSE;
		}
		return $list;
	}

	private function getOptions($question_ID){
		if($ret=$this->db->GetData('*','quiz_options',"`question_id`=".$question_ID)){
			$options=array();
			while ($row=$this->db->fetch($ret)) {
				$option=array(
					'option_value'=>$row['option_value'],
					'isanswer'=>$row['isanswer']=='1'?TRUE:FALSE
				);
				array_push($options, $option);
			}
			return $options;
		}
		return NULL;
	}

	private function getQuestions($quiz_id)
	{
		$q=array();
		if($ret=$this->db->GetData('*','quiz_question',"`quiz_id`=".$quiz_id)){
			while ($row=$this->db->fetch($ret)) {
				$r=array();
				$r['question_id']=$row['question_id'];
				$r['question']=$row['question_name'];
				$r['marks']=$row['marks'];
				$r['options']=$this->getOptions($row['question_id']);
				array_push($q, new question($r));
			}
		}
		return $q;
	}

	public function GetQuizList()
	{
		$list=array();
		if($ret=$this->db->GetData('*','quiz_list')){
			while ($row=$this->db->fetch($ret)) {
				$list[$row['quiz id']]=array(
					'quiz_id'=>$row['quiz id'],
					'quiz_name'=>$row['quiz name'],
					'createdby'=>$row['createdby'],
					'duration'=>$row['duration'],
					'noofquestion'=>$row['noofquestion'],
					'Date'=>$row['Date'],
					'subject'=>$row['subject'],
					'dept'=>$row['dept'],
					'question'=>$this->getQuestions($row['quiz id'])
				);
			}
		}
		return $list;
	}
	public function GetQuiz($quizid)
	{
		return $this->GetQuizList()[$quizid];
	}
}

?>
