<?php 
    session_start();
    include "../includes/header.php";

    include "../includes/dashboard-includes/dashNav.php";



if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome to the dashboard, " . $_SESSION['username'];
    
    // include "../includes/footer.php";
?> 



    <a href='logout.php'>Click here to log out</a>

    <?php

    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



</body>
</html>