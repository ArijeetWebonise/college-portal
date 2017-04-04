<?php 
	include_once("adminsetting/setsetting.php");
	include_once("controller/Controller.php");
	$file = "config.json";

	$json = json_decode(file_get_contents($file));

	$controller = new Controller();
	$controller->invoke();

?>