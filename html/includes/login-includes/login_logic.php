<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../index.php');
    exit();
}
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    var_dump("fuck you");
    header("Location: ../../pages/login.php");
    exit();
}
session_start();
$username = $_POST["username"];
$password = md5($_POST["password"]);
try {
    require_once '../conn.php';

    $stmt = $connection->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}

if ($user && isset($user['user_id'], $user['roles'])) {
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user['user_id'];

    if ($user['roles'] < 10) {
        header("Location: ../../pages/dashboard.php");
    } else {
        header("Location: ../../pages/user-dashboard.php");
    }
} else {
    header("Location: ../../pages/login.php?error=invalid_credentials");
    exit();
}
?>
