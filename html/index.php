<?php
    include "pages/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body> 
<?php 
    include "pages/header.php";
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

    <form class='search-bar' action="search.php" name='search' method="POST">
                    <label>search:</label>
                    <input type="text" name='search' placeholder="Search" required>
                    <input type="submit" value="Search">
                </form>


    <script src="./js/main.jsx"></script>
</body>
</html> 