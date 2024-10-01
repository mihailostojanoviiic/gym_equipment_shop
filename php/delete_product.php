<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $sql = "DELETE FROM products WHERE product_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
