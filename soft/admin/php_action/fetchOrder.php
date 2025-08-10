
<?php  session_start();
require_once '../../includes/conn.php';
$sql = "SELECT order_id,user_id,order_date, client_name, client_contact, payment_status,pre_due,today_total,grand_total FROM orders  order by order_id desc ";
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
		

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    
	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-eye-open"></i> View </a></li>
		<li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit </a></li>
     
  <!--    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>
       -->     
	  <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li> 
	  
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		//$x,
		// order Id
 		$row[0],
 		// order date
 		//$row[1],
 		// client name
 		date("d-m-Y ", strtotime($row[2])),
 		// client contact
 		$row[3], 
// client contact
 		$row[4],
	 
		$row[6],	
 		$itemCountRow, 	
$row[7],	 	
$row[8],	
 		//$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$con->close();

echo json_encode($output);

?>