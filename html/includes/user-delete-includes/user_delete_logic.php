<?php
session_start();
include '../conn.php';

    $userid = $_POST["user_id"];

    $stmt = $connection->prepare("DELETE FROM user WHERE user_id=:user_id");
    $stmt->bindParam(":user_id", $userid);
    $stmt->execute();

        header("Location: ../../pages/dashboard.php");
?>