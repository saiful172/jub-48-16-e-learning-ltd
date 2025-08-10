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
   <section id="team" class="team section-bg pt-5 mt-5">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Management Team</strong></h2>
        </div>

        <div class="row">
		<div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin:auto;">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="assets/img/team/masud-alom.jpeg" class="img-fluid  team-round"  alt="">
                <div class="social">
				<!--
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
				  -->
                </div>
              </div>
              <div class="member-info">
                <h4> Md. Masud Alam</h4>
              <p>Managing Director </p> 
              </div>
            </div>
          </div>
		</div>
		
    <div class="row"> 
	
		<div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin:auto;">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="assets/img/team/major-kazi-zahurul.jpg" class="img-fluid  team-round" alt="">
                <div class="social">
				<!--
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
				  -->
                </div>
              </div>
              <div class="member-info">
                <h4>
				Major Kazi Zahurul Islam Rafi (Retd)</h4>
                <p>Director, Administration</p>
              </div>
            </div>
          </div>
   

		<div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin:auto;">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img"> 
                <img src="assets/img/team/asikur-rahman.jpg" class="img-fluid team-round" alt="">
                <div class="social">
                  <!--
				  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
				  -->
                </div> 
              </div>
              <div class="member-info">
                <h4>Md. Asikur Rahman</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </div>
		  
		 <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin:auto;">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img"> 
                <img src="assets/img/team/tapit-moral-school.jpg" class="img-fluid team-round" alt="">
                <div class="social">
                  <!--
				  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
				  -->
                </div> 
              </div>
              <div class="member-info">
                <h4>Tapit Hasan Chowdhury </h4>
                <p>CEO ( Moral Learning) </p>
              </div>
            </div>
          </div>
		  
 </div>
 
 
  <?php include('training-dept.php'); ?>
  
  <?php include('web-dept.php'); ?>
  
  <?php include('digital-dept.php'); ?>
		
		
	
	 
	 
 
 <div class="section-title mt-5" data-aos="fade-up">
          <h2>Click The Photo - Team </h2><hr>
        </div>
		
 <div class="row">
 
  <?php  require_once 'include/conn.php';
							 
								$eq=mysqli_query($con,"select * from emp_list  where department=2    ");
								while($eqrow=mysqli_fetch_array($eq)){
	?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="profile/admin/admin/emp_images/<?php echo $eqrow['userPic']; ?>" class="img-fluid  team-round" alt="">
                <div class="social">
                 <!--
				 <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
				  -->
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $eqrow['name']; ?></h4>
                <p><?php //echo $eqrow['designation']; ?></p>
              </div>
            </div>
          </div>
		  
		<?php
		}  
		?>	
		  
     </div>
	 
	 
	 	<div class="section-title mt-5" data-aos="fade-up">
          <h2>HR & Accounts Department </h2><hr>
        </div>
		
 <div class="row">
 
  <?php  require_once 'include/conn.php';
							 
								$eq=mysqli_query($con,"select * from emp_list  where department=3    ");
								while($eqrow=mysqli_fetch_array($eq)){
	?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="profile/admin/admin/emp_images/<?php echo $eqrow['userPic']; ?>" class="img-fluid  team-round" alt="">
                <div class="social">
                 <!--
				 <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
				  -->
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $eqrow['name']; ?></h4>
                <p><?php //echo $eqrow['designation']; ?></p>
              </div>
            </div>
          </div>
		  
		<?php
		}  
		?>	
		  
     </div>
	 
	 
	 
	 <div class="section-title mt-5" data-aos="fade-up">
          <h2>IT Support </h2><hr>
        </div>
		
 <div class="row">
 
 <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/it-support/imran.jpg" class="img-fluid  team-round" alt=""> 
              </div>
              <div class="member-info">
                <h4>Emran Hossain</h4>
                <p>IT Support </p>
              </div>
            </div>
          </div>
		  
		  
		  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/it-support/sakil.jpg" class="img-fluid  team-round" alt=""> 
              </div>
              <div class="member-info">
                <h4>Shakil Ahmmed</h4>
                <p>IT Support</p>
              </div>
            </div>
          </div>
		  
		    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/it-support/parvez.jpeg" class="img-fluid  team-round" alt=""> 
              </div>
              <div class="member-info">
                <h4>Parvez Hossen</h4>
                <p>IT Support</p>
              </div>
            </div>
          </div>
		  
		    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/it-support/baharul.jpeg" class="img-fluid  team-round" alt=""> 
              </div>
              <div class="member-info">
                <h4>BAHARUL ISLAM</h4>
                <p>IT Support</p>
              </div>
            </div>
          </div>
		  
		   
 </div>
	 
	 

      </div>
    </section> 
  </main>

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->
   

</body>

</html>