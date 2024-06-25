<?php
try {
    require_once "../conn.php";

    $stmt = $connection->prepare("SELECT ci.city_name, co.country_name
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
<form class='accomodation-form' name="accomodation-form" action="accomodation-form-controller.php" method="POST">
    <div class="row">
        <select name="city-name" required>
            <option value='' disabled selected>Choose city</option>
            <?php
            foreach ($city_name as $city) {
                echo '<option value="' . ($city['city_id']) . ' " ' . '</option>';
                echo htmlspecialchars($city['city_name'] . " - " . $city['country_name']);
                echo '</option>';
            }

            ?>
        </select>
    </div>

    <div class="row">
        <input type="number" name="max-tenants" placeholder="Max Tenants" required>
    </div>
    <div class="row">
        <input type="number" placeholder="Email" name="email" required/>
    </div>
    <div class="row">
        <input type="number" placeholder="First name" name="firstname" min="0"  max="10" required/>
    </div>
    <div class="row">
        <input type="number" placeholder="Last name" name="lastname" required/>
    </div>
    <div class="row">
        <input type="checkbox" name="register" value='register'>
    </div>
    <div class="row">
        <input type="checkbox" name="register" value='register'>
    </div>
    <div class="row">
        <input type="number" name="register" value='register'>
    </div>
    <div class="row">
        <input type="checkbox" name="register" value='register'>
    </div>
    <div class="row">
        <input type="checkbox" name="register" value='register'>
    </div>
<!--    <div class="row">-->
<!--        <input type="number" name="register" value='register'>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <input type="number" name="register" value='register'>-->
<!--    </div>-->
    <div class="row">
        <input type="text" name="register" value='register'>
    </div>
    <div class="row">
        <input type="range" name="register" value='register'>
    </div>
    <div class="row">
        <input type="text" name="register" value='register'>
    </div>
    <div class="row">
        <input type="text" name="register" value='register'>
    </div>
    <div class="row">
        <input type="image" name="register" value='register'>
    </div>
    <br>
    <div class="row">
        <input type="submit" name="register" value='register'>
    </div>

</form>
</body>
</html>