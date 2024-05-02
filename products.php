<?php 
  require 'config.php';
  session_start();
  error_reporting(0);
$user=$_SESSION['user'];
if($user==true)
{

}
else
{
  header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
  <title>Accessories - ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">


<header>
      <nav class="navbar navbar-light bg-light navbar-expand-md">
        <a class="nav-brand text-dark" href="admin-panel.php" >
         
            </a>

        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">

        <ul class="navbar-nav ml-auto">
	<a class="" href="admin-panel.php"><img src="imgs/3.png"  width="455" height="40" align="left"></a>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Customer
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="addcustomer.php">Add Customer</a>
            <a class="dropdown-item" href="customers.php">Manage Customer</a>
            
          </div>
        </li>    
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sell
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="addsell.php">Add Sell</a>
            <a class="dropdown-item" href="sells.php">Manage Sell</a>
            
          </div>
        </li>    

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Product
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="addproduct.php">Add Product</a>
            <a class="dropdown-item" href="products.php">Manage Product</a>
            
          </div>
        </li>            

              <li class="nav-item ">
                <a href="admin-logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>
      </header>

  <div class="container-fluid">
<div class="row ">
  <div class="col-12">
    <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?> " class="alert alert-danger alert-dismissible mt-3">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>
        <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?>
      </strong>
    </div>
    <div class="table-responsive mt-2">
      <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <td colspan="12">
            <h4 class="text-center text-white m-0">! ! !  Products ! ! !</h4>
          </td>
        </tr>
        <tr>
          <th class="text-white">ID</th>
          <th class="text-white">Name</th>
          <th class="text-white">Base Price</th>
          <th class="text-white">Selling Price</th>
          <th class="text-white">Total</th>
          <th class="text-white">Available</th>
          <th class="text-white">Operation</th>
         
          
        </tr>
      </thead>
      <tbody>
        <?php 
          
          
          
        
          $q="SELECT * FROM product";
          $d=mysqli_query($conn,$q);
          
          while($row=mysqli_fetch_assoc($d)):
         ?>
         <tr>
           <td class="text-white"><?= $row['pid'] ?></td>     
           <td class="text-white"><?= $row['name'] ?></td>     
           <td class="text-white">Rs.<?= $row['baseprice'] ?>/-</td> 
           <td class="text-white">Rs.<?= $row['price'] ?>/-</td> 
           <td class="text-white"><?= $row['total'] ?></td>                    
           <td class="text-white"><?= $row['available'] ?></td>  
           <td class="text-white"><a href="editproduct.php?pid=<?= $row['pid'] ?>" class="text-white"> <i class="fas fa-edit"></i> Edit</a> |&nbsp;&nbsp;<i class="fas fa-trash"></i> <a href="deleteproduct.php?pid=<?= $row['pid'] ?>" class="text-white">Delete</a></td>                     
            
           
            
         </tr>
         
       <?php endwhile; ?>
       
      </tbody>
      </table>
    </div>
  </div>
</div>
</div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
.dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>
</body>
</html>