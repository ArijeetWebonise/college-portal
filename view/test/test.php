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
	<script type="text/javascript" src="<?php echo $site->getHost(); ?>/js/graft.js"></script>
	<script type="text/javascript" src="<?php echo $site->getHost(); ?>/js/vender/canvas/canvasjs.min.js"></script>
</head>
<body>
<?php getnav(); 
?>
<div id="chartContainer" style="height: 400px; width: 100%;"></div>
</body>
</html>
