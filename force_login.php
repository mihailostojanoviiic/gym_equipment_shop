<?php
session_start();
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
</head>
<body>
    <?php include 'navigation.php';?>

    <div class="container mt-5">
        <h2 class="text-center">Prijava potrebna</h2>
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger text-center">
                <?php
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
                ?>
            </div>
        <?php endif; ?>
        <div class="text-center mt-3">
            <a href="login.php" class="btn btn-dark">Prijavite se</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
