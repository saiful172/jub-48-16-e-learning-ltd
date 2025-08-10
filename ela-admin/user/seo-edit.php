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
    $stmt_edit = $DB_con->prepare('SELECT * FROM seo_section WHERE id = :uid');
    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    if (!$edit_row) {
      header("Location: index.php");
      exit;
    }
    extract($edit_row);
  } else {
    header("Location: index.php");
    exit;
  }

  if (isset($_POST['btn_save_updates'])) {
    $Title = $_POST['title'];
    $CanonicalLink = $_POST['canonical_link'];
    $Category = $_POST['type'];
    $Keyword = $_POST['keyword'];
    $Description = $_POST['description'];
    $Author = $_POST['author'];
    $BreadcrumbTitle = $_POST['breadcrumb_title'];
    $BreadcrumbSubtitle = $_POST['breadcrumb_subtitle'];

    // if no error occurred, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('UPDATE seo_section SET title= :Title, canonical_link = :CanonicalLink,  type = :Category, keyword = :Keyword, description = :Description, author = :Author, breadcrumb_title = :BreadcrumbTitle, breadcrumb_subtitle = :BreadcrumbSubtitle WHERE id = :uid');

      $stmt->bindParam(':Title', $Title);
      $stmt->bindParam(':CanonicalLink', $CanonicalLink);
      $stmt->bindParam(':Category', $Category);
      $stmt->bindParam(':Keyword', $Keyword);
      $stmt->bindParam(':Description', $Description);
      $stmt->bindParam(':Author', $Author);
      $stmt->bindParam(':BreadcrumbTitle', $BreadcrumbTitle);
      $stmt->bindParam(':BreadcrumbSubtitle', $BreadcrumbSubtitle);
      $stmt->bindParam(':uid', $id);
      
      if ($stmt->execute()) {
  ?>
        <script>
          alert('Successfully Updated ...');
          window.location.href = 'seo.php';
        </script>
  <?php
        exit;
      } else {
        $errMSG = "Sorry Data Could Not Updated !";
      }
    }
  }
  ?>



  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Course Edit / Update</h1>
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
                    <td><label class="control-label"> Category </label></td>
                    <td>
                      <select name="type" id="" class="form-select" required>
                        <option disabled selected>-- Select Category -- </option>
                        <option value="Home" <?= $type == 'Home' ? 'selected' : '' ?>>Home</option>
                        <option value="About" <?= $type == 'About' ? 'selected' : '' ?>>About</option>
						<option value="testimonials" <?= $type == 'testimonials' ? 'selected' : '' ?>>Testimonials</option>
                        <option value="Team" <?= $type == 'Team' ? 'selected' : '' ?>>Our Team</option>
                        <option value="Teacher" <?= $type == 'Teacher' ? 'selected' : '' ?>>Our Teacher</option>
                        <option value="Student" <?= $type == 'Student' ? 'selected' : '' ?>>Success Students</option>
                        <option value="Course" <?= $type == 'Course' ? 'selected' : '' ?>>Course</option>
                        <option value="Course Details" <?= $type == 'Course Details' ? 'selected' : '' ?>>Course Details</option>
                        <option value="Gallery" <?= $type == 'Gallery' ? 'selected' : '' ?>>Gallery</option>
                        <option value="Blog" <?= $type == 'Blog' ? 'selected' : '' ?>>Blog</option>
                        <option value="Blog Details" <?= $type == 'Blog Details' ? 'selected' : '' ?>>Blog Details</option>
                        <option value="Contact" <?= $type == 'Contact' ? 'selected' : '' ?>>Contact</option>
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
                  <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
                      <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-danger" href="seo"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

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