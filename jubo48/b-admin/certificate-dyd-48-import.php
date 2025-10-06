<?php

// Error reporting (development time)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");
if ($con->connect_error) {
  die("Database connection failed: " . $con->connect_error);
}

// SimpleXLSX library include
require_once __DIR__ . '/assets/lib/SimpleXLSX.php';
use Shuchkin\SimpleXLSX;

// Import logic & redirect
if (isset($_POST['import_excel'])) {
  if (isset($_FILES['import_file']) && is_uploaded_file($_FILES['import_file']['tmp_name'])) {
    $filePath = $_FILES['import_file']['tmp_name'];
    if ($xlsx = SimpleXLSX::parse($filePath)) {
      $rows = $xlsx->rows();
      $inserted = 0;
      $skipped = 0;

      foreach ($rows as $index => $row) {
        if ($index == 0) continue; // skip header

        $district = trim($row[0] ?? '');
        $group = trim($row[1] ?? '');
        $batch = trim($row[2] ?? '');
        $stu_id = trim($row[3] ?? '');
        $stu_name = trim($row[4] ?? '');
        $gender = trim($row[5] ?? '');
        $nid = trim($row[6] ?? '');
        $father = trim($row[7] ?? '');
        $mother = trim($row[8] ?? '');
        $duration = trim($row[9] ?? '');

        if ($stu_id == '') continue;

        // Check duplicate
        $check = $con->prepare("SELECT id FROM dyd_certificate WHERE stu_id = ?");
        $check->bind_param("s", $stu_id);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
          $skipped++;
          $check->close();
          continue;
        }
        $check->close();

        // Insert
        $stmt = $con->prepare("INSERT INTO dyd_certificate (district, `group`, batch, stu_id, stu_name, gender, nid, father, mother, duration)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $district, $group, $batch, $stu_id, $stu_name, $gender, $nid, $father, $mother, $duration);
        $stmt->execute();
        $stmt->close();
        $inserted++;
      }

      // Redirect to view page with success message
      header("Location: certificate-dyd-48-view.php?imported=$inserted&skipped=$skipped");
      exit();
    } else {
      // Redirect with error
      $error = urlencode(SimpleXLSX::parseError());
      header("Location: certificate-dyd-48-view.php?error=$error");
      exit();
    }
  } else {
    // Redirect with error
    header("Location: certificate-dyd-48-view.php?error=No+file+selected");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DYD Certificate Bulk Import</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Bulk Import DYD Certificates</h4>
      </div>
      <div class="card-body">

        <!-- Import Form -->
        <form method="POST" enctype="multipart/form-data" class="mb-4">
          <div class="row g-2 align-items-end">
            <div class="col-md-6">
              <input type="file" name="import_file" accept=".xlsx" class="form-control" required>
            </div>
            <div class="col-md-3">
              <button type="submit" name="import_excel" class="btn btn-success w-100">Import Excel</button>
            </div>
          </div>
        </form>

        <div class="alert alert-info mt-4">
          <b>Excel Column Order:</b><br>
          District | Group | Batch | Student ID | Student Name | Gender | NID | Father | Mother | Duration
        </div>

      </div>
    </div>
  </div>
</body>
</html>