<?php
session_start();
include_once("controller/sessioncontroller.php");
include_once("model/Model.php");

function getnav()
{
	$site=$GLOBALS['site'];
	include_once 'view/admin/menupage.php';
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
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
    } 

	public function invoke($control)
	{
		$site=$GLOBALS['site'];
		if($control=="login"){
			if(!isset($_REQUEST['type'])){
				header("location:".constant("hostname")."/login/student");
			}else if($_REQUEST['type']=='loginsubmit'){
				include 'view/loginsubmit.php';
			}else{
				include 'view/login.php';
			}
		}else if($control=="admin"){
			if($_REQUEST['type']=='editmenu'){
				include 'view/admin/editmenu.php';
			}else if($_REQUEST['type']=='editmenuserver'){
				include 'view/admin/editmenuserver.php';
			}else if($_REQUEST['type']=='addmenuserver'){
				include 'view/admin/addmenuserver.php';
			}else if($_REQUEST['type']=='menuremove'){
				include 'view/admin/removemenuserver.php';
			}
		}else if($control=="register"){
			include 'view/register.php';
		}else if($control=="forum"){
			if(isset($_REQUEST['type'])){
				if($_REQUEST['type']=='view'){
					include 'view/forum/viewquestion.php';
				}else if($_REQUEST['type']=='addAns'){
					include 'view/forum/'.$_REQUEST['type'].'submit.php';
				}else{
					if(isset($_REQUEST['user'])){
						if($_REQUEST['user']=='result'){
							include 'view/forum/'.$_REQUEST['type'].'submit.php';
						}else{
							header("location:".constant("hostname")."/forum/".$_REQUEST['type']);
						}
					}else{
						include 'view/forum/'.$_REQUEST['type'].'.php';
					}
				}
			}else{
				include 'view/forum/viewlist.php';
			}
		}else{
			if(isset($_REQUEST['type'])){
				if (!isset($_REQUEST['user']) && $_REQUEST['type']=='view')
				{
					$accounts = $this->model->getaccountList();
					$event=$this->model->getEventList();
					$site=$GLOBALS['site'];
					include 'view/'.$control.'list.php';
				}else if($_REQUEST['type']=='create'){
					if(isset($_REQUEST['user'])){
						if($_REQUEST['user']=='submit'){
							include 'view/create'.$_REQUEST['page'].'.php';
						}
					}else{
						include 'view/add'.$_REQUEST['page'].'.php';
					}
				}else{
					if($_REQUEST['type']=='student'){
						$account = $this->model->getaccount($_REQUEST['user']);
						$site=$GLOBALS['site'];
						include 'view/view'.$control.'.php';
					}else if($_REQUEST['type']=='teacher'){
						$account = $this->model->getTeacheraccount($_REQUEST['user']);
						$site=$GLOBALS['site'];
						include 'view/viewteacher'.$control.'.php';
					}else if($_REQUEST['page']=='event'){
						$event = $this->model->getEvent($_REQUEST['user']);
						include 'view/view'.$control.'.php';
					}
				}
			}else{
				header("location:".$site->getHost());
			}
		}
	}
}

?>
