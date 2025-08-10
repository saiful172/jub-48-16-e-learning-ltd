<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'head_link.php'; ?>

</head>

<body>

  <?php require_once 'header1.php'; ?>

  <?php require_once 'sidebar.php'; ?>


  <main id="main" class="main1">

    <div class="pagetitle">
      <h1> Single Company Sales / Statement Report </h1>
      <hr>
    </div>


    <section class="section">
      <div class="row">

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body p-5">

              <form class="form-horizontal" action="php_action/sales_report_single_com_by_date.php" method="post" id="getOrderReportForm2">

                <div class="row mb-3 mt-5">
                  <label for="ComId" class="col-sm-3 control-label">Company Name</label>
                  <div class="col-sm-9">
                    <select style="width:85%;" class="form-control chosen-select" Id="ComId" name="ComId" required>
                      <option value="" required>Select Company Name</option>

                      <?php
                      $sql = "SELECT * FROM company_group WHERE status = 1 AND user_id='" . $_SESSION['id'] . "'";
                      $result = $con->query($sql);

                      while ($row = $result->fetch_array()) { ?>
                        <option value="<?= $row['com_id'] ?>"><?= $row['user_id'] ?> - <?= $row['com_name'] ?></option>
                      <?php }
                      ?>

                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="startDate" class="col-sm-3 col-form-label">Start Date</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="endDate" class="col-sm-3 col-form-label">End Date</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                  </div>
                </div>


                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="generateReportBtn"> <i class="bi bi-file-earmark-text"></i> Open Report</button>
                </div>



              </form>


            </div>
          </div>

        </div>
      </div>
    </section>


  </main>



  <?php require_once 'footer1.php'; ?>


  <script src="custom/js/report.js"></script>
  <script src="js/chosen.js"></script>
  <script type="text/javascript">
    $('.chosen-select').chosen({
      width: "100%"
    });
  </script>