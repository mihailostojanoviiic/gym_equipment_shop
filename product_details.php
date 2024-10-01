<?php
require_once("php/db.php");
$product_name="";

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    $sql = "SELECT p.*, c.category_id, c.name as category_name 
              FROM products p 
              JOIN product_categories pc ON p.product_id = pc.product_id 
              JOIN categories c ON pc.category_id = c.category_id
              WHERE p.product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row["name"];
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tobottom.css">
    <title>MS-GYM | <?php echo htmlspecialchars($product_name); ?></title>
</head>
<body>
  <?php include 'navigation.php';?>
  <div class="container mt-3">
      <h2 class="fs-4 text-center">Detalji proizvoda</h2>
      <div class="row">
          <?php include 'php/product_details_logic.php'; ?>
      </div>
  </div>
  <?php include 'footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>
