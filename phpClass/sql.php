<?php
	$filename="config.json";
	$myfile = fopen($filename,"r");
	$json = json_decode(fread($myfile,filesize($filename)));
	require_once('phpClass/SQLClass.php');
	$db=SQLFacade::CreateMySQL($json->database->dbhost,$json->database->username,$json->database->password,$json->database->dbname);
?>
