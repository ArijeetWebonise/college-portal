<?php 
	$fields="`UserName`, `prn`";
	$table="account";
	$id='PhExtension';
	switch ($_REQUEST['usertype']) {
		case 'teacher':
			$table="teacher";
			$fields="`username`, `PhExtension`";
			break;
		case 'student':
		default:
			$table="account";
			$fields="`UserName`, `prn`";
			break;
	}
	if($ret=$GLOBALS['db']->GetData($fields ,$table,"`email`='".$_REQUEST['id']."' and `password`=MD5('".$_REQUEST['password']."')")){
		while ($row=$GLOBALS['db']->fetch($ret)) {
			SessionManager::setSession("prn",$row[$id]);
			SessionManager::setSession("privileage",'1');
		}
	}
?>
