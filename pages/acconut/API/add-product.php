<?php
include_once '../../../models/ConnectSQL.php';

$name = $_POST["name"];
$description = $_POST["description"];
$category = $_POST["category"];
$expire_date = $_POST["expire_date"];
$stock = $_POST["stock"];
$image = $_FILES["fileInput"]["name"];

// Perform validation on the input fields as needed.

// Move the uploaded image file to a designated folder.
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file);

// Add the new product to the database.
$sql_add = "INSERT INTO products (name, description, category, expire_date, stock, image_url)
            VALUES ('$name', '$description', '$category', '$expire_date', '$stock', '$image')";
$result_add = mysqli_query($conn, $sql_add);

if ($result_add) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "Failed to add product to database."));
}

mysqli_close($conn);
?>
