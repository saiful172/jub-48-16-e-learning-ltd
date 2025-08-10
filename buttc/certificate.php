<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

 <?php include('link.php'); ?> 
 
</head>

<body>

  <!-- ======= Header ======= -->
<?php include('header.php'); ?> 
  <!-- End Header -->

  <main id="main">
  
  <?php include('breadcrumb.php'); ?>  
    <section id="contact" class="contact">
      <div class="container">
	  
	  <div class="col-lg-12 text-center mt-4"> 
           <br><br> <h3>Certificate Verification</h3> <hr>
      </div>
	  
	  <?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   
     
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-12">
		  
            <form method="post" action="certificate-open.php"  enctype="multipart/form-data" >
             
			 <div class="form-row">
                <div class="col-md-6 form-group text-center">
                  <input type="text" class="form-control" name="IdNo" id="IdNo" placeholder="Enter Certificate Id"  required />
                  <div class="validate"></div>
				  <div class="text-center"><button class="btn-get-started" name="btnsave" type="submit" >Verify</button></div> 
                </div>
              </div>
             
			</form>
			
          </div>

        </div> 
       
    </div>
	  
	</section> 

  </main> 

  <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>
  <!-- End Footer -->
   
  