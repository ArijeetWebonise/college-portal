<?php
/**
* Event
*/
class Event
{
	public $eventid;
	public $creator;
	public $creatortype;
	public $eventname;
	public $eventdesp;
	public $location;
	public $startdate;
	public $enddate;
	public $starttime;
	public $endtime;
	public $isvirtual;
	public $showmap;

	function __construct($arr)
	{
		$this->eventid=$arr['event id'];
		$this->eventname=$arr['event name'];
		$this->eventdesp=$arr['event desp'];
		$this->creator=$arr['creator'];
		$this->creatortype=$arr['creator type'];
		$this->location=$arr['location'];
		$this->startdate=$arr['start date'];
		$this->enddate=$arr['end date'];
		$this->starttime=$arr['start time'];
		$this->endtime=$arr['end time'];
		$this->isvirtual=$arr['isVirtual'];
		$this->showmap=$arr['showmap'];
	}

}
?>
