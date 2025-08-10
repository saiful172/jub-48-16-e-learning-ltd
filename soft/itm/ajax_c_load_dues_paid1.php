<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$orders_dues = mysqli_query($con,"select * from customer WHERE customer_id = '$customerID' and member_id='".$_SESSION['id']."' ");
		
		if(mysqli_num_rows($orders_dues) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$orders_dues = mysqli_fetch_assoc($orders_dues);
			$out->status = 'Found';
			
			$out->customerName = $orders_dues['customer_name'];
			$out->customerContact = $orders_dues['contact_info'];
		}
	}

	echo json_encode($out);
?>