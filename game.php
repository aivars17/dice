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
        $stmt = $conn->prepare("INSERT INTO stats (nickname, win) VALUES (:nickname, :win)");
        $stmt->bindParam(':win', $_POST['win']);
        $stmt->bindParam(':nickname', $_SESSION['nickname']);
    // // execute the query
     $stmt->execute();
    // // echo a message to say the UPDATE succeeded
     echo $stmt->rowCount() . " records UPDATED successfully";
    } else if(isset($_GET['me'])) {
        $stmt = $conn->prepare("SELECT * FROM stats WHERE nickname = :nickname ORDER by time");
        $stmt->bindParam(':nickname', $_SESSION['nickname']);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

    }
}
    // Prepare statement
    
catch(PDOException $e)
    {
    echo $stmt . "<br>" . $e->getMessage();
    }

$conn = null;

echo json_encode($response);
?>