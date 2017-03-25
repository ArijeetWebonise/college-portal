{
"name"			:		"<?php echo $quiz['quiz_name']; ?>",
"time"			:		<?php echo $quiz['duration']; ?>,
"question":[<?php foreach ($quiz['question'] as $key => $question) { 
	if($key!=0){
		echo ',';
	}
	$ans=null;
	?>
	{
		"question"      :   "Q<?php echo ($key+1).$question->question; ?>",
		"image"         :   <?php if($question->image!=''){
				echo '"'.$question->image.'"';
			}else{
				echo 'null';
				} ?>,
		"marks"			:	<?php echo $question->marks; ?>,
		"choices"       :   [
		<?php foreach ($question->options as $ckey => $choices) { 
			if($ckey!=0)
				echo ",";
			?>
			"<?php echo $choices['option_value']; ?>"
		<?php 
			if($choices['isanswer']){
				$ans=$choices['option_value'];
			}
		} 
		?>
		],
		"correct"       :   "<?php echo $ans; ?>"
	}
	<?php } ?>
]}
