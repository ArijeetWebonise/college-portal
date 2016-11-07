<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQLClass.php'); ?>
	<div class="container">
		<form class="well">
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
<?php 
	$arr=array('name'=>2,'pass'=>'hu');
	arraytostring($arr);
?>
<?php require_once('footer.php'); ?>
