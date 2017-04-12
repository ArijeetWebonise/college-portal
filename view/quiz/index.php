<?php
	if(isset($_REQUEST['id'])){
		$ret=$GLOBALS['db']->GetData('*','quiz_list',"`quiz id`='".$_REQUEST['id']."'");
		$mod = new Quiz($ret[0]);
		if(file_exists('view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php')){
			include_once 'view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php';
		}
	}else if($_REQUEST['method']=='api'){
		$ret=$GLOBALS['db']->GetData('*','quiz_list',"`quiz id`='".$_REQUEST['id']."'");
		$mod = new Quiz($ret[0]);
		if(file_exists('view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php')){
			include_once 'view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php';
		}
	}else{
		if(file_exists('view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'list.php')){
			include_once 'view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'list.php';
		}else if(file_exists('view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php')){
			include_once 'view/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php';
		}
	}
?>
