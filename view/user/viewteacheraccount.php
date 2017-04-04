<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $site->getTitle(); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo $site->getHost(); ?>/js/select.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>
<body>
<?php getnav(); ?>
<div class="container">
	<div class="col-sm-3">
		<img src="<?php echo $account->profile; ?>" class="img-circle profilepic">
		<ul class="list-group">
			<li class="list-group-item"><?php echo $_REQUEST['type']; ?></li>
			<li class="list-group-item">Email: <?php echo $account->email; ?></li>
			<li class="list-group-item">Mobile: <?php echo $account->mobile; ?></li>
			<li class="list-group-item">EnRol: <?php echo $account->enrol; ?></li>
			<li class="list-group-item">Dept: <?php echo $account->dept; ?></li>
			<li class="list-group-item">Teacher Experience: <?php echo $account->expteach; ?></li>
			<li class="list-group-item">Teacher Index: <?php echo $account->expindex; ?></li>
			<li class="list-group-item">International Journal: <?php echo $account->interjournal; ?></li>
			<li class="list-group-item">National Journal: <?php echo $account->nationjournal; ?></li>
			<li class="list-group-item">International Conference: <?php echo $account->interconf; ?></li>
			<li class="list-group-item">National Conference: <?php echo $account->nationconf; ?></li>
		</ul>
	</div>
	<div class="col-sm-9">
		<h1><?php echo $account->firstname." ";
		if($account->middlename==""){
			echo $account->middlename." ";
		}
		echo $account->lastname; ?></h1>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#PublicationDetails">Publication Details</a></li>
			<li><a data-toggle="tab" href="#Workshops">Workshops</a></li>
			<li><a data-toggle="tab" href="#Achievements">Achievements</a></li>
			<li><a data-toggle="tab" href="#ExtraActivities">Extra Activities</a></li>
			<li><a data-toggle="tab" href="#aoi">Area Of Interest</a></li>
		</ul>

		<div class="tab-content">
			<div id="PublicationDetails" class="tab-pane fade in active">
				<h3>Publication Details</h3>
				<ul>
				<?php 
				if(count($account->PublicationDetails)){
					foreach ($account->PublicationDetails as $PublicationDetail) {
						?><li>
						<h4><?php echo $PublicationDetail->name; ?></h4>
						-<?php foreach ($PublicationDetail->by as $key => $name) {
							if($key!=0){
								echo ',';
							}
							echo $name;
						} ?> 
						<p><?php echo $PublicationDetail->publish; ?></p>
						</li><?php
					}
				}else{
					?>No Book Has been Published<?php
					}?>
				</ul>
			</div>
			<div id="Workshops" class="tab-pane fade">
				<h3>Workshops</h3>
				<ul>
				<?php 
				if(count($account->Workshops)){
					foreach ($account->Workshops as $Workshop) {
						?><li><h4><?php echo $Workshop->event; ?></h4><?php echo $Workshop->topic; ?></li><?php
					}
				}else{
					?>No WorkShop Listed<?php 
				}?>
				</ul>
			</div>
			<div id="Achievements" class="tab-pane fade">
				<h3>Achievements</h3>
				<ul>
				<?php 
				if(count($account->Achievements)){
					foreach ($account->Achievements as $Achievement) {
						?><li><?php echo $Achievement; ?></li><?php
					}
				}else{
					?>No Achievements Listed<?php
				}
				?>
				</ul>
			</div>
			<div id="ExtraActivities" class="tab-pane fade">
				<h3>Extra Activities</h3>
				<?php 
				if(count($account->ExtraActivities)){
					foreach ($account->ExtraActivities as $ExtraActivity) {
						?><li><?php echo $ExtraActivity; ?></li><?php
					}
				}else{
					?>No Extra Activities Listed<?php 
				}
				?>
			</div>
			<div id="aoi" class="tab-pane fade">
				<h3>Area Of Interest</h3>
				<ul>
				<?php 
				if(count($account->ExtraActivities)){
					foreach ($account->aoi as $aoi) {
						?><li><?php echo $aoi;?></li><?php
					} 
				}else{
					?>No Extra Activities Listed<?php 
				}
				 ?>
				 </ul>
			</div>
		</div>
	</div>
</div>
</body>
</html>
