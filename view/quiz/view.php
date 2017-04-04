<?php
	if(isset($_REQUEST['id'])){
		$quiz=Model::$instance->GetQuiz($_REQUEST['id']);
		var_dump($quiz);
	}else{
		$quizlist=Model::$instance->GetQuizList();
		foreach ($quizlist as $qkey => $quiz) {
			var_dump($quiz);
		}
	}
?>
