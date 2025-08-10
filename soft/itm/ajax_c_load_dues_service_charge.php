<?php
    require_once 'session.php';	 
	
	$out =  new stdClass();
	if(!isset($_GET['c']) || $_GET['c'] == "")
	{
		$out->status = "Not Found";
	}
	else{
		
		$customerID = mysqli_real_escape_string($con, $_GET['c']);
		$customer = mysqli_query($con,"select * from service_charge 
		left join service_category on service_category.scat_id=service_charge.product_type 
		WHERE client_id = '$customerID' ");
		
		if(mysqli_num_rows($customer) < 1)
		{
			$out->status = "Not Found";
		}
		else{
			$customer = mysqli_fetch_assoc($customer);
			$out->status = 'Found';
			$out->Product = $customer['product_type'];
			$out->ServiceType = $customer['service_type'];
			$out->ProTypeName = $customer['name'];
			$out->Charge = $customer['service_charge'];
		}
	}

	echo json_encode($out);
?>