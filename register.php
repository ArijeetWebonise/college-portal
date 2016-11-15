<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQLClass.php'); ?>
<script type="text/javascript" src="js/validation.js"></script>
	<div class="container">
		<form class="well" onsubmit="return validate();" action="registerserver.php" method="post">
			<div class="form-group">
				<label for="fname">First Name:</label>
				<input type="text" name="fname" class="form-control" id="fname" required>
			</div>
			<div class="form-group">
				<label for="mname">Middle Name:</label>
				<input type="text" name="mname" class="form-control" id="mname" required>
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

<?php require_once('footer.php'); ?>
