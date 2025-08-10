<?php
	include('session.php');
	

	$emp_name=$_POST['emp_name'];
	$father_name=$_POST['father_name'];
	$national_id=$_POST['national_id'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$birthdate=$_POST['birthdate'];
	$gender=$_POST['gender'];
	$position=$_POST['position'];

	$memdate=$_POST['memdate'];
	
	$sal_type=$_POST['sal_type'];
	$salary=$_POST['salary'];
	

	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	//mysqli_query($con,"insert into `user` (username,password,access_level) values ('$username','$password','$access')");
	//$uid=mysqli_insert_id($con);
	
	//mysqli_query($con,"insert into `user_backup` (userid, username,password,access_level) values ('$uid', '$username','$password','$access')");
	
	//mysqli_query($con,"insert into password (original, mdfive) values ('$original', '$password')");
	
	
   mysqli_query($con,"insert into employee (emp_name,father_name,national_id,address,contact_info,birthdate,gender,photo,position,hire_date,sal_type,salary,status) 
					values ('$emp_name','$father_name','$national_id','$address','$contact','$birthdate','$gender','$location','$position','$memdate','$sal_type', '$salary','1')");
					
	//mysqli_query($con,"insert into employee_backup (userid,emp_name,middle_i,national_id,address,contact_info,birthdate,gender,positionid,hire_date,photo) 
					//values ('$uid','$emp_name','$father_name','$national_id','$address','$contact','$birthdate','$gender','$position','$memdate','$location')");
					
	//mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Add employee - Firstname: ".$emp_name."',NOW())");
					
	?>
		<script>
			window.alert('Employee added successfully!');
			window.history.back();
		</script>
	<?php
?>