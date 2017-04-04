<?php
	switch ($_REQUEST['method']) {
		case 'add':
			include_once 'add.php';
			break;
		case 'view':
			include_once 'view.php';
			break;
		case 'upload':
			include_once 'upload.php';
			break;
		default:
			# code...
			break;
	}
?>
