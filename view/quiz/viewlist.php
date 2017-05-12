<!DOCTYPE html>
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
	<script src="<?php echo $site->getHost(); ?>/js/quizview.js"></script>
</head>
<body>
<?php getnav(); 
// var_dump($quizlist);
?>
<table class="table">
	<tr>
		<th>Test Name</th>
		<th>Created by</th>
		<th>Subject</th>
		<th>Date</th>
	</tr>
	<?php 
	$f=FALSE;
	foreach ($quizlist as $quiz) {
		?>
	<tr>
		<td><a href="<?php echo $site->getHost(); ?>/quiz/<?php echo $quiz['quiz_id']; ?>"><?php echo $quiz['quiz_name']; ?></a></td>
		<td><?php echo $quiz['createdby']; ?></td>
		<td><?php echo $quiz['subject']; ?></td>
		<td><?php echo $quiz['Date']; ?></td>
	</tr>
		<?php
	} ?>
</table>
