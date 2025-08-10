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
    $stmt_delete = $DB_con->prepare('DELETE FROM contact_info WHERE  id =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();

    //header("Location:customer.php");
  }

  ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact / Lead List </h1>
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
                    <th> Date</th>
                    <th> Name </th>
                    <th> Phone </th>
                    <th> Email </th>
                    <th> Message </th>
                    <th>Delete</th>
                  </tr>
                </thead>

                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "select * from contact_info ORDER BY id desc");
                  while ($eqrow = mysqli_fetch_array($eq)) {

                  ?>
                    <tr>

                      <td><?php echo  ++$sl; ?></td>
                      <td><?php echo date("d-M-Y | h:i:sa", strtotime($eqrow['entry_date'])); ?></td>
                      <td><?php echo $eqrow['name']; ?></td>
                      <td><?php echo $eqrow['phone']; ?></td>
                      <td><?php echo $eqrow['email']; ?></td>
                      <td><?php echo $eqrow['message']; ?></td>

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