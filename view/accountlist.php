<html>
<head></head>

<body>
<?php getnav(); ?>
<table>
	<tr><td>Name</td><td>PRN</td><td>UserName</td><td>Email</td></tr>
	<?php 

		foreach ($accounts as $title => $account)
		{
			echo '<tr><td><a href="index.php?account='.$account->username.'">'.$account->firstname.' ' . $account->middlename.' ' .$account->lastname.'</a></td><td>'.$account->prn.'</td><td>'.$account->username.'</td><td>'.$account->email.'</td></tr>';
		}

	?>
</table>

</body>
</html>