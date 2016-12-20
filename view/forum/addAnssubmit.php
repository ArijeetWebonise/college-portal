<?php
$tbl_name="forum_answer"; // Table name 

// Get value of id that sent from hidden field 
$id=$_REQUEST['id'];

// Find highest answer number. 
$result=$GLOBALS['db']->GetData("MAX(a_id) AS Maxa_id",$tbl_name,"question_id='$id'");
$rows=$GLOBALS['db']->fetch($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
$a_prn=SessionManager::getSession("prn");
$a_answer=$_REQUEST['a_answer']; 

$datetime=date("d/m/y H:i:s"); // create date and time

// Insert answer 
$result2=$GLOBALS['db']->InsertData($tbl_name,"question_id, a_id, a_prn, a_answer, a_datetime","'$id', '$Max_id', '$a_prn', '$a_answer', '$datetime'");

if($result2){
echo "Successful<BR>";
echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column 
$tbl_name2="forum_question";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
$result3=$GLOBALS['db']->UpdateData($tbl_name2,"reply='$Max_id'","id='$id'");
}
else {
echo "ERROR";
}

?>
