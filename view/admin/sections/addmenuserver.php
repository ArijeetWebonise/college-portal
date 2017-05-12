<?php
	if($_REQUEST['putin']=='main'){
		$ret=$GLOBALS['db']->getData('max(`order`)','main_menu');
		$location=-1;
		while ($row=$GLOBALS['db']->fetch($ret)) {
			$location=$row['max(`order`)']+1;
		}
		if($GLOBALS['db']->InsertData('main_menu',"`m_menu_name`,`m_menu_link`,`order`","'".$_REQUEST['m_name']."','".$_REQUEST['m_URL']."','".$location."'")){
			var_dump(TRUE);
		}else{
			var_dump(FALSE);
		}
	}else{
		$ret=$GLOBALS['db']->getData('max(`order`)','sub_menu',"`m_menu_id`='".$_REQUEST['putin']."'");
		$location=-1;
		while ($row=$GLOBALS['db']->fetch($ret)) {
			$location=$row['max(`order`)']+1;
		}
		if($GLOBALS['db']->InsertData('sub_menu',"`m_menu_id`,`s_menu_name`,`s_menu_link`,`order`","'".$_REQUEST['putin']."','".$_REQUEST['m_name']."','".$_REQUEST['m_URL']."','".$location."'")){
			var_dump(TRUE);
		}else{
			var_dump(FALSE);
		}
	}
?>
