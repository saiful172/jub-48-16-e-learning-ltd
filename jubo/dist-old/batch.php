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

    .form-group label {
      text-align: left !important;
      display: block;
    }
  </style>

</head>

<body>


  <?php
  if (isset($_GET['delete_id'])) {
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM batch_list WHERE batch_id = :uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();
  }

  // Initialize variables
  $BatchName = '';
  $EditMode = false;

  if (isset($_POST['submit'])) {
    $UserId = $_POST['UserId'];
    $BatchName = $_POST['batch_name'];
    $BatchStatus = $_POST['status'];

    if (isset($_POST['edit_id'])) {
      // Editing existing batch batch
      $edit_id = $_POST['edit_id'];
      $sql = "UPDATE batch_list SET batch_name = :BatchName , status = :BatchStatus WHERE batch_id = :edit_id";
      $stmt = $DB_con->prepare($sql);
      $stmt->bindParam(':BatchName', $BatchName);
      $stmt->bindParam(':BatchStatus', $BatchStatus);
      $stmt->bindParam(':edit_id', $edit_id);
      if ($stmt->execute()) {
        echo '<script>alert("Data Successfully Updated."); window.location.href = window.location.href;</script>';
        exit; // Exit after redirect
      } else {
        $errMSG = "Error while updating data.";
      }
    } else {
      // Adding new batch batch
      $sql = "INSERT INTO batch_list (user_id, batch_name, status) VALUES (:UserId, :BatchName, :BatchStatus)";
      $stmt = $DB_con->prepare($sql);
      $stmt->bindParam(':UserId', $UserId);
      $stmt->bindParam(':BatchName', $BatchName);
      $stmt->bindParam(':BatchStatus', $BatchStatus);
      if ($stmt->execute()) {
        echo '<script>alert("Data Successfully Added."); window.location.href = window.location.href;</script>';
        exit; // Exit after redirect
      } else {
        $errMSG = "Error while inserting data.";
      }
    }
  }

  if (isset($_GET['edit_id'])) {
    // Fetch data for editing
    $edit_id = $_GET['edit_id'];
    $sql = "SELECT * FROM batch_list WHERE batch_id = :edit_id";
    $stmt = $DB_con->prepare($sql);
    $stmt->bindParam(':edit_id', $edit_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $BatchName = $row['batch_name'];
      $BatchStatus = $row['status'];
      $EditMode = true;
    }
  }
  ?>

  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <!-- Display Batch Batchs -->
        <table class="table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Batch</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sl = 0;
            $eq = mysqli_query($con, "SELECT * FROM batch_list ORDER BY batch_id DESC");
            while ($eqrow = mysqli_fetch_array($eq)) {
              $sl++;
            ?>
              <tr>
                <td><?= $sl; ?></td>
                <td><?= $eqrow['batch_name']; ?></td>
                <td>
                  <?php
                  if ($eqrow['status']) {
                    echo '<span class="glyphicon glyphicon-ok-circle text-success" style="font-size: 22px"></span>';
                  } else {
                    echo '<span class="glyphicon glyphicon-remove-circle text-danger" style="font-size: 22px"></span>';
                  }
                  ?>
                </td>
                <td>
                  <a class="btn btn-danger" href="?delete_id=<?= $eqrow['batch_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"> <span class="glyphicon glyphicon-remove-circle"></span> Delete </a>
                  <a class="btn btn-info" href="?edit_id=<?= $eqrow['batch_id']; ?>" title="click for edit"> <span class="glyphicon glyphicon-edit"></span> Edit </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="col-md-6">
        <a href="batch" class="btn btn-success" style="margin-bottom: 1rem !important;">Reload</a>
        <!-- Form for Adding or Editing Batch Batchs -->
        <div class="card">
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <?php if ($EditMode) : ?>
                <input type="hidden" name="edit_id" value="<?= $edit_id; ?>">
              <?php else : ?>
                <?php
                $pq = mysqli_query($con, "SELECT * FROM stuff LEFT JOIN `user` ON user.userid=stuff.userid WHERE stuff.userid='" . $_SESSION['id'] . "'");
                while ($pqrow = mysqli_fetch_array($pq)) {
                ?>
                  <input type="hidden" name="UserId" value="<?= $pqrow['userid']; ?>">
                <?php } ?>
              <?php endif; ?>

              <div class="form-group">
                <label for="batch_name" class="form-label">Batch</label>
                <input type="text" class="form-control" name="batch_name" id="batch_name" required placeholder="Enter batch" value="<?= $BatchName; ?>">
              </div>

              <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="status">
                  <option value="1" <?php echo ($BatchStatus == 1) ? 'selected' : ''; ?>>Active</option>
                  <option value="0" <?php echo ($BatchStatus == 0) ? 'selected' : ''; ?>>Inactive</option>
                </select>

              </div>

              <button type="submit" name="submit" class="btn btn-<?= $EditMode ? 'info' : 'success'; ?>">
                <?= $EditMode ? 'Update' : 'Save Now'; ?>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include('includes/footer.php'); ?>