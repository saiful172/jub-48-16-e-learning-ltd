<?php 	
session_start();
require_once '../../includes/conn.php'; 

$sql = "SELECT order_id,user_id,order_date, client_name, client_contact, payment_status,pre_due,today_total,grand_total, payment_status,custom_invoice_no FROM orders WHERE order_status = 1  and user_id ='".$_SESSION['id']."' order by order_id desc ";
$result = $con->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $con->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 		// active 
 	if($row[5] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>Full Payment</label>";
 	   } 
else if($row[5] == 2) { 		
 		$paymentStatus = "<label class='label label-info'>Advance Payment</label>";
 	} 
else if($row[5] == 3) { 		
 		$paymentStatus = "<label class='label label-primary'>Half Payment</label>";
 	}	
else if($row[5] == 4) { 		
 		$paymentStatus = "<label class='label label-default'>Some Payment</label>";
 	}	
	
	
else { 		
 		$paymentStatus = "<label class='label label-danger'>No Payment</label>";
 	} // /else
		

 	$button = '   
	<!-- Single button -->
	
	<center> 
	<a href="#" class="float-left text-primary fw-bold"  onclick="printOrder('.$orderId.')">
                <i class="bi bi-printer"></i>
                <span>Print</span>
              </a>
			   &nbsp;||&nbsp;
			  <a class="float-left text-danger fw-bold" href="orders-new.php?o=editOrd&i='.$orderId.'" >
                <i class="bi bi-pencil-square"></i>
                <span>Edit</span>
              </a>
			 
			  <a target="_blank" class=" d-none float-left text-success fw-bold" href="product-order-status?o=OrdStatus&i='.$orderId.'" >
                <i class="bi bi-link"></i>
                <span>Link</span>
              </a>
			 
	</center> 
	
	
	  
	
	';		

 	$output['data'][] = array( 		
 		// image
 		//$x,
		// order Id
 		$row[10],
 		// order date
 		//$row[1],
 		// client name
 		date("d-m-Y ", strtotime($row[2])),
 		// client contact
 		$row[3], 
// client contact
 		$row[4],
		
	//$row[6],	
 	//	$itemCountRow, 	
//$row[7],	 	
$row[8],	 	
 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$con->close();

echo json_encode($output);

?>