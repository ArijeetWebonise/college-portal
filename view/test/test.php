<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jquery for maximum compatibility -->
    <script src="<?php echo $site->gethost(); ?>/js/quiz.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $site->gethost(); ?>/css/quiz.css">
</head>
<body>
<?php getnav(); ?>
<input type="hidden" id="id" value="<?php echo $_REQUEST['type']; ?>">
	<div class="row">
		<div class="container" id="timeline">
			<h3 class="timeline-left"></h3>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="70"
				aria-valuemin="0" aria-valuemax="100" style="width:70%">
					<span class="sr-only">70% Complete</span>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-sm-3" id="control-btn"></div>
	    <div class="col-sm-8"><div id="frame" role="content"></div></div>
		<div class="col-sm-1"></div>
	</div>
</body>
</html>