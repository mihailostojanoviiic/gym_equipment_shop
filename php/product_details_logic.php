<?php
require_once("db.php");

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    $sql = "SELECT p.*, c.category_id, c.name as category_name 
              FROM products p 
              JOIN product_categories pc ON p.product_id = pc.product_id 
              JOIN categories c ON pc.category_id = c.category_id
              WHERE p.product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="col-md-6">';
        echo '    <img src="' . $row["image_url"] . '" class="img-fluid" alt="' . htmlspecialchars($row["name"]) . '">';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '    <h3>' . htmlspecialchars($row["name"]) . '</h3>';
        echo '    <p><strong>Kategorija: </strong>' . htmlspecialchars($row["category_name"]) . '</p>';
        echo '    <p><strong>Cena: </strong>' . htmlspecialchars($row["price"]) . ' RSD</p>';
        echo '    <p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '    <form action="php/cart.php" method="POST">';
        echo '        <input type="hidden" name="product_id" value="' . $product_id . '">';
        echo '        <input type="hidden" name="quantity" value="1">';
        echo '        <button type="submit" class="btn btn-dark">Dodaj u korpu</button>';
        echo '    </form>';
        echo '    <a href="proizvodi.php" class="btn btn-dark mt-2">Nazad na proizvode</a>';
        echo '</div>';
    } else {
        echo '<p>Proizvod nije pronađen.</p>';
    }

} else {
    echo '<p>Neispravan ID proizvoda.</p>';
}

$conn->close();
?>
