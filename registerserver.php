<?php
	require_once('phpClass/SQL.php'); 
	$prn=$_REQUEST['prn'];
	$fname=$_REQUEST['fname'];
	$mname=$_REQUEST['mname'];
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$number=$_REQUEST['phone'];
	$pass=$_REQUEST['pass'];
	$year=$_REQUEST['year'];
	$ret=$db->InsertData('students','`prn`,`first name`,`middle name`,`last name`,`email`,`number`,`password`,`year`,`accountType`',"$prn,'$fname','$mname','$lname','$email',`phone`,MD5('$pass'),$year,'student'");
	if($ret){
		echo 'registerd';
	}
?>
