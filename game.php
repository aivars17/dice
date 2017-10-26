<?php
header("Content-type:application/json");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dice";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['win'])) {
       $stmt = $conn->prepare("UPDATE users SET win=:win WHERE id=2");
       $stmt->bindParam(':win',$_GET['win']);
    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
    }

    // Prepare statement
    $response['users'] = $stmt->fetch(PDO::FETCH_ASSOC);
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;





echo json_encode($users);
?>