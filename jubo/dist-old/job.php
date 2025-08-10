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
    $stmt_delete = $DB_con->prepare('DELETE FROM jobs WHERE j_id = :uid');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();
  }

  // Initialize variables
  $WorkName = '';
  $EditMode = false;

  if (isset($_POST['submit'])) {
    $UserId = $_POST['UserId'];
    $WorkName = $_POST['job_name'];

    if (isset($_POST['edit_id'])) {
      // Editing existing work source
      $edit_id = $_POST['edit_id'];
      $sql = "UPDATE jobs SET job_name = :WorkName WHERE j_id = :edit_id";
      $stmt = $DB_con->prepare($sql);
      $stmt->bindParam(':WorkName', $WorkName);
      $stmt->bindParam(':edit_id', $edit_id);
      if ($stmt->execute()) {
        echo '<script>alert("Data Successfully Updated."); window.location.href = window.location.href;</script>';
        exit; // Exit after redirect
      } else {
        $errMSG = "Error while updating data.";
      }
    } else {
      // Adding new work source
      $sql = "INSERT INTO jobs (user_id, job_name) VALUES (:UserId, :WorkName)";
      $stmt = $DB_con->prepare($sql);
      $stmt->bindParam(':UserId', $UserId);
      $stmt->bindParam(':WorkName', $WorkName);
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
    $sql = "SELECT * FROM jobs WHERE j_id = :edit_id";
    $stmt = $DB_con->prepare($sql);
    $stmt->bindParam(':edit_id', $edit_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      $WorkName = $row['job_name'];
      $EditMode = true;
    }
  }
  ?>

  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <!-- Display Work Sources -->
        <table class="table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Source</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sl = 0;
            $eq = mysqli_query($con, "SELECT * FROM jobs ORDER BY j_id DESC");
            while ($eqrow = mysqli_fetch_array($eq)) {
              $sl++;
            ?>
              <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $eqrow['job_name']; ?></td>
                <td>
                  <a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['j_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure....?')"> <span class="glyphicon glyphicon-remove-circle"></span> Delete </a>
                  <a class="btn btn-info" href="?edit_id=<?php echo $eqrow['j_id']; ?>" title="click for edit">  <span class="glyphicon glyphicon-edit"></span> Edit  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="col-md-6">
        <a href="job" class="btn btn-success" style="margin-bottom: 1rem !important;">Reload</a>
        <!-- Form for Adding or Editing Work Sources -->
        <div class="card">
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <?php if ($EditMode) : ?>
                <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
              <?php else : ?>
                <?php
                $pq = mysqli_query($con, "SELECT * FROM stuff LEFT JOIN `user` ON user.userid=stuff.userid WHERE stuff.userid='" . $_SESSION['id'] . "'");
                while ($pqrow = mysqli_fetch_array($pq)) {
                ?>
                  <input type="hidden" name="UserId" value="<?php echo $pqrow['userid']; ?>">
                <?php } ?>
              <?php endif; ?>

              <div class="form-group">
                <label for="job_name" class="form-label">Work Source</label>
                <input type="text" class="form-control" name="job_name" id="job_name" required placeholder="Enter work source" value="<?php echo $WorkName; ?>">
              </div>

              <button type="submit" name="submit" class="btn btn-<?php echo $EditMode ? 'info' : 'success'; ?>">
                <?php echo $EditMode ? 'Update' : 'Save Now'; ?>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include('includes/footer.php'); ?>