<?php
	include('session.php');
	$uid=$_GET['id'];

	
	$username=$_POST['username'];
	
	$original=($_POST['password']);
	$password=md5($_POST['password']);
	
	$StuffName= $_POST['StuffName'];
	$Position= $_POST['Position'];
	$contact= $_POST['contact'];
	
	$BizName=$_POST['BizName'];
	$ServCharg=$_POST['ServCharg'];
	$BizPhone=$_POST['BizPhone'];
	$BizEmail=$_POST['BizEmail'];
	$BizWeb=$_POST['BizWeb'];
	$BizAddress=$_POST['BizAddress'];
	$BizDetail=$_POST['BizDetail'];
	$InvWelcome=$_POST['InvWelcome'];
	
	$joindate= $_POST['joindate'];
	$ExpireDate= $_POST['ExpireDate'];
	$Type=$_POST['Type'];
	$Comments=$_POST['Comments'];
	
	$Division = $_POST['Division']; 
	$District = $_POST['District'];
	$Upazila = $_POST['Upazila'];
	$Status= $_POST['Status'];
	$InvName=$_POST['InvName'];
	
	$uq=mysqli_query($con,"select * from stuff where userid='$uid'");
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
	
	mysqli_query($con,"update stuff set stuff_name='$StuffName',position='$Position',contact_info='$contact',
	                                  business_name='$BizName',business_details='$BizDetail',service_charge='$ServCharg',business_phone='$BizPhone',business_email='$BizEmail',business_address='$BizAddress',invoice_welcome='$InvWelcome',
	                                  division_id='$Division', district_id='$District',upazila_id='$Upazila', 
									  photo='$location', status='$Status', software_status='$Type',comments='$Comments',inv_name='$InvName'

									   where userid='$uid'");
	
	//Update user
	mysqli_query($con,"update user set full_name='$StuffName',username='$username',password='$password',status='$Status',expire_date='$ExpireDate' where userid='$uid'");
	//Update password
	mysqli_query($con,"update password set original='$original',mdfive='$password' where passwordid='$uid'");
	
	mysqli_query($con,"insert into stuff_details (userid,own_name,business_name,status,software_status,comments,division_id,district_id,upazila_id,entry_date) 
					values ('$UserId','$StuffName','$BizName',1,'$Type','$Comments','$Division','$District','$Upazila','$joindate',NOW())");

	
	mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Add New Client - Name: ".$StuffName."',NOW())");
	
	?>
		<script>
			window.alert('stuff updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>