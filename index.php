<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dice game</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col up">
				<h1>Welcome to Dice game</h1>
			</div>
		</div>
		<div class="row">
			<div class="col" id="pirmas"></div>
			<div class="col" id="antras"></div>
			<div class="col" id="trecias"></div>
			
		</div>
		<div class="row">
			<div class="col">
				<button class="btn btn-lg btn-primary col-md-2 btn-block">Pradėti žaidimą</button>
				<button id="ridenti" onclick="shuffle()" class="btn col-md-2 btn-lg btn-primary btn-block">Ridenti kauiukus</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		 roll = 0;
		
		function shuffle() {
			if (roll < 4) {
				roll++
			var skaiciai = [];
			var pirmas = document.getElementById("pirmas");
			var pirmas_count = Math.floor((Math.random() * 6)+1);
			skaiciai.push(pirmas_count);
			pirmas.innerHTML = "<img src=pic/"+pirmas_count+".png>"
			var antras = document.getElementById("antras");
			var antras_count = Math.floor((Math.random() * 6)+1)
			skaiciai.push(antras_count);
			antras.innerHTML = "<img src=pic/"+antras_count+".png>";
			var trecias = document.getElementById("trecias");
			var trecias_count = Math.floor((Math.random() * 6)+1);
			skaiciai.push(trecias_count);
			trecias.innerHTML = "<img src=pic/"+trecias_count+".png>";
			var sorted_arr = skaiciai.slice().sort(); // You can define the comparing function here. 
                                     // JS by default uses a crappy string compare.
                                     // (we use slice to clone the array so the
                                // original array won't be modified)
			var results = [];
			for (var i = 0; i < skaiciai.length - 1; i++) {
			    if (sorted_arr[i + 1] == sorted_arr[i]) {
			        results.push(sorted_arr[i]);
			    }
			}
			var win = ((results[0]+results[0])*0.1);
			var win = win.toFixed(2);	
			console.log(win);
		}else {
			console.log("gameover");
		}
		}
	</script>
	<script src="js/regscript.js"></script>
</body>
</html>