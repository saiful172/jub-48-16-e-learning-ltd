<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Our Branches - E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <?php include('link.php'); ?>  
<style>
    .branch-title-icon{
        font-size: 35px !important;
        color: #159E42 !important;
    }
	
	.faq .faq-list{
	padding: 0px !important;
	}
</style>
</head>

<body>
<?php include('header.php'); ?>
 
    <main id="main">
    <?php include('breadcrumb.php'); ?>
	         
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Our Division and Branch Address</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <?php
                        // Fetch all divisions
                        $query_divisions = "SELECT * FROM division ORDER BY div_id ASC";
                        $result_divisions = mysqli_query($con, $query_divisions);

                        while ($row_div = mysqli_fetch_assoc($result_divisions)) {
                            $div_id = $row_div['div_id'];
                            $div_name = $row_div['div_name'];
                        ?>
                            <li data-aos="fade-up">
                                <a data-toggle="collapse" class="collapse" href="#faq-list-<?= $div_id ?>">
                                 <h4 style="color:#232088 !important;"> <i class='bx bxs-location-plus' ></i>                                   
								   <?= $div_name ?>
								 </h4>  
                                    <i class="bx bx-chevron-down icon-show"></i>
                                    <i class="bx bx-chevron-up icon-close"></i>
                                </a>
                                <div id="faq-list-<?= $div_id ?>" class="collapse" data-parent=".faq-list">
                                    
									 <hr>
									<div class="row">
                                        <?php
                                        // Fetch all branches under this division
                                        $query_branches = "SELECT * FROM branch WHERE div_id = '$div_id' ORDER BY br_id ASC";
                                        $result_branches = mysqli_query($con, $query_branches);

                                        while ($row_br = mysqli_fetch_assoc($result_branches)) {
                                        ?>
                                            <div class="col-lg-6 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="100">
                                                <div class="col-lg-12 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                                                    <div class="icon-box d-flex">													
                                                         <i class='bx bxs-building-house' style="color:#5578ff; font-size: 23px"></i>
                                                         <h5 class="ml-4"><?= $row_br['br_name'] ?></h5>
                                                    </div>
                                                    <div class="ml-5">
                                                        <strong><i class='bx bxs-location-plus'></i> Location  :</strong>   <?= $row_br['br_address'] ?> <br>
                                                        <strong><i class='bx bxs-phone'></i> Phone :</strong> <?= $row_br['br_contact'] ?> <br>
                                                        <strong><i class='bx bxs-envelope'></i> Email :</strong> <?= $row_br['br_mail'] ?> <br>
                                                    </div>
                                                </div><hr>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </section>
        <!-- End Frequently Asked Questions Section -->

    </main>

    <?php include('footer.php'); ?>
</body>

</html>
