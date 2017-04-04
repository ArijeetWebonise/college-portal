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
	<?php getnav(); ?>
	<div class="container">
		<form id="form1" name="form1" method="post" action="<?php echo $site->getHost(); ?>/page/addsubmit">
		<div class="form-group">
			<label>Title</label>
			<input name="title" class="form-control" type="text" id="title" size="50" />
		</div>
		<div class="form-group">
			<label>body</strong>
			<textarea name="body" class="form-control" cols="150" rows="3" id="body"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="Submit" class="btn btn-default" value="Submit" />
			<input type="reset" name="Submit2" class="btn btn-default" value="Reset" />
		</div>
		</form>
	</div>
</body>
</html>