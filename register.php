<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQLClass.php'); ?>
	<div class="container">
		<form class="well" onsubmit="return validate();" action="../saveuser" method="post">
			<?php
			if(isset($_REQUEST['user'])){
?>			<input type="hidden" name="type" value="<?php echo $_REQUEST['user']; ?>"><?php
				if ($_REQUEST['user']=='student'||$_REQUEST['user']=='Student') {
			?>
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
				}else if ($_REQUEST['user']=='teacher'||$_REQUEST['user']=='Teacher') {
			?>
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
			<?php
				}
			}
			?>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>

<?php require_once('footer.php'); ?>
