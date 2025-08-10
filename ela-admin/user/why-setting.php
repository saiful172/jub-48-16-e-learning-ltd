<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>
  <?php
   
  if (isset($_POST['btn_save_updates'])) {     
    $Title = $_POST['Title'];
    $SubTitle = $_POST['SubTitle'];
    $LinkOne = $_POST['LinkOne'];
    $LinkTwo = $_POST['LinkTwo']; 
    $Details = $_POST['Details']; 


    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if ($imgFile) {
      $upload_dir = 'user_images/'; // upload directory	
      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
      $userpic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;
      //$userpic = rand(1000, 1000000) . "." . $imgExt;
      if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 5000000) {
          unlink($upload_dir . $edit_row['userPic']);
          move_uploaded_file($tmp_dir, $upload_dir . $userpic);
        } else {
          $errMSG = "Sorry, your file is too large it should be less then 5MB";
        }
      } else {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      }
    } else {
      // if no image selected the old image remain as it is.
      $userpic = $edit_row['userPic']; // old image from database
    }


    // if no error occured, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('UPDATE header_section SET title =:Title, subtitle=:SubTitle, link_one=:LinkOne, link_two=:LinkTwo, details=:Details, userPic=:upic WHERE id=3 ');
 
      $stmt->bindParam(':Title', $Title);
      $stmt->bindParam(':SubTitle', $SubTitle);
      $stmt->bindParam(':LinkOne', $LinkOne);
      $stmt->bindParam(':LinkTwo', $LinkTwo); 
      $stmt->bindParam(':Details', $Details); 

      $stmt->bindParam(':upic', $userpic); 

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'why-setting';
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
      <h1>Why Chose Us Section | <span> <a href="why"> <i class="bi bi-list"></i> Lists</a> </span></h1>
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

                <table class="table table-responsive">
<?php
$banner = $DB_con->prepare('SELECT * FROM header_section WHERE id=3 ');
$banner->execute();
$banner_info = $banner->fetch(PDO::FETCH_ASSOC);
?>

                  <tr>
                    <td><label class="control-label"> Heading Title </label></td>
                    <td><input class="form-control" type="text" name="Title" placeholder="Title" value="<?= $banner_info['title'] ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Sub Title</label></td>
                    <td><input class="form-control" type="text" name="SubTitle" placeholder="Sub Title" value="<?= $banner_info['subtitle'] ?>" /></td>
                  </tr>
                  				 
                 <tr>
                    <td><label class="control-label">Details Information</label></td>
                    <td><textarea class="tinymce-editor" name="Details" placeholder="Details"><?= $banner_info['details'] ?></textarea></td>
                  </tr>

                  <tr>
                    <td><label class="control-label"> Image </label></td>
                    <td>
                      <p><img src="user_images/<?= $banner_info['userPic'] ?>" height="150" width="150" /></p>
                      <input class="input-group" type="file" name="user_image" accept="image/*" />
                    </td>
                  </tr>


                </table>

                <tr>
                  <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
                      <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-danger" href="header-section"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

                  </td>
                </tr>

              </form>


            </div>
          </div>


        </div>


    </section>

  </main>

  <?php require_once 'footer1.php'; ?>



  <?php
  require_once 'summernote_link.php';
  summernote('summernote');
  ?>