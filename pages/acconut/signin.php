


<!DOCTYPE html>
<html lang="en">

<body>

<div  class="mx-auto mt-2 px-5 py-5 " style="width:500px;height:800px ;border:5px solid black; border-radius:80px ">
    <form id="form-signin" class="form" method="POST">

    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
    </div>


    <button type="submit" class="btn btn-primary">SignIn</button>
    <div>
       <span><p>Don't have an account? <a href="index.php?page=register">Click here</a></p></span>
    </div>

    <div id="error-message">
          <span></span>
    </div>
    </form>
</div>

<script>
 const form = document.getElementById("form-signin");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const errorMessage = document.getElementById("error-message");
form.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent the form from submitting
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.success) {
          alert("Login successful!");
          // Set the user_id and other cookies
          const userCookies = {
            user_id: response.user_id,
            user_email: emailInput.value,
        
            user_role: response.user_role,
            // Add more cookies if needed
          };
          for (const [key, value] of Object.entries(userCookies)) {
            document.cookie = `${key}=${value}; expires=${new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
          }
          // Redirect to home page or other page
          window.location.href = 'http://localhost/018101046/index.php?page=Home';
        } else {
          errorMessage.innerHTML = response.message;
        }
      } else {
        errorMessage.innerHTML = response.message;
      }
    }
  };
  xhr.open("POST", "http://localhost/018101046/pages/acconut/API/APIsignin.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`email=${emailInput.value}&password=${passwordInput.value}`);
});
</script>

</body>
</html>
