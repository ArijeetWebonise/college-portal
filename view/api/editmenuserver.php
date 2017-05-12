<?php
var_dump($_REQUEST);
if(isset($_REQUEST["list"])){	
	$arr=array();
	$main=0;
	$list=json_decode($_REQUEST["list"]);
	if($_REQUEST['sub']=="TRUE"){
		foreach ($list as $item) {
			array_push($arr,substr($item,2));
			$main=substr($item,0,1);
		}
		foreach ($arr as $key => $item) {
			$pos=$key+1;
			if($GLOBALS['db']->UpdateData('sub_menu',"`order`='".$pos."'","`s_menu_id`='".$item."' AND `m_menu_id`='".$main."'")){
				var_dump(TRUE);
			}else{
				var_dump(FALSE);
			}
		}
	}else{
		foreach ($list as $item) {
			array_push($arr,substr($item,4));
		}
		foreach ($arr as $key => $item) {
			$pos=$key+1;
			if($GLOBALS['db']->UpdateData('main_menu',"`order`='".$pos."'","`m_menu_id`='".$item."'")){
				var_dump(TRUE);
			}else{
				var_dump(FALSE);
			}
		}
	}
}else{
	if($_REQUEST['menutype']=='submenu'){
		if($_REQUEST['sub']=="TRUE"){
				if($GLOBALS['db']->UpdateData('sub_menu',"`s_menu_name`='".$_REQUEST['menuname']."',`s_menu_link`=".$_REQUEST['menuurl'],"`s_menu_id`=".$_REQUEST['menuid'])){
						var_dump(TRUE);
				}else{
					var_dump(FALSE);
				}
		}
	}else{
			if($GLOBALS['db']->UpdateData('main_menu',"`m_menu_name`='".$_REQUEST['menuname']."',`m_menu_link`='".$_REQUEST['menuURL']."'","`m_menu_id`=".$_REQUEST['menuid'])){
				var_dump(TRUE);
			}else{
				var_dump(FALSE);
			}
		}
	}
?>
