<?php
require_once("php/login.php");
$cart_count = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tobottom.css">
    <title>MS-GYM | Prijava</title>
    <style>
        .login-wrapper{
            width: 35%;
            margin: 0px auto;
        }
    </style>
</head>
<body>
<?php include 'navigation.php';?>

    <div class="container mt-3">
        <h2 class="fs-4 text-center">Prijava</h2>
        <p class="text-center">Prijavi se na svoj profil i kreni u kupovinu!</p>
        <br>
        <div class="login-wrapper text-center">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username<span style="color: red;"> *</span></label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lozinka<span style="color: red;"> *</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <?php if ($errorMessage): ?>
                    <?php echo'<p style="color:red; font-size:12px;">'.$errorMessage.'</r>'; ?>
                <?php endif; ?>
                <button type="submit" class="btn btn-dark w-100 mt-3">Prijavi se</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
