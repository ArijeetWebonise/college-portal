<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQL.php'); ?>
	<div class="container">
		<form class="well" action="loginserver.php" method="post">
<?php
	if(isset($_REQUEST['user'])){
		if($_REQUEST['user']=='student'||$_REQUEST['user']=='Student') {
		?>
			<div class="form-group">
				<label for="prn">PRN:</label>
				<input type="number" class="form-control" name="prn" id="prn">
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" name="email" id="email">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pass" id="pwd">
			</div>
<?php
		}else if($_REQUEST['user']=='teacher'||$_REQUEST['user']=='Teacher') {
		?>
			<div class="form-group">
				<label for="EnROL">EnROL:</label>
				<input type="number" class="form-control" name="EnROL" id="EnROL">
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" name="email" id="email">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pass" id="pwd">
			</div>
<?php
		}else if($_REQUEST['user']=='parent'||$_REQUEST['user']=='Parent') {
		?>
			<div class="form-group">
				<label for="prn">PRN:</label>
				<input type="number" class="form-control" name="prn" id="prn">
			</div>
			<div class="form-group">
				<label for="mobile">Mobile Number:</label>
				<input type="number" class="form-control" name="mobile" id="mobile">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pass" id="pwd">
			</div>
<?php
		}
	}
?>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>

<?php require_once('footer.php'); ?>
