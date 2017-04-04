<?php
	if(isset($_REQUEST['id'])){
		Model::CreateInstance();
		$ret=$GLOBALS['db']->GetData('*','page_info',"`page id`='".$_REQUEST['id']."'");
		Model::$instance->SetData($ret[0]);
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
