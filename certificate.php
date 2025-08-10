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
    <?php include('breadcrumb.php'); ?>
    <section id="contact" class="contact">
      <div class="container">

        <div class="col-lg-12 text-center mt-4">
          <br><br>
          <h3>Certificate Verification</h3>
          <hr>
        </div>

        <?php
        if (isset($errMSG)) {
        ?>
          <div class="alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
          </div>
        <?php
        } else if (isset($successMSG)) {
        ?>
          <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
          </div>
        <?php
        }
        ?>

        <div class="row mt-5 justify-content-center m-auto" data-aos="fade-up">


          <div class="col-md-4 d-flex text-center">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/e-logo.png" class="image-radius" width="80%">
              </div>
              <div class="card-body image-radius  ">
                <h5 class="card-title"><a href="verifycertificate" class="text-danger">Certificate Verify For <br> e-Learning and Earning Ltd <br> <br>
                    <button class="btn-get-started" name="btnsave" type="submit">Click Here </button>
                  </a></h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 d-flex text-center">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/buttc.png" class="image-radius" width="80%">
              </div>
              <div class="card-body image-radius  ">
                <h5 class="card-title"><a href="certificate-sylhet" class="text-danger"> ভোলানন্দ-উত্তরণ <br> কারিগরি প্রশিক্ষণ কেন্দ্র সিলেট <br> <br>
                    <button class="btn-get-started" name="btnsave" type="submit">Click Here </button>
                  </a></h5>
              </div>
            </div>
          </div>
<!--
        <div class="col-md-4 d-flex text-center">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/e-logo.png" class="image-radius" width="80%">
              </div>
              <div class="card-body image-radius  ">
                <h5 class="card-title"><a href="certificate-dyd" class="text-danger">Certificate Verify For <br> DYD <br> <br>
                    <button class="btn-get-started" name="btnsave" type="submit">Click Here </button>
                  </a></h5>
              </div>
            </div>
          </div>

-->




        </div>

      </div>

    </section>

  </main>

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->