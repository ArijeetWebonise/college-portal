<?php
	$arr=array();
	$main=0;
	$list=json_decode($_REQUEST["list"]);
	foreach ($list as $item) {
		array_push($arr,substr($item,4));
		$main=substr($item,0,1);
		var_dump(substr($item,2));
	}
	if($_REQUEST['sub']=="TRUE"){
		foreach ($arr as $key => $item) {
			$pos=$key+1;
			if($GLOBALS['db']->UpdateData('sub_menu',"`order`='".$pos."'","`s_menu_id`='".$item."' AND `m_menu_id`='".$main."'")){
				var_dump(TRUE);
			}else{
				var_dump(FALSE);
			}
		}
	}else{
		foreach ($arr as $key => $item) {
			$pos=$key+1;
			if($GLOBALS['db']->UpdateData('main_menu',"`order`='".$pos."'","`m_menu_id`='".$item."'")){
				var_dump(TRUE);
			}else{
				var_dump(FALSE);
			}
		}
	}
?>
