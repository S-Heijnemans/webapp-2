<?php
    require 'conn.php';
    $search = $_POST['search'];
    $sql = "SELECT * FROM users_data WHERE voornaam LIKE '%$search%'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dummy_result = 'username'
    if($dummyresult){
        ?>
            <script>
                popUpNotifiction('we hebben gezocht', 'succes');
            </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='../js/script.js'></script>
</head>
<body>
    <?php

    ?>
    
</body>
</html>