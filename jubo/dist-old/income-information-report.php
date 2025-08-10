<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>শিক্ষিত কর্মপ্রত্যাশি যুবদের ফ্রিল্যান্সিং প্রশিক্ষণের মাধ্যমে কর্মসংস্থান সৃষ্টি - E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">


  <style>
    h1,
    h2,
    h3,
    h4 {
      margin: 0 !important;
      margin-bottom: 1.5rem !important;
    }

    table {
      text-align: left !important;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('header.php'); ?>
  <!-- End Header -->

  <main id="main">
    <?php //include('breadcrumb.php'); 
    ?>

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us mt-5">
      <div class="container" data-aos="fade-left">


        <div class="row content">


          <div class="col-lg-12 mt-1" data-aos="fade-left">
            <img src="assets/img/all/banner.jpg" class="img-fluid rounded shadow" alt="" width="100%">
          </div>


          <div class="col-lg-12 mt-3" data-aos="fade-left">
            <div class="shadow rounded p-2 text-center">
              <h3>
                <?php
                $DistId = $_POST['DistId'];
                $Batch = $_POST['Batch'];
                $Group = $_POST['Group'];

                $pq = mysqli_query($con, "SELECT * FROM district  where id = '$DistId' ");
                while ($pqrow = mysqli_fetch_array($pq)) {
                ?>
                  <b> <?php echo $pqrow['dist_name']; ?> District</b>

                <?php } ?>
              </h3>
            </div>
          </div>


          <div class="col-lg-12 mt-3" data-aos="fade-left">
            <h3 class="text-center shadow rounded p-3"> <strong> Course Student List </strong></h3>
          </div>

          <div class="col-lg-12 mt-3" data-aos="fade-left">
            <h3 class="text-center shadow rounded p-3"> <strong> Student List :
                <?php
                $pq = mysqli_query($con, "SELECT * FROM batch_list  where batch_id = '$Batch' ");
                while ($pqrow = mysqli_fetch_array($pq))
                  echo $pqrow['batch_name'];
                ?>

                <?php
                $pq = mysqli_query($con, "SELECT * FROM group_list  where group_id = '$Group' ");
                while ($pqrow = mysqli_fetch_array($pq))
                  echo '| ' . $pqrow['group_name'];
                ?>

              </strong></h3>
          </div>


          <table width="100%" class="table table-hover text-center" student_id="dataTables-example">
            <thead>

              <tr>

                <th>SL</th>
                <th>Name</th>
                <th>Father</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody id="tbody">
              <?php
              $sl = 0;
              $DistId = $_POST['DistId'];
              $Batch = $_POST['Batch'];
              $Group = $_POST['Group'];

              $eq = mysqli_query($con, "SELECT * FROM student_list WHERE district = '$DistId' AND batch_id= '$Batch' AND group_id= '$Group' ORDER BY student_id ASC");

              while ($eqrow = mysqli_fetch_array($eq)) {
              ?>
                <tr>

                  <td><?php echo ++$sl; ?></td>
                  <td><?php echo $eqrow['stu_name']; ?></td>
                  <td><?php echo $eqrow['father_name']; ?></td>
                  <td> <img src="../dist/user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
                  <td><strong class="text-success"><i class="glyphicon glyphicon-check"></i></strong></td>

                  <td><a href="income-information-add?add_id=<?php echo $eqrow['student_id']; ?>" target="_blank" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Income</a></td>

                </tr>
              <?php
              }
              ?>



            </tbody>
          </table>


        </div>

      </div>
    </section>

  </main>


  <?php include('includes/footer.php'); ?>