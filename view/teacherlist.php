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
<table class="table">
	<tr>
		<th>Name</th><th>Depertmant</th>
	</tr>
	<tr>
	<?php foreach ($account as $key => $value) {
		?><td><a href="<?php echo $site->getHost(); ?>/account/<?php echo $value->type; ?>/<?php echo $key; ?>"><?php echo $value->firstname; ?> <?php echo $value->middlename; ?> <?php echo $value->lastname; ?></a></td><td>Depertmant</td><?php
	} ?>
	</tr>
</table>
</body>
</html>