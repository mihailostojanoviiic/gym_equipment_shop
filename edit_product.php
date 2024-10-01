<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
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
    <title>Izmeni Proizvod</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
          <a class="navbar-brand" href=""><img src="img/logo/logopngrsz2.png" alt="logo sajta"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link small-text" href="admin.php">Admin</a>
              </li>
            </ul>
            <ul class="navbar-nav me-0">
                  <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle small-text" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: auto;">
                            <li><a class="dropdown-item small-text p-1" href="php/logout.php">Odjavite se</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link small-text <?php echo ($current_page == 'login.php') ? 'active' : ''; ?>" href="login.php">Prijavite se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link small-text <?php echo ($current_page == 'register.php') ? 'active' : ''; ?>" href="register.php">Registrujte se</a>
                    </li>
                <?php endif; ?>
                    
              </ul>
          </div>
      </div>
  </nav>
  <div class="container mt-5">
        <h1 class="text-center">Izmeni proizvod</h1>
        <?php
        require_once 'php/db.php';

        if (isset($_GET['id'])) {
            $product_id = intval($_GET['id']);
            $sql = "SELECT p.*, pc.category_id 
                    FROM products p 
                    JOIN product_categories pc ON p.product_id = pc.product_id 
                    WHERE p.product_id = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Proizvod nije pronađen.";
                exit;
            }
        } else {
            echo "Neispravan ID proizvoda.";
            exit;
        }

        $categories_sql = "SELECT * FROM categories";
        $categories_result = $conn->query($categories_sql);

        $category_options = "";
        if ($categories_result->num_rows > 0) {
            while ($category = $categories_result->fetch_assoc()) {
                $selected = $category['category_id'] == $row['category_id'] ? 'selected' : '';
                $category_options .= '<option value="' . $category['category_id'] . '" ' . $selected . '>' . htmlspecialchars($category['name']) . '</option>';
            }
        }
        ?>
        <form action="php/edit_product_logic.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Ime Proizvoda</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Cena (RSD)</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars(number_format($row['price'], 2, ',', '.')); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Opis</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategorija</label>
                <select class="form-control" id="category" name="category_id" required>
                    <?php echo $category_options; ?>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sačuvaj Promene</button>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
