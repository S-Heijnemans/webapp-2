<?php
try {
    $return_query = false;
    require_once "../includes/conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["starting_location"])) {

            exit();
        } else {
            $starting_location = $_POST["starting_location"];
            $destination = $_POST["destination"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $return_query = true;
        }
    }

    try {
        global $connection;
        $stmt = $connection->prepare("");

        $stmt->bindParam(':starting_location', $starting_location);

        $stmt->execute();
        $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }


} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}
?>