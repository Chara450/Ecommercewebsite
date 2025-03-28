<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Boots Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to the Black Boots Store</h1>
    </header>

    <main>
        <section class="product-list">
            <?php
            // Include PHP logic to fetch and display products
            include 'functions.php';
            $products = getProducts();
            foreach ($products as $product) {
                echo "
                <div class='product'>
                    <img src='images/{$product['image']}' alt='{$product['name']}'>
                    <h2>{$product['name']}</h2>
                    <p>{$product['description']}</p>
                    <p>Price: ₦ {$product['price']}</p>
                    <button>Add to Cart</button>
                </div>";
            }
            ?>
        </section>
    </main>
</body>
</html>

