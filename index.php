<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="css/style2.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://malsup.github.io/min/jquery.cycle2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="leftslider">
		<div class="slider">
			<ul>
				<?php for($i=0;$i<5;$i++){
					echo $i?>.Arijeet<br><?php
				}?>
			</ul>
		</div>
	</div>
	<div class="frontslider">Update</div>
	<div class="centered">
		<div><img class="img-circle" src="image/logo.png"></div>
		<label>
			<button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#myModal">Login</button> | 
			<button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#myModal2">Register</button>
		</label>
	</div>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Login</h4>
		</div>
		<div class="modal-body">
			<form class="well" action="loginserver.php" method="post">
				<div class="form-group">
					<label for="prn">You Are:</label>
					<select class="form-control" onchange="getLogin(this)" name="type" id="type">
						<option value="" disabled selected>Select your option</option>
						<option value="student">Student</option>
						<option value="teacher">Teacher</option>
						<option value="Parent">Parent</option>
						<option value="guest">Guest</option>
					</select>
				</div>
				<div id="field"></div>
				<button type="submit" class="btn btn-default">Submit</button>
				<a href="forgetpass.php"><button type="button" class="btn btn-link">Forget Password</button></a>
			</form>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

	</div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Registration</h4>
		</div>
		<div class="modal-body">
			<form class="well" action="registerserver.php" method="post">
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
					<label for="phone">Phone:</label>
					<input type="number" name="phone" class="form-control" id="phone" required>
				</div>
				<div class="form-group">
					<label for="lname">Parent Name:</label>
					<input type="text" name="pname" class="form-control" id="pname" required>
				</div>
				<div class="form-group">
					<label for="phone">Parent Phone:</label>
					<input type="number" name="pphone" class="form-control" id="pphone" required>
				</div>
				<div class="form-group">
					<label for="branch">branch:</label>
					<input type="text" name="branch" class="form-control" id="branch" required>
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" name="email" class="form-control" id="email" required>
				</div>
				<div class="form-group">
					<label for="PRN">PRN:</label>
					<input type="number" name="prn" class="form-control" id="PRN" required>
				</div>
				<div class="form-group">
					<label for="year">Year:</label>
					<select name="year" class="form-control" id="year">
						<option value="1">First</option>
						<option value="2">Second</option>
						<option value="3">Third</option>
						<option value="4">Forth</option>
					</select>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="Password" name="pass" class="form-control" id="pwd" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

	</div>
</div>


<script src="js/login.js"></script>
</body>
</html>
