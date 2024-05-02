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

  $msg="";
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    
   
    $q="INSERT INTO customer (name,mobile,address) VALUES ('$name','$mobile','$address')";
    $d=mysqli_query($conn,$q);
    if($d){
      ?>
      <script>
      alert("Customer Successfully Added");
      window.location.href = "addcustomer.php";
      </script>
      <?php

    }
    else{
      $msg="Error !";     
    }
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
  <title>ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

<header>
      <nav class="navbar navbar-light bg-light navbar-expand-md">
        <a class="nav-brand text-dark" href="admin-panel.php" >
        <h4 class="text-white"></h4>
            </a>

        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">

        <ul class="navbar-nav ml-auto">
	<a class="" href="admin-panel.php"><img src="imgs/3.png" alt="Girl in a jacket" width="655" height="60"></a>
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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 bg-light mt-5 rounded">
    <h2 class="text-center text-black p-1">Add Customer Information</h2>
      <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
        <div class="form-group">
        <span class="text-black pb-1 pl-1">Customer Name</span>
          <input type="text" name="name" class="form-control" placeholder="Enter Customer Name" required>           
        </div>  
        <div class="form-group">
        <span class="text-black pb-1 pl-1">Mobile Number</span>
          <input type="text" name="mobile" class="form-control" placeholder=" Enter Mobile Number" required>           
        </div> 
        <div class="form-group">
        <span class="text-black pb-1 pl-1">Address</span>
          <textarea name="address" class="form-control" id="" cols="30" rows="3" placeholder="Enter Address"></textarea>
        </div> 
        




        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add Customer">
        </div>  
        <div class="form-group">
          <h4 class="text-center text-white"><?= $msg; ?></h4>
        </div>  
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 mt-1  p-2 bg-light rounded">
      <a href="customers.php" class="btn btn-primary btn-block btn-lg">Go to Customers page
      </a>
    </div>
  </div>
</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<style>
.dropdown:hover>.dropdown-menu {
  display: block;
}


body{
  background-image: url('imgs/5.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: 30% 20%;
  background-size: cover;
}








.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>
</body>
</html>