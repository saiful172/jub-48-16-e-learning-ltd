<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$orders_dues = mysqli_query($con,"select * from sup_orders_dues WHERE sup_id = '$customerID' ");
		
		if(mysqli_num_rows($orders_dues) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$orders_dues = mysqli_fetch_assoc($orders_dues);
			$out->status = 'Found'; 
			$out->customerName = $orders_dues['client_name'];
			$out->customerContact = $orders_dues['client_contact'];
			$out->customerOrderId = $orders_dues['order_id'];
			$out->PreviousDue = $orders_dues['pre_due'];
			$out->TodayTotal = $orders_dues['today_total'];
			$out->GrandTotal = $orders_dues['grand_total'];
			$out->customerDues = $orders_dues['recent_due'];
		}
	}

	echo json_encode($out);
?>