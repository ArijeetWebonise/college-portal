<?php
	function test($var){
		echo "parameter is ".$var;
	}
	echo "these is a test<br>";
	$url=explode('/', $_REQUEST['url']);
	$url[0]($url[1]);
?>
