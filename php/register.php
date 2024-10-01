<?php
require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']),PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password, first_name, last_name) VALUES ('{$username}','{$email}','{$password}','{$first_name}','{$last_name}')";
    mysqli_query($conn,$sql);
    header("Location: ../login.php");

    
    mysqli_close($conn);
}
?>
