<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_GET['delete_id'])) {
    // select image from db to delete
    $stmt_select = $DB_con->prepare('SELECT userPic FROM social_media WHERE  id =:uid');
    $stmt_select->execute(array(':uid' => $_GET['delete_id']));
    $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
    //unlink("user_images/".$imgRow['userPic']);

    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM social_media WHERE  id =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();

    //header("Location:customer.php");
  }

  ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Social Media | <span> <a href=""> <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <div style="margin-bottom: 2rem;">

                <table width="100%" class="table  table-hover " customer_id="dataTables-example">

                  <?php
                  $eq = mysqli_query($con, "select * from social_media  where user_id='" . $_SESSION['id'] . "' ORDER BY id DESC  ");
                  while ($eqrow = mysqli_fetch_array($eq)) {

                  ?>


                    <tr>
                      <td style="color:#3b5998;"><label class="control-label">Facebook</label></td>
                      <td><?php echo $eqrow['facebook']; ?></td>
                    </tr>

                    <tr>
                      <td style="color:#00acee;"><label class="control-label">Twitter</label></td>
                      <td><?php echo $eqrow['twitter']; ?></td>
                    </tr>

                    <tr>
                      <td style="color:red;"><label class="control-label">YouTube</label></td>
                      <td><?php echo $eqrow['youtube']; ?></td>
                    </tr>

                    <tr>
                      <td style="color:#3f729b;"><label class="control-label">Instagram</label></td>
                      <td><?php echo $eqrow['instagram']; ?></td>
                    </tr>

                    <tr>
                      <td style="color:#0a66c2;"><label class="control-label">Linkedin</label></td>
                      <td><?php echo $eqrow['linkedin']; ?></td>
                    </tr>

                    <tr>
                      <td style="color:#000;"><label class="control-label">Tiktok</label></td>
                      <td><?php echo $eqrow['tiktok']; ?></td>
                    </tr>




                    </tbody>
                </table>
                <tr>
                  <td><a class="btn btn-info" href="social-media-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
                  <!-- <td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td> -->

                </tr>

              <?php
                  }
              ?>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  <?php require_once 'footer1.php'; ?>