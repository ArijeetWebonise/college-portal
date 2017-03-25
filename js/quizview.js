i=0;
var marklist=[];
anslist=[];
var timeleft;
var Timer;
// var json;
ans=[];
var toteltime;

$(document).ready(function(){
	toteltime=parseInt($(".time").val())*60;
	timeleft=toteltime;

	$(".startbtn").click(function(e){
		$("#testview").removeClass("hidepart");
		$("#testview").css("overflow","inherit");
		$("#startview").addClass("hidepart");
		nextquest();
		timerfun();
	});

	$.getJSON( "../quiz/testserver", function( data ) {
		json=data.QuestionBank;
	});

	$(".nextbtn").click(function(e){
		// $(".gotobtn").prop('disabled', true);
		nextquest();
	});

	$(".gotobtn").click(function(e){
		i=parseInt($(this).attr("data-value"))-1;
		setQuestion(i);
	});

	$(".addQuestion").click(function(e){
		var id=$(this).attr("data-id");
		
	});
});

function setTime(){
	var prefix=" Left";
	var min=parseInt(timeleft/60);
	var sec=timeleft-(min*60);
	$(".time-value").html(min+":"+sec+prefix);
}

function timerfun() {
	var per=(timeleft/toteltime)*100;
	$(".timer div").css("width",per+"%");
	timeleft-=1;
	if (timeleft>=0) {
		Timer = setTimeout(timerfun, 1000);
		setTime();
	}else{
		clearTimeout(Timer);
	}
}

function resetAns(){
	$("input:checked").checked=false;
}

function checkAns(i){
	if($("input:checked").val()==ans[i]){
		return true;
	}
	return false;
}

function submitAns() {
	totelMarks=0;
	for (var i = 0; i < ans.length; i++) {
		if(anslist[i]==ans[i]){
			totelMarks+=marklist[i];
		}
	}
	alert(totelMarks);
}

function setQuestion(no) {
	$(".ques").html(json[no].question);
	if (json[no].image!=null) {
		$(".qimage").removeClass("hideimage");
		$(".qimage").addClass("showimage");
		$("#diagram").attr("src",json[no].image);
		console.log($("#diagram"));
	}
	for (var j = 0; j < 4; j++) {
		$(".labelop"+(j+1)).html(json[no].options[j].opvalue);
		if(json[no].options[j].answer!=1){
			ans[no]=j+1;
		}
	}
	if(i==json.length-1){
		$(".nextbtn").html("Submit");
	}else{
		$(".nextbtn").html("Next");
	}
}

function regesterAns(no) {
	if(no!=0)
		anslist[no-1]=parseInt($("input:checked").val());
}

function nextquest(){
	$(".gotobtn").each(function( index ) {
		if(index==i)
			$( this ).prop('disabled', false)
	});
	if(i<json.length){
		regesterAns(i);
		resetAns();
		marklist[i]=json[i].marks;
		setQuestion(i);
	}else if(i==json.length){
		regesterAns(i);
		submitAns();
	}
	i++;
}
