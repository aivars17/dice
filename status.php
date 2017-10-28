<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js" ></script>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<canvas id="myChart" width="200" height="100"></canvas>
				
			</div>
		</div>
	</div>

	<script>



		data = ["2","3","4","5","6"];
		function userStats(){

			$.getJSON("game.php", 
			{
				me: "",
			},


			function(result){

				console.log(result);
				$.each(result, function(i, field){
					data.push(parseInt(field.win));

				});
			});
		};


		userStats();


		console.log(data);
		var ctx = document.getElementById("myChart").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
							datasets: [{
								label: '# of Votes',
								data: data,
								backgroundColor: [
								'rgba(255, 99, 132, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)',
								'rgba(153, 102, 255, 0.2)',
								'rgba(255, 159, 64, 0.2)'
								],
								borderColor: [
								'rgba(255,99,132,1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
								'rgba(153, 102, 255, 1)',
								'rgba(255, 159, 64, 1)'
								],
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
					console.log(data);
	</script>
</body>
</html>