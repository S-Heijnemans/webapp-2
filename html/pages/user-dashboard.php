<?php
session_start();
     include "../includes/conn.php";

     $userId = $_SESSION['user_id'];
     
    $sql = "SELECT * FROM user WHERE user_id = $userId";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
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
                <div class="profile-img-user-dashboard">
                    
                </div>
                <div class="profile-username-info-user-dashboard">
                    <?php
                        echo $result[0]['username'];
                    ?>
                    <div class="role-profile-info-user-dashboard">
                    <a>customer</a>
                    </div>     
                </div>

            </div>
        </div>

        <div class="profile-info-user-dashboard-container">

        </div>
    </div>
</body>
</html>