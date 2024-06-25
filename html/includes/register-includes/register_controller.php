<?php
function check_register_errors(): void
{
    if (isset($_SESSION['errors_register'])) {
        $errors = $_SESSION['errors_register'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        echo "<br>";
        echo '<p> Want to log in instead? </p>';
        echo '<<a href="login.php">Login</a>';

        unset($_SESSION['errors_register']);
    }
}

?>
