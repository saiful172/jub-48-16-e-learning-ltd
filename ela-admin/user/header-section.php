<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  // if (isset($_GET['delete_id'])) {
  //   // select image from db to delete
  //   $stmt_select = $DB_con->prepare('SELECT userPic FROM header_section WHERE id =:uid');
  //   $stmt_select->execute(array(':uid' => $_GET['delete_id']));
  //   $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
  //   //unlink("user_images/".$imgRow['userPic']);

  //   // it will delete an actual record from db
  //   $stmt_delete = $DB_con->prepare('DELETE FROM header_section WHERE id =:uid');
  //   $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  //   $stmt_delete->execute();

  //   //header("Location:customer.php");
  // }

  ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Header Section Lists</h1>
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

                    <th>SL</th>
                    <th>Type</th>
                    <th>Title</th> 
                    <th>Edit</th>
                  </tr>
                </thead>


                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "select * from header_section  where user_id='" . $_SESSION['id'] . "' ORDER BY id asc   ");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                  ?>
                    <tr>
                      <td><?php echo  ++$sl; ?></td>
                      <td><?php echo $eqrow['type']; ?></td>
                      <td><?php echo $eqrow['title']; ?></td>
                      
                      <td><a class="btn btn-info" href="header-section-edit?edit_id=<?php echo $eqrow['id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="bi bi-pencil-square"></span> Edit</a> </td>
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