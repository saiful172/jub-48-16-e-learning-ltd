<?php
	include('session.php');	
	$uq=mysqli_query($con,"select * from stuff where userid='$userId'"); // $userId >> Comes From  session.php // 
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
	 
	
	mysqli_query($con,"update stuff set  photo='$location' where userid='$userId'");
	
	 ?>
		<script>
			window.alert('Logo updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>