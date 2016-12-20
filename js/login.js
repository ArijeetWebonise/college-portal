function validate(){

	if($("#email").val()==""||$("#prn").val()==""||$("#password").val()=="")
		return false;

	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var ret= re.test($("#email").val());
	if(!ret)
		return ret;
}

$(document).ready(function(){
	$("#loginform").click(function(e){
		e.preventDefault();
		var json;
		if(!validate()){
			console.log('fail');
			return;
		}
		var user=$("#user").val();
		switch(user){
			case "student": 
				json=jQuery.parseJSON( '{ "user": "'+user+'", "email":"'+$("#email").val()+'", "password":"'+$("#password").val()+'" , "prn":'+$("#prn").val()+' }' );
				break;
			case "teacher": 
				console.log("2"+user);
				break;
			case "parent": 
				console.log("3"+user);
				break;
		}

		$.ajax({
			method: "POST",
			url: "http://localhost/view/loginsubmit.php",
			data: json
		}).done(function() {
			console.log("hi");
		});

	});
});
