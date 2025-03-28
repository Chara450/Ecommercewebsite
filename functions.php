<?php
require 'db/connection.php';

// Create: Add a new product
function addProduct($name, $description, $price, $image) {
    require_once 'db/connection.php';
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $description, $price, $image);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Read: Get all products
require 'db/connection.php';

// Create: Add a new product
function addProduct($name, $description, $price, $image) {
    require_once 'db/connection.php';
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $description, $price, $image);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Read: Get all products
function getProducts() {
    return [
        [
            'id' => 1,
            'name' => 'Classic Black Boots',
            'description' => 'Timeless design for everyday wear.',
            'price' => 10000,
            'image' => 'boot1.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Suede Black Boots',
            'description' => 'Premium Suede boots for a stylish look.',
            'price' => 12000,
            'image' => 'boot2.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Classic Black Boots',
            'description' => 'stony Designs and for office use.',
            'price' => 12900,
            'image' => 'boot3.jpg'
        ],
		[
            'id' => 4,
            'name' => 'Combat Black Boots',
            'description' => 'Durable and rugged for outdoor adventures.',
            'price' => 12900,
            'image' => 'boot4.jpg'
        ],
		[
            'id' => 5,
            'name' => 'Suede Black Boots',
            'description' => 'Comfortable and easy go to.',
            'price' => 13000,
            'image' => 'boot5.jpg'
        ],
		[
            'id' => 6,
            'name' => 'Vintage Black Boots',
            'description' => 'Unique rugged for outdoor adventures.',
            'price' => 10000,
            'image' => 'boot6.jpg'
        ],
		[
            'id' => 7,
            'name' => 'Classic Black Boots',
            'description' => 'High boots for boss ladies.',
            'price' => 9500,
            'image' => 'boot7.jpg'
        ],
		[
            'id' => 8,
            'name' => 'Low Black Boots',
            'description' => 'Comfy Suedes for all',
            'price' => 14000,
            'image' => 'boot8.jpg'
        ],
		[
            'id' => 9,
            'name' => 'Combat Black Boots',
            'description' => 'Durable and rugged for outdoor adventures.',
            'price' => 16000,
            'image' => 'boot9.jpg'
        ],
		[
            'id' => 10,
            'name' => 'Low Black Boots',
            'description' => 'Suede and shiny for both adventures.',
            'price' => 14000,
            'image' => 'boot10.jpg'
        ]
    ];
}
?>
