<?php 
	if(isset($_REQUEST['id'])){
		if(file_exists('model/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php')){
			include_once 'model/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php';
		}
		include_once 'view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php';
	}else if(file_exists('view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'list.php')){
		include_once 'view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'list.php';
	}
?>
