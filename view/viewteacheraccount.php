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
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li>
				<li><a href="#">Page 3</a></li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid well bluebox">
		<center>
			<img src="<?php echo $account->profile; ?>" class="img-circle" alt="<?php echo $account->username; ?>" width="204" height="204"><br>
			<span class="nameblock"><strong><?php echo $account->firstname.' ' . $account->middlename.' ' .$account->lastname; ?></strong></span>
		</center>
		<div class="container col-sm-offset-3">
			<ul class="nav navbar-nav iconlist">
				<li><span class="glyphicon glyphicon-user"></span> <?php echo $account->enrol; ?></li>
				<li><span class="glyphicon glyphicon-envelope"></span> <?php echo $account->email; ?></li>
				<li><i class="fa fa-birthday-cake"></i> <?php echo $account->Birthday; ?></li>
				<li><i class="fa fa-male"></i><i class="fa fa-female"></i> <?php echo $account->sex=='Male'?'Male':'Female'; ?></li>
				<li><span class="glyphicon glyphicon-tasks"></span> <?php echo $account->dept; ?></li>
				<li><span class="glyphicon glyphicon-Phone"> <?php echo $account->mobile; ?></span></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row well">
			<div class="col-sm-6">Experience Teaching : <?php echo $account->expteach; ?></div>
			<div class="col-sm-6">Experience Industrial : <?php echo $account->expindex; ?></div>
		</div>
		<div class="row well">
			<h3>Publications</h3>
			<div class="col-sm-6">International Journal: <?php echo $account->interjournal; ?></div>
			<div class="col-sm-6">National Journal: <?php echo $account->nationjournal; ?></div>
			<div class="col-sm-6">International Conference: <?php echo $account->interconf; ?></div>
			<div class="col-sm-6">National Conference: <?php echo $account->nationconf; ?></div>
		</div>
		<div class="row well">
			<h3>Area Of Interest</h3>
			<ul>
				<?php 
				foreach ($account->aoi as $avalue) {
					?>
					<li><?php echo $avalue; ?></li>
					<?php
				} ?>
			</ul>
		</div>
		<div class="row well">
			<h3>Publication Details</h3>
			<?php foreach ($account->PublicationDetails as $PublicationDetail) {
				?>
				<li>"<?php echo $PublicationDetail->name; ?>", "<?php echo $PublicationDetail->publish; ?>" by <?php foreach ($PublicationDetail->by as $key => $writer) {
					if($key!=0){
						echo ', ';
					}
					echo $writer;
				} ?></li>
				<?php
			} ?>
		</div>
		<div class="row well">
			<h3>WorkShop/Seminar/Conference attended</h3>
			<?php foreach ($account->Workshops as $Workshop) {
				?>
				<li><?php echo $Workshop->topic; ?> (<?php echo $Workshop->event; ?>)</li>
				<?php
			} ?>
		</div>
		<div class="row well">
			<h3>Extra Activities</h3>
			<?php foreach ($account->ExtraActivities as $ExtraActivitie) {
				?>
				<li><?php echo $ExtraActivitie; ?></li>
				<?php
			} ?>
		</div>
	</div>
</body>
</html>
