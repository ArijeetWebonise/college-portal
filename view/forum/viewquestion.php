<html>
<head>
	<title>
		<?php echo $site->getTitle(); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>

<body>

<?php

getnav();

$tbl_name="forum_question"; // Table name 

// get value of id that sent from address bar 
$id=$_REQUEST['user'];
$result=$GLOBALS['db']->GetData('*',$tbl_name,"id='$id'");
$rows=$GLOBALS['db']->fetch($result);
?>
<div class="container">
<h2><?php echo $rows['topic']; ?></h2>
By : <?php echo $rows['prn']; ?> <br>
<p>Date/time : <?php echo $rows['datetime']; ?></p>
<?php echo $rows['detail']; ?>
</div>
<br>

<?php

$tbl_name2="forum_answer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=$GLOBALS['db']->GetData('*',$tbl_name2,"question_id='$id'");
while($rows=$GLOBALS['db']->fetch($result2)){
?>
<div class="well container">
<strong><?php echo $rows['a_prn']; ?></strong>  <?php echo $rows['a_datetime']; ?>
<br>
<?php echo $rows['a_answer']; ?>
</div>
 <br>
<?php
}

$result3=$GLOBALS['db']->GetData('view',$tbl_name,"id='$id'");
$rows=$GLOBALS['db']->fetch($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$result4=$GLOBALS['db']->UpdateData($tbl_name,"view='$view'","id='$id'");
}
 
// count more value
$addview=$view+1;
$result5=$GLOBALS['db']->UpdateData($tbl_name,"view=$view","id='$id'");

if(isset($_SESSION['prn'])){
?>
	<div class="container">
		<form name="form1" method="post" action="<?php echo $site->getHost(); ?>/forum/addAns">
			<div class="form-group">
				<label>PRN</label>
				<input class="form-control" value="<?php echo SessionManager::getSession("prn"); ?>" name="a_prn" type="text" id="a_prn" size="45" disabled>
			</div>
			<div class="form-group">
				<label>Answer</label></td>
				<textarea class="form-control" name="a_answer" cols="45" rows="3" id="a_answer"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control" name="id" type="hidden" value="<?php echo $id; ?>">
				<input class="btn btn-default" type="submit" name="Submit" value="Submit"> 
				<input class="btn btn-default" type="reset" name="Submit2" value="Reset">
			</div>
		</form>
	</div>
<?php } ?>
</body>
</html>
