<?php
session_start();
require_once '../../includes/conn.php';
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/table_data_center_with_border_black.css">
  <style>
    .container {
      width: 100%;
    }

    .container span {
      font-size: 20px;
    }
  </style>
</head>

<body>

  <div class="container">
    <br>
    <center>
      <?php
      $pq = mysqli_query($con, "SELECT * FROM stuff LEFT JOIN `user` ON user.userid=stuff.userid WHERE stuff.userid='" . $_SESSION['id'] . "'");
      while ($pqrow = mysqli_fetch_array($pq)) {
      ?>
        <span style="font-size:21;font-weight:bold;">
          <?php echo $pqrow['business_name']; ?><br>
        </span>
      <?php } ?>
      <span>
        Company Sales Report - Date Wise( Single ) <br>
      </span>

      <span>
        <?php
        $ComId = $_POST['ComId'];
        $company_query = mysqli_query($con, "SELECT com_name FROM company_group WHERE com_id = '" . $ComId . "'");
        $company_row = mysqli_fetch_array($company_query);
        $com_name = $company_row['com_name']; {
        ?>
          Company Name : <?= $company_row['com_name'] ?>
        <?php } ?>
      </span>

      <br>

      <?php
      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];

      echo ' Date From : ';
      echo $startDate;
      echo ' |  Date To :  ';
      echo $endDate;
      ?>
      <br>
      Date : <?php echo date("M d, Y"); ?> |
      Time : <?php date_default_timezone_set("Asia/Dhaka");
              echo  date("h:i:sa"); ?>
    </center>
    <br>

    <?php
    if ($_POST) {
      $ComId = $_POST['ComId'];
      $startDate = $_POST['startDate'];
      $date = DateTime::createFromFormat('m/d/Y', $startDate);
      $start_date = $date->format("Y-m-d");

      $endDate = $_POST['endDate'];
      $format = DateTime::createFromFormat('m/d/Y', $endDate);
      $end_date = $format->format("Y-m-d");

      $sql = "SELECT * FROM account_balance_details WHERE last_update >= '$start_date' AND last_update <= '$end_date' AND ac_com_group_id='$ComId' ORDER BY ach_id DESC";
      $query = $con->query($sql);
      $countOrder = mysqli_num_rows($query); ?>

      <table border="1" class="table table-bordered" style="width:100%;">
        <tr>
          <th>No</th>
          <th>Date</th>
          <th>Previous Balance</th>
          <th>Today In</th>
          <th>Today Out </th>
          <th>Current Balance</th>
          <th>Payment </th>
          <th>Received </th>
        </tr>
        <tr>


          <?php
          $sl = 0;
          $TodayTotal = 0;
          $TotalCollection = 0;
          while ($result = $query->fetch_assoc()) {
          ?>
        <tr>
          <td>
            <center><?= ++$sl ?></center>
          </td>
          <td>
            <center><?= date("M d, Y", strtotime($result['last_update'])) ?></center>
          </td>
          <td>
            <center><?= $result['pre_balance'] ?></center>
          </td>
          <td>
            <center><?= $result['today_in'] ?></center>
          </td>
          <td>
            <center><?= $result['today_out'] ?></center>
          </td>
          <td>
            <center><?= $result['current_balance'] ?></center>
          </td>
          <td>
            <center><?= $result['payment_type'] ?></center>
          </td>
          <td>
            <center><?= $result['received_by'] ?></center>
          </td>
        </tr>
      <?php
            $TodayTotal += $result['pre_balance'];
            $TotalCollection += $result['current_balance'];
          }
      ?>

      </tr>

      <tr>
        <td colspan="10">
          <center>
            <b>Total Invoice = <?= $countOrder ?><br>
              Total Sale Today = <?= $TodayTotal ?> <br>
              Total Collection = <?= $TotalCollection ?>
            </b>
          </center>
        </td>
      </tr>

      </table>

    <?php
    }
    ?>
  </div>
</body>

</html>