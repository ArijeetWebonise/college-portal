function addQuat(){
	var inp=document.getElementById('quatinp');
	var field=document.getElementById('quat');
	var list=document.getElementById('quatlist');
	if(field.value==""){
		field.value=inp.value;
	}else{
		field.value+=","+inp.value;
	}
	var newlist=document.createElement("li");
	var textnode=document.createTextNode(inp.value);
	newlist.appendChild(textnode);
	list.appendChild(newlist);
	document.getElementById('quatinp').value="";
	return false;
}