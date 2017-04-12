<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include_once 'phpClass/xlsClass.php';
	if(!isset($_REQUEST['id'])){
		die();
	}
	$file=XLSReaderFacade::CreateXLSReader($mod->question);
	$banks=SheettoObject($file);
?>
<html>
<head>
	<title>
		<?php echo $site->getTitle(); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/quiz.css">
</head>

<body>

<?php getnav(); ?>
<div class="col-sm-2">
	<?php foreach ($banks as $skey => $section) { ?>
		<div class="well">
			<?php foreach ($section as $qkey => $question) { ?>
				<div class="btn btn-primary questioncontrol disabled" data-question="<?php echo $qkey; ?>" data-section="<?php echo $skey; ?>"><?php echo $qkey; ?></div>
			<?php } ?>
		</div>
	<?php } ?>
</div>
<div class="col-sm-10">
	<div id="error-msg"></div>
	<div class="progress">
		<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="70"
		aria-valuemin="0" aria-valuemax="100" style="width:50%">
			<span class="sr-only">70% Complete</span>
		</div>
	</div>
	<div class="time">
		<span class="hour">0</span>:<span class="min">0</span>:<span class="sec">0</span>
	</div>
	<div id="quiz-area">
		<div id="quiz-description">
			<div class="container">
				fsuafghusg
				<button class="btn" id="StartQuiz">Start Quiz</button>
			</div>
		</div>
		<div id="question-area">
			<div class="container">
				<div class="well" id="question-view">Question here</div>
				<div id="qimage"></div>
				<?php for ($i=1; $i <= 4; $i++) {  ?>
				<div class="radio">
					<label id="option<?php echo $i; ?>"><input type="radio" name="options">123</label>
				</div>
				<?php } ?>
				<button class="NextBtn btn">Next</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var jsonarray;
	var currentques=0;
	var currentsec=0;
	var TotelTime={
		hr:0,
		min:0,
		sec:0
	};
	var currentTime={
		hr:0,
		min:0,
		sec:0
	};
	var timer;

	function compairTime(){
		if(currentTime.sec == TotelTime.sec){
			if(currentTime.min == TotelTime.min){
				if(currentTime.hr == TotelTime.hr){
					return true;
				}
				return false;
			}
			return false;
		}
		return false;
	}

	function checkAns() {
		var marks=0;
		for (var i = 0; i < 2; i++) {
			for (var j = 0; j < 2; j++) {
				if(localStorage.getItem('section'+i+'ans'+j)==localStorage.getItem("s"+i+"q"+j)){
					marks++;
				}
			}
		}
		alert(marks);
	}

	function setTime(time){
		$('.time .hour').html(currentTime.hr);
		$('.time .min').html(currentTime.min);
		$('.time .sec').html(currentTime.sec);

		var t1=CalculateSec(currentTime);
		var t2=CalculateSec(TotelTime);
		var per=(t1/t2)*100;
		$(".progress .progress-bar").css('width',per+"%");
	}

	function CalculateSec(time){
		return timeinsec=time.sec+(time.min*60)+(time.hr*60*60);
	}

	function init(){
		var time=<?php echo $mod->duration; ?>;
		TotelTime.hr=Math.floor(time/60);
		TotelTime.min=Math.floor(time%60);

		$("#question-area").hide();
		
		$.ajax({
			url: "http://localhost/quiz/api",
			data: {'id':17},
			method: "POST",
			context: document.body
		}).done(function(result) {
			jsonarray=jQuery.parseJSON(result);
		}).fail(function() {
			alert("Question Not Found!");
		});
	}

	function showQuestion(section, question){
		currentques=question;
		currentsec=section;
		var jsonSection=jsonarray[section];
		var jsonQuestion=jsonSection[question];

		$('#question-view').html(jsonQuestion.Question);

		if(jsonQuestion.image==null){
			$("#qimage").empty();
		}else{
			var image=document.createElement("img");
			$(image).attr("src",jsonQuestion.image).attr('class','img-rounded').css('height','49%');
			$("#qimage").html(image);
		}

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(1);
		$("#option1").html(option).append(jsonQuestion.option1);

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(2);
		$("#option2").html(option).append(jsonQuestion.option2);

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(3);
		$("#option3").html(option).append(jsonQuestion.option3);

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(4);
		$("#option4").html(option).append(jsonQuestion.option4);

		if(section[currentques+1]==null){
			$(".NextBtn").html("End Section");
		}
	}

	function nextQuestion(){

		localStorage.setItem('section'+(currentsec-1)+'ans'+(currentques-1),$(".ans:checked").val());

		var option;
		if(jsonarray[currentsec]==null){
			checkAns();
			return;
		}
		var section = jsonarray[currentsec];
		if(section[currentques]==null){
			currentsec++;
			currentques=0;
			nextQuestion();
			return;
		}
		var question = section[currentques];
		
		$('#question-view').html(question.Question);

		if(question.image==null){
			$("#qimage").empty();
		}else{
			var image=document.createElement("img");
			$(image).attr("src",question.image).attr('class','img-rounded').css('height','49%');
			$("#qimage").html(image);
		}

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(1);
		$("#option1").html(option).append(question.option1);

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(2);
		$("#option2").html(option).append(question.option2);

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(3);
		$("#option3").html(option).append(question.option3);

		option = document.createElement("input");
		$(option).attr('type','radio').attr('name','option').addClass('ans').val(4);
		$("#option4").html(option).append(question.option4);

		localStorage.setItem("s"+currentsec+"q"+question["Q.No"],question.ans);

		if(section[currentques+1]==null){
			if(jsonarray[currentsec+1]!=null){
				$(".NextBtn").html("End Section");
			}else{
				$(".NextBtn").html("End Test");
			}
		}else{
			$(".NextBtn").html("Next");
		}

		currentques++;
	}
	$(document).ready(function(){
		init();
		$("#StartQuiz").click(function(){
			$("#question-area").fadeIn(); 
			$('#quiz-description').fadeOut();
			$('.questioncontrol').removeClass('disabled');
			timer = setInterval(function(){ 
				currentTime.sec++;
				if(currentTime.sec==60){
					currentTime.min++;
					currentTime.sec=0;
					if(currentTime.min==60){
						currentTime.hr++;
						currentTime.min=0;
					}
				}

				setTime(currentTime);

				if (compairTime()) {
					clearInterval(timer);
					alert("Time Over");
				}
			}, 1000);
			nextQuestion();
		});

		$(".questioncontrol").click(function(){
			showQuestion($(this).data("section"), $(this).data("question"));
		});

		$(".NextBtn").click(function(){
			nextQuestion();
		});
	});
</script>
</body>
</html>