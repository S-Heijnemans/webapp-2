<?php
session_start();
$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$role = $_SESSION['user_roles'];

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


try {
    include "../includes/conn.php";
    $stmt = $connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
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
<div class="user-dashboard-container">
    <div class="profile-user-dashboard-container">
        <div class="profile-title-user-dashboard">
            <h1>My profile</h1>
        </div>
        <div class="image-user-container-user-dashboard">
            <image class="profile-img-user-dashboard">
                <img src="asdasd" alt="">
            </image>
            <div class="profile-username-info-user-dashboard">
                <?php
                echo $username;
                ?>
                <div class="role-profile-info-user-dashboard">
                    Customer
                </div>
            </div>
        </div>
        <table class="bookings">
            <tr>
                <th>Departure airport</th>
                <th>Arrival airport</th>
                <th>Order date</th>
                <th>Price</th>
                <th>Departure date</th>
                <th>Retour date</th>
                <th>Status</th>
            </tr>

            <?php
            $stmt = $connection->prepare("SELECT b.*, f.price, da.airport_name as da_airport_name, aa.airport_name as aa_airport_name, d_co.country_name as d_country_name, a_co.country_name as a_country_name
            FROM bookings AS b
            LEFT JOIN flights AS f ON b.flight_id = f.flight_id
            JOIN airports AS da ON f.departure_airport = da.airport_id
            JOIN airports AS aa ON f.arrival_airport = aa.airport_id
            JOIN city AS d_ci ON da.city_id = d_ci.city_id
            JOIN city AS a_ci ON aa.city_id = a_ci.city_id
            JOIN countries AS d_co ON d_ci.country_id = d_co.country_id
            JOIN countries AS a_co ON a_ci.country_id = a_co.country_id
            WHERE user_id = :user_id");

            $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $stmt->execute();
            $booking = $stmt->fetchAll(pdo::FETCH_ASSOC);

            foreach ($booking as $book) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($book["da_airport_name"]) . ", ". htmlspecialchars($book["d_country_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($book["aa_airport_name"]) .", " .htmlspecialchars($book["a_country_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($book["order_date"]) . "</td>";
                echo "<td>" . htmlspecialchars($book["price"]) . "</td>";
                echo "<td>" . htmlspecialchars($book["travel_begin_date"]) . "</td>";
                echo "<td>" . htmlspecialchars($book["travel_end_date"]) . "</td>";
                echo "<td>" . htmlspecialchars($book["status"]) . "</td>";
                echo "</tr>";


            }

            ?>

        </table>
    </div>

    <div class="profile-info-user-dashboard-container">

    </div>
</div>
</body>
</html>