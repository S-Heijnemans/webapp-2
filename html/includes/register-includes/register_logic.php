<?php
session_start();

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars(md5($_POST['password']));
$email = htmlspecialchars($_POST["email"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);

if (empty($username) || empty($password) ||
    empty($email) || empty($firstname) || empty($lastname)) {
    header("Location: ../register.php");
    die();
}



try {
    require_once '../conn.php';

    $stmt = $connection->prepare("INSERT INTO user (username, password, email)  
VALUES(?, ?, ?) ");
    $stmt->execute([$username, $password, $email]);
    $user_id = $connection->lastInsertId();



    $stmt2 = $connection->prepare("INSERT INTO userdata (userdata_id, first_name, last_name)  
VALUES(?, ?, ?) ");
    $stmt2->execute([$user_id, $firstname, $lastname]);

} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}


header('location: ../../pages/login.php');
?>
