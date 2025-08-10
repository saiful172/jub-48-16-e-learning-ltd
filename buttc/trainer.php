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
							 
								$eq=mysqli_query($con,"select * from trainer  ORDER BY id asc   ");
								while($eqrow=mysqli_fetch_array($eq)){
	?>
          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item  mt-4">
			<img src="profile/admin/admin/trainer_images/<?php echo $eqrow['userPic']; ?>" class="trainer-img" alt="trainer"> 
              <h3><?php echo $eqrow['name']; ?></h3>
              <h4><?php echo $eqrow['short_des']; ?></h4>
              
			  <h3>Marketplace Work </h3>
			  <h4><?php echo $eqrow['earn_market']; ?></h4>
			  <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
 <?php echo $eqrow['about_trainer']; ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
		   
<?php
		}  
		?>		  
	
<!--	
		  <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item  mt-4">
              <img src="assets/img/team/bappi.jpg" class="trainer-img" alt="">
              <h3>Nasir Uddin Bappi</h3>
              <h4>Graphic & UI Designer</h4>
              
			  <h3>Marketplace Work </h3>
			  <h4>Upwork : $3500+, Fiver :  $2000+ </h4>
			  <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
   I am working Graphic & UI Designer from 2015.
Now I am working as a Graphic & UI Designer And Trainer at Promise Group ( Promise IT , E-Learning and Earning Ltd. 

                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
		  
		  
		  <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item  mt-4">
              <img src="assets/img/team/teams.jpg" class="trainer-img" alt="">
              <h3>Md. Alim </h3>
              <h4>Senior Web Application Developer & Trainer </h4>
              
			  <h3>Marketplace Work </h3>
			  <h4>Upwork : $3500+, Fiver :  $2000+ </h4>
			  <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
  I am working  Application Developer about 4 - Years Experience .
Now I am working as a web developer at Promise Group ( Promise IT , E-Learning and Earning Ltd. )

                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
		  
		  
		  <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item  mt-4">
              <img src="assets/img/team/bappi.jpg" class="trainer-img" alt="">
              <h3>Nasir Uddin Bappi</h3>
              <h4>Graphic & UI Designer</h4>
              
			  <h3>Marketplace Work </h3>
			  <h4>Upwork : $3500+, Fiver :  $2000+ </h4>
			  <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
   I am working Graphic & UI Designer from 2015.
Now I am working as a Graphic & UI Designer And Trainer at Promise Group ( Promise IT , E-Learning and Earning Ltd. 

                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
 
-->		  
		  
		  
		  
		  
 
        </div>

      </div>
    </section> 

  </main> 

 <?php include('footer.php'); ?>