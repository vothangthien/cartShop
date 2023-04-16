<?php
// Lấy thông tin đăng ký từ Ajax
 include_once '../../../models/ConnectSQL.php';
 
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cf_password = $_POST['cf_password'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$sql_check = "SELECT * FROM administration WHERE name='$username' or email='$email'";
$result_check = mysqli_query($conn, $sql_check);

// Kiểm tra các trường thông tin đăng ký
if (empty($username) || empty($email) || empty($password) || empty($cf_password) || empty($phone) || empty($address)) {
  echo 'Please fill in all fields.';
} else if (mysqli_num_rows($result_check) > 0) {
     echo'this name or email not already exists';
 } else if ($password !== $cf_password) {
  echo 'Passwords do not match.';
}else{
  // Xử lý đăng ký tại đây
  $password = md5($password);

  $query = "INSERT INTO administration (name, email, password, phone, address) VALUES ('$username', '$email', '$password', '$phone', '$address')";
  if (mysqli_query($conn, $query)) {
    $response = array('success' => true);
    echo json_encode($response);
  } else {
    $response = array('success' => false, 'message' => 'Failed to register user');
    echo json_encode($response);
      }

     }

mysqli_close($conn);

?>


  



