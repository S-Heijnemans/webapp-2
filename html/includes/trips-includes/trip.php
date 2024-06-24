<?php
try {
    $return_query = false;
    require_once "../includes/conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["starting_location"]) || empty($_POST["destination"])
            || empty($_POST["start_date"]) || empty($_POST["end_date"])) {
            $starting_location = null;
            $destination = null;
            $start_date = null;
            $end_date = null;
            exit();
        } else {
            $starting_location = $_POST["starting_location"];
            $destination = $_POST["destination"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $return_query = true;
        }
    }
    global $start_date, $end_date, $connection;
    try {
        $query = "SELECT f.*, da.airport_name as da_airport_name, aa.airport_name as aa_airport_name
                  FROM flights AS f
                  JOIN airports AS da ON f.departure_airport = da.airport_id
                  JOIN airports AS aa ON f.arrival_airport = aa.airport_id";

        if ($return_query) {
            $query .= " WHERE f.departure_airport = :starting_location 
                        AND f.arrival_airport = :destination 
                        AND DATE(f.flight_date) = :start_date 
                        AND DATE(f.retour_date) = :end_date";
        }

        $stmt = $connection->prepare($query);

        if ($return_query) {
            $stmt->bindParam(':starting_location', $starting_location);
            $stmt->bindParam(':destination', $destination);
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);
        }
        $stmt->execute();
        $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
<div class="flight-box-container">

    <?php
    if (!empty($flights)) {
        foreach ($flights as $flight) {
            $flight_start_date = date('Y-m-d', strtotime($flight['flight_date']));
            $flight_start_time = date('H:i', strtotime($flight['flight_date']));
            $flight_end_date = date('Y-m-d', strtotime($flight['retour_date']));
            $flight_end_time = date('H:i', strtotime($flight['retour_date']));

            echo "<div class='flight-box'>";
            echo "<div class='flight-data-box'>";
            echo "<div>" . htmlspecialchars($flight['da_airport_name']) . "</div>";
            echo "<div>" . htmlspecialchars($flight_start_date) . ", </div>";
            echo "<div>" . htmlspecialchars($flight_start_time) . "</div>";
            echo "</div>";
            echo "<div class='flight-data-box-to'>";
            echo "<h2> --> </h2>";
            echo "</div>";
            echo "<div class='flight-data-box'>";
            echo "<div>" . htmlspecialchars($flight['aa_airport_name']) . "</div>";
            echo "<div>" . htmlspecialchars($flight_end_date) . " , </div>";
            echo "<div>" . htmlspecialchars($flight_end_time) . "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        foreach ($flights as $flight) {
            $flight_start_date = date('Y-m-d', strtotime($flight['flight_date']));
            $flight_start_time = date('H:i', strtotime($flight['flight_date']));
            $flight_end_date = date('Y-m-d', strtotime($flight['retour_date']));
            $flight_end_time = date('H:i', strtotime($flight['retour_date']));

            echo "<div class='flight-box'>";
            echo "<div class='flight-data-box'>";
            echo "<div>" . htmlspecialchars($flight['da_airport_name']) . "</div>";
            echo "<div>" . htmlspecialchars($flight_start_date) . ", </div>";
            echo "<div>" . htmlspecialchars($flight_start_time) . "</div>";
            echo "</div>";
            echo "<div class='flight-data-box-to'>";
            echo "<h2> --> </h2>";
            echo "</div>";
            echo "<div class='flight-data-box'>";
            echo "<div>" . htmlspecialchars($flight['aa_airport_name']) . "</div>";
            echo "<div>" . htmlspecialchars($flight_end_date) . " , </div>";
            echo "<div>" . htmlspecialchars($flight_end_time) . "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>
</div>
</div>

</body>
</html>
