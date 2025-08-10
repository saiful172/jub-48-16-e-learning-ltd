<!DOCTYPE html>
<html lang="en">

 <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning & Earning LTD</title>
 
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

   <?php include('link.php'); ?>

  <!-- Template Main CSS File -->
   
  <style type="text/css"> 
#ac-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,.6);
    z-index: 1001;
}
#popup img{width:50%;border-radius: 10px; }

#popup { 
    position: relative;
    top: 80px;  
}
#popup input[type="submit"]
{
	font-size:18px;
	font-weight:bold;
	padding: 5px 10px; 
	border: none; 
	background: red;
	color: #fff;
	border-radius: 10px;
	cursor: pointer;
	float:center;
	margin-right:5px;
	margin-top:3px;
}

#popup input[type="submit"]:hover{color:red;background:white;}

@media (min-width: 1500px) {
  .container {
    max-width: 1500px;
  }
}

</style> 
<script type="text/javascript"> 
function PopUp(){
    document.getElementById('ac-wrapper').style.display="none"; 
}
</script>

 <meta name="google-site-verification" content="-J4F8Utu6YxTeZz_r_QstirZjbRdUDXyntX23A1zKhw" />   
</head>

<body>
 
  <!--
 <center>  
 <div id="ac-wrapper">
   
<div id="popup" onClick="PopUp()"> 
<input type="submit" name="submit" value="X" onClick="PopUp()" /> 
	<img src="assets/img/slide/21-february-2022.jpg" /> 
</div>
   
</div>
</center>  -->
 
  <?php include('header1.php'); ?> 
  <?php include('slider.php'); ?>  

 <main id="main"> 

<?php //include('recent-programe.php'); ?>  
<?php  //include('about_home.php'); ?>	
<?php include('latest-course.php'); ?>
	 
     <!-- Start Cource Details Tabs Section -->	
     <?php// include('service-feature.php'); ?> 
     <!-- End Cource Details Tabs Section -->


    <!-- ======= Upcoming Seminars/Workshops ======= -->
     <?php include('event_seminer.php'); ?>
	<!-- End Upcoming Seminars/Workshops -->
	
	<!-- ======= Services Section ======= -->
     <?php include('course_home.php'); ?> 
	<!-- End Services Section -->

    <!-- ======= Portfolio Section ======= --> 
     <?php //include('portfolio_home.php'); ?>
	<!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
     <?php include('work_mem_concern.php'); ?>
	<!-- End Our Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->
 

  