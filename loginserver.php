<?php
session_start();
	require_once('phpClass/SQL.php'); 
	$db=SQLFacade::CreateMySQL('localhost','root','','college');
	$ret=null;

	switch ($_REQUEST['type']) {
	 	case 'student':
	 		$userid=$_REQUEST['Email'];
			$pass=$_REQUEST['pass'];
			$prn=$_REQUEST['PRN'];
			$ret=$db->GetData('*',"account","`email`='$userid' AND `prn`=$prn AND `password`=MD5('$pass')");
			if ($row=$db->fetch($ret)) {
				$_SESSION['userid']=$row['prn'];
				$_SESSION['atype']=$row['accountType'];
				var_dump($row['prn']);
			}else{
				header('Location: http://localhost/index.php');
				exit;
			}
	 		break;

	 	case 'parent':
	 		$phone=$_REQUEST['Phone'];
			$pass=$_REQUEST['pass'];
			$prn=$_REQUEST['PRN'];
			$ret=$db->GetData('*',"account","`parentphone`='$phone' AND `prn`=$prn AND `parrentpassword`=MD5('$pass')");
			if ($row=$db->fetch($ret)) {
				$_SESSION['userid']=$row['prn'];
				$_SESSION['atype']=$row['accountType'];
				var_dump($row['prn']);
			}else{
				header('Location: http://localhost/index.php');
				exit;
			}
	 		break;

	 	case 'teacher':
	 		$userid=$_REQUEST['Email'];
			$pass=$_REQUEST['pass'];
			$prn=$_REQUEST['EnRoll'];
			$ret=$db->GetData('*',"account","`email`='$userid' AND `prn`=$prn AND `password`=MD5('$pass')");
			if ($row=$db->fetch($ret)) {
				$_SESSION['userid']=$row['prn'];
				$_SESSION['atype']=$row['accountType'];
				var_dump($row['prn']);
			}else{
				header('Location: http://localhost/index.php');
				exit;
			}
	 		break;
	 }  


	header('Location: http://localhost/oldindex.php');
?>
