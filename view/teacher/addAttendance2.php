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
		<form action="<?php echo $site->getHost(); ?>/teacher/attendance/add/result" method="post">
			<div class="form-group">
				<label>Class</label>
				<select class="form-control" type="text" name="class">
					<option>Select Class</option>
					<?php 
					foreach ($classes as $clas) {
						?>
						<option value="<?php echo $clas; ?>" <?php echo $clas==$_REQUEST['class']?"selected":"" ?>><?php echo $clas; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="Date" name="dateofattendance" class="form-control" value="<?php echo $_REQUEST['dateofattendance'] ?>">
			</div>
			<div class="form-group">
				<label>Period</label>
				<input type="number" name="period" class="form-control" value="<?php echo $_REQUEST['period'] ?>">
			</div>
			<table class="table">
				<tr><th>Name</th><th>Attendance</th></tr>
				<tbody class="studentlist">
					<?php
						foreach ($accounts as $account) {
							?>
					<tr>
						<td><?php echo $account->firstname; ?></td>
						<td><input type="checkbox" name="<?php echo $account->username; ?>"></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			<div class="form-group">
				<input type="submit" name="submit">
			</div>
		</form>
	</div>
</body>
</html>