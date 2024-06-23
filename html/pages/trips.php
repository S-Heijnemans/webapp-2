<?php
try {
    require_once "../includes/conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["starting_location"]) || empty($_POST["destination"])
            || empty($_POST["start_date"]) || empty($_POST["end_date"])) {
            header("Location: trips.php");
        } else {
            $starting_location = $_POST["starting_location"];
            $destination = $_POST["destination"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }
    }
    try {
        $stmt1 = $connection->prepare(
            "SELECT f.*, da.airport_name as da_airport_name, aa.airport_name as aa_airport_name
                FROM flights AS f
                JOIN airports AS da ON f.departure_airport = da.airport_id
                JOIN airports AS aa ON f.arrival_airport = aa.airport_id"
        );

        $stmt1->execute();
        echo "<pre>";
        if ($stmt1->errorCode() != '00000') {
            print_r($stmt1->errorInfo());
        } else {
            echo "Query executed successfully.";
        }
        echo "</pre>";

        $flight_dates = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
    echo "<pre>";
    print_r($flight_dates);
    echo "</pre>";
    foreach ($flight_dates as $flight_datetime) {
        $flight_start_time = date('Y-m-d', strtotime($flight_datetime['flight_date']));
        $flight_end_time = date('Y-m-d', strtotime($flight_datetime['retour_date']));
        if ($flight_start_time == $start_date && $flight_end_time == $end_date) {
            echo "<h1>" . htmlspecialchars($flight_datetime['da_airport_name']) . "</h1>";
            echo "<h1>" . htmlspecialchars($flight_datetime['aa_airport_name']) . "</h1>";
            echo "<h1>" . htmlspecialchars($flight_datetime['flight_date']) . "</h1>";
            echo "<h1>" . htmlspecialchars($flight_datetime['retour_date']) . "</h1>";

        }
    }

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
<?php include "../includes/header.php"; ?>
<?php include "../includes/trips-includes/searchbar.php"; ?>
<?php
//if ($return_flights) {
//    echo "<pre>";
//    print_r($flights);
//    echo "</pre>";
//    foreach ($flights as $flight) {
//
//        echo "<div class='flight_box'>";
//        echo "<h1>" . htmlspecialchars($flight['airline']) . "</h1>";
//        echo "</div>";
//    }
//}
?>
<?php include "../includes/footer.php"; ?>

</body>
</html>