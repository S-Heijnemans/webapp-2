<?php
if (isset($_POST['reset-query-button'])) {
    echo "<meta http-equiv='refresh' content='0'>";
}
try {
    require_once "../includes/conn.php";

    $stmt = $connection->prepare("SELECT airport_name, airport_id, city_name, country_name 
    FROM (airports 
    LEFT JOIN city ON airports.city_id=city.city_id) 
    LEFT JOIN countries ON city.country_id=countries.country_id 
    ORDER BY airport_name");

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="search-for-flight-box">
    <form class="search_for_flight" action="../../pages/trips.php" method="post">
        <select name="starting_location" id="starting_location" required onchange="disableSameDestination()">
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
        <select name="destination" id="destination" required>
            <option value='' disabled selected>Destination</option>
            <?php
            foreach ($results as $row) {
                echo '<option value="' . ($row['airport_id']) . ' " </option>';
                echo htmlspecialchars($row['airport_name'] . " - " .
                    $row['city_name'] . " - " . $row['country_name']);
                echo '</option>';
            } ?>
        </select>
        <input type="date" name="start_date" id="startdate" required value="">
        <input type="date" name="end_date" id="enddate" required onfocus="this.showPicker()" value="">
        <button type="submit">Submit</button>
    </form>
    <form class="reset-query" action="../../pages/trips.php">
        <button type="submit" id="reset-query-button">RESET filter</button>
    </form>

</div>

<script src="../../js/sript.js"></script>
</body>
</html>