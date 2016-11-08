<!DOCTYPE html>
<html>
<head>
	<title>College Portell</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="col-sm-3">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">WebSiteName</a>
				</div>
			</div>
			<ul class="nav navbar-nav navbar-right">
			<?php
				session_start();
				if(!isset($_SESSION['userid'])){
			?>
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<?php
			}else{
				?>
				<li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>Hi <?php echo $_SESSION['userid']; ?></a>
					<ul class="dropdown-menu">
						<li><a href="logoutserver.php">Logout</a></li>
					</ul>
				</li>
				<?php
			}
			?>
			</ul>
		</div>
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li> 
				<li><a href="#">Page 3</a></li> 
			</ul>
		</div>
	</nav>