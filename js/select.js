$(document).ready(function(){
	$flag=false;
	$("#Toggle-select").click(function(e){
		e.preventDefault();
		$(".presentradio").prop('checked',$flag);
		$(".absentradio").prop('checked',!$flag);
		$("#Toggle-select").html($flag?"All Absent":"All Present");
		$flag=!$flag;
	});
});