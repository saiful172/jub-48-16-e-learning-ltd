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
  $Address 				= $_POST['Address'];
  $Email 				= $_POST['Email'];
  
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
  $CustomInv 					= $_POST['CustomInv'];
				
  // Data INSERT INTO orders Table
  $sql = "INSERT INTO sup_orders (order_id,user_id,customer_id,order_date,deliver_date_or_last_update, client_name, client_contact,address,order_email,sub_total, vat, total_amount, discount, pre_due,today_total,grand_total, paid,deliver_date_paid, due,dues_or_paid,dues_or_paid_status,payment_type, payment_status, order_status,order_type,custom_invoice_no,invoice_time) 
  VALUES ('$OrderId','$UserId','$CustId',CURRENT_TIMESTAMP(),'$orderDate','$clientName', '$clientContact','$Address','$Email', '$subTotalValue', '$vatValue', '$totalAmountValue', '$discount', '$PreDue','$grandTotalValue', '$GTotal', '$paid','$Paid_dd', '$RecDues','Dues',4, $paymentType, $paymentStatus, 1,1,$CustomInv,NOW() )";
 
// Delete Same Customer Data
//$sql1 = "DELETE FROM orders_dues WHERE customer_id = {$CustId} ";	
//$con->query($sql1);
// And INSERT/Update Same Customer Data
//mysqli_query($con,"INSERT INTO orders_dues (order_id,user_id,customer_id,order_date,last_update, client_name, client_contact,pre_due,today_total,grand_total, paid, recent_due,dues_or_paid,dues_or_paid_status,cuses)
// VALUES ('$OrderId','$UserId','$CustId','$orderDate','$DeliveryDate', '$clientName', '$clientContact','$PreDue','$grandTotalValue', '$GTotal','$paid', '$RecDues','Dues',4,'By Invoice')" );

$sql1 = "UPDATE sup_orders_dues SET order_id='$OrderId', pre_due='$PreDue',today_total = '$grandTotalValue',grand_total ='$GTotal',paid = '$paid',recent_due ='$RecDues',order_date='$orderDate',last_update='$orderDate', cuses='By Invoice'  WHERE sup_id = {$CustId}";	
$con->query($sql1);

mysqli_query($con,"INSERT INTO sup_orders_details (order_id,user_id,customer_id,order_date, client_name, client_contact,address,order_email,pre_due,today_total, grand_total, paid, recent_due,cuses,order_type)
                                 VALUES ('$OrderId','$UserId','$CustId','$orderDate', '$clientName', '$clientContact','$Address','$Email','$PreDue','$grandTotalValue', '$GTotal','$paid','$RecDues','By Invoice',1)" );
 	
	$order_id;
	$orderStatus = false;
	if($con->query($sql) === true) {
		$order_id = $con->insert_id;
		$valid['order_id'] = $order_id;	

		$orderStatus = true;
	}
    
	$sqlll = "SELECT * FROM `sup_orders` WHERE `id` = $order_id";
	$resulttt = $con->query($sqlll);
	while($row = $resulttt->fetch_assoc()) {
		$orderUniquId = $row["order_id"];
	  }
	$valid['order_id'] = $orderUniquId;	
		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE  product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $con->query($updateProductQuantitySql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE  product_id = ".$_POST['productName'][$x]."";
				$con->query($updateProductTable);

				
				
				// add into order_item
				$orderItemSql = "INSERT INTO sup_order_item (order_id, product_id, quantity, rate, total,short_details, order_item_status,entry_date) 
				VALUES ('$OrderId','".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."', '".$_POST['ShortDetails'][$x]."',1,'$orderDate' )";
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









