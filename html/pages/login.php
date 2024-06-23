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

<div class='container'>
        <div class='block-login'>
              <form class='form-login-tabel' action="../includes/login-includes/login_logic.php" name='login_logic' method="post">
                    <label>Username:</label>
                    <input type="text" name='username' placeholder="Username" required>
                    <label>Password:</label>
                    <input type="password" name='password' placeholder="Password" required>
                    <input type="submit" value="Login">
                </form>
                <a href='register.php'>register</a>
        </div>
</div>
<?php 
    include "../includes/footer.php";
?>
</body>
</html>
