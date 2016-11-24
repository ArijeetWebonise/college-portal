<?php
require_once('vender/excel_reader/excel_reader.php');
require_once('vender/xlsreader/excel.php');
/**
* XLS Reader reads XLS files into objects
* @Arijeet
*/
class XLSReaderFactory
{
	private $excel;
	function __construct($fname)
	{
		$this->excel = new PhpExcelReader;
		$this->excel->read($fname);
	}
	public function GetSheetObject(){
		return $this->excel->sheets;
	}
}


/*
* Convert Sheet to HTML table
*/
function SheettoTable($excel){
	$table=null;
	$f=FALSE;
	foreach ($excel->GetSheetObject() as $sheets) {
		foreach ($sheets['cells'] as $row) {
		$count=0;
			$table.='<tr>';
			foreach ($row as $cell) {
				if($f){
					$table.='<td>'.$cell.'</td>';
					if($cell=='1')
						$count++;
				}
				else{
					$table.='<th>'.$cell.'</th>';
				}
			}
			if(!$f){
				$table.="<th>Count</th>";
			}else{
				$table.='<td>'.$count.'</td>';
			}
			$f=TRUE;
			$table.='</tr>';		
		}
	}
	return $table;
}

function SheettoObject($excel){
	$obj=array();
	$rowarr=array();
	$rowlist=array();
	$flag=TRUE;
	$maxkey=0;
	foreach ($excel->GetSheetObject() as $sheets) {
		foreach ($sheets['cells'] as $row) {
			foreach ($row as $key => $cell) {
				$maxkey=$key;
				if($flag)
					array_push($rowlist,$cell);
			}
			if(!$flag){
			$i=$maxkey-count($rowlist)+1;
			foreach ($rowlist as $key) {
				$rowarr[$key]=$row[$i];
					$i++;
				}
			}
			if($flag)
			{
				$flag=FALSE;
				continue;
			}
			array_push($obj, $rowarr);
		}
	}
	return $obj;
}

function AddnewCol($xls,$newobj,$name){
	$i=0;
	$array=array();
	foreach ($xls as $row) {
		if(isset($newobj[$i])){
			$xls[$i][$name]=(string)$newobj[$i];
		}
		$i++;
	}
	return $xls;
}

/**
* XLSReaderFacade
*/
class XLSReaderFacade
{
	public static function CreateXLSReader($fname){
		return new XLSReaderFactory($fname);
	}
}

?>
