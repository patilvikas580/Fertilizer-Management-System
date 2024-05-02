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
$cid=$_GET['cid'];
$q1="SELECT * FROM customer WHERE cid='$cid'";
$d1=mysqli_query($conn,$q1);
$r1=mysqli_fetch_assoc($d1);

  $msg="";
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
   
    
   
    $q="UPDATE customer SET name='$name', mobile='$mobile', address='$address' WHERE cid='$cid' ";
    $d=mysqli_query($conn,$q);
    if($d){
      ?>
      <script>
      alert("Customer Information Successfully Updated");
      window.location.href = "editcustomers.php?cid=<?= $cid ?>.php";
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
      <nav class="navbar navbar-dark bg-danger navbar-expand-md">
        <a class="nav-brand text-dark" href="admin-panel.php" >
        <h4 class="text-white">Fertilizer Shop</h4>
            </a>

        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">

        <ul class="navbar-nav ml-auto">
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
    <div class="col-md-6 bg-dark mt-2 rounded">
    <h2 class="text-center text-white p-1">Update Customer Information</h2>
      <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
        <div class="form-group">
        <span class="text-white pb-1 pl-1">Customer Name</span>
          <input type="text" name="name" class="form-control" placeholder="Customer Name" value="<?= $r1['name'] ?>">           
        </div>  
        <div class="form-group">
        <span class="text-white pb-1 pl-1">Mobile Number</span>
          <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="<?= $r1['mobile'] ?>"> 
        </div> 
        <div class="form-group">
        <span class="text-white pb-1 pl-1">Address</span>
          <textarea name="address" class="form-control" id="" cols="30" rows="3" placeholder="Address" value="<?= $r1['address'] ?>"><?= $r1['address'] ?></textarea>
        </div> 
        




        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Update Customer Details ">
        </div>  
        <div class="form-group">
          <h4 class="text-center text-white"><?= $msg; ?></h4>
        </div>  
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 mt-1  p-2 bg-dark rounded">
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

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>
</body>
</html>