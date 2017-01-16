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
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>PRN</th>
					<th>UserName</th>
					<th>Date Of Class</th>
					<th>Period</th>
					<th>Attendance</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($attendance as $atten) {
					?>
				<tr>
					<td><?php echo $atten['name']; ?></td>
					<td><?php echo $atten['prn']; ?></td>
					<td><?php echo $atten['UserName']; ?></td>
					<td><?php echo $atten['Date Of Class']; ?></td>
					<td><?php echo $atten['Period']; ?></td>
					<td><input type="checkbox" disabled <?php echo $atten['attendance']=='1'?'checked':''; ?>></td>
				</tr>
					<?php
				} ?>
			</tbody>
		</table>
	</div>
</body>
</html>
