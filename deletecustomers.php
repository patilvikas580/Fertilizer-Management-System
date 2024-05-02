<?php 
	session_start();
	$uid=$_SESSION['user'];
	require 'config.php';

	

	if(isset($_GET['cid'])){
		$cid = $_GET['cid'];

		$stmt = $conn->prepare("DELETE FROM customer WHERE cid=?");
		$stmt->bind_param("i",$cid);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Customer Deleted ! ';
		header('location:customers.php');
	}


 ?>	  