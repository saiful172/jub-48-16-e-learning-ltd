<?php
require __DIR__ . '/../../vendor/autoload.php';
// Adjust path if needed
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");
if ($con->connect_error) die("Connection failed");

$district = $_GET['district'] ?? '';
$batch = $_GET['batch'] ?? '';
$group = $_GET['group'] ?? '';

$where = [];
$params = [];
$types = "";

if ($district) {
    $where[] = "district = ?";
    $params[] = $district;
    $types .= "s";
}
if ($batch) {
    $where[] = "batch = ?";
    $params[] = $batch;
    $types .= "s";
}
if ($group) {
    $where[] = "`group` = ?";
    $params[] = $group;
    $types .= "s";
}

if ($where) {
    $query = "SELECT * FROM dyd_certificate WHERE " . implode(" AND ", $where);
    $stmt = $con->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $con->query("SELECT * FROM dyd_certificate");
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('DYD Certificates');

// Header row
$sheet->fromArray([
    'District',
    'Group',
    'Batch',
    'Student ID',
    'Student Name',
    'Gender',
    'NID',
    'Father Name',
    'Mother Name',
    'Duration'
], NULL, 'A1');

// Data rows
$rowNum = 2;
while ($row = $result->fetch_assoc()) {
    $sheet->fromArray([
        $row['district'],
        $row['group'],
        $row['batch'],
        $row['stu_id'],
        $row['stu_name'],
        $row['gender'],
        $row['nid'],
        $row['father'],
        $row['mother'],
        $row['duration']
    ], NULL, 'A' . $rowNum++);
}

// Output Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="dyd_certificates.xlsx"');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
