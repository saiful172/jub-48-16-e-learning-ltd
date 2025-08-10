<?php
	include('session.php');
	
	$uid=$_POST['UserId'];
	
	$username=$_POST['username'];
	
	$original=($_POST['password']);
	$password=md5($_POST['password']);
	  
	$uq=mysqli_query($con,"select * from stuff where userid='$uid'");
	$uqrow=mysqli_fetch_array($uq);
	
 
	mysqli_query($con,"update user set username='$username', password='$password' where userid='$uid'");
	//Update password
	mysqli_query($con,"update password set original='$original',mdfive='$password' where passwordid='$uid'");
	//mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Update Stuff Details - Stuff Name: ".$uqrow['stuff_name']."',NOW())");
	?>
		<script>
			window.alert('Password updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>