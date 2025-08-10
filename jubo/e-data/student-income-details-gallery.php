<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>শিক্ষিত কর্মপ্রত্যাশি যুবদের ফ্রিল্যান্সিং প্রশিক্ষণের মাধ্যমে কর্মসংস্থান সৃষ্টি - E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <?php include('link.php'); ?>

  <!-- Include Lightbox CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

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

    .title {
      text-align: center;
      margin: 4rem 0 12px 0;
    }

    .title h4 {
      font-size: 16px;
      background: rgb(11, 164, 6, .3);
      display: inline-block;
      padding: 8px 48px;
      border-radius: 4px;
      color: #000;
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
  if (isset($_GET['student_id']) && !empty($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
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


    <div class="title">
      <h4>Earning Info Status On Image</h4>
    </div>



    <div class="incomePic text-center">
      <?php
      $StudentId = $_GET['student_id'];
      $stmt = $DB_con->prepare("SELECT * FROM income_info WHERE student_id = ?");
      $stmt->execute([$StudentId]);
      while ($eqrow = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $images = explode(",", $eqrow['incomePics']);
        foreach ($images as $key => $image) {
          $imageId = "image_" . $key;
          echo "<a href='../dist/$image' data-lightbox='incomeGallery' data-title='Image'><img src='../dist/$image' alt='Image' class='rounded m-1' style='width: 320px; height: 220px;'></a>";
        }
      }
      ?>
    </div>


    <!-- Include Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>

  </div>


  <br><br>