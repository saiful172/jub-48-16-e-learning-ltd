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
    $Details = $_POST['details'];

    $CanonicalLink = $_POST['canonical_link'];
    $Keyword = $_POST['keyword'];
    $Description = $_POST['description'];
    $Author = $_POST['author'];

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    function createSlug($title)
    {
      $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
      return $slug;
    }

    if (empty($Title)) {
      $errMSG = "Please Enter Title .";
    } else {
      $upload_dir = 'user_images/'; // upload directory

      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

      // rename uploading image
      $userpic = $ImageNameWithSlug . "-" . rand(1000, 1000000) . "-" . $imgFile;
      //$userpic = rand(1000, 1000000) . "." . $imgExt;

      // allow valid image file formats
      if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
        if ($imgSize < 5000000) {
          move_uploaded_file($tmp_dir, $upload_dir . $userpic);
        } else {
          $errMSG = "Sorry, your file is too large.";
        }
      } else {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      }
    }

    // Generate slug
    $Slug = createSlug($Title);

    // if no error occurred, continue ....
    if (!isset($errMSG)) {
      // Prepare and execute SQL statement
      $stmt = $DB_con->prepare('INSERT INTO blog_section (user_id,title,slug,details,canonical_link,keyword,description,author,userPic) VALUES(:user_id,:Title,:Slug,:Details,:canonical_link, :keyword, :description, :author,:upic)');
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':Title', $Title);
      $stmt->bindParam(':Slug', $Slug);
      $stmt->bindParam(':Details', $Details);
      $stmt->bindParam(':upic', $userpic);

      $stmt->bindParam(':canonical_link', $CanonicalLink);
      $stmt->bindParam(':keyword', $Keyword);
      $stmt->bindParam(':description', $Description);
      $stmt->bindParam(':author', $Author);

      if ($stmt->execute()) {
        echo '<script>alert("Successfully Added ..."); window.location.href = "blog";</script>';
        exit();
      } else {
        $errMSG = "Error while inserting...";
      }
    }
  }
  ?>


  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Blog | <span> <a href="blog"> <i class="bi bi-table"></i> </a> </span> </h1>
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
                    <td><label class="control-label"> Title </label></td>
                    <td><input class="form-control" type="text" name="title" placeholder="Blog Title" value="<?php echo $title; ?>" required></td>
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

                    <?php
                    $pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
                    while ($pqrow = mysqli_fetch_array($pq)) {
                    ?>

                      <input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
                    <?php } ?>
                  </tr>


                  <tr>
                    <td><label class="control-label"> Details </label></td>
                    <td><textarea name="details" class="tinymce-editor" placeholder="Details"><?php echo $details; ?></textarea></td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Picture </label></td>
                    <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
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