<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>
<style type="text/css"> 
.mm {
background:#244a935c; 
}

</style>

</head>

<body>
 
 <?php   require_once 'header1.php';
 date_default_timezone_set("Asia/Dhaka");
 $date=date("Y/m/d");
 ?> 

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">


    <section class="section dashboard">
	  <?php require_once 'more-fals/main-balance-dash.php'; ?>	 
	  
	  
      <div class="row">
	  
	   <div class="col-md-8"> 
		  <img  class="rounded mt-0" src="../includes/dash.jpg" width="100%" /> 
        </div> 
		
	<div class="col-md-4">
	  <?php   require_once 'more-fals/dash-business-info.php'; ?>  
	  </div>
	 
   <div class="d-none">
    <?php  // require_once 'more-fals/dash-cash-report.php'; ?>   	
	
	<?php   require_once 'more-fals/dash-top-saller-customer.php'; ?> 
	
	<?php   require_once 'more-fals/dash-top-saling-product.php'; ?> 
	</div> 
	
  

     
        </div> 
		
		

		 
		
      </div>
    </section>

  </main>
  
  <!-- End #main -->

  <!-- ======= Footer ======= -->
   <?php  //require_once '../includes/footer.php'; ?>
   
   <?php  require_once 'footer1.php'; ?>