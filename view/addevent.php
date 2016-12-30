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
	<form method="post" action="<?php echo $site->getHost(); ?>/event/create/submit">
		<div class="form-group">
			<label>Event Name</label>
			<input class="form-control" type="text" name="eventname" placeholder="Event Name">
		</div>
		<div class="form-group">
			<label>Event Description</label>
			<textarea class="form-control" name="eventdesp" placeholder="Event Description"></textarea>
		</div>
		<div class="form-group">
			<label>Location</label>
			<input class="form-control" type="text" name="location" placeholder="Location">
		</div>
		<div class="form-group">
			<label>Start Date</label>
			<input class="form-control" type="Date" name="startdate" placeholder="Start Date">
		</div>
		<div class="form-group">
			<label>End Date</label>
			<input class="form-control" type="Date" name="enddate" placeholder="End Date">
		</div>
		<div class="form-group">
			<label>Start Time</label>
			<input class="form-control" type="Time" name="starttime" placeholder="Start Time">
		</div>
		<div class="form-group">
			<label>End Time</label>
			<input class="form-control" type="Time" name="endtime" placeholder="End Time">
		</div>
		<div class="checkbox">
			<label>
				<input name="showmap" type="checkbox">
				Show Map
			</label>	
		</div>
		<div class="checkbox">
			<label>
				<input name="isvirtual" type="checkbox">
				Is Virtual
			</label>		
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default" name="submit">
		</div>
	</form>
</div>
