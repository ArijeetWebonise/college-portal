<html>
<head>
	<title>
		Add Quiz
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/quiz.css">
	<script type="text/javascript" src="<?php echo $site->getHost(); ?>/js/quiz.js"></script>
</head>

<body>
<?php getnav(); ?>
	<div class="container">
		<table class="table">
			<tr>
				<th>Quiz Name</th>
				<th>Quiz Duration</th>
				<th>Created By</th>
			</tr>
			<?php foreach ($quiz as $key => $quiz1) {
				?>
			<tr>
				<td><a href="<?php $site->getHost(); ?>/quiz/view/<?php echo $quiz1['quiz_id']; ?>"><?php echo $quiz1['quiz_name']; ?></a></td><td><?php echo $quiz1['duration']; ?></td><td><?php echo $quiz1['createdby']; ?></td>
			</tr>
				<?php
			} ?>
		</table>
	</div>
</body>
</html>