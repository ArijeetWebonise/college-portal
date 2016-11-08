<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQL.php'); ?>
	<div class="container">
		<form class="well" action="loginserver.php" method="post">
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" name="email" id="email">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pass" id="pwd">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>

<?php require_once('footer.php'); ?>
