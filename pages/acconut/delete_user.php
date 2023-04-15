<?php
    include '../../models/ConnectSQL.php';
    $userId = $_POST['user_id'];
    mysqli_query($conn, "DELETE FROM administration WHERE id = $userId");
    mysqli_close($conn);
?>