<?php

class Question
{
	public $question_id;
	public $question;
	public $question_type;
	public $image;
	public $marks;
	public $options;

	function __construct($data)
	{
		$this->question_id=$data['question_id'];
		$this->question=$data['question'];
		$this->image=$data['image'];
		$this->marks=$data['marks'];
		$this->options=$data['options'];
		$this->question_type=$data['question_type'];
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
	public $Date;
	public $question;

	function __construct($data)
	{
		$this->quiz_id=$data['quiz id'];
		$this->quiz_name=$data['quiz name'];
		$this->createdby=$data['createdby'];
		$this->duration=$data['duration'];
		$this->noofquestion=$data['noofquestion'];
		$this->Date=$data['Date'];
		$this->question=$data['questions'];
	}
}
?>
