<?php
include '../../models/ConnectSQL.php';

$user_id = $_POST['user_id'];

$query = "SELECT * FROM administration WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);

mysqli_close($conn);
?>
