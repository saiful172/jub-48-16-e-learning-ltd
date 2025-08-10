<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>
</head>

<body>
  <?php require_once 'header1.php'; ?>
  <?php
  if (isset($_POST['btn_save_updates'])) {
    // Assuming $DB_con is your database connection

    // Retrieve POST data
    $UserId = $_POST['UserId'];
    $ComGroupId = $_POST['ComGroupId'];
    $ProjectId = $_POST['ProjectId'];
    $PreAmtCash = $_POST['PreAmtCash'];
    $TodayIn = $_POST['TodayIn'];
    $TodayOut = $_POST['TodayOut'];
    $CrntBalCash = $_POST['CrntBalCash'];
    $BalFromBank = $_POST['BalFromBank'];
    $BalBankTo = $_POST['BalBankTo'];
	
    $PayType = $_POST['PayType'];
    $ReceivedBy = $_POST['ReceivedBy'];
    $LastUpdate = $_POST['LastUpdate'];
    $BankId = $_POST['BankId'];
    $BankIdTo = $_POST['BankIdTo'];
    $CheckNumber = $_POST['CheckNumber'];
    $PreAmtBank = $_POST['PreAmtBank'];
    $AccountNo = $_POST['Account'];
    $Causes = 'Bank To Bank';
    $Status = 1;
    $Type = 3;

    // Validate required fields
    if (empty($PayType)) {
      $errMSG = "Please Select Payment Type.";
    } else {
      // Update account_balance table
      $stmt = $DB_con->prepare('UPDATE account_balance SET ac_com_group_id=:ComGroupId, ac_project_id=:ProjectId, pre_balance=:PreAmtCash, today_in=:TodayIn, today_out=:TodayOut, current_balance=:CrntBalCash, current_bank_balance=:BalFromBank, check_number=:CheckNumber, payment_type=:PayType, received_by=:ReceivedBy, last_update=:LastUpdate, status=:Status WHERE ac_id = :uid');

      $stmt->bindParam(':ComGroupId', $ComGroupId);
      $stmt->bindParam(':ProjectId', $ProjectId);
      $stmt->bindParam(':PreAmtCash', $PreAmtCash);
      $stmt->bindParam(':TodayIn', $TodayIn);
      $stmt->bindParam(':TodayOut', $TodayOut);
      $stmt->bindParam(':CrntBalCash', $CrntBalCash);
      $stmt->bindParam(':BalFromBank', $BalFromBank); 
      $stmt->bindParam(':PayType', $PayType);
      $stmt->bindParam(':ReceivedBy', $ReceivedBy);
      $stmt->bindParam(':Status', $Status);
      $stmt->bindParam(':LastUpdate', $LastUpdate);
      $stmt->bindParam(':CheckNumber', $CheckNumber);
      $stmt->bindParam(':uid', $UserId); // assuming $id was meant to be $UserId

      if ($stmt->execute()) {
        // Update bank_money table
        $stmt_bank = $DB_con->prepare('UPDATE bank_money SET  previous_amt=:PreAmtBank, today_amt=:TodayIn, recent_amt=:BalFromBank WHERE bank_id = :BankId');

        $stmt_bank->bindParam(':PreAmtBank', $PreAmtBank);
        $stmt_bank->bindParam(':TodayIn', $TodayIn);
        $stmt_bank->bindParam(':BalFromBank', $BalFromBank); 
        $stmt_bank->bindParam(':BankId', $BankId);
        $stmt_bank->execute();
		
		
		// update From Bank
		$stmt_bank_from = $DB_con->prepare('UPDATE bank_money SET   today_amt=:TodayIn, recent_amt=:BalBankTo WHERE bank_id = :BankIdTo');

      //  $stmt_bank_from->bindParam(':PreAmtBank', $PreAmtBank);
        $stmt_bank_from->bindParam(':TodayIn', $TodayIn);
        $stmt_bank_from->bindParam(':BalBankTo', $BalBankTo);
        $stmt_bank_from->bindParam(':BankIdTo', $BankIdTo); 
        $stmt_bank_from->execute();
		


        // Insert into bank_money_history
        $stmt_bank_details = $DB_con->prepare('INSERT INTO bank_money_history (user_id, bank_id, bank_id_to, com_group_id, project_id, account_no, previous_amt, money_in, money_out,recent_amt,refer,cuses,check_number,type,entry_date) VALUES (:UserId, :BankId, :BankIdTo, :ComGroupId, :ProjectId, :AccountNo, :PreAmtBank, :TodayIn, :TodayOut, :BalFromBank, :ReceivedBy, :Causes, :CheckNumber, :Type, :LastUpdate)');

        $stmt_bank_details->bindParam(':UserId', $UserId);
        $stmt_bank_details->bindParam(':BankId', $BankId);
        $stmt_bank_details->bindParam(':BankIdTo', $BankIdTo);
        $stmt_bank_details->bindParam(':ComGroupId', $ComGroupId);
        $stmt_bank_details->bindParam(':ProjectId', $ProjectId);
        $stmt_bank_details->bindParam(':AccountNo', $AccountNo);
        $stmt_bank_details->bindParam(':PreAmtBank', $PreAmtBank);
        $stmt_bank_details->bindParam(':TodayIn', $TodayIn);
        $stmt_bank_details->bindParam(':TodayOut', $TodayOut);
        $stmt_bank_details->bindParam(':BalFromBank', $BalFromBank);
        $stmt_bank_details->bindParam(':ReceivedBy', $ReceivedBy);
        $stmt_bank_details->bindParam(':Causes', $Causes);
        $stmt_bank_details->bindParam(':CheckNumber', $CheckNumber);
        $stmt_bank_details->bindParam(':Type', $Type);
        $stmt_bank_details->bindParam(':LastUpdate', $LastUpdate);
        $stmt_bank_details->execute();

        // Insert into account_balance_details
        $stmt_details = $DB_con->prepare('INSERT INTO account_balance_details (user_id, bank_id, bank_id_to, ac_com_group_id, ac_project_id, check_number, pre_balance, today_in, today_out, current_balance, payment_type, received_by, causes, last_update, status, type) VALUES (:UserId, :BankId, :BankIdTo, :ComGroupId, :ProjectId, :CheckNumber, :PreAmtCash, :TodayIn, :TodayOut, :CrntBalCash, :PayType, :ReceivedBy, :Causes, :LastUpdate, :Status, :Type)');

        $stmt_details->bindParam(':UserId', $UserId);
        $stmt_details->bindParam(':BankId', $BankId);
        $stmt_details->bindParam(':BankIdTo', $BankIdTo);
        $stmt_details->bindParam(':ComGroupId', $ComGroupId);
        $stmt_details->bindParam(':ProjectId', $ProjectId);
        $stmt_details->bindParam(':CheckNumber', $CheckNumber);
        $stmt_details->bindParam(':PreAmtCash', $PreAmtCash);
        $stmt_details->bindParam(':TodayIn', $TodayIn);
        $stmt_details->bindParam(':TodayOut', $TodayOut);
        $stmt_details->bindParam(':CrntBalCash', $CrntBalCash);
        $stmt_details->bindParam(':PayType', $PayType);
        $stmt_details->bindParam(':ReceivedBy', $ReceivedBy);
        $stmt_details->bindParam(':Causes', $Causes);
        $stmt_details->bindParam(':LastUpdate', $LastUpdate);
        $stmt_details->bindParam(':Status', $Status);
        $stmt_details->bindParam(':Type', $Type);

        if ($stmt_details->execute()) ?>
        <script>
        alert('Update Successful...');
          window.location.href = 'balance';
        </script>
  <?php
      }
    }
  }

  ?>

  



  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bank To Bank</h1>
      <hr>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-6 m-auto">

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
                    <td><label class="control-label">Company Group</label></td>
                    <td>
                      <select name="ComGroupId" id="ComGroupId" class="form-select">
                        <option disabled selected>-- Selected Company Group --</option>
                        <?php
                        $sql = "SELECT * FROM company_group where status=1";
                        $result = $con->query($sql);

                        while ($row = $result->fetch_array()) { ?>
                          <option value="<?= $row['com_id'] ?>"><?= $row['com_name'] ?></option>
                        <?php }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Project</label></td>
                    <td>
                      <select name="ProjectId" id="ProjectId" class="form-select">
                        <option disabled selected>-- Selected Project --</option>
                        <?php
                        $sql = "SELECT * FROM project where status=1";
                        $result = $con->query($sql);

                        while ($row = $result->fetch_array()) { ?>
                          <option value="<?= $row['pro_id'] ?>"><?= $row['pro_name'] ?></option>
                        <?php }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">From</label>
                    <td>
                      <select style="width:100%;" class="form-select" style="width:100%;" name="BankId" id="BankId" required="" />
                      <option value="#">Select Bank</option>
                      <?php
                      $sql = "SELECT distinct bank_money.bank_id,bank_name.name,bank_money.account_no 
					  FROM  bank_money
					  left join  bank_name on bank_name.id=bank_money.bank_id
					  order by bank_money.bank_id asc  ";
                      $result = $con->query($sql);

                      while ($row = $result->fetch_array()) {
                        echo "<option value='" . $row[0] . "'>" . $row[1] . "-" . $row[2] . "</option>";
                      } // while
                      ?>
                      </select>
                    </td>
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label">Bank Name</label></td>
                    <td><input class="form-control" type="text" id="BankName" name="BankName" placeholder="Bank Name" disabled="true" />
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label"> Account No.</label></td>
                    <td><input class="form-control" type="text" id="Account" name="Account" placeholder=" Account No." value="<?php echo $Account; ?>" readonly></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Transfer To</label>
                    <td>
                      <select style="width:100%;" class="form-select" style="width:100%;" name="BankIdTo" id="BankIdTo" required="" />
                      <option value="#">Select Bank</option>
                      <?php
                      $sql = "SELECT distinct bank_money.bank_id,bank_name.name,bank_money.account_no 
					  FROM  bank_money
					  left join  bank_name on bank_name.id=bank_money.bank_id
					  order by bank_money.bank_id asc  ";
                      $result = $con->query($sql);

                      while ($row = $result->fetch_array()) {
                        echo "<option value='" . $row[0] . "'>" . $row[1] . "-" . $row[2] . "</option>";
                      } // while
                      ?>
                      </select>
                    </td>
                  </tr>
				   

                  <tr class="d-none">
                    <td><label class="control-label">Bank Name</label></td>
                    <td><input class="form-control" type="text" id="BankName" name="BankName" placeholder="Bank Name" disabled="true" />
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label">Previous Balance</label></td>
                    <td><input class="form-control" type="number" name="PreAmtCash" id="PreAmtCash" placeholder="Previous Balance" value="<?php echo $current_balance; ?>"></td>
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label"> Account No.</label></td>
                    <td><input class="form-control" type="text" id="AccountTo" name="Account" placeholder=" Account No." value="<?php echo $Account; ?>" readonly></td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Check No.</label></td>
                    <td><input class="form-control" type="text" id="CheckNumber" name="CheckNumber" placeholder="Check No." value="0"></td>
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label">Amount Of Balance</label></td>
                    <td> <input class="form-control" type="text" id="PreAmtBank" name="PreAmtBank" placeholder="Balance" value="<?php echo $PreAmtBank; ?>" oninput="myFunctionAmt()" readonly></td>
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label">Balance Received (Bank)</label></td>
                    <td><input class="form-control" type="number" name="PreAmtBankTo" id="PreAmtBankTo" value="0" readonly></td>
                  </tr>


                  <tr class="d-none">
                    <td><label class="control-label">Previous Balance</label></td>
                    <td><input class="form-control" type="number" name="CrntBalCash" id="CrntBalCash" placeholder="Previous Balance" value="<?php echo $current_balance; ?>"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Balance From</label></td>
                    <td><input class="form-control" type="number" name="BalFromBank" id="BalFromBank" value="0" readonly></td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Transfer Amount</label></td>
                    <td><input class="form-control" type="number" name="TodayIn" id="TodayIn" value="0" oninput="myFunctionAmt()"></td>
                  </tr>



                  <tr class="d-none">
                    <td><label class="control-label">Today Out</label></td>
                    <td><input class="form-control" type="number" name="TodayOut" id="TodayOut" value="0"></td>
                  </tr>


                  <tr>
                    <td><label class="control-label">Balance To </label></td>
                    <td><input class="form-control" type="number" name="BalBankTo" id="BalBankTo" value="0" readonly></td>
                  </tr>



                  <script>
                    function myFunctionAmt() {
                      var x = Number(document.getElementById("TodayIn").value);
                      var y = Number(document.getElementById("PreAmtBankTo").value);
                      var x1 = Number(document.getElementById("PreAmtBank").value);
                      var z = x + y;
                      var z1 = x1 - x;

                      document.getElementById("BalBankTo").value = z;
                      document.getElementById("BalFromBank").value = z1;
                    }
                  </script>


                  <tr>
                    <td><label class="control-label">Payment Type </label></td>
                    <td>
                      <select class="form-select" name="PayType" id="PayType">

                        <option disabled selected>-- Selected Payment Type --</option>
                        <?php
                        $sql = "SELECT  pt_id,pt_name FROM payment_type ";
                        $result = $con->query($sql);

                        while ($row = $result->fetch_array()) {
                          echo "<option value='" . $row[1] . "'>" . $row[1] . "</option>";
                        }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Transfer By </label></td>
                    <td><input class="form-control" type="text" name="ReceivedBy" placeholder="Received By" value="Na"></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Date </label></td>
                    <td><input class="form-control" type="date" name="LastUpdate" value="<?php echo date("Y-m-d"); ?>"></td>
                  </tr>


                  <!-- <tr>
                    <td><label class="control-label">Status </label></td>
                    <td>
                      <select name="Status" id="Status" class="form-control">
                        <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Inactive</option>
                      </select>
                    </td>
                  </tr> -->

                </table>

                <tr>
                  <td colspan="2">
                    <center>
                      <button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update </button>
                      <a class="btn btn-danger" href="cash-balance"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
                    </center>
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
    $("#BankId").on("change", function() {

      var BankId = $("#BankId").val();
      if (BankId == "") {
        alert("Please enter a valid customer ID!");
      } else {
        $.ajax({
          url: "ajax_c_load_bank_money.php?c=" + BankId,
          success: function(result) {
            var customer = JSON.parse(result);
            $("#BankName").val(customer.customerName);
            $("#Account").val(customer.AccNo);
            $("#PreAmtBank").val(customer.RecentAmt);
            $("#BalFromBank").val(customer.RecentAmt);


          }
        });
      }
    });
  </script>


  <script>
    $("#BankIdTo").on("change", function() {

      var BankIdTo = $("#BankIdTo").val();
      if (BankIdTo == "") {
        alert("Please enter a valid customer ID!");
      } else {
        $.ajax({
          url: "ajax_c_load_bank_money.php?c=" + BankIdTo,
          success: function(result) {
            var customer = JSON.parse(result);
            $("#BankName").val(customer.customerName);
            $("#AccountTo").val(customer.AccNo);
            $("#PreAmtBankTo").val(customer.RecentAmt);
            $("#BalBankTo").val(customer.RecentAmt);
          }
        });
      }
    });
  </script>