<?php


$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars(md5($_POST['password']));
$email = htmlspecialchars($_POST["email"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);

if (empty($username) || empty($password) ||
    empty($email) || empty($firstname) || empty($lastname)) {
    header("Location: ../register.php");
    die("Empty fields!");
}

function is_username_taken(string $username): bool
{
    global $connection;
    $stmt = $connection->prepare("SELECT username FROM user WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
function is_email_taken(string $email): bool
{
    global $connection;
    $stmt = $connection->prepare("SELECT email FROM user WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return true;
    } else {
        return false;
    }
}


try {
    require_once '../conn.php';

    $errors = [];

    if (is_username_taken($username)) {
        $errors["username_taken"] = "That username is already taken!";
    }
    if (is_email_taken($email)) {
        $errors["email_taken"] = "That email already assigned to an account!";
    }

    session_start();

    if($errors)
    {
        $_SESSION["errors_register"] = $errors;
        header("Location: ../../pages/register.php");
        die("Invalid");
    }
    $stmt = $connection->prepare("INSERT INTO user (username, password, email)  
    VALUES(?, ?, ?) ");
    $stmt->execute([$username, $password, $email]);

    $user_id = $connection->lastInsertId();

    $stmt2 = $connection->prepare("INSERT INTO userdata (userdata_id, first_name, last_name)  
    VALUES(?, ?, ?) ");
    $stmt2->execute([$user_id, $firstname, $lastname]);


} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}


header('location: ../../pages/login.php');
?>
