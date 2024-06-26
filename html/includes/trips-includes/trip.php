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
        $query = "SELECT f.*, da.airport_name as da_airport_name, aa.airport_name as aa_airport_name, ci.city_name, c.country_name, i.image_url, i.image
         FROM flights AS f
         JOIN airports AS da ON f.departure_airport = da.airport_id
         JOIN airports AS aa ON f.arrival_airport = aa.airport_id
         LEFT JOIN city AS ci ON aa.city_id = ci.city_id
         LEFT JOIN images AS i ON i.city_id = ci.city_id
         LEFT JOIN countries AS c ON ci.country_id = c.country_id";

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
<div class="main-container-trips-flights">
    <div class="title-flight-box">
        <h1>Trips</h1>
    </div>
    <div class="flight-box-container">

        <?php
        $i = 0;
        global $city_name;
        foreach ($flights as $flight) {

            $flight_start_date = date('Y-m-d', strtotime($flight['flight_date']));
            $flight_start_time = date('H:i', strtotime($flight['flight_date']));
            $flight_end_date = date('Y-m-d', strtotime($flight['retour_date']));
            $flight_end_time = date('H:i', strtotime($flight['retour_date']));


            echo "<div class='flight-box-item-container'>";

            echo "<div class='flight-box-top'>";

            echo "<image class='country-image'>";
            echo "<img src='" . htmlspecialchars($flights[$i]['image_url']) . "'" . "alt='" . htmlspecialchars($flights[$i]['image']) . "'" . ">";
            echo " </image>";

            echo "<div class='flight-box-middle'>";

            echo "<p>" . htmlspecialchars($flight['city_name']) . ", " . htmlspecialchars($flight['country_name']) . "</p>";
            echo "<div class='flight-box-prise-middle'>";
            echo "<p>" . htmlspecialchars($flight['price']) . "€" . "</p>";
            echo "</div>";
            echo "</div>";

            echo "</div>";

            echo "<div class='style-box-flight-box'>";

            echo "</div>";

            echo "<div class='flight-box'>";

            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu ante placerat, pellentesque metus a, imperdiet eros. Integer urna urna.";

            echo "</div>";

            echo "<div class='style-box-flight-box'>";

            echo "</div>";

            echo "<div class='button-flight-container'>";

            echo "<div class='button-flight-box'>";

            echo "<a> View detail </a>";

            echo "</div>";

//            echo "<form class='button-flight-box-color' action='../booking-logic.php' method='post'>";
//
////            echo "<a href='includes/booking-logic.php'> Book now </a>";
//            echo "<input type='button' name='" . $city_name . " '" . "><a href='../includes/booking-logic.php'> Book now </a></";
//
//            echo "<input type='submit' name='submit'>";

            echo "</div>";

            echo "<div class='button-flight-box-color'>";

            echo "<a> Book now </a>";

            echo "</form>";
            echo "</div>";

            $i = $i + 1;
        }

        ?>
    </div>


    <div class="stile-line-flight"></div>

    <div class="title-flight-box">
        <h1>Flights</h1>
    </div>
    <div class="flight-box-container">

        <?php

        foreach ($flights as $flight) {
            $flight_start_date = date('Y-m-d', strtotime($flight['flight_date']));
            $flight_start_time = date('H:i', strtotime($flight['flight_date']));
            $flight_end_date = date('Y-m-d', strtotime($flight['retour_date']));
            $flight_end_time = date('H:i', strtotime($flight['retour_date']));


            echo "<div class='flight-box-item-container'>";

            echo "<div class='flight-box-top'>";

            echo "<image class='country-image'>";
            echo "<img src='" . htmlspecialchars($flight['image_url']) . "'" . "alt='" . htmlspecialchars($flight['image']) . "'" . ">";
            echo "</image>";

            echo "<div class='flight-box-middle'>";

            echo "<p>" . htmlspecialchars($flight['city_name']) . ", " . htmlspecialchars($flight['country_name']) . "</p>";
            echo "<div class='flight-box-prise-middle'>";
            echo "<p>" . htmlspecialchars($flight['price']) . "€" . "</p>";
            echo "</div>";
            echo "</div>";

            echo "</div>";

            echo "<div class='style-box-flight-box'>";

            echo "</div>";

            echo "<div class='flight-box'>";

            echo "<div class='flight-data-box'>";

            echo "<p>" . htmlspecialchars($flight['da_airport_name']) . "</p>";
            echo "<p>" . htmlspecialchars($flight_start_date) . ", </p>";
            echo "<p>" . htmlspecialchars($flight_start_time) . "</p>";

            echo "</div>";

            echo "<div class='flight-data-box-to'>";

            echo "<h2> --> </h2>";

            echo "</div>";

            echo "<div class='flight-data-box'>";

            echo "<p>" . htmlspecialchars($flight['aa_airport_name']) . "</p>";
            echo "<p>" . htmlspecialchars($flight_end_date) . " , </p>";
            echo "<p>" . htmlspecialchars($flight_end_time) . "</p>";

            echo "</div>";

            echo "</div>";

            echo "<div class='style-box-flight-box'>";

            echo "</div>";

            echo "<div class='button-flight-container'>";

            echo "<div class='button-flight-box'>";

            echo "<a> View detail </a>";

            echo "</div>";

            echo "<div class='button-flight-box-color'>";

            echo "<a> Book now </a>";

            echo "</div>";

            echo "</div>";

            echo "</div>";
        }

        ?>
    </div>
</div>
</div>
</body>
</html>
