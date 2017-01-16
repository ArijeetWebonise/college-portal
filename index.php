<?php 
	include_once("adminsetting/setsetting.php");
	include_once("controller/Controller.php");
	$file = "config.json";

	$json = json_decode(file_get_contents($file));

	$controller = new Controller();
	if(isset($_REQUEST['page'])){
		$controller->invoke($_REQUEST['page']);
	}else{
		$controller->invoke('home');
	}

?>