<?php 
var_dump($_REQUEST);

include_once 'phpClass/uploadimage.php';
$file=new UploadFile('question');

$ret=$GLOBALS['db']->InsertData('quiz_list',
	"`quiz name`,`duration`,`createdby`,`Date`,`noofquestion`,`subject`,`dept`,`questions`",
	"'".$_REQUEST['quiz_name']."',"
	.$_REQUEST['duration'].",'arijeetbaruah','"
	.$_REQUEST['quizDate']."',".$_REQUEST['noofquestion'].",'".$_REQUEST['sub']."','".$_REQUEST['dept']."','".$file->Upload()."'");
var_dump($ret);
// $this->model->createQuiz($para);
// $this->model->AddQuestion($qno,$para,1);
?>
