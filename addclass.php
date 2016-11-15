<?php require_once('header.php'); ?>
<?php require_once('phpClass/sql.php'); ?>

<?php
	$prefab='att_';
	$data=array(
		array(
			'name'=>'prn',
			'type'=>'int(11)',
			'option'=>array('NOT NULL')
		),
		array(
			'name'=>'sub1',
			'type'=>'int(11)',
			'option'=>array('NOT NULL')
		),
		array(
			'name'=>'sub2',
			'type'=>'int(11)',
			'option'=>array('NOT NULL')
		),
		array(
			'name'=>'sub3',
			'type'=>'int(11)',
			'option'=>array('NOT NULL')
		)
	);
	$db->createTable($prefab.'comp1',$data);
?>

<?php require_once('footer.php'); ?>
