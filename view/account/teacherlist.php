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
<?php 
	getnav();
?>
<div class="container">
	<table class="table table-bordered table-striped table-condensed table-responsive table-hover">
		<thead>
			<tr>
				<th>S.NO</th>
				<th>Name</th>
				<th>PhExtension</th>
			</tr>
		</thead>
		<tbody>
	<?php 
		$ret=$GLOBALS['db']->getData('*','teacher');
		foreach ($ret as $key => $teacher) {
			?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td>
					<a href="<?php echo $site->getHost(); ?>/account/teacher/<?php echo $teacher['username']; ?>">
					<?php echo $teacher['First Name'].' '.$teacher['Middle Name'].' '.$teacher['Last Name']; ?>
					</a>
				</td>
				<td><?php echo $teacher['PhExtension']; ?></td>
			</tr>
			<?php
		}
	?>
		</tbody>
	</table>
</div>
</body>
</html>
