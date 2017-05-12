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

	public static function GetAttendanceList(){
		$atts= $GLOBALS['db']->GetData('*','attendance');
		$newatts=array();
		foreach ($atts as $att) {
			$ret= $GLOBALS['db']->GetData('`UserName`','account',"`prn`=".$att['prn']);
			$att['name']=$ret[0]['UserName'];
			array_push($newatts, $att);
		}
		return $newatts;
	}
}
?>
