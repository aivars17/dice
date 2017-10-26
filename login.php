<?php
session_start();
$error = "";
if (isset($_POST['nickname'])){
	try {
		$conn = new PDO("mysql:host=localhost;dbname=dice;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $conn->prepare("SELECT * FROM users WHERE nickname = :nickname");
		$statement->bindParam(':nickname', $_POST['nickname']);
		$statement->execute();
		$user_data = $statement->fetch(PDO::FETCH_ASSOC);
	}   catch(PDOException $e) {
		echo $e->getMessage();
	}
	print_r($user_data);
	if(password_verify($_POST['password'], $user_data['password'])){
		$_SESSION['username'] = $_POST['nickname'];
		$_SESSION['last_login'] = date("Y-m-d H:m:s");
			setcookie("sausainukas",$user_data['username'], time() + (60 * 2), "/"); // 86400 = 1 day
			setcookie("lastTime",date('Y-m-d h:i:sa'), time() + (60 * 2), "/"); // 86400 = 1 day
			header('Location: index.php');
		} else {
			$error = '<div class="alert alert-danger" role="alert">
			<strong>ERROR!</strong> Check your username or password.
			</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dice game login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="body">
	<div class="container">
		<form method="POST" class="form-signin">
			<h2 class="form-signin-heading">Login</h2>
			<?php
			echo $error;
			?>
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text"  name="nickname" class="form-control" placeholder="Nickname" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password"  name="password" class="form-control" placeholder="Password" required>
			<button  class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			<a href="register.php" class="btn btn-lg btn-primary btn-block">Register</a>
		</form>
	</div>
</body>
</html>