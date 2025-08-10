<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_GET['delete_id'])) {
    $stmt_delete = $DB_con->prepare('DELETE FROM account_bank_balance WHERE acb_id =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();
  }

  ?>
  

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bank To Bank Balance | <span><i class="bi bi-bank"></i> </span> </h1>
      <hr>
    </div>


    <section class="section dashboard">
      <?php require_once 'more-fals/bank-to-bank-balance-dash.php'; ?>
    </section>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- <table class="table table-hover datatable">
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
                    <th>Company</th>
                    <th>Project</th>
                    <th>Add</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "SELECT * FROM account_bank_balance WHERE user_id='" . $_SESSION['id'] . "' ORDER BY acb_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                    $eidm = $eqrow['acb_id'];
                    // Fetch company name
                    $company_query = mysqli_query($con, "SELECT com_name FROM company_group WHERE com_id = '" . $eqrow['ac_com_group_id'] . "'");
                    $company_row = mysqli_fetch_array($company_query);
                    $com_name = $company_row['com_name'];
                    // Fetch project name
                    $project_query = mysqli_query($con, "SELECT pro_name FROM project WHERE pro_id = '" . $eqrow['ac_project_id'] . "'");
                    $project_row = mysqli_fetch_array($project_query);
                    $pro_name = $project_row['pro_name'];
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
                      <td><?php echo $com_name; ?></td>
                      <td><?php echo $pro_name; ?></td>
                      <td><a class="btn-sm btn-info" href="bank-balance-edit?edit_id=<?php echo $eqrow['acb_id']; ?>" title="click for edit" onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Add</a> </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table> -->


              <table class="table table-hover datatable">
                <thead>
                  <tr>


                    <th>SL</th>
                    <th>Date</th>
                    <th>Cause</th>
                    <th>Amount In</th>
                    <th>Amount Out</th>
                    <th>Current Balance</th>
                    <th>Payment Type</th>
                    <th>Received By</th>
                    <!---    
				   <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
					-->
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                  $sl = 0;
                  $eq = mysqli_query($con, "SELECT * FROM account_balance_details WHERE user_id='" . $_SESSION['id'] . "' AND type = 2 ORDER BY ach_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                    $eidm = $eqrow['ach_id'];
                  ?>
                    <tr>
                      <td><?php echo ++$sl; ?></td>
                      <td><?php echo date("M d,Y", strtotime($eqrow['last_update'])); ?></td>
                      <td><?php echo $eqrow['causes']; ?></td>
                      <td><?php echo $eqrow['today_in']; ?></td>
                      <td><?php echo $eqrow['today_out']; ?></td>
                      <td><?php echo $eqrow['current_balance']; ?></td>
                      <td><?php echo $eqrow['payment_type']; ?></td>
                      <td><?php echo $eqrow['received_by']; ?></td>
                      <!---                
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
-->

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