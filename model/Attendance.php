<?php 
/**
* Attendance Object
*/
class Attendance
{
	public $name;
	public $username;
	public $prn;
	public $dateofattendance;
	public $Class;
	public $attendance;

	function __construct($list)
	{
		$this->name=$list['name'];
		$this->username=$list['username'];
		$this->prn=$list['prn'];
		$this->Class=$list['Class'];
		$this->dateofattendance=$list['dateofattendance'];
		$this->attendance=$list['attendance']=='0'?TRUE:FALSE;
	}
}
?>
