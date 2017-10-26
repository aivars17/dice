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
			<div class="col up text-center">
				<h1>Welcome to Dice game</h1>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<img id="dice0" height="42" width="42" src="pic/6.png">
				<img id="dice1" height="42" width="42" src="pic/6.png">
				<img id="dice2" height="42" width="42" src="pic/6.png">
			</div>
		</div>
		<div class="row">
			<div class="col" id="demo"></div>
		</div>
		<div class="row">
			<div class="col text-center">
				<button class="btn  btn-primary btn-block">Pradėti žaidimą</button>
				<button id="shuffle" class="btn   btn-primary btn-block">Ridenti kauliukus</button>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<div id="results"></div>
			</div>
		</div>
	</div>
	<script src="js/regscript.js"></script>
</body>
</html>