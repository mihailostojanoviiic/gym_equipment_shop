<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $price = str_replace('.', '', $price);
    $price = str_replace(',', '.', $price);
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE product_id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        $category_sql = "UPDATE product_categories SET category_id='$category_id' WHERE product_id='$product_id'";
        $conn->query($category_sql);

        header("Location: ../admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
