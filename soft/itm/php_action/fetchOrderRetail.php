<?php 	
session_start();
require_once '../../includes/conn.php'; 

$sql = "SELECT orders.order_id,orders.user_id,orders.order_date, orders.client_name, orders.client_contact,
 orders.payment_status,orders.pre_due,orders.today_total,orders.grand_total, 
 orders.payment_status,orders.custom_invoice_no ,payment_status.ps_id ,payment_status.ps_name,orders.delivery_status,delivery.dlvry_name

FROM orders 
left join `payment_status` on payment_status.ps_id=orders.payment_status
left join `delivery` on delivery.id=orders.delivery_status
WHERE orders.order_type = 2 and orders.order_status = 1  and orders.user_id ='".$_SESSION['id']."' order by orders.order_id desc ";
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
 		$paymentStatus = "<span class='badge rounded-pill bg-primary'>$row[12]</span>"; 
 	   } 
else if($row[5] == 2) { 		
 		$paymentStatus = "<span class='badge rounded-pill bg-info'>$row[12]</span>"; 
 	} 
else if($row[5] == 3) { 		
 		$paymentStatus = "<span class='badge rounded-pill bg-success'>$row[12]</span>"; 
 	}	
else if($row[5] == 4) { 		
 		$paymentStatus = "<span class='badge rounded-pill bg-warning'>$row[12]</span>"; 
 	}	
		
else { 		
 		$paymentStatus = "<span class='badge rounded-pill bg-danger'>$row[12]</span>"; 
 	}
	
	// /else
	
	// Delivery Status Start
 	if($row[13] == 1) { 		
 		$DeliStatus = "<span class='badge rounded-pill bg-danger'>$row[14]</span>";  
 	   } 
else if($row[13] == 2) { 		
 		$DeliStatus = "<span class='badge rounded-pill bg-primary'>$row[14]</span>";  
 	} 
else if($row[13] == 3) { 		
 		$DeliStatus = "<span class='badge rounded-pill bg-success'>$row[14]</span>";  
 	}	
else if($row[13] == 4) { 		
 		$DeliStatus = "<span class='badge rounded-pill bg-secondary'>$row[14]</span>";  
 	}	
	
	else if($row[13] == 5) { 		
 		$DeliStatus = "<span class='badge rounded-pill bg-info'>$row[14]</span>";  
 	}	
		
else { 		
 		$DeliStatus = "<span class='badge rounded-pill bg-warning'>$row[14]</span>";  
 	} // / Delivery Status  End
	
		

 	$button = '<!-- Single button -->
	
	<center> 
	<a href="#" class="float-left text-primary fw-bold"  onclick="printOrderWithPreSP('.$orderId.')">
                <i class="bi bi-printer"></i>
                <span>Print</span>
              </a>
			   &nbsp;||&nbsp;
			  <a class="float-left text-danger fw-bold" href="orders-retail.php?o=editOrd&i='.$orderId.'" >
                <i class="bi bi-pencil-square"></i>
                <span>Edit</span>
              </a>
			  &nbsp;||&nbsp;
			  <a target="_blank" class="float-left text-success fw-bold" href="product-order-status?o=OrdStatus&i='.$orderId.'" >
               <i class="bi bi-link"></i>
                <span>Link</span>
              </a>
	</center> 
	
	 <nav class="header-nav ms-auto d-none">
<ul class="d-flex align-items-center">
<li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Click</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile rounded">
            

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="printOrderWithPreSP('.$orderId.')">
                <i class="bi bi-printer"></i>
                <span>Print</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="printOrderWithBlank('.$orderId.')">
                <i class="bi bi-printer"></i>
                <span>Print Blank</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

             

            <li>
              <a class="dropdown-item d-flex align-items-center" href="orders-retail.php?o=editOrd&i='.$orderId.'" >
                <i class="bi bi-pencil-square"></i>
                <span>Edit</span>
              </a>
            </li>

          </ul> 
        </li> 
		
		
		 </ul>
    </nav>
	
	
	
<div class="btn-group" style="display:none;">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    
	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    <li><a type="button" onclick="printOrderWithBlank('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print-Blank </a></li>
		<li><a type="button" onclick="printOrderWithPreSP('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print SP </a></li>
		<li><a type="button" onclick="printOrderPos('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Pos</a></li>
	    <li><a href="orders-retail.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit </a></li>
	 	<li><a href="return-orders-retail.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Return </a></li>
        <li><a target="_blank" href="product-order-status?o=OrdStatus&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-link"></i> Link </a></li>
    
	<!-- 
	<li><a type="button" onclick="printOrderWithPreDue('.$orderId.')"> <i class="glyphicon glyphicon-eye-open"></i> View Pre Due</a></li>
	 	
  <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>
        <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li> 
	 -->      
	  </ul>
	</div>  ';		

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
 	//	$row[4],
		
	$row[6],	
 		$itemCountRow, 	
$row[7],	 	
$row[8],	 	
 		$paymentStatus,
	 	$DeliStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$con->close();

echo json_encode($output);

?>