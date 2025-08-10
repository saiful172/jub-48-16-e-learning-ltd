<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_GET['delete_id'])) {
    $stmt_delete = $DB_con->prepare('DELETE FROM account_balance_details WHERE ach_id =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();
  }

  ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Balance History | <span> <a href="balance-history-add"> <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <table class="table table-hover datatable">
                <thead>
                  <tr>


                    <th>SL</th>
                    <th>Pre Balance</th>
                    <th>Today In</th>
                    <th>Today Out</th>
                    <th>Current Balance</th>
                    <th>Payment Type</th>
                    <th>Received By</th>
                    <th>Last Update</th>
                    <th>Status</th>
                    <th>Edit</th>

                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "select * from account_balance_details where user_id='" . $_SESSION['id'] . "' ORDER BY ach_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                    $eidm = $eqrow['ach_id'];
                  ?>
                    <tr>
                      <td><?php echo ++$sl; ?></td>
                      <td><?php echo $eqrow['pre_balance']; ?></td>
                      <td><?php echo $eqrow['today_in']; ?></td>
                      <td><?php echo $eqrow['today_out']; ?></td>
                      <td><?php echo $eqrow['current_balance']; ?></td>
                      <td><?php echo $eqrow['payment_type']; ?></td>
                      <td><?php echo $eqrow['received_by']; ?></td>
                      <td><?php echo $eqrow['last_update']; ?></td>
                      <td>
                        <?php
                        if ($eqrow['status'] == 1) { ?>
                          <span class="bg-success text-white px-2 py-1 rounded"> Active</span>
                        <?php
                        } else { ?>
                          <span class="bg-danger text-white px-2 py-1 rounded">Inactive</span>
                        <?php
                        }
                        ?>
                      </td>


                      <td><a class="btn-sm btn-info" href="balance-history-edit?edit_id=<?php echo $eqrow['ach_id']; ?>" title="click for edit" onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>

                      <td><a class="btn-sm btn-danger" href="?delete_id=<?php echo $eqrow['ach_id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>


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