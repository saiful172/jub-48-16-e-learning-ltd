<?php  session_start();
require_once '../../includes/conn.php'; 


$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {	

  $OrderId 					= $_POST['OrderId'];
  $UserId 					= $_POST['UserId'];
  $CustId 					= $_POST['CustId'];
 
  $orderDate 						= date('Y-m-d', strtotime($_POST['orderDate']));
  //$DeliveryDate 						= date('Y-m-d', strtotime($_POST['DeliveryDate']));
  
  //$date1 = str_replace('-', '/', $orderDate);                  ...Date Increase
  //$DeliveryDate = date('Y-m-d',strtotime($date1 . "+1 days"));  ...Date Increase  

  $clientName 					= $_POST['clientName'];
  $clientContact 				= $_POST['clientContact'];
  
  $subTotalValue 				= $_POST['subTotalValue'];
  $vatValue 						=	$_POST['vatValue'];
  $totalAmountValue     = $_POST['totalAmountValue'];
  $discount 						= $_POST['discount'];
  $grandTotalValue 			= $_POST['grandTotalValue'];
  $paid 								= $_POST['paid'];
  $Paid_dd 								= $_POST['Paid_dd'];
  
  $PreDue 				        = $_POST['PreDue'];
  $GTotal 						= $_POST['GTotal'];
  $RecDues 						= $_POST['RecDues'];
  
  $paymentType 					= $_POST['paymentType'];
  $paymentStatus 				= $_POST['paymentStatus'];

				
  // Data INSERT INTO orders Table
  $sql = "INSERT INTO orders (user_id,customer_id,order_date,deliver_date_or_last_update, client_name, client_contact, sub_total, vat, total_amount, discount, pre_due,today_total,grand_total, paid,deliver_date_paid, due,dues_or_paid,dues_or_paid_status,payment_type, payment_status, order_status,order_type) 
  VALUES ('$UserId','$CustId','$orderDate','$orderDate','$clientName', '$clientContact', '$subTotalValue', '$vatValue', '$totalAmountValue', '$discount', '$PreDue','$grandTotalValue', '$GTotal', '$paid','$Paid_dd', '$RecDues','Dues',4, $paymentType, $paymentStatus, 1,2)";
 
// Delete Same Customer Data
//$sql1 = "DELETE FROM orders_dues WHERE customer_id = {$CustId} ";	
//$con->query($sql1);
// And INSERT/Update Same Customer Data
//mysqli_query($con,"INSERT INTO orders_dues (order_id,user_id,customer_id,order_date,last_update, client_name, client_contact,pre_due,today_total,grand_total, paid, recent_due,dues_or_paid,dues_or_paid_status,cuses)
// VALUES ('$OrderId','$UserId','$CustId','$orderDate','$DeliveryDate', '$clientName', '$clientContact','$PreDue','$grandTotalValue', '$GTotal','$paid', '$RecDues','Dues',4,'By Invoice')" );

$sql1 = "UPDATE orders_dues SET order_id='$OrderId', pre_due='$PreDue',today_total = '$grandTotalValue',grand_total ='$GTotal',paid = '$paid',recent_due ='$RecDues',order_date='$orderDate',last_update='$orderDate', cuses='By Invoice'  WHERE customer_id = {$CustId}";	
$con->query($sql1);

mysqli_query($con,"INSERT INTO orders_details (order_id,user_id,customer_id,order_date, client_name, client_contact, pre_due,today_total, grand_total, paid, recent_due,cuses, order_type)
                                 VALUES ('$OrderId','$UserId','$CustId','$orderDate', '$clientName', '$clientContact','$PreDue','$grandTotalValue', '$GTotal','$paid','$RecDues','By Invoice',2)" );
 	
	$order_id;
	$orderStatus = false;
	if($con->query($sql) === true) {
		$order_id = $con->insert_id;
		$valid['order_id'] = $order_id;	

		$orderStatus = true;
	}

		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE  product.id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $con->query($updateProductQuantitySql);
		
		
	while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE id = ".$_POST['productName'][$x]."  ";
				$con->query($updateProductTable);

				// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, id, quantity, rate, total, order_item_status,entry_date) 
				VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."', 1,'$orderDate' )";
                $con->query($orderItemSql);		

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}		
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Order Create Successfull...";		
	
	$con->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);

?>









