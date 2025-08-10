<?php
    require_once 'session.php';	
	
	include('conn.php');
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select * from customer WHERE customer_id = '$customerID' and member_id='".$_SESSION['id']."' ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->groupName = $customer['group_name'];
			$out->groupNo = $customer['group_no'];
			$out->customerName = $customer['customer_name'];
			$out->customerContact = $customer['contact_info'];
		}
	}

	echo json_encode($out);
?>