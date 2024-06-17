<?php
    include "includes/conn.php";
?>

<!DOCTYPE html>
<html l ang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;900&display=swap" rel="stylesheet">
     
</head>
<body> 
<?php 
    include "includes/header.php";
    include "includes/index-includes/hero.php";

    include "includes/index-includes/favorit.php";
    include "includes/index-includes/special_offer.php"
?>
     
    <div class="loadingbox">
        <div class="test">
            <div class="orb"></div>
        </div>
        <div class="test-1">
            <div class="orb"></div>
        </div>
        <div class="test-2">
            <div class="orb"></div>
        </div>
        <div class="test-3">
            <div class="orb"></div>
        </div>
        <div class="test-4">
            <div class="orb"></div>
        </div>
    </div>


    <div class="boxtitel">
    <h1 class="titel">Titel</h1>
    </div>
    <button onclick="warning();"> button</button>
    <button onmouseover="yeet();"> yeet</button>

    <form class='search-bar' action="pages/search.php" name='search' method="POST">
                    <label>search:</label>
                    <input type="text" name='search' placeholder="Search" required>
                    <input type="submit" value="Search">
                </form>
    <div class="login-button">
        <a href="pages/login.php">Login</a>
    </div>

    <a href="pages/trips.php">trips</a>
    <script src="./js/main.jsx"></script>
<?php 
    include "includes/footer.php";
?>
</body>
</html> 