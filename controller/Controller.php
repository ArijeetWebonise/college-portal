<?php
session_start();
include_once("controller/sessioncontroller.php");
include_once("model/Model.php");
//include_once('phpClass/uploadimage.php');

function getnav()
{
	$site=$GLOBALS['site'];
	include_once 'view/admin/menupage.php';
	other();
}
function getnavhome()
{
	$site=$GLOBALS['site'];
	include_once 'view/admin/menupage.php';
	home();
}

$scripts=array();

function enqueueScript($type,$link){
	array_push($GLOBALS['scripts'], array('type'=>$type,'link'=>$link));
} 

function getScripts(){
	foreach ($GLOBALS['scripts'] as $script) {
		if ($script['type']=='js') {
			?><script src="<?php echo $script['link']; ?>"></script><?php
		}elseif ($script['type']=='css'){
			?><link rel="stylesheet" type="text/css" href="<?php echo $script['link']; ?>"><?php
		}
	}
}

class Controller {
	
	public function invoke()
	{
		$site=$GLOBALS['site'];		
		
		if(isset($_REQUEST['type'])){
			if(file_exists('view/'.$_REQUEST['type'].'/index.php')){
				if(file_exists('model/'.$_REQUEST['type'].'/'.$_REQUEST['type'].'.php')){
					include_once 'model/'.$_REQUEST['type'].'/'.$_REQUEST['type'].'.php';
				}
				include_once 'view/'.$_REQUEST['type'].'/index.php';
			}else{
				trigger_error("Page Not Found",E_USER_ERROR);
			}
		}else{
			include_once 'view/main/index.php';
		}
	}

}

?>
