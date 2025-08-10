<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	<style type="text/css"> 
	 
	body{background-color:#F1F2F4;}
	#all{margin:auto;width:1100px;}
	#full{float:left;background-color:white;border:2px solid gray;border-radius:10px;padding:15px;width:100%;}
	#title{width:100%;float:left;border-bottom:2px solid gray;padding:5px;}
	#name{font-size:25px;font-weight:bold;}
	#left{float:left;width:360px;border-right:2px solid gray;padding:5px;}
	#right{float:left;width:690px;padding:5px;text-align:justify;}
	
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>
	
<div id="all"> 
<div id="full"> 
<?php
require_once 'admin/admin/includes/conn.php';
				   $id = $_GET['Profile'];
				   $pq=mysqli_query($con,"select * from gallery  WHERE id = '$id' ");
				   while($pqrow=mysqli_fetch_array($pq)){
	?> 
<div id="title"> 

<img src="admin/admin/user_images/<?php echo $pqrow['userPic']; ?>" align="left" style="width:80px;border-radius:50px;padding:5px;" />
<img src="fiver.png" align="right" style="width:200px;" />
<br><div id="name"> <?php echo $pqrow['name']; ?></div>
<div id="degi"> <i class="fa fa-user"></i> <?php echo $pqrow['designation']; ?></div>
<div id="location"> <i class="fa fa-map-marker"></i> <?php echo $pqrow['location']; ?></div>

</div>

<div id="left"> 
<center> <h2>Total Earn<br>$<?php echo $pqrow['total_earn']; ?></h2><hr>
<h3>
Total Job<br><?php echo $pqrow['total_job']; ?><hr>
Total Hours<br><?php echo $pqrow['total_hours']; ?><hr>
 </h3>
 <h4><a href="<?php echo $pqrow['link']; ?>">View Main Profile</a></h4>
</center>
</div>

<div id="right"> 
<h2>Overview</h2> 
<?php echo $pqrow['overview']; ?>
</div>

</div>	
<?php }?>

</div>	
	
</body>
</html>