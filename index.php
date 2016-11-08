<?php require_once('header.php'); ?>
	<div class="container">
		<div class="col-sm-12 col-md-8 col-lg-8">
			<div class="row">
				<img src="image/banner1.jpg" class="banner">
			</div>
			<div class="row">
				Other Data
			</div>
		</div>
		<div class="col-sm-12 col-md-4 col-lg-4">
			<div class="well update">
				<h3>
					Updates
				</h3>

				<ul>
				<?php for ($i=0; $i < 20; $i++) { 
					?><li><?php echo $i; ?></li><?php
				} ?>
				</ul>
			</div>
		</div>
	</div>
<?php require_once('footer.php'); ?>
