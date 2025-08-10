<!DOCTYPE html>
<html lang="en">

<head>
<title>Trainer - E-Learning & Earning LTD</title>
 
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
   <?php include('link.php'); ?>
</head>

<body>
 
  <?php include('header.php'); ?> 
  
  <main id="main">
  
<?php include('breadcrumb.php'); ?> 
 
    <section id="testimonials" class="testimonials mt-5">
      <div class="container">
 <center> <h2> Our Trainer </h2></center><hr>
        <div class="row">
        
		<?php  require_once 'include/conn.php';
							 
								$eq=mysqli_query($con,"select * from emp_list where department=4  ORDER BY id asc   ");
								while($eqrow=mysqli_fetch_array($eq)){
	?>
          <div class="col-lg-4" data-aos="fade-up">
            <div class="testimonial-item  mt-4">
			<img src="profile/admin/admin-panel/emp_images/<?php echo $eqrow['userPic']; ?>" class="trainer-img" alt="trainer"> 
              <h3><?php echo $eqrow['name']; ?></h3>
              <h4><?php echo $eqrow['short_des']; ?></h4>
               
            </div>
          </div>
		   
<?php
		}  
		?>		  
 
		   
		  
 
        </div>

      </div>
    </section> 

  </main> 

 <?php include('footer.php'); ?>