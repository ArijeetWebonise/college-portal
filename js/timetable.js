function gettimetable(clas){
	document.getElementById("timetable").innerHTML="";
	document.getElementById("timetable").appendChild(setheader());
	$.ajax({
	url: "media/json/tb_"+clas.value+".json",
	dataType: 'json'
	}).done(function(responce){
		var tt=responce.timetable;
		var ccp=findcurrentperiod(tt);
		if(node!=false){
			var node=createnode("Your Current Period is "+ccp,"span");
			document.getElementById("Current").innerHTML="";
			document.getElementById("Current").appendChild(node);
		}else{
			var node=createnode("College is close","span");
			document.getElementById("Current").appendChild(node);
		}
		for (var i = 0; i < tt.length; i++) {
			var tr=document.createElement("tr");
			tr.appendChild(createnode(tt[i].day,"td"));
			for (var j = 0; j < tt[i].period.length; j++) {
				if(Array.isArray(tt[i].period[j].class)){
					var test="";
					for (var z = 0; z < tt[i].period[j].class.length; z++) {
						test+=tt[i].period[j].class[z].sub+"("+tt[i].period[j].class[z].batch+") ";
					}
					tr.appendChild(createnode(test,"td"));
					tr.appendChild(createnode(test,"td"));
				}else{
					tr.appendChild(createnode(tt[i].period[j].class,"td"));
				}
			}
			tr.appendChild(createnode("","td"));
			tr.appendChild(createnode("","td"));
			tr.appendChild(createnode("","td"));
			tr.appendChild(createnode("","td"));
			tr.appendChild(createnode("","td"));
			document.getElementById("timetable").appendChild(tr);
		}
	});
}
function setheader(){
	var tr=document.createElement("tr");
	tr.appendChild(createnode("Days","th"));
	tr.appendChild(createnode("8:30","th"));
	tr.appendChild(createnode("9:30","th"));
	tr.appendChild(createnode("10:30","th"));
	tr.appendChild(createnode("11:30","th"));
	tr.appendChild(createnode("12:30","th"));
	tr.appendChild(createnode("1:15","th"));
	tr.appendChild(createnode("2:15","th"));
	tr.appendChild(createnode("3:15","th"));
	tr.appendChild(createnode("3:30","th"));
	tr.appendChild(createnode("4:30","th"));
	return tr;
}
function createnode(text,ele){
	var td=document.createElement(ele);
	var t=document.createTextNode(text);
	td.appendChild(t);
	return td;
}
function getbatch(){
	return "A";
}

function findcurrentperiod(tt){
	var currentdate = new Date(); 
	var datetime = currentdate.getHours() + "." + currentdate.getMinutes();
	var day=currentdate.getDay(); 
	if(currentdate>=new Date("")){
		return false;
	}
	for (var i = 0; i < tt[day-1].period.length; i++) {
		if(tt[day-1].period[i].time<datetime){
			period=tt[day-1].period[i];
		}
	}
	if(!Array.isArray(period.class)){
		return period.class;
	}
	var batch=getbatch();
	for (var i = 0; i < period.class.length; i++) {
		if(period.class[i].batch==batch){
			return period.class[i].sub;
		}
	};
}
