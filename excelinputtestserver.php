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

	function calalph($data){
		$alphabet =   array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		if($data > 26){
			return FALSE;
		}
		else {
			return $alphabet[$data-1];
		}
	}

	function calletter($data)
	{
		if($data<=26){
			return calalph($data);
		}else{
			$letter=$data%26;
			$fletter=$data/26;
			return calletter($fletter).calalph($letter);
		}
	}

	$testcase=PHPExcelFacade::CreatePHPExcel($prop);
	for ($i=0; $i < 50; $i++) { 
		for ($j=1; $j < 50; $j++) { 
			$cell=array(
				'key'=>calletter($j).$i,
				'value'=>$_REQUEST['cell'.$i.'_'.$j]
			);
			$testcase->AddData(0,$cell);
		}
	}
	$testcase->RenameSheet('Comp1');
	$format=array(
		'name'=>'Excel2007',
		'filename'=>'Marks',
		'ext'=>'.xlsx'
	);
	$testcase->SaveFile($format);
?>
