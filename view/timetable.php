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
		<table class="table table-bordered">
			<tr>
				<th>Time</th>
				<?php
				foreach ($days as $day) {
					?><th><?php echo $day; ?></th><?php
				}
				?>
			</tr>
			<tr>
			<?php 
			$f=0;
			for ($i=1; $i <= 8 ; $i++)
			{
				echo "<td>".$time[$i-1]."</td>";
				if($i==3||$i==6){
					echo '<td colspan="5">Recuss</td></tr><tr>';
					$f++;
					continue;
				}
				foreach ($days as $day) {
					if(isset($tt[$day][$i-$f])){
			?>
					<td <?php echo $tt[$day][$i-$f]['type']=='Pratical'?'rowspan="2"':''; ?>><?php echo $tt[$day][$i-$f]['subject']; ?></td>
				<?php		
					}
				}
				?></tr><tr><?php
			 } ?>
			</tr>
		</table>
	</div>
</body>
</html>