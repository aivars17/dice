<?php
header("Content-type:application/json");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dice";
session_start();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['win'])) {
        //įkeliamas vartotojas ir jo laimėjimas į duomenų baze
        $stmt = $conn->prepare("INSERT INTO stats (nickname, win, ip) VALUES (:nickname, :win, :ip)");
        $stmt->bindParam(':win', $_POST['win']);
        $stmt->bindParam(':nickname', $_SESSION['nickname']);
        $stmt->bindParam(':ip', $_SERVER['SERVER_ADDR']);
        $stmt->execute();
    // // echo a message to say the UPDATE succeeded
     echo $stmt->rowCount() . " records UPDATED successfully";
    } else if(isset($_GET['me'])) {
        //vartotojo prisijungusio laimėjimų gavimas
        $stmt = $conn->prepare("SELECT * FROM stats WHERE nickname = :nickname ORDER by time");
        $stmt->bindParam(':nickname', $_SESSION['nickname']);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }else if(isset($_GET['usersstats'])) {
        //visu vartotojų laimėjimų gavimas
        $stmt = $conn->prepare("SELECT * FROM stats");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else if(isset($_GET['top5'])) {
        //top 5 laimėjimai
        $stmt = $conn->prepare("SELECT * FROM stats ORDER by win DESC LIMIT 5");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    }else {
    }
}
    // Prepare statement
    
catch(PDOException $e)
    {
    echo $stmt . "<br>" . $e->getMessage();
    }
echo json_encode($response);
$conn = null;
?>