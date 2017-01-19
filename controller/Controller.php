<?php
session_start();
include_once("controller/sessioncontroller.php");
include_once('phpClass/uploadimage.php');
include_once("model/Model.php");

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
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
    } 

	public function invoke($control)
	{
		$site=$GLOBALS['site'];
		if($control=="home"){
			$events=$this->model->getEventList();
			include_once 'view/main/index.php';
		}else if($control=="login"){
			if(!isset($_REQUEST['type'])){
				header("location:".constant("hostname")."/login/student");
			}else if($_REQUEST['type']=='loginsubmit'){
				include 'view/loginsubmit.php';
			}else{
				include 'view/login.php';
			}
		}else if($control=="test"){
			if(isset($_REQUEST['type'])){
				if ($_REQUEST['type']=='file') {
					if(!isset($_REQUEST['user'])){
						include_once 'view/test/filetest.php';
					}else{
						include_once 'view/test/filesubmit.php';
					}
				}else{
					include_once 'view/test/testserver.php';
				}
			}else{
				include_once 'view/test/test.php';
			}
		}else if($control=="quiz"){
			if($_REQUEST['type']=='view'){
				if(isset($_REQUEST['user'])){	
					$quiz=$this->model->GetQuiz($_REQUEST['user']);
					include_once 'view/quiz/viewquiz.php';
				}else{
					$quiz=$this->model->GetQuizlist();
					include_once 'view/quiz/quizlist.php';
				}
			}else if($_REQUEST['type']=='add'){
				if(isset($_REQUEST['user'])){
					include_once 'view/quiz/addquiz2.php';
				}else{
					include_once 'view/quiz/addquiz.php';
				}
			}
		}else if($control=="account"){
			if(!isset($_REQUEST['user'])||$_REQUEST['user']==''){
					if($_REQUEST['type']=='student'){
						$accounts = $this->model->getaccountlist();
						$site=$GLOBALS['site'];
						include 'view/'.$control.'list.php';
					}else if($_REQUEST['type']=='teacher'||$_REQUEST['type']=='admin'){
						$account = $this->model->getTeacheraccountlist();
						$site=$GLOBALS['site'];
						include 'view/teacherlist.php';
					}else if($_REQUEST['page']=='event'){
						$event = $this->model->getEventlist();
						include 'view/'.$control.'list.php';
					}
				}else{
					if($_REQUEST['type']=='student'){
						$account = $this->model->getaccount($_REQUEST['user']);
						$site=$GLOBALS['site'];
						include 'view/view'.$control.'.php';
					}else if($_REQUEST['type']=='teacher'||$_REQUEST['type']=='admin'){
						$account = $this->model->getTeacheraccount($_REQUEST['user']);
						$site=$GLOBALS['site'];
						include 'view/viewteacher'.$control.'.php';
					}else if($_REQUEST['page']=='event'){
						$event = $this->model->getEvent($_REQUEST['user']);
						include 'view/view'.$control.'.php';
					}
				}
		}else if($control=='api'){
			if($_REQUEST['type']=="students"){
				$accounts = $this->model->getaccountList();
				$clas=$_REQUEST['user'];
				include_once 'view/api/accountlist.php';
			}else if ($_REQUEST['type']=="search") {
				$accounts=$this->model->searchStudents($_REQUEST['search']);
				$teachers=$this->model->searchFacalties($_REQUEST['search']);
				include_once 'view/api/search.php';
			}else if($_REQUEST['type']=="imageupload"){
				include_once 'view/api/uploadimage.php';
			}
		}else if($control=='quiz'){
			if($_REQUEST['type']=='add'){
				include_once 'view/quiz/addquiz.php';
			}
		}else if($control=='teacher'){
			if($_REQUEST['type']=='attendance'){
				if($_REQUEST['user']=='view'){
					if($_REQUEST['id']==''){
						$attendance=$this->model->getAttendanceList();
						include_once 'view/teacher/'.$_REQUEST['type'].'list.php';
					}else{
						$attendance=$this->model->getAttendance($_REQUEST['id']);
						include_once 'view/teacher/view'.$_REQUEST['type'].'.php';
					}
				}else if($_REQUEST['user']=='add'){
					$classes=$this->model->getClasses();
					if(!isset($_REQUEST['id']))
					{
						if(!isset($_REQUEST['submit']))
						{
							include_once 'view/teacher/addAttendance.php';
						}else{
							$accounts = $this->model->getaccountList();
							include_once 'view/teacher/addAttendance2.php';
						}
					}else{
							$accounts = $this->model->getaccountList();
							foreach ($accounts as $key => $value) {
								if(isset($_REQUEST[$key])&&$_REQUEST[$key]=='1'){
									
									if($this->model->insertAttendance($value->prn)){
										header("Location:".$site->getHost());
									}
								}
							}
							var_dump($_REQUEST);
					}
				}
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
		}else if($control=="event"){
			$event=$this->model->getEventList();
			if(isset($_REQUEST['user'])){
				if($_REQUEST['user']=='submit'){
					include_once 'view/create'.$_REQUEST['page'].'.php';
				}else{
					$event=$this->model->getEvent($_REQUEST['user']);
					include_once 'view/view'.$_REQUEST['page'].'.php';
				}
			}else{
				if($_REQUEST['type']=='add'){
					include_once 'view/add'.$_REQUEST['page'].'.php';
				}else if ($_REQUEST['type']=='view') {
					include_once 'view/'.$_REQUEST['page'].'list.php';
				}
			}
		}else if($control=="timetable"){
			$timetable=$this->model->getTimeTablelist();
			$tt=$timetable[$_REQUEST['type']];
			$days=array('Monday','Tuesday','Wednessday','Thuesday','Friday');
			$time=array('10:30-11:30','11:30-12:30','12:30-1:15','1:15-2:15','2:15-3:15','3:15-3:30','3:30-4:30','4:30-5:30');
			include_once 'view/timetable.php';
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
						var_dump($_REQUEST);
						include 'view/add'.$_REQUEST['page'].'.php';
					}
				}else{
					if(!isset($_REQUEST['user'])||$_REQUEST['user']==''){
						if($_REQUEST['type']=='student'){
							$accounts = $this->model->getaccountlist();
							$site=$GLOBALS['site'];
							include 'view/'.$control.'list.php';
						}else if($_REQUEST['type']=='teacher'){
							$account = $this->model->getTeacheraccountlist();
							$site=$GLOBALS['site'];
							include 'view/teacher'.$control.'list.php';
						}else if($_REQUEST['page']=='event'){
							$event = $this->model->getEventlist();
							include 'view/'.$control.'list.php';
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
				}
			}else{
				header("location:".$site->getHost());
			}
		}
	}
}

?>
