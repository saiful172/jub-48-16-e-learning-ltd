<style>
    .stu-profile-social-icon {
        height: 30px;
    }
/* ---------- Profile Image Border Animation ---------- */
.profile-img {
    width: 200px;
    height: 200px;
    border: 5px solid transparent;
    border-radius: 50%;
    background: 
        linear-gradient(white, white) padding-box,
        linear-gradient(270deg, #DE5C5F, #FE9174, rgb(22, 247, 22), #595959, #DE5C5F) border-box;
    background-size: 300% 300%;
    background-position: 0% 50%;
    animation: gradientBorder 4s ease infinite;
}

/* ---------- Section Title Bottom Border Animation ---------- */
.profile-hr {
    position: relative;
    display: inline-block;
    padding-bottom: 5px;
    margin: 20px 0;
}

.profile-hr::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 2px;
    width: 100%;
    border-radius: 10px;
    background: linear-gradient(270deg, #DE5C5F, #FE9174, rgb(36, 235, 9), rgb(144, 21, 214), #DE5C5F);
    background-size: 400% 400%;
    animation: animateHrHorizontal 6s ease infinite;
}

/* ---------- Right-side Vertical Border Animation ---------- */
.profile-hr-right {
    position: relative;
    display: inline-block;
    padding-right: 10px;
    margin: 20px 0;
}

.profile-hr-right::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 2px;
    height: 100%;
    border-radius: 10px;
    background: linear-gradient(0deg, #DE5C5F, #FE9174, rgb(36, 235, 9), rgb(144, 21, 214), #DE5C5F);
    background-size: 400% 400%;
    animation: animateHrVertical 6s ease infinite;
    pointer-events: none;
}

/* ---------- Reusable Animations ---------- */
@keyframes gradientBorder {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes animateHrHorizontal {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes animateHrVertical {
    0% { background-position: 50% 100%; }
    50% { background-position: 50% 0%; }
    100% { background-position: 50% 100%; }
}

  
</style>
<?php

$sql = mysqli_query($con, "SELECT * FROM student_list
  LEFT JOIN district ON district.id = student_list.district
  LEFT JOIN batch_list ON batch_list.batch_id = student_list.batch_id
  LEFT JOIN group_list ON group_list.group_id = student_list.group_id 
  WHERE student_list.stu_user_id = '" . $_SESSION['id'] . "'");
$surow = mysqli_fetch_array($sql);

?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title">
                <h4 class="mb-0 font-size-18">Dashboard</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Welcome to Student Information</li>
                </ol>
            </div>

            <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1" data-colors='["--bs-primary"]'></div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2" data-colors='["--bs-danger"]'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>


<div class="page-content-wrapper" style="min-height: 60vh;">

    <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="col-md-7 col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center" style="border-bottom: 1px solid #ccc;">
                        <!-- Left Side: Photo, Name, Designation -->
                        <div class="col-md-4 profile-hr-right text-center mb-3">
                            <img src="./user_images/<?php echo $surow['userPic']; ?>" alt="<?php echo $surow['stu_name']; ?>" class="img-thumbnail profile-img rounded-circle mb-3" style="width: 180px; height: 180px;">
                            <h4 class="mb-1"><?php echo $surow['stu_name']; ?> <br>
                                <small class="text-muted"> <?php echo $surow['email']; ?> </small>
                            </h4>
                            <hr>
                            <p class="text-muted mb-0"></p>

                            <!-- social link -->

                            <div>
                               <?php if (!empty($surow['fiver'])): ?>
  <a href="<?php echo $surow['fiver']; ?>" target="_blank">
    <img class="stu-profile-social-icon" src="../images/fiverr1.png" alt="" style="height: 50px;">
  </a>
<?php endif; ?>

<?php if (!empty($surow['upwork'])): ?>
  <a href="<?php echo $surow['upwork']; ?>" target="_blank">
    <img class="stu-profile-social-icon" src="../images/upwork.png" alt="" style="height: 37px;">
  </a>
<?php endif; ?>

<?php if (!empty($surow['linked_in'])): ?>
  <a href="<?php echo $surow['linked_in']; ?>" target="_blank">
    <img class="stu-profile-social-icon" src="../images/linkedin.jpg" alt="" style="height: 37px;">
  </a>
<?php endif; ?>

<?php if (!empty($surow['link_three'])): ?>
  <a href="<?php echo $surow['link_three']; ?>" target="_blank">
    <img class="stu-profile-social-icon" src="../images/link-1.png" alt="">
  </a>
<?php endif; ?>

<?php if (!empty($surow['link_four'])): ?>
  <a href="<?php echo $surow['link_four']; ?>" target="_blank">
    <img class="stu-profile-social-icon" src="../images/link-2.png" alt="">
  </a>
<?php endif; ?>

<!-- <a href="<?php echo $surow['fiver']; ?>"><img class="stu-profile-social-icon" src="../images/fiverr1.png" alt="" style="height: 50px;"></a>
                                <a href="<?php echo $surow['upwork']; ?>"><img class="stu-profile-social-icon" src="../images/upwork.png" alt="" style="height: 37px;"></a>
                                <a href="<?php echo $surow['link_three']; ?>"><img class="stu-profile-social-icon" src="../images/linkedin.jpg" alt="" style="height: 37px;"></a>
                                <a href="<?php echo $surow['link_three']; ?>"><img class="stu-profile-social-icon" src="../images/link-1.png" alt=""></a>
                                <a href="<?php echo $surow['link_four']; ?>"><img class="stu-profile-social-icon" src="../images/link-2.png" alt=""></a> -->
                            </div>
                        </div>

                        <!-- Right Side: Details -->
                        <div class="col-md-8">
                            <h3 class="profile-hr">Personal Information</h3>
                            <ul style="list-style-type: none; padding: 0; line-height: 1.5;">
                                <li><strong>Father's Name:</strong> <?php echo $surow['father_name']; ?></li>
                                <li><strong>Mother's Name:</strong> <?php echo $surow['mother_name']; ?></li>
                                <li><strong>Phone Number:</strong> <?php echo $surow['contact']; ?></li>
                                <li><strong>Present Address:</strong> <?php echo $surow['address']; ?></li>
                                <li><strong>Permanent Address:</strong> <?php echo $surow['perma_address']; ?></li>
                                <li><strong>Age:</strong> <?php echo $surow['age']; ?></li>
                                <li><strong>NID/Birth Certificate No:</strong> <?php echo $surow['nid_no']; ?></li>
                                <li><strong>Blood Group:</strong> <?php echo $surow['blood_grp']; ?></li>
<?php
// Query to get total income for logged-in user
$sql = mysqli_query($con, "SELECT SUM(earning_bd) AS total_bd , SUM(earning_dollar) AS total_usd FROM income_info WHERE user_id = '" . $_SESSION['id'] . "'");
$icomerow = mysqli_fetch_assoc($sql);
?>

<li><strong>Total Earning BD:</strong> <?php echo $icomerow['total_bd'] ?? 0; ?> BDT</li>
<li><strong>Total Earning USD:</strong> <?php echo $icomerow['total_usd'] ?? 0; ?> USD</li>


                            </ul>
                        </div>
                    </div>
                  
                   
                    <div class="col-md-12 px-5 mt-3">
                        <p><strong>About:</strong> <?php echo $surow['about']; ?></p>
                    </div>
                   <div class="d-flex justify-content-between align-items-center mt-4">
    <!-- Left Side Button -->
    <a href="earning-add-with-student" class="btn btn-dark">
        <i class="fa fa-add me-1"></i> Add Earning
    </a>

    <!-- Right Side Buttons -->
    <div class="d-flex gap-2">
        <a href="change-password" class="btn btn-success">
            <i class="fa fa-edit me-1"></i> Change Password 
        </a>
        <a href="student-edit" class="btn btn-primary">
            <i class="fa fa-edit me-1"></i> Update Information 
        </a>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

    
</div>



<?php
if (isset($_GET['delete_id'])) {
  $stmt_select = $DB_con->prepare('SELECT incomePics FROM income_info WHERE in_id = :uid');
  $stmt_select->execute(array(':uid' => $_GET['delete_id']));
  $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
  if ($imgRow && isset($imgRow['incomePics'])) {
    $images = explode(',', $imgRow['incomePics']);
    foreach ($images as $image) {
      if (file_exists($image)) {
        unlink($image); 
      }
    }
  }

  $stmt_delete = $DB_con->prepare('DELETE FROM income_info WHERE in_id  =:uid');
  $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  $stmt_delete->execute();
}

?>

 <div class="page-content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header border-bottom py-4 d-flex align-items-center justify-content-between">
                    <h4 class="card-title m-0">All Earning Lists</h4>
                  
                  </div>
                  <hr class="m-0">
                  <div class="card-body">
                    <table id="" class="table table-bordered table-hover align-middle" style="background-color: blue !important;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>Dollar</th>
                          <th>BD.TK</th>
                          <th>Payment</th>
                          <th>Platform</th>
                          <th>Job</th>
                          <th>Photo</th>
                       
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sl = 0;
                        // Assuming $con is your database connection object
                        $eq = mysqli_query($con, "SELECT * FROM income_info 
                              LEFT JOIN student_list ON income_info.student_id = student_list.student_id
                              LEFT JOIN district ON student_list.district = district.id
                              LEFT JOIN batch_list ON batch_list.batch_id = student_list.batch_id
                              LEFT JOIN payment_method ON income_info.payment_type = payment_method.pm_id
                              LEFT JOIN work_source ON income_info.work_source = work_source.ws_id
                              LEFT JOIN jobs ON income_info.job_id = jobs.j_id where income_info.user_id = '" . $_SESSION['id'] . "' 
                              ORDER BY income_info.in_id DESC");
                        while ($eqrow = mysqli_fetch_array($eq)) {
                          $sl++;
                        ?>
                          <tr>
                            <td><?= $sl; ?></td>
                            <td width="14%"><?= $eqrow['earning_date']; ?></td>
                            <td>
                              <?php
                              if ($eqrow['earning_dollar'] == null || $eqrow['earning_dollar'] == 0) {
                                echo '-';
                              } else {
                                echo '$' . number_format($eqrow['earning_dollar'], 2);
                              }
                              ?>
                            </td>

                            <td>
                              <?php
                              if ($eqrow['earning_bd'] == null || $eqrow['earning_bd'] == 0) {
                                echo '-';
                              } else {
                                echo '৳' . number_format($eqrow['earning_bd'], 2);
                              }
                              ?>
                            </td>
                            <td><?= $eqrow['payment_name'] ?? '-' ?></td>
                            <td><?= $eqrow['work_name'] ?? '-' ?></td>
                            <td><?= $eqrow['job_name'] ?? '-' ?></td>
                            <td width="8%">
  <div class="text-center d-flex align-items-center">
    <?php
    $images = explode(",", $eqrow['incomePics']);
    foreach ($images as $index => $image) {
      $imgSrc = $image == null ? 'website/favicon.png' : $image;
      echo "
        <img src='$imgSrc' alt='Image' class='img-fluid img-thumbnail m-1 preview-thumb' 
             style='width:30px;height:30px; cursor: pointer;' 
             onclick=\"showFullImage('$imgSrc')\">";
    }
    ?>
  </div>
</td>

                          
                          </tr>
                        <?php
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Fullscreen Image Viewer -->
<div id="imgModal" onclick="closeImage()" style="display:none; position:fixed; z-index:9999; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center;">
  <img id="fullImg" src="" style="max-width:90%; max-height:90%; border:5px solid white; border-radius:10px;">
</div>


          <script>
  function showFullImage(src) {
    document.getElementById("fullImg").src = src;
    document.getElementById("imgModal").style.display = "flex";
  }

  function closeImage() {
    document.getElementById("imgModal").style.display = "none";
  }
</script>
