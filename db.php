<?php
require_once "config.php";

// Create a sample table and insert some data
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully.<br>";
} else {
    echo "ERROR: Could not create table. " . mysqli_error($conn) . "<br>";
}

// Insert sample data
$sql = "INSERT INTO users (name, email) VALUES
('Ismile', 'myismile@example.com'),
('Ahmed', 'ahmed@example.com')";
if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully.<br>";
} else {
    echo "ERROR: Could not insert data. " . mysqli_error($conn) . "<br>";
}
?>
