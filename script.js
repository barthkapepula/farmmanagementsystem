var cart = [];

function addToCart(item, price) {
    cart.push({ item: item, price: price });
    updateCart();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function updateCart() {
    var cartItemsElement = document.getElementById("cartItems");
    var totalPriceElement = document.getElementById("totalPrice");
    var cartList = "";
    var total = 0;

    for (var i = 0; i < cart.length; i++) {
        cartList += `<div class="cart-item">
                        <span>${cart[i].item} - ${cart[i].price} ZMW</span>
                        <button onclick="removeFromCart(${i})">Remove</button>
                    </div>`;
        total += cart[i].price;
    }

    cartItemsElement.innerHTML = cartList;
    totalPriceElement.innerHTML = total;
}

function checkout() {
    // Implement your checkout logic here
    // This could involve sending the cart data to the server for further processing (e.g., payment)
    alert("Checkout complete!");
}

// Additional functions (searchProducts, displayProducts, and showSlides)...
