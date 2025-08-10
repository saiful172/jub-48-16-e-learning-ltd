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
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM blog_section WHERE id =:uid');
    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  } else {
    header("Location: index");
  }



  if (isset($_POST['btn_save_updates'])) {
    $Title = $_POST['title'];
    $Details = $_POST['details'];

    $CanonicalLink = $_POST['canonical_link'];
    $Keyword = $_POST['keyword'];
    $Description = $_POST['description'];
    $Author = $_POST['author'];


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

    function createSlug($title)
    {
      $slug = strtolower($title);
      $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
      $slug = preg_replace('/[\s-]+/', ' ', $slug);
      $slug = preg_replace('/\s/', '-', $slug);
      $slug = trim($slug, '-');
      return $slug;
    }

    // Generate slug
    $Slug = createSlug($Title);



    // if no error occured, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('UPDATE blog_section  SET  title =:Title, slug=:Slug, details=:Details, userPic=:upic, canonical_link = :CanonicalLink, keyword = :Keyword, description = :Description, author = :Author WHERE id=:uid');

      $stmt->bindParam(':Title', $Title);
      $stmt->bindParam(':Slug', $Slug);
      $stmt->bindParam(':Details', $Details);
      $stmt->bindParam(':upic', $userpic);
      $stmt->bindParam(':uid', $id);

      $stmt->bindParam(':CanonicalLink', $CanonicalLink);
      $stmt->bindParam(':Keyword', $Keyword);
      $stmt->bindParam(':Description', $Description);
      $stmt->bindParam(':Author', $Author);

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'blog';
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
      <h1>Blog Edit / Update</h1>
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
                  <tr>
                    <td><label class="control-label">Title</label></td>
                    <td><input class="form-control" type="text" name="title" placeholder="Blog Title" value="<?php echo $title; ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Details</label></td>
                    <td><textarea class="tinymce-editor" name="details" placeholder="Details"><?php echo $details; ?></textarea></td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Picture </label></td>
                    <td>
                      <p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
                      <input class="input-group" type="file" name="user_image" accept="image/*" />
                    </td>
                  </tr>

                  <tr>
                    <td class="text-center bg-danger text-white" colspan="12">
                      <h3>SEO Settings</h3>
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
                      <textarea class="form-control" name="keyword" placeholder="SEO Keyword" id="" cols="30" rows="4" required><?= $keyword ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Description </label></td>
                    <td>
                      <textarea class="form-control" name="description" placeholder="SEO Description" id="" cols="30" rows="4" required><?= $description ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Author </label></td>
                    <td>
                      <textarea class="form-control" name="author" placeholder="SEO Author" id="" cols="30" rows="4" required><?= $author ?></textarea>
                    </td>
                  </tr>


                </table>

                <tr>
                  <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
                      <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-danger" href="blog"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

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