<?php
require_once("db.php");

$sql = "SELECT p.*, c.category_id, c.name as category_name 
        FROM products p 
        JOIN product_categories pc ON p.product_id = pc.product_id 
        JOIN categories c ON pc.category_id = c.category_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-3 mb-3 product-item" data-category="' . $row["category_id"] . '">';
        echo '    <div class="card">';
        echo '        <img src="' . $row["image_url"] . '" class="card-img-top" alt="' . htmlspecialchars($row["name"]) . '">';
        echo '        <div class="card-body">';
        echo '            <hr>';
        echo '            <h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5>';
        echo '            <p class="card-text"><strong>Kategorija: </strong>' . htmlspecialchars($row["category_name"]) . '</p>';
        echo '            <p class="card-text"><strong>Cena: </strong>' . htmlspecialchars($row["price"]) . ' RSD</p>';
        echo '            <a href="product_details.php?id=' . $row["product_id"] . '" class="btn btn-dark">Detaljnije</a>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo '<p>Nema proizvoda za prikaz.</p>';
}

$conn->close();
?>