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

$("#ridenti").click(function(){
	console.log($("#ridenti").val());
	$.getJSON("game.php",
	{
		
	},
	 function(result){
	 	console.log(this);
			$("#auto_table_body").html('');
			$.each(result['allreg'], function(i, field){
		
	});

});
});