<?php
session_start();
if (isset($_SESSION['nickname'])) {
	
} else {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="js/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="stats">
	<div class="container-fluid">
		<div class="row up">
			<div class="col " id="left"></div>
			<div class="col text-center"><h1>Top 5 players results</h1>					
			</div>
			<div class="col">
				<div class="row">
					<div class="btn-group bam ml-auto" role="group" aria-label="Button group with nested dropdown">
					  <div class="btn-group" role="group">
					    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      Stats
					    </button>
					    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					      <a class="dropdown-item" href="stats.php">User stats</a>
					      <a class="dropdown-item" href="allstats.php">All player stats</a>
					      <a class="dropdown-item" href="topstats.php">Top 5</a>
					    </div>
					  </div>
					  <a href="index.php" class="btn btn-primary">Game</a>
					  <a href="logout.php" class="btn btn-danger">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<canvas id="top5" width="150" height="50"></canvas>
			</div>
		</div>
	</div>
<script>

	$.getJSON("game.php", 
	{
		top5: "",
	},


	function(result){
		$.each(result, function(i, field){
			topwin.data.labels.push(field.nickname);
			topwin.data.datasets[0].data.push(field.win);
			topwin.data.datasets[0].backgroundColor.push("rgba("+Math.ceil(Math.random() * 255)+", "+Math.ceil(Math.random() * 255)+", "+Math.ceil(Math.random() * 255)+", 0.6)");
		});
		topwin.update();
	});

var topChart = document.getElementById("top5").getContext('2d');
var topwin = new Chart(topChart, {
	type: 'bar',
	data: {
		labels: [],
		datasets: [{
			label: 'Top 5',
			data: [],
			backgroundColor: [],
			borderColor: [],
			borderWidth: 1
		}]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		}
	}
});
</script>
</body>
</html>