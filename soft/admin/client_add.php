<?php
	include('session.php');
	
	$UserId=$_POST['UserId'];
	$username=$_POST['username'];
	$original=$_POST['password'];
	$password=md5($_POST['password']);
	$StuffName=$_POST['StuffName'];
	
	$contact=$_POST['contact'];
	$Position=$_POST['Position'];
	
	$BizName=$_POST['BizName'];
	$BizDetail=$_POST['BizDetail'];
	$ServCharg=$_POST['ServCharg'];
	$BizPhone=$_POST['BizPhone'];
	$BizEmail=$_POST['BizEmail'];
	$BizWeb=$_POST['BizWeb'];
	$BizAddress=$_POST['BizAddress'];
	$InvWelcome=$_POST['InvWelcome'];
	
	$Type=$_POST['Type'];
	$Comments=$_POST['Comments'];
	
	$Division = $_POST['Division']; 
	$District = $_POST['District'];
	$Upazila = $_POST['Upazila'];
	
	$joindate=$_POST['joindate'];
	$ExpireDate=$_POST['ExpireDate'];
	$InvName=$_POST['InvName'];
	
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
	
	mysqli_query($con,"insert into `user` (full_name,username,password,access_level,status,expire_date) values ('$StuffName','$username','$password','4','1','$ExpireDate')");
	$uid=mysqli_insert_id($con);
	
//	mysqli_query($con,"insert into `user_backup` (userid, username,password,access_level) values ('$uid','$username','$password','4')");
	
	mysqli_query($con,"insert into password (original, mdfive) values ('$original', '$password')");

	mysqli_query($con,"insert into stuff (userid,stuff_name,position,contact_info,business_name,business_details,service_charge,business_phone,business_email,biz_web,business_address,invoice_welcome,join_date,status,software_status,comments,division_id,district_id,upazila_id,inv_name,photo,sign_img) 
					values ('$uid','$StuffName','$Position','$contact','$BizName','$BizDetail','$ServCharg','$BizPhone','$BizEmail','$BizWeb','$BizAddress','$InvWelcome','$joindate','1','$Type','$Comments','$Division','$District','$Upazila','$InvName','$location',00)");
	
mysqli_query($con,"insert into stuff_details (userid,own_name,business_name,status,software_status,comments,division_id,district_id,upazila_id,entry_date) 
					values ('$UserId','$StuffName','$BizName',1,'$Type','$Comments','$Division','$District','$Upazila','$joindate')");

mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Add New Client - Name: ".$StuffName."',NOW())");
	
	?>
		<script>
			window.alert('Stuff added successfully!');
			window.history.back();
		</script>
	<?php
?>