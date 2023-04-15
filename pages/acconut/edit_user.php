<?php
    include '../../models/ConnectSQL.php';
    $userId = $_POST['user_id'];
    mysqli_query($conn,"UPDATE `administration` SET `password` = MD5('" . $_POST['new_password'] . "'), `last_updated`=" . time() . " WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
    mysqli_close($conn);
?>