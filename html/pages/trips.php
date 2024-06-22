<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["starting_location"])) {
        $starting_location = $_POST["starting_location"];
    }
    if (isset($_POST["destination"])) {
        $destination = $_POST["destination"];
    }
    if (isset($_POST["start_date"])) {
        $start_date = $_POST["start_date"];
    }
    if (isset($_POST["end_date"])) {
        $end_date = $_POST["end_date"];
    }
}

try {

    require_once "../includes/conn.php";

    $stmt = $connection->prepare("SELECT *  
    FROM flights 
    WHERE departure_airport=$starting_location AND arrival_airport=$destination
    AND flight_date=$start_date AND retour_date=$end_date");

    $stmt->execute();
    $results = $stmt->fetchAll();


} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
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
<?php
include "../includes/header.php";
?>
<?php
include "../includes/trips-includes/searchbar.php";

?>
<div class="flight_box">

</div>
<?php
include "../includes/footer.php";
?>
</body>
</html>