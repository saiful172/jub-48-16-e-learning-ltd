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
  // Check if edit_id is set and not empty
  if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $evidence_id = $_GET['edit_id'];

    // Assuming $DB_con is your PDO database connection
    $stmt_edit = $DB_con->prepare('SELECT * FROM income_info WHERE in_id = :uid');
    $stmt_edit->execute(array(':uid' => $evidence_id));

    // Fetch the row
    if ($edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC)) {
      // Extracting variables from the fetched row
      extract($edit_row);
    } else {
      // Redirect if no record found
      header("Location: index.php");
      exit(); // Exit after redirect
    }
  } else {
    // Redirect if edit_id is not set
    header("Location: index.php");
    exit(); // Exit after redirect
  }

  // Check if form is submitted
  if (isset($_POST['submit'])) {
    // Now handle other form fields
    $UserId = $_POST['UserId'];
    $StudentID = $_POST['StudentID'];
    $EarningDate = $_POST['EarningDate'];
    $WorkSource = $_POST['WorkSource'] ?? null;
    $PaymentMethod = $_POST['PaymentMethod'] ?? null;
    $TotalDollar = $_POST['TotalDollar'] ?? null;
    $TotalBD = $_POST['TotalBD'] ?? null;
    $Job = $_POST['Job'] ?? null;

    // Prepare the SQL query for updating other fields
    $sql = "UPDATE income_info SET user_id = :UserId, studentID = :StudentID, earning_date = :EarningDate,
      work_source = :WorkSource, payment_type = :PaymentMethod, earning_dollar = :TotalDollar, earning_bd = :TotalBD, job_id = :Job, 
      status = 1 WHERE in_id = :IncomeId";

    // Prepare statement
    $stmt = $DB_con->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':UserId', $UserId);
    $stmt->bindParam(':StudentID', $StudentID);
    $stmt->bindParam(':EarningDate', $EarningDate);
    $stmt->bindParam(':WorkSource', $WorkSource);
    $stmt->bindParam(':PaymentMethod', $PaymentMethod);
    $stmt->bindParam(':TotalDollar', $TotalDollar);
    $stmt->bindParam(':TotalBD', $TotalBD);
    $stmt->bindParam(':Job', $Job);
    $stmt->bindParam(':IncomeId', $evidence_id);

    // Execute the query for updating other fields
    if ($stmt->execute()) {
      // File upload handling
      if (!empty($_FILES['images']['name'][0])) {
        $upload_dir = 'income_images/'; // upload directory
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // Unlink old images associated with the record
        $old_images = explode(",", $incomePics);
        foreach ($old_images as $old_image) {
          if (!empty($old_image)) {
            unlink($old_image);
          }
        }

        $imagePaths = [];

        foreach ($_FILES['images']['name'] as $key => $imgFile) {
          $tmp_dir = $_FILES['images']['tmp_name'][$key];
          $imgSize = $_FILES['images']['size'][$key];
          $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
          $userpic = "e-laeltd-" . rand(9999, 9999999) . $imgFile; // rename uploading image

          // Validate image file
          if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 5000000) {
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

        // If new images were uploaded, update image paths in the database
        if (!empty($imagePaths)) {
          $upicImploded = implode(",", $imagePaths); // Implode image paths into a string

          // Prepare SQL query for updating image paths
          $sql_img = "UPDATE income_info SET incomePics = :upic WHERE in_id = :IncomeId";

          // Prepare statement for updating image paths
          $stmt_img = $DB_con->prepare($sql_img);

          // Bind parameters for image paths update
          $stmt_img->bindParam(':upic', $upicImploded);
          $stmt_img->bindParam(':IncomeId', $evidence_id);

          // Execute the query for updating image paths
          $stmt_img->execute();
        }
      }

      // Redirect after successful update
      echo '<script>alert("Data Successfully Update."); window.location.href = window.location.href;</script>';
      exit; // Exit after redirect
    } else {
      $errMSG = "Error while updating data.";
    }
  }
  ?>




  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-8 text-center">
        <?php
        $StudentId = $edit_row['student_id'];
        $eq = mysqli_query($con, "SELECT * FROM student_list WHERE student_id= $StudentId");
        while ($eqrow = mysqli_fetch_array($eq)) {
        ?>
          <img src="../dist/user_images/<?= $eqrow['userPic']; ?>" class="img-rounded" height="60px;" width="60px;" />
          <h3 style="margin: 12px 0 28px 0 !important;"> <?php echo $eqrow['stu_name']; ?></h3>
        <?php } ?>
      </div>


      <div class="col-md-8">
        <?php
        if (isset($msg)) { ?>
          <div class="alert alert-danger"><?= $msg ?></div>
        <?php } ?>

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
                <input type="text" class="form-control" name="StudentID" id="StudentID" value="<?= $edit_row['studentID'] ?>" placeholder="Enter student ID number" required>
              </div>

              <div class="form-group" style="display: none;">
                <label for="EarningDate" class="form-label">Earning Date</label>
                <input type="date" class="form-control" name="EarningDate" id="EarningDate" value="<?= $edit_row['earning_date'] ?>">
              </div>


              <div class="form-group">
                <label for="WorkSource" class="form-label">Earning Platform</label>
                <select name="WorkSource" id="WorkSource" class="form-control">
                  <option disabled selected>-- Selected Earning Platform --</option>
                  <?php
                  $eq = mysqli_query($con, "SELECT * FROM work_source ORDER BY ws_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                  ?>
                    <option value="<?= $eqrow['ws_id'] ?>" <?= $edit_row['work_source'] == $eqrow['ws_id'] ? 'selected' : '' ?>> <?= $eqrow['work_name'] ?> </option>
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
                    <option value="<?= $eqrow['pm_id'] ?>" <?= $edit_row['payment_type'] == $eqrow['pm_id'] ? 'selected' : '' ?>> <?= $eqrow['payment_name'] ?> </option>
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
                    <option value="<?= $eqrow['j_id'] ?>" <?= $edit_row['job_id'] == $eqrow['j_id'] ? 'selected' : '' ?>> <?= $eqrow['job_name'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="TotalDollar" class="form-label">Total Earning Dollar ($)</label>
                <input type="number" class="form-control" name="TotalDollar" id="TotalDollar" placeholder="Enter total earning Dollar ($)" value="<?= $edit_row['earning_dollar'] ?>">
              </div>

              <div class="form-group">
                <label for="TotalBD" class="form-label">Total Earning (BD.TK)</label>
                <input type="number" class="form-control" name="TotalBD" id="TotalBD" placeholder="Enter total earning BD.TK" value="<?= $edit_row['earning_bd'] ?>">
              </div>

              <div class="form-group text-left">
                <label for="image" class="form-label">Image</label>
                <div class="d-flex" style="margin-bottom: 8px;">
                  <?php
                  $images = explode(",", $edit_row['incomePics']);
                  foreach ($images as $image) {
                    echo "<img src='$image' alt='Image' class='img-fluid' style='width:60px;height:60px; margin: 2px; border-radius: 2px;'>";
                  }
                  ?>
                </div>
                <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*" onchange="previewImages(event)">
              </div>

              <button type="submit" name="submit" class="btn btn-success">Update Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include('includes/footer.php'); ?>