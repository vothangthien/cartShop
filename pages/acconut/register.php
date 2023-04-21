
  <body>
    <div class="mx-auto mt-2 px-5 py-1 form-register" style="width:500px;height:800px;border:5px solid black;border-radius:80px">
      <form id="register-form" class="form">
        <div class="mb-3 mt-3">
          <label for="username" class="form-label">Name</label>
          <input type="text" class="form-control" id="username" placeholder="Enter name" name="username" required />
        </div>

        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required />
        </div>

        <div class="mb-3">
          <label for="password2" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" id="cf_password" placeholder="Confirm password" name="cf_password" required />
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone:</label>
          <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone" required />
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address:</label>
          <input type="text" class="form-control" id="address" placeholder="Address" name="address" required />
        </div>

        <button type="submit" class="btn btn-primary" value="Register">Register</button>

        <div id="error-message">
          <span></span>
        </div>

        <div>
          <span><p>Already have an account? <a href="index.php?page=signin">Click here to sign in</a></p></span>
        </div>
      </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                  window.location.href = 'http://localhost/018101046/index.php?page=help';
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
