<?php
	session_start();
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:index.php');
    exit();
}
	

	$sq=mysqli_query($con,"select * from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$user=$srow['username'];
?>