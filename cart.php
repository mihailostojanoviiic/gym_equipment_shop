<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/emptycart.css">
    <link rel="stylesheet" href="css/tobottom.css">
    <title>MS-GYM | Korpa</title>
</head>
<body>
  <?php 
  session_start();
  include 'navigation.php';
  require_once 'php/db.php';
  ?>
  <div class="container mt-3">
      <div class="row">
          <?php
          if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
              echo '<h2 class="fs-4 text-center mb-4">Vaša korpa</h2>';
              echo '<table class="table text-center">';
              echo '<thead>';
              echo '<tr>';
              echo '<th>Proizvod</th>';
              echo '<th>Količina</th>';
              echo '<th>Cena</th>';
              echo '<th>Ukupno</th>';
              echo '<th>Akcija</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';

              $total = 0;
              foreach ($_SESSION['cart'] as $product_id => $quantity) {
                  $sql = "SELECT * FROM products WHERE product_id = $product_id";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      $name = $row['name'];
                      $price = $row['price'];
                      $subtotal = $price * $quantity;
                      $total += $subtotal;
                      

                      echo '<tr>';
                      echo '<td>' . htmlspecialchars($name) . '</td>';
                      echo '<td>';
                      echo '<form action="php/update_cart.php" method="POST" style="display: inline-block;">';
                      echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
                      echo '<button type="button" class="btn btn-secondary btn-sm me-1" onclick="updateQuantity(' . $product_id . ', -1)">-</button>';
                      echo '<input type="number" name="quantity" value="' . $quantity . '" min="1" class="form-control d-inline-block me-1 pe-0" style="width: 60px; text-align:center;" readonly>';
                      echo '<button type="button" class="btn btn-secondary btn-sm me-1" onclick="updateQuantity(' . $product_id . ', 1)">+</button>';
                      echo '</form>';
                      echo '</td>';
                      echo '<td>' . htmlspecialchars($price) . ' RSD</td>';
                      echo '<td>' . htmlspecialchars($subtotal) . ' RSD</td>';
                      echo '<td><a href="php/remove_from_cart.php?id=' . $product_id . '" class="btn btn-danger btn-sm">Ukloni</a></td>';
                      echo '</tr>';
                  }
              }

              echo '<tr>';
              echo '<td colspan="3" class="text-end"><strong>Ukupno:</strong></td>';
              echo '<td colspan="2">' . htmlspecialchars($total) . ' RSD</td>';
              echo '</tr>';
              echo '</tbody>';
              echo '</table>';
              echo '<div class="d-flex justify-content-between px-0">';
              echo '<a href="proizvodi.php" class="btn btn-dark">Vrati se na proizvode</a>';
              echo '<a href="buy.php" class="btn btn-dark">Nastavi</a>';
              echo '</div>';
              $_SESSION['totalcart']=$total;
          } else {
            echo '
                  <div class="cart-empty">
                  <h2 class="fs-4 text-center">Vaša korpa</h2>
                    <div class="cart-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <p>Vaša korpa je trenutno prazna.</p>
                    <a href="proizvodi.php" class="return-link">Nazad u šoping!</a>
                  </div>';
          }
          ?>
      </div>
  </div>
  <?php include 'footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
<script>
    function updateQuantity(productId, change) {
        const form = document.querySelector(`input[name="product_id"][value="${productId}"]`).closest('form');
        const quantityInput = form.querySelector('input[name="quantity"]');
        let newQuantity = parseInt(quantityInput.value) + change;
        if (newQuantity < 1) newQuantity = 1;
        quantityInput.value = newQuantity;
        form.submit();
    }
</script>
</body>
</html>
