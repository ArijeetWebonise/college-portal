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
</head>
<body>
<?php getnav(); ?>
	<div class="container">
		<table class="table table-striped table-bordered table-hover table-responsive">
			<tr>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>created by</th>
				<th>View</th>
			</tr>
			<?php
			foreach ($event as $key => $eve) {
			?>
			<tr>
				<td><?php echo $eve['event name']; ?></td>
				<td><?php echo $eve['start date']; ?>-<?php echo $eve['end date']; ?></td>
				<td><?php echo $eve['creator']; ?></td>
				<td><a href="<?php echo $site->getHost(); ?>/event/view/<?php echo $eve['event id']; ?>" class="btn btn-link">View</a></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</body>
</html>
