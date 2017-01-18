$(document).ready(function(){
	var i=0;
	$(".questionlist").first().addClass('viewquestion');
	$("#nextbtn").click(function(e){
		i++;
		$(".viewquestion").removeClass("viewquestion");
		$('.questionlist').each(function (index, value) { 
			if(index==i){
				console.log($(this).addClass('viewquestion')); 
			}
		});
	});
});
