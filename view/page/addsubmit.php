<?php
if(isset($_REQUEST['Submit'])){
	$GLOBALS['db']->InsertData('page_info','`title`,`body`',"'".$_REQUEST['title']."','".$_REQUEST['body']."'");
}
?>
