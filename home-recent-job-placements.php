<section id="success-students" class="success-students alert-success">
  <div class="container">

    <div class="section-title" data-aos="fade-down">
      <h2> Our Successful Students  </h2>
    </div>

    <div class="row">

	<?php
            $sql = mysqli_query($con, "SELECT * FROM success_student_section order by id desc  limit 4 ");
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card shadow success-student my-3 overflow-hidden rounded">
          <div class="card-body p-0">
            <div class="row align-items-center">
              <div class="col-md-4">
                <img src="ela-admin/user/user_images/<?= $row['userPic'] ?>" class="img-fluid shadow" alt="<?= $row['name'] ?>">
              </div>
              <div class="col-md-8">
                <p class="m-0 p-3 text-center text-md-left">				
                 <?= $row['details'] ?>				 
                </p>
              </div>
            </div>
            <div class="row align-items-center alert-success p-3 text-dark">
              <div class="col-md-12">
                <h3><?= $row['name'] ?></h3>
                <span><?= $row['title'] ?></span>
              </div>              
            </div>
          </div>
        </div>
      </div>
<?php } ?>
	  
      <div class="col-12 mt-5 text-center" data-aos="fade-up" data-aos-delay="500">
        <a href="recent-job-placements" class="btn btn-success px-5">See More..</a>
      </div>

    </div>
  
  </div>
</section>