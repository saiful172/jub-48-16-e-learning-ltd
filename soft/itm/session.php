<?php
    ob_start();
	session_start();	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
			header('location:../index.php');
			exit();
	}
	include('../includes/conn.php');

	$sq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$userId=$srow['userid'];
	$user=$srow['username'];
	$FulName=$srow['stuff_name'];
	$BizName=$srow['business_name'];
	$SignPhoto=$srow['sign_img'];
	
?>