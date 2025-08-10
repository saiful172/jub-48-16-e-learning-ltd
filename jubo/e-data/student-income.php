<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>শিক্ষিত কর্মপ্রত্যাশি যুবদের ফ্রিল্যান্সিং প্রশিক্ষণের মাধ্যমে কর্মসংস্থান সৃষ্টি - E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <?php include('link.php'); ?>

  <style type="text/css">
    .table td,
    .table th {
      padding: 2px;
    }

    .all {
      width: 70%;
      margin: auto;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 5px;
    }

    .table td,
    .table th {
      vertical-align: middle !important;
    }

    .table thead tr>th {
      padding: 12px 0 !important;
      padding-inline: 12px !important;
    }

    .table tbody tr>td {
      padding-inline: 12px !important;
    }

    .student_info h4 {
      margin-top: 1rem;
    }

    .student_info h6 {
      color: #000;
    }

    .student_info p {
      text-align: center;
      color: #000;
    }
  </style>

</head>

<body>

  <div class="d-none"> <?php include('header.php'); ?></div>

  <section id="about-us" class="about-us p-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mt-1">
          <img src="assets/img/all/banner.jpg" class="img-fluid rounded shadow" alt="" width="100%">
        </div>
      </div>
    </div>
  </section>

  <?php


  if (isset($_GET['income_id']) && !empty($_GET['income_id'])) {
    $student_id = $_GET['income_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM student_list 
    left join district on district.id=student_list.district 
    left join batch_list on batch_list.batch_id=student_list.batch_id 
    left join group_list on group_list.group_id=student_list.group_id 
    WHERE student_list.student_id =:uid');
    $stmt_edit->execute(array(':uid' => $student_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  }

  ?>

  <div class="container mt-4">

    <div class="student_info">
      <div class="card text-center">
        <div class="card-body">
          <img class="rounded" src="../dist/user_images/<?php echo $userPic; ?>" height="150" width="150">
          <h4><?php echo $stu_name; ?> <br></h4>
          <h6>District : <?php echo $dist_name; ?> | <?php echo $batch_name; ?> | <?php echo $group_name; ?> | Contact: <?= $contact ?> | Email: <?= $email ?></h6>
          <p><?php echo $about; ?></p>

          <a href="student-income-details-gallery?student_id=<?= $student_id ?>" class="btn btn-success">Earning Gallery</a>
        </div>
      </div>
    </div>


    <div class="card mt-4">
      <div class="card-body">
        <table class="table table-hover table-striped m-0">

          <thead class="bg-dark text-white">
            <tr>
              <th>Date</th>
              <th>Dollar ($)</th>
              <th>BD.TK (৳)</th>
              <th>Source</th>
              <th>Payment Method</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $StudentId = $_GET['income_id'];
            $stmt = $DB_con->prepare("SELECT i.*, p.payment_name, w.work_name
            FROM income_info AS i
            LEFT JOIN payment_method AS p ON i.payment_type = p.pm_id
            LEFT JOIN work_source AS w ON i.work_source = w.ws_id
            WHERE i.student_id = ?");
            $stmt->execute([$StudentId]);
            $rowCount = $stmt->rowCount();

            // Check if any records are found
            if ($rowCount > 0) {
              while ($eqrow = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                  <td><?= $eqrow['earning_date'] ?></td>

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

                  <td><?= $eqrow['work_name'] ?? '-' ?></td>
                  <td><?= $eqrow['payment_name'] ?? '-' ?></td>
                  <td>
                    <?php
                    $images = explode(",", $eqrow['incomePics']);
                    foreach ($images as $image) {
                      echo "<img src='../dist/$image' alt='Image' class='rounded m-1' style='width: 40px; height: 40px;'>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="student-income-details?view_id=<?= $eqrow['in_id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> View</a>
                    <!-- <a href="#" class="btn btn-danger btn-sm">Delete</a> -->
                  </td>
                </tr>
              <?php
              }
            } else {
              // If no records found, display a message
              ?>
              <tr>
                <td colspan="12" class="text-center py-2">No records found.!</td>
              </tr>
            <?php
            }
            ?>
          </tbody>




        </table>
      </div>
    </div>


  </div>


  <br><br>