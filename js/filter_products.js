function filterProducts(categoryId) {
    var products = document.querySelectorAll('.product-item');
    products.forEach(function(product) {
        if (categoryId === 'svi' || product.getAttribute('data-category') == categoryId) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}
