<?php
session_start();
include "../includes/register-includes/register_controller.php";
?>
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
<main class="main">
    <div class="log-in-title">
        <h1>Log in</h1>
    </div>
    <div class="login-container">
        <div class="login">
            <form class='register_form' name="register_logic" action="../includes/register-includes/register_logic.php"
                  method="POST">
                <div class="row">
                    <input type="text" placeholder="Username" name="username" required/>
                </div>

                <div class="row">
                    <input type="password" name="password" placeholder="Password" required id="myInput">
                </div>
                <div class="row">
                    <input type="email" placeholder="Email" name="email" required/>
                </div>
                <div class="row">
                    <input type="text" placeholder="First name" name="firstname" required/>
                </div>
                <div class="row">
                    <input type="text" placeholder="Last name" name="lastname" required/>
                </div>
                <div class="row">
                    <input type="submit" name="register" value='register'>
                </div>
            </form>
            <?php check_register_errors(); ?>
        </div>
    </div>
</main>
</body>