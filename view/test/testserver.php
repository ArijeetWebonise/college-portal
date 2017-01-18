[
<?php 
$list=array(array('x'=>'Arijeet','y'=>45),array('x'=>'Anchit','y'=>55));
foreach ($list as $key => $value) {
	if($key!=0){
		echo ",";
	}
	?>{ "x": "<?php echo $value['x']; ?>", "y": <?php echo $value['y']; ?> }<?php
} ?>
]