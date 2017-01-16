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
<?php getnav(); 
?>
<div class="container">
	<table class="table">
		<tr><td>Name</td><td>PRN</td><td>UserName</td><td>Email</td><td>Attendance</td></tr>
		<?php 

			foreach ($accounts as $title => $account)
			{
				echo '<tr><td><a href="'.$account->username.'">'.$account->firstname.' ' . $account->middlename.' ' .$account->lastname.'</a></td><td>'.$account->prn.'</td><td>'.$account->username.'</td><td>'.$account->email.'</td><td>'.$account->attendance.'</td></tr>';
			}

		?>
	</table>
</div>

</body>
</html>