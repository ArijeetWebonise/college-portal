<?php
define('imagelocation', '../../Media/image/');
define('imgsize', '200');
require_once("phpClass/sql.php");
require_once("menu.php");

function render($data, $type){
	?>
	<div class="container-fluid contact">
		<ul>
			<li><span class="glyphicon glyphicon-envelope"> </span> <?php echo $data['email']; ?></li>
			<li><span class="glyphicon glyphicon-phone"> </span> <?php echo $data['mobile']; ?></li>
			<li><span class="fa fa-male"></span><span class="fa fa-female"></span> <?php echo $data['sex']=="M"?"Male":"FeMale"; ?></li>
			<li><span class="fa fa-birthday-cake"></span> <?php echo $data['BirthDay']; ?></li>
			<li><span class="fa fa-book"></span></span> <?php echo $data['class/branch']; ?></li>
			<li><span class="glyphicon glyphicon-user"></span></span><?php switch ($data['year']) {
				case '1':
					echo "First Year";
					break;
				case '2':
					echo "Second Year";
					break;
				case '3':
					echo "Third Year";
					break;
				case '4':
					echo "Forth Year";
					break;
			} ?></li>
		</ul>
	</div>
	<div class="row">
		
	</div>
	<?php
}
function student($name,$db){
	$ret=$db->GetData("*","account","`UserName` = '".$name."'");
	while ($row=$db->fetch($ret)) {
		return $row;
	}
}
function teacher($name,$db){

}
if(isset($_REQUEST['user'])&&isset($_REQUEST['type'])){
	$user=$_REQUEST['user'];
	$type=$_REQUEST['type'];
	if(function_exists($type)){
		$user=$type($user,$db);
	}else{
		echo "Invalid User Type";
	}
}else{
	echo "Please Enter User Info";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user['First Name'].' '.$user['Middle Name'].' '.$user['Last Name'];?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../../css/account.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<?php menurender(); ?>
	</header>
	<div class="container-fluid bluebox">
		<center>
			<img src="<?php echo constant("imagelocation"); ?><?php echo $user['profilepic']!=null?$user['profilepic']:'profile-picture-placeholder.jpg'; ?>" width="<?php echo constant("imgsize"); ?>" height="<?php echo constant("imgsize"); ?>" class="img-circle">
			<div><strong><?php echo $user['First Name'].' '.$user['Middle Name'].' '.$user['Last Name']; ?></strong><br><?php echo $user['prn']; ?></div>
		</center>
	</div>
	<?php render($user, $type);?>
</body>
</html>
