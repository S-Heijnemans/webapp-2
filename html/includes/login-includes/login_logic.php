<?php
session_start();
include '../conn.php';

if(empty($_POST['username']) || empty($_POST['password'])) {
    header("Location: login.php");
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $connection -> prepare("SELECT * FROM user WHERE username=:user AND password=:pass");
$stmt->execute(['user'=> $username,'pass'=> $password]);
$user = $stmt->fetch();


if (!$user) {
    header("Location: login.php");
 } else {
    $_SESSION["user"] = $username;
    $_SESSION["user_id"] = $user["user_id"];

    header("Location: ../../pages/dashboard.php");
 }
?>
