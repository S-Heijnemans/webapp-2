<?php
session_start();
include '../conn.php';

if (empty($_POST["username"]) || empty($_POST["password"])) {
    header("Location: register_logic.php");
    exit();
}

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    $stmt = $connection->prepare("INSERT INTO user (username, password, email) 
    VALUES(:user, :pass, :mail)");
    $stmt->bindParam(":user", $username);
    $stmt->bindParam(":pass", $password);
    $stmt->bindParam(":mail", $email);
    $stmt->execute();

header('location: ../../pages/login.php');
?>