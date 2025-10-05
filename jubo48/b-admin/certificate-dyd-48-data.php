<?php
$con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");

$district = $_POST['district'] ?? '';
$batch = $_POST['batch'] ?? '';
$group = $_POST['group'] ?? '';
$search = $_POST['search']['value'] ?? '';

$where = "1=1";
if ($district) $where .= " AND district = '{$con->real_escape_string($district)}'";
if ($batch) $where .= " AND batch = '{$con->real_escape_string($batch)}'";
if ($group) $where .= " AND `group` = '{$con->real_escape_string($group)}'";
if ($search) {
  $search = $con->real_escape_string($search);
  $where .= " AND (district LIKE '%$search%' OR batch LIKE '%$search%' OR `group` LIKE '%$search%' 
               OR stu_id LIKE '%$search%' OR stu_name LIKE '%$search%' OR nid LIKE '%$search%')";
}

$totalQuery = $con->query("SELECT COUNT(*) AS total FROM dyd_certificate");
$totalData = $totalQuery->fetch_assoc()['total'];

$filteredQuery = $con->query("SELECT COUNT(*) AS total FROM dyd_certificate WHERE $where");
$totalFiltered = $filteredQuery->fetch_assoc()['total'];

$limit = $_POST['length'];
$start = $_POST['start'];

$sql = "SELECT * FROM dyd_certificate WHERE $where ORDER BY district ASC LIMIT $start, $limit";
$query = $con->query($sql);

$data = [];
$sl = $start + 1;
while ($row = $query->fetch_assoc()) {
  $data[] = [
    "sl" => $sl++,
    "district" => $row['district'],
    "group" => $row['group'],
    "batch" => $row['batch'],
    "stu_id" => $row['stu_id'],
    "stu_name" => $row['stu_name'],
    "gender" => $row['gender'],
    "nid" => $row['nid'],
    "father" => $row['father'],
    "mother" => $row['mother'],
    "duration" => $row['duration'],
    "action" => "<a href='dyd-certificate-edit.php?edit_id={$row['id']}' class='btn btn-success btn-sm'><i class='fa fa-edit'></i></a>
                 <a href='?delete_id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'><i class='fa fa-trash'></i></a>"
  ];
}

echo json_encode([
  "draw" => intval($_POST['draw']),
  "recordsTotal" => intval($totalData),
  "recordsFiltered" => intval($totalFiltered),
  "data" => $data
]);
