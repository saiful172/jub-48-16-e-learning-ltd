<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body> 

  <?php require_once 'header1.php'; ?>
  <?php
  error_reporting(~E_NOTICE);

  $id = '';
  $title = '';
  $subtitle = '';
  $userpic = '';

  $sql = 'SELECT * FROM features_all  where id=3';
  $q = mysqli_query($con, $sql);
  while ($edit_row = mysqli_fetch_assoc($q)) {
    $id = $edit_row['id'];
    $title = $edit_row['title'];
    $subtitle = $edit_row['sub_title'];
    $link1 = $edit_row['link1'];
    $link2 = $edit_row['link2'];
    $userpic = $edit_row['image'];
  }

  if (isset($_POST['btn_save_updates'])) {
    $id = $_POST['id'];
    $Title = $_POST['Title'];
    $SubTitle = $_POST['SubTitle'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];

    if (empty($Title)) {
      $errMSG = 'Please Fill Title Field';
    }


    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if ($imgFile) {
      $upload_dir = 'user_images/'; // upload directory	
      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

      $userPic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;

      if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 5000000) {
          unlink($upload_dir . $edit_row['image']);
          move_uploaded_file($tmp_dir, $upload_dir . $userPic);
        } else {
          $errMSG = "Sorry, your file is too large it should be less then 5MB";
        }
      } else {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      }
    } else {
      // if no image selected the old image remain as it is.
      $userPic = $_POST['old_image']; // old image from database
    }

    // if no error occured, continue ....
    if (!isset($errMSG)) {
      if (!empty($title)) {
        $stmt = $DB_con->prepare('UPDATE features_all SET  title =:Title, sub_title=:SubTitle, image=:userPic, link1=:link1, link2=:link2 WHERE id=:uid');
      } else {
        $stmt = $DB_con->prepare('INSERT INTO features_all (title,sub_title,image, link1, link2) 
															VALUES(:Title,:SubTitle,:userPic, :link1, :link2)');
      }

      $stmt->bindParam(':Title', $Title);
      $stmt->bindParam(':SubTitle', $SubTitle);
      $stmt->bindParam(':link1', $link1);
      $stmt->bindParam(':link2', $link2);

      $stmt->bindParam(':userPic', $userPic);
      if (!empty($title)) {
        $stmt->bindParam(':uid', $id);
      }

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'services-feature';
        </script>
  <?php
      } else {
        $errMSG = "Sorry Data Could Not Updated !";
      }
    }
  }

  ?>


  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Service Features </h1>
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


                <?php
                if (isset($errMSG)) {
                ?>
                  <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                  </div>
                <?php
                }
                ?>
                <input type="hidden" value="<?= $id; ?>" name="id">

                <table class="table table-responsive">
                  <tr>
                    <td><label class="control-label">Title</label></td>
                    <td><input class="form-control" type="text" name="Title" placeholder="About Title" value="<?php echo $title; ?>" /></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Link1</label></td>
                    <td><input class="form-control" type="text" name="link1" placeholder="Link1" value="<?php echo $link1; ?>" /></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Link2</label></td>
                    <td><input class="form-control" type="text" name="link2" placeholder="Link2" value="<?php echo $link2; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Details</label></td>
                    <td><textarea class="tinymce-editor" rows="4" cols="50" name="SubTitle" placeholder="Please Write Here "><?php echo $subtitle; ?></textarea></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Image</label></td>
                    <td>
					<?php
                      if (!empty($userpic)) { ?>
                        <img src="user_images/<?= $userpic ?>" style="height: 100px; width: 100px;" alt="">
                      <?php }
                      ?> <br><br>
					<input type="file" name="user_image" class="">
                    <input type="hidden" name="old_image" value="<?= $userpic ?>"></td>
                  </tr>

                  
                </table>

                <button type="submit" name="btn_save_updates" class="btn btn-primary">
                  <span class="glyphicon glyphicon-save"></span> Update
                </button>
              </form>
            </div>
          </div>
        </div>
    </section>
  </main>

  <?php require_once 'footer1.php'; ?>