    <?php
            include './models/ConnectSQL.php';
            $result = mysqli_query($conn, "SELECT * FROM administration");
            mysqli_close($conn);
            ?>


    <!DOCTYPE html>

    <html>
    
        <body>
        
            <style>
                table, th, td {
                    border: 1px solid black;
                }
                #user-info{
                    border: 1px solid #ccc;
                    margin: 0 auto;
                    padding: 25px;
                }
                #user-info table{
                    margin: 10px auto 0 auto;
                    text-align: center;
                }
                #user-info h1{
                    text-align: center;
                }
            </style>
            <div id="user-info">
            <form id="register-form" class="form">
                    <input type="text" class="form-control" id="username" placeholder="Enter name" name="username" required />
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required />
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required />
                    <input type="password" class="form-control" id="cf_password" placeholder="Confirm password" name="cf_password" required />
                    <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone" required />
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required />
                    <button type="submit" class="btn btn-primary" value="Register">Register</button>
                        <div id="error-message">
                        <span></span>
                        </div>
                </form>
                <table id = "user-listing" style="width: 1200px;">
                    <tr>
                        <td>Username</td>
                        <td>Trạng thái</td>
                        <td>Cập nhật lần cuối</td>
                        <td>Ngày lập</td>
                        <td>Sửa</td>
                        <td>Xóa</td>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?=  $row['updated_at'] ?></td>
                            <td><?=  $row['created_at'] ?></td>
                            <td><a href="./edit_user.php?id=<?= $row['id'] ?>">Sửa</a></td>
                            <td><button class="delete-btn" data-user-id="<?= $row['id'] ?>">Xóa</button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- phần tạo tài khoản -->
    <script>
            $(document).ready(function() {
            $('#register-form').submit(function(event) {
                event.preventDefault();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var cf_password = $('#cf_password').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                
                $.ajax({
                url: 'http://localhost/018101046/pages/acconut/API/APIregister.php',
                type: 'POST',
                data: {
                    username: username,
                    email: email,
                    password: password,
                    cf_password: cf_password,
                    phone: phone,
                    address: address
                },
                success: function(response) {
                    if (response === 'success') {
                        window.location.reload();
                    } else {
                        $('#error-message span').text(response);
                    }
                },
                error: function() {
                    $('#error-message span').text('There was a problem with the server, please try again later.');
                }
                });
            });
            });

            </script>

    <!-- phần xóa tài khoản  -->

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var userId = $(this).data('user-id');
                if (confirm('Bạn có chắc chắn muốn xóa người dùng này không?')) {
                    $.ajax({
                        url: 'http://localhost/018101046/pages/acconut/delete_user.php',
                        type: 'POST',
                        data: { user_id: userId },
                        success: function(response) {
                            window.location.reload('http://localhost/018101046/index.php?page=subacconut');
                        },
                        error: function() {
                            alert('There was a problem deleting the user.');
                        }
                    });
                }
            });
        });
        </script>

        </body>
    </html>
