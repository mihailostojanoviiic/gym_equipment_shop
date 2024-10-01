<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>MS-GYM | Proizvodi</title>
</head>
<body>
  <?php include 'navigation.php';?>
  <div class="container mt-5">
            <div class="text-center mb-3">
                <h1>Proizvodi</h1>
            </div>
      <div class="d-flex justify-content-center mb-4">
        <button class="btn btn-dark me-2" onclick="filterProducts('svi')">Svi proizvodi</button>
        <button class="btn btn-dark me-2" onclick="filterProducts(1)">Kardio oprema</button>
        <button class="btn btn-dark me-2" onclick="filterProducts(2)">Oprema za snagu</button>
        <button class="btn btn-dark me-2" onclick="filterProducts(3)">Dodaci</button>
        <button class="btn btn-dark me-2" onclick="filterProducts(4)">Slobodni tegovi</button>
        <button class="btn btn-dark" onclick="filterProducts(5)">Funkcionalni trening</button>
      </div>
      <div class="row">
          <?php include 'php/display_products.php'; ?>
      </div>
  </div>
  <button onclick="scrollToTop()" id="scrollToTopBtn" class="text-dark">^</button>
  <?php include 'footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/toTopBtn.js"></script>
<script src="js/filter_products.js"></script>
</body>
</html>
