<?php
$table="attendance";
$fields="`Date Of Class`,`period`,`prn`,`attendance`";
for ($i=0; $i <$_REQUEST['studentnum'] ; $i++) { 
	$value="'".$_REQUEST['dateofattendance']."',".$_REQUEST['period'].",'".$_REQUEST['present'.$i]."',1";
	$ret= $GLOBALS['db']->InsertData($table,$fields,$value);
}

var_dump($ret);
?>
