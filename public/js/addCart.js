document.addEventListener('DOMContentLoaded', function () {
    var cartIcon = document.querySelector('.fa-cart-shopping');

    var qty = cartIcon.dataset.qty;


    var cartQtySpan = document.getElementById('cartQty');

 
    if (cartQtySpan) {
        cartQtySpan.textContent = qty;
    }
});