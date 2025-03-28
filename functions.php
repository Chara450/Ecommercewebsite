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
function getProducts() {
    error_log("getProducts");
    $conn = connectDB();
    $result = $conn->query("SELECT * FROM products");

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    $conn->close();
    return $products;
}

// Update: Update a product
function updateProduct($id, $name, $description, $price, $image) {
    $conn = connectDB();
    $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
    $stmt->bind_param("ssisi", $name, $description, $price, $image, $id);

    if ($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Delete: Delete a product
function deleteProduct($id) {
    $conn = connectDB();
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>