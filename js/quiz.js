$(document).ready(function(){
	$("#StartQuiz").click(function(e){
		$("#quiz-description").addClass('hide');
		$("#question-area").removeClass('hide');
		$('.question').addClass('hide');
		$($('.question')[0]).removeClass('hide');
		$($('.section')[0]).removeClass('hide');
	});

	$('.nextQues').click(function(e){
		if(e.target.parentNode.nextElementSibling!=null){
			$(e.target.parentNode.nextElementSibling).removeClass('hide');
			$(e.target.parentNode).addClass('hide');
		}
		if($(e.target.parentNode.nextElementSibling).nextElementSibling!=null){
			$(e.target.parentNode.nextElementSibling.childNodes[15]).val("End Section");
		}
	});

	$('.previousQues').click(function(e){
		if(e.target.parentNode.previousElementSibling!=null){
			$(e.target.parentNode.previousElementSibling).removeClass('hide');
			$(e.target.parentNode).addClass('hide');
		}
	});
});