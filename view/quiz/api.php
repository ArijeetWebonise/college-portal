<?php 
include_once 'phpClass/xlsClass.php';
	if(!isset($_POST['id'])){
		die();
	}
	$file=XLSReaderFacade::CreateXLSReader($mod->question);
	$banks=SheettoObject($file);
	echo(json_encode($banks));
?>
