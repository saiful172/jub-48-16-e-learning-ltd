<?php
    require_once 'session.php';	
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select distinct customer_id,client_name ,client_contact from orders WHERE client_contact = '$customerID' ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->CustomerIdd = $customer['customer_id'];
			$out->customerName = $customer['client_name'];
			$out->customerContact = $customer['client_contact'];
		}
	}

	echo json_encode($out);
?>