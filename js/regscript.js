function checkpass(){
	var pass = document.getElementById('form_password');
	var pass_re = document.getElementById('form_password_re');
	var error = document.getElementById('error');
	var reg = document.getElementById('reg');
	//tikrinama ar slaptažodis sutampa 
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
//kauliuku atsitikitnis sukurimas
function shuffle(){
	 skaiciai = [];
	if (roll < 3) {
		roll++	
	for (var i = 0; i < 3; i++) {		
		skaiciai.push(Math.ceil(Math.random() * 6));
		document.getElementById("dice"+[i]).src = "pic/"+skaiciai[i]+".png";
	}
	//iskvečiams tikrinimas ar sutampa kauliuku skaičiai 
	check();
}else {
	for (var i = 0; i < 3; i++) {
	skaiciai.push(Math.ceil(Math.random() * 6));
	document.getElementById("dice"+[i]).src = "pic/"+skaiciai[i]+".png";
}
	check();
	document.getElementById('gameover').style.display = "block";
	document.getElementById("shuffle").disabled = true;
	document.getElementById("newGame").disabled = false;
	//suskaičiojamas bendras laimėjimas
	for (var i = 0; i < lucky.length; wins += lucky[i++]);
	//atvaizduojams visas laimėjimas
	document.getElementById("results").innerHTML = "Total win "+wins.toFixed(2)+"EUR";
	//iškviečiama laimėjimų ikelimo į duomenu baze funkcija
	intoDB();
}
};
//sutampančiu kauliuku tikrinimas
function check(){
	var checkRe = document.getElementById("results");
	if (skaiciai[0] === skaiciai[1] || skaiciai[0] === skaiciai[2]) {
			//laimėjimo skaičiavimas
			var num = (skaiciai[0]*0.10);
			lucky.push(num);
			//laimėjimo išvedimas
			checkRe.innerHTML = "Win "+num.toFixed(2)+"EUR";
			checkRe.style.display = "block";
		} else if (skaiciai[1] === skaiciai[2]) {
			//laimėjimo skaičiavimas
			var num = (skaiciai[2]*0.10);
			lucky.push(num);
			checkRe.innerHTML = "Win "+num.toFixed(2)+"EUR";
			checkRe.style.display = "block";
		} else {
			checkRe.innerHTML = "Try again";
			checkRe.style.display = "block";
		}
}

function intoDB(){
	$.post( "game.php", 
		{ win: wins.toFixed(2) }, function( data ) {
});
};
//duomenų išvalimas ir naujo žaidimo pradėjimas
function newGame(){
	for (var i = 0; i < 3; i++) {
		document.getElementById("dice"+[i]).src = "pic/6.png";
	}
	document.getElementById('gameover').style.display = "none";
	document.getElementById("shuffle").disabled = false;
	document.getElementById("newGame").disabled = true;
	document.getElementById("results").innerHTML = "";
	document.getElementById("results").style.display = "none";
	//laimėjimų ir sukimų išvalimas
	roll = 0;
	lucky = [];
	wins = 0;
};