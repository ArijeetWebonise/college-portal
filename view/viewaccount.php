<html>
<head>
	<title>
		<?php echo $account->username.' : '.$site->getTitle(); ?>
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
	<div class="container-fluid well bluebox">
		<center>
			<img src="<?php echo $account->profile; ?>" class="img-circle" alt="<?php echo $account->username; ?>" width="204" height="204"><br>
			<span class="nameblock"><strong><?php echo $account->firstname.' ' . $account->middlename.' ' .$account->lastname; ?></strong></span>
		</center>
		<div class="container col-sm-offset-3">
			<ul class="nav navbar-nav iconlist">
				<li><span class="glyphicon glyphicon-user"></span> <?php echo $account->prn; ?></li>
				<li><span class="glyphicon glyphicon-envelope"></span> <?php echo $account->email; ?></li>
				<li><i class="fa fa-birthday-cake"></i> <?php echo $account->Birthday; ?></li>
				<li><i class="fa fa-male"></i><i class="fa fa-female"></i> <?php echo $account->sex=='M'?'Male':'Female'; ?></li>
				<li><span class="glyphicon glyphicon-dashboard"></span> <?php echo $account->year; 
				switch ($account->year) {
					case '1':
						echo "st";
						break;
					case '2':
						echo "nd";
						break;
					case '3':
						echo "rd";
						break;
					case '4':
						echo "th";
						break;
				}
				echo " year";
				?></li>
				<li><span class="glyphicon glyphicon-tasks"></span> <?php echo $account->class; ?></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="well col-sm-6"><span class="glyphicon glyphicon-home"></span> (Permanent) <?php echo $account->address; ?></div>
			<div class="well col-sm-6"><span class="glyphicon glyphicon-home"></span> (Local) <?php echo $account->laddress; ?></div>
		</div>
		<?php if($account->qualification!=NULL){ ?>
		<div class="row well">
			<h3>Qualification</h3>
			<ul>
			<?php foreach ($account->qualification as $qvalue) {
				echo "<li>".$qvalue."</li>";
			} ?>
			</ul>
		</div>
		<?php } 
		if($account->skills!=NULL){ ?>
		<div class="row well">
			<h3>Technical Skills</h3>
			<ul>
			<?php foreach ($account->skills as $svalue) {
				echo "<li>".$svalue."</li>";
			} ?>
			</ul>
		</div>
		<?php } 
		if($account->accomplishments!=NULL){ ?>
		<div class="row well">
			<h3>Accomplishments</h3>
			<ul>
			<?php foreach ($account->accomplishments as $avalue) {
				echo "<li>".$avalue."</li>";
			} ?>
			</ul>
		</div>
		<?php } 
		if($account->workexp!=NULL){ ?>
		<div class="row well">
			<h3>Work Experience</h3>
			<ul>
			<?php foreach ($account->workexp as $evalue) {
				echo "<li>".$evalue."</li>";
			} ?>
			</ul>
		</div>
		<?php } 
		if($account->workntrainning!=NULL){ ?>
		<div class="row well">
			<h3>Work and Trainning</h3>
			<ul>
			<?php 
			foreach ($account->workntrainning as $wvalue) {
				echo "<li>".$wvalue."</li>";
			} 
			?>
			</ul>
		</div>
		<?php } ?>
	</div>
</body>
</html>
