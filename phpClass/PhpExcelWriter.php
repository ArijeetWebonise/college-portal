<?php

/** Include PHPExcel */
require_once dirname(__FILE__) . '/vender/PHPExcel/Classes/PHPExcel.php';

/**
* PHPExcelFactory
*/
class PHPExcelFactory
{
	private $objPHPExcel;
	function __construct($property)
	{
		$this->objPHPExcel = new PHPExcel();
		$this->objPHPExcel->getProperties()->setCreator($property['creator'])
									 ->setLastModifiedBy($property['creator'])
									 ->setTitle($property['title'])
									 ->setSubject($property['subject'])
									 ->setDescription($property['description'])
									 ->setKeywords($property['keyword'])
									 ->setCategory($property['category']);
	}
	public function AddData($ActiveSheetIndex,$cell){
		$this->objPHPExcel->setActiveSheetIndex($ActiveSheetIndex)
            ->setCellValue($cell['key'], $cell['value']);
	}
	public function RenameSheet($title){
		$this->objPHPExcel->getActiveSheet()->setTitle($title);
	}
	public function SaveFile($format){
		$callStartTime = microtime(true);
		$objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, $format['name']);
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition: attachment;filename="'.$format['filename'].$format['ext'].'"');
		header("Content-Transfer-Encoding: binary ");

		// This line will force the file to download
		$objWriter->save('php://output');
		$callEndTime = microtime(true);
		$callTime = $callEndTime - $callStartTime;
	}
}

/**
* PHPExcelFacade
*/
class PHPExcelFacade
{
	public static function CreatePHPExcel($property){
		return new PHPExcelFactory($property);
	}
}

?>
