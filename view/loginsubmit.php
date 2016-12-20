<?php 
	$table="account";
	switch ($_REQUEST['usertype']) {
		case 'teacher':
			$table="teacher";
			break;
		case 'student':
		default:
			$table="account";
			break;
	}
	$ret=$GLOBALS['db']->GetData("UserName, prn",$table,"email='".$_REQUEST['id']."' and password=MD5('".$_REQUEST['password']."')");
	while ($row=$GLOBALS['db']->fetch($ret)) {
		SessionManager::setSession("prn",$row['prn']);
	}
?>
