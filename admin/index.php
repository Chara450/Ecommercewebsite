<?php
require '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Upload image to the images directory
    $targetDir = "../images/";
    $targetFile = $targetDir . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        addProduct($name, $description, $price, $image);
    } else {
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Product</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Panel - Add Product</h1>
    </header>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Price (₦):</label>
            <input type="number" id="price" name="price" required>

            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Add Product</button>
        </form>
    </main>
</body>
</html>