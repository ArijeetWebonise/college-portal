<?php
session_start();
	require_once('phpClass/SQL.php'); 

	$userid=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$prn=$_REQUEST['prn'];

	$db=SQLFacade::CreateMySQL('localhost','root','','college');
	$ret=$db->GetData('*',"account","`email`='$userid' AND `prn`=$prn AND `password`=MD5('$pass')");

	if ($row=$db->fetch($ret)) {
		$_SESSION['userid']=$row['prn'];
		$_SESSION['atype']=$row['accountType'];
		var_dump($row['prn']);
	}else{
		header('Location: http://localhost/');
		exit;
	}
	header('Location: http://localhost/');
?>

