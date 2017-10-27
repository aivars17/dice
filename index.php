<?php
session_start();


if (isset($_SESSION['nickname'])) {
	$alert = "Welcome back, ". $_SESSION['nickname'];
} else {
	header('Location: login.php');
}
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
				<div class="row ">
					<div class="col">
						<div class="row justify-content-end">
							<div class="col ">
								
							<h6><?php echo $alert;?></h6></div></div>
						<div class="row align-items-start">
							<div class="col-md-10"></div>
							<div class="col " ><a  href="logout.php" type="button" class=" btn btn-outline-danger">Logout</a></div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
			<div class="col text-center" style="padding: 50px;">
				<img id="dice0" height="60" width="60" src="pic/6.png">
				<img id="dice1" height="60" width="60" src="pic/6.png">
				<img id="dice2" height="60" width="60" src="pic/6.png">
			</div>
		</div>
		<div class="row">
			<div class="col" id="demo"></div>
		</div>
		<div class="row">
			<div class="col text-center">
				<button type="button" id="newGame" class="btn btn-lg btn-primary">New game</button>
				<button type="button" id="shuffle" class="btn btn-lg btn-primary">Roll</button>
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