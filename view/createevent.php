<?php 
	var_dump($_REQUEST); 
	$ret=$GLOBALS['db']->InsertData('events','`event name`,`event desp`,`creator`,`location`,`start date`,`end date`,`start time`,`end time`,`showmap`,`is virtual`',"'".$_REQUEST['eventname']."','".$_REQUEST['eventdesp']."','".SessionManager::getSession('prn').$_REQUEST['location']."','".$_REQUEST['startdate']."','".$_REQUEST['enddate']."','".$_REQUEST['starttime']."','".$_REQUEST['endtime']."','".isset($_REQUEST['showmap'])."','".isset($_REQUEST['isvirtual'])."'");
	var_dump($ret);
?>
