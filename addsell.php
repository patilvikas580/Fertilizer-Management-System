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
$mq="SELECT * FROM systemdetails ";
$md=mysqli_query($conn,$mq);
$mr=mysqli_fetch_assoc($md);   


  $msg="";
  if(isset($_POST['submit'])){
    
    $products=$_POST['products'];
    $qty=$_POST['qty'];


    $cid=$_POST['cid'];
    $date=$_POST['date'];
    $time=$_POST['time'];

    
  

    $query="INSERT INTO sell (cid,date,time) VALUES('$cid','$date','$time')";
    $data=mysqli_query($conn,$query);

    if($data){


        $z="SELECT * FROM sell ORDER BY sid DESC LIMIT 1";
        $z1=mysqli_query($conn,$z);
        $z2=mysqli_fetch_assoc($z1);  
        $sid=$z2['sid'];

            foreach($products as $pid)  
            {  
                //echo $chk1."<br>";
                $y="INSERT INTO selldetails(sid,pid) VALUES ('$sid','$pid')";
                $y1=mysqli_query($conn,$y);
                

                $k="SELECT * FROM product WHERE pid='$pid'";
                $kd=mysqli_query($conn,$k);
                $kr=mysqli_fetch_assoc($kd);

                $utq=$kr['available']-1;

                $i="UPDATE product SET available='$utq' WHERE pid='$pid'";
                $id=mysqli_query($conn,$i);
/*
                foreach($qty as $qt)  
                { 
                    $y="INSERT INTO selldetailsqty(sid,pid,qty) VALUES ('$sid','$pid','$qt')";
                    $y1=mysqli_query($conn,$y);
                }
*/
if($y1){

    $rv="SELECT * FROM selldetails ORDER BY sdid DESC LIMIT 1";
    $rv1=mysqli_query($conn,$rv);
    $rv2=mysqli_fetch_assoc($rv1);  
    $sdid=$rv2['sdid'];

    if($sdid){

      foreach($qty as $qty1)  
      {  
//          $h="UPDATE resultvalues SET qty='$qty1' WHERE rvid='$rvid'";
         //$h1=mysqli_query($conn,$h);
        echo $qty1."<br>";
         

      }

    }

 }         


            }  
           

            if($y1){
                echo '<script>alert("Sell Added Successfully !!!");</script>';
            }
            else{
                echo '<script>alert("Error !!");</script>';
            }



    }
    else{
        echo "Error!";
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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 bg-dark mt-2 rounded">
    <h2 class="text-center text-white p-1">Add Sell Information</h2>
      <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
      <div class="form-group">
        <div class="row mt-4">
        <div class="col-md-4  col-4 pt-1">
        <span class="text-white pb-1 pl-1"><i class="fas fa-user"></i> Customer Name :</span>
              </div>
              <div class="col-md-8 col-8">
               <select name="cid" class="form-control" required>
               <option value="" selected>--- Select ---</option>
              
              <?php
              $q="SELECT * FROM customer";
              $d=mysqli_query($conn,$q);
              while($r=mysqli_fetch_assoc($d)){ ?>
                 <option value="<?= $r['cid'] ?>"><?= $r['name'] ?></option>
            <?php
              }
              ?>
               </select>
              </div>
              </div>
              </div>

        
              <div class="form-group">
        <div class="row mt-4">
        <div class="col-md-4  col-4 pt-1">
        <span class="text-white pb-1 pl-1"><i class="fas fa-calendar"></i> Date :</span>
              </div>
              <div class="col-md-8 col-8">
               <input type="date" name="date" class="form-control">
              </div>
              </div>
              </div>

              <div class="form-group">
        <div class="row mt-4">
        <div class="col-md-4  col-4 pt-1">
        <span class="text-white pb-1 pl-1"><i class="fas fa-clock"></i> Time :</span>
              </div>
              <div class="col-md-8 col-8">
               <input type="time" name="time" class="form-control">
              </div>
              </div>
              </div>

              
        
        
              <div class="form-group">
              <div class="row">
              
              <span class="ml-3 text-white"> Products :</span>
              </div>
        <div class="row">
       
                    <?php
            $q1="SELECT * FROM product";
            $d1=mysqli_query($conn,$q1);
            while($r1 = mysqli_fetch_assoc($d1)) {
            ?>
            <div class="col-md-6  col-6 pt-1">
            <input type="checkbox" class="text-white from-control" name="products[]" value="<?= $r1["pid"]; ?>"> <span class="text-white"><?= $r1["name"]; ?></span>
            </div>
            <div class="col-md-6  col-6 pt-1">
            <input type="text" class="from-control" name="qty[]" value="" placeholder="Quantity">
            </div>

            <?php
            
            }
            ?>
              
              
             
              </div>
              </div>





        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add Sell">
        </div>  
        <div class="form-group">
          <h4 class="text-center text-white"><?= $msg; ?></h4>
        </div>  
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 mt-1  p-2 bg-dark rounded">
      <a href="sells.php" class="btn btn-primary btn-block btn-lg">Go to Sells page
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
  background-image: url('imgs/56.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: 50% 75%;
  background-size: cover;
}
.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>
</body>
</html>