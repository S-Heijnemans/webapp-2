<?php

    require 'conn.php';
    $search = $_POST['search'];
    $sql = "SELECT * FROM users_data WHERE voornaam LIKE '%$search%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

?>
<!DOCTYPE