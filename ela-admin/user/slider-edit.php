<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>
  <?php
  error_reporting(~E_NOTICE);
  if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $customer_id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM slider_section WHERE id =:uid');
    $stmt_edit->execute(array(':uid' => $customer_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  } else {
    header("Location: index");
  }



  if (isset($_POST['btn_save_updates'])) {
    $SliderTitle = $_POST['SliderTitle'];
    $SliderSubTitle = $_POST['SliderSubTitle'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if ($imgFile) {
      $upload_dir = 'user_images/'; // upload directory	
      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
      $userpic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;
      if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 5000000) {
          //	unlink($upload_dir.$edit_row['userPic']);
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
      $stmt = $DB_con->prepare('UPDATE slider_section 
									     SET  slider_title =:SliderTitle,
											  slider_subtitle=:SliderSubTitle,
											  link1=:link1,
											  link2=:link2,
										     
										     userPic=:upic 
								       WHERE id=:uid');


      $stmt->bindParam(':SliderTitle', $SliderTitle);
      $stmt->bindParam(':SliderSubTitle', $SliderSubTitle);
      $stmt->bindParam(':link1', $link1);
      $stmt->bindParam(':link2', $link2);
      $stmt->bindParam(':upic', $userpic);
      $stmt->bindParam(':uid', $id);

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'slider';
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
      <h1>Slider Edit</h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

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


                <table class="table table-hover table-responsive">



                  <tr>
                    <td><label class="control-label">Slider </label></td>
                    <td>
                      <input class="form-control" type="text" name="SliderTitle" placeholder="Slider Title" value="<?php echo $slider_title; ?>" />
                    </td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Slider Sub Title</label></td>
                    <td><input class="form-control" type="text" name="SliderSubTitle" placeholder="Slider Sub Title" value="<?php echo $slider_subtitle; ?>" /></td>
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
                    <td><label class="control-label">Slider Picture </label></td>
                    <td>
                      <p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
                      <input class="input-group" type="file" name="user_image" accept="image/*" />
                    </td>
                  </tr>


                </table>

                <tr>
                  <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
                      <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-danger" href="slider"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

                  </td>
                </tr>


              </form>


            </div>
          </div>


        </div>


    </section>

  </main>

  <?php require_once 'footer1.php'; ?>