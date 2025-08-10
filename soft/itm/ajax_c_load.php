<?php
    require_once 'session.php';	
	 
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select customer.customer_id,customer.customer_name,customer.contact_info, customer.address, orders_dues.recent_due
		from customer left join `orders_dues` on orders_dues.customer_id=customer.customer_id  WHERE customer.customer_id = '$customerID' ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->CustomerIdd = $customer['customer_id'];
			$out->customerName = $customer['customer_name'];
			$out->customerContact = $customer['contact_info'];
			$out->customerAddress = $customer['address'];
			$out->preDues = $customer['recent_due'];
		}
	}

	echo json_encode($out);
?>