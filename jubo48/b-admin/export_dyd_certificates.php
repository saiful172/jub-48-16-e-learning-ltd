<?php
// export_dyd_certificates.php
// If called with export=1 -> download CSV of filtered or all data
// If called with fetch=1 -> return JSON array (optional extension if you want AJAX table)

$con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// get filters (sanitize)
$district = isset($_GET['district']) ? $con->real_escape_string(trim($_GET['district'])) : '';
$batch = isset($_GET['batch']) ? $con->real_escape_string(trim($_GET['batch'])) : '';
$group = isset($_GET['group']) ? $con->real_escape_string(trim($_GET['group'])) : '';

$where_clauses = [];
if ($district !== '') $where_clauses[] = "district = '{$district}'";
if ($batch !== '') $where_clauses[] = "batch = '{$batch}'";
if ($group !== '') $where_clauses[] = "`group` = '{$group}'";
$where_sql = '';
if (count($where_clauses) > 0) $where_sql = 'WHERE ' . implode(' AND ', $where_clauses);

// JSON fetch mode (not used by current page, but included for future use)
if (isset($_GET['fetch'])) {
  $rows = [];
  $res = $con->query("SELECT id, district, `group`, batch, stu_id, stu_name, gender, nid, father, mother, duration FROM dyd_certificate $where_sql ORDER BY district ASC");
  while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
  }
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($rows);
  exit;
}

// Export mode (download CSV)
if (isset($_GET['export'])) {
  // Output CSV headers
  $filename = "dyd_certificates_" . date('Ymd_His') . ".csv";
  header('Content-Type: text/csv; charset=utf-8');
  header("Content-Disposition: attachment; filename={$filename}");

  $output = fopen('php://output', 'w');
  // BOM to help Excel open UTF-8 CSV
  fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

  // write header row
  fputcsv($output, ['District', 'Group', 'Batch', 'Student ID', 'Student Name', 'Gender', 'NID', 'Father Name', 'Mother Name', 'Duration']);

  $res = $con->query("SELECT district, `group`, batch, stu_id, stu_name, gender, nid, father, mother, duration FROM dyd_certificate $where_sql ORDER BY district ASC");
  while ($r = $res->fetch_assoc()) {
    $row = [
      $r['district'],
      $r['group'],
      $r['batch'],
      $r['stu_id'],
      $r['stu_name'],
      $r['gender'],
      $r['nid'],
      $r['father'],
      $r['mother'],
      $r['duration']
    ];
    fputcsv($output, $row);
  }
  fclose($output);
  exit;
}

// if nothing matched, exit
http_response_code(400);
echo "Bad request.";
exit;
