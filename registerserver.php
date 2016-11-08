<?php
	require_once('phpClass/SQL.php'); 
	$prn=$_REQUEST['prn'];
	$sname=$_REQUEST['sname'];
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$year=$_REQUEST['year'];
	$ret=$db->InsertData('students','`prn`,`student name`,`email`,`password`,`year`',"$prn,'$sname','$email',MD5('$pass'),$year");
	if($ret){
		echo 'registerd';
	}
?>
