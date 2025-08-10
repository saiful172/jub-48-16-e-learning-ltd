<?php 	

require_once 'core.php';

$sql = "SELECT distinct product_id, product_name FROM product_depo ";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);



?>