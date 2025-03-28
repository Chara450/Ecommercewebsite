<?php

// Database connection
function connectDB() {
    $host = 'localhost';
    $user = 'bbs_admin';
    $password = 'Joseph123@';
    $dbname = 'ecommerce_db';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>