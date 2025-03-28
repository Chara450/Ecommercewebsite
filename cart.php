<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Load cart items from localStorage
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartContainer = document.getElementById('cart-items');
            cartContainer.innerHTML = '';

            if (cart.length === 0) {
                cartContainer.innerHTML = '<p>Your cart is empty.</p>';
                return;
            }

            cart.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <img src="images/${item.image}" alt="${item.name}" style="width: 100px; height: auto;">
                    <div>
                        <h3>${item.name}</h3>
                        <p>Price: ₦ ${item.price}</p>
                        <p>Quantity: ${item.quantity}</p>
                        <button onclick="removeFromCart(${item.id})">Remove</button>
                    </div>
                `;
                cartContainer.appendChild(cartItem);
            });
        }

        // Remove item from cart
        function removeFromCart(productId) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(item => item.id !== productId);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        // Clear the entire cart
        function clearCart() {
            localStorage.removeItem('cart');
            loadCart();
        }

        document.addEventListener('DOMContentLoaded', loadCart);
    </script>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
        <a href="index.php" style="float: right; margin-right: 20px;">Back to Store</a>
    </header>

    <main>
        <section id="cart-items"></section>
        <button onclick="clearCart()">Clear Cart</button>
    </main>
</body>
</html>