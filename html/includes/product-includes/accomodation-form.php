<?php
try {
    require_once "../conn.php";

    $stmt = $connection->prepare("SELECT ci.city_id, ci.city_name, co.country_name
    FROM city AS ci
    INNER JOIN countries AS co ON ci.country_id = co.country_id");

    $stmt->execute();
    $city_name = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
<form class='accomodation-form' name="accomodation-form" action="accomodation-form-controller.php" method="POST"
      enctype="multipart/form-data">
    <!--    <div class="row">-->
    <!--        <label>City location:</label>-->
    <!--        <select name="city_id" required>-->
    <!--            <option value='' disabled selected>Choose city</option>-->
    <!--            --><?php
    //            foreach ($city_name as $city) {
    //                echo "<option value='" . $city['city_id'] . "'" . "> ";
    //                echo htmlspecialchars($city['city_name'] . " - " . $city['country_name'] . $city["city_id"]);
    //                echo '</option>';
    //            }
    //            ?>
    <!--        </select>-->
    <!--    </div>-->


    <!--    <div class="row">-->
    <!--        <label>Max tenants</label>-->
    <!--        <input type="number" name="max_tenants" min="1" max="99" required>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Beds per room</label>-->
    <!--        <input type="number" name="beds_per_room" min="1" max="9" required/>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Amount of rooms</label>-->
    <!--        <input type="number" name="rooms" min="1" max="99" required/>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Amount of bathrooms</label>-->
    <!--        <input type="number" name="bathrooms" min="1" max="9" required/>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Amount of toilets</label>-->
    <!--        <input type="number" name="amount_of_toilets" value='' min="1" max="9" required>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Has wifi</label>-->
    <!--        <input type="checkbox" name="has_wifi" value='0'>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Pool is nearby</label>-->
    <!--        <input type="checkbox" name="pool_nearby" value='0'>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Is accessible</label>-->
    <!--        <input type="checkbox" name="accessibility" value='0'>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Has airco</label>-->
    <!--        <input type="checkbox" name="airco" value='0'>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Has restaurant</label>-->
    <!--        <input type="checkbox" name="restaurant" value='0'>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Accomodation name</label>-->
    <!--        <input type="text" name="name" value='' required>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Price per night</label>-->
    <!--        <input type="number" name="price_per_night" value='' step="0.01" min="0.00" max="10000000000.00" required>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Adress</label>.-->
    <!--        <input type="text" name="adress" value='' required>-->
    <!--    </div>-->
    <!--    <div class="row">-->
    <!--        <label>Description</label>-->
    <!--        <input type="text" name="description" value='' required>-->
    <!--    </div>-->
    <div class="row">
        <label>image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <br>
    <div class="row">
        <input type="submit" name="submit" value='Add accomodation'>
    </div>

</form>
</body>
</html>