<?php
	require_once('phpClass/SQL.php'); 
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
		echo 'registerd';
	}else{
		echo 'error';
	}
?>
