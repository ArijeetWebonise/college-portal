<?php 
	$fields="`UserName`, `prn`";
	$table="account";
	$id='PhExtension';
	switch ($_REQUEST['usertype']) {
		case 'teacher':
			$table="teacher";
			$fields="`username`, `PhExtension`";
			$name='username';
			break;
		case 'student':
		default:
			$table="account";
			$fields="`UserName`, `prn`";
			$name='UserName';
			break;
	}
	$ret=$GLOBALS['db']->GetData($fields ,$table,"`email`='".$_REQUEST['id']."' and `password`=MD5('".$_REQUEST['password']."')");
	if(!empty($ret)){
		SessionManager::setSession("prn",$ret[0]['prn']);
		SessionManager::setSession("username",$ret[0][$name]);
		SessionManager::setSession("privileage",'1');
		header("Location: ".$site->getHost()."/user/dashboard");
	}
?>
