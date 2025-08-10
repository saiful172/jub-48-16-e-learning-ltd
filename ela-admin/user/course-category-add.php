<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php

  if (isset($_GET['edit_id'])) {
    $eq = mysqli_query($con, "SELECT * FROM course_category WHERE cat_id='" . $_GET['edit_id'] . "' ");
    $data = mysqli_fetch_array($eq);
  }

  $CatName = isset($data) ? $data['cat_name'] : '';
  $Details = isset($data) ? $data['cat_details'] : '';
  $Link = isset($data) ? $data['link'] : '';
  $userPic = isset($data) ? $data['cat_photo'] : '';


  error_reporting(~E_NOTICE); // avoid notice
  if (isset($_POST['btnsave'])) {

    $oldImage = $_POST['oldImage'];
    $user_id = $_POST['user_id'];
    $cat_id = $_POST['cat_id'];

    $CatName = $_POST['CatName'];
    $Details = $_POST['Details'];
    $Link = $_POST['Link'];


    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];


    if (empty($CatName)) {
      $errMSG = "Please Enter Category .";
    } else {
      $upload_dir = 'user_images/'; // upload directory

      if (!empty($imgFile)) {
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions


        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
          // Check file size '5MB'
          // rename uploading image 
          $userPic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;
          //$userPic = rand(1000, 1000000) . "." . $imgExt;
          if ($imgSize < 5000000) {
            if (!empty($oldImage)) {
              if (file_exists($upload_dir . $oldImage)) {
                unlink($upload_dir . $oldImage);
              }
            }

            move_uploaded_file($tmp_dir, $upload_dir . $userPic);
          } else {
            $errMSG = "Sorry, your file is too large.";
          }
        }
      } else {
        $userPic = $oldImage;
      }
    }


    // if no error occured, continue ....
    if (!isset($errMSG)) {
      if ($cat_id == 0) {
        $stmt = $DB_con->prepare('INSERT INTO course_category (user_id,cat_name,cat_details,link,cat_photo) 
                                                                VALUES(:user_id,:CatName,:Details, :Link, :upic)');

        $stmt->bindParam(':user_id', $user_id);

        $stmt->bindParam(':CatName', $CatName);
        $stmt->bindParam(':Details', $Details);
        $stmt->bindParam(':Link', $Link);

        $stmt->bindParam(':upic', $userPic);

        if ($stmt->execute()) {
  ?>
          <script>
            alert('Successfully Added ...');
            window.location.href = 'course-category';
          </script>
        <?php
        } else {
          $errMSG = "error while inserting....";
        }
      } else {
        $stmt = $DB_con->prepare('UPDATE course_category  SET  cat_name =:CatName, cat_details=:Details,cat_photo=:upic,link=:Link WHERE cat_id=:uid');

        $stmt->bindParam(':CatName', $CatName);
        $stmt->bindParam(':Details', $Details);
        $stmt->bindParam(':Link', $Link);
        $stmt->bindParam(':upic', $userPic);
        $stmt->bindParam(':uid', $cat_id);

        if ($stmt->execute()) {
        ?>
          <script>
            alert('Successfully Updated ...');
            window.location.href = 'course-category';
          </script>
  <?php
        } else {
          $errMSG = "Sorry Data Could Not Updated !";
        }
      }
    }
  }
  ?>

  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add / Edit Course Category | <span> <a href="course-category"> <i class="bi bi-table"></i> </a> </span> </h1>
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

              <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" class="form-horizontal">

                <table class="table table-responsive">

                  <tr>

                    <?php
                    $pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
                    while ($pqrow = mysqli_fetch_array($pq)) {
                    ?>
                      <input type="hidden" name="cat_id" value="<?php echo (!empty($data) ? $data['cat_id'] : '0') ?>">
                      <input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
                    <?php } ?>
                  </tr>


                  <tr>
                    <td><label class="control-label"> Category </label></td>
                    <td><input class="form-control" type="text" name="CatName" placeholder="Category Name" value="<?php echo $CatName ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label"> Short Details </label></td>
                    <td><textarea name="Details" class="form-control" placeholder="Short Details"><?php echo $Details; ?></textarea></td>
                  </tr>
                  <tr>
                    <td><label class="control-label"> Link </label></td>
                    <td><input class="form-control" type="text" name="Link" placeholder="Link" value="<?php echo $Link ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Picture </label></td>
                    <td>
                      <?php
                      if (!empty($userPic)) { ?>
                        <p><img src="user_images/<?php echo $userPic ?>" height="150" width="150" /></p>
                        <input type="hidden" name="oldImage" value="<?= $userPic ?>">
                      <?php  }
                      ?>

                      <input class="input-group" type="file" name="user_image" accept="image/*" />
                    </td>
                  </tr>


                </table>
                <tr>
                  <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
                      <span class="glyphicon glyphicon-save"></span> &nbsp; save
                    </button>
                  </td>
                </tr>


              </form>


            </div>
          </div>


        </div>


    </section>

  </main>

  <?php require_once 'footer1.php'; ?>


  <script src="js/chosen.js"></script>
  <script type="text/javascript">
    $('.chosen-select').chosen({
      width: "100%"
    });
  </script>

  <?php
  require_once 'summernote_link.php';
  summernote('summernote');
  ?>