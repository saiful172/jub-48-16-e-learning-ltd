<?php 	

require_once 'core.php';
require_once 'conn.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	
  $productId = $_POST['productId'];
  $productName 		= $_POST['editProductName']; 
  $quantity 			= $_POST['editQuantity'];
  $rate 					= $_POST['editRate'];
  $buyRate 					= $_POST['editBuyRate'];
  $brandName 			= $_POST['editBrandName'];
  $categoryName 	= $_POST['editCategoryName'];
  $productStatus 	= $_POST['editProductStatus'];

				
 $sql = "UPDATE product SET active = 1, status = 1, last_update=NOW() WHERE  product_id = '$productId' ";
 
 //$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate',buy_rate = '$buyRate', active = '$editProductStatus', status = 1, last_update=NOW() WHERE  product_id = '$productId' ";
    
	
	
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating fproduct info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
?>