<?php
session_start();
try {
    require_once '../includes/conn.php';

    $userId = $_SESSION['user_id'];
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $stmt = $connection->prepare("SELECT roles FROM user WHERE user_id = $userId");
    $stmt->execute();
    $role = $stmt->fetch();

} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());

}

if ($role['roles'] > 9) {
    header("Location: user-dashboard.php");
    exit();
}


$rolename = match ($role['roles']) {
    0 => "Owner",
    1 => "CEO",
    2 => "Dev",
    3 => "Employee",
    default => "Unknown role"
};

include "../includes/dashboard-includes/dashNav.php";
include "../includes/header.php";

echo "Welcome to the dashboard, " . $_SESSION['username'] . ".  You are a: " . $rolename;
echo "<br>";

// include "../includes/footer.php";
?>


    <a href='logout.php'>Click here to log out</a>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>


    </body>
    </html>


    <form action="../includes/user-delete-includes/user_delete_logic.php" name='user_delete_logic' method="POST">
        <label>delete user</label>
        <input type="text" name='user_id' placeholder="id" required>
        <input type="submit" value="Delete user">
    </form>


<?php
try {

    $stmt1 = $connection->prepare("SELECT * FROM accomodations");
    $stmt1->execute();
    $data = $stmt1->fetchAll();
} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}

echo "<table>
<tr>
<th> Name </th>
<th> Update </th>
<th> Delete </th>
<th> Add</th>
<tr>
";
foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td><a href='../includes/product-update-includes/product_update.php?id='" . $row['accomodation_id'] . "<a>Update</a></td>";
    echo "<td><a href='../includes/product-delete-includes/product_delete.php?id='" . $row['accomodation_id'] . "<a>Delete</a></td>";
    echo "<td><a href='../includes/product-includes/accomodation-form.php'<a>Accomodation</a></td>";
    echo "</tr>";
}
echo "</table>";


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
        <title>Geeks for geeks Image Upload</title>
    </head>


    <body>
    <h1>Upload Images</h1>

    <form method='post' action=''
          enctype='multipart/form-data'>
        <input type='file' name='files[]' multiple/>
        <input type='submit' value='Submit' name='submit'/>
    </form>

    <a href="../assets/uploads/view.php">|View Uploads|</a>
    </body>

    </html>


<?php
include "../includes/conn.php";

if (isset($_POST['submit'])) {

    // Count total files
    $countfiles = count($_FILES['files']['name']);

    // Prepared statement
    $query = "INSERT INTO images (image_url,image) VALUES(?,?)";

    $statement = $connection->prepare($query);

    // Loop all files
    for ($i = 0; $i < $countfiles; $i++) {

        // File name
        $filename = $_FILES['files']['name'][$i];

        // Location
        $target_file1 = '../assets/' . $filename;
        $target_file = '/assets/' . $filename;

        // file extension
        $file_extension = pathinfo(
            $target_file, PATHINFO_EXTENSION);

        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png", "jpeg", "jpg");

        if (in_array($file_extension, $valid_extension)) {

            // Upload file
            if (move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file1)
            ) {
                // Execute query
                $statement->execute(array($target_file, $filename));
            }
        }
    }

    echo "File upload successfully";
}
?>