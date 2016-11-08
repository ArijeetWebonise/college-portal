<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQLClass.php'); ?>
	<div class="container">
		<form class="well" action="registerserver.php" method="post">
			<div class="form-group">
				<label for="sname">Student Name:</label>
				<input type="text" name="sname" class="form-control" id="sname">
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" name="email" class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="PRN">PRN:</label>
				<input type="number" name="prn" class="form-control" id="PRN">
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
				<input type="Password" name="pass" class="form-control" id="pwd">
			</div>
			<div class="form-group">
				<label for="pwd">Conform Password:</label>
				<input type="Password" name="pass1" class="form-control" id="pwd1">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	
<?php require_once('footer.php'); ?>
