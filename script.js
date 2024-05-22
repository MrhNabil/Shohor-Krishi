// Add to cart functionality
let cart = [];

function addToCart(product, price) {
    let item = cart.find(i => i.product === product);
    if (item) {
        item.quantity++;
    } else {
        cart.push({ product, price, quantity: 1 });
    }
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartList = document.querySelector('.listCart');
    cartList.innerHTML = '';
    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.className = 'item';
        cartItem.innerHTML = `
            <img src="assets/${item.product.toLowerCase().replace(/\s+/g, '')}.jpg" alt="${item.product}">
            <div>${item.product}</div>
            <div>$${item.price.toFixed(2)}</div>
            <div class="quantity">
                <span onclick="changeQuantity('${item.product}', -1)">-</span>
                <span>${item.quantity}</span>
                <span onclick="changeQuantity('${item.product}', 1)">+</span>
            </div>
        `;
        cartList.appendChild(cartItem);
    });
    document.body.classList.add('showCart');
}

function changeQuantity(product, amount) {
    let item = cart.find(i => i.product === product);
    if (item) {
        item.quantity += amount;
        if (item.quantity <= 0) {
            cart = cart.filter(i => i.product !== product);
        }
        updateCartDisplay();
    }
}

function clearCart() {
    cart = [];
    updateCartDisplay();
}

function checkout() {
    alert('Checkout not implemented yet.');
}
