	<style type="text/css">
		.profilepic {
		    width: 250px;
		    height: 250px;
		    margin-bottom: 25px;
		}
	</style>
	<div class="container">
		<div class="col-sm-3 well">
			<img src="<?php echo $account->profile; ?>" class="img-circle profilepic">
			<ul class="list-group">
				<li class="list-group-item"><?php echo $_REQUEST['type']; ?></li>
				<li class="list-group-item">Email: <?php echo $account->email; ?></li>
				<li class="list-group-item">PRN: <?php echo $account->prn; ?></li>
				<li class="list-group-item">Birthday: <?php echo $account->Birthday; ?></li>
				<li class="list-group-item">Mobile: <?php echo $account->mobile; ?></li>
				<li class="list-group-item">Parent/Guardient Name: <?php echo $account->parentName; ?></li>
				<li class="list-group-item">Address(P): <?php echo $account->address; ?></li>
				<li class="list-group-item">Address(L): <?php echo $account->laddress; ?></li>
			</ul>
		</div>
		<div class="col-sm-9">
			<h1><?php echo $account->firstname." ";
			if($account->middlename==""){
				echo $account->middlename." ";
			}
			echo $account->lastname; ?></h1>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#Qualification">Qualification</a></li>
				<li><a data-toggle="tab" href="#skills">Skills</a></li>
				<li><a data-toggle="tab" href="#accomplishments">Accomplishments</a></li>
				<li><a data-toggle="tab" href="#workexp">Work Experience</a></li>
				<li><a data-toggle="tab" href="#menu1">Trainning and Certification</a></li>
			</ul>
			<div class="tab-content">
				<div id="Qualification" class="tab-pane fade in active">
					<h3>Qualification</h3>
					<ul>
					<?php foreach (json_decode($account->qualification) as $qualification) {
						?><li><?php echo $qualification; ?></li><?php
					} ?>
					</ul>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h3>Trainning and Certification</h3>
					<ul>	
					<?php foreach (json_decode($account->workntrainning) as $workntrainning) {
						?><li><?php echo $workntrainning; ?></li><?php
					} ?>
					</ul>
				</div>
				<div id="skills" class="tab-pane fade">
					<h3>Skills</h3>
					<ul>
					<?php foreach (json_decode($account->skills) as $skills) {
						?><li><?php echo $skills; ?></li><?php
					} ?>
					</ul>
				</div>
				<div id="accomplishments" class="tab-pane fade">
					<h3>Accomplishments</h3>
					<ul>
					<?php foreach (json_decode($account->accomplishments) as $accomplishment) {
						?><li><?php echo $accomplishment; ?></li><?php
					} ?>
					</ul>
				</div>
				<div id="workexp" class="tab-pane fade">
					<h3>Work Experience</h3>
					<ul>
					<?php foreach (json_decode($account->workexp) as $workexp) {
						?><li><?php echo $workexp; ?></li><?php
					} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
