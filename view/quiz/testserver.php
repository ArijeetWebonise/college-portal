<?php 
	showQuiz($quiz);
	  ?>

<?php 

function showQuiz($quiz)
{
	$site=$GLOBALS['site'];
	?>
{
	"QuestionBank":[
		<?php foreach ($quiz['question'] as $qkey => $question) {
			if($qkey!=0)
				echo ",";
			?>
		{
			"question":"<?php echo $question->question; ?>",
			"marks":<?php echo $question->marks; ?>,
			"Question type":"<?php echo $question->question_type; ?>",
			"image":<?php echo $question->image!=null? '"'.$site->getHost()."/image/".$question->image.'"': "null"; ?>,
			"options":[
			<?php foreach ($question->options as $okey => $options) {
				if($okey!=0)
					echo ",";
				?>
				{
					"opvalue":"<?php echo $options['option_value']; ?>",
					"answer":<?php echo $options['isanswer']?0:1; ?>
				}
				<?php
			} ?>
			]
		}
			<?php
		} ?>
	]
}
	<?php
} ?>
