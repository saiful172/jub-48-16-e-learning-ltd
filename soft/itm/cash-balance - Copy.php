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

    <div class="pagetitle">
      <h1>Cash Balance | <span> <a href="cash-balance-add"> <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
      <hr>
    </div>
	
	<section class="section dashboard">
      <div class="row">
	         
 <?php   require_once 'more-fals/cash-bank-balance-dash.php'; ?> 		
			
<div class="col-lg-7">
<div class="row">	          
<?php  // require_once 'more-fals/dash-task.php'; ?>    
<?php  // require_once 'more-fals/dash-daily-item-wise-product-sale.php'; ?> 
       
<?php //  require_once 'dash-report.php'; ?>  
<?php // require_once 'more-fals/dash-rec-sales.php'; ?>  
 
          </div>
        </div> 
        </div> 
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
                  $eq = mysqli_query($con, "SELECT * FROM account_balance WHERE user_id='" . $_SESSION['id'] . "' ORDER BY ac_id DESC");
                  while ($eqrow = mysqli_fetch_array($eq)) {
                    $eidm = $eqrow['ac_id'];
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
                      <td><a class="btn-sm btn-info" href="cash-balance-edit?edit_id=<?php echo $eqrow['ac_id']; ?>" title="click for edit" onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Add</a> </td>
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