<?php
    include "conn.php";
    $countryId = $_GET['id'];

    $sql = "SELECT * FROM countries WHERE country_id = $countryId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
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
    <div class="container">
        <div class="hero-container-trips-info">
            <div class="image-box-hero-trips-info-trips-info">
                <?php
                    echo $result[0]['image_id'];
                ?>
                <div class="image-shadow-box-hero-trips-info"></div>
            </div>

            <div class="info-container-hero-trips-info">
                <div class="info-country-hero-trips-info">
                    <div class="info-title-country-hero-trips-info">
                        <h1>
                            <?php
                                echo $result[0]['country-name'];
                             ?>
                        </h1>
                    </div>
                    <div class="stile-line-info-country-hero-trips-info"></div>
                    <div class="info-text-country-hero-trips-info"></div>
                </div>

                <div class="facileties-info-hero-trips-info">

                </div>
            </div>
        </div>
    </div>
</body>
</html>