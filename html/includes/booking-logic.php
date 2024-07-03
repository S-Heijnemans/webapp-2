<?php
session_start(); // Ensure session is started

$user_id = $_SESSION['user_id'] ?? null;
$role = $_SESSION['user_roles'] ?? null;


require_once "../includes/conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["flight_id"])) {
        header("location: ../pages/trips.php");
        die("haven't selected a flight");
    } else if (!isset($user_id)) {
        header("location: ../pages/login.php");
        die("Not logged in!");
    } else {
        $flight_id = $_POST["flight_id"];
    }
}

try {
    global $connection;

    $stmt = $connection->prepare("SELECT f.flight_date, f.retour_date, co.country_id 
        FROM flights AS f 
        LEFT JOIN airports AS a ON f.arrival_airport = a.airport_id
        LEFT JOIN city as ci ON a.city_id = ci.city_id
        LEFT JOIN countries as co ON ci.country_id = co.country_id
        WHERE f.flight_id = :flight_id");
    $stmt->bindParam(':flight_id', $flight_id, PDO::PARAM_INT);
    $stmt->execute();
    $flights = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() to get a single row

    if ($flights) {
        $stmt1 = $connection->prepare("INSERT INTO bookings (user_id, flight_id, country_id, travel_begin_date, travel_end_date)
            VALUES (:user_id, :flight_id, :country_id, :travel_begin_date, :travel_end_date)");
        $stmt1->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt1->bindParam(':flight_id', $flight_id, PDO::PARAM_INT);
        $stmt1->bindParam(':country_id', $flights['country_id'], PDO::PARAM_INT);
        $stmt1->bindParam(':travel_begin_date', $flights['flight_date'], PDO::PARAM_STR);
        $stmt1->bindParam(':travel_end_date', $flights['retour_date'], PDO::PARAM_STR);
        $stmt1->execute();

        if (isset($role) && $role < 10) {
            header("location: ../pages/dashboard.php");
            die("Booking successfully added!");
        } else {
            header("location: ../pages/user-dashboard.php");
            die("Booking successfully added!");
        }
    } else {
        header("location: ../pages/trips.php");
        die("Flight not found.");
    }

} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}
?>
