<?php
include_once '../../../models/ConnectSQL.php';
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_POST['image'];

// Handle file upload

// Check if the product already exists
$sql_check = "SELECT id FROM products WHERE name = '$name'";
$result_check = mysqli_query($conn, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    echo "Product already exists!";
} else {
    // Insert the product into the database
    $sql_insert = "INSERT INTO products (name, description, price, image, created_at, updated_at) VALUES ('$name', '$description', '$price', '$image', NOW(), NOW())";

    if (mysqli_query($conn, $sql_insert)) {
        echo "Product added successfully!";
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
