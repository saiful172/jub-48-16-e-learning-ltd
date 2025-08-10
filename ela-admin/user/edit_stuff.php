<?php
	include('session.php'); 
 
	$username=$_POST['username'];
	
	//$original=($_POST['password']);
	//$password=md5($_POST['password']);
	
	$StuffName= $_POST['StuffName'];
	$Position= $_POST['Position'];
	$contact= $_POST['contact'];
	
	$BizName=$_POST['BizName'];
	$BizDetail=$_POST['BizDetail'];
	$BizPhone=$_POST['BizPhone'];
	$BizEmail=$_POST['BizEmail'];
	$BizWeb=$_POST['BizWeb'];
	$BizAddress=$_POST['BizAddress'];
	$InvWelcome=$_POST['InvWelcome'];
	
	//$joindate= $_POST['joindate'];
	//$Status= $_POST['Status'];
	$InvName= $_POST['InvName'];
	
	$uq=mysqli_query($con,"select * from stuff where userid='$userId'");
	$uqrow=mysqli_fetch_array($uq);
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	$fileInfo1 = PATHINFO($_FILES["SignImg"]["name"]);
	
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
	
	
	 if (empty($_FILES["SignImg"]["name"])){ 
		$location1=$uqrow['sign_img'];
	}	
	
	else{
		 	
		if ($fileInfo1['extension'] == "jpg" OR $fileInfo1['extension'] == "png") {
			$newFilename = $fileInfo1['filename'] . "_" . time() . "." . $fileInfo1['extension'];
			move_uploaded_file($_FILES["SignImg"]["tmp_name"], "../upload/" . $newFilename);
			$location1 = "upload/" . $newFilename;
		}
		
		
	else{ 
			$location1=$uqrow['sign_img'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	mysqli_query($con,"update stuff set stuff_name='$StuffName',position='$Position',contact_info='$contact',
	                                    business_name='$BizName',business_details='$BizDetail',business_phone='$BizPhone',business_email='$BizEmail',biz_web='$BizWeb',business_address='$BizAddress',invoice_welcome='$InvWelcome',
	                                    inv_name='$InvName' where userid='$userId'");
	
	//Update user
	mysqli_query($con,"update user set full_name='$StuffName' where userid='$userId'");
	//Update password
//	mysqli_query($con,"update password set original='$original',mdfive='$password' where passwordid='$userId'");
	//mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Update Stuff Details - Stuff Name: ".$uqrow['stuff_name']."',NOW())");
	?>
		<script>
			window.alert('stuff updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>