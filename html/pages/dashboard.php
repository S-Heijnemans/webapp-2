<?php 
    session_start();
    include '../includes/conn.php';
    include "../includes/header.php";

    include "../includes/dashboard-includes/dashNav.php";



if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome to the dashboard, " . $_SESSION['user'];
    
    // include "../includes/footer.php";
?> 



    <a href='logout.php'>Click here to log out</a>

    <?php

    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
?>

<?php     include "../includes/add-product-includes/add_product.php";
?>


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
    <input type="submit" value="register">
</form>




<?php
include '../includes/conn.php';
$stmt = $connection->prepare("SELECT * FROM accommodations");
$stmt->execute();
$data = $stmt->fetchAll();

foreach ($data as $row) {
    echo $row['name'];
    echo "<a href='../includes/product-update-includes/product_update.php?id=".$row['accommodation_id']."'>Update</a>";
    echo "<a href='../includes/product-delete-includes/product_delete.php?id=".$row['accommodation_id']."'>Delete</a>";
    }
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
		<input type='file' name='files[]' multiple />
		<input type='submit' value='Submit' name='submit' />
	</form>

	<a href="../assets/uploads/view.php">|View Uploads|</a>
</body>

</html>
