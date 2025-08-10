<?php
	include('session.php'); 	
	$uq=mysqli_query($con,"select * from stuff where userid='$userId'"); // $userId >> Comes From  session.php // 
	$uqrow=mysqli_fetch_array($uq);
	 
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
	
	mysqli_query($con,"update stuff set  sign_img='$location1' where userid='$userId'");
	
	 ?>
		<script>
			window.alert('Signature updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>