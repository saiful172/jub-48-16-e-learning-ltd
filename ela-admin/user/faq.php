<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_GET['delete_id'])) {
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM faq_section WHERE  id =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();

    //header("Location:customer.php");
  }

  ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>FAQ Section | <span> <a href="faq-setting"> <i class="bi bi-gear"></i> </a> </span> | <span> <a href="faq-add"> <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <table class="table table-hover datatable">
                <thead class="bg-light">
                  <tr>

                    <th> SL</th>
                    <th>Title</th>
                    <th>Picture</th>

                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>


                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "select * from faq_section where user_id='" . $_SESSION['id'] . "' ORDER BY id asc");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                    $title = strlen($eqrow['title']) > 60 ? substr($eqrow['title'], 0, 30) . '...' : $eqrow['title'];
                    $details = strlen($eqrow['details']) > 60 ? substr($eqrow['details'], 0, 60) . '...' : $eqrow['details'];
                  ?>
                    <tr>
                      <td><?php echo  ++$sl; ?></td>
                      <td><?= $title ?></td>
                      <td><?= $details ?></td>

                      <td><a class="btn btn-info" href="faq-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="bi bi-pencil-square"></span> Edit</a> </td>
                      <td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="bi bi-trash"></span> Delete</a> </td>


                    </tr>
                  <?php
                  }
                  ?>

                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  <?php require_once 'footer1.php'; ?>