var quiz={};
var quiztitle;
var ans=[];
var maxtime=0;
var sec=0;
var min=0;
/**
* Set the information about your questions here. The correct answer string needs to match
* the correct choice exactly, as it does string matching. (case sensitive)
*
*/

function getjson() {
	var id=$('#id').val();
	$.ajax({
		method: "POST",
		url: "testserver/"+id,
		data: { name: "John", location: "Boston" }
	})
	.done(function( msg ) {
		quiz=jQuery.parseJSON(msg)['question'];
		maxtime=jQuery.parseJSON(msg)['time']*100;
		quiztitle=jQuery.parseJSON(msg)['name'];
	var timer;
	
	/**
	* HTML Encoding function for alt tags and attributes to prevent messy
	* data appearing inside tag attributes.
	*/
	function htmlEncode(value){
		return $(document.createElement('div')).text(value).html();
	}

	function timercontrol(){
		sec++;
		if(sec==60){
			sec=0;
			min++;
		}
		var time=min*60+sec;
		setTimebar(time,10*60);
	}

	function setTimebar(val){
		per=val/maxtime*100;
		var time=per+"%";
		$('#timeline .progress .progress-bar').css('width',time);
		var ltime=maxtime-val;
		var lmin=parseInt(ltime/60);
		var lsec=ltime-(lmin*60);
		if(lsec==0&&lmin==0){
			endQuiz();
			$('.timeline-left').html(lmin+":"+lsec+" left");
			alert("Time Over");
			clearInterval(timer);
		}else if(lsec>0||lmin>0){
			$('.timeline-left').html(lmin+":"+lsec+" left");
		}
	}

	/**
	* This will add the individual choices for each question to the ul#choice-block
	*
	* @param {choices} array The choices from each question
	*/
	function addChoices(choices){
		if(typeof choices !== "undefined" && $.type(choices) == "array"){
			$('#choice-block').empty();
			for(var i=0;i<choices.length; i++){
				$(document.createElement('li')).addClass('choice choice-box').attr('data-index', i).text(choices[i]).appendTo('#choice-block');                    
			}
		}
	}

	/**
	* Resets all of the fields to prepare for next question
	*/
	function nextQuestion(){
		$('#question').text(quiz[currentquestion]['question']);
		$('#pager').text('Question ' + Number(currentquestion + 1) + ' of ' + quiz.length);
		if(quiz[currentquestion].hasOwnProperty('image') && quiz[currentquestion]['image'] != "" && quiz[currentquestion]['image']!=null){
			if($('#question-image').length == 0){
				$(document.createElement('img')).addClass('question-image').attr('id', 'question-image').attr('src', quiz[currentquestion]['image']).attr('alt', htmlEncode(quiz[currentquestion]['question'])).insertAfter('#question');
			} else {
				$('#question-image').attr('src', quiz[currentquestion]['image']).attr('alt', htmlEncode(quiz[currentquestion]['question']));
			}
		} else {
			$('#question-image').remove();
		}
		addChoices(quiz[currentquestion]['choices']);
		setupButtons();
	}

	function checkAns(choice) {
		if(quiz[choice]['choices'][ans[choice]] == quiz[choice]['correct']){
			score++;
		}
	}
	/**
	* After a selection is submitted, checks if its the right answer
	*
	* @param {choice} number The li zero-based index of the choice picked
	*/
	function processQuestion(choice,mode){
		ans[currentquestion]=choice;
		if(mode==0){
			currentquestion++;
			if(currentquestion == quiz.length){
				endQuiz();
			}else if(currentquestion == quiz.length-1){
				nextQuestion();
				$('#submitbutton').html('Submit');
			} 
			else {
				nextQuestion();
			}
		}else{
			if(currentquestion==quiz.length-1){
				$('#submitbutton').html('NEXT QUESTION &gt;&gt;');
			}
			currentquestion--;
			if(currentquestion >0){
				nextQuestion();
			}else if(currentquestion==0){
				nextQuestion();
			}
		}
	}

	function controlBtn(){
		for (var i = 0; i < quiz.length; i++) {
			var btn=document.createElement('ul');
			$(btn).html(i+1).attr('class', 'btn btn-default control-btn').appendTo('#control-btn');
		}
		$('.control-btn').on('click',function(){
			currentquestion=$(this).html()-1;
			nextQuestion();
		});
	}
	/**
	* Sets up the event listeners for each button.
	*/
	function setupButtons(){
		if(currentquestion==0){
			if(!$('#previousbtn').hasClass('disabled')){
				$('#previousbtn').addClass('disabled');
				$('#previousbtn').removeClass('active');
			}
		}else{
			if(!$('#previousbtn').hasClass('active')){	
				$('#previousbtn').removeClass('disabled');
				$('#previousbtn').addClass('active');
			}
		}
		$('.choice').on('mouseover', function(){
			$(this).css({'background-color':'#e1e1e1'});
		});
		$('.choice').on('mouseout', function(){
			$(this).css({'background-color':'#fff'});
		})
		$('.choice').on('click', function(){
			picked = $(this).attr('data-index');
			$('.choice').removeAttr('style').off('mouseout mouseover');
			$(this).css({'border-color':'#222','font-weight':700,'background-color':'#c1c1c1'});
			$('#submitbutton').css({'color':'#000'}).on('click', function(){
				$('.choice').off('click');
				$(this).off('click');
				processQuestion(picked,0);
			});
			$('#previousbtn').css({'color':'#000'}).on('click', function(){
				$('.choice').off('click');
				$(this).off('click');
				processQuestion(picked,1);
			});
			
		})
	}

	/**
	* Quiz ends, display a message.
	*/
	function endQuiz(){
		$('#question').empty();
		$('.control-btn').remove();
		$('#choice-block').empty();
		$('#submitbutton').remove();
		$('#previousbtn').remove();
		for (var i = 0; i < quiz.length; i++) {
			checkAns(i);
		}
		$('#question').text("You got " + score + " out of " + quiz.length + " correct.");
		$(document.createElement('h2')).css({'text-align':'center', 'font-size':'4em'}).text(Math.round(score/quiz.length * 100) + '%').insertAfter('#question');
	}
	/**
	* Runs the first time and creates all of the elements for the quiz
	*/
	function init(){
		//add title
		if(typeof quiztitle !== "undefined" && $.type(quiztitle) === "string"){
			$(document.createElement('h1')).text(quiztitle).appendTo('#frame');
		} else {
			$(document.createElement('h1')).text("Quiz").appendTo('#frame');
		}
		//add pager and questions
		if(typeof quiz !== "undefined" && $.type(quiz) === "array"){
			controlBtn();
			//add pager
			$(document.createElement('p')).addClass('pager').attr('id','pager').text('Question 1 of ' + quiz.length).appendTo('#frame');
			//add first question
			$(document.createElement('h2')).addClass('question').attr('id', 'question').text(quiz[0]['question']).appendTo('#frame');
			//add image if present
			if(quiz[0].hasOwnProperty('image') && quiz[0]['image'] != "" && quiz[0]['image']!=null){
				$(document.createElement('img')).addClass('question-image').attr('id', 'question-image').attr('src', quiz[0]['image']).attr('alt', htmlEncode(quiz[0]['question'])).appendTo('#frame');
			}
			$(document.createElement('p')).addClass('explanation').attr('id','explanation').html('&nbsp;').appendTo('#frame');

			//questions holder
			$(document.createElement('ul')).attr('id', 'choice-block').appendTo('#frame');

			//add choices
			addChoices(quiz[0]['choices']);

			$(document.createElement('div')).addClass('choice-box col-sm-6 btn btn-success disabled').attr('id', 'previousbtn').html('<< PREVOUS QUESTION').css({'font-weight':700,'color':'#222','padding':'30px 0'}).appendTo('#frame');

			//add submit button
			$(document.createElement('div')).addClass('choice-box col-sm-6 btn btn-success').attr('id', 'submitbutton').html('NEXT QUESTION &gt;&gt;').css({'font-weight':700,'color':'#222','padding':'30px 0'}).appendTo('#frame');
			setupButtons();
			timer== setInterval(timercontrol, 1000);
		}
	}

	function startPage() {
		//add title
		if(typeof quiztitle !== "undefined" && $.type(quiztitle) === "string"){
			$(document.createElement('h1')).text(quiztitle).appendTo('#frame');
		} else {
			$(document.createElement('h1')).text("Quiz").appendTo('#frame');
		}
		$(document.createElement('div')).addClass('btn btn-default').attr('id','start-btn').html('Start Quiz').appendTo('#frame');
		$('#start-btn').on('click',function(){
			$('#frame').empty();
			init();
		});
	}

	startPage();
	});
}

/******* No need to edit below this line *********/
var currentquestion = 0, score = 0, picked;
jQuery(document).ready(function($){
	getjson();
});