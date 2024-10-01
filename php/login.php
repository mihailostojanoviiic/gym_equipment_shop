<?php
require_once("db.php");
session_start();

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $result=mysqli_query($conn,$sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['username'] = $user['first_name'];

            if ($username === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit;
        } else {
            $errorMessage = 'Pogrešna lozinka.';
        }
    } else {
        $errorMessage = 'Korisnik ne postoji.';
    }

    mysqli_close($conn);
}
?>