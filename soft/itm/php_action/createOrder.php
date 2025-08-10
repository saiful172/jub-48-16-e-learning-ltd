<?php  session_start();
require_once '../../includes/conn.php'; 

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {	

  $OrderId 					= $_POST['OrderId'];
  $UserId 					= $_POST['UserId'];
  $CustId 					= $_POST['CustId'];
 
 
  $orderDate 						= date('Y-m-d', strtotime($_POST['orderDate']));
  $DeliveryDate 						= date('Y-m-d', strtotime($_POST['DeliveryDate']));
  
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
  $TotalDisP 						= $_POST['TotalDisP'];
  $DisAmt 						= $_POST['DisAmt'];
  
  $grandTotalValue 			= $_POST['grandTotalValue'];
  $paid 								= $_POST['paid'];
  $Paid_dd 								= $_POST['Paid_dd'];
  
  $PreDue 				        = $_POST['PreDue'];
  $GTotal 						= $_POST['GTotal'];
  $RecDues 						= $_POST['RecDues'];
  
  $PaymType 					= $_POST['PaymType'];
  $paymentType 					= $_POST['paymentType'];
  $paymentStatus 				= $_POST['paymentStatus'];
  $CustomInv 					= $_POST['CustomInv'];
  $Comments 					= $_POST['Comments'];
  $InvCourier 					= $_POST['InvCourier'];
  $CouCrg 					= $_POST['CouCrg'];
  $DeliStatus 					= $_POST['DeliStatus'];
				
  // Data INSERT INTO orders Table
  $sql = "INSERT INTO orders (order_id,user_id,customer_id,order_date,deliver_date_or_last_update, client_name, client_contact,address,order_email,sub_total, vat, total_amount, discount, pre_due,today_total,grand_total, paid,deliver_date_paid, due,dues_or_paid,dues_or_paid_status,payment_type, payment_status, order_status,order_type,custom_invoice_no,invoice_time,inv_comments,inv_courier,courier_charge,dis_taka,dis_prcnt,delivery_status)    
  VALUES ('$OrderId','$UserId','$CustId','$orderDate', '$DeliveryDate','$clientName', '$clientContact','$Address','$Email', '$subTotalValue', '$vatValue', '$totalAmountValue', '$DisAmt', '$PreDue','$grandTotalValue', '$GTotal', '$paid','$Paid_dd', '$RecDues','Dues',4, $paymentType, $paymentStatus, 1,1,$CustomInv,NOW(),'$Comments','$InvCourier','$CouCrg' ,'$discount','$TotalDisP','$DeliStatus'  )";
 
// Delete Same Customer Data
//$sql1 = "DELETE FROM orders_dues WHERE customer_id = {$CustId} ";	
//$con->query($sql1);
// And INSERT/Update Same Customer Data
//mysqli_query($con,"INSERT INTO orders_dues (order_id,user_id,customer_id,order_date,last_update, client_name, client_contact,pre_due,today_total,grand_total, paid, recent_due,dues_or_paid,dues_or_paid_status,cuses)
// VALUES ('$OrderId','$UserId','$CustId','$orderDate','$DeliveryDate', '$clientName', '$clientContact','$PreDue','$grandTotalValue', '$GTotal','$paid', '$RecDues','Dues',4,'By Invoice')" );

$sql1 = "UPDATE orders_dues SET order_id='$OrderId', pre_due='$PreDue',today_total = '$grandTotalValue',grand_total ='$GTotal',paid = '$paid',recent_due ='$RecDues',order_date='$orderDate',last_update='$orderDate', cuses='By Invoice' , custom_invoice='$CustomInv', paym_type='$PaymType'   WHERE customer_id = {$CustId}";	
$con->query($sql1);

mysqli_query($con,"INSERT INTO orders_details (order_id,user_id,customer_id,order_date, client_name, client_contact,pre_due,today_total, grand_total, paid, recent_due,cuses,order_type,status,custom_invoice,paym_type)
                                 VALUES ('$OrderId','$UserId','$CustId','$orderDate', '$clientName', '$clientContact','$PreDue','$grandTotalValue', '$GTotal','$paid','$RecDues','By Invoice',1,1,$CustomInv,'$PaymType')" );
 	
	$order_id;
	$orderStatus = false;
	if($con->query($sql) === true) {
		$order_id = $con->insert_id;
		$valid['order_id'] = $order_id;	

		$orderStatus = true;
	}
    
	$sqlll = "SELECT * FROM `orders` WHERE `id` = $order_id";
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
				$updateProductTable = "UPDATE product SET quantity = '".$_POST['RecQty'][$x]."'  WHERE product.product_id = ".$_POST['productName'][$x]."";
			    $con->query($updateProductTable);
 
				// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, order_quantity,back_qty, rate,buy_rate,single_sub_total, single_dis_taka, single_dis_prcnt, single_discount,total,short_details,pro_qr_code, order_item_status,entry_date) 
				VALUES ('$OrderId','".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."','0', '".$_POST['rate'][$x]."','".$_POST['BuyRate'][$x]."','".$_POST['SingTotal'][$x]."', '".$_POST['Discount'][$x]."','".$_POST['DisPrsnt'][$x]."','".$_POST['DisTaka'][$x]."','".$_POST['totalValue'][$x]."', '".$_POST['ShortDetails'][$x]."','".$_POST['QrCode'][$x]."',1,'$orderDate' )";
                $con->query($orderItemSql);		
				
				 $orderItemSql1 = "INSERT INTO order_item_all (order_id,sup_order_id, product_id, order_quantity,buy_pro,ret_sup,dam_pro,sale_pro,back_qty,rec_stock, rate,buy_rate,single_sub_total, single_dis_taka, single_dis_prcnt, single_discount,total,short_details, order_item_status,entry_date,user_id,comments) 
				VALUES ('$OrderId','$OrderId','".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."','0','0','0','".$_POST['quantity'][$x]."','0','".$_POST['RecQty'][$x]."', '".$_POST['rate'][$x]."','".$_POST['BuyRate'][$x]."','".$_POST['SingTotal'][$x]."', '".$_POST['Discount'][$x]."','".$_POST['DisPrsnt'][$x]."','".$_POST['DisTaka'][$x]."','".$_POST['totalValue'][$x]."', '".$_POST['ShortDetails'][$x]."',3,NOW(),$UserId, 'W.Sale' )";
                $con->query($orderItemSql1);

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}		
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Order Successfully Complete..! ";		
	
	$con->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);

?>









