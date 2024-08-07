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

<div class="main">
    <div class='login-container'>
        <div class='form-container'>
            <div class="form-header">
                <button class="active">Login</button>
                <button>Register</button>
            </div>
            <form class='form-login-tabel' action="../includes/login-includes/login_logic.php" name='login_logic'
                method="post">
                <label>Username:</label>
                <input type="text" name='username' placeholder="Username" required>
                <label>Password:</label>
                <input type="password" name='password' placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
            <a href='register.php'>register</a>
        </div>
        <div class="image-container">
            <img class="img-login" src="../assets/img-login.png" alt="">
        </div>
    </div>
</div>

<?php 
    include "../includes/footer.php";
?>
</body>
</html>
