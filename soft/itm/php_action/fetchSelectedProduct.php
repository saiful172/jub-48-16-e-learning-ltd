<?php 	 session_start();
require_once '../../includes/conn.php';

$productId = $_POST['productId'];

$sql = "SELECT * FROM product WHERE  product.user_id ='".$_SESSION['id']."' and product.product_id= $productId  ";
$result = $con->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$con->close();

echo json_encode($row);

?>