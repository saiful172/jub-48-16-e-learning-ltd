<?php 	 session_start();
require_once '../../includes/conn.php'; 

$sql = "SELECT product.product_id, product.product_name, brand1.brand_name, categories1.cat_name, categories_sub.sub_cat_name
  FROM product 

 Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		                                 Left JOIN categories1 ON categories1.cat_id = product.categories_id
		                                 Left JOIN categories_sub ON categories_sub.sub_cat_id = product.sub_cat
										
										
 WHERE product.user_id='".$_SESSION['id']."' order by product.product_id asc ";
$result = $con->query($sql);

$data = $result->fetch_all();

$con->close();

echo json_encode($data);

?>