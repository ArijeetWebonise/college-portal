<?php
	require_once('phpClass/SQL.php'); 
	$prn=$_REQUEST['prn'];
	$sname=$_REQUEST['sname'];
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$ret=$db->InsertData('students','`prn`,`student name`,`email`,`password`',"$prn,'$sname','$email',MD5('$pass')");
	if($ret){
		echo 'registerd';
	}
?>
