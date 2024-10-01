<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>MS-GYM | Kontakt</title>
    <style>
        .list-unstyled li{
            padding: 1.5rem;
            border-bottom: 1px solid #343a40;
        }
        .list-unstyled li a{
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
  <?php include 'navigation.php';?>
  <?php
    require_once("php/db.php");
      $fullname='';
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
              $fullname=$first_name .' '. $last_name;
          
      }
  } 
  ?>
  <div class="container mt-5">
            <div class="text-center mb-5">
                <h1>Kontakt</h1>
            </div>
        <div class="row">
            <div class="col-6" data-aos="fade-up" data-aos-duration="800">
                <form action="" method="post">
                    <div class="mb-3">
                      <label for="name" class="form-label"><i class="fas fa-user"></i> Ime i prezime</label>
                      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Unesite Vaše ime i prezime" value="<?php echo htmlspecialchars($fullname); ?>">
                    </div>
                    <div class="mb-3">
                      <label for="e-mail" class="form-label"><i class="fas fa-envelope"></i> Email adresa</label>
                      <input type="text" class="form-control" id="e-mail" aria-describedby="emailHelp" placeholder="Unesite Vašu e-mail adresu" value="<?php echo htmlspecialchars($email); ?>" >
                    </div>
                    <div class="mb-3">
                      <label for="tel" class="form-label"><i class="fas fa-phone"></i> Telefon</label>
                      <input type="tel" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Unesite Vaš br. telefona">
                    </div>
                    <div class="mb-3">
                      <label for="subject" class="form-label"><i class="fas fa-heading"></i> Naslov poruke</label>
                      <input type="text" class="form-control" id="text" aria-describedby="emailHelp" placeholder="Unesite naslov Vaše poruke">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputMessage1" class="form-label"><i class="fas fa-edit"></i> Poruka</label>
                      <textarea class="form-control" id="exampleInputMessage1" rows="5" placeholder="Unesite tekst Vaše poruke"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                      <button id="contact-submit-btn" type="submit" class="btn btn-outline-dark"><i class="fas fa-paper-plane"></i> Pošalji</button>
                    </div>
                </form>
            </div>


            <div class="col-6" data-aos="fade-up" data-aos-duration="800">
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt"></i> Adresa: <span class="float-end">Vojvode Stepe 283, Vozdovac</span></li>
                    <li><i class="fas fa-phone"></i> Telefon: <span class="float-end"><a href="tel:+381602342022">060/234 2022</a></span></li>
                    <li><i class="fas fa-envelope"></i> E-mail: <span class="float-end"><a href="mailto:msgym@viser.edu.rs">msgym@gmail.com</a></span></li>
                </ul>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2832.615308930158!2d20.477877815534313!3d44.76825967909887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70f8dfe7c471%3A0xbc63da0229aab80b!2sVojvode%20Stepe%20283%2C%20Beograd!5e0!3m2!1sen!2srs!4v1676763989194!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
      </div>
  <button onclick="scrollToTop()" id="scrollToTopBtn" class="text-dark">^</button>
  <?php include 'footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/toTopBtn.js"></script>
<script src="js/filter_products.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
</body>
</html>
