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
    $stmt_edit = $DB_con->prepare('SELECT * FROM social_media WHERE id =:uid');
    $stmt_edit->execute(array(':uid' => $customer_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  } else {
    header("Location: index");
  }



  if (isset($_POST['btn_save_updates'])) {

    $Facebook = $_POST['Facebook'];
    $Twitter = $_POST['Twitter'];
    $YouTube = $_POST['YouTube'];
    $Instagram = $_POST['Instagram'];
    $Linkedin = $_POST['Linkedin'];
    $TikTok = $_POST['TikTok'];

    // if no error occured, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('UPDATE social_media SET  facebook =:Facebook, twitter=:Twitter, youtube=:YouTube, instagram=:Instagram, linkedin =:Linkedin, tiktok =:TikTok WHERE id=:uid');


      $stmt->bindParam(':Facebook', $Facebook);
      $stmt->bindParam(':Twitter', $Twitter);
      $stmt->bindParam(':YouTube', $YouTube);
      $stmt->bindParam(':Instagram', $Instagram);
      $stmt->bindParam(':Linkedin', $Linkedin);
      $stmt->bindParam(':TikTok', $TikTok);

      $stmt->bindParam(':uid', $id);

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'social-media';
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
      <h1>Social Media Edit</h1>
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
                    <td><label class="control-label" style="color:#3b5998;"> Facebook </label></td>
                    <td><input class="form-control" type="text" name="Facebook" placeholder="Facebook Link" value="<?php echo $facebook; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label" style="color:#00acee;"> Twitter </label></td>
                    <td><input class="form-control" type="text" name="Twitter" placeholder="Twitter Link" value="<?php echo $twitter; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label" style="color:red;"> You Tube </label></td>
                    <td><input class="form-control" type="text" name="YouTube" placeholder="You Tube Link" value="<?php echo $youtube; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label" style="color:#3f729b;"> Instagram </label></td>
                    <td><input class="form-control" type="text" name="Instagram" placeholder="Instagram" value="<?php echo $instagram; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label" style="color:#0a66c2;"> Linkedin </label></td>
                    <td><input class="form-control" type="text" name="Linkedin" placeholder="Linkedin" value="<?php echo $linkedin; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label" style="color:#000;"> TikTok </label></td>
                    <td><input class="form-control" type="text" name="TikTok" placeholder="TikTok" value="<?php echo $tiktok; ?>" /></td>
                  </tr>



                </table>

                <button type="submit" name="btn_save_updates" class="btn btn-primary">
                  <span class="glyphicon glyphicon-save"></span> Update
                </button>

                <a class="btn btn-danger" href="social-media"> <span class="glyphicon glyphicon-backward"></span> cancel </a>




              </form>


            </div>
          </div>


        </div>


    </section>

  </main>

  <?php require_once 'footer1.php'; ?>