<?php

class Question
{
	public $question_id;
	public $question;
	public $marks;
	public $options;

	function __construct($data)
	{
		$this->question_id=$data['question_id'];
		$this->question=$data['question'];
		$this->marks=$data['marks'];
		$this->options=$data['options'];
	}
}

/**
* Quiz Class
*/
class Quiz
{
	public $quiz_id;
	public $quiz_name;
	public $createdby;
	public $duration;
	public $noofquestion;
	public $startdate;
	public $enddate;
	public $starttime;
	public $endtime;
	public $question;

	function __construct($data)
	{
		$quiz_id=$data['quiz_id'];
		$quiz_name=$data['quiz_name'];
		$createdby=$data['createdby'];
		$duration=$data['duration'];
		$noofquestion=$data['noofquestion'];
		$startdate=$data['startdate'];
		$enddate=$data['enddate'];
		$starttime=$data['starttime'];
		$endtime=$data['endtime'];
		$question=$data['question'];
	}
}
?>
