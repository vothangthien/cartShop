<?php
    include '../../models/ConnectSQL.php';
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cf_password = $_POST['cf_password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($password !== $cf_password) {
        echo "Mật khẩu xác nhận không khớp.";
        exit;
    }

    // Thực hiện cập nhật thông tin người dùng
    $sql = "UPDATE administration SET name='$username', email='$email', password='$password', phone='$phone', address='$address' WHERE id=$user_id";
    if (mysqli_query($conn, $sql)) {
        
        echo "success";
    } else {
        echo "Có lỗi xảy ra khi cập nhật thông tin người dùng.";
    }
    mysqli_close($conn);
?>
