<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name =trim($_POST['first_name']);
    $last_name =trim($_POST['last_name']);
    $email =trim($_POST['email']);
    $phone =trim($_POST['phone']);
    $city =trim($_POST['city']);
    $postal_code =trim($_POST['postal_code']);
    $street =trim($_POST['street']);
    $street_number =trim($_POST['street_number']);
    $floor =trim($_POST['floor']);
    $apartment_number =trim($_POST['apartment_number']);
    $intercom =trim($_POST['intercom']);
    $total = $_SESSION['totalcart'];

    $username = $_SESSION['username'];
    $user_sql = "SELECT user_id FROM users WHERE first_name = '$username'";
    $user_result = $conn->query($user_sql);

    if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();
        $user_id = $user_row['user_id'];

        $order_sql = "INSERT INTO orders (user_id, total, status) VALUES ('$user_id', '$total', 'pending')";
        if ($conn->query($order_sql) === TRUE) {
            $order_id = $conn->insert_id;

            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $order_items_sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
                $conn->query($order_items_sql);
            }

            header("Location: ../success.php");
        } else {
            echo "Greška pri kreiranju narudžbine: " . $conn->error;
        }
    } else {
        $_SESSION['error_message'] = "Morate biti ulogovani da biste izvršili kupovinu.";
        header("Location: ../force_login.php");
    }

    $conn->close();
}
?>
