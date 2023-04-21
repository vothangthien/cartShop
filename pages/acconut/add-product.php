<head>
   <link rel="stylesheet" href="./public/style/pages/addproduct.css"/>
</head>

<body>
<div id="error-message">
        <span></span>
      </div>
  <div class="body-form-addproduct">
    <form id="form-addproduct">
      <div class="form-addproduct">
            <div  class="form-addproduct-left">
          <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required />
              </div>
              <div class="mb-3 mt-3">
                <label for="description" class="form-label">description:</label>
                <input type="description" class="form-control" id="description" placeholder="Enter description" name="description" required />
              </div>
              <div class="mb-3">
                        <label for="price" class="form-label">price:</label>
                        <input type="number" class="form-control" id="price" placeholder="price" name="price" required />
                      </div>  
              
        </div>
            <div class="form-addproduct-right">
             
                <div class="mb-3 mt-3">
                  <label for="image" class="form-label">Image:</label>
                  <input type="file" class="form-control" id="image" name="image" required />
                  <div  class="product-image"><img id="product-image" class="input-img" src="" alt="Product Image" /> </div>
                </div>
            </div>
      </div>
      <button type="button" class="update-btn classbutton"  data-user-id="' + userId + '">Cập nhật</button>

      <button type="submit" class="btn btn-primary classbutton" >add Product</button>
    
    </form>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
      // Handle file input change event
      $('#image').on('change', function() {
        var file = $(this)[0].files[0];
        if (file) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#product-image').attr('src', e.target.result);
          }
          reader.readAsDataURL(file);
        } else {
          $('#product-image').attr('src', '');
        }
      });
      // Handle form submit event
      $('#form-addproduct').submit(function(event) {
        event.preventDefault();

        var name = $('#name').val();
        var description = $('#description').val();
        var price = $('#price').val();
        var image = $('#image').val();

        $.ajax({
          url: 'http://localhost/018101046/pages/acconut/API/addproduct.php',
          type: 'POST',
          data: {
            name: name,
            description: description,
            price: price,
            image: image
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
</body>
