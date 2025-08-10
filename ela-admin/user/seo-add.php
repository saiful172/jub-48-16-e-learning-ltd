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
    $Title = $_POST['title'];
    $CanonicalLink = $_POST['canonical_link'];
    $Category = $_POST['type'];
    $Keyword = $_POST['keyword'];
    $Description = $_POST['description'];
    $Author = $_POST['author'];
    $BreadcrumbTitle = $_POST['breadcrumb_title'];
    $BreadcrumbSubtitle = $_POST['breadcrumb_subtitle'];

    // if no error occurred, continue ...
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('INSERT INTO seo_section (user_id, title, canonical_link, type, keyword, description, author, breadcrumb_title, breadcrumb_subtitle) 
        VALUES(:user_id, :title, :canonical_link, :type, :keyword, :description, :author, :breadcrumb_title, :breadcrumb_subtitle)');

      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':title', $Title);
      $stmt->bindParam(':canonical_link', $CanonicalLink);
      $stmt->bindParam(':type', $Category);
      $stmt->bindParam(':keyword', $Keyword);
      $stmt->bindParam(':description', $Description);
      $stmt->bindParam(':author', $Author);
      $stmt->bindParam(':breadcrumb_title', $BreadcrumbTitle);
      $stmt->bindParam(':breadcrumb_subtitle', $BreadcrumbSubtitle);

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Added ...');
          window.location.href = 'seo';
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

    <div class="pagetitle">
      <h1>Add New Course | <span> <a href="seo"> <i class="bi bi-table"></i> </a> </span> </h1>
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

                <table class="table table-responsive">

                  <tr>

                    <?php
                    $pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
                    while ($pqrow = mysqli_fetch_array($pq)) {
                    ?>

                      <input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
                    <?php } ?>
                  </tr>


                  <tr>
                    <td><label class="control-label"> Category </label></td>
                    <td>
                      <select name="type" id="" class="form-select" required>
                        <option disabled selected>-- Select Category -- </option>
                        <option value="Home">Home</option>
                        <option value="About">About</option>
						<option value="testimonials">Testimonials</option>
                        <option value="Team">Our Team</option>
                        <option value="Teacher">Our Teacher</option>
                        <option value="Student">Success Students</option>
                        <option value="Course">Course</option>
                        <option value="Course Details">Course Details</option>
                        <option value="Gallery">Gallery</option>
                        <option value="Blog">Blog</option>
                        <option value="Blog Details">Blog Details</option>
                        <option value="Contact">Contact</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Title </label></td>
                    <td>
                      <input type="text" class="form-control" name="title" placeholder="SEO Title" value="<?= $title ?>" required></input>
                    </td>
                  </tr>

                  <tr>
                    <td><label class=" control-label">Canonical Link </label>
                    </td>
                    <td>
                      <input type="text" class="form-control" name="canonical_link" placeholder="SEO Canonical Link" value="<?= $canonical_link ?>" required></input>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Keyword </label></td>
                    <td>
                      <textarea class="form-control" name="keyword" placeholder="SEO Keyword" id="" cols="30" rows="4" required></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Description </label></td>
                    <td>
                      <textarea class="form-control" name="description" placeholder="SEO Description" id="" cols="30" rows="4" required></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Author </label></td>
                    <td>
                      <textarea class="form-control" name="author" placeholder="SEO Author" id="" cols="30" rows="4" required></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Breadcrumb Title </label></td>
                    <td>
                      <input type="text" name="breadcrumb_title" id="breadcrumb_title" class="form-control" placeholder="Enter Breadcrumb Title" value="<?= $breadcrumb_title ?>">
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Breadcrumb Sub Title </label></td>
                    <td>
                      <input type="text" name="breadcrumb_subtitle" id="breadcrumb_subtitle" class="form-control" placeholder="Enter Breadcrumb Sub Title" value="<?= $breadcrumb_subtitle ?>">
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