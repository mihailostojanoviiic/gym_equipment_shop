<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
          <a class="navbar-brand" href="index.php"><img src="img/logo/logopngrsz2.png" alt="logo sajta"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link small-text <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Početna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link small-text <?php echo ($current_page == 'onama.php') ? 'active' : ''; ?>" href="onama.php">O nama</a>
              </li>
              <li class="nav-item">
                <a class="nav-link small-text <?php echo ($current_page == 'galerija.php') ? 'active' : ''; ?>" href="galerija.php">Galerija</a>
              </li>
              <li class="nav-item">
                <a class="nav-link small-text <?php echo ($current_page == 'proizvodi.php') ? 'active' : ''; ?>" href="proizvodi.php">Proizvodi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link small-text <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Kontakt</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                        <?php if ($cart_count > 0): ?>
                          <span class="badge bg-danger"><?php echo $cart_count; ?></span>
                        <?php endif; ?>
                        </a>
                    </li>
              </ul>
          </div>
      </div>
  </nav>
