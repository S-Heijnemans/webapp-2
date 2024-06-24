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
<div class="container-searchbar">
    <form class="search_for_flight" action="pages/trips.php" method="post">

        <select class="search-select-box-container"  name="starting_location" id="starting_location" onchange="disableSameDestination()">
            <option value='' disabled selected>Start location</option>
            <?php foreach ($results as $row): ?>
                <option value="<?php echo($row['airport_id']); ?>">
                    <?php echo htmlspecialchars($row['airport_name'] . " - " .
                        $row['city_name'] . " - " . $row['country_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select class="search-select-box-container"  name="destination" id="destination">
            <option value='' disabled selected>Destination</option>
            <?php foreach ($results as $row): ?>
                <option value="<?php echo($row['airport_id']); ?>">
                    <?php echo htmlspecialchars($row['airport_name'] . " - " .
                        $row['city_name'] . " - " . $row['country_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input class="search-select-box-container"  type="date" name="start_date" id="startdate" value="">
        <input class="search-select-box-container"  type="date" name="end_date" id="enddate" onfocus="this.showPicker()" value="">
        <button class="search-button-box" type="submit">Submit</button>
    </form>
</div>
<script src="../../js/sript.js"></script>
</body>
</html>