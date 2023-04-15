<?php
 include_once '../../../models/ConnectSQL.php';

 if (isset($_POST['email']) && isset($_POST['password'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];

  $sql_check = "SELECT * FROM administration WHERE email='$username' AND password='".md5($password)."'";
  $result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    echo json_encode(array("success" => true));
    exit();
} else {
    echo json_encode(array("success" => false, "message" => "Incorrect email or password"));
    exit();
}
}

mysqli_close($conn); 
?>