<?php
if(strpos($_REQUEST['user'],'-')!==FALSE){
	$sub=explode('-', $_REQUEST['user'])[1];
	$ret=$GLOBALS['db']->DeleteData('sub_menu',"`s_menu_id`='".$sub."'");
	var_dump($ret);
}else{
	$main=$_REQUEST['user'];
	$ret=$GLOBALS['db']->DeleteData('main_menu',"`m_menu_id`='".$main."'");
	var_dump($ret);
}
?>
