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
  <title>ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/1.jpg">
</head>
<body class="bg-secondary">

  
<header>
	
      <nav class="navbar navbar-light bg-light navbar-expand-md">
        <a class="nav-brand text-dark" href="admin-panel.php" >
           	
            </a>
		           

	  
        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">
	
        <ul class="navbar-nav ml-auto">
        
<a class="" href=""><img src="imgs/3.png" alt="Girl in a jacket" width="855" height="80"></a>
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
                <a href="admin-logout.php" class="nav-link">EXIT</a>
              </li>          
            </ul>


          </div>
      </nav>
      </header>

	

      
	
	
	<div class="container mt-5">
        <div class="row">
          <div class="col mt-5 text-center text-white">
            <h1>Welcome To Admin Panel</h1>   
	
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
body{
  background-image: url('imgs/12.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: 50% 25%;
  background-size: cover;
}

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