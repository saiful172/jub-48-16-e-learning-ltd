<!DOCTYPE html>
<html lang="en">

<head>
<title>Photo Gallery | E-Learning & Earning LTD</title>

  <meta name="descriptison" content="Professional IT Training Institute in Bangladesh,Graphic Design, Digital Marketing, Web Design Development, 3d Animation,Skill based Freelancing and Outsourcing Training Courses,best online earning training center in Dhaka">
  <meta name="keywords" content="Outsourcing freelancing Dhaka,Outsourcing rampura,freelancing Dhaka,outsourcing bangladesh,outsourcing training center in dhaka, outsourcing training center in mirpur shyamoli,freelancing course,professional courses in bangladesh,freelancing institute in bangladesh,outsourcing training center in mirpur,online outsourcing,outsourcing training in dhaka,
       best online earning training center in Dhaka">
	   
  <?php include('link.php'); ?>
  
 
</head>

<body>

  <?php include('header.php'); ?>

  <main id="main">
  
 <?php include('breadcrumb.php'); ?> 
 
    <section id="portfolio" class="portfolio">
      <div class="container">
	    <div class="section-title m-0 p-0" data-aos="fade-up"> <br><br>
        <h2>Our Photo Gallery</h2>
      </div>
	    

        <div class="row  container mt-5"  data-aos="fade-up">
 <?php
      $sql = mysqli_query($con, "SELECT * FROM gallery_image");
      while ($row = mysqli_fetch_assoc($sql)) { ?>
	  
          <div class="col-lg-4 col-md-6 portfolio-item filter-app zoom">
            <a href="ela-admin/user/user_images/<?= $row['userPic'] ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?= $row['title'] ?>">           
		    <img src="ela-admin/user/user_images/<?= $row['userPic'] ?>" class="img-fluid" alt="<?= $row['title'] ?>">
            </a> 
          </div>
<?php
      }
      ?>
           	 
        </div>
 
      </div>
    </section> 

  </main> 

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->
  
  