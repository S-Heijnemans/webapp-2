<?php
try {
    require_once "includes/conn.php";
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
<!--TEMP SEARCH for REAL SEARCH
<form class='search-bar' action="includes/search.php" name='search' method="POST">
    <label>search:</label>
    <input type="text" name='search' placeholder="Search" required>
    <input type="submit" value="search">
</form>
-->


<?php
include "includes/header.php";
?>

<?php
include "includes/index-includes/hero.php";

?>
<?php
include "includes/index-includes/search_bar.php";
?>


<!--<form class='search-bar' action="includes/search.php" name='search' method="POST">-->
<!--    <label>search:</label>-->
<!--    <input type="text" name='search' placeholder="Search" required>-->
<!--    <input type="submit" value="search">-->
<!--</form>-->
<?php
include "includes/index-includes/favorit.php";
?>
<?php
include "includes/index-includes/special_offer.php"
?>





<?php
include "includes/footer.php";
?>
<script src="js/main.jsx"></script>

</body>
</html> 