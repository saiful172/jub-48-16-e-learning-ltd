<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <style>
    h3 {
      margin: 0 !important;
      padding: 0 !important;
    }

    form {
      margin: 0 !important;
    }

    .container {
      margin-bottom: 5rem !important;
    }

    .card-body {
      padding: 1.5rem !important;
    }
  </style>

</head>

<body>

  <div class="container">
    <div class="card">
      <div class="card-body">

        <form action="income-information-report" method="post" target="_blank">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
              <h3> District Wise Reports </h3>
            </div>

            <div class="col-md-2">
              <select id="DistId" name="DistId" class="form-control" required="">
                <option value="<?= $_SESSION['id'] ?>"><?= $user ?></option>";
              </select>
            </div>

            <div class="col-md-2">
              <select id="Batch" name="Batch" class="form-control" required="">
                <option value="">Select Batch</option>
                <?php
                $sql = "SELECT * FROM batch_list";
                $result = $con->query($sql);
                while ($row = $result->fetch_array()) {
                  echo "<option value='" . $row['batch_id'] . "'>" . $row['batch_name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-2">
              <select id="Group" name="Group" class="form-control" required>
                <option value="">Select Group</option>
                <?php
                $sql = "SELECT * FROM group_list";
                $result = $con->query($sql);
                while ($row = $result->fetch_array()) {
                  echo "<option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-2">
              <button type="submit" name="submit" target="_blank" class="btn btn-success"> <i class="glyphicon glyphicon-ok-sign"></i> Open Report </button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>

  <?php include('includes/footer.php'); ?>