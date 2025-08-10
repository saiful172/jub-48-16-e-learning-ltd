<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>


</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

 <!--    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div> -->

    <section class="section dashboard">
      <div class="row">
	  
        <div class="col-lg-12">
          <div class="row">
			
			
			  <div class="col-xxl-3 col-md-3">
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
                  <h5 class="card-title">Product <span>| Stock</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
					  <?php 
$sql = $con->query("SELECT count(`product_id`) as `gtotal` FROM product where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					  </h6>
                      <span class="text-success small pt-1 fw-bold">1230</span> <span class="text-muted small pt-2 ps-1">Quantity</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
			
	           <div class="col-xxl-3 col-xl-3">

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
                  <h5 class="card-title">Supplier <span>| Dues</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
					  <?php 
$sql = $con->query("SELECT count(`customer_id`) as `gtotal` FROM `customer` WHERE member_id='".$_SESSION['id']."' and status=1 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					  </h6>
                      <span class="text-danger small pt-1 fw-bold">35000/-</span> <span class="text-muted small pt-2 ps-1">Taka</span>

                    </div>
                  </div>

                </div>
              </div>
            </div> 	
			
            <div class="col-xxl-3 col-md-3">
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
                  <h5 class="card-title">Clients <span>| Dues</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
<?php 
$sql = $con->query("SELECT count(`customer_id`) as `gtotal` FROM `customer` WHERE member_id='".$_SESSION['id']."' and status=1 ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					  </h6>
                      <span class="text-success small pt-1 fw-bold">40,000/-</span> <span class="text-muted small pt-2 ps-1">Taka</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> 

           
            <div class="col-xxl-3 col-md-3">
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
                  <h5 class="card-title">Order <span>| Invoice</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
					  <?php 
$sql = $con->query("SELECT count(`order_id`) as `gtotal` FROM `orders` WHERE user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['gtotal'];
?>
					  </h6>
                      <span class="text-success small pt-1 fw-bold">12</span> <span class="text-muted small pt-2 ps-1">Today</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> 
</div>
</div> 
			
			
 <div class="col-lg-8">
<div class="row">			

<?php  // require_once 'dash-task.php'; ?>           
<?php  // require_once 'dash-cash-report.php'; ?>           
<?php //  require_once 'dash-report.php'; ?>  
<?php // require_once 'dash-rec-sales.php'; ?>  




            <!-- Top Selling -->
       
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
		
		 <div class="card mb-3 text-center">
            <div class="row g-0">              
              <div class="col-md-12">
                <div class="card-body">
				  
                </div>
              </div>
            </div>
          </div> 
		  
		  <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4 text-center p-2">
               <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="70%" class="rounded-circle">
              </div>
              <div class="col-md-8">
                <div class="card-body"><br>
				
				<?php
								$dq=mysqli_query($con,"select * from stuff 
								left join `user` on user.userid=stuff.userid  
								where stuff.status='1' and stuff.userid='".$_SESSION['id']."'
								order by stuff.userid asc ");
								while($dqrow=mysqli_fetch_array($dq)){
									$did=$dqrow['userid'];
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
		  
           
         

          <!-- Budget Report -->
          <div class="card">
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

            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
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

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main>
  
  <!-- End #main -->

  <!-- ======= Footer ======= -->
   <?php  //require_once '../includes/footer.php'; ?>
   
   <?php  require_once 'footer1.php'; ?>