<!DOCTYPE html>
<html lang="en">

<head>


  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php

  error_reporting(~E_NOTICE); // avoid notice
  if (isset($_POST['btnsave'])) {


    $user_id = $_POST['user_id'];

    $NewsTitle = $_POST['NewsTitle'];
    $NewsSubTitle = $_POST['NewsSubTitle'];
    $Date = $_POST['Date'];


    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];


    if (empty($NewsTitle)) {
      $errMSG = "Please Enter News Title.";
    } else {
      $upload_dir = 'user_images/'; // upload directory

      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

      // rename uploading image
      $userpic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;

      // allow valid image file formats
      if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
        if ($imgSize < 5000000) {
          move_uploaded_file($tmp_dir, $upload_dir . $userpic);
        } else {
          $errMSG = "Sorry, your file is too large.";
        }
      }
      //else{
      //	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
      //}
    }


    // if no error occured, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('INSERT INTO news_section (user_id,news_title,news_subtitle,news_date,userPic) 
															VALUES(:user_id,:NewsTitle,:NewsSubTitle,:Date,:upic)');



      $stmt->bindParam(':user_id', $user_id);

      $stmt->bindParam(':NewsTitle', $NewsTitle);
      $stmt->bindParam(':NewsSubTitle', $NewsSubTitle);
      $stmt->bindParam(':Date', $Date);

      $stmt->bindParam(':upic', $userpic);

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'notice';
        </script>
  <?php
      } else {
        $errMSG = "error while inserting....";
      }
    }
  }
  ?>

  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <div class="pagetitle">
      <h1>Add New News / Notice | <span> <a href="notice"> <i class="bi bi-table"></i> </a> </span> </h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                <?php
                if (isset($errMSG)) {
                ?>
                  <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                  </div>
                <?php
                } else if (isset($successMSG)) {
                ?>
                  <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                  </div>
                <?php
                }
                ?>

              </h5>

              <form method="post" enctype="multipart/form-data" class="form-horizontal">

                <table class="table  table-responsive">

                  <tr>

                    <?php
                    $pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
                    while ($pqrow = mysqli_fetch_array($pq)) {
                    ?>

                      <input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
                    <?php } ?>
                  </tr>


                  <tr>
                    <td><label class="control-label"> Title </label></td>
                    <td><input class="form-control" type="text" name="NewsTitle" placeholder="News Title" value="<?php echo $NewsTitle; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label"> Sub Title </label></td>
                    <td>

                      <textarea name="NewsSubTitle" id="summernote"></textarea>

                    </td>
                  </tr>


                  <tr>
                    <td><label class="control-label"> Picture </label></td>
                    <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label"> Date </label></td>
                    <td><input class="form-control" type="text" name="Date" placeholder="" value="<?php date_default_timezone_set("Asia/Dhaka");
                                                                                                  echo date("Y/m/d"); ?>" /></td>
                  </tr>


                </table>

                <button type="submit" name="btnsave" class="btn btn-primary">
                  <span class="glyphicon glyphicon-save"></span> &nbsp; save
                </button>


              </form>


            </div>
          </div>


        </div>


    </section>

    <script>
      $('#summernote').summernote({
        placeholder: 'Start Write Here ..',
        tabsize: 2,
        height: 150,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

  </main>

  <?php require_once 'footer1.php'; ?>