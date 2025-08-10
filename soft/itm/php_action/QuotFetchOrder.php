<?php 	
session_start();
require_once '../../includes/conn.php'; 

$sql = "SELECT order_id,user_id,order_date, client_name, client_contact, grand_total,custom_invoice_no FROM quot_orders WHERE order_status = 1  and user_id ='".$_SESSION['id']."' order by id desc limit 200 ";
$result = $con->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM quot_order_item WHERE order_id = $orderId";
 	$itemCountResult = $con->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();

 

 	$button = '
	
	         <a href="" class="float-left"  onclick="printQuot('.$orderId.')">
                <i class="bi bi-printer"></i>
                <span>Print</span>
              </a>
			   &nbsp;||&nbsp;
			  <a class="float-left" href="orders-quot?o=editOrd&i='.$orderId.'">
                <i class="bi bi-pencil-square"></i>
                <span>Edit</span>
              </a>
			  
		 <nav class="header-nav ms-auto d-none">
<ul class="d-flex align-items-center">
<li class="nav-item dropdown pe-3"> 
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Click</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile rounded">
            

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="printQuot('.$orderId.')">
                <i class="bi bi-printer"></i>
                <span>Print</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="orders-quot?o=editOrd&i='.$orderId.'">
                <i class="bi bi-pencil-square"></i>
                <span>Edit</span>
              </a>
            </li>
			
			
           
		   

          </ul> 
        </li> 
		
		
		 </ul>
    </nav>
	  ';		

 	$output['data'][] = array( 		
 		// image
 		//$x,
		// order Id
 		$row[6],
 		// order date
 		//$row[1],
 		// client name
 		date("d-m-Y ", strtotime($row[2])),
 		// client contact
 		$row[3], 
// client contact
 		$row[4],
		
	//$row[6],	
 		$itemCountRow, 	
$row[5],	 	
//$row[8],	 	
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