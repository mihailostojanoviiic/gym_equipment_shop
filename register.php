<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tobottom.css">
    <title>MS-GYM | Registruj se</title>
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
            <h2 class="fs-4 text-center">Registruj se</h2>
            <p class="text-center">Registruj svoj profil i kreni u kupovinu!</p>
            <br>
            <div class="login-wrapper text-center">
                <form method="POST" action="php/register.php">
                    <div class="mb-3">
                        <label class="form-label">Ime<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" name="first_name" placeholder="Ime" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prezime<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" name="last_name" placeholder="Prezime" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lozinka<span style="color: red;"> *</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                <button type="submit" class="btn btn-dark w-100 mt-3">Registruj se</button>
              </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>

      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/all.min.js"></script>
</body>
</html>