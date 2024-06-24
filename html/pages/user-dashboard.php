<?php
session_start();
$userId = $_SESSION['user_id'];

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

try {
    include "../includes/conn.php";
    $stmt = $connection->prepare("SELECT * FROM user WHERE user_id = $userId");
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}


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

<div class="user-dashboard-container">
    <div class="profile-user-dashboard-container">
        <div class="profile-title-user-dashboard">
            <h1>My profile</h1>
        </div>
        <div class="image-user-container-user-dashboard">
            <image class="profile-img-user-dashboard">
                <img src="$Result[0]['profile_img']"  alt="">
            </image>
            <div class="profile-username-info-user-dashboard">
                <?php
                echo $result[0]['username'];
                ?>
                <div class="role-profile-info-user-dashboard">
                    Customer
                </div>
            </div>
        </div>
    </div>

    <div class="profile-info-user-dashboard-container">

    </div>
</div>
</body>
</html>