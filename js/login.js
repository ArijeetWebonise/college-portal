// <div class="form-group">
// 				<label for="prn">PRN:</label>
// 				<input type="number" class="form-control" name="prn" id="prn">
// 			</div>
// 			<div class="form-group">
// 				<label for="email">Email address:</label>
// 				<input type="email" class="form-control" name="email" id="email">
// 			</div>
// 			<div class="form-group">
// 				<label for="pwd">Password:</label>
// 				<input type="password" class="form-control" name="pass" id="pwd">
// 			</div>
function createInput(ltext, type, att){
	var div=document.createElement("div");
	div.className="form-group";
	var label=document.createElement("label");
	label.appendChild(document.createTextNode(ltext));
	var input=document.createElement("input");
	input.className="form-control";
	input.name=att;
	input.type=type;
	input.id=att;
	div.appendChild(label);
	div.appendChild(input);
	return div;
}

function getLogin(sel){
	if(sel.value=="student"){
		studentLogin();
	}else if(sel.value=="teacher"){
		teacherLogin();
	}else if(sel.value=="parent"){
		parentLogin();
	}else{
		document.getElementById("field").innerHTML="";
	}
}

function studentLogin(){
	document.getElementById("field").innerHTML="";
	document.getElementById("field").appendChild(createInput("PRN", "number", "PRN"));
	document.getElementById("field").appendChild(createInput("Email Address", "email", "Email"));
	document.getElementById("field").appendChild(createInput("Password", "password", "pass"));
}
function teacherLogin(){
	document.getElementById("field").innerHTML="";
	document.getElementById("field").appendChild(createInput("EnRoll Number", "number", "EnRoll"));
	document.getElementById("field").appendChild(createInput("Email Address", "email"));
	document.getElementById("field").appendChild(createInput("Password", "password", "pass"));
}
function parentLogin(){
	document.getElementById("field").innerHTML="";
	document.getElementById("field").appendChild(createInput("PRN", "number", "PRN"));
	document.getElementById("field").appendChild(createInput("Phone Number", "number", "Phone"));
	document.getElementById("field").appendChild(createInput("Password", "password", "pass"));
}
