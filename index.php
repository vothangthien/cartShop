<!DOCTYPE html>
<html lang="en">
<head>
   
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<link rel="stylesheet" href="./public/style/indexCSS.css"/>


</head>
<body>
      <header>
           <div class="form-index">
                <?php
                    include './layouts/header.php';
                ?>
           </div>
      </header>

     <main>
          <div class="container" >
           <?php
               $page=isset($_GET['page']) ? $_GET['page'] :'Home';
               switch($page){
                    case 'delete_user':
                         include './pages/acconut/delete_user.php';
                         break;
              

                   
                    case 'add-product':
                         include './pages/acconut/add-product.php';
                         break;

                    case 'product':
                         include './pages/acconut/product.php';
                         break;
                           case 'Profile':
                                 include './pages/acconut/Profile.php';
                           break;

                          case 'subacconut':
                              include './pages/acconut/subacconut.php';
                              break;

                         case 'laptop':
                              include './pages/laptop.php';
                              break;
                         case 'signin':
                              include './pages/acconut/signin.php';
                              break;
                         case'register':
                              include './pages/acconut/register.php';
                              break;

                         default:
                         include './pages/Home.php';
                         break;

               }
           ?>

          </div>
     </main>



      <footer>
          <div>
               <?php
                     include('./layouts/foooter.php');
               ?>
          </div>
      </footer>




</body>
</html>