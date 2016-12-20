<?php
	function student(){
		?>
	<input name="usertype" type="hidden" id="user" value="student">
	<div class="form-group">
		<label for="email">Email address:</label>
		<input name="id" type="email" class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input name="password" type="password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<label for="prn">PRN:</label>
		<input name="prn" type="number" class="form-control" id="prn">
	</div><?php
	}

	function parent(){
		?>
	<input name="usertype" type="hidden" id="user" value="parent">
	<div class="form-group">
		<label for="mobile">Mobile Number:</label>
		<input name="id" type="mobile" class="form-control" id="mobile">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input name="password" type="password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<label for="prn">PRN:</label>
		<input name="prn" type="number" class="form-control" id="prn">
	</div><?php
	}

	function teacher(){
		?>
	<input name="usertype" type="hidden" id="user" value="teacher">
	<div class="form-group">
		<label for="email">Email address:</label>
		<input name="id" type="email" class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input name="password" type="password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<label for="eno">EnRol Number:</label>
		<input name="prn" type="number" class="form-control" id="eno">
	</div><?php
	}
?>
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
	<script src="<?php echo $site->getHost(); ?>/js/search.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>
<body>
<?php getnav(); ?>
<div class="container">
	<form method="post" action="<?php echo $site->getHost(); ?>/login/loginsubmit" id="loginform">
		<?php 
		if(function_exists($_REQUEST['type'])){
			$_REQUEST['type']();
		} 
		?>
		<button type="Submit" class="btn btn-default">Submit</button>
	</form>
</div>
</body>
</html>
