<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once 'conn.php';

        $search = $_POST['search'];
        $sql = "SELECT * FROM userdata WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }


} else {
    header("Location: ../index.php");
}
echo "<table>
<tr>
<th> First Name </th>
<th> Last Name </th>
<tr>
";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='../js/script.js'></script>
</head>
<body>
<?php

?>

</body>
</html>