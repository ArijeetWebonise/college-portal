<?php
function student(){
	?>
	<input type="hidden" name="type" value="student">
	<div class="form-group">
		<label for="fname">First Name:</label>
		<input type="text" name="fname" class="form-control" id="fname" required>
	</div>
	<div class="form-group">
		<label for="mname">Middle Name:</label>
		<input type="text" name="mname" class="form-control" id="mname">
	</div>
	<div class="form-group">
		<label for="lname">Last Name:</label>
		<input type="text" name="lname" class="form-control" id="lname" required>
	</div>
	<div class="form-group">
		<label for="prn">prn:</label>
		<input type="number" name="prn" class="form-control" id="prn" required>
	</div>
	<div class="form-group">
		<label for="phone">Phone:</label>
		<input type="number" name="phone" class="form-control" id="phone" required>
	</div>
	<div class="form-group">
		<label for="email">Email address:</label>
		<input type="email" name="email" class="form-control" id="email" required>
	</div>
	<div class="form-group">
		<label for="pwd">Password:</label>
		<input type="Password" name="pass" class="form-control" id="pwd" required>
	</div>
	<?php
}

function teacher(){
?>
	<input type="hidden" name="type" value="student">
	<div class="form-group">
		<label for="fname">First Name:</label>
		<input type="text" name="fname" class="form-control" id="fname" required>
	</div>
	<div class="form-group">
		<label for="mname">Middle Name:</label>
		<input type="text" name="mname" class="form-control" id="mname">
	</div>
	<div class="form-group">
		<label for="lname">Last Name:</label>
		<input type="text" name="lname" class="form-control" id="lname" required>
	</div>
	<div class="form-group">
		<label for="enrol">EnRol:</label>
		<input type="number" name="enrol" class="form-control" id="enrol" required>
	</div>
	<div class="form-group">
		<label for="phext">Ph. Extension:</label>
		<input type="number" name="phext" class="form-control" id="phext" required>
	</div>
	<div class="form-group">
		<label for="phone">Phone:</label>
		<input type="number" name="phone" class="form-control" id="phone" required>
	</div>
	<div class="form-group">
		<label for="email">Email address:</label>
		<input type="email" name="email" class="form-control" id="email" required>
	</div>
	<div class="form-group">
		<label for="pwd">Password:</label>
		<input type="Password" name="pass" class="form-control" id="pwd" required>
	</div>
	<div class="form-group">
		<label for="quatinp">Qualification:</label>
		<input type="text" class="form-control" id="quatinp">
		<input type="hidden" id="quat" name="quat">
		<button type="button" onclick="return addQuat()" class="btn btn-default">Add Qualification</button>
		<ul id="quatlist"></ul>
	</div>
	<div class="form-group">
		<label for="dept">Depertmant:</label>
		<input type="text" name="dept" class="form-control" id="dept" required>
	</div>
	<div class="form-group">
		<label for="expteach">Teaching Experience:</label>
		<input type="number" name="expteach" class="form-control" id="expteach" required>
	</div>
	<div class="form-group">
		<label for="expindus">Teaching Industrial:</label>
		<input type="number" name="expindus" class="form-control" id="expindus" required>
	</div>
<?php } ?>

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
	<form action="registersubmit.php">
		<?php 
		if(function_exists($_REQUEST['type'])){
			$_REQUEST['type']();
		} 
		?>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
</body>
</html>
