<?php
	$Sheets=$xls->GetSheetObject();
	$bank=array();
	foreach ($Sheets as $key => $sheet) {
		$sec = array();
		foreach ($sheet['cells'] as $key2 => $cell) {
			$question=array();
			if($key2==1)
				continue;
			$question['Question']=$cell[2];
			$question['image']=isset($cell[3])?$cell[3]:null;
			$question['type']=$cell[4];
			$question['option1']=$cell[5];
			$question['option2']=$cell[6];
			$question['option3']=$cell[7];
			$question['option4']=$cell[8];
			$question['ans']=$cell[9];
			$sec[$cell[1]]=$question;
		}
		array_push($bank, $sec);
	}
	var_dump($bank);
?>
