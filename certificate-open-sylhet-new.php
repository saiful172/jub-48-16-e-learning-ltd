<?php 
session_start();
require_once 'profile/admin/admin/includes/conn.php';  
$IdNo = $_POST['IdNo'];
$sql = $con->query("SELECT * FROM `certificate` where id_no='$IdNo' ");
$row = $sql->fetch_assoc();
$Id= $row['id_no'];
$Date= $row['issue_date'];
$Name= $row['student_name'];
$Course= $row['course_name'];
$Duration= $row['duration'];
?>

<!DOCTYPE html>
<html lang="en">

<head> 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
 <style type="text/css"> 
 
   .bg-img {	
	background: url(assets/img/bg-image/buttc-certificate.jpg)no-repeat center 0px;
	background-attachment:cover;
	}
  .table td, .table th {padding:2px;}  
  .all{width:95%;margin:auto;border:1px solid #dee2e6;border-radius:10px;padding:5px;}
  </style>
  
<?php include('link.php'); ?>
 
</head>

<body >
 
 <?php include('header.php'); ?>

  <main id="main"> 
  
  <?php include('breadcrumb.php'); ?> 

  <br> <br> 
   <div class="container mt-5">   
	  <br><br> 
	<div class="all   bg-img mt-5">   
	<table class="table table-hover ">	
	<tr> 
	 
        <p style="font-size:18px;font-weight:bold;text-align:center;">  <br> 
	 <!-- <img  class="rounded" src="../dist/user_images/<?php echo $userPic; ?>" height="150" width="150" > --> 
	  <img  class="rounded border" src="assets/img/e-logo.png"  width="150" > 
     	 </p>
	 
	 <br>
	 <h4 class="text-center"> <i><?php echo $Course ; ?> </i></h4>
	 <h5 class="text-center mt-1">  <i>	This Certificate Is For : <b><?php echo $Name ; ?></b></i> </h5>
	  <br>
    </tr>
    
	
	<tr>
    <td><label class="control-label">ID Number</label></td>
		<td>: <?php echo $Id ; ?> </td>
    </tr>
	
	<tr>
    <td><label class="control-label">Date of Issue</label></td>
		<td>: <?php echo date("d M Y", strtotime($Date)); ?> </td>
    </tr>
	
	<tr>
    <td><label class="control-label">Name</label></td>
		<td>: <?php echo $Name ; ?> </td>
    </tr>
	
	<tr>
    <td><label class="control-label">Course Name </label></td>
		<td>: <?php echo $Course ; ?> </td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Duration</label></td>
        <td>: <?php echo $Duration ; ?> </td>
    </tr>
	
	<!-- 
	<tr> <td colspan="2"><br><b> <center> Educational Qualification</center></b></td></tr>
 	<tr>
    	<td><label class="control-label">Academic  </label></td>
        <td>:  </td>
    </tr>
	--> 
    
    </table>
	
	 
 
 </div> <br><br>
 </div>

  </main> 
  
   <?php include('footer.php'); ?>

  
   
  