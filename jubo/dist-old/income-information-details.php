<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <script src="js/search.js"></script>
  
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

    .table td,
    .table th {
      vertical-align: middle !important;
    }
  </style>

</head>

<body>


  <?php
  if (isset($_GET['delete_id'])) {
    // Prepare and execute statement to select image paths from the database
    $stmt_select = $DB_con->prepare('SELECT incomePics FROM income_info WHERE in_id = :uid');
    $stmt_select->execute(array(':uid' => $_GET['delete_id']));
    $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);

    // Check if the 'incomePics' column contains any data
    if ($imgRow && isset($imgRow['incomePics'])) {
      // Convert the fetched string of image paths into an array
      $images = explode(',', $imgRow['incomePics']);

      // Loop through each image path and delete the file from the server if it exists
      foreach ($images as $image) {
        if (file_exists($image)) {
          unlink($image); // Delete the file
        }
      }
    }

    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM income_info WHERE in_id  =:uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();
  }

  ?>

  <div class="container">
      
    <div style="width:100%" class="form-group input-group">
      <span style="width:120px;" class="input-group-addon">Search </span>
      <input id="myInput" style="width:100%;" type="text" class="form-control" placeholder="Search..">
    </div>

    <table width="100%" class="table table-bordered table-hover" style="vertical-align: middle !important;">
      <thead>

        <tr>
          <th>Sl</th>
          <th>Name</th>
          <th>Student ID</th>
          <th>Batch</th>
          <th>Dollar</th>
          <th>BD.TK</th>
          <th>Payment Method</th>
          <th>Platform</th>
          <th>Job</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody id="tbody">
        <?php
        $sl = 0;
        // Assuming $con is your database connection object
        $eq = mysqli_query($con, "SELECT * FROM income_info 
        LEFT JOIN student_list ON income_info.student_id = student_list.student_id
        LEFT JOIN district ON student_list.district = district.id
        LEFT JOIN batch_list ON batch_list.batch_id = student_list.batch_id
        LEFT JOIN payment_method ON income_info.payment_type = payment_method.pm_id
        LEFT JOIN work_source ON income_info.work_source = work_source.ws_id
        LEFT JOIN jobs ON income_info.job_id = jobs.j_id 
        ORDER BY studentID ASC ");
        while ($eqrow = mysqli_fetch_array($eq)) {
          $eidm = $eqrow['user_id'];
          if ($_SESSION['id'] == $eqrow['id']) {
            $sl++;
        ?>
            <tr>
              <td><?= $sl; ?></td>
              <td width="14%"><?= $eqrow['stu_name']; ?></td>
              <td width="13%"><?= $eqrow['studentID'] ?></td>
              <td><?= $eqrow['batch_name']; ?></td>
              <td>
                <?php
                if ($eqrow['earning_dollar'] == null || $eqrow['earning_dollar'] == 0) {
                  echo '-';
                } else {
                  echo '$' . number_format($eqrow['earning_dollar'], 2);
                }
                ?>
              </td>

              <td>
                <?php
                if ($eqrow['earning_bd'] == null || $eqrow['earning_bd'] == 0) {
                  echo '-';
                } else {
                  echo '৳' . number_format($eqrow['earning_bd'], 2);
                }
                ?>
              </td>
              <td><?= $eqrow['payment_name'] ?? '-' ?></td>
              <td><?= $eqrow['work_name'] ?? '-' ?></td>
              <td><?= $eqrow['job_name'] ?? '-' ?></td>

              <td width="8%">
                <div class="text-center d-flex align-items-center">
                  <?php
                  $images = explode(",", $eqrow['incomePics']);
                  foreach ($images as $image) {
                    echo "<img src='$image' alt='Image' class='img-fluid' style='width:30px;height:30px; margin: 2px; border-radius: 2px;'>";
                  }
                  ?>
                </div>
              </td>

              <td width="12.2%">
                <a class="btn btn-success" href="income-information-edit?edit_id=<?= $eqrow['in_id'] ?>">Edit</a>
                <a class="btn btn-danger" href="?delete_id=<?= $eqrow['in_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')">Delete</a>
              </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>

    </table>

  </div>

  <?php include('includes/footer.php'); ?>