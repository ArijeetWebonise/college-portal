$(document).ready(function(){
	var i=1;
	$(".AddQ").click(function(e){
		e.preventDefault();
		$(".noofq").val(i);
		$("#Question-Bank").append("<div class='well'><button class='removeq btn'>X</button><div class='form-group'><label>Question "+i+"</label><textarea class='form-control' name='q"+i+"'></textarea></div><div class='form-group'><label>Image</label><input type='file' name='imgq"+i+"' class='form-control'></div><div class='form-group'><label>option 1</label><textarea class='form-control' name='q"+i+"op1'></textarea><input type='checkbox' name='ansq"+i+"op1'></div><div class='form-group'><label>option 2</label><textarea class='form-control' name='q"+i+"op2'></textarea><input type='checkbox' name='ansq"+i+"op2'></div><div class='form-group'><label>option 3</label><textarea class='form-control' name='q"+i+"op3'></textarea><input type='checkbox' name='ansq"+i+"op3'></div><div class='form-group'><label>option 4</label><textarea class='form-control' name='q"+i+"op4'></textarea><input type='checkbox' name='ansq"+i+"op4'></div></div>");
		i++;
		$(".removeq").click(function(e){
			e.preventDefault();
			if(confirm("Are You Sure You To Delete it")){
				console.log($(this));
			}
		});
	});
	$(".removeq").click(function(e){
			e.preventDefault();
			if(confirm("Are You Sure You To Delete it")){
				console.log(e);
			}
		});
	$(".addImage").change(function(e){
		var formData = new FormData($("#Question-Bank"));
		$(".imageview").attr("src",$(".addImage").val());
	})
});
