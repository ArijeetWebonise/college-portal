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
		<div class="questionview">
		<?php 
		foreach ($quiz['question'] as $key => $question) {
			?>
			<div class="questionlist">
				<label>Q <?php echo $key+1; ?>. <?php echo $question->question; ?></label>
				<input type="hidden" name="question_id" value="1">
				<?php foreach ($question->options as $key2 => $option) {
					?>
				<div class="form-group">
					<label><input type="radio" class="quizoption" name="question<?php echo $question->question_id; ?>" value="<?php echo $option['isanswer']?0:1; ?>"><?php echo $option['option_value']; ?></label>
				</div>
					<?php
				} ?>
			</div>
			<?php
		} ?>
		</div>
		<button id="nextbtn">Next</button>
	</div>	
</body>
</html>