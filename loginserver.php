<?php
session_start();
	require_once('phpClass/SQL.php'); 

	$userid=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];

	$db=SQLFacade::CreateMySQL('localhost','root','','college');
	$ret=$db->GetData('*',"students","`email`='$userid' AND `password`=MD5('$pass')");

	if ($row=$db->fetch($ret)) {
		$_SESSION['userid']=$row['prn'];
		var_dump($row['prn']);
	}else{
		header('Location: http://localhost/');
		exit;
	}
	header('Location: http://localhost/');
?>

