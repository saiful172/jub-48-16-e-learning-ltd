<?php
	include('session.php');
	$did=$_GET['id'];
	
	$e=mysqli_query($con,"select * from stuff where userid='$did'");
	$er=mysqli_fetch_array($e);
	
	mysqli_query($con,"delete from `user` where userid='$did'");
	mysqli_query($con,"delete from stuff where userid='$did'");
	mysqli_query($con,"delete from password where passwordid='$did'");
	
	mysqli_query($con,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Delete Stuff - Name: ".$er['stuff_name']."',NOW())");
	
	?>
		<script>
			//window.alert('stuff deleted successfully!');
			window.history.back();
		</script>
	<?php

?>