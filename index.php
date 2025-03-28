<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Boots Store</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script>
        // Add product to cart
        function addToCart(productId, productName, productPrice, productImage) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProduct = cart.find(item => item.id === productId);

            if (existingProduct) {
                existingProduct.quantity += 1; // Increment quantity if product already exists
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    quantity: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${productName} has been added to your cart!`);
        }
    </script>
</head>
<body>
    <header>
        <h1>Welcome to the Black Boots Store</h1>
        <a href="cart.php" style="float: right; margin-right: 20px;">View Cart</a>
    </header>

    <main>
        <section class="product-list">
            <?php
            include 'functions.php';
            $products = getProducts();
            foreach ($products as $product) {
                echo "
                <div class='product'>
                    <img src='images/{$product['image']}' alt='{$product['name']}'>
                    <h2>{$product['name']}</h2>
                    <p>{$product['description']}</p>
                    <p>Price: ₦ {$product['price']}</p>
                    <button onclick=\"addToCart({$product['id']}, '{$product['name']}', {$product['price']}, '{$product['image']}')\">Add to Cart</button>
                </div>";
            }
            ?>
        </section>
    </main>
</body>
</html>

