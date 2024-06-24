<?php
try {
    require_once "includes/conn.php";

    $stmt = $connection->prepare("SELECT airport_name, airport_id, city_name, country_name 
    FROM (airports 
    LEFT JOIN city ON airports.city_id=city.city_id) 
    LEFT JOIN countries ON city.country_id=countries.country_id 
    ORDER BY airport_name");

    $stmt->execute();
    $results = $stmt->fetchAll();


} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class="search_for_flight" action="pages/trips.php" method="post">

    <select name="starting_location" id="starting_location" onchange="disableSameDestination()">
        <option value='' disabled selected>Start location</option>
        <?php
        foreach ($results as $row) {
            echo '<option value="' . ($row['airport_id']) . ' " </option>';
            echo htmlspecialchars($row['airport_name'] . " - " .
                $row['city_name'] . " - " . $row['country_name']);
            echo '</option>';
        }

        ?>
    </select>
    <select name="destination" id="destination">
        <option value='' disabled selected>Destination</option>
        <?php
        foreach ($results as $row) {
            echo '<option value="' . ($row['airport_id']) . ' " </option>';
            echo htmlspecialchars($row['airport_name'] . " - " .
                $row['city_name'] . " - " . $row['country_name']);
            echo '</option>';
        } ?>
    </select>
    <input type="date" name="start_date" id="startdate" value="">
    <input type="date" name="end_date" id="enddate" onfocus="this.showPicker()" value="">
    <button type="submit">Submit</button>
</form>
<script src="../../js/sript.js"></script>
</body>
</html>