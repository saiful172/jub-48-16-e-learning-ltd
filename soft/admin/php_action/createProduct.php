<?php 	

require_once 'core.php';
require_once 'conn.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $productId = $_POST['productId'];
	$productName 		= $_POST['productName'];
  // $productImage 	= $_POST['productImage'];
  $quantity 			= $_POST['quantity'];
  $rate 					= $_POST['rate'];
  $totalrate 					= $_POST['totalrate'];
  $buyrate 					= $_POST['buyrate'];
  $totalbuyrate 					= $_POST['totalbuyrate'];
  $totalincome 					= $_POST['totalincome'];
  $brandName 			= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
				$sql = "INSERT INTO product (product_id,   product_name,   product_image,  brand_id,    categories_id,  quantity,  rate,     total_rate,  buy_rate,    total_buy_rate,  total_income,   active, status, entry_date,last_update) 
				                 VALUES ('$productId', '$productName', '$url',        '$brandName', '$categoryName',   '$quantity',  '$rate', '$totalrate', '$buyrate', '$totalbuyrate', '$totalincome',  '$productStatus',1, NOW(),NOW() )";
				
   mysqli_query($con,"INSERT INTO product_details (product_id,   product_name,   brand_id,    categories_id,    quantity,  add_qty,    total_qty, total_qty_price,  rate,    total_rate,   buy_rate,   total_buy_rate,  total_income,   entry_date) 
                                           VALUES ('$productId','$productName', '$brandName', '$categoryName', '0','$quantity','$quantity', '$totalrate', '$rate', '$totalrate', '$buyrate', '$totalbuyrate', '$totalincome',  NOW() )" );

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST