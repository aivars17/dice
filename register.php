<?php 
$conn = new PDO("mysql:host=localhost;dbname=dice;charset=utf8", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Tikrinama ar sutampa slaptažodiai ir neegzistuoja jau toks nickname.
if (isset($_POST['form_nickname']) && $_POST['form_password'] == $_POST['form_password_re']) {
	$userscheck = $conn->prepare("SELECT * FROM users where nickname = :nickname ");
	$userscheck->bindParam(':nickname', $_POST['form_nickname']);
	$userscheck->execute();
	
	if(!empty($userscheck->fetch(PDO::FETCH_ASSOC))){
		$error[] = "Username already exists";
	}else {  
		//jei atitinka salygas įkelemi vartotojo duomenis
		$statement = $conn->prepare("INSERT INTO users (nickname, name, surname, age, password)
			VALUES (:nickname, :name, :surname, :age, :password)");
		$statement->bindParam(':nickname', $_POST['form_nickname']);
		$statement->bindParam(':name', $_POST['form_name']);
		$statement->bindParam(':surname', $_POST['form_surname']);
		$statement->bindParam(':age', $_POST['form_age']);
		$hash = password_hash($_POST['form_password'], PASSWORD_DEFAULT);
		$statement->bindParam(':password', $hash);
		$statement->execute();
		header('Location: login.php');
	}
}
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dice game register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="body" class="indexbody">
	<div class="container">
		<form method="POST" class="form-signin">
			<h2 class="form-signin-heading">Register</h2>
			<label for="inputEmail" class="sr-only">Nickname</label>
			<input type="text" id="form_nickname" name="form_nickname" class="form-control" placeholder="Nickname" required autofocus>
			<label for="inputEmail" class="sr-only">Name</label>
			<input type="text" id="form_name" name="form_name" class="form-control" placeholder="Name" required autofocus>
			<label for="inputEmail" class="sr-only">Surname</label>
			<input type="text" id="form_surname" name="form_surname" class="form-control" placeholder="Surname" required autofocus>
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text" id="form_age" name="form_age" class="form-control" placeholder="Age" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="form_password" name="form_password" class="form-control" placeholder="Password" required>
			<input onkeyup="checkpass()" type="password" id="form_password_re" name="form_password_re" class="form-control" placeholder="Re-password" required>
			<div id="error"></div>
			<button disabled id="reg" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
			<a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
		</form>
	</div>
	<script src="js/regscript.js"></script>
</body>
</html>