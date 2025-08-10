<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile Settings </h1>
      <hr>
    </div>

    <section class="section profile">
      <div class="row">

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item d-none">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"> Password</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#LogoChange"> Logo</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#SignChange"> Signature</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <p class="small fst-italic"></p>

                  <h5 class="card-title">Profile Details</h5>
                  <?php
                  $dq = mysqli_query($con, "select * from stuff 
								left join `user` on user.userid=stuff.userid  
								where stuff.status='1' and stuff.userid='" . $_SESSION['id'] . "'
								order by stuff.userid asc ");
                  while ($dqrow = mysqli_fetch_array($dq)) {
                    $did = $dqrow['userid'];
                  ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['stuff_name']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Position</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['position']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Business Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['business_name']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Business Details</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['business_details']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['business_phone']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['business_email']; ?></div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Website</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['biz_web']; ?></div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['business_address']; ?></div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Website</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['biz_web']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Invoice Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['inv_name']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Invoice Welcome</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['invoice_welcome']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">User / Password</div>
                      <div class="col-lg-9 col-md-8"><?php echo $dqrow['username']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Password</div>
                      <div class="col-lg-9 col-md-8">
                        <?php
                        $pass = mysqli_query($con, "select * from `password` where mdfive='" . $dqrow['password'] . "'");
                        $passrow = mysqli_fetch_array($pass);

                        echo $passrow['original'];
                        ?>
                      </div>
                    </div>

                  <?php
                  }
                  ?>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="edit_stuff.php" enctype="multipart/form-data">
                    <?php
                    $dq = mysqli_query($con, "select * from stuff 
								left join `user` on user.userid=stuff.userid  
								where stuff.status='1' and stuff.userid='" . $_SESSION['id'] . "'
								order by stuff.userid asc ");
                    while ($dqrow = mysqli_fetch_array($dq)) {
                      $did = $dqrow['userid'];
                    ?>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="StuffName" value="<?php echo $dqrow['stuff_name']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Position</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="Position" maxlength="50" value="<?php echo $dqrow['position']; ?>  ">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="contact" value="<?php echo $dqrow['contact_info']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Business Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="BizName" value="<?php echo $dqrow['business_name']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Business Details</label>
                        <div class="col-md-8 col-lg-9">
						<textarea name="BizDetail" class="form-control" id="BizDetail" rows="3"><?php echo $dqrow['business_details']; ?></textarea>
                        </div>
                      </div>



                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Business Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="BizPhone" value="<?php echo $dqrow['business_phone']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="BizEmail" value="<?php echo $dqrow['business_email']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Website</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="BizWeb" value="<?php echo $dqrow['biz_web']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Invoice Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="InvName" value="<?php echo $dqrow['inv_name']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Invoice Welcome</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="InvWelcome" value="<?php echo $dqrow['invoice_welcome']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Business Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" name="BizAddress" value="<?php echo $dqrow['business_address']; ?>">
                        </div>
                      </div>


                    <?php
                    }
                    ?>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                  </form>

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <h5 class="card-title text-center alert alert-secondary">Change Password</h5>
                  <form role="form" method="POST" action="lock.php" enctype="multipart/form-data">

                    <div class="row mb-3 d-none">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" style="width:100%;" class="form-control" name="UserId" id="UserId" value="<?php echo $userId; ?>">
                        <input type="text" style="width:100%;" class="form-control" name="username" id="username" value="<?php echo $user; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" style="width:100%;" class="form-control" name="password" value="<?php echo $passrow['original']; ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
                </div>


                <div class="tab-pane fade pt-3" id="LogoChange">
                  <h5 class="card-title text-center alert alert-secondary">Change Logo</h5>

                  <form role="form" method="POST" action="logo.php" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Logo</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../<?php if ($srow['photo'] == "") {
                                        echo "img/profile.jpg";
                                      } else {
                                        echo $srow['photo'];
                                      } ?>" width="150px" class="rounded-circle">
                        Logo ( Please Add 300 x 300px JPG or Png )
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="file" style="width:100%;" class="form-control" name="image">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-info">Change Logo</button>
                    </div>
                  </form>
                </div>

                <div class="tab-pane fade pt-3" id="SignChange">
                  <h5 class="card-title text-center alert alert-secondary">Change Signature</h5>

                  <form role="form" method="POST" action="signature.php" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Signature</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../<?php echo $SignPhoto; ?>" width="170px" class="rounded-circle">
                        Signature ( Please Add 250px x 80px JPG or Png )
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="file" style="width:100%;" class="form-control" name="SignImg">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-info">Change Signature</button>
                    </div>
                  </form>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>


        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="../<?php if ($srow['photo'] == "") {
                              echo "img/profile.jpg";
                            } else {
                              echo $srow['photo'];
                            } ?>" width="70%" class="rounded-circle">
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
                    <?php echo $dqrow['business_details']; ?>
                  </span></b> <br>

                <img src="../<?php if ($dqrow['sign_img'] == "") {
                                echo "/img/samiul.png";
                              } else {
                                echo $dqrow['sign_img'];
                              } ?>" width="70%" class="rounded-circle">



              <?php
              }
              ?>

            </div>
          </div>

        </div>


      </div>
    </section>

  </main>

  <?php require_once 'footer1.php'; ?>