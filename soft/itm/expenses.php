<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_GET['delete_id'])) {
    $stmt_delete = $DB_con->prepare('DELETE FROM account_balance WHERE ac_id =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();
  }

  ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle d-none">
      <h1>Balance | <span> <a href="balance-add"> <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
      <hr>
    </div>


    <section class="section dashboard">
      <?php require_once 'more-fals/expense-balance-dash.php'; ?>
    </section>


    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Cause</th>
                    <th>Expenses</th>
                    <th>Current Balance</th>
                    <th>Payment Type</th>
                    <th>Expenses By</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "select * from expense where user_id='" . $_SESSION['id'] . "' ORDER BY id  DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                    $eidm = $eqrow['id '];
                  ?>
                    <tr>
                      <td><?php echo ++$sl; ?></td>
                      <td><?php echo date("M d,Y", strtotime($eqrow['last_update'])); ?></td>
                      <td><?php echo $eqrow['causes']; ?></td>
                      <td><?php echo $eqrow['expense']; ?></td>
                      <td><?php echo $eqrow['current_balance']; ?></td>
                      <td><?php echo $eqrow['payment_type']; ?></td>
                      <td><?php echo $eqrow['expenses_by']; ?></td>
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