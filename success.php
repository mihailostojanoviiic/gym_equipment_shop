<?php
session_start();

unset($_SESSION['cart']);
unset($_SESSION['totalcart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tobottom.css">
    <title>MS-GYM | Uspešna Narudžbina</title>
    <style>
        .success-icon {
            font-size: 64px;
            color: #000000;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .success{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php include 'navigation.php'; ?>

    <div class="container success">
        <h2 class="fs-4 text-center">Narudžbina je uspešno kreirana!</h2>
        <div class="success-icon text-center">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <p class="text-center">Hvala vam što ste naručili kod nas. Vaša narudžbina je uspešno zavedena i biće obrađena uskoro.</p>
    </div>


    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
