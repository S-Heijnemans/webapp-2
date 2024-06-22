<?php
session_start();
if (empty($_POST['username']) || empty($_POST['password'])) {
    header("Location: ../../pages/login.php");
    exit();
}

$username = $_POST["username"];
$password = md5($_POST["password"]);

try {
    require_once '../conn.php';

    $stmt = $connection->prepare("SELECT * FROM user WHERE username=$username AND password=$password");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}

if (!$user) {
    header("Location: ../../pages/login.php");
} else {
    $_SESSION["username"] = $username;
    $_SESSION["user_id"] = $user["user_id"];
    if ($user["roles"] < 10) {
        header("Location: ../../pages/dashboard.php");
    } else {
        header("Location: ../../pages/user-dashboard.php");
    }
    // header("Location: ../../pages/dashboard.php");
}
?>
