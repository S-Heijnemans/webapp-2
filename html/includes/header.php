<?php

// Your existing code here


// Your existing code here
// Ensure these session variables are set
$username = $_SESSION['username'] ?? null;
$role = $_SESSION['user_roles'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="header">
    <img src="../../assets/Logo.svg" alt="image not loading">
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a class="main-nav-link" href="../index.php">Home</a></li>
            <li><a class="main-nav-link" href="../pages/about_us.php">About us</a></li>
            <li><a class="main-nav-link-blue" href="../pages/trips.php">Trips</a></li>
            <li><a class="main-nav-link" href="../pages/contact.php">Contact</a></li>
        </ul>
    </nav>
    <div class="login-container-header">
        <img src="../../assets/globe-header.png" alt="image not loading">
        <?php
        if ($username) {
            if ($role !== null && $role < 10) {
                echo "<a class='login-box' href='../pages/dashboard.php'>Dashboard</a>";
            } else {
                echo "<a class='login-box' href='../pages/user-dashboard.php'>User Dashboard</a>";
            }
        } else {
            echo "<a class='login-box' href='../pages/login.php'>Login</a>";
        }
        ?>
    </div>
</header>
</body>
</html>
