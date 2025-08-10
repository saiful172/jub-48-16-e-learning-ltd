<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM account_balance_details WHERE ach_id =:uid');
    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  } else {
    header("Location: balance-history");
  }

  if (isset($_POST['btn_save_updates'])) {

    $PreBalance = $_POST['PreBalance'];
    $TodayIn = $_POST['TodayIn'];
    $TodayOut = $_POST['TodayOut'];
    $CurBalance = $_POST['CurBalance'];
    $PayType = $_POST['PayType'];
    $ReceivedBy = $_POST['ReceivedBy'];
    $LastUpdate = $_POST['LastUpdate'];
    $Status = $_POST['Status'];

    if (empty($PreBalance)) {
      $errMSG = "Please Enter Previous Balance.";
    }

    // if no error occured, continue ....
    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('UPDATE account_balance_details SET pre_balance=:PreBalance, today_in=:TodayIn, today_out=:TodayOut, current_balance=:CurBalance, payment_type=:PayType, received_by=:ReceivedBy, last_update=:LastUpdate, status=:Status Where ach_id = :uid');

      $stmt->bindParam(':PreBalance', $PreBalance);
      $stmt->bindParam(':TodayIn', $TodayIn);
      $stmt->bindParam(':TodayOut', $TodayOut);
      $stmt->bindParam(':CurBalance', $CurBalance);
      $stmt->bindParam(':PayType', $PayType);
      $stmt->bindParam(':ReceivedBy', $ReceivedBy);
      $stmt->bindParam(':LastUpdate', $LastUpdate);
      $stmt->bindParam(':Status', $Status);
      $stmt->bindParam(':uid', $id);

      if ($stmt->execute()) {
  ?>
        <script>
          alert('Update Successful...');
          window.location.href = 'balance-history';
        </script>
  <?php
      } else {
        $errMSG = "Sorry Data Could Not Updated !";
      }
    }
  }

  ?>

  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit / Update Balance History</h1>
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


                <?php
                if (isset($errMSG)) {
                ?>
                  <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                  </div>
                <?php
                }
                ?>


                <table class="table table-hover table-responsive">

                  <tr>
                    <td><label class="control-label">Previous Balance </label></td>
                    <td><input class="form-control" type="number" name="PreBalance" id="PreBalance" placeholder="Previous Balance" value="<?php echo $pre_balance; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Today In </label></td>
                    <td><input class="form-control" type="number" name="TodayIn" id="TodayIn" placeholder="Today In" value="<?php echo $today_in; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Today Out </label></td>
                    <td><input class="form-control" type="number" name="TodayOut" id="TodayOut" placeholder="Today Out" value="<?php echo $today_out; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Current Balance </label></td>
                    <td><input class="form-control" type="number" name="CurBalance" id="CurBalance" placeholder="Current Balance" readonly></td>
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
                    <td><input class="form-control" type="text" name="ReceivedBy" placeholder="Received By" value="<?php echo $received_by; ?>"></td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Date </label></td>
                    <td><input class="form-control" type="date" name="LastUpdate" value="<?php echo $last_update ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Status </label></td>
                    <td>
                      <select name="Status" id="Status" class="form-control">
                        <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Inactive</option>
                      </select>
                    </td>
                  </tr>
                </table>



                <tr>
                  <td colspan="2">
                    <button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update </button>
                    <a class="btn btn-danger" href="balance-history"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
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
      // Function to calculate current balance
      function calculateCurBalance() {
        var PreBalance = parseFloat($('#PreBalance').val()) || 0;
        var TodayIn = parseFloat($('#TodayIn').val()) || 0;
        var TodayOut = parseFloat($('#TodayOut').val()) || 0;

        var result = PreBalance + TodayIn - TodayOut;

        // Set the result in the readonly input
        $('#CurBalance').val(result.toFixed(0));
      }

      // Calculate on input change
      $('#PreBalance, #TodayIn, #TodayOut').on('input', calculateCurBalance);

      // Calculate on page load
      calculateCurBalance();
    });
  </script>