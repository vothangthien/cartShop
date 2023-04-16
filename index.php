<!DOCTYPE html>
<html lang="en">
<head>  
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
     <script src="https://www.w3schools.com/lib/w3.js"></script>

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
                    
                    case 'edit_user':
                         include './pages/acconut/edit_user.php';
                         break; 
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

                         case 'help':
                                 include './pages/help.php';        
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