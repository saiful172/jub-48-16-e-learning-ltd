<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>
<style type="text/css">  
.mm  { background:#244a933b;  }
.card { margin-bottom: 15px;  }
</style>
</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main mm">

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

  <div class="col-xxl-2 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Courses <span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = $con->query("SELECT count(`id`) as `gtotal` FROM slider_section where user_id='" . $_SESSION['id'] . "' ");
                        $row = $sql->fetch_assoc();
                        echo $row['gtotal'];
                        ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

			
            <div class="col-xxl-2 col-md-4">
              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Slider <span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = $con->query("SELECT count(`id`) as `gtotal` FROM slider_section where user_id='" . $_SESSION['id'] . "' ");
                        $row = $sql->fetch_assoc();
                        echo $row['gtotal'];
                        ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-2 col-xl-4">

              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Gallery <span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = $con->query("SELECT count(`id`) as `gtotal` FROM gallery where user_id='" . $_SESSION['id'] . "' ");
                        $row = $sql->fetch_assoc();
                        echo $row['gtotal'];
                        ?>
                      </h6>

                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-xxl-2 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Teachers <span> | List</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-workspace"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = $con->query("SELECT count(`id`) as `gtotal` FROM team_section where user_id='" . $_SESSION['id'] . "' ");
                        $row = $sql->fetch_assoc();
                        echo $row['gtotal'];
                        ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>


            <div class="col-xxl-2 col-md-4">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">News / Blog <span> </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-newspaper"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = $con->query("SELECT count(`id`) as `gtotal` FROM news_section where user_id='" . $_SESSION['id'] . "' ");
                        $row = $sql->fetch_assoc();
                        echo $row['gtotal'];
                        ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>
			
			
			
			  <div class="col-xxl-2 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Apply <span> | List</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = $con->query("SELECT count(`id`) as `gtotal` FROM slider_section where user_id='" . $_SESSION['id'] . "' ");
                        $row = $sql->fetch_assoc();
                        echo $row['gtotal'];
                        ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>


        <div class="col-lg-8">
          <div class="row">

            <?php  // require_once 'dash-task.php'; 
            ?>
            <?php  // require_once 'dash-cash-report.php'; 
            ?>
            <?php //  require_once 'dash-report.php'; 
            ?>
            <?php // require_once 'dash-rec-sales.php'; 
            ?>

			
            <div class="col-12">
              <div class="card">
                <img class="rounded" src="../includes/cover.jpg" width="100%" />
              </div>
            </div> 
          </div>
        </div> 
		
		
        <!-- Right side columns -->
        <div class="col-lg-4">


          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-12 text-center p-2">
                <img src="../<?php if ($srow['photo'] == "") {
                                echo "img/profile.jpg";
                              } else {
                                echo $srow['photo'];
                              } ?>" width="60%" class="rounded-circle">
              </div>
              <div class="col-md-12">
                <div class="card-body text-center"><br>

                  <?php
                  $dq = mysqli_query($con, "select * from stuff 
								left join `user` on user.userid=stuff.userid  
								where stuff.status='1' and stuff.userid='" . $_SESSION['id'] . "'
								order by stuff.userid asc ");
                  while ($dqrow = mysqli_fetch_array($dq)) {
                    $did = $dqrow['userid'];
                  ?>


                    <b><span style="font-size:22px;"> <?php echo $dqrow['business_name']; ?></span></b><br>
                    <b><span style="font-size:15px;">
                        <?php echo $dqrow['business_address']; ?>
                      </span></b>


                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          


<?php // include('more-fals/budget-and-web-trafiq.php'); ?>

      
		  
        </div>
		<!-- End Right side columns -->

      </div>
	  
	  
	  <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4 text-center p-2">
                <i style="font-size:65px;" class="bi bi-clock-history text-primary"></i>
              </div>
              <div class="col-md-8">
                <div class="card-body text-center"><br>
                  <b><span style="font-size:28px;"> <?php include('time.php'); ?></span></b><br>
                  <b><span style="font-size:18px;">
                      <?php date_default_timezone_set("Asia/Dhaka");
                      $date = new DateTime();
                      echo $date->format('l - F j, Y');
                      ?> </span></b>

                </div>
              </div>
            </div>
          </div>
		  
    </section>
 
  

  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php  //require_once '../includes/footer.php';  ?>

  <?php require_once 'footer1.php'; ?>