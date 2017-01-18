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
	<script src="<?php echo $site->getHost(); ?>/js/select.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>
<body>
<?php getnav(); ?>
<div class="container">
	<?php if($accounts){ ?>
	<h3>Students</h3>
	<ul>
		<?php 
			foreach ($accounts as $key => $account) {
				?><li><a href="<?php echo $site->getHost(); ?>/account/student/<?php echo $key; ?>"><?php echo $account->firstname; ?> <?php echo $account->middlename; ?> <?php echo $account->lastname; ?> (<?php echo $account->class; ?>)</a></li><?php
			}
		} ?>
	</ul>
		<?php if($teachers){ ?>
		<h3>Facalty</h3>
		<ul>
		<?php 
			foreach ($teachers as $key => $teacher) {
				?><li><a href="<?php echo $site->getHost(); ?>/account/<?php $teacher->type; ?>/<?php echo $key; ?>"><?php echo $teacher->firstname; ?> <?php echo $teacher->middlename; ?> <?php echo $teacher->lastname; ?> (<?php echo $teacher->class; ?>)</a></li><?php
			} 
		}?>
	</ul>
</div>
</body>
</html>