<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <style>
    h3 {
      margin: 0 !important;
      padding: 0 !important;
    }

    form {
      margin: 0 !important;
    }

    .container {
      margin-bottom: 5rem !important;
    }

    .card-body {
      padding: 1.5rem !important;
    }

    .form-group label {
      text-align: left !important;
      display: block;
    }
  </style>

</head>

<body>



  <?php
  if (isset($_POST['submit'])) {
    $UserId = $_POST['UserId'];
    $StudentID = $_POST['StudentID'];
    // $EarningDate = $_POST['EarningDate'];
    $EarningDate = date('Y-m-d');
    $WorkSource = $_POST['WorkSource'] ?? null;
    $PaymentMethod = $_POST['PaymentMethod'] ?? null;
    $TotalDollar = $_POST['TotalDollar'];
    $TotalBD = $_POST['TotalBD'];
    $Job = $_POST['Job'] ?? null;
    $StudentId = $_GET['add_id'];

    // File upload handling
    $upload_dir = 'income_images/'; // upload directory
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    $images = $_FILES['images'] ?? null;

    $imagePaths = [];

    foreach ($images['name'] as $key => $imgFile) {
      $tmp_dir = $images['tmp_name'][$key];
      $imgSize = $images['size'][$key];
      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
      $userpic = "e-laeltd-" . rand(9999, 9999999) . $imgFile; // rename uploading image

      // Validate image file
      if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
        if ($imgSize < 500000) {
          // Move uploaded file to directory
          if (move_uploaded_file($tmp_dir, $upload_dir . $userpic)) {
            $imagePaths[] = $upload_dir . $userpic; // Collect the image paths
          } else {
            $errMSG = "Error while uploading file: " . $imgFile;
            break;
          }
        } else {
          $errMSG = "Sorry, your file is too large: " . $imgFile;
          break;
        }
      }
    }

    if (empty($errMSG)) {
      // Prepare the SQL query
      $sql = "INSERT INTO income_info (user_id, student_id, studentID, earning_date, work_source, payment_type, earning_dollar, earning_bd, job_id, incomePics, status) 
              VALUES (:UserId, :StudentId, :StudentID, :EarningDate, :WorkSource, :PaymentMethod, :TotalDollar, :TotalBD, :Job, :upic, 1)";

      // Prepare statement
      $stmt = $DB_con->prepare($sql);

      // Bind parameters
      $stmt->bindParam(':UserId', $UserId);
      $stmt->bindParam(':StudentId', $StudentId);
      $stmt->bindParam(':StudentID', $StudentID);
      $stmt->bindParam(':EarningDate', $EarningDate);
      $stmt->bindParam(':WorkSource', $WorkSource);
      $stmt->bindParam(':PaymentMethod', $PaymentMethod);
      $stmt->bindParam(':TotalDollar', $TotalDollar);
      $stmt->bindParam(':TotalBD', $TotalBD);
      $stmt->bindParam(':Job', $Job);
      $upicImploded = implode(",", $imagePaths); // Implode image paths into a string
      $stmt->bindParam(':upic', $upicImploded);

      // Execute the query
      if ($stmt->execute()) {
        echo '<script>alert("Data Successfully Added."); window.location.href = window.location.href;</script>';
        exit; // Exit after redirect
      } else {
        $errMSG = "Error while inserting data.";
      }
    } else {
      echo '<script>alert("' . $errMSG . '");</script>';
    }
  }
  ?>


  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-8 text-center">
        <?php
        $StudentId = $_GET['add_id'];
        $eq = mysqli_query($con, "SELECT * FROM student_list WHERE student_id= $StudentId");
        while ($eqrow = mysqli_fetch_array($eq)) {
        ?>
          <img src="../dist/user_images/<?= $eqrow['userPic']; ?>" class="img-rounded" height="60px;" width="60px;" />
          <h3 style="margin: 12px 0 28px 0 !important;"> <?php echo $eqrow['stu_name']; ?></h3>
        <?php } ?>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <?php
              $pq = mysqli_query($con, "SELECT * FROM stuff LEFT JOIN `user` ON user.userid=stuff.userid WHERE stuff.userid='" . $_SESSION['id'] . "'");
              while ($pqrow = mysqli_fetch_array($pq)) {
              ?>
                <input type="hidden" name="UserId" value="<?php echo $pqrow['userid']; ?>">
              <?php } ?>

              <div class="form-group">
                <label for="StudentID" class="form-label">Student ID</label>
                <input type="text" class="form-control" name="StudentID" id="StudentID" placeholder="Enter student ID number" required>
              </div>


              <div class="form-group" style="display: none;">
                <label for="EarningDate" class="form-label">Earning Date</label>
                <input type="date" class="form-control" name="EarningDate" id="EarningDate">
              </div>


              <div class="form-group">
                <label for="WorkSource" class="form-label">Earning Platform</label>
                <select name="WorkSource" id="WorkSource" class="form-control">
                  <option disabled selected>-- Selected Earning Platform --</option>
                  <?php
                  $eq = mysqli_query($con, "SELECT * FROM work_source ORDER BY ws_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                  ?>
                    <option value="<?= $eqrow['ws_id'] ?>"> <?= $eqrow['work_name'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="PaymentMethod" class="form-label">Payment Method</label>
                <select name="PaymentMethod" id="PaymentMethod" class="form-control">
                  <option disabled selected>-- Selected Payment Meathod --</option>
                  <?php
                  $eq = mysqli_query($con, "SELECT * FROM payment_method ORDER BY pm_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                  ?>
                    <option value="<?= $eqrow['pm_id'] ?>"> <?= $eqrow['payment_name'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="Job" class="form-label">Jobs</label>
                <select name="Job" id="Job" class="form-control">
                  <option disabled selected>-- Selected Job --</option>
                  <?php
                  $eq = mysqli_query($con, "SELECT * FROM jobs ORDER BY j_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                  ?>
                    <option value="<?= $eqrow['j_id'] ?>"> <?= $eqrow['job_name'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="TotalDollar" class="form-label">Total Earning Dollar ($)</label>
                <input type="number" class="form-control" name="TotalDollar" id="TotalDollar" placeholder="Enter total earning Dollar ($)" value='0'>
              </div>

              <div class="form-group">
                <label for="TotalBD" class="form-label">Total Earning (BD.TK)</label>
                <input type="number" class="form-control" name="TotalBD" id="TotalBD" placeholder="Enter total earning BD.TK" value='0'>
              </div>

              <div class="form-group">
                <label for="images" class="form-label">Images</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*" onchange="previewImages(event)">
              </div>

              <button type="submit" name="submit" class="btn btn-success">Save Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include('includes/footer.php'); ?>