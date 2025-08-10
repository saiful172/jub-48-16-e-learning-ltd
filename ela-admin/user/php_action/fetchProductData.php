<?php 	 session_start();
require_once '../../includes/conn.php'; 

$sql = "SELECT product_id, product_name, duration FROM product  WHERE user_id='".$_SESSION['id']."' order by product_id asc ";
$result = $con->query($sql);

$data = $result->fetch_all();

$con->close();

echo json_encode($data);

?>