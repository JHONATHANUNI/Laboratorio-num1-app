function addProduct() {
    var productDiv = document.querySelector('.product-item').cloneNode(true);
    document.getElementById('product-list').appendChild(productDiv);
}
