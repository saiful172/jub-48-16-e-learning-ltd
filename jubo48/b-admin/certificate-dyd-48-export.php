<?php
header('Content-Type: application/json');
$con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");

$district = $_POST['district'] ?? '';
$batch = $_POST['batch'] ?? '';
$group = $_POST['group'] ?? '';
$search = $_POST['search'] ?? '';

$where = "1=1";
if ($district) $where .= " AND district = '{$con->real_escape_string($district)}'";
if ($batch) $where .= " AND batch = '{$con->real_escape_string($batch)}'";
if ($group) $where .= " AND `group` = '{$con->real_escape_string($group)}'";
if ($search) {
  $search = $con->real_escape_string($search);
  $where .= " AND (district LIKE '%$search%' OR batch LIKE '%$search%' OR `group` LIKE '%$search%' 
               OR stu_id LIKE '%$search%' OR stu_name LIKE '%$search%' OR nid LIKE '%$search%')";
}

$sql = "SELECT district, `group`, batch, stu_id, stu_name, gender, nid, father, mother, duration 
        FROM dyd_certificate WHERE $where ORDER BY district ASC";
$result = $con->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = array_map('htmlspecialchars', $row);
}

echo json_encode($data);
