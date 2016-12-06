<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	
	public function invoke()
	{
		if (!isset($_GET['account']))
		{
			// no special account is requested, we'll show a list of all available accounts
			$accounts = $this->model->getaccountList();
			include 'view/accountlist.php';
		}
		else
		{
			// show the requested account
			$account = $this->model->getaccount($_GET['account']);
			include 'view/viewaccount.php';
		}
	}
}

?>