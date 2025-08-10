<section id="features" class="features m-0 py-5">
  <div class="container py-5">
          
    <div class="section-title" data-aos="fade-down">
      <h2>Why Chose Us</h2>
    </div>

    <div class="row"> 
	
	
	  <div class="col-lg-5 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="100">
	  <?php
            $sql = mysqli_query($con, "SELECT * FROM features_all  where id=4 ");
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
       <img src="ela-admin/user/user_images/<?= $row['image'] ?>" alt="Why Chose Us"  width="100%" class="img-fluid rounded-pill">
       <?php } ?>
	  </div>
	  
	  <div class="col-lg-7 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="100">
	      <?php
            $sql = mysqli_query($con, "SELECT * FROM why_section");
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
			
      <div class="col-lg-12 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <i class="ri-checkbox-multiple-fill" style="color:#5578ff;"></i>
          <h3><a href="javascript:void(0)"><?= $row['title'] ?></a></h3>
        </div>
      </div>
	   
	  <?php } ?>
         
      </div>
	   



    </div>




  </div>
</section>