<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check for required fields
    $requiredFields = ['city_id', 'max_tenants', 'beds_per_room', 'rooms', 'bathrooms', 'amount_of_toilets', 'name', 'price_per_night', 'adress', 'description'];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            header("Location: accomodation-form.php");
            die("Empty fields: " . $field);
        }
    }

    try {
        require_once "../conn.php";
        global $connection;

        // Ensure connection and city_id are available for the upload_image function
        $city_id = $_POST['city_id'];
        if (!empty($_POST['fileToUpload'])) {
            include_once "accomodation-form-model.php";
            upload_image($connection, $city_id);
        }

        // Initialize checkbox values
        $has_wifi = isset($_POST['has_wifi']) ? 1 : 0;
        $pool_nearby = isset($_POST['pool_nearby']) ? 1 : 0;
        $accessibility = isset($_POST['accessibility']) ? 1 : 0;
        $airco = isset($_POST['airco']) ? 1 : 0;
        $restaurant = isset($_POST['restaurant']) ? 1 : 0;

        // Assign values from POST request
        $max_tenants = $_POST['max_tenants'];
        $beds_per_room = $_POST['beds_per_room'];
        $rooms = $_POST['rooms'];
        $bathrooms = $_POST['bathrooms'];
        $amount_of_toilets = $_POST['amount_of_toilets'];
        $name = htmlspecialchars($_POST['name']);
        $price_per_night = $_POST['price_per_night'];
        $adress = htmlspecialchars($_POST['adress']);
        $description = htmlspecialchars($_POST['description']);

        $stmt = $connection->prepare("INSERT INTO accomodations (max_tenants, beds_per_room, rooms, bathrooms, toilets, wifi, pool_nearby, accessibility, airco, restaurant, name, price_per_night, adress, description, city_id) VALUES (:max_tenants, :beds_per_room, :rooms, :bathrooms, :toilets, :wifi, :pool_nearby, :accessibility, :airco, :restaurant, :name, :price_per_night, :adress, :description, :city_id)");

        $stmt->bindParam(':max_tenants', $max_tenants, PDO::PARAM_INT);
        $stmt->bindParam(':beds_per_room', $beds_per_room, PDO::PARAM_INT);
        $stmt->bindParam(':rooms', $rooms, PDO::PARAM_INT);
        $stmt->bindParam(':bathrooms', $bathrooms, PDO::PARAM_INT);
        $stmt->bindParam(':toilets', $amount_of_toilets, PDO::PARAM_INT);
        $stmt->bindParam(':wifi', $has_wifi, PDO::PARAM_INT);
        $stmt->bindParam(':pool_nearby', $pool_nearby, PDO::PARAM_INT);
        $stmt->bindParam(':accessibility', $accessibility, PDO::PARAM_INT);
        $stmt->bindParam(':airco', $airco, PDO::PARAM_INT);
        $stmt->bindParam(':restaurant', $restaurant, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price_per_night', $price_per_night, PDO::PARAM_STR);
        $stmt->bindParam(':adress', $adress, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':city_id', $city_id, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: ../../pages/dashboard.php");
        die("Successfully added a new accommodation!");

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
}
?>
