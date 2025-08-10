<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php

  if (isset($_POST['btnsave'])) {

    $UserId = $_POST['UserId'];
    $PreBalance = $_POST['PreBalance'];
    $TodayIn = $_POST['TodayIn'];
    $TodayOut = $_POST['TodayOut'];
    $CurBalance = $_POST['CurBalance'];
    $PayType = $_POST['PayType'];
    $ReceivedBy = $_POST['ReceivedBy'];
    $LastUpdate = $_POST['LastUpdate'];
    // $Status = $_POST['Status'];


    if (empty($PreBalance)) {
      $errMSG = "Please Enter Previous Balance.";
    }



    // if no error occured, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('INSERT INTO account_balance (user_id,pre_balance,today_in,today_out,current_balance,payment_type,received_by,last_update,status) 
      VALUES(:UserId,:PreBalance,:TodayIn,:TodayOut,:CurBalance,:PayType,:ReceivedBy,:LastUpdate,1)');


      $stmt->bindParam(':UserId', $UserId);
      $stmt->bindParam(':PreBalance', $PreBalance);
      $stmt->bindParam(':TodayIn', $TodayIn);
      $stmt->bindParam(':TodayOut', $TodayOut);
      $stmt->bindParam(':CurBalance', $CurBalance);
      $stmt->bindParam(':PayType', $PayType);
      $stmt->bindParam(':ReceivedBy', $ReceivedBy);
      $stmt->bindParam(':LastUpdate', $LastUpdate);
      // $stmt->bindParam(':Status', $Status);
      if ($stmt->execute()) {
  ?>
        <script>
          alert('Data Successfully Add ...');
          window.location.href = 'balance';
        </script>
  <?php

      } else {
        $errMSG = "error while inserting....";
      }
    }
  }
  ?>
  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>New Balance | <span> <a href="balance"> <i class="bi bi-table"></i> </a> </span> </h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

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

                <table class="table table-hover table-responsive">

                  <tr>

                    <?php
                    $pq = mysqli_query($con, "select * from user where userid='" . $_SESSION['id'] . "'");
                    while ($pqrow = mysqli_fetch_array($pq)) {
                    ?>

                      <input class="form-control" type="hidden" name="UserId" value="<?php echo $pqrow['userid']; ?>" />
                    <?php } ?>
                  </tr>

                  <tr>
                    <td><label class="control-label">Previous Balance</label></td>
                    <td><input class="form-control" type="number" name="PreBalance" id="PreBalance" placeholder="Previous Balance" value="<?php echo $PreBalance; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Today In</label></td>
                    <td><input class="form-control" type="number" name="TodayIn" id="TodayIn" placeholder="Today In" value="<?php echo $TodayIn; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Today Out</label></td>
                    <td><input class="form-control" type="number" name="TodayOut" id="TodayOut" placeholder="Today Out" value="<?php echo $TodayOut; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Current Balance</label></td>
                    <td><input class="form-control" type="number" name="CurBalance" id="CurBalance" placeholder="Current Balance" value="<?php echo $CurBalance; ?>" readonly></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Payment Type </label></td>
                    <td>

                      <select class="form-control chosen-select" name="PayType" id="PayType">

                        <?php
                        $sql = "SELECT  pt_id,pt_name FROM payment_type where user_id=22 ";
                        $result = $con->query($sql);

                        while ($row = $result->fetch_array()) {
                          echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                        }
                        ?>

                        <?php
                        $sql = "SELECT  pt_id,pt_name FROM payment_type where user_id='" . $_SESSION['id'] . "' ";
                        $result = $con->query($sql);

                        while ($row = $result->fetch_array()) {
                          echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                        }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Received By </label></td>
                    <td><input class="form-control" type="text" name="ReceivedBy" placeholder="Received By" value="<?php echo $ReceivedBy; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Date </label></td>
                    <td><input class="form-control" type="date" name="LastUpdate" value="<?php echo date("Y-m-d"); ?>"></td>
                  </tr>

                  <!-- <tr>
                    <td><label class="control-label">Status </label></td>
                    <td>
                      <select name="Status" id="Status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </td>
                  </tr> -->

                </table>

                <tr>
                  <td colspan="2">
                    <button type="submit" name="btnsave" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
                  </td>
                </tr>

              </form>

            </div>
          </div>


        </div>


    </section>

  </main>

  <?php require_once 'footer1.php'; ?>


  <script src="js/chosen.js"></script>
  <script type="text/javascript">
    $('.chosen-select').chosen({
      width: "100%"
    });
  </script>


  <script>
    $(document).ready(function() {
      $('#PreBalance, #TodayIn, #TodayOut').on('input', function() {
        var PreBalance = parseFloat($('#PreBalance').val()) || 0;
        var TodayIn = parseFloat($('#TodayIn').val()) || 0;
        var TodayOut = parseFloat($('#TodayOut').val()) || 0;

        var result = PreBalance + TodayIn - TodayOut;

        // Set the result in the readonly input
        $('#CurBalance').val(result.toFixed(0));
      });
    });
  </script>