<?php
	include('session.php');
	
	$rid=$_GET['id'];
	$code=$_GET['code'];
	
	$query=mysqli_query($con,"update reservation set claim_code='$code' where reserveid='$rid'");
	header('location:history.php');
	
?>