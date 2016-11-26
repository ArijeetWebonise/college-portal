<?php
	require_once('phpClass/SQLClass.php');
	function student(){
		$db=SQLFacade::CreateMySQL('localhost','root','','college');
		$prn=$_REQUEST['prn'];
		$fname=$_REQUEST['fname'];
		$mname=$_REQUEST['mname'];
		$lname=$_REQUEST['lname'];
		$pname=$_REQUEST['pname'];
		$email=$_REQUEST['email'];
		$branch=$_REQUEST['branch'];
		$pass=$_REQUEST['pass'];
		$year=$_REQUEST['year'];
		$number=$_REQUEST['phone'];
		$pnumber=$_REQUEST['pphone'];
		$ret=$db->InsertData('account',"`First Name`, `Middle Name`, `Last Name`, `prn`, `email`, `mobile`, `parentName`, `parentphone`, `password`, `year`, `class/branch`, `accountType`, `parrentpassword`","'$fname', '$mname', '$lname', $prn, '$email', $number, '$pname', $pnumber, MD5('$pass'), $year, '$branch', 'Student', MD5('$prn')");
		if($ret){
			return TRUE;
		}else{
			return FALSE;
		}	
	} 
	function teacher(){
		$db=SQLFacade::CreateMySQL('localhost','root','','college');
		$email=$_REQUEST['email'];
		$pass=$_REQUEST['pass'];
		$fname=$_REQUEST['fname'];
		$mname=$_REQUEST['mname'];
		$lname=$_REQUEST['lname'];
		$phext=$_REQUEST['phext'];
		$number=$_REQUEST['phone'];
		$quat=$_REQUEST['quat'];
		$dept=$_REQUEST['dept'];
		$expteach=$_REQUEST['expteach'];
		$expindus=$_REQUEST['expindus'];
		$EnRol=$_REQUEST['enrol'];

		$ret=$db->InsertData('teacher',"`First Name`, `Middle Name`, `Last Name`, `PhExtension`, `Phone`, `email`, `password`, `EnRol`, `dept`, `quat`, `expteach`, `expindus`","'$fname', '$mname', '$lname', '$phext', '$number', '$email', MD5('$pass'), '$EnRol', '$dept', '$quat', '$expteach', '$expindus'");
		if($ret){
			return TRUE;
		}else{
			return FALSE;
		}	
	} 
	$fun=$_REQUEST['type'];
	if(function_exists($fun)){
		if($fun()){
			echo "Registed";
		}else{
			echo "Failed";
		}
	}
?>
