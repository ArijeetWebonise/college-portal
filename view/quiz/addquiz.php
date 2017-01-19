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
	<script type="text/javascript" src="<?php echo $site->getHost(); ?>/js/addquiz.js"></script>
</head>
<body>
<?php getnav(); ?>
	<div class="container">
		<form action="<?php echo $site->getHost(); ?>/quiz/add/2" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Quiz Name</label>
				<input type="text" name="quiz_name" class="form-control">
			</div>	
			<div class="form-group">
				<label>Duration</label>
				<input type="number" name="duration" class="form-control">
			</div>
			<div class="form-group">
				<label>Department</label>
				<select name="dept" class="form-control">
					<?php for ($i=0; $i < 5; $i++) { 
						?><option>dept<?php echo $i; ?></option><?php
					} ?>
				</select>
			</div>
			<div class="form-group">
				<label>Subject</label>
				<select name="sub" class="form-control">
					<?php for ($i=0; $i < 5; $i++) { 
						?><option>sub<?php echo $i; ?></option><?php
					} ?>
				</select>
			</div>
			<div class="form-group">
			<input type="hidden" name="noofquestion" class="form-control" value="0" value="noofq">
				<label>Date</label>
				<input type="date" name="quizDate" class="form-control">
			</div>
			<div class="container">
				<div class="form-group">
					<button class="AddQ btn btn-default">Add Question</button>
					<input type="submit" name="submit" class="btn btn-default">
				</div>
				<div id="Question-Bank">
				</div>
				<div class="form-group">
					<button class="AddQ btn btn-default">Add Question</button>
					<input type="submit" name="submit" class="btn btn-default">
				</div>
			</div>
		</form>
	</div>
</body>
</html>