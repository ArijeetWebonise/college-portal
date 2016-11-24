<?php
require_once 'PHPClass/PHPExcelWriter.php';
	$prop=array(
		'creator'=>"Arijeet Baruah",
		'title'=>"PHPExcel Test Document",
		'subject'=>"PHPExcel Test Document",
		'description'=>"Test document for PHPExcel, generated using PHP classes.",
		'keyword'=>"office PHPExcel php",
		'category'=>"Test result file"
	);
	$testcase=PHPExcelFacade::CreatePHPExcel($prop);
	for ($i=0; $i < 5; $i++) { 
		$cell=array(
			'key'=>'A'.$i,
			'value'=>'These'
		);
		$testcase->AddData(0,$cell);
	}
	$testcase->RenameSheet('Comp1');
	$format=array(
		'name'=>'Excel2007',
		'filename'=>'Marks',
		'ext'=>'.xlsx'
	);
	$testcase->SaveFile($format);

?>
