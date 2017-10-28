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
wins = 0;
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
	for (var i = 0; i < lucky.length; wins += lucky[i++]);
	document.getElementById("results").innerHTML = wins.toFixed(2);
	
	bam();
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

function bam(){
	$.post( "game.php", 
		{ win: wins.toFixed(2) }, function( data ) {
  		console.log(data);
};
);
	};

$("#newGame").click(function(){
	for (var i = 0; i < 3; i++) {
		document.getElementById("dice"+[i]).src = "pic/6.png";
	}
	document.getElementById("shuffle").disabled = false;
	document.getElementById("results").innerHTML = "";
	document.getElementById("results").style.display = "none";
	roll = 0;
	lucky = [];
	wins = 0;
});



	/*	
}
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