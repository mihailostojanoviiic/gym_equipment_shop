<?php
require_once("php/login.php");
$first_name = '';
$last_name = '';
$email='';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT first_name, last_name, email FROM users WHERE first_name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        
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
    <title>MS-GYM | Kupovina</title>
    <style>
        .buy-wrapper{
            max-width:60%;
        }
    </style>
</head>
<body>
    <?php include 'navigation.php';?>

    <div class="container mt-5 buy-wrapper">
        <h2 class="text-center">Potvrda kupovine</h2>
        <form action="php/process_order.php" method="POST">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Ime</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Prezime</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email adresa</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Grad</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postal_code">Poštanski broj</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="street">Ulica</label>
                        <input type="text" class="form-control" id="street" name="street" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="street_number">Broj ulice</label>
                        <input type="text" class="form-control" id="street_number" name="street_number" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="floor">Sprat</label>
                        <input type="text" class="form-control" id="floor" name="floor">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apartment_number">Broj stana</label>
                        <input type="text" class="form-control" id="apartment_number" name="apartment_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="intercom">Interfon</label>
                        <input type="text" class="form-control" id="intercom" name="intercom">
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <h4>Ukupno: <?php echo $_SESSION['totalcart']; ?> RSD </h4>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-dark">Potvrdi kupovinu</button>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>
