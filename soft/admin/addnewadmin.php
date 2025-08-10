<?php
	include('session.php');
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$birthdate=$_POST['birthdate'];
	$gender=$_POST['gender'];
	$position=$_POST['position'];
	$memdate=$_POST['memdate'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	if ($fileInfo['filename']==""){
	$location="";
	}
	else{
	$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
	$location = "upload/" . $newFilename;
	}
	
	mysqli_query($con,"insert into employee (username,password,firstname,middlename,lastname,address,contact_info,birthdate,gender,positionid,member_date,access_level,photo) 
					values ('$username','$password','$firstname','$middlename','$lastname','$address','$contact','$birthdate','$gender','$position','$memdate','1','$location')");
					
	mysqli_query($con,"insert into activitylog (employeeid,action,activity_date) values ('".$_SESSION['id']."','Add new admin - Username: ".$username."',NOW())");
					
	header('location:admin_emp.php');
?>