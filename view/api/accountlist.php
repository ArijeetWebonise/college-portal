[
	<?php
	$f=FALSE;
	foreach ($accounts as $account) {
		if($clas==$account->class){
			if($f){
				echo ",";
			}else{
				$f=TRUE;
			}
				?>
				{
				"Name":{
					"First":"<?php echo $account->firstname; ?>",
					"Middle":"<?php echo $account->middlename; ?>",
					"Last":"<?php echo $account->lastname; ?>"
				},
				"PRN":<?php echo $account->prn; ?>,
				"Email":"<?php echo $account->email; ?>",
				"Birthday":"<?php echo $account->Birthday; ?>",
				"Sex":"<?php echo $account->sex; ?>",
				"Year":"<?php echo $account->year; ?>",
				"Local Address":"<?php echo $account->laddress; ?>",
				"Permanent Address":"<?php echo $account->address; ?>",
				"Qualification":<?php echo json_encode($account->qualification); ?>,
				"Technical Skills":<?php echo json_encode($account->skills); ?>,
				"Accomplishments":<?php echo json_encode($account->accomplishments); ?>,
				"Work Experience":<?php echo json_encode($account->workexp); ?>,
				"Work and Trainning":<?php echo json_encode($account->workntrainning); ?>
			}
			<?php
		}
	}
	?>
]