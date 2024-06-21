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

    <div class="dashboard-balk-user-dashboard">
        <h1>DASHBOARD</h1>
    </div>
    <div class="user-dashboard-container">
        <div class="profile-user-dashboard-container">
            <div class="profile-title-user-dashboard">
                <h1>My profile</h1>
            </div>
            <div class="image-user-container-user-dashboard">
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
            <div class="edid-info-box-user-dashboard">
                <a>edit information</a>
                <img src="../../assets/pencil-user-dashboard.png" alt="image not loading">
            </div>
            <table class="table-info-user-dashboard">
                <th></th>
            </table>
        </div>
    </div>
</body>
</html>