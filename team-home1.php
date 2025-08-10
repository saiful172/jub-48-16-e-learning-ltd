  <section id="team" class="team  pt-5 mt-5">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Our <strong>Expert</strong> Instructor </h2> 
      </div>


      <div class="row" style="margin:auto;">

        <?php
        $sql = mysqli_query($con, "SELECT * FROM teacher_section");
        while ($row = mysqli_fetch_assoc($sql)) { ?>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch zoom">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="new/ela-admin/user/user_images/<?= $row['userPic'] ?>" class="img-fluid" alt="<?= $row['teacher_title'] ?>" width="100%">
              </div>
              <div class="member-info alert-success">
                <h4><?= $row['teacher_title'] ?></h4>
                <p><?= $row['teacher_subtitle'] ?></p>
              </div>
            </div>
          </div>
          
        <?php
        }
        ?>


      </div>

    </div>
  </section>