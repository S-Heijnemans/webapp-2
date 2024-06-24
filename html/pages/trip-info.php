<?php
if ( $_SERVER['REQUEST_METHOD'] != 'GET')
{
    header("Location:trips.php");
}
if (isset($_GET['country_id'])) {
    $country_id = $_GET['country_id'];
} else {
    echo "Something went wrong!? returning back...";

    header("Location: /trips.php");
    exit();
}

try {
    include "../includes/conn.php";

    global $connection;

    $sql = "SELECT c.*, i.image_url, i.image
    FROM countries as c
    RIGHT JOIN images as i ON i.country_id = c.country_id
    WHERE c.country_id = :country_id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":country_id", $country_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<?php
include "../includes/header.php";
?>
<div class="container">
    <div class="hero-container-trips-info">
        <div class="image-box-hero-trips-info-trips-info">
            <?php
            {
                echo $result[0]['country_name'];
            }

            ?>
            <div class="image-shadow-box-hero-trips-info"></div>
        </div>

        <div class="info-container-hero-trips-info">
            <div class="info-country-hero-trips-info">
                <div class="info-title-country-hero-trips-info">
                    <?php
                    foreach ($result as $row) {
                        echo "<image>";
                        echo "<img src='" . $row['image_url'] . "'" . "alt='" . $row['image'] . "'" . ">";
                        echo "</image>";
                    }
                    ?>


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