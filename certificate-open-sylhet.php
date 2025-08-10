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
 
 
 <style>
.Certificate {
margin:auto;
  position: relative;
  text-align: center;
  color: black;
  width:700px;
}

.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
} 

.top-right { 
  position: absolute;
  top: 45px;
  right: 193px;
  font-size:15px; 
  font-weight :bold;
}

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

 
.centered { 
  position: absolute;
  top: 210px;
  left: 155px;
  font-size:23px; 
  font-weight :bold;
}
 

.centered2 {   
 position: absolute;
  top: 310px;
  left: 155px;
  font-size:19px; 
  font-weight :bold; 
}

.centered3 {   
  position: absolute;
  top: 333px;
  left: 155px;
  font-size:14px; 
  font-weight :bold;
}
 


</style>
<?php include('link.php'); ?>
 
</head>

<body>
 
 <?php include('header.php'); ?>

  <main id="main"> 
  
  <?php include('breadcrumb.php'); ?> 
 
    <section id="contact" class="contact">
      <div class="container">
	 
	  <div class="col-lg-12 mt-1"> 
           <br><br><center>   
		   <h3>This Certificate Is For : <b><?php echo $Name ; ?></b> <a href="certificate"> <br> << Back</a></h3>  </center>
          </div>
       
 
<div class="Certificate mt-4">
  <img src="assets/img/buttc-certificate.jpg" alt="Snow" style="width:700px;">
  <div class="bottom-left"> </div>
  <div class="top-left"> </div>
  <div class="top-right">ID No: <?php echo $Id ; ?>  | Date of Issue : <?php echo date("d M Y", strtotime($Date)); ?></div>
  <div class="bottom-right"> </div>

  <div class="centered">
 <span><?php echo $Name ; ?></span> 
  </div>
   
  
   <div class="centered2"> 
   <?php echo $Course ; ?>
   </div> 
	 
<div class="centered3"> 
Duration : <?php echo $Duration ; ?> 
</div> 
  
  
   
  
</div> 
           
 
       
    </div>
	  
	</section> 

  </main> 
  
   <?php include('footer.php'); ?>

  
   
  