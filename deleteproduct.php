<?php 
	session_start();
	$uid=$_SESSION['user'];
	require 'config.php';

	

	if(isset($_GET['pid'])){
		$pid = $_GET['pid'];

		$stmt = $conn->prepare("DELETE FROM product WHERE pid=?");
		$stmt->bind_param("i",$pid);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Product Deleted ! ';
		header('location:products.php');
	}


 ?>	  