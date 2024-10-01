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
    <link rel="stylesheet" href="css/carousel.css">
    <title>MS-GYM | ADMIN</title>
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
        <h1 class="text-center">Upravljanje Proizvodima</h1>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Ime Proizvoda</th>
                    <th>Cena (RSD)</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'php/db.php';

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["price"]) . '</td>';
                        echo '<td>';
                        echo '<a href="edit_product.php?id=' . $row["product_id"] . '" class="btn btn-primary btn-sm">Izmeni</a> ';
                        echo '<a href="php/delete_product.php?id=' . $row["product_id"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Da li ste sigurni da želite da obrišete ovaj proizvod?\')">Ukloni</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-center">Nema proizvoda za prikaz.</td></tr>';
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <button onclick="scrollToTop()" id="scrollToTopBtn" class="text-dark">^</button>
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/toTopBtn.js"></script>
</body>
</html>
