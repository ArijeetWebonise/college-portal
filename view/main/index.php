<!DOCTYPE html>
<html>
<head>
	<title>College Portell</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $site->getHost(); ?>/css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php getnavhome(); ?>
	<div class="container">
		<div class="col-sm-8">
			<div class="row">
				<img src="image/banner1.jpg" class="banner">
			</div>
			<div class="row">
				Other Data
			</div>
		</div>
		<div class="col-sm-4">
			<div class="well update">
				<h3>
					Updates
				</h3>
				<ul>
					<?php foreach ($events as $event) { ?><li><a href="<?php echo $site->getHost(); ?>/event/view/<?php echo $event['event id']; ?>"><?php echo ($event['event name']); ?></a></li><?php } ?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
