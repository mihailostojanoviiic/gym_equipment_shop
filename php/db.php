<?php
$conn = mysqli_connect("localhost","root","","msgym");

if ($conn->connect_error) {
    die("Konekcija neuspešna: " . $conn->connect_error);
}

?>