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
?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
		<?php for ($i=1; $i <= 2; $i++) { 
			?>
			<button class="btn col-sm-3 gotobtn" data-value="<?php echo $i; ?>" disabled><?php echo $i; ?></button>
			<?php
		} ?>
		</div>
		<div class="col-sm-6">
			<div id="startview">
			<p>Rules Here</p>
				<button class="startbtn btn btn-default">Start Test</button>
			</div>
			<div id="testview" class="hidepart">
				<div class="row">
					<div class="time-value">00:00 Left</div>
					<div class="progress timer">
						<div class="progress-bar" role="progressbar" aria-valuenow="70"
						aria-valuemin="0" aria-valuemax="100" style="width:70%">
							<span class="sr-only">70% Complete</span>
						</div>
					</div>
				</div>
				<div class="row Question-view">
				<div class="ques">Question Comes Here</div>
				<div class="qimage hideimage"><img id="diagram" src="#"></div>
				<input type="hidden" class="time" value="<?php echo $quiz['duration']; ?>">
					<div class="row">
						<?php for ($i=1; $i <= 4; $i++) { 
							?>
						<div class="radio">
							<label><input type="radio" name="op" value="<?php echo $i; ?>" class="op<?php echo $i; ?>"><div class="labelop<?php echo $i; ?>">option <?php echo $i; ?></div></label>
						</div>
							<?php
						} ?>
					</div>
				</div>
				<div class="row">
					<button class="nextbtn btn btn-default">Next</button>
				</div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
</body>
</html>
