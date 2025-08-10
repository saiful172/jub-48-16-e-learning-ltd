<?php
	include('session.php');
	$uid=$_GET['id'];

	$emp_name= $_POST['emp_name'];
	$father_name= $_POST['father_name'];
	$national_id= $_POST['national_id'];
	$gender= $_POST['gender'];
	$address= $_POST['address'];
	$contact= $_POST['contact'];
	$birthdate= $_POST['birthdate'];
	$position= $_POST['position'];
	$hiredate= $_POST['hiredate'];
	$sal_type= $_POST['sal_type'];
	$salary= $_POST['salary'];
	$status= $_POST['status'];
	
	$uq=mysqli_query($con,"select * from employee where id='$uid'");
	$uqrow=mysqli_fetch_array($uq);
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location=$uqrow['photo'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location=$uqrow['photo'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	mysqli_query($con,"update employee set emp_name='$emp_name',father_name='$father_name',national_id='$national_id',address='$address',contact_info='$contact',birthdate='$birthdate'
	,gender='$gender',position='$position', sal_type='$sal_type', salary='$salary',hire_date='$hiredate',photo='$location',status='$status' where id='$uid'");
	
	//mysqli_query($con,"update employee_backup set emp_name='$emp_name',middle_i='$father_name',national_id='$national_id',address='$address',contact_info='$contact',birthdate='$birthdate'
	//,gender='$gender',positionid='$position',hire_date='$hiredate',photo='$location' where userid='$uid'");
	
	//mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Update employee details - Firstname: ".$uqrow['emp_name']."',NOW())");
	
	?>
		<script>
			window.alert('Employee updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>