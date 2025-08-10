<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php
  if (isset($_POST['btnsave'])) {
    // Common variables
    $UserId = $_POST['UserId'];
    $ComGroupId = $_POST['ComGroupId'];
    $ProjectId = $_POST['ProjectId'];
    $Account = $_POST['Account'];
    $BankId = $_POST['BankId'];
    $PreAmt = $_POST['PreAmt'];
    $SavingAmt = $_POST['SavingAmt'];
    $RecAmt = $_POST['RecAmt'];
    $CheckNumber = $_POST['CheckNumber'];
    $PayType = $_POST['PayType'];
    $Refer = $_POST['Refer'];
    $Date = $_POST['Date'];
    $Causes = 'Deposit';
    $Status = 1;
    $Type = 4;

    // Check for empty SavingAmt
    if (empty($SavingAmt)) {
      $errMSG = "Please Enter Saving Amount.";
    }

    // If no error occurred, continue
    if (!isset($errMSG)) {
      // Perform the first INSERT query
      $stmt1 = $DB_con->prepare('INSERT INTO bank_money_history (user_id, bank_id, com_group_id, project_id, account_no, previous_amt, money_in, money_out, recent_amt, check_number, refer, cuses, type, entry_date) 
            VALUES(:UserId, :BankId, :ComGroupId, :ProjectId, :Account, :PreAmt, :SavingAmt, 0, :RecAmt, :CheckNumber, :Refer, "Deposit", 3, :Date)');

      $stmt1->bindParam(':UserId', $UserId);
      $stmt1->bindParam(':ComGroupId', $ComGroupId);
      $stmt1->bindParam(':ProjectId', $ProjectId);
      $stmt1->bindParam(':BankId', $BankId);
      $stmt1->bindParam(':Account', $Account);
      $stmt1->bindParam(':PreAmt', $PreAmt);
      $stmt1->bindParam(':SavingAmt', $SavingAmt);
      $stmt1->bindParam(':RecAmt', $RecAmt);
      $stmt1->bindParam(':CheckNumber', $CheckNumber);
      $stmt1->bindParam(':Refer', $Refer);
      $stmt1->bindParam(':Date', $Date);
      $stmt1->execute();

      // Perform the second INSERT query
      $stmt2 = $DB_con->prepare('INSERT INTO account_balance_details (user_id, bank_id, ac_project_id, ac_com_group_id, check_number, pre_balance, today_in, payment_type,received_by,causes,last_update,status, type) 
            VALUES(:UserId, :BankId, :ComGroupId, :ProjectId, :CheckNumber, :RecAmt, :SavingAmt, :PayType, :Refer, :Causes, :Date, :Status, :Type)');

      $stmt2->bindParam(':UserId', $UserId);
      $stmt2->bindParam(':BankId', $BankId);
      $stmt2->bindParam(':ProjectId', $ProjectId);
      $stmt2->bindParam(':ComGroupId', $ComGroupId);
      $stmt2->bindParam(':CheckNumber', $CheckNumber);
      $stmt2->bindParam(':RecAmt', $RecAmt);
      $stmt2->bindParam(':SavingAmt', $SavingAmt);
      $stmt2->bindParam(':PayType', $PayType);
      $stmt2->bindParam(':Refer', $Refer);
      $stmt2->bindParam(':Causes', $Causes);
      $stmt2->bindParam(':Date', $Date);
      $stmt2->bindParam(':Status', $Status);
      $stmt2->bindParam(':Type', $Type);
      $stmt2->execute();


      // Perform the UPDATE query
      $stmt3 = $DB_con->prepare('UPDATE bank_money SET com_group_id=:ComGroupId, project_id=:ProjectId ,previous_amt=:PreAmt, today_amt=:SavingAmt,  recent_amt=:RecAmt, refer=:Refer, cuses="Deposit", last_update=:Date WHERE bank_id=:BankId ');

      $stmt3->bindParam(':BankId', $BankId);
      $stmt3->bindParam(':ComGroupId', $ComGroupId);
      $stmt3->bindParam(':ProjectId', $ProjectId);
      $stmt3->bindParam(':PreAmt', $PreAmt);
      $stmt3->bindParam(':SavingAmt', $SavingAmt);
      $stmt3->bindParam(':RecAmt', $RecAmt);
      $stmt3->bindParam(':Refer', $Refer);
      $stmt3->bindParam(':Date', $Date);
      if ($stmt3->execute()) {
  ?>
        <script>
          alert('Money Deposit Successfully');
          window.location.href = 'bank-account';
        </script>
  <?php
      } else {
        $errMSG = "Sorry Data Could Not Be Updated!";
      }
    }
  }
  ?>


  <?php require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Money Deposit | <span> <a href="bank-account"> <i class="bi bi-table"></i> </a> </span> </h1>
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
                    $pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
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
                    <td><label class="control-label">Bank Name</label></td>
                    <td> <select class="form-select" style="width:100%;" name="BankId" id="BankId" required="" />
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
                    <td><label class="control-label"> Account No. </label></td>
                    <td><input class="form-control" type="text" id="Account" name="Account" placeholder="Account No." value="<?php echo $Account; ?>" readonly></td>
                  </tr>

                  <tr class="d-none">
                    <td><label class="control-label">Amount Of Balance</label></td>
                    <td> <input class="form-control" type="text" id="PreAmt" name="PreAmt" placeholder="Amount Of Balance" value="<?php echo $PreAmt; ?>" oninput="myFunctionAmt()" readonly></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Check Number</label></td>
                    <td><input class="form-control" type="text" id="CheckNumber" name="CheckNumber" placeholder="Check Number" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label"> Deposit Amount</label></td>
                    <td><input class="form-control" type="text" id="SavingAmt" name="SavingAmt" placeholder="Today Deposit" value="<?php echo $SavingAmt; ?>" oninput="myFunctionAmt()" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Current Balance</label></td>
                    <td> <input class="form-control" type="text" id="RecAmt" name="RecAmt" placeholder="Current Deposit" value="<?php echo $RecAmt; ?>" oninput="myFunctionAmt()" readonly></td>
                  </tr>

                  <script>
                    function myFunctionAmt() {
                      var x = Number(document.getElementById("PreAmt").value);
                      var y = Number(document.getElementById("SavingAmt").value);
                      var z = Number(x + y);

                      document.getElementById("RecAmt").value = z;

                    }
                  </script>



                  <!-- <tr>
                    <td><label class="control-label">Balance To</label></td>
                    <td><input class="form-control" type="text" id="BalanceTo" name="BalanceTo" placeholder="Balance To" value="0" /></td>
                  </tr> -->


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
                    <td><label class="control-label">Reference</label></td>
                    <td><input class="form-control" type="text" id="Refer" name="Refer" placeholder="Reference" value="Own" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label"> Date </label></td>
                    <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d"); ?>" /></td>
                  </tr>




                </table>


                <tr>
                  <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
                      <span class="glyphicon glyphicon-save"></span> &nbsp; Save
                    </button>
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
            $("#PreAmt").val(customer.RecentAmt);
            $("#RecAmt").val(customer.RecentAmt);


          }
        });
      }
    });
  </script>