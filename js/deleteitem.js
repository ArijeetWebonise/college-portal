$(document).ready(function(){
	$(".deleteitem").click(function(e){
		if(confirm("Are You Sure You To Delete it")){
			window.location.href = $(this).attr("data-object");
		}
	});
});
