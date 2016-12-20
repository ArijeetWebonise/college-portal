<?php
$tbl_name="forum_question"; // Table name 

// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$prn=SessionManager::getSession("prn");

$datetime=date("d/m/y h:i:s"); //create date time

$result=$GLOBALS['db']->InsertData($tbl_name,"topic, detail, prn, datetime","'$topic', '$detail', '$prn', '$datetime'");

if($result){
echo "Successful<BR>";
header("location:".constant("hostname")."/forum/create");
}
else {
echo "ERROR";
}
?>
