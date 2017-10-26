function checkpass(){
	var pass = document.getElementById('form_password');
	var pass_re = document.getElementById('form_password_re');
	var error = document.getElementById('error');
	var reg = document.getElementById('reg');
	if (pass.value == pass_re.value) {
		error.style.display = "block";
		error.innerHTML = "";
		reg.disabled = false;
	} else {
		error.style.display = "block";
		error.innerHTML = "Slaptažodis nesutampa";
		reg.disabled = true;
	}
}
roll = 0;
lucky = [];
win = 0;
$("#shuffle").click(function(){
	 skaiciai = [];
	 
	if (roll < 3) {
		roll++	
	for (var i = 0; i < 3; i++) {		
		skaiciai.push(Math.ceil(Math.random() * 6));
		document.getElementById("dice"+[i]).src = "pic/"+skaiciai[i]+".png";

	}
	check();
}else {
	for (var i = 0; i < 3; i++) {
	skaiciai.push(Math.ceil(Math.random() * 6));
	document.getElementById("dice"+[i]).src = "pic/"+skaiciai[i]+".png";
}
	check();
	console.log("gameover");
	document.getElementById("shuffle").disabled = true;
	console.log(lucky);
	for (var i = 0; i < lucky.length; win += lucky[i++]);
	document.getElementById("results").innerHTML = "Total won "+win+"EUR";
	bam(win);
}
		
	
//console.log(lucky);
});

function check(){
	if (skaiciai[0] === skaiciai[1] || skaiciai[0] === skaiciai[2]) {
			var num = (skaiciai[0]*0.10);
			lucky.push(num);
			
			document.getElementById("results").innerHTML = "Win "+num.toFixed(2)+"EUR";
			document.getElementById("results").style.display = "block";
		} else if (skaiciai[1] === skaiciai[2]) {
			var num = (skaiciai[2]*0.10);
			lucky.push(num);
			
			document.getElementById("results").innerHTML = "Win "+num.toFixed(2)+"EUR";
			document.getElementById("results").style.display = "block";
		} else {
			document.getElementById("results").innerHTML = "Try again";
			document.getElementById("results").style.display = "block";
		}
}

function bam(win){
	$.getJSON("game.php",
	{
		win: win,
	},
	 function(result){

	 		
			$.each(result['users'], function(i, field){
				document.getElementById("results").innerHTML = "Taip";
	// 			$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr>");
	 });

});
}


	/*	
function shuffle() {
	skaiciai = [];
	if (roll < 3) {
		roll++	
	for (var i = 0; i < 3; i++) {		
		skaiciai.push(Math.floor((Math.random() * 6)+1));
		document.getElementById("dice"+[i]).src = "pic/"+skaiciai[i]+".png";
	}
}else {
	for (var i = 0; i < 3; i++) {
	skaiciai.push(Math.floor((Math.random() * 6)+1));
	document.getElementById("dice"+[i]).src = "pic/"+skaiciai[i]+".png";
}
	console.log("gameover");
	document.getElementById("roll").disabled = true;
}
}*/