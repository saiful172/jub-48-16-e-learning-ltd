<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}

include_once('User.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/style1.css">
	<style type="text/css"> 
	.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 22px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;width:100%;}
.button4 {border-radius: 12px;}
.button5 {border-radius: 50%;}
 
	body{background-color:;}
	#all{margin:auto;width:1100px;}
	#full{float:left;background-color:white;padding:5px;width:100%;}
	#title{width:100%;float:left;padding:5px;border:2px solid #61A13F;border-radius:10px;margin-bottom:10px;}
	#name{font-size:25px;font-weight:bold;}
	 
	
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>
	
<div id="all"> 
<p> Login Name: <?php echo $row['fname']; ?> 
		<!--	Username: <?php echo $row['username']; ?>
			<p>Password: <?php echo $row['password']; ?> -->
<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</p>
<div id="full">  
<center> 
<h1>Success Frelancer's - Upwork</h1>
<a href="index.php"><button class="button button4"><i class="fa fa-home"></i> </button></a>
<a href="upwork.php"><button class="button button4">Upwork ( 655 ) </button></a>
<a href="fiver.php"><button class="button button4">Fiver ( 972 ) </button></a>
</center><br>
<?php
require_once 'admin/admin/includes/conn.php';
$eq=mysqli_query($con,"select * from gallery where type=1 ORDER BY name   limit 50  ");
while($eqrow=mysqli_fetch_array($eq)){
?>
<a target="_blank" href="view_profile_upwork.php?Profile=<?php echo $eqrow['id']; ?>"> 
<div id="title">  
<img src="admin/admin/user_images/<?php echo $eqrow['userPic']; ?>" align="left" style="width:80px;border-radius:50px;padding:5px;" />
<br><img src="view.png" align="right" style="width:120px;" />
<br><div id="name"><?php echo $eqrow['name']; ?></div>
<div id="degi"> <i class="fa fa-user"></i> <?php echo $eqrow['designation']; ?></div> 
</div> 
</a>
<?php }?>
 

</div>	

</div>	
	
</body>
</html>